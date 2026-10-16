<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Force HTTPS
    |--------------------------------------------------------------------------
    |
    | Tri-state: null (default, bila FORCE_HTTPS tidak diset) = auto, true
    | hanya bila APP_URL berawalan https://. Dipindah ke sini (bukan env()
    | langsung di middleware) agar tetap terbaca saat `config:cache`.
    |
    */
    'force_https' => env('FORCE_HTTPS') === null
        ? str_starts_with((string) env('APP_URL', ''), 'https://')
        : filter_var(env('FORCE_HTTPS'), FILTER_VALIDATE_BOOL),

    /*
    |--------------------------------------------------------------------------
    | HSTS
    |--------------------------------------------------------------------------
    |
    | 'preload' hanya dinyalakan di domain milik sendiri yang SELURUH
    | subdomainnya sudah HTTPS. Tunnel ngrok TIDAK bisa di-preload.
    |
    */
    'hsts' => [
        'enabled' => filter_var(env('HSTS_ENABLED', true), FILTER_VALIDATE_BOOL),
        'max_age' => (int) env('HSTS_MAX_AGE', 63072000),
        'include_subdomains' => filter_var(env('HSTS_INCLUDE_SUBDOMAINS', true), FILTER_VALIDATE_BOOL),
        'preload' => filter_var(env('HSTS_PRELOAD', false), FILTER_VALIDATE_BOOL),
    ],

    /*
    |--------------------------------------------------------------------------
    | Content Security Policy
    |--------------------------------------------------------------------------
    |
    | 'report_only' = kirim Content-Security-Policy-Report-Only (tidak
    | memblokir apa pun). WAJIB dikembalikan ke false sebelum scan ulang,
    | karena scanner hanya menilai header enforcing.
    |
    */
    'csp' => [
        'report_only' => filter_var(env('CSP_REPORT_ONLY', false), FILTER_VALIDATE_BOOL),
        'frame_ancestors' => env('CSP_FRAME_ANCESTORS', "'none'"),
        // Default memuat images.unsplash.com karena thumbnail
        // berita/kesehatan masih memakai host tersebut. Host spesifik
        // tetap Grade A (berbeda dengan wildcard https: yang longgar).
        // Kosongkan via env hanya bila semua gambar sudah self-host.
        'extra_img_hosts' => array_values(array_filter(array_map(
            'trim',
            explode(',', (string) env('CSP_EXTRA_IMG_HOSTS', 'https://images.unsplash.com'))
        ))),
    ],

    /*
    |--------------------------------------------------------------------------
    | Permissions Policy
    |--------------------------------------------------------------------------
    |
    | Array kosong = fitur dimatikan "()". Array berisi = origin yang
    | diizinkan, mis. ['self', 'https://www.youtube.com'].
    |
    */
    'permissions_policy' => [
        'accelerometer' => [],
        'ambient-light-sensor' => [],
        'autoplay' => [],
        'battery' => [],
        'camera' => [],
        'cross-origin-isolated' => [],
        'display-capture' => [],
        'document-domain' => [],
        'encrypted-media' => [],
        'execution-while-not-rendered' => [],
        'execution-while-out-of-viewport' => [],
        'fullscreen' => ['self', 'https://www.youtube.com', 'https://www.youtube-nocookie.com'],
        'gamepad' => [],
        'geolocation' => [],
        'gyroscope' => [],
        'hid' => [],
        'idle-detection' => [],
        'local-fonts' => [],
        'magnetometer' => [],
        'microphone' => [],
        'midi' => [],
        'payment' => [],
        'picture-in-picture' => ['self', 'https://www.youtube.com', 'https://www.youtube-nocookie.com'],
        'publickey-credentials-get' => [],
        'screen-wake-lock' => [],
        'serial' => [],
        'usb' => [],
        'web-share' => [],
        'xr-spatial-tracking' => [],
    ],
];
