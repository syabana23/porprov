@extends('layouts.app')

@section('title', 'PANDU PORPROV - Beranda')
@section('bodyClass', 'beranda')



@section('content')

@php
$bg1 = asset('images/venue1.jpeg');
$bg2 = asset('images/venue2.jpeg');
$bg3 = asset('images/venue3.jpeg');
$bg4 = asset('images/venue4.jpeg');
@endphp

<!-- ═══════════════════════════════════════════════════════════════════
     1. HERO SECTION WITH VENUE SLIDESHOW BACKGROUND & CABOR ICONS
     ═══════════════════════════════════════════════════════════════════ -->
<section class="hero-wrapper hero-slideshow">
    <!-- Slideshow Backgrounds (4 venue images + CABOR icons) -->
    <div class="hero-slides" id="hero-slides">
        <!-- Slide 1: GOR Pajajaran Indoor A & B -->
        <div class="hero-slide active" style="background-image: url('{{ $bg1 }}')">
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-cabor">
                <img src="{{ asset('images/cabor/12.PENCAK SILAT.png') }}" alt="Pencak Silat">
            </div>
        </div>
        <!-- Slide 2: Stadion Pajajaran -->
        <div class="hero-slide" style="background-image: url('{{ $bg2 }}')">
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-cabor">
                <img src="{{ asset('images/cabor/7.MENEMBAK.png') }}" alt="Menembak">
            </div>
        </div>
        <!-- Slide 3: GOR Vokasi IPB -->
        <div class="hero-slide" style="background-image: url('{{ $bg3 }}')">
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-cabor">
                <img src="{{ asset('images/cabor/5.PANAHAN.png') }}" alt="Panahan">
            </div>
        </div>
        <!-- Slide 4: GOR Yasmin -->
        <div class="hero-slide" style="background-image: url('{{ $bg4 }}')">
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-cabor">
                <img src="{{ asset('images/cabor/19.TARUNG DERAJAT.png') }}" alt="Tarung Derajat">
            </div>
        </div>
    </div>

    <!-- Floating Particles -->
    <div class="hero-particles">
        <span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span>
    </div>

    <div class="hero-container">
        <!-- Hero Text Content -->
        <div class="hero-content">
            <div class="hero-pill-badge">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                </svg>
                Menuju Ajang Olahraga Terbesar Jawa Barat
            </div>

            <h1 class="hero-title">
                PANDU PORPROV <span class="yellow-accent">KOTA BOGOR 2026</span>
            </h1>

            <div class="hero-tagline-bubble">
                "Bersatu, Berprestasi, Bogor Juara!"
            </div>

            <p class="hero-desc">
                Semangat sportivitas, persaudaraan dan prestasi untuk membangun Jawa Barat yang lebih maju. Kota Bogor siap menjadi tuan rumah yang ramah dan menginspirasi.
            </p>

            <div class="hero-actions">
                <a href="{{ url('/jadwal') }}" class="btn-hero-primary">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Lihat Jadwal
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
                <a href="{{ url('/peta-venue') }}" class="btn-hero-secondary">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Peta Venue
                </a>
            </div>
        </div>

    </div>

    <!-- Bottom Curve Wave -->
    <div class="hero-bottom-curve">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,20 1200,60 L1200,120 L0,120 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     2. STATISTICS OVERLAP CARDS
     ═══════════════════════════════════════════════════════════════════ -->
<div class="stats-overlap-container reveal">
    <div class="stats-grid">
        <!-- Stat Item 1: Titik Venue -->
        <div class="stat-card-item reveal" style="--i: 0">
<div class="stat-icon-square blue">
                 <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z" />
                 </svg>
             </div>
             <div>
                 <div class="stat-val">13+</div>
                 <div class="stat-title">Titik Venue</div>
                 <div class="stat-sub">Tempat Bertanding</div>
             </div>
        </div>

        <!-- Stat Item 2: Cabor -->
        <div class="stat-card-item reveal" style="--i: 1">
<div class="stat-icon-square yellow">
                 <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M19 5h-2V3H7v2H5c-1.1 0-2 .9-2 2v1c0 2.55 1.92 4.63 4.39 4.94.63 1.5 1.98 2.63 3.61 2.96V19H7v2h10v-2h-4v-3.1c1.63-.33 2.98-1.46 3.61-2.96C19.08 12.63 21 10.55 21 8V7c0-1.1-.9-2-2-2zM5 8V7h2v3.82C5.84 10.4 5 9.3 5 8zm14 0c0 1.3-.84 2.4-2 2.82V7h2v1z" />
                 </svg>
             </div>
             <div>
                 <div class="stat-val">28+</div>
                 <div class="stat-title">Cabang Olahraga</div>
                 <div class="stat-sub">Kompetisi Bergengsi</div>
             </div>
        </div>

        <!-- Stat Item 3: Peserta -->
        <div class="stat-card-item reveal" style="--i: 2">
<div class="stat-icon-square navy">
                 <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                 </svg>
             </div>
             <div>
                 <div class="stat-val">-</div>
                 <div class="stat-title">Peserta</div>
                 <div class="stat-sub">Atlet Yang Bertanding</div>
             </div>
        </div>

        <!-- Stat Item 4: Fasilitas -->
        <div class="stat-card-item reveal" style="--i: 3">
<div class="stat-icon-square green">
                 <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                 </svg>
             </div>
             <div>
                 <div class="stat-val">165+</div>
                 <div class="stat-title">Fasilitas</div>
                 <div class="stat-sub">Segala Kebutuhan & Layanan</div>
             </div>
        </div>
    </div>
</div>

<!-- ═══════════════════════════════════════════════════════════════════
     DIVIDER
     ═══════════════════════════════════════════════════════════════════ -->
<div class="section-divider">
    <hr>
</div>

<!-- ═══════════════════════════════════════════════════════════════════
     3. MAP & NEARBY FACILITIES SIDE-BY-SIDE SECTION
     ═══════════════════════════════════════════════════════════════════ -->
<section class="section-wrap reveal">
    <div class="section-header-flex">
        <div>
            <div class="section-title-group">
                <div class="section-bar"></div>
                <h2 class="section-heading">Peta Lokasi Venue & Fasilitas</h2>
            </div>
            <p class="section-subtitle">Temukan lokasi venue pertandingan dan fasilitas umum terdekat di Kota Bogor</p>
        </div>
    </div>

    <div class="map-section-grid">
        <!-- LEFT: INTERACTIVE MAP -->
        <div class="map-box-card">
            <div class="map-container-wrap">
                <div id="map-canvas"></div>
            </div>

            <!-- Dynamic Selected Venue Detail Card inside Left Column -->
            <div class="home-gor-card" id="floating-gor-card">
                <div class="gor-card-header">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z" />
                    </svg>
                    <span id="card-gor-name">-</span>
                </div>
                <div class="gor-card-body">
                    <div class="addr">
                        <span id="card-gor-addr">-</span>
                    </div>
                    <div class="cabor-grid" id="card-gor-cabor-grid"></div>
                    <a href="#" id="card-gor-gmaps" target="_blank" class="map-btn">
                        <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 19H5V5h7V3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z" />
                        </svg>
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>

        <!-- RIGHT: SEARCH FILTER & NEARBY FACILITIES -->
        <div class="facilities-panel-card">
            <!-- Filter Form -->
            <form id="map-filter-form" class="filter-form-clean">
                <div class="full-width">
                    <select class="filter-select-styled" id="fasilitas">
                        <option value="">Semua Fasilitas Terdekat</option>
                        <option value="hotel">Hotel & Penginapan</option>
                        <option value="rumah-sakit">Rumah Sakit & Klinik</option>
                        <option value="apotek">Apotek</option>
                        <option value="rumah-makan">Restoran & Kuliner</option>
                        <option value="polisi">Polisi & Keamanan</option>
                        <option value="transport">Sewa Kendaraan</option>
                    </select>
                </div>

                <div>
                    <select class="filter-select-styled" id="cabor">
                        <option value="">Filter Cabang Olahraga</option>
                        <option value="aerosport">Aerosport - Gantolle</option>
                        <option value="aerosport">Aerosport - Paralayang</option>
                        <option value="anggar">Anggar</option>
                        <option value="dansa">Dansa</option>
                        <option value="angkat berat">Angkat Berat</option>
                        <option value="angkat besi">Angkat Besi</option>
                        <option value="arung jeram">Arung Jeram</option>
                        <option value="binaraga">Binaraga</option>
                        <option value="bola tangan">Bola Tangan Indoor</option>
                        <option value="bola tangan">Bola Tangan Pasir</option>
                        <option value="drumband">Drumband</option>
                        <option value="gimnastik">Gimnastik Aerobik</option>
                        <option value="gimnastik">Gimnastik Artistik</option>
                        <option value="gimnastik">Gimnastik Ritmik</option>
                        <option value="judo">Judo</option>
                        <option value="kurash">Kurash</option>
                        <option value="menembak">Menembak</option>
                        <option value="modern pentathlon">Modern Pentathlon</option>
                        <option value="panahan">Panahan</option>
                        <option value="panjat tebing">Panjat Tebing</option>
                        <option value="pencak silat">Pencak Silat</option>
                        <option value="petanque">Pentaque</option>
                        <option value="sambo">Sambo</option>
                        <option value="shorinji kempo">Shorinji Kempo</option>
                        <option value="ski air">Ski Air</option>
                        <option value="taekwondo">Taekwondo</option>
                        <option value="tarung derajat">Tarung Derajat</option>
                        <option value="tenis meja">Tenis Meja</option>
                    </select>
                </div>

                <div>
                    <select class="filter-select-styled" id="venue">
                        <option value="">Filter Nama Venue</option>
                        <option value="gor pajajaran indoor a">GOR Pajajaran Indoor A</option>
                        <option value="gor pajajaran indoor b">GOR Pajajaran Indoor B</option>
                        <option value="gor vokasi ipb">GOR Vokasi IPB</option>
                        <option value="gor yasmin">GOR Yasmin</option>
                        <option value="stadion pajajaran">Stadion Pajajaran</option>
                        <option value="green forest hotel">Green Forest Hotel</option>
                        <option value="ppsdmap kemenhub kemang">PPSDMAP Kemenhub Kemang</option>
                        <option value="padepokan voli sentul">Padepokan Voli Sentul</option>
                        <option value="gunung mas">Gunung Mas</option>
                        <option value="cisangkan">Cisangkan</option>
                        <option value="arcamanik">Arcamanik</option>
                        <option value="kota baru parahyangan">Kota Baru Parahyangan</option>
                        <option value="majalengka">Majalengka</option>
                    </select>
                </div>

                <div class="filter-actions">
                    <button type="submit" class="btn-search-blue">Terapkan Filter</button>
                    <button type="reset" class="btn-reset-light">Reset</button>
                </div>
            </form>

            <!-- Category Tabs -->
            <div class="facility-tabs-bar">
                <button class="facility-filter-btn active" data-filter="all">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    Semua
                </button>
                <button class="facility-filter-btn" data-filter="cat-hotel">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
                    </svg>
                    Hotel
                </button>
                <button class="facility-filter-btn" data-filter="cat-rs">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z" />
                    </svg>
                    Kesehatan
                </button>
                <button class="facility-filter-btn" data-filter="cat-resto">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-7v8h2.5v8H21V2h-5z" />
                    </svg>
                    Restoran
                </button>
                <button class="facility-filter-btn" data-filter="cat-police">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                    </svg>
                    Polisi
                </button>
                <button class="facility-filter-btn" data-filter="cat-apotek">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z" />
                    </svg>
                    Apotek
                </button>
                <button class="facility-filter-btn" data-filter="cat-transport">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5-1.5zM5 11l1.5-4.5h11L19 11H5z" />
                    </svg>
                    Sewa Kendaraan
                </button>
            </div>

            <!-- Scrollable Facility Results List -->
            <div class="facilities-scroll-list" id="facilities-list-wrap">
                <div class="facilities-empty" id="facilities-placeholder" style="text-align:center; padding:35px 10px; color:#94a3b8; font-size:12.5px; font-style:italic;">
                    Klik marker venue di peta untuk menampilkan daftar fasilitas terdekat secara otomatis.
                </div>

                <!-- Hotel -->
                <div class="facility-category" id="cat-hotel" style="display:none;">
                    <div class="facility-cat-header">
                        <span class="cat-dot" style="background:#d97706;"></span>
                        <div class="facility-cat-icon" style="background:#fef3c7; color:#d97706;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
                            </svg>
                        </div>
                        <h3>Hotel & Penginapan</h3>
                    </div>
                    <div id="hotel-container"></div>
                </div>

                <!-- Kesehatan -->
                <div class="facility-category" id="cat-rs" style="display:none;">
                    <div class="facility-cat-header">
                        <span class="cat-dot" style="background:#dc2626;"></span>
                        <div class="facility-cat-icon" style="background:#fee2e2; color:#dc2626;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z" />
                            </svg>
                        </div>
                        <h3>Fasilitas Kesehatan</h3>
                    </div>
                    <div id="rs-container"></div>
                </div>

                <!-- Restoran -->
                <div class="facility-category" id="cat-resto" style="display:none;">
                    <div class="facility-cat-header">
                        <span class="cat-dot" style="background:#16a34a;"></span>
                        <div class="facility-cat-icon" style="background:#dcfce7; color:#16a34a;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-7v8h2.5v8H21V2h-5z" />
                            </svg>
                        </div>
                        <h3>Restoran</h3>
                    </div>
                    <div id="resto-container"></div>
                </div>

                <!-- Polisi -->
                <div class="facility-category" id="cat-police" style="display:none;">
                    <div class="facility-cat-header">
                        <span class="cat-dot" style="background:#4f46e5;"></span>
                        <div class="facility-cat-icon" style="background:#e0e7ff; color:#4f46e5;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                            </svg>
                        </div>
                        <h3>Kantor Polisi</h3>
                    </div>
                    <div id="police-container"></div>
                </div>

                <!-- Apotek -->
                <div class="facility-category" id="cat-apotek" style="display:none;">
                    <div class="facility-cat-header">
                        <span class="cat-dot" style="background:#9333ea;"></span>
                        <div class="facility-cat-icon" style="background:#f3e8ff; color:#9333ea;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z" />
                            </svg>
                        </div>
                        <h3>Apotek</h3>
                    </div>
                    <div id="apotek-container"></div>
                </div>

                <!-- Sewa Kendaraan -->
                <div class="facility-category" id="cat-transport" style="display:none;">
                    <div class="facility-cat-header">
                        <span class="cat-dot" style="background:#0284c7;"></span>
                        <div class="facility-cat-icon" style="background:#e0f2fe; color:#0284c7;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5-1.5zM5 11l1.5-4.5h11L19 11H5z" />
                            </svg>
                        </div>
                        <h3>Sewa Kendaraan</h3>
                    </div>
                    <div id="transport-container"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     DIVIDER
     ═══════════════════════════════════════════════════════════════════ -->
<div class="section-divider">
    <hr>
</div>

<!-- ═══════════════════════════════════════════════════════════════════
     4. UPCOMING MATCHES SECTION (BELOW MAP)
     ═══════════════════════════════════════════════════════════════════ -->
<section class="section-wrap reveal">
    <div class="section-header-flex">
        <div>
            <div class="section-title-group">
                <div class="section-bar"></div>
                <h2 class="section-heading">Jadwal Pertandingan Mendatang</h2>
            </div>
            <p class="section-subtitle">Jadwal cabang olahraga yang akan segera berlangsung pada PORPROV XV 2026</p>
        </div>
        <a href="{{ url('/jadwal') }}" class="section-link">
            Lihat Semua Jadwal
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>

    <div class="matches-grid">
        <!-- Match Card 1: Pencak Silat -->
        <div class="match-card">
            <div>
                <div class="match-card-header">
                    <span class="match-sport-badge" style="background:#eff6ff;color:#013469;">
                        <img src="{{ asset('images/cabor/12.PENCAK SILAT.png') }}" class="cabor-icon" alt="Pencak Silat">
                        Pencak Silat
                    </span>
                    <span class="match-date-badge">2 Nov - 9 Nov 2026</span>
                </div>
                <h3 class="match-title">Babak Penyisihan & Final Pencak Silat</h3>
                <div class="match-venue-info">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    GOR Pajajaran Indoor A
                </div>
            </div>
            <div class="match-footer">
                <span class="match-status"><span class="dot"></span> Terjadwal</span>
                <a href="{{ url('/jadwal') }}" class="btn-detail-sm">
                    Detail Jadwal →
                </a>
            </div>
        </div>

        <!-- Match Card 2: Drumband -->
        <div class="match-card">
            <div>
                <div class="match-card-header">
                    <span class="match-sport-badge" style="background:#eff6ff;color:#013469;">
                        <img src="{{ asset('images/cabor/24.DRUM BAND.png') }}" class="cabor-icon" alt="Drumband">
                        Drumband
                    </span>
                    <span class="match-date-badge">7 Nov - 16 Nov 2026</span>
                </div>
                <h3 class="match-title">Kompetisi Drumband Antar Kontingen</h3>
                <div class="match-venue-info">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    GOR Pajajaran Indoor A
                </div>
            </div>
            <div class="match-footer">
                <span class="match-status"><span class="dot"></span> Terjadwal</span>
                <a href="{{ url('/jadwal') }}" class="btn-detail-sm">
                    Detail Jadwal →
                </a>
            </div>
        </div>

        <!-- Match Card 3: Panahan -->
        <div class="match-card">
            <div>
                <div class="match-card-header">
                    <span class="match-sport-badge" style="background:#eff6ff;color:#013469;">
                        <img src="{{ asset('images/cabor/5.PANAHAN.png') }}" class="cabor-icon" alt="Panahan">
                        Panahan
                    </span>
                    <span class="match-date-badge">31 Okt - 11 Nov 2026</span>
                </div>
                <h3 class="match-title">Kualifikasi & Final Panahan</h3>
                <div class="match-venue-info">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Stadion Pajajaran
                </div>
            </div>
            <div class="match-footer">
                <span class="match-status"><span class="dot"></span> Terjadwal</span>
                <a href="{{ url('/jadwal') }}" class="btn-detail-sm">
                    Detail Jadwal →
                </a>
            </div>
        </div>

        <!-- Match Card 4: Judo -->
        <div class="match-card">
            <div>
                <div class="match-card-header">
                    <span class="match-sport-badge" style="background:#eff6ff;color:#013469;">
                        <img src="{{ asset('images/cabor/25.JUDO.png') }}" class="cabor-icon" alt="Judo">
                        Judo
                    </span>
                    <span class="match-date-badge">3 Nov - 10 Nov 2026</span>
                </div>
                <h3 class="match-title">Pertandingan Judo</h3>
                <div class="match-venue-info">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    GOR Pajajaran Indoor B
                </div>
            </div>
            <div class="match-footer">
                <span class="match-status"><span class="dot"></span> Terjadwal</span>
                <a href="{{ url('/jadwal') }}" class="btn-detail-sm">
                    Detail Jadwal →
                </a>
            </div>
        </div>

        <!-- Match Card 5: Kurash -->
        <div class="match-card">
            <div>
                <div class="match-card-header">
                    <span class="match-sport-badge" style="background:#eff6ff;color:#013469;">
                        <img src="{{ asset('images/cabor/18.KURASH.png') }}" class="cabor-icon" alt="Kurash">
                        Kurash
                    </span>
                    <span class="match-date-badge">8 Nov - 13 Nov 2026</span>
                </div>
                <h3 class="match-title">Pertandingan Kurash</h3>
                <div class="match-venue-info">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    GOR Pajajaran Indoor B
                </div>
            </div>
            <div class="match-footer">
                <span class="match-status"><span class="dot"></span> Terjadwal</span>
                <a href="{{ url('/jadwal') }}" class="btn-detail-sm">
                    Detail Jadwal →
                </a>
            </div>
        </div>

        <!-- Match Card 6: Sambo -->
        <div class="match-card">
            <div>
                <div class="match-card-header">
                    <span class="match-sport-badge" style="background:#eff6ff;color:#013469;">
                        <img src="{{ asset('images/cabor/17.SAMBO.png') }}" class="cabor-icon" alt="Sambo">
                        Sambo
                    </span>
                    <span class="match-date-badge">5 Nov - 19 Nov 2026</span>
                </div>
                <h3 class="match-title">Pertandingan Sambo</h3>
                <div class="match-venue-info">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    GOR Pajajaran Indoor B
                </div>
            </div>
            <div class="match-footer">
                <span class="match-status"><span class="dot"></span> Terjadwal</span>
                <a href="{{ url('/jadwal') }}" class="btn-detail-sm">
                    Detail Jadwal →
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    const venueData = [{
            id: 1,
            name: "GOR Pajajaran Indoor A",
            lat: -6.575816698132383,
            lng: 106.796958655819,
            address: "GOR Pajajaran, Jl. Pemuda No.02, RT.04/RW.01, Tanah Sareal, Kota Bogor, Jawa Barat 16161",
            cabor: "Drumband, Pencak Silat, Taekwondo",
            gmaps_url: "https://maps.app.goo.gl/KcwQDC2JxcTsj1LJ8",
        },
        {
            id: 2,
            name: "GOR Pajajaran Indoor B",
            lat: -6.577928206784957,
            lng: 106.79690799953588,
            address: "GOR Pajajaran, Jl. Pemuda No.02, RT.04/RW.01, Tanah Sareal, Kota Bogor, Jawa Barat 16161",
            cabor: "Judo, Kurash, Sambo",
            gmaps_url: "https://maps.app.goo.gl/h3ei411WRSdW5Uuf8",
        },
        {
            id: 3,
            name: "GOR Vokasi IPB",
            lat: -6.586864818074109,
            lng: 106.80744643623193,
            address: "Jl. Lodaya II, RT.03/RW.05, Cilibende, Babakan, Kec. Bogor Tengah, Kota Bogor, Jawa Barat 16128",
            cabor: "Shorinji Kempo, Tarung Derajat",
            gmaps_url: "https://maps.app.goo.gl/ekjekDk57iBAQcTVA",
        },
        {
            id: 4,
            name: "Majalengka",
            lat: -6.836580168091458,
            lng: 108.22805804110702,
            address: "Majalengka, Jawa Barat",
            cabor: "Aerosport - Gantolle",
            gmaps_url: "https://maps.google.com/?q=Majalengka"
        },
        {
            id: 5,
            name: "Gunung Mas",
            lat: -6.701561756877455,
            lng: 106.97130253598559,
            address: "Puncak, Bogor, Jawa Barat",
            cabor: "Aerosport - Paralayang",
            gmaps_url: "https://maps.google.com/?q=Gunung+Mas+Puncak"
        },
        {
            id: 6,
            name: "Green Forest Hotel",
            lat: -6.64930420834099,
            lng: 106.806161644181,
            address: "Bogor, Jawa Barat",
            cabor: "Anggar, Angkat Besi, Angkat Berat, Arung Jeram, Binaraga, Petanque, Dansa",
            gmaps_url: "https://maps.app.goo.gl/dgb7WBjKovkcfyLo9"
        },
        {
            id: 7,
            name: "PPSDMAP Kemenhub Kemang",
            lat: -6.498024311495613,
            lng: 106.74365521534482,
            address: "Kemang, Bogor, Jawa Barat",
            cabor: "Bola Tangan Indoor",
            gmaps_url: "https://maps.app.goo.gl/Ma2cC3WY3DaWJYQ19"
        },
        {
            id: 8,
            name: "Padepokan Voli Sentul",
            lat: -6.571855570792679,
            lng: 106.8607669981466,
            address: "Sentul, Bogor, Jawa Barat",
            cabor: "Bola Tangan Pasir",
            gmaps_url: "https://maps.app.goo.gl/cXPfu5acX62py9QY9"
        },
        {
            id: 9,
            name: "Arcamanik",
            lat: -6.911153350109742,
            lng: 107.67487895150336,
            address: "Sport Jabar Arcamanik, Bandung, Jawa Barat",
            cabor: "Gimnastik Aerobik, Gimnastik Artistik, Gimnastik Ritmik",
            gmaps_url: "https://maps.google.com/?q=Sport+Jabar+Arcamanik"
        },
        {
            id: 10,
            name: "Cisangkan",
            lat: -6.8746820367318255,
            lng: 107.52764243801157,
            address: "Lapang Tembak Cisangkan, Cimahi, Jawa Barat",
            cabor: "Menembak",
            gmaps_url: "https://maps.google.com/?q=Lapang+Tembak+Cisangkan"
        },
        {
            id: 11,
            name: "Stadion Pajajaran",
            lat: -6.5770496557407565,
            lng: 106.79707946745701,
            address: "Stadion Pajajaran, Jl. Pemuda No.02, Kota Bogor",
            cabor: "Modern Pentathlon, Panahan, Panjat Tebing",
            gmaps_url: "https://maps.app.goo.gl/HgsrKKn8LD9V792UA"
        },
        {
            id: 12,
            name: "Kota Baru Parahyangan",
            lat: -6.85872946272341,
            lng: 107.4845999774748,
            address: "Padalarang, Kabupaten Bandung Barat, Jawa Barat",
            cabor: "Ski Air",
            gmaps_url: "https://maps.google.com/?q=Kota+Baru+Parahyangan"
        },
        {
            id: 13,
            name: "GOR Yasmin",
            lat: -6.5669771863684225,
            lng: 106.77129339999999,
            address: "Bogor, Jawa Barat",
            cabor: "Tenis Meja",
            gmaps_url: "https://maps.app.goo.gl/Fqw4Yn97RyvkSeg27"
        }
    ];

    /* ── Data Fasilitas Hardcoded dari PDF ── */
    const transportFacilities = [{
            name: "PO Kerub Pariwisata Indonesia",
            address: "SPBU 34-16113 Cemplang, Jl. Brigadir Jenderal H Saptadji Hadiprawira, RT.01/RW.09, Cilendek Bar., Kec. Bogor Bar., Kota Bogor",
            distance: "PIC: +62 822-9992-8709 (Ade)",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=PO+Kerub+Pariwisata+Indonesia+Bogor"
        },
        {
            name: "PO. Midas Transportasi",
            address: "Ruko Pinus Niaga No. 51, Pine Forest, Sentul City, Bogor",
            distance: "PIC: +62 878-7223-3106 (Midas)",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=PO+Midas+Transportasi+Sentul+City+Bogor"
        },
        {
            name: "PO. Bin Ilyas Pariwisata",
            address: "Jl. Karadenan No.39, Karadenan, Cibinong, Kabupaten Bogor",
            distance: "PIC: +62 877-8100-9726 (Bin Ilyas)",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=PO+Bin+Ilyas+Pariwisata+Cibinong+Bogor"
        },
        {
            name: "Syafa Tour and Travel Bogor",
            address: "RT.03/RW.19, Katulampa, Kec. Bogor Tim., Kota Bogor",
            distance: "PIC: +62 838-1904-1575 (Endang)",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Syafa+Tour+and+Travel+Bogor+Katulampa"
        },
        {
            name: "PO. AdisaPutro Trans",
            address: "Jl. Raya Cifor No. 14 RT 03/RW 08 Bubulak, Bogor Barat, Kota Bogor",
            distance: "PIC: +62 857-7496-7369 (Rusli)",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=PO+AdisaPutro+Trans+Bubulak+Bogor"
        },
        {
            name: "PT. Surya Harapan Perdana (PasteurTrans)",
            address: "Jl. R. Saleh S. Bustaman No.15, RT.01/RW.11, Empang, Kec. Bogor Sel., Kota Bogor",
            distance: "PIC: +62 823-2224-9794",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=PT+Surya+Harapan+Perdana+PasteurTrans+Empang+Bogor"
        },
        {
            name: "Master Tour & Travel",
            address: "Jl. Raya Cipaku No.21, RT.03/RW.01, Cipaku, Kec. Bogor Sel., Kota Bogor",
            distance: "PIC: +62 857-1463-4597 (Wawang)",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Master+Tour+%26+Travel+Cipaku+Bogor"
        }
    ];

    const pajajaranFacilities = {
        hotel: [{
                name: "Zest Hotel Bogor",
                address: "Jl. Pajajaran No. 27, Babakan, Kec. Bogor Tengah, Kota Bogor",
                distance: "1.2 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Zest+Hotel+Bogor+Jl.+Pajajaran+No.+27+Babakan+Bogor+Tengah"
            },
            {
                name: "The Mirah Hotel Bogor",
                address: "Jl. Pangrango No. 9A, Babakan, Kec. Bogor Tengah, Kota Bogor",
                distance: "1.5 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=The+Mirah+Hotel+Bogor+Jl.+Pangrango+No.+9A+Babakan+Bogor+Tengah"
            }
        ],
        hospital: [{
                name: "RS Salak Bogor",
                address: "Jl. Jend. Sudirman No. 8, Sempur, Kec. Bogor Tengah, Kota Bogor",
                distance: "1.1 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Salak+Bogor+Jl.+Jend.+Sudirman+No.+8+Sempur+Bogor+Tengah"
            },
            {
                name: "RS PMI Bogor",
                address: "Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur, Kota Bogor",
                distance: "2.5 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+PMI+Bogor+Jl.+Pajajaran+No.+80+Baranangsiang+Bogor+Timur"
            },
            {
                name: "Puskesmas Bogor Tengah",
                address: "Jl. Sawojajar No. 38, Pabaton, Kec. Bogor Tengah, Kota Bogor",
                distance: "1.8 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Bogor+Tengah+Jl.+Sawojajar+No.+38+Pabaton+Bogor+Tengah"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Juanda",
            address: "Jl. Ir. H. Juanda No. 30, Babakan, Kec. Bogor Tengah, Kota Bogor",
            distance: "2.0 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Juanda+Jl.+Ir.+H.+Juanda+No.+30+Babakan+Bogor+Tengah"
        }],
        police: [{
            name: "Polresta Bogor Kota (Mako Muslihat)",
            address: "Jl. Kapten Muslihat No. 18, Paledang, Kec. Bogor Tengah, Kota Bogor",
            distance: "2.3 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polresta+Bogor+Kota+Mako+Muslihat+Jl.+Kapten+Muslihat+No.+18+Paledang+Bogor+Tengah"
        }],
        restaurant: [{
            name: "Rumah Makan Ampera Pemuda",
            address: "Jl. Pemuda No. 27, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor",
            distance: "300 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Rumah%20Makan%20Ampera%20Pemuda%20Jl.%20Pemuda%20No.%2027%20Tanah%20Sareal%20Bogor"
        }],
        transport: transportFacilities
    };

    const greenForestFacilities = {
        hotel: [{
                name: "ASTON Bogor Hotel & Resort",
                address: "Mulyaharja, Kec. Bogor Selatan, Kota Bogor",
                distance: "1.8 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=ASTON+Bogor+Hotel+%26+Resort+Mulyaharja+Bogor+Selatan"
            },
            {
                name: "Padodi Hotel",
                address: "Jl. Soemanta Diredja No. 10, Pamoyanan, Kec. Bogor Selatan",
                distance: "1.5 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Padodi+Hotel+Jl.+Soemanta+Diredja+No.+10+Pamoyanan+Bogor+Selatan"
            }
        ],
        hospital: [{
                name: "RS Melania Bogor",
                address: "Jl. Pahlawan No. 91, Bondongan, Kec. Bogor Selatan",
                distance: "2.8 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Melania+Bogor+Jl.+Pahlawan+No.+91+Bondongan+Bogor+Selatan"
            },
            {
                name: "Puskesmas Cipaku",
                address: "Jl. Rangga Gading, Cipaku, Kec. Bogor Selatan",
                distance: "2.1 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Cipaku+Jl.+Rangga+Gading+Cipaku+Bogor+Selatan"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Pahlawan",
            address: "Jl. Pahlawan No. 40, Batutulis, Kec. Bogor Selatan",
            distance: "2.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Pahlawan+Jl.+Pahlawan+No.+40+Batutulis+Bogor+Selatan"
        }],
        police: [{
            name: "Polsek Bogor Selatan",
            address: "Jl. Layung Sari No. 1, Empang, Kec. Bogor Selatan",
            distance: "2.6 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Bogor+Selatan+Jl.+Layung+Sari+No.+1+Empang+Bogor+Selatan"
        }],
        restaurant: [{
            name: "Resto Kampoeng Konsep",
            address: "Jl. Soemanta Diredja No. 28, Pamoyanan, Kec. Bogor Selatan",
            distance: "400 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Resto%20Kampoeng%20Konsep%20Jl.%20Soemanta%20Diredja%20No.%2028%20Pamoyanan%20Bogor%20Selatan"
        }],
        transport: transportFacilities
    };

    const vokasiFacilities = {
        hotel: [{
            name: "IPB Hotel & Convention Centre",
            address: "Botani Square, Jl. Pajajaran, Baranangsiang",
            distance: "2.8 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=IPB+Hotel+%26+Convention+Centre+Botani+Square+Jl.+Pajajaran+Baranangsiang"
        }],
        hospital: [{
                name: "RS PMI Bogor",
                address: "Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur",
                distance: "2.2 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+PMI+Bogor+Jl.+Pajajaran+No.+80+Baranangsiang+Bogor+Timur"
            },
            {
                name: "Puskesmas Bogor Utara",
                address: "Jl. Tegal Gundil, Kec. Bogor Utara",
                distance: "1.9 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Bogor+Utara+Jl.+Tegal+Gundil+Bogor+Utara"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Pajajaran",
            address: "Jl. Pajajaran No. 35, Babakan, Kec. Bogor Tengah",
            distance: "1.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Pajajaran+Jl.+Pajajaran+No.+35+Babakan+Bogor+Tengah"
        }],
        police: [{
            name: "Polsek Bogor Utara",
            address: "Jl. Pajajaran No. 200, Cibuluh, Kec. Bogor Utara",
            distance: "2.1 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Bogor+Utara+Jl.+Pajajaran+No.+200+Cibuluh+Bogor+Utara"
        }],
        restaurant: [{
            name: "Toko Adelways (Kantin IPB Cilibende)",
            address: "Jl. Cilibende, Babakan, Kec. Bogor Tengah",
            distance: "250 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Toko%20Adelways%20Jl.%20Cilibende%20Babakan%20Bogor%20Tengah"
        }],
        transport: transportFacilities
    };

    const yasminFacilities = {
        hotel: [{
                name: "WHIZ Prime Hotel Bogor Yasmin",
                address: "Jl. KH. R. Abdullah Bin Nuh No. 33, Curugmekar",
                distance: "600 m",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=WHIZ+Prime+Hotel+Bogor+Yasmin+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+33+Curugmekar"
            },
            {
                name: "Swiss-Belcourt Bogor",
                address: "Jl. KH. R. Abdullah Bin Nuh No. 27, Bukit Cimanggu City",
                distance: "1.2 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Swiss-Belcourt+Bogor+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+27+Bukit+Cimanggu+City"
            }
        ],
        hospital: [{
                name: "RS Hermina Bogor",
                address: "Jl. KH. R. Abdullah Bin Nuh No. E2, Hermina Grand Yasmin",
                distance: "900 m",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Hermina+Bogor+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+E2+Hermina+Grand+Yasmin"
            },
            {
                name: "RS Islam Bogor",
                address: "Jl. Perdana No. 22, Budi Agung, Tanahsareal",
                distance: "2.0 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Islam+Bogor+Jl.+Perdana+No.+22+Budi+Agung+Tanahsareal"
            },
            {
                name: "Puskesmas Gang Kelor",
                address: "Jl. Raya Curug No. 12, Curugmekar, Kec. Bogor Barat",
                distance: "1.4 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Gang+Kelor+Jl.+Raya+Curug+No.+12+Curugmekar+Bogor+Barat"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Yasmin",
            address: "Ruko Taman Yasmin Sektor VI No. 108, Curugmekar",
            distance: "500 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Yasmin+Ruko+Taman+Yasmin+Sektor+VI+No.+108+Curugmekar"
        }],
        police: [{
            name: "Polsek Tanah Sareal",
            address: "Jl. Seremped, Kedung Badak, Kec. Tanah Sareal",
            distance: "2.4 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Tanah+Sareal+Jl.+Seremped+Kedung+Badak+Tanah+Sareal"
        }],
        restaurant: [{
            name: "Rumah Makan Ampera Yasmin",
            address: "Jl. KH. R. Abdullah Bin Nuh No. 37, Curugmekar",
            distance: "350 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Rumah%20Makan%20Ampera%20Yasmin%20Jl.%20KH.%20R.%20Abdullah%20Bin%20Nuh%20No.%2037%20Curugmekar"
        }],
        transport: transportFacilities
    };

    const kemangFacilities = {
        hotel: [{
            name: "Salak Sunset Hotel",
            address: "Jl. Raya Kemang Parung No. 12, Kemang",
            distance: "2.1 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Salak+Sunset+Hotel+Jl.+Raya+Kemang+Parung+No.+12+Kemang"
        }],
        hospital: [{
                name: "RS Sentosa Bogor",
                address: "Jl. Raya Kemang No. 18, Kemang, Kab. Bogor",
                distance: "1.3 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Sentosa+Bogor+Jl.+Raya+Kemang+No.+18+Kemang+Kab.+Bogor"
            },
            {
                name: "Puskesmas Kemang",
                address: "Jl. Raya Kemang No. 5, Kemang, Kab. Bogor",
                distance: "1.1 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Kemang+Jl.+Raya+Kemang+No.+5+Kemang+Kab.+Bogor"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Kemang",
            address: "Jl. Raya Parung-Bogor, Kemang, Kab. Bogor",
            distance: "800 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Kemang+Jl.+Raya+Parung-Bogor+Kemang+Kab.+Bogor"
        }],
        police: [{
            name: "Polsek Kemang",
            address: "Jl. Raya Kemang Parung No. 10, Kemang, Kab. Bogor",
            distance: "1.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Kemang+Jl.+Raya+Kemang+Parung+No.+10+Kemang+Kab.+Bogor"
        }],
        restaurant: [{
            name: "RM Ayam Goreng Bakar Sayati",
            address: "Jl. Raya Parung - Bogor, Semplak Barat, Kemang",
            distance: "450 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Ayam%20Goreng%20Bakar%20Sayati%20Jl.%20Raya%20Parung%20Bogor%20Semplak%20Barat%20Kemang"
        }],
        transport: transportFacilities
    };

    const sentulFacilities = {
        hotel: [{
                name: "Lorin Sentul Hotel",
                address: "Kawasan Sirkuit Sentul Internasional, Babakan Madang",
                distance: "1.2 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Lorin+Sentul+Hotel+Kawasan+Sirkuit+Sentul+Internasional+Babakan+Madang"
            },
            {
                name: "Harris Hotel Sentul City",
                address: "Jl. Jend. Sudirman, Sentul City, Babakan Madang",
                distance: "2.5 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Harris+Hotel+Sentul+City+Jl.+Jend.+Sudirman+Sentul+City+Babakan+Madang"
            }
        ],
        hospital: [{
                name: "RS EMC Sentul",
                address: "Jl. MH. Thamrin No. 57, Sentul City, Babakan Madang",
                distance: "2.7 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+EMC+Sentul+Jl.+MH.+Thamrin+No.+57+Sentul+City+Babakan+Madang"
            },
            {
                name: "Puskesmas Babakan Madang",
                address: "Jl. Raya Sentul No. 1, Babakan Madang",
                distance: "2.0 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Babakan+Madang+Jl.+Raya+Sentul+No.+1+Babakan+Madang"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Sentul City",
            address: "Ruko Plaza Niaga 1, Sentul City",
            distance: "2.3 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Sentul+City+Ruko+Plaza+Niaga+1+Sentul+City"
        }],
        police: [{
            name: "Polsek Babakan Madang",
            address: "Jl. Raya Babakan Madang No. 8, Kab. Bogor",
            distance: "2.2 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Babakan+Madang+Jl.+Raya+Babakan+Madang+No.+8+Kab.+Bogor"
        }],
        restaurant: [{
            name: "Restoran Lorin Sentul",
            address: "Kawasan Sirkuit Sentul Internasional, Babakan Madang",
            distance: "1.2 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Restoran%20Lorin%20Sentul%20Kawasan%20Sirkuit%20Sentul%20Internasional%20Babakan%20Madang"
        }],
        transport: transportFacilities
    };

    const gunungMasFacilities = {
        hotel: [{
                name: "Bobocabin Gunung Mas",
                address: "Gunung Mas, Jl. Raya Puncak Gadog No. KM 87, Cisarua",
                distance: "300 m",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Bobocabin+Gunung+Mas+Jl.+Raya+Puncak+Gadog+KM+87+Cisarua"
            },
            {
                name: "Grand Diara Hotel Puncak",
                address: "Jl. Raya Puncak - Gadog KM 77, Cisarua",
                distance: "2.9 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Grand+Diara+Hotel+Puncak+Jl.+Raya+Puncak+Gadog+KM+77+Cisarua"
            }
        ],
        hospital: [{
                name: "RSPG Cisarua (RS Paru Dr. M. Goenawan)",
                address: "Jl. Raya Puncak No. KM 83, Cisarua, Kab. Bogor",
                distance: "1.8 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RSPG+Cisarua+RS+Paru+Dr.+M.+Goenawan+Jl.+Raya+Puncak+KM+83+Cisarua+Kab.+Bogor"
            },
            {
                name: "Puskesmas Cisarua",
                address: "Jl. Raya Puncak No. KM 81, Cisarua, Kab. Bogor",
                distance: "2.1 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Cisarua+Jl.+Raya+Puncak+KM+81+Cisarua+Kab.+Bogor"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Cisarua",
            address: "Jl. Raya Puncak No. 412, Cisarua, Kab. Bogor",
            distance: "1.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Cisarua+Jl.+Raya+Puncak+No.+412+Cisarua+Kab.+Bogor"
        }],
        police: [{
            name: "Polsek Cisarua",
            address: "Jl. Raya Puncak KM 82, Cisarua, Kab. Bogor",
            distance: "2.3 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Cisarua+Jl.+Raya+Puncak+KM+82+Cisarua+Kab.+Bogor"
        }],
        restaurant: [{
            name: "Resto Agrowisata Gunung Mas",
            address: "Kawasan Agrowisata Gunung Mas, Tugu Selatan, Cisarua",
            distance: "200 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Resto%20Agrowisata%20Gunung%20Mas%20Kawasan%20Agrowisata%20Gunung%20Mas%20Tugu%20Selatan%20Cisarua"
        }],
        transport: transportFacilities
    };

    const cisangkanFacilities = {
        hotel: [{
            name: "Hotel Trikarya Cimahi",
            address: "Jl. Raya Cisangkan No. 88, Padasuka, Cimahi Tengah",
            distance: "800 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Hotel+Trikarya+Cimahi+Jl.+Raya+Cisangkan+No.+88+Padasuka+Cimahi+Tengah"
        }],
        hospital: [{
                name: "RS Dustira Cimahi",
                address: "Jl. Dr. Dustira No. 1, Baros, Cimahi Tengah",
                distance: "2.1 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Dustira+Cimahi+Jl.+Dr.+Dustira+No.+1+Baros+Cimahi+Tengah"
            },
            {
                name: "Puskesmas Cimahi Tengah",
                address: "Jl. Raden Demang Hardjakusumah No. 1, Cimahi",
                distance: "1.6 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Cimahi+Tengah+Jl.+Raden+Demang+Hardjakusumah+No.+1+Cimahi"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Cisangkan",
            address: "Jl. Raya Cisangkan No. 12, Padasuka, Cimahi Tengah",
            distance: "400 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Cisangkan+Jl.+Raya+Cisangkan+No.+12+Padasuka+Cimahi+Tengah"
        }],
        police: [{
            name: "Polres Cimahi",
            address: "Jl. Raya Cibeureum No. 1, Cimahi Selatan",
            distance: "2.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polres+Cimahi+Jl.+Raya+Cibeureum+No.+1+Cimahi+Selatan"
        }],
        restaurant: [{
            name: "RM Ampera Cisangkan",
            address: "Jl. Raya Barat No. 805, Padasuka, Cimahi Tengah",
            distance: "350 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=RM%20Ampera%20Cisangkan%20Jl.%20Raya%20Barat%20No.%20805%20Padasuka%20Cimahi%20Tengah"
        }],
        transport: transportFacilities
    };

    const arcamanikFacilities = {
        hotel: [{
            name: "Grand Cordela Hotel Bandung",
            address: "Jl. Soekarno-Hatta No. 791, Cisaranten Endah, Arcamanik",
            distance: "2.4 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Grand+Cordela+Hotel+Bandung+Jl.+Soekarno-Hatta+No.+791+Cisaranten+Endah+Arcamanik"
        }],
        hospital: [{
                name: "RS Hermina Arcamanik",
                address: "Jl. A.H. Nasution No. 50, Antapani, Bandung",
                distance: "1.7 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Hermina+Arcamanik+Jl.+A.H.+Nasution+No.+50+Antapani+Bandung"
            },
            {
                name: "Puskesmas Arcamanik",
                address: "Jl. Cisaranten Kulon No. 4, Arcamanik, Bandung",
                distance: "1.1 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Arcamanik+Jl.+Cisaranten+Kulon+No.+4+Arcamanik+Bandung"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Arcamanik",
            address: "Jl. Arcamanik Endah No. 42, Sukamiskin, Arcamanik",
            distance: "600 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Arcamanik+Jl.+Arcamanik+Endah+No.+42+Sukamiskin+Arcamanik"
        }],
        police: [{
            name: "Polsek Arcamanik",
            address: "Jl. Pacuan Kuda No. 54, Sukamiskin, Arcamanik",
            distance: "800 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Arcamanik+Jl.+Pacuan+Kuda+No.+54+Sukamiskin+Arcamanik"
        }],
        restaurant: [{
            name: "RM Khas Sunda Cibiuk Arcamanik",
            address: "Jl. Soekarno Hatta No. 741, Cisaranten Endah, Arcamanik",
            distance: "1.8 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=RM%20Khas%20Sunda%20Cibiuk%20Arcamanik%20Jl.%20Soekarno%20Hatta%20No.%20741%20Cisaranten%20Endah%20Arcamanik"
        }],
        transport: transportFacilities
    };

    const kotaBaruFacilities = {
        hotel: [{
            name: "Mason Pine Hotel",
            address: "Jl. Raya Kotabaru Parahyangan, Cipeundeuy, Padalarang",
            distance: "500 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Mason+Pine+Hotel+Jl.+Raya+Kotabaru+Parahyangan+Cipeundeuy+Padalarang"
        }],
        hospital: [{
                name: "RS Cahya Kawaluyan",
                address: "Jl. Raya Parahyangan KM 1.5, Padalarang, Bandung Barat",
                distance: "1.2 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Cahya+Kawaluyan+Jl.+Raya+Parahyangan+KM+1.5+Padalarang+Bandung+Barat"
            },
            {
                name: "Puskesmas Padalarang",
                address: "Jl. Raya Padalarang No. 470, Bandung Barat",
                distance: "2.8 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Padalarang+Jl.+Raya+Padalarang+No.+470+Bandung+Barat"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma KBP",
            address: "Ruko Bumi Simpang, Kota Baru Parahyangan",
            distance: "800 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+KBP+Ruko+Bumi+Simpang+Kota+Baru+Parahyangan"
        }],
        police: [{
            name: "Polsek Padalarang",
            address: "Jl. Raya Padalarang No. 501, Bandung Barat",
            distance: "2.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Padalarang+Jl.+Raya+Padalarang+No.+501+Bandung+Barat"
        }],
        restaurant: [{
            name: "Bumi Aki Kota Baru Parahyangan",
            address: "Jl. Parahyangan Raya No. 1, Kota Baru Parahyangan",
            distance: "600 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Bumi%20Aki%20Kota%20Baru%20Parahyangan%20Jl.%20Parahyangan%20Raya%20No.%201%20Kota%20Baru%20Parahyangan"
        }],
        transport: transportFacilities
    };

    const majalengkaFacilities = {
        hotel: [{
            name: "Fitra Hotel Majalengka",
            address: "Jl. KH. Abdul Halim No. 88, Majalengka Kulon",
            distance: "1.1 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Fitra+Hotel+Majalengka+Jl.+KH.+Abdul+Halim+No.+88+Majalengka+Kulon"
        }],
        hospital: [{
                name: "RSUD Majalengka",
                address: "Jl. Kesehatan No. 77, Majalengka Wetan",
                distance: "1.5 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RSUD+Majalengka+Jl.+Kesehatan+No.+77+Majalengka+Wetan"
            },
            {
                name: "Puskesmas Majalengka",
                address: "Jl. KH. Abdul Halim No. 200, Majalengka",
                distance: "1.3 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Majalengka+Jl.+KH.+Abdul+Halim+No.+200+Majalengka"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Majalengka",
            address: "Jl. KH. Abdul Halim No. 120, Majalengka",
            distance: "900 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Majalengka+Jl.+KH.+Abdul+Halim+No.+120+Majalengka"
        }],
        police: [{
            name: "Polres Majalengka",
            address: "Jl. KH. Abdul Halim No. 512, Majalengka",
            distance: "2.0 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polres+Majalengka+Jl.+KH.+Abdul+Halim+No.+512+Majalengka"
        }],
        restaurant: [{
            name: "RM Khas Sunda Saung Balong",
            address: "Jl. KH. Abdul Halim No. 160, Majalengka Wetan",
            distance: "700 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Saung%20Balong%20Jl.%20KH.%20Abdul%20Halim%20No.%20160%20Majalengka%20Wetan"
        }],
        transport: transportFacilities
    };

    const facilitiesData = {
        "GOR Pajajaran Indoor A": pajajaranFacilities,
        "GOR Pajajaran Indoor B": pajajaranFacilities,
        "Stadion Pajajaran": pajajaranFacilities,
        "Green Forest Hotel": greenForestFacilities,

        "GOR Vokasi IPB": vokasiFacilities,
        "GOR Yasmin": yasminFacilities,
        "PPSDMAP Kemenhub Kemang": kemangFacilities,
        "Padepokan Voli Sentul": sentulFacilities,
        "Gunung Mas": gunungMasFacilities,
        "Cisangkan": cisangkanFacilities,
        "Arcamanik": arcamanikFacilities,
        "Kota Baru Parahyangan": kotaBaruFacilities,
        "Majalengka": majalengkaFacilities,
    };

    let map;
    let markers = [];
    let currentVenue = null;

    function renderFacilityCategory(venue, type, containerId, title, categoryId) {
        const container = document.getElementById(containerId);
        const categoryBlock = document.getElementById(categoryId);
        if (!container || !categoryBlock) return;

        categoryBlock.style.display = 'block';

        const typeMap = {
            lodging: 'hotel',
            hospital: 'hospital',
            restaurant: 'restaurant',
            police: 'police',
            pharmacy: 'pharmacy',
            transport: 'transport'
        };
        const venueFacilities = facilitiesData[venue.name];

        if (!venueFacilities) {
            container.innerHTML = `<p style="color:#94a3b8; font-style:italic; font-size:12px; padding: 8px 0;">Tidak ada data ${title} untuk venue ini.</p>`;
            return;
        }

        const items = venueFacilities[typeMap[type]];
        if (!items || items.length === 0) {
            container.innerHTML = `<p style="color:#94a3b8; font-style:italic; font-size:12px; padding: 8px 0;">Tidak ada ${title} terdekat ditemukan.</p>`;
            return;
        }

        container.innerHTML = '';
        items.forEach(item => {
            let iconBg, iconColor;
            if (type === 'lodging') {
                iconBg = '#fef3c7';
                iconColor = '#d97706';
            } else if (type === 'hospital') {
                iconBg = '#fee2e2';
                iconColor = '#dc2626';
            } else if (type === 'restaurant') {
                iconBg = '#dcfce7';
                iconColor = '#16a34a';
            } else if (type === 'police') {
                iconBg = '#e0e7ff';
                iconColor = '#4f46e5';
            } else if (type === 'pharmacy') {
                iconBg = '#f3e8ff';
                iconColor = '#9333ea';
            } else if (type === 'transport') {
                iconBg = '#e0f2fe';
                iconColor = '#0284c7';
            } else {
                iconBg = '#dbeafe';
                iconColor = '#2563eb';
            }

            container.innerHTML += `
                <div class="facility-list-item">
                    <div class="fli-icon" style="background:${iconBg}; color:${iconColor};">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/>
                        </svg>
                    </div>
                    <div class="fli-info">
                        <p class="fli-name">${item.name}</p>
                        <p class="fli-addr">${item.address} (${item.distance})</p>
                    </div>
                    <a href="${item.mapUrl}" target="_blank" class="fli-route">Rute</a>
                </div>
            `;
        });
    }

    function initMap() {
        const bogorCenter = [-6.587, 106.803];
        const mapElement = document.getElementById("map-canvas");
        if (!mapElement) return;

        map = L.map('map-canvas').setView([-6.65, 107.30], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        renderVenues(venueData);
        setupFilter();
        setupFacilityFilters();
        setTimeout(function() { map.invalidateSize(); }, 100);
    }

    function createSportIcon(sportName) {
        const iconFile = caborIcons[sportName] || '';
        const imgHtml = iconFile ?
            `<img src="/images/cabor/${iconFile}" class="sport-marker-inner" alt="">` :
            `<svg width="18" height="18" fill="#013469" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8"/></svg>`;
        return L.divIcon({
            html: `<div class="sport-marker">${imgHtml}</div>`,
            className: '',
            iconSize: [44, 44],
            iconAnchor: [22, 22],
            popupAnchor: [0, -22]
        });
    }

    function getOffset(index, total) {
        const spacing = 0.0003;
        const start = -(total - 1) * spacing / 2;
        return {
            lat: 0,
            lng: start + index * spacing
        };
    }

    function renderVenues(venuesData, filterCabor) {
        venuesData.forEach(venue => {
            const caborList = venue.cabor.split(',').map(c => c.trim());
            caborList.forEach((cabor, index) => {
                if (filterCabor && cabor.toLowerCase() !== filterCabor.toLowerCase()) return;
                const offset = getOffset(index, caborList.length);
                const icon = createSportIcon(cabor);
                const marker = L.marker([venue.lat + offset.lat, venue.lng + offset.lng], {
                    icon: icon
                }).addTo(map);
                marker.bindTooltip(`${cabor} - ${venue.name}`);
                marker.on("click", () => {
                    showVenueDetails(venue);
                    const vs = document.getElementById('venue');
                    const v = venue.name.toLowerCase();
                    if (Array.from(vs.options).some(o => o.value === v)) vs.value = v;
                });
                markers.push(marker);
            });
        });
    }

    function clearMarkers() {
        markers.forEach(m => map.removeLayer(m));
        markers = [];
    }

    function setupFilter() {
        const filterForm = document.getElementById('map-filter-form');
        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const fasilitasVal = document.getElementById('fasilitas').value;
            const caborVal = document.getElementById('cabor').value.toLowerCase();
            const venueVal = document.getElementById('venue').value.toLowerCase();

            clearMarkers();
            const floatingCard = document.getElementById('floating-gor-card');
            if (floatingCard) floatingCard.style.display = 'none';

            const bounds = L.latLngBounds();
            const filteredVenues = venueData.filter(v => {
                let matchCabor = caborVal ? v.cabor.toLowerCase().includes(caborVal) : true;
                let matchVenue = venueVal ? v.name.toLowerCase().includes(venueVal) : true;
                return matchCabor && matchVenue;
            });

            let filterCabor = null;
            if (caborVal) {
                const matched = Object.keys(caborIcons).find(k => k.toLowerCase().includes(caborVal));
                if (matched) filterCabor = matched;
            }

            if (filteredVenues.length > 0) {
                renderVenues(filteredVenues, filterCabor);
                filteredVenues.forEach(v => bounds.extend([v.lat, v.lng]));
                map.fitBounds(bounds, {
                    padding: [40, 40]
                });
                showVenueDetails(filteredVenues[0]);

                // Fasilitas filter
                const filterToCategory = {
                    'hotel': 'cat-hotel',
                    'rumah-sakit': 'cat-rs',
                    'apotek': 'cat-apotek',
                    'rumah-makan': 'cat-resto',
                    'polisi': 'cat-police',
                    'transport': 'cat-transport',
                };
                const targetCat = filterToCategory[fasilitasVal];
                if (targetCat) {
                    const placeholder = document.getElementById('facilities-placeholder');
                    if (placeholder) placeholder.style.display = 'none';
                    document.querySelectorAll('.facility-category').forEach(cat => {
                        cat.style.display = cat.id === targetCat ? 'block' : 'none';
                    });
                    document.querySelectorAll('.facility-filter-btn').forEach(btn => {
                        btn.classList.remove('active');
                        if (btn.dataset.filter === targetCat) btn.classList.add('active');
                    });
                }
            } else {
                alert('Venue tidak ditemukan dengan kriteria tersebut.');
                renderVenues(venueData);
                map.setView([-6.65, 107.30], 10);
            }
        });

        filterForm.addEventListener('reset', function() {
            setTimeout(() => {
                clearMarkers();
                renderVenues(venueData);
                map.setView([-6.65, 107.30], 10);
                const floatingCard = document.getElementById('floating-gor-card');
                if (floatingCard) floatingCard.style.display = 'none';
                const placeholder = document.getElementById('facilities-placeholder');
                if (placeholder) placeholder.style.display = 'block';
                document.querySelectorAll('.facility-category').forEach(cat => cat.style.display = 'none');
            }, 100);
        });
    }

    const caborIcons = {
        "Drumband": "24.DRUM BAND.png",
        "Pencak Silat": "12.PENCAK SILAT.png",
        "Taekwondo": "9.TAEKWONDO.png",
        "Judo": "25.JUDO.png",
        "Kurash": "18.KURASH.png",
        "Sambo": "17.SAMBO.png",
        "Shorinji Kempo": "15.KEMPO.png",
        "Tarung Derajat": "19.TARUNG DERAJAT.png",
        "Modern Pentathlon": "26.MODERN PENTATHLON.png",
        "Panahan": "5.PANAHAN.png",
        "Panjat Tebing": "23.PANJAT TEBING.png",
        "Tenis Meja": "8.TENIS MEJA.png",
        "Aerosport - Gantolle": "14.GANTOLE.png",
        "Aerosport - Paralayang": "3.PARALAYANG.png",
        "Anggar": "2.ANGGAR.png",
        "Angkat Berat": "20.ANGKAT BERAT.png",
        "Angkat Besi": "10.ANGKAT BESI.png",
        "Arung Jeram": "13.ARUNG JERAM.png",
        "Binaraga": "6.BINARAGA.png",
        "Bola Tangan Indoor": "11.BOLA TANGAN.png",
        "Bola Tangan Pasir": "11.BOLA TANGAN.png",
        "Dansa": "27.DANSA.png",
        "Gimnastik Aerobik": "21.SENAM.png",
        "Gimnastik Artistik": "21.SENAM.png",
        "Gimnastik Ritmik": "21.SENAM.png",
        "Menembak": "7.MENEMBAK.png",
        "Petanque": "16.PENTAQUE.png",
        "Ski Air": "22.SKI AIR.png",
    };

    function showVenueDetails(venue) {
        currentVenue = venue;
        const floatingCard = document.getElementById('floating-gor-card');
        floatingCard.style.display = 'block';

        document.getElementById('card-gor-name').innerText = venue.name;
        document.getElementById('card-gor-addr').innerText = venue.address;
        document.getElementById('card-gor-gmaps').href = venue.gmaps_url;

        const placeholder = document.getElementById('facilities-placeholder');
        if (placeholder) placeholder.style.display = 'none';

        const caborArr = venue.cabor.split(',').map(c => c.trim());
        const caborContainer = document.getElementById('card-gor-cabor-grid');
        caborContainer.innerHTML = '';
        caborArr.forEach(c => {
            const iconFile = caborIcons[c] || '';
            const iconHtml = iconFile ? `<img src="/images/cabor/${iconFile}" class="cabor-tag-icon" alt=""> ` : '';
            caborContainer.innerHTML += `<span class="cabor-tag">${iconHtml}${c}</span>`;
        });

        if (map) {
            renderFacilityCategory(venue, 'lodging', 'hotel-container', 'Hotel', 'cat-hotel');
            renderFacilityCategory(venue, 'hospital', 'rs-container', 'Fasilitas Kesehatan', 'cat-rs');
            renderFacilityCategory(venue, 'restaurant', 'resto-container', 'Restoran', 'cat-resto');
            renderFacilityCategory(venue, 'police', 'police-container', 'Kantor Polisi', 'cat-police');
            renderFacilityCategory(venue, 'pharmacy', 'apotek-container', 'Apotek', 'cat-apotek');
            renderFacilityCategory(venue, 'transport', 'transport-container', 'Sewa Kendaraan', 'cat-transport');
        }
    }

    function setupFacilityFilters() {
        const categoryMap = {
            'cat-hotel': {
                type: 'lodging',
                containerId: 'hotel-container',
                title: 'Hotel',
                catId: 'cat-hotel'
            },
            'cat-rs': {
                type: 'hospital',
                containerId: 'rs-container',
                title: 'Fasilitas Kesehatan',
                catId: 'cat-rs'
            },
            'cat-resto': {
                type: 'restaurant',
                containerId: 'resto-container',
                title: 'Restoran',
                catId: 'cat-resto'
            },
            'cat-police': {
                type: 'police',
                containerId: 'police-container',
                title: 'Kantor Polisi',
                catId: 'cat-police'
            },
            'cat-apotek': {
                type: 'pharmacy',
                containerId: 'apotek-container',
                title: 'Apotek',
                catId: 'cat-apotek'
            },
            'cat-transport': {
                type: 'transport',
                containerId: 'transport-container',
                title: 'Sewa Kendaraan',
                catId: 'cat-transport'
            },
        };

        document.querySelectorAll('.facility-filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.facility-filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const filter = this.dataset.filter;
                document.querySelectorAll('.facility-category').forEach(cat => cat.style.display = 'none');

                if (filter === 'all') {
                    if (currentVenue) {
                        Object.values(categoryMap).forEach(c => renderFacilityCategory(currentVenue, c.type, c.containerId, c.title, c.catId));
                    }
                } else if (categoryMap[filter] && currentVenue) {
                    const c = categoryMap[filter];
                    renderFacilityCategory(currentVenue, c.type, c.containerId, c.title, c.catId);
                }
            });
        });
    }

    // ── Hero Slideshow Auto-Slide ──
    (function initHeroSlideshow() {
        const slides = document.querySelectorAll('.hero-slide');
        if (slides.length < 2) return;
        let current = 0;
        setInterval(function() {
            slides[current].classList.remove('active');
            current = (current + 1) % slides.length;
            slides[current].classList.add('active');
        }, 5000);
    })();

    window.onload = function() {
        initMap();
        window.addEventListener('resize', function() {
            if (map) map.invalidateSize();
        });
    };

    // ── Scroll Reveal Animation ──
    (function initReveal() {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -40px 0px'
        });

        document.querySelectorAll('.reveal').forEach(function(el) {
            observer.observe(el);
        });
    })();
</script>
@endpush