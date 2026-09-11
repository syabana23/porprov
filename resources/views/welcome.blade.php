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
                <img src="{{ asset('images/cabor/23.PANJAT TEBING.png') }}" alt="Panjat Tebing">
            </div>
        </div>
        <!-- Slide 2: Stadion Pajajaran -->
        <div class="hero-slide" style="background-image: url('{{ $bg2 }}')">
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-cabor">
                <img src="{{ asset('images/cabor/5.PANAHAN.png') }}" alt="Panahan">
            </div>
        </div>
        <!-- Slide 3: GOR Vokasi IPB -->
        <div class="hero-slide" style="background-image: url('{{ $bg3 }}')">
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-cabor">
                <img src="{{ asset('images/cabor/9.TAEKWONDO.png') }}" alt="Taekwondo">
            </div>
        </div>
        <!-- Slide 4: GOR Yasmin -->
        <div class="hero-slide" style="background-image: url('{{ $bg4 }}')">
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-cabor">
                <img src="{{ asset('images/cabor/25.JUDO.png') }}" alt="Judo">
            </div>
        </div>
    </div>

    <!-- Floating Particles -->
    <div class="hero-particles">
        <span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span>
    </div>

    <div class="hero-container">
        <!-- Top Row Header: Tagline Badge (Left) & Desktop Countdown (Right) -->
        <div class="hero-top-row">
            <div class="hero-pill-badge">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                </svg>
                Menuju Ajang Olahraga Terbesar Jawa Barat
            </div>

        </div>

        <!-- Hero Text Content -->
        <div class="hero-content">
            <h1 class="hero-title">
                PORPROV <span class="yellow-accent">NAVIGATION AND INFORMATION</span><span class="white-accent"> KOTA BOGOR 2026</span>
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
                <div class="stat-val">{{ $stats['venues'] }}</div>
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
                <div class="stat-val">{{ $stats['cabors'] }}</div>
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
                <div class="stat-val">{{ $stats['kontingens'] }}</div>
                <div class="stat-title">Kontingen</div>
                <div class="stat-sub">Kabupaten/Kota</div>
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
                <div class="stat-val">{{ $stats['fasilitas'] }}</div>
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

    <style>
        /* ═══ Route Controls — satukan semua kelas route di sini (portfolio) ═══ */
        .route-controls { display: flex; flex-direction: column; gap: 8px; }
        .route-divider { height: 1px; background: #e2e8f0; margin: 4px 0 2px; }
        .route-loading {
            display: flex; align-items: center; gap: 8px; padding: 10px 14px;
            background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 10px;
            color: #1e40af; font-size: 13px; font-weight: 600;
        }
        .route-loading .route-spinner {
            display: inline-block; width: 14px; height: 14px;
            border: 2px solid rgba(37, 99, 235, 0.25); border-top-color: #2563eb;
            border-radius: 50%; animation: route-spin 0.6s linear infinite; flex-shrink: 0;
        }
        .route-usage {
            display: flex; align-items: center; gap: 6px; padding: 8px 12px;
            background: #fffbeb; border: 1px solid #fde68a; border-radius: 8px;
            color: #92400e; font-size: 12px; font-weight: 500;
        }
        .route-error {
            display: flex; align-items: center; gap: 6px; padding: 8px 12px;
            background: #fef2f2; border: 1px solid #fecaca; border-radius: 8px;
            color: #dc2626; font-size: 12px; font-weight: 500;
        }
        .route-info {
            display: flex; align-items: center; gap: 8px; padding: 8px 12px;
            background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 8px;
            color: #1e40af; font-size: 13px; font-weight: 600;
        }
        .route-info svg { flex-shrink: 0; }
        .route-info .route-info-title {
            font-weight: 700; white-space: nowrap; overflow: hidden;
            text-overflow: ellipsis; max-width: 100%; min-width: 0; flex-shrink: 1;
        }
        .route-spinner {
            display: inline-block; width: 14px; height: 14px;
            border: 2px solid rgba(255, 255, 255, 0.3); border-top-color: #fff;
            border-radius: 50%; animation: route-spin 0.6s linear infinite;
        }
        @keyframes route-spin { to { transform: rotate(360deg); } }
        .btn-route {
            display: flex; justify-content: center; align-items: center; gap: 8px;
            width: 100%; padding: 10px 18px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8); color: #fff;
            border: none; border-radius: 10px; font-size: 13px; font-weight: 700;
            font-family: inherit; cursor: pointer; transition: all 0.25s ease;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.25);
        }
        .btn-route:hover {
            transform: translateY(-1px); box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
            background: linear-gradient(135deg, #1d4ed8, #1e40af);
        }
        .btn-route:active { transform: translateY(0); }
        .btn-route:disabled, .btn-route.loading { opacity: 0.7; cursor: not-allowed; transform: none; }
        .btn-clear-route {
            display: flex; justify-content: center; align-items: center; gap: 6px;
            width: 100%; padding: 8px 14px; background: #f1f5f9; color: #64748b;
            border: 1px solid #e2e8f0; border-radius: 8px; font-size: 12px;
            font-weight: 600; font-family: inherit; cursor: pointer; transition: all 0.2s ease;
        }
        .btn-clear-route:hover { background: #e2e8f0; color: #475569; border-color: #cbd5e1; }
        .route-stop-marker {
            display: flex; align-items: center; justify-content: center;
            width: 18px; height: 18px; border-radius: 50%; background: #ffffff;
            border: 2px solid var(--stop-color, #6b7280);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.25); position: relative;
        }
        .route-stop-marker span { width: 7px; height: 7px; border-radius: 50%; background: var(--stop-color, #6b7280); }
        .user-loc-marker {
            position: relative; width: 22px; height: 22px;
            display: flex; align-items: center; justify-content: center;
        }
        .user-loc-marker .ul-pulse {
            position: absolute; width: 22px; height: 22px; border-radius: 50%;
            background: rgba(37, 99, 235, 0.35); animation: user-loc-pulse 1.6s ease-out infinite;
        }
        .user-loc-marker .ul-core {
            width: 12px; height: 12px; border-radius: 50%; background: #2563eb;
            border: 2.5px solid #ffffff; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.35); z-index: 1;
        }
        @keyframes user-loc-pulse {
            0% { transform: scale(0.6); opacity: 0.9; }
            100% { transform: scale(1.6); opacity: 0; }
        }
    </style>

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
                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" style="flex-shrink:0; margin-top:2px; color:#9ca3af;">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z" />
                        </svg>
                        <span id="card-gor-addr">-</span>
                    </div>
                    <div class="cabang-title">CABANG OLAHRAGA</div>
                    <div class="cabor-grid" id="card-gor-cabor-grid"></div>
                    <a href="#" id="card-gor-gmaps" target="_blank" class="map-btn">
                        <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 19H5V5h7V3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z" />
                        </svg>
                        Buka di Google Maps
                    </a>

                    <!-- Route Controls (otomatis, tanpa pilihan fasilitas manual) -->
                    <div class="route-controls" id="route-controls" style="display:none;">
                        <div class="route-divider"></div>
                        <button class="btn-route" id="btn-show-route" type="button">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.447 2.724A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>
                            Tampilkan Rute
                        </button>
                        <div class="route-loading" id="route-loading" style="display:none;">
                            <span class="route-spinner"></span>
                            <span>Mencari fasilitas terdekat & menghitung rute...</span>
                        </div>
                        <button class="btn-clear-route" id="btn-clear-route" type="button" style="display:none;">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Hapus Rute
                        </button>
                        <div class="route-info" id="route-info" style="display:none;">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.447 2.724A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>
                            <span class="route-info-title" id="route-info-title"></span>
                            <span>Jarak: <span id="route-distance"></span></span> &middot;
                            <span>Estimasi waktu: <span id="route-duration"></span></span> &middot;
                            <span id="route-stops"></span>
                        </div>
                        <div class="route-usage" id="route-usage" style="display:none;"></div>
                        <div class="route-error" id="route-error" style="display:none;"></div>
                    </div>
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
                        <option value="rekreasi">Rekreasi</option>
                        <option value="mall">Mall</option>
                    </select>
                </div>

                <div>
                    <select class="filter-select-styled" id="cabor">
                        <option value="">Pilih Cabang Olahraga</option>
                        <option value="aerosport-gantolle">Aerosport - Gantolle</option>
                        <option value="aerosport-paralayang">Aerosport - Paralayang</option>
                        <option value="anggar">Anggar</option>
                        <option value="dansa">Dansa</option>
                        <option value="angkat berat">Angkat Berat</option>
                        <option value="angkat besi">Angkat Besi</option>
                        <option value="arung jeram">Arung Jeram</option>
                        <option value="binaraga">Binaraga</option>
                        <option value="bola-tangan-indoor">Bola Tangan Indoor</option>
                        <option value="bola-tangan-pasir">Bola Tangan Pasir</option>
                        <option value="drumband">Drumband</option>
                        <option value="gimnastik-aerobik">Gimnastik Aerobik</option>
                        <option value="gimnastik-artistik">Gimnastik Artistik</option>
                        <option value="gimnastik-ritmik">Gimnastik Ritmik</option>
                        <option value="judo">Judo</option>
                        <option value="kurash">Kurash</option>
                        <option value="menembak">Menembak</option>
                        <option value="modern pentathlon">Modern Pentathlon</option>
                        <option value="panahan">Panahan</option>
                        <option value="panjat tebing">Panjat Tebing</option>
                        <option value="pencak silat">Pencak Silat</option>
                        <option value="petanque">Petanque</option>
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
                        <option value="">Pilih Venue</option>
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
                <button class="facility-filter-btn" data-filter="cat-rekreasi">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.57 14.86 22 13.43 20.57 12 17 15.57 8.43 7 12 3.43 10.57 2 9.14 3.43 7.71 2 5.57 4.14 4.14 2.71 2.71 4.14l1.43 1.43L2 7.71l1.43 1.43L2 10.57 3.43 12 7 8.43 15.57 17 12 20.57 13.43 22l1.43-1.43L16.29 22l2.14-2.14 1.43 1.43 1.43-1.43-1.43-1.43L22 16.29z" />
                    </svg>
                    Rekreasi
                </button>
                <button class="facility-filter-btn" data-filter="cat-mall">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                    </svg>
                    Mall
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

                <!-- Rekreasi -->
                <div class="facility-category" id="cat-rekreasi" style="display:none;">
                    <div class="facility-cat-header">
                        <span class="cat-dot" style="background:#0d9488;"></span>
                        <div class="facility-cat-icon" style="background:#ccfbf1; color:#0d9488;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.57 14.86 22 13.43 20.57 12 17 15.57 8.43 7 12 3.43 10.57 2 9.14 3.43 7.71 2 5.57 4.14 4.14 2.71 2.71 4.14l1.43 1.43L2 7.71l1.43 1.43L2 10.57 3.43 12 7 8.43 15.57 17 12 20.57 13.43 22l1.43-1.43L16.29 22l2.14-2.14 1.43 1.43 1.43-1.43-1.43-1.43L22 16.29z" />
                            </svg>
                        </div>
                        <h3>Rekreasi</h3>
                    </div>
                    <div id="rekreasi-container"></div>
                </div>

                <!-- Mall -->
                <div class="facility-category" id="cat-mall" style="display:none;">
                    <div class="facility-cat-header">
                        <span class="cat-dot" style="background:#7c3aed;"></span>
                        <div class="facility-cat-icon" style="background:#ede9fe; color:#7c3aed;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                            </svg>
                        </div>
                        <h3>Mall & Pusat Belanja</h3>
                    </div>
                    <div id="mall-container"></div>
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
        <!-- Match Card 1: Panahan -->
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

        <!-- Match Card 2: Pencak Silat -->
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

        <!-- Match Card 3: Judo -->
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

        <!-- Match Card 4: Sambo -->
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

        <!-- Match Card 5: Drumband -->
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

        <!-- Match Card 6: Kurash -->
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
    </div>
</section>

<!-- Floating Countdown Widget -->
@include('partials.floating-countdown')

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/leaflet/leaflet.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('vendor/leaflet/leaflet.js') }}"></script>

<script>
    const venueData = @json($venues);

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

    const rekreasiFacilities = [{
        name: "IKIGAI Fitness",
        address: "IKIGAI Ekalos, Gedung Plaza Ekalos, Jl. Siliwangi, RW.04, Sukasari, Bogor",
        distance: "buka 06:00-21:00",
        mapUrl: "https://www.google.com/maps/place/IKIGAI+FITNESS+-+Lippo+Plaza+Ekalokasari+Bogor/@-6.6216624,106.8144763,17z/data=!3m2!4b1!5s0x2e69c5fdf77397b5:0x881f18442bc0f864!4m6!3m5!1s0x2e69c5d5719e94ab:0x8c6b0ea36866c2e6!8m2!3d-6.6216624!4d106.8170512!16s%2Fg%2F11stp2j67s?entry=ttu&g_ep=EgoyMDI2MDgwNS4xIKXMDSoASAFQAw%3D%3D"
    }];

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
            },
            {
                name: "The Sahira Hotel",
                address: "Jl. A. Yani No.17-23, RT.02/RW.02, Tanah Sareal, Kota Bogor, Jawa Barat 16161",
                distance: "300 m",
                mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/The+Sahira+Hotel,+Jl.+A.+Yani+No.17-23,+RT.02%2FRW.02,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/@-6.5764685,106.7978136,17.47z/data=!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c3993958a32d:0x905190fd46d58a74!2m2!1d106.7999397!2d-6.5749112?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
            },
            {
                name: "Key Inn Hotel",
                address: "Jl. Jend. Sudirman Gg. Lb. Pilar No.40B, RT.01/RW.03, Sempur, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16129",
                distance: "900 m",
                mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Key+Inn+Hotel+Bogor,+Jl.+Jend.+Sudirman+Gg.+Lb.+Pilar+No.40B,+RT.01%2FRW.03,+Sempur,+Bogor+Tengah,+Bogor+City,+West+Java+16129/@-6.5808268,106.7916117,16z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c58e1bbf04d5:0xd2750d460b939140!2m2!1d106.7970748!2d-6.5835792?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
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
            },
            {
                name: "RS Azra",
                address: "Jl. Raya Pajajaran No.219, RT.02/RW.11, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153",
                distance: "1.2 km",
                mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Rumah+Sakit+Azra+Bogor,+Jl.+Raya+Pajajaran+No.219,+RT.02%2FRW.11,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.57281,106.7976765,16z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c42e35fd5fd3:0x5497922a2532233!2m2!1d106.8074803!2d-6.5793169?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
            },
            {
                name: "RSIA Pasutri Bogor",
                address: "Jl. Merak No.3, RT.03/RW.06, Tanah Sareal, Kota Bogor, Jawa Barat 16161",
                distance: "800 m",
                mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/RSIA+Pasutri+Bogor,+CQHX%2BQQR,+Jl.+Merak+No.3,+RT.03%2FRW.06,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/@-6.5739631,106.7927543,16z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c5f7b0de7fd3:0x7ebb0e784df9fa48!2m2!1d106.798903!2d-6.570604?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
            },
            {
                name: "RS Mulia Pajajaran Bogor",
                address: "Jl. Raya Pajajaran No.98, RT.02/RW.03, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153",
                distance: "1.1 km",
                mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/RS+Mulia+Pajajaran+Bogor,+Jl.+Raya+Pajajaran+No.98,+RT.02%2FRW.03,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.5798556,106.7822267,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c5f2b4b395cf:0x96f61aa7b6f95871!2m2!1d106.8076464!2d-6.5757867?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
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
        }, {
            name: "Polsek Bogor Utara",
            address: "Jl. Raya Pajajaran No.26, RT.05/RW.10, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153",
            distance: "1.1 km",
            mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Polsek+Bogor+Utara,+Jl.+Raya+Pajajaran+No.26,+RT.05%2FRW.10,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.5845962,106.7915827,15z/data=!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c5e2ccc27bef:0x95860988a497f417!2m2!1d106.8068179!2d-6.579187?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }],
        restaurant: [{
            name: "Rumah Makan Ampera Pemuda",
            address: "Jl. Pemuda No. 27, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor",
            distance: "300 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Rumah%20Makan%20Ampera%20Pemuda%20Jl.%20Pemuda%20No.%2027%20Tanah%20Sareal%20Bogor"
        }],
        transport: transportFacilities,
        rekreasi: rekreasiFacilities,
        mall: [{
            name: "Mall Jambu Dua",
            address: "Jl. A. Yani No.1, RT.01/RW.06, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153",
            distance: "1.5 km",
            mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Jambu+Dua,+Jl.+A.+Yani+No.1,+RT.01%2FRW.06,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.5716908,106.7976765,16z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c55b908dacfb:0x6e2c85a178aa83f8!2m2!1d106.8079468!2d-6.569317?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }]
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
            },
            {
                name: "RS VANIA",
                address: "Jl. Siliwangi No.11, RT.01/RW.03, Sukasari, Kec. Bogor Tim., Kota Bogor",
                distance: "4 km",
                mapUrl: "https://www.google.com/maps/dir/Green+Forest+Bogor,+Jl.+RE.+Soemantadiredja+No.99,+RT.03%2FRW.12,+Pamoyanan,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16136/RUMAH+SAKIT+VANIA,+Jl.+Siliwangi+No.11,+RT.01%2FRW.03,+Sukasari,+Kec.+Bogor+Tim.,+Kota+Bogor,+Jawa+Barat+16142/@-6.6296626,106.7838324,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69cf4fde33c0b3:0x70889815f5e23386!2m2!1d106.806108!2d-6.6494907!1m5!1m1!1s0x2e69c5e5dbfe64e7:0x8273af2732cab4e2!2m2!1d106.8078123!2d-6.6131137?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
            },
            {
                name: "RS UMMI",
                address: "Jl. Empang II No.2, RT.04/RW.02, Empang, Kec. Bogor Sel., Kota Bogor",
                distance: "4.5 km",
                mapUrl: "https://www.google.com/maps/dir/Green+Forest+Bogor,+Jl.+RE.+Soemantadiredja+No.99,+RT.03%2FRW.12,+Pamoyanan,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16136/RS+UMMI,+Jl.+Empang+II+No.2,+RT.04%2FRW.02,+Empang,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16132/@-6.62865,106.7828612,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69cf4fde33c0b3:0x70889815f5e23386!2m2!1d106.806108!2d-6.6494907!1m5!1m1!1s0x2e69c5668d0c8dbb:0x6663382e4fa5d02a!2m2!1d106.7945423!2d-6.6086429?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
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
        transport: transportFacilities,
        rekreasi: [...rekreasiFacilities, {
            name: "The Jungle Water Park",
            address: "Jl. Bogor Nirwana Boulevard, Mulyaharja, Kec. Bogor Selatan",
            distance: "4.5 km",
            mapUrl: "https://www.google.com/maps/dir/Green+Forest+Bogor,+Jl.+RE.+Soemantadiredja+No.99,+RT.03%2FRW.12,+Pamoyanan,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16136/The+Jungle+Waterpark+Bogor,+Perumahan,+Jl.+Bogor+Nirwana+Residence+Jl.+Bukit+Nirwana+Raya,+RT.05%2FRW.12,+Mulyaharja,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16132/@-6.6438986,106.7893085,15z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69cf4fde33c0b3:0x70889815f5e23386!2m2!1d106.806108!2d-6.6494907!1m5!1m1!1s0x2e69cf5deba619f3:0x485a13f031e8b904!2m2!1d106.7949215!2d-6.6344794?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }],
        mall: [{
            name: "Mall BTM",
            address: "Jl. Ir. H. Juanda No.68, RT.01/RW.13, Paledang, Kec. Bogor Tengah, Kota Bogor",
            distance: "6.6 km",
            mapUrl: "https://www.google.com/maps/dir/Green+Forest+Bogor,+Jl.+RE.+Soemantadiredja+No.99,+RT.03%2FRW.12,+Pamoyanan,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16136/Mall+BTM+Bogor,+Jl.+Ir.+H.+Juanda+No.68,+RT.01%2FRW.13,+Paledang,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16122/@-6.6254957,106.7846035,14z/data=!3m2!4b1!5s0x2e69c5c08b54d0b5:0x45125fa3ca6c7203!4m13!4m12!1m5!1m1!1s0x2e69cf4fde33c0b3:0x70889815f5e23386!2m2!1d106.806108!2d-6.6494907!1m5!1m1!1s0x2e69c5b6757d7817:0x82ab1619188f430e!2m2!1d106.7952921!2d-6.6050687?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }]
    };

    const vokasiFacilities = {
        hotel: [{
            name: "IPB Hotel & Convention Centre",
            address: "Botani Square, Jl. Pajajaran, Baranangsiang",
            distance: "2.8 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=IPB+Hotel+%26+Convention+Centre+Botani+Square+Jl.+Pajajaran+Baranangsiang"
        }, {
            name: "Swiss-Belhotel Bogor",
            address: "Jl. Salak No.38-40, RT.03/RW.04, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16129",
            distance: "500 m",
            mapUrl: "https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Swiss-Belhotel+Bogor,+Jl.+Salak+No.38-40,+RT.03%2FRW.04,+Babakan,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16129/@-6.5889391,106.8019192,18z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5cd17948f23:0xcc8d353aabd8f8c3!2m2!1d106.8041729!2d-6.5889394?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
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
            },
            {
                name: "RS Azra",
                address: "Jl. Raya Pajajaran No.219, RT.02/RW.11, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153",
                distance: "1.9 km",
                mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Rumah+Sakit+Azra+Bogor,+Jl.+Raya+Pajajaran+No.219,+RT.02%2FRW.11,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.57281,106.7976765,16z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c42e35fd5fd3:0x5497922a2532233!2m2!1d106.8074803!2d-6.5793169?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
            },
            {
                name: "RS Siloam Bogor",
                address: "Jl. Raya Pajajaran No.27, RT.01/RW.04, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128",
                distance: "1.0 km",
                mapUrl: "https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Siloam+Hospitals+Bogor,+Jl.+Raya+Pajajaran+No.27,+RT.01%2FRW.04,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/@-6.5956616,106.7956764,16z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5cfedf6086d:0x64de2ab6cd78dce4!2m2!1d106.8046881!2d-6.5956638?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
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
            address: "Jl. Raya Pajajaran No.26, RT.05/RW.10, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153",
            distance: "1.9 km",
            mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Polsek+Bogor+Utara,+Jl.+Raya+Pajajaran+No.26,+RT.05%2FRW.10,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.5845962,106.7915827,15z/data=!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c5e2ccc27bef:0x95860988a497f417!2m2!1d106.8068179!2d-6.579187?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }],
        restaurant: [{
            name: "Toko Adelways (Kantin IPB Cilibende)",
            address: "Jl. Cilibende, Babakan, Kec. Bogor Tengah",
            distance: "250 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Toko%20Adelways%20Jl.%20Cilibende%20Babakan%20Bogor%20Tengah"
        }, {
            name: "Teras Om Frend",
            address: "CR65+HMX Il, Jl. Lodaya, RT.003/RW.002, Babakan, Kec. Bogor Tengah, Kota Bogor, Jawa Barat 16128",
            distance: "150 m",
            mapUrl: "https://www.google.com/maps/place/CR65%2BHMX+Teras+Om+Frend,+Il,+Jl.+Lodaya,+RT.003%2FRW.002,+Babakan,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16128/@-6.588509,106.8092212,16z/data=!3m1!1e3!4m6!3m5!1s0x2e69c5001ab40295:0xf34d26c1bef53a78!8m2!3d-6.588509!4d106.8092212!16s%2Fg%2F11ntswsj17?g_ep=Eg1tbF8yMDI2MDkwMV8wIOC7DCoASAJQAg%3D%3D"
        }],
        transport: transportFacilities,
        rekreasi: [...rekreasiFacilities, {
            name: "Kebun Raya Bogor",
            address: "Jl. Otto Iskandardinata No.13, Paledang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16122",
            distance: "1.4 km",
            mapUrl: "https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Kebun+Raya+Bogor,+Jl.+Otto+Iskandardinata+No.13,+Paledang,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16122/@-6.5976279,106.7815411,15z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5c412a67abb:0x75f23c6b45a37ee5!2m2!1d106.7995698!2d-6.5976289?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }, {
            name: "Lapangan Sempur Bogor",
            address: "CR52+99J, Jl. Sempur, RT.02/RW.01, Sempur, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16129",
            distance: "1.0 km",
            mapUrl: "https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Lapangan+Sempur+Bogor,+CR52%2B99J,+Jl.+Sempur,+RT.02%2FRW.01,+Sempur,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16129/@-6.5915343,106.7963791,17z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5cb9987d027:0xdc1330b7afd8d1b7!2m2!1d106.8008852!2d-6.591534?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }],
        mall: [{
            name: "Mall Botani Square Bogor",
            address: "Jl. Raya Pajajaran No.40, RT.04/RW.05, Tugu Kujang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16127",
            distance: "1.5 km",
            mapUrl: "https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Botani+Square,+Jl.+Raya+Pajajaran+No.40,+RT.04%2FRW.05,+Tugu+Kujang,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16127/@-6.6014327,106.7943125,15z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5c5287d2ae7:0x9edb391e7c74be19!2m2!1d106.8069032!2d-6.6014292?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }]
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
                address: "Jl. Sholeh Iskandar Jl. Bukit Cimanggu City Raya No.1, RT.01/RW.13, Cibadak, Tanah Sareal, Kota Bogor, Jawa Barat 16168",
                distance: "1.5 km",
                mapUrl: "https://maps.app.goo.gl/2VQeXZGysaj5Fjg36"
            },
            {
                name: "Bogor Icon Hotel",
                address: "Jl. Bukit Cimanggu City Raya No.1, RT.01/RW.13, Cibadak, Tanah Sareal, Kota Bogor, Jawa Barat 16166",
                distance: "1.3 km",
                mapUrl: "https://maps.app.goo.gl/692aN19h5YPbm6aQA"
            }
        ],
        hospital: [{
                name: "RS Hermina Bogor",
                address: "Jl. KH. R. Abdullah Bin Nuh No. E2, Hermina Grand Yasmin",
                distance: "900 m",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Hermina+Bogor+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+E2+Hermina+Grand+Yasmin"
            },
            {
                name: "RSUD Kota Bogor",
                address: "Jl. DR. Sumeru No.120, RT.03/RW.20, Menteng, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16112",
                distance: "2.3 km",
                mapUrl: "https://maps.app.goo.gl/yVasRkJ3pjvQF2RQA"
            },
            {
                name: "RS Graha Medika Bogor",
                address: "Jl. KH. R. Abdullah Bin Nuh No.2, RT.04/RW.12, Cilendek Barat, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16113",
                distance: "700 m",
                mapUrl: "https://maps.app.goo.gl/qsWiRw3Y9JBqEABNA"
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
        }, {
            name: "Polsek Bogor Barat",
            address: "CQ9G+V9J, Jl. DR. Sumeru No.89, RT.01/RW.10, Menteng, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16111",
            distance: "2.1 km",
            mapUrl: "https://maps.app.goo.gl/B8HtTPSJUEYy1k6f7"
        }],
        restaurant: [{
            name: "Rumah Makan Ampera Yasmin",
            address: "Jl. KH. R. Abdullah Bin Nuh No. 37, Curugmekar",
            distance: "350 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Rumah%20Makan%20Ampera%20Yasmin%20Jl.%20KH.%20R.%20Abdullah%20Bin%20Nuh%20No.%2037%20Curugmekar"
        }],
        transport: transportFacilities,
        rekreasi: [...rekreasiFacilities, {
            name: "Yasmin Waterpark",
            address: "Yasmin Centre, Jl. KH. R. Abdullah Bin Nuh, RT.06/RW.02, Curugmekar, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16113",
            distance: "800 m",
            mapUrl: "https://maps.app.goo.gl/1PXjuMGZak6tU5PG8"
        }, {
            name: "Marcopolo Water Adventure",
            address: "Jl. Bukit Cimanggu City Raya Jl. Sholeh Iskandar, RT.01/RW.11, Cibadak, Tanah Sareal, Kota Bogor, Jawa Barat 16168",
            distance: "1.6 km",
            mapUrl: "https://maps.app.goo.gl/gnAWSfJ5eQWq9PBy5"
        }, {
            name: "Kawasan Wisata Situ Gede",
            address: "Jl. Cilubang Nagrak No.RT 02/04, RT.03/RW.06, Situgede, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16115",
            distance: "3.1 km",
            mapUrl: "https://maps.app.goo.gl/j4ccYwx5RgpNgXmTA"
        }],
        mall: [{
            name: "Bogor Great Mall",
            address: "Jl. KH. R. Abdullah Bin Nuh, RT.05/RW.04, Cibadak, Tanah Sareal, Kota Bogor, Jawa Barat 16166",
            distance: "1.1 km",
            mapUrl: "https://maps.app.goo.gl/BbmsiFRYf9hPwSsi8"
        }]
    };

    const kemangFacilities = {
        hotel: [{
            name: "Swiss-Belcourt Bogor",
            address: "Jl. Sholeh Iskandar Jl. Bukit Cimanggu City Raya No.1, RT.01/RW.13, Cibadak, Tanah Sareal, Kota Bogor, Jawa Barat 16168",
            distance: "4.2 km",
            mapUrl: "https://maps.app.goo.gl/2VQeXZGysaj5Fjg36"
        }],
        hospital: [{
                name: "RS Sentosa Bogor",
                address: "Jl. Raya Kemang No. 18, Kemang, Kab. Bogor",
                distance: "1.3 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Sentosa+Bogor+Jl.+Raya+Kemang+No.+18+Kemang+Kab.+Bogor"
            },
            {
                name: "RS Islam Bogor",
                address: "Jl. Perdana Raya No.22, RT.01/RW.10, Kedungbadak, Tanah Sareal, Kota Bogor, Jawa Barat 16710",
                distance: "3.8 km",
                mapUrl: "https://maps.app.goo.gl/aLXpeMRB5RkzAg2c9"
            }
        ],
        police: [{
            name: "Polsek Kemang",
            address: "Jl. Raya Kemang Parung No. 10, Kemang, Kab. Bogor",
            distance: "1.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Kemang+Jl.+Raya+Kemang+Parung+No.+10+Kemang+Kab.+Bogor"
        }],
        rekreasi: [{
            name: "Marcopolo Water Adventure",
            address: "Jl. Bukit Cimanggu City Raya Jl. Sholeh Iskandar, RT.01/RW.11, Cibadak, Tanah Sareal, Kota Bogor, Jawa Barat 16168",
            distance: "4.4 km",
            mapUrl: "https://maps.app.goo.gl/gnAWSfJ5eQWq9PBy5"
        }]
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
            },
            {
                name: "Hotel Green Wattana Sentul",
                address: "Jl. Juanda Blok F3/R21, Cijayanti, Kec. Babakan Madang, Kabupaten Bogor, Jawa Barat 16810",
                distance: "1.5 km",
                mapUrl: "https://maps.app.goo.gl/fJfgjh4i5iwLaxHW8"
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
        transport: transportFacilities,
        rekreasi: [...rekreasiFacilities, {
            name: "JungleLand Adventure Theme Park",
            address: "Kawasan Sentul Nirwana, Jl. Jungle Land No.1, Karang Tengah, Kec. Babakan Madang, Kabupaten Bogor, Jawa Barat 16810",
            distance: "2.2 km",
            mapUrl: "https://maps.app.goo.gl/1o395KjTfXxryYD27"
        }, {
            name: "Curug Bidadari Sentul",
            address: "9WP5+99R, Jl. Sentul Paradise Park, Bojong Koneng, Kec. Babakan Madang, Kabupaten Bogor, Jawa Barat 16810",
            distance: "1.9 km",
            mapUrl: "https://maps.app.goo.gl/SU2GdDQk9xq4YUMn8"
        }, {
            name: "Bukit Pelangi",
            address: "9VFM+9VQ, Jl. Bukit Pelangi, Gn. Geulis, Kec. Sukaraja, Kabupaten Bogor, Jawa Barat 16710",
            distance: "4.0 km",
            mapUrl: "https://maps.app.goo.gl/VyMSmfFjCZhzAiD4A"
        }],
        mall: [{
            name: "Mall AEON Sentul Bogor",
            address: "Jl. MH. Thamrin, Citaringgul, Kec. Babakan Madang, Kabupaten Bogor, Jawa Barat 16810",
            distance: "1.6 km",
            mapUrl: "https://maps.app.goo.gl/o5QoJqAqdvAfqkZn8"
        }]
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
            },
            {
                name: "The Grand Hill Hotel",
                address: "Jl. Raya Puncak, Tugu Sel., Kec. Cisarua, Kabupaten Bogor, Jawa Barat 16750",
                distance: "1.2 km",
                mapUrl: "https://maps.app.goo.gl/rZMK4NJpnARgWhZw5"
            }
        ],
        hospital: [{
                name: "RSP Goenawan Partowidigdo",
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
    let currentRouteLayer = null;
    let routeStopMarkers = [];
    let userLocationMarker = null;
    let facilityLayerMarkers = [];

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
            transport: 'transport',
            rekreasi: 'rekreasi',
            mall: 'mall'
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
            } else if (type === 'rekreasi') {
                iconBg = '#ccfbf1';
                iconColor = '#0d9488';
            } else if (type === 'mall') {
                iconBg = '#ede9fe';
                iconColor = '#7c3aed';
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

    function smoothFlyTo(latLng, targetZoom = 16) {
        if (!map) return;
        map.flyTo(L.latLng(latLng), targetZoom, {
            duration: 1.8,
            easeLinearity: 0.15,
            noMoveStart: false
        });
    }

    function smoothFlyToBounds(bounds, options = {}) {
        if (!map) return;
        map.flyToBounds(bounds, {
            padding: options.padding || [40, 40],
            maxZoom: options.maxZoom || 15,
            duration: 1.8,
            easeLinearity: 0.15
        });
    }

    function initMap() {
        const bogorCenter = [-6.587, 106.803];
        const mapElement = document.getElementById("map-canvas");
        if (!mapElement) return;

        map = L.map('map-canvas').setView(bogorCenter, 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        renderVenues(venueData);
        setupFilter();
        setupFacilityFilters();
        ensureMapSize(mapElement);
    }

    function ensureMapSize(mapElement) {
        if (!mapElement) return;
        const invalidate = function() {
            if (map) map.invalidateSize();
        };
        setTimeout(invalidate, 100);
        window.addEventListener('load', invalidate);
        const parent = mapElement.parentElement;
        if (parent && window.ResizeObserver) {
            const ro = new ResizeObserver(invalidate);
            ro.observe(parent);
        }
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
                    smoothFlyTo([venue.lat + offset.lat, venue.lng + offset.lng], 16);
                    showVenueDetails(venue);
                    const vs = document.getElementById('venue');
                    const v = venue.name.toLowerCase();
                    if (Array.from(vs.options).some(o => o.value === v)) vs.value = v;
                    if (window.filterCaborByVenue) window.filterCaborByVenue();
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
        const venueSelect = document.getElementById('venue');
        const caborSelect = document.getElementById('cabor');
        const fasilitasSelect = document.getElementById('fasilitas');

        const allCaborOptions = Array.from(caborSelect.options).map(o => ({ value: o.value, text: o.text }));

        function filterCaborByVenue() {
            const venueVal = venueSelect.value.toLowerCase();
            caborSelect.innerHTML = '';
            caborSelect.add(new Option(allCaborOptions[0].text, ''));

            if (!venueVal) {
                allCaborOptions.slice(1).forEach(o => caborSelect.add(new Option(o.text, o.value)));
                caborSelect.value = '';
                return;
            }

            const venue = venueData.find(v => v.name.toLowerCase().includes(venueVal));
            if (!venue) {
                allCaborOptions.slice(1).forEach(o => caborSelect.add(new Option(o.text, o.value)));
                caborSelect.value = '';
                return;
            }

            const venueCabors = venue.cabor.split(',').map(c => c.trim().toLowerCase());
            allCaborOptions.slice(1).forEach(o => {
                if (venueCabors.includes(o.text.trim().toLowerCase())) {
                    caborSelect.add(new Option(o.text, o.value));
                }
            });
            caborSelect.value = '';
        }

        window.filterCaborByVenue = filterCaborByVenue;

        if (venueSelect) {
            venueSelect.addEventListener('change', function() {
                filterCaborByVenue();
                filterForm.dispatchEvent(new Event('submit'));
            });
        }
        if (caborSelect) {
            caborSelect.addEventListener('change', function() {
                filterForm.dispatchEvent(new Event('submit'));
            });
        }
        if (fasilitasSelect) {
            fasilitasSelect.addEventListener('change', function() {
                filterForm.dispatchEvent(new Event('submit'));
            });
        }

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
                if (filteredVenues.length === 1) {
                    smoothFlyTo([filteredVenues[0].lat, filteredVenues[0].lng], 16);
                } else {
                    smoothFlyToBounds(bounds, {
                        padding: [40, 40]
                    });
                }
                showVenueDetails(filteredVenues[0]);

                // Fasilitas filter
                const filterToCategory = {
                    'hotel': 'cat-hotel',
                    'rumah-sakit': 'cat-rs',
                    'apotek': 'cat-apotek',
                    'rumah-makan': 'cat-resto',
                    'polisi': 'cat-police',
                    'transport': 'cat-transport',
                    'rekreasi': 'cat-rekreasi',
                    'mall': 'cat-mall',
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
                smoothFlyTo([-6.587, 106.803], 13);
            }
        });

        filterForm.addEventListener('reset', function() {
            setTimeout(() => {
                clearMarkers();
                renderVenues(venueData);
                smoothFlyTo([-6.587, 106.803], 13);
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
        clearRoute();
        const floatingCard = document.getElementById('floating-gor-card');
        floatingCard.style.display = 'block';

        document.getElementById('card-gor-name').innerText = venue.name;
        document.getElementById('card-gor-addr').innerText = venue.address;
        document.getElementById('card-gor-gmaps').href = venue.gmaps_url;

        // Siapkan kontrol rute di card venue
        const routeControls = document.getElementById('route-controls');
        if (routeControls) routeControls.style.display = 'flex';
        const routeErr = document.getElementById('route-error');
        if (routeErr) routeErr.style.display = 'none';

        const placeholder = document.getElementById('facilities-placeholder');
        if (placeholder) placeholder.style.display = 'none';

        const caborArr = venue.cabor.split(',').map(c => c.trim());
        const caborContainer = document.getElementById('card-gor-cabor-grid');
        caborContainer.innerHTML = '';
        caborArr.forEach(c => {
            let shortName = c;
            if (c.length > 10) {
                const words = c.split(' ');
                shortName = words[words.length - 1];
            }
            const iconFile = caborIcons[c] || '';
            const iconHtml = iconFile ?
                `<img src="/images/cabor/${iconFile}" alt="${c}">` :
                '';
            caborContainer.innerHTML += `
                <div class="cabor-item">
                    <div class="cabor-icon">
                        ${iconHtml}
                    </div>
                    <span>${shortName}</span>
                </div>
            `;
        });

        if (map) {
            renderFacilityCategory(venue, 'lodging', 'hotel-container', 'Hotel', 'cat-hotel');
            renderFacilityCategory(venue, 'hospital', 'rs-container', 'Fasilitas Kesehatan', 'cat-rs');
            renderFacilityCategory(venue, 'restaurant', 'resto-container', 'Restoran', 'cat-resto');
            renderFacilityCategory(venue, 'police', 'police-container', 'Kantor Polisi', 'cat-police');
            renderFacilityCategory(venue, 'pharmacy', 'apotek-container', 'Apotek', 'cat-apotek');
            renderFacilityCategory(venue, 'transport', 'transport-container', 'Sewa Kendaraan', 'cat-transport');
            renderFacilityCategory(venue, 'rekreasi', 'rekreasi-container', 'Rekreasi', 'cat-rekreasi');
            renderFacilityCategory(venue, 'mall', 'mall-container', 'Mall', 'cat-mall');
        }

        if (window.innerWidth <= 768 && floatingCard) {
            floatingCard.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
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
            'cat-rekreasi': {
                type: 'rekreasi',
                containerId: 'rekreasi-container',
                title: 'Rekreasi',
                catId: 'cat-rekreasi'
            },
            'cat-mall': {
                type: 'mall',
                containerId: 'mall-container',
                title: 'Mall',
                catId: 'cat-mall'
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

    // ── Hero Countdown Timer (Countdown to 31 October) ──
    (function initHeroCountdown() {
        const daysEls = document.querySelectorAll('.cd-days-val, .fc-days-val');
        const hoursEls = document.querySelectorAll('.cd-hours-val, .fc-hours-val');
        const minutesEls = document.querySelectorAll('.cd-minutes-val, .fc-minutes-val');
        const secondsEls = document.querySelectorAll('.cd-seconds-val, .fc-seconds-val');

        if (!daysEls.length) return;

        function updateCountdown() {
            const now = new Date();
            let target = new Date('2026-10-31T00:00:00+07:00');
            if (now > target) {
                target = new Date(now.getFullYear(), 9, 31, 0, 0, 0);
                if (now > target) {
                    target = new Date(now.getFullYear() + 1, 9, 31, 0, 0, 0);
                }
            }

            const diff = target.getTime() - now.getTime();
            if (diff <= 0) {
                daysEls.forEach(el => el.textContent = '00');
                hoursEls.forEach(el => el.textContent = '00');
                minutesEls.forEach(el => el.textContent = '00');
                secondsEls.forEach(el => el.textContent = '00');
                return;
            }

            const d = Math.floor(diff / (1000 * 60 * 60 * 24));
            const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const s = Math.floor((diff % (1000 * 60)) / 1000);

            const dStr = String(d).padStart(2, '0');
            const hStr = String(h).padStart(2, '0');
            const mStr = String(m).padStart(2, '0');
            const sStr = String(s).padStart(2, '0');

            daysEls.forEach(el => el.textContent = dStr);
            hoursEls.forEach(el => el.textContent = hStr);
            minutesEls.forEach(el => el.textContent = mStr);
            secondsEls.forEach(el => el.textContent = sStr);
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    })();

// ════ ROUTE — satu garis biru mengikuti jalan (ditambahkan ke beranda)
    // fitted dari venue.blade. Lokasi opsional: user → fasilitas → venue;
    // tanpa lokasi: venue → fasilitas. Fasilitas tanpa koordinat valid dilewati.

    const facilityCoordsMap = {
        "ASTON Bogor Hotel & Resort": [-6.6039181, 106.8386862],
        "Apotek Kimia Farma KBP": [-6.8683426, 107.4672913],
        "Bobocabin Gunung Mas": [-6.7062251, 106.9688804],
        "Bogor Great Mall": [-6.5560457, 106.7755713],
        "Bogor Icon Hotel": [-6.5561334, 106.7827129],
        "Bukit Pelangi": [-6.618203, 106.8808525],
        "Bumi Aki Kota Baru Parahyangan": [-6.866775, 107.4648551],
        "Curug Bidadari Sentul": [-6.5882587, 106.9849449],
        "Fitra Hotel Majalengka": [-6.8361704, 108.2322636],
        "Grand Cordela Hotel Bandung": [-6.9370389, 107.687952],
        "Harris Hotel Sentul City": [-6.5595269, 106.8506102],
        "IPB Hotel & Convention Centre": [-6.6021771, 106.8066276],
        "JungleLand Adventure Theme Park": [-6.5728839, 106.8947001],
        "Kebun Raya Bogor": [-6.5983048, 106.7994229],
        "Key Inn Hotel": [-6.5976712, 106.80908],
        "Lapangan Sempur Bogor": [-6.5916349, 106.8007857],
        "Lorin Sentul Hotel": [-6.5315604, 106.85655],
        "Mall AEON Sentul Bogor": [-6.5669259, 106.8578248],
        "Mall BTM": [-6.6048843, 106.7955589],
        "Mall Botani Square Bogor": [-6.6013419, 106.8073342],
        "Mall Jambu Dua": [-6.5687869, 106.8092602],
        "Marcopolo Water Adventure": [-6.5478286, 106.7826037],
        "Mason Pine Hotel": [-6.8639199, 107.4801649],
        "Polres Cimahi": [-6.8852792, 107.5535739],
        "Polresta Bogor Kota (Mako Muslihat)": [-6.5965986, 106.7914163],
        "Polsek Babakan Madang": [-6.5716116, 106.8651862],
        "Polsek Bogor Barat": [-6.65764, 106.8492406],
        "Polsek Bogor Selatan": [-6.6422893, 106.8076973],
        "Polsek Bogor Utara": [-6.5792052, 106.8067405],
        "Polsek Kemang": [-6.4787686, 106.7234857],
        "Polsek Padalarang": [-6.8422655, 107.4969093],
        "Polsek Tanah Sareal": [-6.5425753, 106.7841037],
        "Puskesmas Arcamanik": [-6.9145472, 107.6786845],
        "Puskesmas Babakan Madang": [-6.5324324, 106.8564552],
        "Puskesmas Bogor Tengah": [-6.5929668, 106.7944517],
        "Puskesmas Bogor Utara": [-6.5477817, 106.8218678],
        "Puskesmas Cimahi Tengah": [-6.8723378, 107.5420574],
        "Puskesmas Cipaku": [-6.6304133, 106.8108651],
        "Puskesmas Cisarua": [-6.6821598, 106.9343392],
        "Puskesmas Gang Kelor": [-6.5789198, 106.7725332],
        "Puskesmas Kemang": [-6.539033, 106.7377041],
        "Puskesmas Majalengka": [-6.8313609, 108.2061656],
        "Puskesmas Padalarang": [-6.8425848, 107.4952806],
        "RM Khas Sunda Saung Balong": [-6.833943, 108.2294288],
        "RS Azra": [-6.5791788, 106.8080928],
        "RS Cahya Kawaluyan": [-6.8657101, 107.4739769],
        "RS Dustira Cimahi": [-6.886595, 107.5342305],
        "RS EMC Sentul": [-6.5671542, 106.8537723],
        "RS Graha Medika Bogor": [-6.5647497, 106.7617167],
        "RS Hermina Arcamanik": [-6.9049139, 107.6667357],
        "RS Hermina Bogor": [-6.5575957, 106.7739056],
        "RS Melania Bogor": [-6.6112552, 106.8007868],
        "RS Mulia Pajajaran Bogor": [-6.5755166, 106.807309],
        "RS PMI Bogor": [-6.5984054, 106.8060224],
        "RS Sentosa Bogor": [-6.4953005, 106.7511403],
        "RS Siloam Bogor": [-6.5955895, 106.8049335],
        "RS UMMI": [-6.6088556, 106.7946494],
        "RS VANIA": [-6.6128581, 106.8079247],
        "RSIA Pasutri Bogor": [-6.5705914, 106.7989952],
        "RSP Goenawan Partowidigdo": [-6.6883853, 106.9395411],
        "RSUD Kota Bogor": [-6.5804103, 106.7784481],
        "RSUD Majalengka": [-6.7608967, 108.1955299],
        "Restoran Lorin Sentul": [-6.5315604, 106.85655],
        "Rumah Makan Ampera Pemuda": [-6.5789558, 106.7964602],
        "Swiss-Belhotel Bogor": [-6.5886646, 106.8042799],
        "The Grand Hill Hotel": [-6.6894345, 106.9610658],
        "The Jungle Water Park": [-6.6344256, 106.7954514],
        "The Mirah Hotel Bogor": [-6.5907329, 106.8036028],
        "The Sahira Hotel": [-6.5750492, 106.8001943],
        "Toko Adelways (Kantin IPB Cilibende)": [-6.5954187, 106.7882974],
        "Yasmin Waterpark": [-6.5617285, 106.7651193],
        "Zest Hotel Bogor": [-6.5933754, 106.8051007],
    };

    // Rute biru tunggal: lokasi pengguna → ≤4 fasilitas VALID → venue
    // (tanpa lokasi: venue → ≤4 fasilitas VALID terdekat). Fasilitas tanpa
    // koordinat valid DILEWATI (pakai berikutnya), tanpa koordinat palsu/
    // estimasi. GEOCODE_LIMIT membatasi request geocode runtime.
    const ROUTE_STOPS_MAX = 4;      // maks fasilitas yang masuk jalur rute (3–5)
    const ROUTE_GEOCODE_LIMIT = 16; // maks fasilitas yang dicoba di-geocode runtime
    const NOMINATIM_DELAY_MS = 1100; // rate limit Nominatim (>= 1 detik/request)

    function createFacilityStopIcon(color) {
        return L.divIcon({
            html: `<div class="route-stop-marker" style="--stop-color:${color}">
                <span></span>
            </div>`,
            className: '',
            iconSize: [18, 18],
            iconAnchor: [9, 9]
        });
    }

    // Icon marker lokasi pengguna — berbeda dari marker fasilitas/venue.
    function createUserLocationIcon() {
        return L.divIcon({
            html: `<div class="user-loc-marker"><span class="ul-pulse"></span><span class="ul-core"></span></div>`,
            className: '',
            iconSize: [24, 24],
            iconAnchor: [12, 12]
        });
    }

    // Ambil lokasi pengguna via geolocation browser (titik awal rute).
    // Return Promise.resolve(pos) atau Promise.resolve({ error: 'denied'|'unavailable' }).
    function getUserLocation() {
        return new Promise(resolve => {
            if (!('geolocation' in navigator)) {
                return resolve({ error: 'unavailable' });
            }
            navigator.geolocation.getCurrentPosition(
                function(pos) {
                    resolve({ lat: pos.coords.latitude, lng: pos.coords.longitude });
                },
                function(err) {
                    const denied = err && (err.code === err.PERMISSION_DENIED || err.code === 1);
                    resolve({ error: denied ? 'denied' : 'unavailable' });
                },
                { enableHighAccuracy: true, timeout: 10000, maximumAge: 30000 }
            );
        });
    }

    function clearRoute() {
        if (currentRouteLayer && map) {
            map.removeLayer(currentRouteLayer);
            currentRouteLayer = null;
        }
        (routeStopMarkers || []).forEach(m => { if (m && map) map.removeLayer(m); });
        routeStopMarkers = [];
        if (userLocationMarker && map) {
            map.removeLayer(userLocationMarker);
            userLocationMarker = null;
        }
        (facilityLayerMarkers || []).forEach(m => { if (m && map) map.removeLayer(m); });
        facilityLayerMarkers = [];
        const info = document.getElementById('route-info');
        const error = document.getElementById('route-error');
        const usage = document.getElementById('route-usage');
        const loading = document.getElementById('route-loading');
        const btnClear = document.getElementById('btn-clear-route');
        const btnRoute = document.getElementById('btn-show-route');
        const infoTitle = document.getElementById('route-info-title');
        if (info) info.style.display = 'none';
        if (infoTitle) infoTitle.textContent = '';
        if (error) error.style.display = 'none';
        if (usage) usage.style.display = 'none';
        if (loading) loading.style.display = 'none';
        if (btnClear) btnClear.style.display = 'none';
        if (btnRoute) {
            btnRoute.classList.remove('loading');
            btnRoute.disabled = false;
            btnRoute.style.display = 'flex';
        }
    }

    function formatDistance(meters) {
        if (meters >= 1000) {
            return (meters / 1000).toFixed(1) + ' km';
        }
        return Math.round(meters) + ' m';
    }

    function formatDuration(seconds) {
        const mins = Math.round(seconds / 60);
        if (mins < 60) return mins + ' menit';
        const hours = Math.floor(mins / 60);
        const remainMins = mins % 60;
        return hours + ' jam ' + remainMins + ' menit';
    }

    // Ekstrak koordinat langsung dari URL Google Maps jika tersedia (tanpa geocoding)
    function extractCoordsFromMapUrl(mapUrl) {
        if (!mapUrl) return null;
        const m3 = mapUrl.match(/!3d(-?\d+\.?\d*)!4d(-?\d+\.?\d*)/);
        if (m3) return { lat: parseFloat(m3[1]), lng: parseFloat(m3[2]) };
        const mAt = mapUrl.match(/@(-?\d+\.?\d*),(-?\d+\.?\d*)/);
        if (mAt) return { lat: parseFloat(mAt[1]), lng: parseFloat(mAt[2]) };
        const mQuery = mapUrl.match(/query=(-?\d+\.?\d*),(-?\d+\.?\d*)/);
        if (mQuery) return { lat: parseFloat(mQuery[1]), lng: parseFloat(mQuery[2]) };
        return null;
    }

    // Ekstrak teks nama+alamat dari URL text-search Google Maps utk geocoding
    function parseQueryFromMapUrl(mapUrl) {
        if (!mapUrl) return null;
        const m = mapUrl.match(/[?&]query=([^&]+)/);
        if (!m) return null;
        try {
            return decodeURIComponent(m[1].replace(/\+/g, ' '));
        } catch (e) {
            return null;
        }
    }

    // Geocode satu fasilitas via OSM Nominatim (tanpa API key).
    // Dipanggil via JSONP (<script src>) sehingga bebas dari blokir CORS browser.
    // Return null jika gagal/rate-limit/response kosong (fasilitas di-skip, tanpa koordinat palsu).
    function geocodeFacility(query) {
        return new Promise(resolve => {
            if (!query) return resolve(null);
            const cbName = '_nomCb_' + Date.now() + '_' + Math.floor(Math.random() * 1e5);
            let done = false;
            let s = null;
            let timer = null;
            function finish(val) {
                if (done) return;
                done = true;
                clearTimeout(timer);
                if (s && s.parentNode) s.parentNode.removeChild(s);
                delete window[cbName];
                resolve(val);
            }
            window[cbName] = function(data) {
                if (!data || data.length === 0) return finish(null);
                finish({ lat: parseFloat(data[0].lat), lng: parseFloat(data[0].lon) });
            };
            try {
                s = document.createElement('script');
                s.async = true;
                s.onerror = function() { finish(null); };
                s.src = 'https://nominatim.openstreetmap.org/search?' + new URLSearchParams({
                    q: query,
                    format: 'json',
                    limit: '1',
                    countrycodes: 'id',
                    json_callback: cbName
                }).toString();
            } catch (e) {
                finish(null);
                return;
            }
            timer = setTimeout(function() { finish(null); }, 8000);
            document.head.appendChild(s);
        });
    }

    function haversineKm(lat1, lng1, lat2, lng2) {
        const R = 6371;
        const dLat = (lat2 - lat1) * Math.PI / 180;
        const dLng = (lng2 - lng1) * Math.PI / 180;
        const a = Math.sin(dLat / 2) ** 2 +
            Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
            Math.sin(dLng / 2) ** 2;
        return R * 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    }

    // Parse nilai jarak dari data fasilitas ("300 m", "1.2 km") menjadi km.
    function parseDistanceKm(str) {
        if (!str) return NaN;
        const m = String(str).trim().match(/^([\d.,]+)\s*(km|m)?$/i);
        if (!m) return NaN;
        const v = parseFloat(m[1].replace(',', '.'));
        if (isNaN(v) || v < 0) return NaN;
        return (m[2] || '').toLowerCase() === 'm' ? v / 1000 : v;
    }

    // Bearing awal (derajat 0-360) dari titik A ke titik B.
    function bearingDeg(lat1, lng1, lat2, lng2) {
        const toRad = Math.PI / 180;
        const phi1 = lat1 * toRad;
        const phi2 = lat2 * toRad;
        const dLng = (lng2 - lng1) * toRad;
        const y = Math.sin(dLng) * Math.cos(phi2);
        const x = Math.cos(phi1) * Math.sin(phi2) - Math.sin(phi1) * Math.cos(phi2) * Math.cos(dLng);
        return (Math.atan2(y, x) * 180 / Math.PI + 360) % 360;
    }

    // Titik tujuan dari start + arah (derajat) + jarak (km).
    function destinationPoint(lat, lng, brngDeg, km) {
        const toRad = Math.PI / 180;
        const R = 6371;
        const brng = brngDeg * toRad;
        const d = km / R;
        const phi1 = lat * toRad;
        const lam1 = lng * toRad;
        const phi2 = Math.asin(Math.sin(phi1) * Math.cos(d) + Math.cos(phi1) * Math.sin(d) * Math.cos(brng));
        const lam2 = lam1 + Math.atan2(
            Math.sin(brng) * Math.sin(d) * Math.cos(phi1),
            Math.cos(d) - Math.sin(phi1) * Math.sin(phi2)
        );
        return { lat: phi2 / toRad, lng: lam2 / toRad };
    }

    // Ekstrak nama kota/kabupaten dari alamat venue untuk fallback geocoding.
    function extractCityFromAddress(address) {
        if (!address) return '';
        const m = address.match(/(?:Kota|Kab(?:upaten)?\.?\s+)(\w[\w\s]*?)(?:,|\s*\d|$)/i);
        if (m) return m[1].trim();
        // fallback: cari kata kota umum
        const cities = ['Bogor', 'Cimahi', 'Bandung', 'Majalengka', 'Padalarang', 'Depok', 'Bekasi', 'Sukabumi'];
        for (const c of cities) {
            if (address.indexOf(c) !== -1) return c;
        }
        return '';
    }

    // Ambil fasilitas terdekat (sesuai daftar per venue) dari venue;
    // utk masing-masing dapatkan koordinat: baked → URL map → geocoding runtime.
    // realOnly=true: fasilitas tanpa koordinat VALID dilewati (tanpa estimasi/
    // palsu) dan hasil dibatasi ROUTE_STOPS_MAX — dipakai utk jalur rute.
    // Strategi geocode: nama pendek dulu (hit-rate tinggi), fallback nama+kota.
    // Filter: hasil geocode harus ≤ 40 km dari venue (buang false positive).
    async function collectNearestFacilities(venue, opts) {
        const venueFacilities = facilitiesData[venue.name];
        if (!venueFacilities) return [];

        opts = opts || {};
        const MAX_DIST_KM = 40; // toleransi jarak maks dari venue
        const venueCity = extractCityFromAddress(venue.address);

        const priorityOrder = ['hospital', 'hotel', 'pharmacy', 'restaurant', 'police', 'transport', 'rekreasi', 'lodging'];
        const categoryLabels = {
            hotel: 'Hotel', lodging: 'Hotel', hospital: 'Rumah Sakit',
            pharmacy: 'Apotek', restaurant: 'Restoran', police: 'Polisi',
            transport: 'Transport', rekreasi: 'Rekreasi'
        };

        // Kumpulkan semua kandidat fasilitas (kategori prioritas didahulukan)
        const candidates = [];
        priorityOrder.forEach(type => {
            const items = venueFacilities[type] || [];
            items.forEach(item => {
                if (!item || !item.name) return;
                candidates.push({
                    name: item.name,
                    address: item.address || '',
                    distance: item.distance || '',
                    mapUrl: item.mapUrl || '',
                    type: type,
                    label: categoryLabels[type] || type
                });
            });
        });

        // Batasi jumlah yg dicoba di-geocode agar cepat (prioritas kategori)
        const toProcess = candidates.slice(0, ROUTE_GEOCODE_LIMIT);
        let resolved = [];
        const needsEstimate = [];

        for (let i = 0; i < toProcess.length; i++) {
            const fac = toProcess[i];
            let coord = null;

            // Prioritas 1: koordinat yang sudah di-bake di facilityCoordsMap
            const baked = facilityCoordsMap[fac.name];
            if (baked) {
                coord = { lat: baked[0], lng: baked[1] };
            } else {
                // Prioritas 2: ekstrak koordinat dari URL Google Maps
                coord = extractCoordsFromMapUrl(fac.mapUrl);
            }

            if (!coord) {
                // Prioritas 3: geocoding runtime bertingkat (nama pendek → nama + kota)
                const queryChain = [fac.name];
                if (venueCity && fac.name.indexOf(venueCity) === -1) {
                    queryChain.push(fac.name + ' ' + venueCity);
                }

                for (let qi = 0; qi < queryChain.length; qi++) {
                    const result = await geocodeFacility(queryChain[qi]);
                    if (result) {
                        // Filter jarak: buang false positive (salah kota/provinsi)
                        const dist = haversineKm(result.lat, result.lng, venue.lat, venue.lng);
                        if (dist <= MAX_DIST_KM) {
                            coord = result;
                            break;
                        }
                    }
                    // delay rate limit antar request
                    await new Promise(r => setTimeout(r, NOMINATIM_DELAY_MS));
                }
            }

            if (coord) {
                coord.distToVenue = haversineKm(coord.lat, coord.lng, venue.lat, venue.lng);
                coord.name = fac.name;
                coord.type = fac.type;
                coord.label = fac.label;
                coord.address = fac.address;
                coord.estimated = false;
                resolved.push(coord);
            } else {
                needsEstimate.push(fac);
            }
        }

        // FALLBACK ESTIMASI (hanya utk tampilan peta, BUKAN utk rute).
        // Saat realOnly=true, fasilitas tanpa koordinat valid DILEWATI —
        // "jangan membuat koordinat palsu", rute pakai fasilitas berikutnya.
        if (!opts.realOnly && needsEstimate.length > 0 && resolved.length > 0) {
            const anchor = resolved.slice().sort((a, b) => a.distToVenue - b.distToVenue)[0];
            needsEstimate.forEach(fac => {
                const distKm = parseDistanceKm(fac.distance);
                if (!(distKm > 0) || distKm > MAX_DIST_KM) return;
                const brng = bearingDeg(venue.lat, venue.lng, anchor.lat, anchor.lng);
                const p = destinationPoint(venue.lat, venue.lng, brng, distKm);
                resolved.push({
                    lat: p.lat, lng: p.lng,
                    distToVenue: distKm,
                    name: fac.name,
                    type: fac.type,
                    label: fac.label,
                    address: fac.address,
                    estimated: true
                });
            });
        }

        // urutkan berdasarkan jarak ke venue; realOnly membatasi yg masuk rute
        resolved.sort((a, b) => a.distToVenue - b.distToVenue);
        if (opts.realOnly) {
            const capStops = (venue && venue.maxStops) ? venue.maxStops : ROUTE_STOPS_MAX;
            resolved = resolved.slice(0, capStops);
        }
        return resolved;
    }

    // Susun urutan kunjungan secara logis (greedy nearest-neighbor):
    // mulai dari titik start, selalu lanjut ke titik terdekat yang belum
    // dikunjungi, akhiri di venue. Hanya menentukan URUTAN waypoint,
    // bukan bentuk garis (bentuk garis tetap dari OSRM route geometry).
    function orderWaypoints(points, startIdx, endIdx) {
        const remaining = points.map((_, i) => i);
        const removeIdx = (arr, idx) => arr.splice(arr.indexOf(idx), 1);
        const order = [startIdx];
        removeIdx(remaining, startIdx);
        removeIdx(remaining, endIdx);

        let cur = startIdx;
        while (remaining.length > 0) {
            let best = -1;
            let bestDist = Infinity;
            for (let i = 0; i < remaining.length; i++) {
                const d = haversineKm(
                    points[cur].lat, points[cur].lng,
                    points[remaining[i]].lat, points[remaining[i]].lng
                );
                if (d < bestDist) {
                    bestDist = d;
                    best = remaining[i];
                }
            }
            if (best === -1) break;
            order.push(best);
            removeIdx(remaining, best);
            cur = best;
        }
        order.push(endIdx);
        return order.map(i => points[i]);
    }

    // OSRM: gabungkan semua waypoint jadi SATU LineString geometry yang
    // mengikuti jalan sebenarnya (bukan garis lurus antar titik).
    // 1) Coba /trip (roundtrip=false) utk OPTIMASI urutan waypoint.
    // 2) Fallback ke /route dgn urutan greedy yg sudah ditentukan
    //    (dua-duanya tetap mengikuti jaringan jalan).
    async function fetchConnectedRoute(points) {
        if (!points || points.length < 2) return null;
        const coordsStr = points.map(p => `${p.lng},${p.lat}`).join(';');
        const base = 'https://router.project-osrm.org';

        try {
            const tripUrl = `${base}/trip/v1/driving/${coordsStr}?roundtrip=false&source=first&destination=last&overview=full&geometries=geojson&steps=false`;
            const res = await fetch(tripUrl);
            if (res.ok) {
                const data = await res.json();
                if (data.code === 'Ok' && data.trips && data.trips.length > 0) {
                    const t = data.trips[0];
                    if (t.legs && t.legs.length > 0 && t.geometry) {
                        const coords = t.geometry.coordinates.map(c => [c[1], c[0]]);
                        return { coordinates: coords, distance: t.distance, duration: t.duration };
                    }
                }
            }
        } catch (e) { /* lanjut ke fallback route */ }

        try {
            const routeUrl = `${base}/route/v1/driving/${coordsStr}?overview=full&geometries=geojson`;
            const res = await fetch(routeUrl);
            if (!res.ok) return null;
            const data = await res.json();
            if (data.code !== 'Ok' || !data.routes || data.routes.length === 0) return null;
            const route = data.routes[0];
            const coords = route.geometry.coordinates.map(c => [c[1], c[0]]);
            return {
                coordinates: coords,
                distance: route.distance,
                duration: route.duration
            };
        } catch (e) {
            return null;
        }
    }

    // Orchestrator utama: tombol "Tampilkan Rute" → lokasi pengguna →
    // fasilitas terdekat (koordinat valid saja) → OSRM buat SATU jalur
    // biru: lokasi pengguna → ≤4 fasilitas → venue.
    async function startAutoRoute() {
        if (!currentVenue || !map) return;

        clearRoute();

        const btn = document.getElementById('btn-show-route');
        const loading = document.getElementById('route-loading');
        const error = document.getElementById('route-error');
        const info = document.getElementById('route-info');
        const usage = document.getElementById('route-usage');
        const btnClear = document.getElementById('btn-clear-route');
        const infoTitle = document.getElementById('route-info-title');

        // state loading
        btn.style.display = 'none';
        loading.style.display = 'flex';

        // 1. Lokasi pengguna = titik awal rute (OPSIONAL). Jika diizinkan →
        //    user → fasilitas → venue. Jika ditolak/tak ada → rute dari venue
        //    → fasilitas terdekat (tetap satu garis biru utuh, tanpa wajib izin).
        const pos = await getUserLocation();
        const hasUserLoc = !!(pos && !pos.error);
        if (hasUserLoc) {
            userLocationMarker = L.marker([pos.lat, pos.lng], {
                icon: createUserLocationIcon(),
                zIndexOffset: 1000
            }).addTo(map);
            userLocationMarker.bindTooltip('Lokasi Anda');
        }

        // 2. Fasilitas terdekat dengan koordinat VALID (baked/URL/geocode).
        //    Tanpa koordinat valid → dilewati, pakai fasilitas berikutnya.
        let facilityCoords = [];
        try {
            facilityCoords = await collectNearestFacilities(currentVenue, { realOnly: true });
        } catch (e) {
            facilityCoords = [];
        }

        // 3. Marker SEMUA fasilitas valid di peta (warna per kategori).
        const stopColors = {
            hospital: '#dc2626', hotel: '#d97706', lodging: '#d97706',
            pharmacy: '#9333ea', restaurant: '#16a34a', police: '#4f46e5',
            transport: '#0284c7', rekreasi: '#0d9488', venue: '#2563eb'
        };
        facilityLayerMarkers = [];
        facilityCoords.forEach(f => {
            const color = stopColors[f.type] || '#6b7280';
            const m = L.marker([f.lat, f.lng], {
                icon: createFacilityStopIcon(color),
                zIndexOffset: 300
            }).addTo(map);
            m.bindTooltip(`${f.label || ''} ${f.name}` + (f.address ? ' · ' + f.address : ''));
            facilityLayerMarkers.push(m);
        });

        // 4. Waypoint: (lokasi user →) ≤maxStops fasilitas terdekat → venue.
        const venuePts = facilityCoords.map(f => ({
            lat: f.lat, lng: f.lng,
            name: f.name, type: f.type, label: f.label,
            address: f.address, estimated: f.estimated
        }));
        const waypoints = [];
        if (hasUserLoc) {
            waypoints.push({ lat: pos.lat, lng: pos.lng, name: 'Lokasi Anda', type: 'user' });
        } else {
            waypoints.push({ lat: currentVenue.lat, lng: currentVenue.lng, name: currentVenue.name, type: 'venue' });
        }
        waypoints.push(...venuePts);
        if (hasUserLoc) {
            waypoints.push({ lat: currentVenue.lat, lng: currentVenue.lng, name: currentVenue.name, type: 'venue' });
        }

        // 5. Urutkan kunjungan: mulai dari titik awal (index 0), akhiri di
        //    venue (pakai lokasi) atau fasilitas terjauh (tanpa lokasi).
        const orderedPoints = orderWaypoints(waypoints, 0, waypoints.length - 1);

        // 6. OSRM (trip utk optimasi urutan, fallback route greedy) — SATU
        //    LineString yang mengikuti jalan sebenarnya.
        const result = await fetchConnectedRoute(orderedPoints);

        loading.style.display = 'none';
        btn.style.display = 'flex';

        if (!result) {
            error.textContent = 'Rute tidak dapat ditemukan.';
            error.style.display = 'flex';
            return;
        }

        // 7. Polyline biru tunggal
        currentRouteLayer = L.polyline(result.coordinates, {
            color: '#2563eb',
            weight: 5,
            opacity: 0.78,
            smoothFactor: 1,
            lineCap: 'round',
            lineJoin: 'round'
        }).addTo(map);

        // 8. Info jarak/waktu/jumlah fasilitas
        infoTitle.textContent = hasUserLoc
            ? 'Rute ke ' + currentVenue.name
            : 'Rute dari ' + currentVenue.name + ' ke fasilitas terdekat';
        document.getElementById('route-distance').textContent = formatDistance(result.distance);
        document.getElementById('route-duration').textContent = formatDuration(result.duration);
        document.getElementById('route-stops').textContent = venuePts.length + ' fasilitas di rute';
        info.style.display = 'flex';
        btnClear.style.display = 'flex';

        // 9. Zoom fit keseluruhan rute (user → venue)
        const bounds = L.latLngBounds([
            [hasUserLoc ? pos.lat : currentVenue.lat, hasUserLoc ? pos.lng : currentVenue.lng],
            [currentVenue.lat, currentVenue.lng]
        ]);
        result.coordinates.forEach(c => bounds.extend(c));
        map.flyToBounds(bounds, {
            padding: [60, 60],
            maxZoom: 15,
            duration: 1.2
        });
    }

    function setupRouteControls() {
        const btnRoute = document.getElementById('btn-show-route');
        const btnClear = document.getElementById('btn-clear-route');
        const routeError = document.getElementById('route-error');

        if (btnRoute) {
            btnRoute.addEventListener('click', function() {
                if (!currentVenue) return;
                routeError.style.display = 'none';
                startAutoRoute();
            });
        }

        if (btnClear) {
            btnClear.addEventListener('click', function() {
                clearRoute();
            });
        }
    }

        window.onload = function() {
        initMap();
        setupRouteControls();
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