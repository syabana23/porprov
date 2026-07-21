<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PORPROV XV KOTA BOGOR 2026')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f5f7;
            margin: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        /* Header */
        .site-header {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            height: 60px;
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .header-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            flex-shrink: 0;
        }

        .header-logo img {
            height: 44px;
            width: auto;
        }

        .header-logo-text {
            line-height: 1.15;
        }

        .header-logo-text .top {
            font-size: 13px;
            font-weight: 800;
            color: #013469;
            letter-spacing: 0.03em;
        }

        .header-logo-text .bottom {
            font-size: 10px;
            font-weight: 500;
            color: #013469;
        }

        .header-nav {
            display: flex;
            align-items: center;
            gap: 4px;
            flex: 1;
            justify-content: center;
        }

        .header-nav a {
            font-size: 12.5px;
            font-weight: 600;
            color: #4b5563;
            text-decoration: none;
            padding: 6px 10px;
            transition: color 0.2s;
            white-space: nowrap;
            text-transform: uppercase;
            letter-spacing: 0.02em;
        }

        .header-nav a:hover,
        .header-nav a.active {
            color: #013469;
        }

        .header-nav a.active {
            border-bottom: 2.5px solid #013469;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .header-search {
            display: flex;
            align-items: center;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            border-radius: 20px;
            padding: 4px 12px;
            gap: 6px;
        }

        .header-search input {
            background: none;
            border: none;
            outline: none;
            font-size: 12px;
            font-family: 'Poppins', sans-serif;
            color: #6b7280;
            width: 100px;
        }

        .header-search svg {
            color: #9ca3af;
            flex-shrink: 0;
        }

        .btn-login {
            background: #013469;
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            border: none;
            border-radius: 6px;
            padding: 6px 16px;
            cursor: pointer;
            text-decoration: none;
        }

        /* Hamburger */
        .hamburger {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            z-index: 200;
        }
        .hamburger svg {
            width: 24px;
            height: 24px;
            stroke: #013469;
        }
        .hamburger .close-icon { display: none; }
        .hamburger.open .menu-icon { display: none; }
        .hamburger.open .close-icon { display: block; }

        /* Mobile Nav Overlay */
        .mobile-nav-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.4);
            z-index: 150;
        }
        .mobile-nav-overlay.show { display: block; }

        .mobile-nav {
            display: none;
        }

        @media (max-width: 768px) {
            .hamburger { display: flex; }

            .header-nav {
                display: none;
            }

            .header-search {
                display: none;
            }

            .mobile-nav {
                display: flex;
                flex-direction: column;
                position: fixed;
                top: 0;
                right: -280px;
                width: 280px;
                height: 100%;
                background: #fff;
                z-index: 160;
                padding: 70px 20px 24px;
                box-shadow: -4px 0 20px rgba(0,0,0,0.15);
                transition: right 0.3s ease;
                overflow-y: auto;
            }
            .mobile-nav.open {
                right: 0;
            }

            .mobile-nav a {
                font-size: 14px;
                font-weight: 600;
                color: #374151;
                text-decoration: none;
                padding: 12px 0;
                border-bottom: 1px solid #f3f4f6;
                text-transform: uppercase;
                letter-spacing: 0.02em;
            }
            .mobile-nav a:hover,
            .mobile-nav a.active {
                color: #013469;
            }

            .header-inner {
                height: 56px;
                gap: 12px;
            }

            .header-logo img {
                height: 36px;
            }

            .header-logo-text .top {
                font-size: 12px;
            }

            .header-logo-text .bottom {
                font-size: 9px;
            }

            .header-actions {
                display: none;
            }
        }

        /* Footer */
        .site-footer {
            background: #013469;
            color: #fff;
            text-align: center;
            padding: 14px 20px;
            font-size: 13px;
            font-weight: 500;
        }

        /* ── Shared Page Banner ── */
        .page-banner {
            position: relative;
            background: linear-gradient(135deg, #013469 0%, #0a4fa8 55%, #0d63cc 100%);
            min-height: 160px;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .page-banner::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.04) 0%, transparent 60%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.04) 0%, transparent 50%);
        }

        .page-banner .banner-bg-img {
            position: absolute;
            right: 0;
            top: 0;
            width: 50%;
            height: 100%;
            object-fit: cover;
            opacity: 0.1;
            mask-image: linear-gradient(to left, rgba(0, 0, 0, 1) 0%, transparent 100%);
            -webkit-mask-image: linear-gradient(to left, rgba(0, 0, 0, 1) 0%, transparent 100%);
        }

        .page-banner .banner-inner {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 36px 28px;
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .page-banner .banner-icon {
            width: 58px;
            height: 58px;
            background: rgba(255, 255, 255, 0.10);
            border: 1.5px solid rgba(255, 255, 255, 0.20);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            backdrop-filter: blur(8px);
        }

        .page-banner .banner-text h1 {
            color: #fff;
            font-size: 28px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin: 0 0 6px;
            line-height: 1.15;
        }

        .page-banner .banner-text .banner-badge {
            display: inline-block;
            background: #FDB813;
            color: #013469;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 10px;
            border-radius: 20px;
            letter-spacing: 0.04em;
            margin-bottom: 6px;
        }

        .page-banner .banner-text p {
            color: rgba(200, 220, 255, 0.85);
            font-size: 13px;
            margin: 0;
            line-height: 1.55;
        }

        .page-banner .banner-accent-line {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(to right, #FDB813, transparent 60%);
        }

        .page-banner .banner-mascot {
            position: absolute;
            right: 4%;
            bottom: 0;
            height: 135%;
            z-index: 3;
            object-fit: contain;
            pointer-events: none;
            filter: drop-shadow(0 4px 24px rgba(0, 0, 0, 0.3));
        }

        @media (max-width: 768px) {
            .page-banner {
                min-height: 120px;
            }

            .page-banner .banner-text h1 {
                font-size: 20px;
            }

            .page-banner .banner-mascot {
                display: none;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    <!-- Header -->
    <header class="site-header">
        <div class="header-inner">
            <a href="{{ url('/') }}" class="header-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo PORPROV XV">
                <div class="header-logo-text">
                    <div class="top">PORPROV XV</div>
                    <div class="bottom">KOTA BOGOR 2026</div>
                </div>
            </a>
            <nav class="header-nav">
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">BERANDA</a>
                <!-- <a href="{{ url('/berita') }}" class="{{ request()->is('berita') ? 'active' : '' }}">BERITA</a> -->
                <a href="{{ url('/jadwal') }}" class="{{ request()->is('jadwal') ? 'active' : '' }}">JADWAL</a>
                <a href="{{ url('/peta-venue') }}" class="{{ request()->is('peta-venue') ? 'active' : '' }}">PETA VENUE</a>
                <a href="{{ url('/kesehatan') }}" class="{{ request()->is('kesehatan') ? 'active' : '' }}">KESEHATAN</a>
                <a href="{{ url('/galeri') }}" class="{{ request()->is('galeri') ? 'active' : '' }}">GALERI</a>
            </nav>
            <div class="header-actions">
                <!-- <a href="#" class="btn-login">Login</a> -->
            </div>
            <button class="hamburger" id="hamburger-btn" aria-label="Menu">
                <svg class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg class="close-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </header>

    <!-- Mobile Nav -->
    <div class="mobile-nav-overlay" id="mobile-overlay"></div>
    <nav class="mobile-nav" id="mobile-nav">
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">BERANDA</a>
        <a href="{{ url('/jadwal') }}" class="{{ request()->is('jadwal') ? 'active' : '' }}">JADWAL</a>
        <a href="{{ url('/peta-venue') }}" class="{{ request()->is('peta-venue') ? 'active' : '' }}">PETA VENUE</a>
        <a href="{{ url('/kesehatan') }}" class="{{ request()->is('kesehatan') ? 'active' : '' }}">KESEHATAN</a>
        <a href="{{ url('/galeri') }}" class="{{ request()->is('galeri') ? 'active' : '' }}">GALERI</a>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        &copy; 2026 Pemerintah Kota Bogor
    </footer>

    @stack('scripts')

    <script>
        const hamburger = document.getElementById('hamburger-btn');
        const mobileNav = document.getElementById('mobile-nav');
        const mobileOverlay = document.getElementById('mobile-overlay');

        function toggleMobileNav() {
            hamburger.classList.toggle('open');
            mobileNav.classList.toggle('open');
            mobileOverlay.classList.toggle('show');
            document.body.style.overflow = mobileNav.classList.contains('open') ? 'hidden' : '';
        }

        if (hamburger) hamburger.addEventListener('click', toggleMobileNav);
        if (mobileOverlay) mobileOverlay.addEventListener('click', toggleMobileNav);
    </script>
</body>

</html>