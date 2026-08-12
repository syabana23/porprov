<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PANDU PORPROV')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo_baru.PNG') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body @yield('bodyClass')>
    <!-- SVG Filters untuk Mode Buta Warna -->
    <svg style="display:none">
        <filter id="protanopia-filter">
            <feColorMatrix type="matrix" values="0.567, 0.433, 0, 0, 0  0.558, 0.442, 0, 0, 0  0, 0.242, 0.758, 0, 0  0, 0, 0, 1, 0" />
        </filter>
        <filter id="deuteranopia-filter">
            <feColorMatrix type="matrix" values="0.625, 0.375, 0, 0, 0  0.7, 0.3, 0, 0, 0  0, 0.3, 0.7, 0, 0  0, 0, 0, 1, 0" />
        </filter>
        <filter id="tritanopia-filter">
            <feColorMatrix type="matrix" values="0.95, 0.05, 0, 0, 0  0, 0.433, 0.567, 0, 0  0, 0.475, 0.525, 0, 0  0, 0, 0, 1, 0" />
        </filter>
    </svg>

    <!-- Header -->
    <header class="site-header">
        <div class="header-inner">
            <a href="{{ url('/') }}" class="header-logo">
                <img src="{{ asset('images/logo_baru.PNG') }}" alt="Logo PORPROV XV">
                <span class="logo-divider" aria-hidden="true"></span>
                <span class="city-logo-row">
                    <img src="{{ asset('images/logobarukotabogor-.png') }}" alt="Logo Kota Bogor">
                    <img src="{{ asset('images/kota-bekasi.png') }}" alt="Logo Kota Bekasi">
                    <img src="{{ asset('images/kota-depok.png') }}" alt="Logo Kota Depok">
                </span>
            </a>
            <nav class="header-nav">
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">BERANDA</a>
                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link {{ (request()->is('jadwal') || request()->is('cabor*') || request()->is('kontingen')) ? 'active' : '' }}" data-nav-trigger aria-haspopup="true" aria-expanded="false">
                        PERTANDINGAN
                        <svg class="nav-caret" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6" />
                        </svg>
                    </a>
                    <div class="nav-dropdown">
                        <a href="{{ url('/jadwal') }}" class="{{ request()->is('jadwal') ? 'active' : '' }}">JADWAL</a>
                        <a href="{{ url('/cabor') }}" class="{{ request()->is('cabor*') ? 'active' : '' }}">CABOR</a>
                        <a href="{{ url('/kontingen') }}" class="{{ request()->is('kontingen') ? 'active' : '' }}">KONTINGEN</a>
                    </div>
                </div>
                <div class="nav-item has-dropdown">
                    <a href="#" class="nav-link {{ (request()->is('klasemen*') || request()->is('atlet')) ? 'active' : '' }}" data-nav-trigger aria-haspopup="true" aria-expanded="false">
                        KLASEMEN
                        <svg class="nav-caret" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6" />
                        </svg>
                    </a>
                    <div class="nav-dropdown">
                        <a href="{{ url('/klasemen-medali') }}" class="{{ request()->is('klasemen-medali') ? 'active' : '' }}">MEDALI</a>
                        <a href="{{ url('/atlet') }}" class="{{ request()->is('atlet') ? 'active' : '' }}">ATLET</a>
                    </div>
                </div>
                <a href="{{ url('/peta-venue') }}" class="{{ request()->is('peta-venue') ? 'active' : '' }}">PETA VENUE</a>
                <a href="{{ url('/fasilitas') }}" class="{{ request()->is('fasilitas') ? 'active' : '' }}">FASILITAS</a>
                <a href="{{ url('/galeri') }}" class="{{ request()->is('galeri') ? 'active' : '' }}">GALERI</a>
                <a href="{{ url('/kebijakan-privasi') }}" class="{{ request()->is('kebijakan-privasi') ? 'active' : '' }}">PRIVASI</a>
            </nav>
            <div class="header-actions">
                <!-- <a href="#" class="btn-login">Login</a> -->
            </div>
            <button class="hamburger" id="hamburger-btn" aria-label="Menu">
                <svg class="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg class="close-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </header>

    <!-- Mobile Nav -->
    <div class="mobile-nav-overlay" id="mobile-overlay"></div>
    <nav class="mobile-nav" id="mobile-nav">
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">BERANDA</a>
        <div class="mobile-nav-group">
            <button type="button" class="mobile-nav-parent">
                PERTANDINGAN
                <svg class="mobile-caret" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6" />
                </svg>
            </button>
            <div class="mobile-nav-sub">
                <a href="{{ url('/jadwal') }}" class="{{ request()->is('jadwal') ? 'active' : '' }}">JADWAL</a>
                <a href="{{ url('/cabor') }}" class="{{ request()->is('cabor*') ? 'active' : '' }}">CABOR</a>
                <a href="{{ url('/kontingen') }}" class="{{ request()->is('kontingen') ? 'active' : '' }}">KONTINGEN</a>
            </div>
        </div>
        <div class="mobile-nav-group">
            <button type="button" class="mobile-nav-parent">
                KLASEMEN
                <svg class="mobile-caret" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6" />
                </svg>
            </button>
            <div class="mobile-nav-sub">
                <a href="{{ url('/klasemen-medali') }}" class="{{ request()->is('klasemen-medali') ? 'active' : '' }}">MEDALI</a>
                <a href="{{ url('/atlet') }}" class="{{ request()->is('atlet') ? 'active' : '' }}">ATLET</a>
            </div>
        </div>
        <a href="{{ url('/peta-venue') }}" class="{{ request()->is('peta-venue') ? 'active' : '' }}">PETA VENUE</a>
        <a href="{{ url('/fasilitas') }}" class="{{ request()->is('fasilitas') ? 'active' : '' }}">FASILITAS</a>
        <a href="{{ url('/galeri') }}" class="{{ request()->is('galeri') ? 'active' : '' }}">GALERI</a>
        <a href="{{ url('/kebijakan-privasi') }}" class="{{ request()->is('kebijakan-privasi') ? 'active' : '' }}">PRIVASI</a>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Widget Aksesibilitas Lengkap Ala Kota Bogor -->
    <div class="a11y-widget">
        <div class="a11y-menu" id="a11yMenu">
            <h4>Aksesibilitas</h4>

            <!-- Ukuran Teks -->
            <div class="a11y-section-title">Ukuran Teks</div>
            <div class="a11y-group">
                <button class="a11y-option" id="btnFontSm">A- (Kecil)</button>
                <button class="a11y-option" id="btnFontNormal">A (Normal)</button>
                <button class="a11y-option" id="btnFontLg">A+ (Besar)</button>
                <button class="a11y-option" id="btnFontXl">A++ (Ekstra)</button>
            </div>

            <!-- Tampilan & Kontras -->
            <div class="a11y-section-title">Tampilan</div>
            <div class="a11y-group">
                <button class="a11y-option" id="btnHighContrast">Kontras Tinggi</button>
                <button class="a11y-option" id="btnGrayscale">Hitam Putih</button>
                <button class="a11y-option" id="btnNegative">Kontras Negatif</button>
                <button class="a11y-option" id="btnHighlightLinks">Sorot Tautan</button>
            </div>

            <!-- Font & Keterbacaan -->
            <div class="a11y-section-title">Keterbacaan & Navigasi</div>
            <div class="a11y-group full">
                <button class="a11y-option" id="btnReadableFont">Font Mudah Baca</button>
                <button class="a11y-option" id="btnVoiceMode">Mode Suara (TTS)</button>
            </div>

            <!-- Mode Buta Warna -->
            <div class="a11y-section-title">Mode Buta Warna</div>
            <div class="a11y-group">
                <button class="a11y-option" id="btnProtanopia">Protanopia</button>
                <button class="a11y-option" id="btnDeuteranopia">Deuteranop</button>
                <button class="a11y-option" id="btnTritanopia">Tritanopia</button>
                <button class="a11y-option" id="btnNormalColor">Normal</button>
            </div>

            <!-- Reset -->
            <div class="a11y-group full" style="margin-top: 4px;">
                <button class="a11y-option" id="btnResetA11y" style="background:#fef2f2; color:#b91c1c; border-color:#fca5a5;">
                    Reset Semua Pengaturan
                </button>
            </div>
        </div>

        <!-- Toggle Tombol Utama -->
        <button class="a11y-btn" id="a11yToggle" title="Menu Aksesibilitas">
            <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="4" r="2"></circle>
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 13v-2a3 3 0 00-3-3H8a3 3 0 00-3 3v2m6 2v4m-3-2h6"></path>
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 19a7 7 0 1014 0"></path>
            </svg>
        </button>
    </div>

    @include('partials.footer')

    <script>
        // Logika Hamburger Menu Mobile
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

        // ==========================================
        // Dropdown PERTANDINGAN (Desktop)
        // ==========================================
        const navTrigger = document.querySelector('.nav-item[data-nav-trigger], .nav-item .nav-link[data-nav-trigger], .nav-item .nav-link');
        const navItem = document.querySelector('.nav-item.has-dropdown');

        if (navTrigger && navItem) {
            const closeDesktopDropdown = () => {
                navItem.classList.remove('open');
                navTrigger.setAttribute('aria-expanded', 'false');
            };

            navTrigger.addEventListener('click', (e) => {
                e.preventDefault();
                const open = navItem.classList.toggle('open');
                navTrigger.setAttribute('aria-expanded', open ? 'true' : 'false');
            });

            document.addEventListener('click', (e) => {
                if (!navItem.contains(e.target)) closeDesktopDropdown();
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') closeDesktopDropdown();
            });
        }

        // ==========================================
        // Dropdown PERTANDINGAN (Mobile)
        // ==========================================
        document.querySelectorAll('.mobile-nav-group .mobile-nav-parent').forEach((parent) => {
            parent.addEventListener('click', () => {
                parent.parentElement.classList.toggle('open');
            });
        });

        // ==========================================
        // Logika Aksesibilitas Lengkap (A11y)
        // ==========================================
        const a11yToggle = document.getElementById('a11yToggle');
        const a11yMenu = document.getElementById('a11yMenu');

        // Buka tutup menu widget
        a11yToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            a11yMenu.classList.toggle('show');
        });

        // 1. Ukuran Teks
        const btnFontSm = document.getElementById('btnFontSm');
        const btnFontNormal = document.getElementById('btnFontNormal');
        const btnFontLg = document.getElementById('btnFontLg');
        const btnFontXl = document.getElementById('btnFontXl');

        function setFontSize(size) {
            document.documentElement.classList.remove('font-sm', 'font-lg', 'font-xl');
            document.body.classList.remove('font-sm', 'font-lg', 'font-xl');
            btnFontSm.classList.remove('active');
            btnFontNormal.classList.remove('active');
            btnFontLg.classList.remove('active');
            btnFontXl.classList.remove('active');

            if (size !== 'normal') {
                document.documentElement.classList.add(`font-${size}`);
                document.body.classList.add(`font-${size}`);
                document.getElementById(`btnFont${size.charAt(0).toUpperCase() + size.slice(1)}`).classList.add('active');
                localStorage.setItem('a11y_fontsize', size);
            } else {
                btnFontNormal.classList.add('active');
                localStorage.removeItem('a11y_fontsize');
            }
        }

        btnFontSm.addEventListener('click', () => setFontSize('sm'));
        btnFontNormal.addEventListener('click', () => setFontSize('normal'));
        btnFontLg.addEventListener('click', () => setFontSize('lg'));
        btnFontXl.addEventListener('click', () => setFontSize('xl'));

        // 2. Kontras Tinggi, Hitam Putih, Kontras Negatif, Sorot Tautan, Font Mudah Baca
        const btnHighContrast = document.getElementById('btnHighContrast');
        const btnGrayscale = document.getElementById('btnGrayscale');
        const btnNegative = document.getElementById('btnNegative');
        const btnHighlightLinks = document.getElementById('btnHighlightLinks');
        const btnReadableFont = document.getElementById('btnReadableFont');

        btnHighContrast.addEventListener('click', () => {
            const isContrast = document.documentElement.classList.toggle('high-contrast');
            document.body.classList.toggle('high-contrast');
            btnHighContrast.classList.toggle('active', isContrast);
            localStorage.setItem('a11y_highContrast', isContrast);
        });

        btnGrayscale.addEventListener('click', () => {
            const isGrayscale = document.documentElement.classList.toggle('grayscale-mode');
            document.body.classList.toggle('grayscale-mode');
            btnGrayscale.classList.toggle('active', isGrayscale);
            localStorage.setItem('a11y_grayscale', isGrayscale);
        });

        btnNegative.addEventListener('click', () => {
            const isNegative = document.documentElement.classList.toggle('negative-contrast');
            document.body.classList.toggle('negative-contrast');
            btnNegative.classList.toggle('active', isNegative);
            localStorage.setItem('a11y_negative', isNegative);
        });

        btnHighlightLinks.addEventListener('click', () => {
            const isHighlight = document.documentElement.classList.toggle('highlight-links');
            document.body.classList.toggle('highlight-links');
            btnHighlightLinks.classList.toggle('active', isHighlight);
            localStorage.setItem('a11y_highlightLinks', isHighlight);
        });

        btnReadableFont.addEventListener('click', () => {
            const isReadable = document.documentElement.classList.toggle('readable-font');
            document.body.classList.toggle('readable-font');
            btnReadableFont.classList.toggle('active', isReadable);
            localStorage.setItem('a11y_readableFont', isReadable);
        });

        // 3. Mode Buta Warna
        const btnProtanopia = document.getElementById('btnProtanopia');
        const btnDeuteranopia = document.getElementById('btnDeuteranopia');
        const btnTritanopia = document.getElementById('btnTritanopia');
        const btnNormalColor = document.getElementById('btnNormalColor');

        function setBlindnessFilter(filterType) {
            document.documentElement.classList.remove('filter-protanopia', 'filter-deuteranopia', 'filter-tritanopia');
            document.body.classList.remove('filter-protanopia', 'filter-deuteranopia', 'filter-tritanopia');
            btnProtanopia.classList.remove('active');
            btnDeuteranopia.classList.remove('active');
            btnTritanopia.classList.remove('active');
            btnNormalColor.classList.add('active');

            if (filterType !== 'normal') {
                document.documentElement.classList.add(`filter-${filterType}`);
                document.body.classList.add(`filter-${filterType}`);
                document.getElementById(`btn${filterType.charAt(0).toUpperCase() + filterType.slice(1)}`).classList.add('active');
                btnNormalColor.classList.remove('active');
                localStorage.setItem('a11y_colorBlind', filterType);
            } else {
                localStorage.removeItem('a11y_colorBlind');
            }
        }

        btnProtanopia.addEventListener('click', () => setBlindnessFilter('protanopia'));
        btnDeuteranopia.addEventListener('click', () => setBlindnessFilter('deuteranopia'));
        btnTritanopia.addEventListener('click', () => setBlindnessFilter('tritanopia'));
        btnNormalColor.addEventListener('click', () => setBlindnessFilter('normal'));

        // 4. Mode Suara (Text-to-Speech)
        const btnVoiceMode = document.getElementById('btnVoiceMode');
        let isVoiceModeActive = false;

        function speakText(text) {
            if (!text || !isVoiceModeActive) return;
            window.speechSynthesis.cancel();
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'id-ID';
            utterance.rate = 1;
            window.speechSynthesis.speak(utterance);
        }

        btnVoiceMode.addEventListener('click', (e) => {
            e.stopPropagation();
            isVoiceModeActive = !isVoiceModeActive;
            btnVoiceMode.classList.toggle('active', isVoiceModeActive);

            if (isVoiceModeActive) {
                localStorage.setItem('a11y_voiceMode', 'true');
                speakText("Mode suara diaktifkan");
            } else {
                localStorage.removeItem('a11y_voiceMode');
                window.speechSynthesis.cancel();
            }
        });

        // Navigasi Instan & Pembaca Suara Global
        document.body.addEventListener('click', (e) => {
            let link = e.target.closest('a');

            if (link && isVoiceModeActive) {
                let linkText = link.getAttribute('aria-label') || link.innerText || link.textContent || "halaman baru";
                linkText = linkText.trim().replace(/\s+/g, ' ');
                localStorage.setItem('a11y_pending_speech', "Membuka " + linkText);
                return;
            }

            if (!isVoiceModeActive) return;
            if (e.target.closest('.a11y-widget')) return;

            let target = e.target;
            let textToRead = "";

            if (target.tagName.toLowerCase() === 'img') {
                textToRead = target.getAttribute('alt') || "Gambar tanpa keterangan";
            } else if (target.tagName.toLowerCase() === 'input' || target.tagName.toLowerCase() === 'textarea') {
                textToRead = target.getAttribute('placeholder') || target.value || target.name || "Kolom masukan data";
            } else {
                textToRead = target.getAttribute('aria-label') || target.innerText || target.textContent;
            }

            if (textToRead) {
                textToRead = textToRead.trim().replace(/\s+/g, ' ');
            }
            if (textToRead && textToRead.length > 150) {
                textToRead = textToRead.substring(0, 100) + "...";
            }
            if (textToRead) {
                speakText(textToRead);
            }
        });

        // 5. Reset Semua Pengaturan
        const btnResetA11y = document.getElementById('btnResetA11y');
        btnResetA11y.addEventListener('click', () => {
            document.documentElement.className = '';
            document.body.className = '';
            // Remove only accessibility keys — preserve chat history and theme
            ['a11y_fontsize','a11y_highContrast','a11y_grayscale','a11y_negative',
             'a11y_highlightLinks','a11y_readableFont','a11y_colorBlind','a11y_voiceMode',
             'a11y_pending_speech','theme'].forEach(k => localStorage.removeItem(k));

            // Reset status tombol
            btnFontNormal.classList.add('active');
            btnNormalColor.classList.add('active');
            [btnFontSm, btnFontLg, btnFontXl, btnHighContrast, btnGrayscale, btnNegative, btnHighlightLinks, btnReadableFont, btnVoiceMode, btnProtanopia, btnDeuteranopia, btnTritanopia].forEach(btn => btn.classList.remove('active'));

            isVoiceModeActive = false;
            window.speechSynthesis.cancel();
            a11yMenu.classList.remove('show');
        });

        // Tutup menu jika mengklik luar widget
        document.addEventListener('click', (e) => {
            if (a11yMenu.classList.contains('show') && !e.target.closest('.a11y-widget')) {
                a11yMenu.classList.remove('show');
            }
        });

        // Load Preferensi Saat Halaman Dimuat
        window.addEventListener('DOMContentLoaded', () => {
            // Navbar glass → solid on scroll (semua halaman)
            const header = document.querySelector('.site-header');
            if (header) {
                const target = document.querySelector('.hero-wrapper') || document.querySelector('.page-banner');
                if (target) {
                    new IntersectionObserver(entries => {
                        header.classList.toggle('scrolled', !entries[0].isIntersecting);
                    }, {
                        threshold: 0,
                        rootMargin: '-1px 0px 0px 0px'
                    }).observe(target);
                }
            }
            const savedFont = localStorage.getItem('a11y_fontsize');
            if (savedFont) setFontSize(savedFont);
            else btnFontNormal.classList.add('active');

            if (localStorage.getItem('a11y_highContrast') === 'true') {
                document.documentElement.classList.add('high-contrast');
                document.body.classList.add('high-contrast');
                btnHighContrast.classList.add('active');
            }
            if (localStorage.getItem('a11y_grayscale') === 'true') {
                document.documentElement.classList.add('grayscale-mode');
                document.body.classList.add('grayscale-mode');
                btnGrayscale.classList.add('active');
            }
            if (localStorage.getItem('a11y_negative') === 'true') {
                document.documentElement.classList.add('negative-contrast');
                document.body.classList.add('negative-contrast');
                btnNegative.classList.add('active');
            }
            if (localStorage.getItem('a11y_highlightLinks') === 'true') {
                document.documentElement.classList.add('highlight-links');
                document.body.classList.add('highlight-links');
                btnHighlightLinks.classList.add('active');
            }
            if (localStorage.getItem('a11y_readableFont') === 'true') {
                document.documentElement.classList.add('readable-font');
                document.body.classList.add('readable-font');
                btnReadableFont.classList.add('active');
            }

            const savedColorBlind = localStorage.getItem('a11y_colorBlind');
            if (savedColorBlind) setBlindnessFilter(savedColorBlind);
            else btnNormalColor.classList.add('active');

            if (localStorage.getItem('a11y_voiceMode') === 'true') {
                isVoiceModeActive = true;
                btnVoiceMode.classList.add('active');
            }

            const pendingSpeech = localStorage.getItem('a11y_pending_speech');
            if (pendingSpeech) {
                localStorage.removeItem('a11y_pending_speech');
                setTimeout(() => {
                    speakText(pendingSpeech);
                }, 300);
            }
        });
    </script>
    @stack('scripts')
    @include('components.chatbot')
</body>

</html>