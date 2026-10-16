<?php

use App\Http\Middleware\SecurityHeaders;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Trust proxy dari env agar artisan serve + ngrok tetap membaca
        // scheme/IP asli. trustProxies('*') dibutuhkan karena IP edge ngrok
        // free berubah-ubah; mitigasi spoofing ada di middleware
        // SecurityHeaders (hanya token PERTAMA X-Forwarded-Proto yang
        // dipercaya) + TRUSTED_HOSTS opsional di bawah.
        $middleware->trustProxies(at: array_filter(array_map(
            'trim',
            explode(',', (string) env('TRUSTED_PROXIES', '*'))
        )) ?: ['*']);

        // Kosong = semua host diterima (agar URL ngrok acak tetap bisa
        // diakses). Di produksi isi dengan domain asli, mis.
        // TRUSTED_HOSTS=domain-anda.go.id.
        $trustedHosts = array_filter(array_map(
            'trim',
            explode(',', (string) env('TRUSTED_HOSTS', ''))
        ));
        if ($trustedHosts !== []) {
            $middleware->trustHosts(at: $trustedHosts);
        }

        $middleware->web(append: [
            SecurityHeaders::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
    })->create();
