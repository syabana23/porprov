<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        // Behind a trusted proxy (ngrok/cloudflared) the app sees plain HTTP,
        // but the public URL is HTTPS. Force https so Vite/asset URLs are not
        // emitted as http and then blocked as mixed content by the browser.
        if ($request->secure() || $request->headers->get('X-Forwarded-Proto') === 'https') {
            URL::forceScheme('https');
        }

        // Generate a per-request nonce so inline scripts and the Vite bundle
        // can run without relying on 'unsafe-inline'.
        $nonce = Vite::useCspNonce();
        View::share('cspNonce', $nonce);

        $response = $next($request);

        // Remove server fingerprint headers
        $response->headers->remove('X-Powered-By');
        $response->headers->remove('Server');

        // Prevent clickjacking
        $response->headers->set('X-Frame-Options', 'DENY');

        // Prevent MIME-type sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Control referrer information leakage
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Restrict browser features
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=(), payment=()');

        // Isolate top-level browsing contexts from other origins
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin');

        // Force HTTPS for 1 year (only effective when served over HTTPS).
        // 'preload' makes the domain preload-eligible (hstspreload.org).
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains; preload');

        // Content Security Policy
        // nominatim.openstreetmap.org for geocode JSONP (peta venue route)
        // router.project-osrm.org for OSRM routing fetch (peta venue route)
        // youtube.com allowed for live-streaming iframe; fonts.googleapis.com for Poppins
        $response->headers->set('Content-Security-Policy',
            "default-src 'self'; ".
            "script-src 'self' 'nonce-{$nonce}' https://nominatim.openstreetmap.org; ".
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; ".
            "font-src 'self' https://fonts.gstatic.com; ".
            "img-src 'self' data: https:; ".
            'frame-src https://www.youtube.com https://www.youtube-nocookie.com; '.
            "frame-ancestors 'none'; ".
            "connect-src 'self' https://nominatim.openstreetmap.org https://router.project-osrm.org; ".
            "object-src 'none'; ".
            "base-uri 'self'; ".
            "form-action 'self';"
        );

        return $response;
    }
}
