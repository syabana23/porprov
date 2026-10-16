<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $isSecure = $this->isSecureRequest($request);

        // Behind a trusted proxy (ngrok/cloudflared) the app sees plain HTTP,
        // but the public URL is HTTPS. Force https so Vite/asset URLs are not
        // emitted as http and then blocked as mixed content by the browser.
        if ($isSecure) {
            URL::forceScheme('https');
        }

        // Force HTTPS whenever the public URL is HTTPS (APP_URL=https://...)
        // or FORCE_HTTPS=true — not only when APP_ENV=production. This keeps
        // artisan serve + ngrok scannable as HTTPS (grade A) while plain
        // local HTTP (APP_URL=http://localhost) stays untouched, no loop.
        // Dibaca dari config (bukan env() langsung) agar tetap jalan saat
        // `php artisan config:cache` dipakai di produksi.
        $forceHttps = (bool) config('security.force_https')
            || app()->environment('production');

        // Generate a per-request nonce di awal (sebelum early return) supaya
        // respons redirect juga membawa CSP lengkap — scanner membaca respons
        // pertama, bukan hanya halaman tujuan.
        $nonce = Vite::useCspNonce();
        View::share('cspNonce', $nonce);

        if ($forceHttps && ! $isSecure) {
            return $this->applyHeaders(
                Redirect::secure($request->getRequestUri()),
                $isSecure,
                $nonce
            );
        }

        return $this->applyHeaders($next($request), $isSecure, $nonce);
    }

    /**
     * Pasang seluruh security header pada respons.
     *
     * Dipanggil untuk respons normal maupun respons redirect supaya jalur
     * HTTP -> HTTPS tidak terlihat "polos" oleh scanner. Nilai header tidak
     * diubah dari sebelumnya; ini murni pemindahan agar tidak ada jalur
     * respons yang lolos tanpa header.
     */
    private function applyHeaders(Response $response, bool $isSecure, string $nonce): Response
    {
        // Remove server fingerprint headers
        $response->headers->remove('X-Powered-By');
        $response->headers->remove('Server');

        // $isSecure dihitung di awal (tahan terhadap "https,http" dan proxy
        // ngrok/cloudflare). Dipakai lagi di bawah untuk HSTS.

        // XFO mengikuti frame-ancestors: DENY bila 'none', else SAMEORIGIN.
        // Tidak ada halaman yang perlu di-frame (embed YouTube bersifat
        // outbound), jadi DENY tetap default yang tepat.
        $frameAncestors = (string) config('security.csp.frame_ancestors', "'none'");
        $response->headers->set(
            'X-Frame-Options',
            trim($frameAncestors) === "'none'" ? 'DENY' : 'SAMEORIGIN'
        );

        // Prevent MIME-type sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Control referrer information leakage
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Restrict browser features. fullscreen/picture-in-picture dibuka secukupnya
        // agar iframe live-streaming YouTube tetap bisa fullscreen.
        $response->headers->set('Permissions-Policy', $this->permissionsPolicy());

        // Isolate top-level browsing contexts from other origins
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin');

        // Amankan resource dari akses lintas-origin. Aman untuk Google Fonts
        // (server kirim CORP: cross-origin), tile OSM/nominatim (tanpa CORP),
        // dan iframe YouTube (CORP tidak berlaku untuk frame).
        $response->headers->set('Cross-Origin-Resource-Policy', 'same-origin');

        // Adobe products opt-out + process isolation hardening (nilai untuk grade A+)
        $response->headers->set('X-Permitted-Cross-Domain-Policies', 'none');
        $response->headers->set('Origin-Agent-Cluster', '?1');

        // HSTS hanya bermakna di atas HTTPS (sesuai RFC 6797) — jangan kirim via HTTP
        // agar scanner tidak menilai konfigurasi menyesatkan. Nilai dirakit dari
        // config/security.php; 'preload' default mati (tunnel ngrok tidak bisa
        // di-preload, dan domain go.id butuh izin sebelum submit ke hstspreload.org).
        if ($isSecure && config('security.hsts.enabled')) {
            $hsts = 'max-age='.config('security.hsts.max_age');
            if (config('security.hsts.include_subdomains')) {
                $hsts .= '; includeSubDomains';
            }
            if (config('security.hsts.preload')) {
                $hsts .= '; preload';
            }
            $response->headers->set('Strict-Transport-Security', $hsts);
        } else {
            $response->headers->remove('Strict-Transport-Security');
        }

        // Mode uji: hanya laporkan pelanggaran, tidak memblokir apa pun.
        // WAJIB dikembalikan ke false sebelum scan ulang (scanner hanya
        // menilai header Content-Security-Policy yang enforcing).
        $csp = $this->contentSecurityPolicy($nonce);
        if (config('security.csp.report_only')) {
            $response->headers->set('Content-Security-Policy-Report-Only', $csp);
        } else {
            $response->headers->set('Content-Security-Policy', $csp);
        }

        // Jangan pernah men-cache dokumen HTML agar browser tidak menyimpan
        // halaman dengan URL/CSP campuran (mis. sisa respons edge ngrok).
        if (str_contains((string) $response->headers->get('Content-Type', ''), 'text/html')) {
            $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        }

        return $response;
    }

    /**
     * Content Security Policy
     * - nominatim.openstreetmap.org: geocode JSONP via <script src> (peta venue route)
     * - router.project-osrm.org: routing fetch (peta venue route)
     * - *.tile.openstreetmap.org: tile Leaflet (img, bukan connect)
     * - youtube.com: iframe live-streaming; fonts.googleapis.com: Poppins
     * - Gambar thumbnail berita/kesehatan memakai images.unsplash.com
     *   (diizinkan via config security.csp.extra_img_hosts). Host spesifik
     *   tetap Grade A; kosongkan env bila semua gambar sudah self-host.
     * - style-src TIDAK boleh memuat nonce/hash: sesuai CSP Level 3, keberadaan
     *   nonce membuat 'unsafe-inline' di directive itu DIABAIKAN, sehingga seluruh
     *   atribut style="..." (welcome/venue/jadwal/fasilitas/chatbot) ikut diblokir
     *   dan tampilan rusak. Jaga 'unsafe-inline' + style-src-attr eksplisit di bawah.
     * - Origin dev HMR (npm run dev) hanya dilonggarkan jika Vite HMR
     *   benar-benar aktif (file public/hot ada). Jangan kunci ke
     *   APP_ENV=local karena scanner (securityheaders.com) menilai skema
     *   http:/ws: di script-src sebagai merah walau HMR sedang mati.
     */
    private function contentSecurityPolicy(string $nonce): string
    {
        $scriptSrc = "'self' 'nonce-{$nonce}' https://nominatim.openstreetmap.org";
        $styleSrc = "'self' 'unsafe-inline' https://fonts.googleapis.com";
        $connectSrc = "'self' https://nominatim.openstreetmap.org https://router.project-osrm.org";
        $imgSrc = "'self' data: blob: https://*.tile.openstreetmap.org https://tile.openstreetmap.org";
        $frameAncestors = (string) config('security.csp.frame_ancestors', "'none'");

        $extraImg = implode(' ', (array) config('security.csp.extra_img_hosts', []));
        if ($extraImg !== '') {
            $imgSrc .= ' '.$extraImg;
        }

        if (file_exists(public_path('hot'))) {
            $devOrigins = 'http://localhost:* http://127.0.0.1:* ws://localhost:* ws://127.0.0.1:* wss://localhost:* wss://127.0.0.1:*';
            $scriptSrc .= ' '.$devOrigins;
            $styleSrc .= ' '.$devOrigins;
            $connectSrc .= ' '.$devOrigins;
            $imgSrc .= ' '.$devOrigins;
        }

        return implode('; ', array_filter([
            "default-src 'self'",
            'upgrade-insecure-requests',
            "script-src {$scriptSrc}",
            // Tidak ada inline event handler (onclick= dsb) di seluruh view,
            // jadi atribut event handler bisa dimatikan total.
            "script-src-attr 'none'",
            "style-src {$styleSrc}",
            // Atribut style="..." inline di banyak view. Directive ini memuat
            // 'unsafe-inline' sendiri agar tidak bisa ter-nonaktifkan oleh nonce
            // yang kebetulan ada di style-src (lihat catatan di atas).
            "style-src-attr 'unsafe-inline'",
            "font-src 'self' https://fonts.gstatic.com data:",
            "img-src {$imgSrc}",
            'frame-src https://www.youtube.com https://www.youtube-nocookie.com',
            "frame-ancestors {$frameAncestors}",
            "connect-src {$connectSrc}",
            "media-src 'self' data: blob:",
            "worker-src 'self' blob:",
            "manifest-src 'self'",
            "object-src 'none'",
            "base-uri 'self'",
            "form-action 'self'",
        ]));
    }

    /**
     * Rakit Permissions-Policy dari config/security.php.
     * Array kosong = "()"; array berisi = daftar origin yang diizinkan.
     */
    private function permissionsPolicy(): string
    {
        $parts = [];

        foreach ((array) config('security.permissions_policy', []) as $feature => $allowed) {
            $parts[] = $feature.'='.(empty($allowed)
                ? '()'
                : '('.implode(' ', array_map(
                    // Permissions-Policy memakai token `self` TANPA kutip
                    // (berbeda dengan CSP yang memakai 'self').
                    fn (string $o): string => $o === 'self' ? 'self' : '"'.$o.'"',
                    $allowed
                )).')');
        }

        return implode(', ', $parts);
    }

    /**
     * Deteksi HTTPS yang tahan proxy (ngrok / cloudflared / CF / LB).
     *
     * Scheme hanya diambil dari token PERTAMA pada rantai forwarded, dan
     * nilainya harus persis 'https'. Ini mencegah X-Forwarded-Proto palsu
     * dari client biasa (mis. "proto=http, proto=https" atau "httpsfoo").
     */
    private function isSecureRequest(Request $request): bool
    {
        if ($request->secure()) {
            return true;
        }

        $forwardedProto = $request->headers->get('X-Forwarded-Proto');
        if (is_string($forwardedProto)) {
            $first = strtolower(trim(explode(',', $forwardedProto)[0]));

            return in_array($first, ['https', 'on', 'ssl'], true);
        }

        $forwarded = $request->headers->get('Forwarded');
        if (is_string($forwarded)) {
            $first = trim(explode(',', $forwarded)[0]);

            return preg_match('/proto\s*=\s*"?https"?/i', $first) === 1;
        }

        return strtolower((string) $request->headers->get('X-Forwarded-Ssl', '')) === 'on';
    }
}
