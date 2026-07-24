@extends('layouts.app')

@section('title', 'Peta Venue - PORPROV XV KOTA BOGOR 2026')

@push('styles')
<style>
    /* ── Map Section Grid (from homepage) ── */
    .map-section-grid {
        display: grid;
        grid-template-columns: 65% 35%;
        gap: 24px;
        align-items: stretch;
    }

    .map-box-card {
        background: #ffffff;
        border-radius: 18px;
        box-shadow: 0 4px 22px rgba(0, 0, 0, 0.06);
        border: 1px solid #e2e8f0;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .map-container-wrap {
        position: relative;
        width: 100%;
        height: 520px;
        min-height: 300px;
        background: #e2e8f0;
    }

    #map-canvas {
        width: 100% !important;
        height: 100% !important;
    }

    /* ── GOR Card (inside left column, below map) ── */
    .home-gor-card {
        background: #f8fafc;
        border-top: 1px solid #e2e8f0;
        padding: 18px 20px;
        display: none;
    }

    .gor-card-header {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 15.5px;
        font-weight: 800;
        color: #013469;
        margin-bottom: 6px;
    }

    .gor-card-body .addr {
        font-size: 12px;
        color: #64748b;
        display: flex;
        align-items: flex-start;
        gap: 6px;
        margin-bottom: 12px;
        line-height: 1.4;
    }

    .cabor-grid {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .cabor-tag {
        background: #e0f2fe;
        color: #0369a1;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11.5px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .cabor-tag-icon {
        width: 18px;
        height: 18px;
        object-fit: contain;
        vertical-align: middle;
    }

    .map-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: #013469;
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        padding: 9px 18px;
        text-decoration: none;
        border-radius: 8px;
        transition: background 0.2s;
    }

    .map-btn:hover {
        background: #012050;
        color: #fff;
    }

    /* ── Right Panel: Facilities & Filter ── */
    .facilities-panel-card {
        background: #ffffff;
        border-radius: 18px;
        box-shadow: 0 4px 22px rgba(0, 0, 0, 0.06);
        border: 1px solid #e2e8f0;
        padding: 22px;
        display: flex;
        flex-direction: column;
    }

    .filter-form-clean {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-bottom: 18px;
    }

    .filter-form-clean .full-width {
        grid-column: 1 / -1;
    }

    .filter-select-styled {
        width: 100%;
        height: 44px;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        padding: 0 14px;
        font-size: 13px;
        font-family: inherit;
        outline: none;
        background-color: #fff;
        transition: all 0.2s;
    }

    .filter-select-styled:focus {
        border-color: #013469;
        box-shadow: 0 0 0 3px rgba(1, 52, 105, 0.1);
    }

    .filter-actions {
        display: flex;
        gap: 10px;
        grid-column: 1 / -1;
    }

    .btn-search-blue {
        flex: 1;
        height: 44px;
        background: #013469;
        color: #fff;
        font-weight: 700;
        font-size: 13.5px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-search-blue:hover {
        background: #012050;
    }

    .btn-reset-light {
        height: 44px;
        padding: 0 18px;
        background: #f1f5f9;
        color: #475569;
        font-weight: 600;
        font-size: 13px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-reset-light:hover {
        background: #e2e8f0;
    }

    /* ── Facility Tabs ── */
    .facility-tabs-bar {
        display: flex;
        gap: 6px;
        overflow-x: auto;
        padding-bottom: 10px;
        border-bottom: 1px solid #f1f5f9;
        margin-bottom: 16px;
    }

    .facility-tabs-bar::-webkit-scrollbar {
        height: 4px;
    }

    .facility-tabs-bar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }

    .facility-filter-btn {
        padding: 6px 14px;
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        color: #64748b;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .facility-filter-btn:hover,
    .facility-filter-btn.active {
        background: #013469;
        border-color: #013469;
        color: #fff;
    }

    /* ── Facility Scroll List ── */
    .facilities-scroll-list {
        flex: 1;
        max-height: 320px;
        overflow-y: auto;
        padding-right: 4px;
    }

    .facilities-scroll-list::-webkit-scrollbar {
        width: 5px;
    }

    .facilities-scroll-list::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .facility-list-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 11px;
        border-radius: 10px;
        border: 1px solid #f1f5f9;
        margin-bottom: 8px;
        transition: background 0.2s;
    }

    .facility-list-item:hover {
        background: #f8fafc;
        border-color: #e2e8f0;
    }

    .fli-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .fli-info {
        flex: 1;
        min-width: 0;
    }

    .fli-name {
        font-size: 13px;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .fli-addr {
        font-size: 11px;
        color: #64748b;
        margin: 2px 0 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .fli-route {
        padding: 5px 12px;
        background: #e0f2fe;
        color: #0284c7;
        font-size: 11.5px;
        font-weight: 700;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.2s;
    }

    .fli-route:hover {
        background: #0284c7;
        color: #fff;
    }

    /* ── Sport Marker ── */
    .sport-marker {
        background: #fff;
        border: 2.5px solid #013469;
        border-radius: 50%;
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(1, 52, 105, 0.3);
    }

    .sport-marker-inner {
        width: 28px;
        height: 28px;
        object-fit: contain;
    }

    /* ── Legacy hidden ── */
    .venue-body {
        display: none;
    }

    /* ── Responsive ── */
    @media (max-width: 1024px) {
        .map-section-grid {
            grid-template-columns: 1fr;
        }

        .map-container-wrap {
            height: 400px;
        }

        .facilities-panel-card {
            max-height: none;
        }
    }

    @media (max-width: 768px) {
        .filter-form-clean {
            grid-template-columns: 1fr;
        }

        .filter-select-styled,
        .btn-search-blue,
        .btn-reset-light {
            height: 40px;
            font-size: 12px;
        }

        .facility-filter-btn {
            padding: 5px 10px;
            font-size: 11px;
        }

        .facilities-scroll-list {
            max-height: 260px;
        }

        .map-container-wrap {
            height: 320px;
        }

        .home-gor-card {
            padding: 14px 16px;
        }

        .gor-card-header {
            font-size: 14px;
        }
    }
</style>
@endpush

@section('content')
<section class="page-banner">
    <img class="banner-bg-img" src="{{ asset('images/hero-bg.png') }}" alt="">
    <div class="banner-inner">
        <div class="banner-icon">
            <svg width="28" height="28" fill="none" stroke="#fff" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
        </div>
        <div class="banner-text">
            <span class="banner-badge">PORPROV XV · 2026</span>
            <h1>PETA VENUE PORPROV XV 2026</h1>
            <p>Klik pin pada peta untuk melihat Detail Olahraga, Hotel Terdekat & Rumah Sakit Terdekat (&lt; 3 Km)</p>
        </div>
    </div>
    <div class="banner-accent-line"></div>
    <div class="banner-bottom-curve">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,20 1200,60 L1200,120 L0,120 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</section>

<div style="max-width:1200px; margin:30px auto; padding:0 20px;">
    <div class="map-section-grid">
        <!-- LEFT: MAP -->
        <div class="map-box-card">
            <div class="map-container-wrap">
                <div id="map-canvas"></div>
            </div>

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

        <!-- RIGHT: FILTER & FACILITIES -->
        <div class="facilities-panel-card">
            <form id="map-filter-form" class="filter-form-clean">
                <div class="full-width">
                    <select class="filter-select-styled" id="fasilitas">
                        <option value="">Semua Fasilitas Terdekat</option>
                        <option value="hotel">Hotel & Penginapan</option>
                        <option value="rumah-sakit">Rumah Sakit & Klinik</option>
                        <option value="apotek">Apotek</option>
                        <option value="rumah-makan">Restoran & Kuliner</option>
                    </select>
                </div>

                <div>
                    <select class="filter-select-styled" id="cabor">
                        <option value="">Filter Cabang Olahraga</option>
                        <option value="drumband">Drumband</option>
                        <option value="pencak silat">Pencak Silat</option>
                        <option value="taekwondo">Taekwondo</option>
                        <option value="judo">Judo</option>
                        <option value="kurash">Kurash</option>
                        <option value="sambo">Sambo</option>
                        <option value="tenis meja">Tenis Meja</option>
                        <option value="shorinji kempo">Shorinji Kempo</option>
                        <option value="tarung derajat">Tarung Derajat</option>
                        <option value="anggar">Anggar</option>
                        <option value="angkat besi">Angkat Besi</option>
                        <option value="angkat berat">Angkat Berat</option>
                        <option value="arung jeram">Arung Jeram</option>
                        <option value="binaraga">Binaraga</option>
                        <option value="petanque">Petanque</option>
                        <option value="modern pentathlon">Modern Pentathlon</option>
                        <option value="panahan">Panahan</option>
                        <option value="panjat tebing">Panjat Tebing</option>
                        <option value="bola tangan">Bola Tangan</option>
                        <option value="dansa">Dansa</option>
                        <option value="gimnastik">Gimnastik</option>
                        <option value="menembak">Menembak</option>
                        <option value="aerosport">Aerosport</option>
                        <option value="ski air">Ski Air</option>
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
                        <option value="brajamustika hotel">Brajamustika Hotel</option>
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

            <div class="facility-tabs-bar">
                <button class="facility-filter-btn active" data-filter="all">Semua</button>
                <button class="facility-filter-btn" data-filter="cat-hotel">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 18h16v-2H2v2zm0-5h16V5H2v8zm2-6h12v4H4V7z" />
                    </svg>
                    Hotel
                </button>
                <button class="facility-filter-btn" data-filter="cat-rs">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-2H7v-2h2V7h2v2h2v2h-2v2z" />
                    </svg>
                    Kesehatan
                </button>
                <button class="facility-filter-btn" data-filter="cat-resto">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 2v4H2V2h2zm12 0v4h-2V2h2zM4 8h12v8a2 2 0 01-2 2H6a2 2 0 01-2-2V8z" />
                    </svg>
                    Restoran
                </button>
                <button class="facility-filter-btn" data-filter="cat-police">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2l8 3v6a8 8 0 01-8 7 8 8 0 01-8-7V5l8-3zm0 2.1L4 6.2v4.8c0 3.2 2.4 6.2 6 7 3.6-.8 6-3.8 6-7V6.2l-6-2.1zM9 8h2v5H9V8z" />
                    </svg>
                    Polisi
                </button>
                <button class="facility-filter-btn" data-filter="cat-apotek">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M12.5 3.5a4 4 0 010 5.66L8.16 13.5a4 4 0 11-5.66-5.66l4.34-4.34a4 4 0 015.66 0zM7.5 5.5L3.16 9.84a2.5 2.5 0 103.54 3.54l4.34-4.34a2.5 2.5 0 00-3.54-3.54z" />
                    </svg>
                    Apotek
                </button>
            </div>

            <div class="facilities-scroll-list" id="facilities-list-wrap">
                <div class="facilities-empty" id="facilities-placeholder" style="text-align:center; padding:35px 10px; color:#94a3b8; font-size:12.5px; font-style:italic;">
                    Klik marker venue di peta untuk menampilkan daftar fasilitas terdekat secara otomatis.
                </div>

                <div class="facility-category" id="cat-hotel" style="display:none;">
                    <div id="hotel-container"></div>
                </div>

                <div class="facility-category" id="cat-rs" style="display:none;">
                    <div id="rs-container"></div>
                </div>

                <div class="facility-category" id="cat-resto" style="display:none;">
                    <div id="resto-container"></div>
                </div>

                <div class="facility-category" id="cat-police" style="display:none;">
                    <div id="police-container"></div>
                </div>

                <div class="facility-category" id="cat-apotek" style="display:none;">
                    <div id="apotek-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="venue-body" id="facilities-section" style="display:none;"></div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    const venueData = [{
            id: 1,
            name: "GOR Pajajaran Indoor A",
            lat: -6.583321,
            lng: 106.800532,
            address: "Gor Pajajaran, Jl. Pemuda No.02 kel, RT.04/RW.01, Tanah Sareal, Kota Bogor, Jawa Barat 16161",
            cabor: "Drumband, Pencak Silat, Taekwondo",
            gmaps_url: "https://maps.app.goo.gl/KcwQDC2JxcTsj1LJ8",
        },
        {
            id: 2,
            name: "GOR Pajajaran Indoor B",
            lat: -6.584100,
            lng: 106.801200,
            address: "Gor Pajajaran, Jl. Pemuda No.02 kel, RT.04/RW.01, Tanah Sareal, Kota Bogor, Jawa Barat 16161",
            cabor: "Judo, Kurash, Sambo",
            gmaps_url: "https://maps.app.goo.gl/h3ei411WRSdW5Uuf8",
        },
        {
            id: 3,
            name: "GOR Vokasi IPB",
            lat: -6.589165,
            lng: 106.806324,
            address: "Jl. Lodaya II, RT.03/RW.05, Cilibende, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128",
            cabor: "Shorinji Kempo, Tarung Derajat",
            gmaps_url: "https://maps.app.goo.gl/ekjekDk57iBAQcTVA",
        },
        {
            id: 4,
            name: "Majalengka",
            lat: -6.837000,
            lng: 108.216000,
            address: "Majalengka, Jawa Barat",
            cabor: "Aerosport - Gantolle",
            gmaps_url: "https://maps.google.com/?q=Majalengka"
        },
        {
            id: 5,
            name: "Gunung Mas",
            lat: -6.702000,
            lng: 106.993000,
            address: "Puncak, Bogor, Jawa Barat",
            cabor: "Aerosport - Paralayang",
            gmaps_url: "https://maps.google.com/?q=Gunung+Mas+Puncak"
        },
        {
            id: 6,
            name: "Green Forest Hotel",
            lat: -6.634000,
            lng: 106.809000,
            address: "Bogor, Jawa Barat",
            cabor: "Anggar, Angkat Besi, Angkat Berat, Arung Jeram, Binaraga, Petanque",
            gmaps_url: "https://maps.app.goo.gl/dgb7WBjKovkcfyLo9"
        },
        {
            id: 7,
            name: "PPSDMAP Kemenhub Kemang",
            lat: -6.488000,
            lng: 106.756000,
            address: "Kemang, Bogor, Jawa Barat",
            cabor: "Bola Tangan Indoor",
            gmaps_url: "https://maps.app.goo.gl/Ma2cC3WY3DaWJYQ19"
        },
        {
            id: 8,
            name: "Padepokan Voli Sentul",
            lat: -6.568000,
            lng: 106.857000,
            address: "Sentul, Bogor, Jawa Barat",
            cabor: "Bola Tangan Pasir",
            gmaps_url: "https://maps.app.goo.gl/cXPfu5acX62py9QY9"
        },
        {
            id: 9,
            name: "Brajamustika Hotel",
            lat: -6.581000,
            lng: 106.772000,
            address: "Jl. DR. Sumeru, RT.01/RW.10, Menteng, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16111",
            cabor: "Dansa",
            gmaps_url: "https://maps.app.goo.gl/AJwygeGxVYoxbEps5"
        },
        {
            id: 10,
            name: "Arcamanik",
            lat: -6.907000,
            lng: 107.674000,
            address: "Sport Jabar Arcamanik, Bandung, Jawa Barat",
            cabor: "Gimnastik Aerobik, Gimnastik Artistik, Gimnastik Ritmik",
            gmaps_url: "https://maps.google.com/?q=Sport+Jabar+Arcamanik"
        },
        {
            id: 11,
            name: "Cisangkan",
            lat: -6.877000,
            lng: 107.531000,
            address: "Lapang Tembak Cisangkan, Cimahi, Jawa Barat",
            cabor: "Menembak",
            gmaps_url: "https://maps.google.com/?q=Lapang+Tembak+Cisangkan"
        },
        {
            id: 12,
            name: "Stadion Pajajaran",
            lat: -6.584500,
            lng: 106.800000,
            address: "Jl. Pemuda, Kota Bogor",
            cabor: "Modern Pentathlon, Panahan, Panjat Tebing",
            gmaps_url: "https://maps.app.goo.gl/HgsrKKn8LD9V792UA"
        },
        {
            id: 13,
            name: "Kota Baru Parahyangan",
            lat: -6.852000,
            lng: 107.481000,
            address: "Padalarang, Kabupaten Bandung Barat, Jawa Barat",
            cabor: "Ski Air",
            gmaps_url: "https://maps.google.com/?q=Kota+Baru+Parahyangan"
        },
        {
            id: 14,
            name: "GOR Yasmin",
            lat: -6.561000,
            lng: 106.774000,
            address: "Bogor, Jawa Barat",
            cabor: "Tenis Meja",
            gmaps_url: "https://maps.app.goo.gl/Fqw4Yn97RyvkSeg27"
        }
    ];

    /* ── Data Fasilitas Hardcoded dari PDF ── */
    const pajajaranFacilities = {
        hotel: [
            { name: "Zest Hotel Bogor", address: "Jl. Pajajaran No. 27, Babakan, Kec. Bogor Tengah, Kota Bogor", distance: "1.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Zest+Hotel+Bogor+Jl.+Pajajaran+No.+27+Babakan+Bogor+Tengah" },
            { name: "The Mirah Hotel Bogor", address: "Jl. Pangrango No. 9A, Babakan, Kec. Bogor Tengah, Kota Bogor", distance: "1.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=The+Mirah+Hotel+Bogor+Jl.+Pangrango+No.+9A+Babakan+Bogor+Tengah" }
        ],
        hospital: [
            { name: "RS Salak Bogor", address: "Jl. Jend. Sudirman No. 8, Sempur, Kec. Bogor Tengah, Kota Bogor", distance: "1.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Salak+Bogor+Jl.+Jend.+Sudirman+No.+8+Sempur+Bogor+Tengah" },
            { name: "RS PMI Bogor", address: "Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur, Kota Bogor", distance: "2.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+PMI+Bogor+Jl.+Pajajaran+No.+80+Baranangsiang+Bogor+Timur" },
            { name: "Puskesmas Bogor Tengah", address: "Jl. Sawojajar No. 38, Pabaton, Kec. Bogor Tengah, Kota Bogor", distance: "1.8 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Bogor+Tengah+Jl.+Sawojajar+No.+38+Pabaton+Bogor+Tengah" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Juanda", address: "Jl. Ir. H. Juanda No. 30, Babakan, Kec. Bogor Tengah, Kota Bogor", distance: "2.0 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Juanda+Jl.+Ir.+H.+Juanda+No.+30+Babakan+Bogor+Tengah" }
        ],
        police: [
            { name: "Polresta Bogor Kota (Mako Muslihat)", address: "Jl. Kapten Muslihat No. 18, Paledang, Kec. Bogor Tengah, Kota Bogor", distance: "2.3 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polresta+Bogor+Kota+Mako+Muslihat+Jl.+Kapten+Muslihat+No.+18+Paledang+Bogor+Tengah" }
        ],
        restaurant: []
    };

    const greenForestFacilities = {
        hotel: [
            { name: "ASTON Bogor Hotel & Resort", address: "Mulyaharja, Kec. Bogor Selatan, Kota Bogor", distance: "1.8 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=ASTON+Bogor+Hotel+%26+Resort+Mulyaharja+Bogor+Selatan" },
            { name: "Padodi Hotel", address: "Jl. Soemanta Diredja No. 10, Pamoyanan, Kec. Bogor Selatan", distance: "1.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Padodi+Hotel+Jl.+Soemanta+Diredja+No.+10+Pamoyanan+Bogor+Selatan" }
        ],
        hospital: [
            { name: "RS Melania Bogor", address: "Jl. Pahlawan No. 91, Bondongan, Kec. Bogor Selatan", distance: "2.8 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Melania+Bogor+Jl.+Pahlawan+No.+91+Bondongan+Bogor+Selatan" },
            { name: "Puskesmas Cipaku", address: "Jl. Rangga Gading, Cipaku, Kec. Bogor Selatan", distance: "2.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Cipaku+Jl.+Rangga+Gading+Cipaku+Bogor+Selatan" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Pahlawan", address: "Jl. Pahlawan No. 40, Batutulis, Kec. Bogor Selatan", distance: "2.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Pahlawan+Jl.+Pahlawan+No.+40+Batutulis+Bogor+Selatan" }
        ],
        police: [
            { name: "Polsek Bogor Selatan", address: "Jl. Layung Sari No. 1, Empang, Kec. Bogor Selatan", distance: "2.6 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Bogor+Selatan+Jl.+Layung+Sari+No.+1+Empang+Bogor+Selatan" }
        ],
        restaurant: []
    };

    const brajamustikaFacilities = {
        hotel: [
            { name: "Hotel Salak The Heritage", address: "Jl. Ir. H. Juanda No. 8, Pabaton, Kec. Bogor Tengah", distance: "1.6 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Hotel+Salak+The+Heritage+Jl.+Ir.+H.+Juanda+No.+8+Pabaton+Bogor+Tengah" },
            { name: "Hotel Grand Savero Bogor", address: "Jl. Pajajaran No. 27, Babakan, Kec. Bogor Tengah", distance: "2.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Hotel+Grand+Savero+Bogor+Jl.+Pajajaran+No.+27+Babakan+Bogor+Tengah" }
        ],
        hospital: [
            { name: "RS Karya Bhakti Pratiwi", address: "Jl. DR. Sumeru No. 120, Menteng, Kec. Bogor Barat", distance: "1.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Karya+Bhakti+Pratiwi+Jl.+DR.+Sumeru+No.+120+Menteng+Bogor+Barat" },
            { name: "RSUD Kota Bogor", address: "Jl. DR. Sumeru No. 120, Menteng, Kec. Bogor Barat", distance: "1.3 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RSUD+Kota+Bogor+Jl.+DR.+Sumeru+No.+120+Menteng+Bogor+Barat" },
            { name: "Puskesmas Gang Aut / Menteng", address: "Jl. Mawar No. 8, Menteng, Kec. Bogor Barat", distance: "1.0 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Gang+Aut+Menteng+Jl.+Mawar+No.+8+Menteng+Bogor+Barat" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Sumeru", address: "Jl. DR. Sumeru No. 50, Menteng, Kec. Bogor Barat", distance: "900 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Sumeru+Jl.+DR.+Sumeru+No.+50+Menteng+Bogor+Barat" }
        ],
        police: [
            { name: "Polsek Bogor Barat", address: "Jl. Semplak Raya No. 1, Kec. Bogor Barat", distance: "2.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Bogor+Barat+Jl.+Semplak+Raya+No.+1+Bogor+Barat" }
        ],
        restaurant: []
    };

    const vokasiFacilities = {
        hotel: [
            { name: "IPB Hotel & Convention Centre", address: "Botani Square, Jl. Pajajaran, Baranangsiang", distance: "2.8 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=IPB+Hotel+%26+Convention+Centre+Botani+Square+Jl.+Pajajaran+Baranangsiang" }
        ],
        hospital: [
            { name: "RS PMI Bogor", address: "Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur", distance: "2.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+PMI+Bogor+Jl.+Pajajaran+No.+80+Baranangsiang+Bogor+Timur" },
            { name: "Puskesmas Bogor Utara", address: "Jl. Tegal Gundil, Kec. Bogor Utara", distance: "1.9 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Bogor+Utara+Jl.+Tegal+Gundil+Bogor+Utara" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Pajajaran", address: "Jl. Pajajaran No. 35, Babakan, Kec. Bogor Tengah", distance: "1.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Pajajaran+Jl.+Pajajaran+No.+35+Babakan+Bogor+Tengah" }
        ],
        police: [
            { name: "Polsek Bogor Utara", address: "Jl. Pajajaran No. 200, Cibuluh, Kec. Bogor Utara", distance: "2.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Bogor+Utara+Jl.+Pajajaran+No.+200+Cibuluh+Bogor+Utara" }
        ],
        restaurant: []
    };

    const yasminFacilities = {
        hotel: [
            { name: "WHIZ Prime Hotel Bogor Yasmin", address: "Jl. KH. R. Abdullah Bin Nuh No. 33, Curugmekar", distance: "600 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=WHIZ+Prime+Hotel+Bogor+Yasmin+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+33+Curugmekar" },
            { name: "Swiss-Belcourt Bogor", address: "Jl. KH. R. Abdullah Bin Nuh No. 27, Bukit Cimanggu City", distance: "1.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Swiss-Belcourt+Bogor+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+27+Bukit+Cimanggu+City" }
        ],
        hospital: [
            { name: "RS Hermina Bogor", address: "Jl. KH. R. Abdullah Bin Nuh No. E2, Hermina Grand Yasmin", distance: "900 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Hermina+Bogor+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+E2+Hermina+Grand+Yasmin" },
            { name: "RS Islam Bogor", address: "Jl. Perdana No. 22, Budi Agung, Tanahsareal", distance: "2.0 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Islam+Bogor+Jl.+Perdana+No.+22+Budi+Agung+Tanahsareal" },
            { name: "Puskesmas Gang Kelor", address: "Jl. Raya Curug No. 12, Curugmekar, Kec. Bogor Barat", distance: "1.4 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Gang+Kelor+Jl.+Raya+Curug+No.+12+Curugmekar+Bogor+Barat" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Yasmin", address: "Ruko Taman Yasmin Sektor VI No. 108, Curugmekar", distance: "500 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Yasmin+Ruko+Taman+Yasmin+Sektor+VI+No.+108+Curugmekar" }
        ],
        police: [
            { name: "Polsek Tanah Sareal", address: "Jl. Seremped, Kedung Badak, Kec. Tanah Sareal", distance: "2.4 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Tanah+Sareal+Jl.+Seremped+Kedung+Badak+Tanah+Sareal" }
        ],
        restaurant: []
    };

    const kemangFacilities = {
        hotel: [
            { name: "Salak Sunset Hotel", address: "Jl. Raya Kemang Parung No. 12, Kemang", distance: "2.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Salak+Sunset+Hotel+Jl.+Raya+Kemang+Parung+No.+12+Kemang" }
        ],
        hospital: [
            { name: "RS Sentosa Bogor", address: "Jl. Raya Kemang No. 18, Kemang, Kab. Bogor", distance: "1.3 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Sentosa+Bogor+Jl.+Raya+Kemang+No.+18+Kemang+Kab.+Bogor" },
            { name: "Puskesmas Kemang", address: "Jl. Raya Kemang No. 5, Kemang, Kab. Bogor", distance: "1.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Kemang+Jl.+Raya+Kemang+No.+5+Kemang+Kab.+Bogor" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Kemang", address: "Jl. Raya Parung-Bogor, Kemang, Kab. Bogor", distance: "800 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Kemang+Jl.+Raya+Parung-Bogor+Kemang+Kab.+Bogor" }
        ],
        police: [
            { name: "Polsek Kemang", address: "Jl. Raya Kemang Parung No. 10, Kemang, Kab. Bogor", distance: "1.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Kemang+Jl.+Raya+Kemang+Parung+No.+10+Kemang+Kab.+Bogor" }
        ],
        restaurant: []
    };

    const sentulFacilities = {
        hotel: [
            { name: "Lorin Sentul Hotel", address: "Kawasan Sirkuit Sentul Internasional, Babakan Madang", distance: "1.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Lorin+Sentul+Hotel+Kawasan+Sirkuit+Sentul+Internasional+Babakan+Madang" },
            { name: "Harris Hotel Sentul City", address: "Jl. Jend. Sudirman, Sentul City, Babakan Madang", distance: "2.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Harris+Hotel+Sentul+City+Jl.+Jend.+Sudirman+Sentul+City+Babakan+Madang" }
        ],
        hospital: [
            { name: "RS EMC Sentul", address: "Jl. MH. Thamrin No. 57, Sentul City, Babakan Madang", distance: "2.7 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+EMC+Sentul+Jl.+MH.+Thamrin+No.+57+Sentul+City+Babakan+Madang" },
            { name: "Puskesmas Babakan Madang", address: "Jl. Raya Sentul No. 1, Babakan Madang", distance: "2.0 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Babakan+Madang+Jl.+Raya+Sentul+No.+1+Babakan+Madang" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Sentul City", address: "Ruko Plaza Niaga 1, Sentul City", distance: "2.3 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Sentul+City+Ruko+Plaza+Niaga+1+Sentul+City" }
        ],
        police: [
            { name: "Polsek Babakan Madang", address: "Jl. Raya Babakan Madang No. 8, Kab. Bogor", distance: "2.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Babakan+Madang+Jl.+Raya+Babakan+Madang+No.+8+Kab.+Bogor" }
        ],
        restaurant: []
    };

    const gunungMasFacilities = {
        hotel: [
            { name: "Bobocabin Gunung Mas", address: "Gunung Mas, Jl. Raya Puncak Gadog No. KM 87, Cisarua", distance: "300 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Bobocabin+Gunung+Mas+Jl.+Raya+Puncak+Gadog+KM+87+Cisarua" },
            { name: "Grand Diara Hotel Puncak", address: "Jl. Raya Puncak - Gadog KM 77, Cisarua", distance: "2.9 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Grand+Diara+Hotel+Puncak+Jl.+Raya+Puncak+Gadog+KM+77+Cisarua" }
        ],
        hospital: [
            { name: "RSPG Cisarua (RS Paru Dr. M. Goenawan)", address: "Jl. Raya Puncak No. KM 83, Cisarua, Kab. Bogor", distance: "1.8 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RSPG+Cisarua+RS+Paru+Dr.+M.+Goenawan+Jl.+Raya+Puncak+KM+83+Cisarua+Kab.+Bogor" },
            { name: "Puskesmas Cisarua", address: "Jl. Raya Puncak No. KM 81, Cisarua, Kab. Bogor", distance: "2.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Cisarua+Jl.+Raya+Puncak+KM+81+Cisarua+Kab.+Bogor" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Cisarua", address: "Jl. Raya Puncak No. 412, Cisarua, Kab. Bogor", distance: "1.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Cisarua+Jl.+Raya+Puncak+No.+412+Cisarua+Kab.+Bogor" }
        ],
        police: [
            { name: "Polsek Cisarua", address: "Jl. Raya Puncak KM 82, Cisarua, Kab. Bogor", distance: "2.3 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Cisarua+Jl.+Raya+Puncak+KM+82+Cisarua+Kab.+Bogor" }
        ],
        restaurant: []
    };

    const cisangkanFacilities = {
        hotel: [
            { name: "Hotel Trikarya Cimahi", address: "Jl. Raya Cisangkan No. 88, Padasuka, Cimahi Tengah", distance: "800 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Hotel+Trikarya+Cimahi+Jl.+Raya+Cisangkan+No.+88+Padasuka+Cimahi+Tengah" }
        ],
        hospital: [
            { name: "RS Dustira Cimahi", address: "Jl. Dr. Dustira No. 1, Baros, Cimahi Tengah", distance: "2.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Dustira+Cimahi+Jl.+Dr.+Dustira+No.+1+Baros+Cimahi+Tengah" },
            { name: "Puskesmas Cimahi Tengah", address: "Jl. Raden Demang Hardjakusumah No. 1, Cimahi", distance: "1.6 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Cimahi+Tengah+Jl.+Raden+Demang+Hardjakusumah+No.+1+Cimahi" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Cisangkan", address: "Jl. Raya Cisangkan No. 12, Padasuka, Cimahi Tengah", distance: "400 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Cisangkan+Jl.+Raya+Cisangkan+No.+12+Padasuka+Cimahi+Tengah" }
        ],
        police: [
            { name: "Polres Cimahi", address: "Jl. Raya Cibeureum No. 1, Cimahi Selatan", distance: "2.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polres+Cimahi+Jl.+Raya+Cibeureum+No.+1+Cimahi+Selatan" }
        ],
        restaurant: []
    };

    const arcamanikFacilities = {
        hotel: [
            { name: "Grand Cordela Hotel Bandung", address: "Jl. Soekarno-Hatta No. 791, Cisaranten Endah, Arcamanik", distance: "2.4 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Grand+Cordela+Hotel+Bandung+Jl.+Soekarno-Hatta+No.+791+Cisaranten+Endah+Arcamanik" }
        ],
        hospital: [
            { name: "RS Hermina Arcamanik", address: "Jl. A.H. Nasution No. 50, Antapani, Bandung", distance: "1.7 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Hermina+Arcamanik+Jl.+A.H.+Nasution+No.+50+Antapani+Bandung" },
            { name: "Puskesmas Arcamanik", address: "Jl. Cisaranten Kulon No. 4, Arcamanik, Bandung", distance: "1.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Arcamanik+Jl.+Cisaranten+Kulon+No.+4+Arcamanik+Bandung" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Arcamanik", address: "Jl. Arcamanik Endah No. 42, Sukamiskin, Arcamanik", distance: "600 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Arcamanik+Jl.+Arcamanik+Endah+No.+42+Sukamiskin+Arcamanik" }
        ],
        police: [
            { name: "Polsek Arcamanik", address: "Jl. Pacuan Kuda No. 54, Sukamiskin, Arcamanik", distance: "800 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Arcamanik+Jl.+Pacuan+Kuda+No.+54+Sukamiskin+Arcamanik" }
        ],
        restaurant: []
    };

    const kotaBaruFacilities = {
        hotel: [
            { name: "Mason Pine Hotel", address: "Jl. Raya Kotabaru Parahyangan, Cipeundeuy, Padalarang", distance: "500 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Mason+Pine+Hotel+Jl.+Raya+Kotabaru+Parahyangan+Cipeundeuy+Padalarang" }
        ],
        hospital: [
            { name: "RS Cahya Kawaluyan", address: "Jl. Raya Parahyangan KM 1.5, Padalarang, Bandung Barat", distance: "1.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Cahya+Kawaluyan+Jl.+Raya+Parahyangan+KM+1.5+Padalarang+Bandung+Barat" },
            { name: "Puskesmas Padalarang", address: "Jl. Raya Padalarang No. 470, Bandung Barat", distance: "2.8 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Padalarang+Jl.+Raya+Padalarang+No.+470+Bandung+Barat" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma KBP", address: "Ruko Bumi Simpang, Kota Baru Parahyangan", distance: "800 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+KBP+Ruko+Bumi+Simpang+Kota+Baru+Parahyangan" }
        ],
        police: [
            { name: "Polsek Padalarang", address: "Jl. Raya Padalarang No. 501, Bandung Barat", distance: "2.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Padalarang+Jl.+Raya+Padalarang+No.+501+Bandung+Barat" }
        ],
        restaurant: []
    };

    const majalengkaFacilities = {
        hotel: [
            { name: "Fitra Hotel Majalengka", address: "Jl. KH. Abdul Halim No. 88, Majalengka Kulon", distance: "1.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Fitra+Hotel+Majalengka+Jl.+KH.+Abdul+Halim+No.+88+Majalengka+Kulon" }
        ],
        hospital: [
            { name: "RSUD Majalengka", address: "Jl. Kesehatan No. 77, Majalengka Wetan", distance: "1.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RSUD+Majalengka+Jl.+Kesehatan+No.+77+Majalengka+Wetan" },
            { name: "Puskesmas Majalengka", address: "Jl. KH. Abdul Halim No. 200, Majalengka", distance: "1.3 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Majalengka+Jl.+KH.+Abdul+Halim+No.+200+Majalengka" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Majalengka", address: "Jl. KH. Abdul Halim No. 120, Majalengka", distance: "900 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Majalengka+Jl.+KH.+Abdul+Halim+No.+120+Majalengka" }
        ],
        police: [
            { name: "Polres Majalengka", address: "Jl. KH. Abdul Halim No. 512, Majalengka", distance: "2.0 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polres+Majalengka+Jl.+KH.+Abdul+Halim+No.+512+Majalengka" }
        ],
        restaurant: []
    };

    const facilitiesData = {
        "GOR Pajajaran Indoor A": pajajaranFacilities,
        "GOR Pajajaran Indoor B": pajajaranFacilities,
        "Stadion Pajajaran": pajajaranFacilities,
        "Green Forest Hotel": greenForestFacilities,
        "Brajamustika Hotel": brajamustikaFacilities,
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
        "Aerosport - Gantolle": "3.AEROSPORT.png",
        "Aerosport - Paralayang": "3.AEROSPORT.png",
    };

    let map;
    let markers = [];
    let currentVenue = null;

    function renderFacilityCategory(venue, type, containerId, title, categoryId) {
        const container = document.getElementById(containerId);
        const categoryBlock = document.getElementById(categoryId);
        if (!container || !categoryBlock) return;

        categoryBlock.style.display = 'block';

        const typeMap = { lodging: 'hotel', hospital: 'hospital', restaurant: 'restaurant', police: 'police', pharmacy: 'pharmacy' };
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
            if (type === 'lodging') { iconBg = '#fef3c7'; iconColor = '#d97706'; }
            else if (type === 'hospital') { iconBg = '#fee2e2'; iconColor = '#dc2626'; }
            else if (type === 'restaurant') { iconBg = '#dcfce7'; iconColor = '#16a34a'; }
            else if (type === 'police') { iconBg = '#e0e7ff'; iconColor = '#4f46e5'; }
            else if (type === 'pharmacy') { iconBg = '#f3e8ff'; iconColor = '#9333ea'; }
            else { iconBg = '#dbeafe'; iconColor = '#2563eb'; }

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

        map = L.map('map-canvas').setView(bogorCenter, 14);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        renderVenues(venueData);
        setupFilter();
        setupFacilityFilters();
    }

    function createSportIcon(sportName) {
        const iconFile = caborIcons[sportName] || '';
        const imgHtml = iconFile
            ? `<img src="/images/cabor/${iconFile}" class="sport-marker-inner" alt="">`
            : `<svg width="18" height="18" fill="#013469" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8"/></svg>`;
        return L.divIcon({
            html: `<div class="sport-marker">${imgHtml}</div>`,
            className: '',
            iconSize: [44, 44],
            iconAnchor: [22, 22],
            popupAnchor: [0, -22]
        });
    }

    function renderVenues(venuesData, sportIconName) {
        venuesData.forEach(venue => {
            let icon;
            if (sportIconName) {
                icon = createSportIcon(sportIconName);
            } else {
                icon = new L.Icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                });
            }
            const marker = L.marker([venue.lat, venue.lng], {
                icon: icon
            }).addTo(map);
            marker.bindTooltip(venue.name);
            marker.on("click", () => {
                showVenueDetails(venue);
                const vs = document.getElementById('venue');
                const v = venue.name.toLowerCase();
                if (Array.from(vs.options).some(o => o.value === v)) vs.value = v;
            });
            markers.push(marker);
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

            const caborVal = document.getElementById('cabor').value.toLowerCase();
            const venueVal = document.getElementById('venue').value.toLowerCase();

            clearMarkers();
            document.getElementById('floating-gor-card').style.display = 'none';

            const bounds = L.latLngBounds();
            const filteredVenues = venueData.filter(v => {
                let matchCabor = caborVal ? v.cabor.toLowerCase().includes(caborVal) : true;
                let matchVenue = venueVal ? v.name.toLowerCase().includes(venueVal) : true;
                return matchCabor && matchVenue;
            });

            let sportIconName = null;
            if (caborVal) {
                const matched = Object.keys(caborIcons).find(k => k.toLowerCase().includes(caborVal));
                if (matched) sportIconName = matched;
            }

            if (filteredVenues.length > 0) {
                renderVenues(filteredVenues, sportIconName);
                filteredVenues.forEach(v => bounds.extend([v.lat, v.lng]));
                map.fitBounds(bounds, {
                    padding: [40, 40]
                });
                showVenueDetails(filteredVenues[0]);
            } else {
                alert('Venue tidak ditemukan dengan kriteria tersebut.');
                renderVenues(venueData);
                map.setView([-6.587, 106.803], 14);
            }
        });

        filterForm.addEventListener('reset', function() {
            setTimeout(() => {
                clearMarkers();
                renderVenues(venueData);
                map.setView([-6.587, 106.803], 14);
                document.getElementById('floating-gor-card').style.display = 'none';
                const placeholder = document.getElementById('facilities-placeholder');
                if (placeholder) placeholder.style.display = 'block';
                document.querySelectorAll('.facility-category').forEach(cat => cat.style.display = 'none');
            }, 100);
        });
    }

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

    window.onload = function() {
        initMap();
    };
</script>
@endpush
