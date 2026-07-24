@extends('layouts.app')

@section('title', 'Peta Venue - PORPROV XV KOTA BOGOR 2026')

@push('styles')
<style>
    /* ───────── Filter ───────── */
    .filter-section {
        max-width: 1200px;
        margin: 20px auto;
        padding: 0 20px;
    }

    .filter-box {
        background: #fff;
        border-radius: 12px;
        padding: 18px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .12);
    }

    .filter-form {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr auto auto;
        gap: 15px;
        align-items: center;
    }

    .filter-input,
    .filter-select {
        width: 100%;
        height: 48px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 0 15px;
        font-size: 14px;
        font-family: 'Poppins', sans-serif;
        outline: none;
        transition: .2s;
    }

    .filter-input:focus,
    .filter-select:focus {
        border-color: #013469;
    }

    .btn-yellow {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: #FDB813;
        color: #013469;
        font-weight: 700;
        font-size: 14px;
        height: 48px;
        padding: 0 24px;
        border-radius: 8px;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
        border: none;
        cursor: pointer;
        transition: .2s;
    }

    .btn-yellow:hover {
        background: #e5a40b;
    }

    .reset-btn {
        height: 48px;
        padding: 0 20px;
        border: none;
        background: #ef4444;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        transition: .2s;
    }

    .reset-btn:hover {
        background: #dc2626;
    }

    /* ── Map + Facilities Side-by-Side ── */
    .map-facilities-wrapper {
        max-width: 1200px;
        margin: 0 auto 40px;
        padding: 0 20px;
        display: flex;
        gap: 20px;
        align-items: flex-start;
    }

    .map-side {
        flex: 0 0 58%;
        position: relative;
    }

    .map-side #map-canvas {
        width: 100% !important;
        height: 500px !important;
        display: block !important;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        background: #e5e7eb;
    }

    /* Floating GOR Card */
    .gor-card {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 280px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        z-index: 99;
        overflow: hidden;
        display: none;
    }

    .facilities-side {
        flex: 1;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        border: 1px solid #f0f1f3;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        max-height: 540px;
    }

    .facilities-side-header {
        padding: 20px 20px 0;
        flex-shrink: 0;
    }

    .facilities-side-header h2 {
        font-size: 1.1rem;
        font-weight: 800;
        color: #111827;
        margin: 0 0 4px;
    }

    .facilities-side-header p {
        font-size: 12px;
        color: #6b7280;
        margin: 0;
    }

    .facility-filter-buttons {
        display: flex;
        gap: 6px;
        padding: 14px 20px;
        flex-wrap: wrap;
        border-bottom: 1px solid #f3f4f6;
        flex-shrink: 0;
    }

    .facility-filter-btn {
        padding: 5px 12px;
        border-radius: 20px;
        border: 1.5px solid #e5e7eb;
        background: #fff;
        color: #6b7280;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        font-family: 'Poppins', sans-serif;
        white-space: nowrap;
    }

    .facility-filter-btn:hover {
        border-color: #2563eb;
        color: #2563eb;
    }

    .facility-filter-btn.active {
        background: #2563eb;
        border-color: #2563eb;
        color: #fff;
    }

    .facilities-list-wrap {
        flex: 1;
        overflow-y: auto;
        padding: 12px 20px 20px;
    }

    .facilities-list-wrap::-webkit-scrollbar {
        width: 5px;
    }

    .facilities-list-wrap::-webkit-scrollbar-track {
        background: transparent;
    }

    .facilities-list-wrap::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 10px;
    }

    .facility-category {
        margin-bottom: 16px;
    }

    .facility-category:last-child {
        margin-bottom: 0;
    }

    .facility-cat-header {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
        padding-bottom: 8px;
        border-bottom: 1px solid #f3f4f6;
    }

    .facility-cat-icon {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .facility-cat-header h3 {
        font-size: 13px;
        font-weight: 700;
        color: #374151;
        margin: 0;
    }

    .facility-list-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        border-radius: 10px;
        transition: background 0.15s;
        margin-bottom: 4px;
    }

    .facility-list-item:hover {
        background: #f9fafb;
    }

    .facility-list-item:last-child {
        margin-bottom: 0;
    }

    .fli-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
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
        font-weight: 600;
        color: #1f2937;
        margin: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .fli-addr {
        font-size: 11px;
        color: #9ca3af;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin: 1px 0 0;
    }

    .fli-route {
        flex-shrink: 0;
        padding: 5px 10px;
        background: #f3f4f6;
        color: #374151;
        font-size: 11px;
        font-weight: 600;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.2s;
    }

    .fli-route:hover {
        background: #2563eb;
        color: #fff;
    }

    .facilities-empty {
        text-align: center;
        padding: 40px 20px;
        color: #9ca3af;
        font-size: 13px;
        font-style: italic;
    }

    .gor-card-header {
        background: #f8fafc;
        color: #374151;
        padding: 14px 16px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 15px;
        font-weight: 800;
        border-bottom: 1px solid #e5e7eb;
    }

    .gor-card-body {
        padding: 16px;
    }

    .gor-card-body .addr {
        font-size: 13px;
        color: #6b7280;
        display: flex;
        align-items: flex-start;
        gap: 8px;
        margin-bottom: 16px;
        line-height: 1.5;
    }

    .gor-card-body .cabang-title {
        font-size: 12px;
        font-weight: 800;
        color: #013469;
        margin-bottom: 12px;
        text-transform: uppercase;
    }

    .cabor-grid {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .cabor-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        width: 52px;
    }

    .cabor-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #f4f5f7;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4b5563;
    }

    .cabor-item span {
        font-size: 11px;
        color: #4b5563;
        text-align: center;
        line-height: 1.2;
    }

    .gor-card .map-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        background: #163f7a;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        padding: 10px;
        text-decoration: none;
        border-radius: 6px;
        transition: background 0.2s;
    }

    .gor-card .map-btn:hover {
        background: #012050;
    }

    /* ── Facilities (legacy, hidden by new layout) ── */
    .venue-body {
        display: none;
    }

    @media (max-width: 768px) {
        .venue-banner {
            height: auto;
            min-height: 80px;
            padding: 16px;
        }

        .filter-section {
            margin: 20px 16px;
            padding: 0;
        }

        .filter-form {
            grid-template-columns: 1fr;
        }

        .map-facilities-wrapper {
            flex-direction: column;
            padding: 0 16px;
        }

        .map-side {
            flex: none;
            width: 100%;
        }

        .map-side #map-canvas {
            border-radius: 0;
            height: 350px !important;
        }

        .gor-card {
            position: relative;
            top: 0;
            right: 0;
            width: 100%;
            box-shadow: none;
            border-radius: 0;
            margin-top: 10px;
        }

        .facilities-side {
            max-height: 400px;
            border-radius: 12px;
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

<!-- Filter -->
<section class="filter-section">
    <div class="filter-box">
        <form class="filter-form" id="map-filter-form">
            <!-- Fasilitas -->
            <select class="filter-select" id="fasilitas">
                <option value="">🔍 Cari Fasilitas</option>
                <option value="hotel">🏨 Hotel</option>
                <option value="rumah-sakit">🏥 Rumah Sakit</option>
                <option value="apotek">💊 Apotek</option>
                <option value="rumah-makan">🍽️ Rumah Makan</option>
            </select>

            <!-- Cabang Olahraga -->
            <select class="filter-select" id="cabor">
                <option value="">🏃 Cabang Olahraga</option>
                <option value="drumband">Drumband</option>
                <option value="pencak silat">Pencak Silat</option>
                <option value="taekwondo">Taekwondo</option>
                <option value="judo">Judo</option>
                <option value="kurash">Kurash</option>
                <option value="sambo">Sambo</option>
                <option value="tenis meja">Tenis Meja</option>
            </select>

            <!-- Venue -->
            <select class="filter-select" id="venue">
                <option value="">📍 Venue</option>
                <option value="gor pajajaran indoor a">GOR Pajajaran Indoor A</option>
                <option value="gor pajajaran indoor b">GOR Pajajaran Indoor B</option>
                <option value="gor yasmin">GOR Yasmin</option>
                <option value="stadion pajajaran">Stadion Pajajaran</option>
                <option value="gor vokasi ipb">GOR Vokasi IPB</option>
            </select>

            <button type="submit" class="btn-yellow">Cari</button>
            <button type="reset" class="reset-btn">Reset</button>
        </form>
    </div>
</section>

<div class="map-facilities-wrapper">
    <!-- MAP SIDE -->
    <div class="map-side">
        <div id="map-canvas"></div>

        <div class="gor-card" id="floating-gor-card">
            <div class="gor-card-header">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" style="color: #374151;">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z" />
                </svg>
                <span id="card-gor-name">-</span>
            </div>
            <div class="gor-card-body">
                <div class="addr">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" style="color: #6b7280; flex-shrink: 0; margin-top: -2px;">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z" />
                    </svg>
                    <span id="card-gor-addr">-</span>
                </div>
                <div class="cabang-title">CABANG OLAHRAGA</div>
                <div class="cabor-grid" id="card-gor-cabor-grid"></div>

                <a href="#" id="card-gor-gmaps" target="_blank" class="map-btn">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 19H5V5h7V3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z" />
                    </svg>
                    Buka di Google Maps
                </a>
            </div>
        </div>
    </div>

    <!-- FACILITIES SIDE -->
    <div class="facilities-side">
        <div class="facilities-side-header">
            <h2>Fasilitas Terdekat</h2>
            <p>Temukan fasilitas di sekitar lokasi yang dipilih</p>
        </div>

        <div class="facility-filter-buttons">
            <button class="facility-filter-btn active" data-filter="all">Semua</button>
            <button class="facility-filter-btn" data-filter="cat-hotel">🏨 Hotel</button>
            <button class="facility-filter-btn" data-filter="cat-rs">🏥 Kesehatan</button>
            <button class="facility-filter-btn" data-filter="cat-resto">🍽️ Restoran</button>
            <button class="facility-filter-btn" data-filter="cat-police">🚔 Polisi</button>
            <button class="facility-filter-btn" data-filter="cat-apotek">💊 Apotek</button>
        </div>

        <div class="facilities-list-wrap" id="facilities-list-wrap">
            <div class="facilities-empty" id="facilities-placeholder">
                Klik marker venue di peta untuk menampilkan fasilitas terdekat
            </div>

            <!-- Hotel -->
            <div class="facility-category" id="cat-hotel" style="display:none;">
                <div class="facility-cat-header">
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
                    <div class="facility-cat-icon" style="background:#f3e8ff; color:#9333ea;">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z" />
                        </svg>
                    </div>
                    <h3>Apotek</h3>
                </div>
                <div id="apotek-container"></div>
            </div>
        </div>
    </div>
</div>

<!-- Legacy hidden facilities (kept for JS compatibility) -->
<div class="venue-body" id="facilities-section" style="display:none;"></div>
@endsection

@push('scripts')
<!-- PENTING: Tambahkan Leaflet JS dan CSS sebagai pengganti Google Maps -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    // 1. DATABASE DATA STRUKTUR (Dari welcome.blade.php agar seragam)
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
            cabor: "Gimnastik Aerobik, Gimnastic Artistik, Gimnastic Ritmik",
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
            cabor: "Modern Pentathion, Panahan, Panjat Tebing",
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

    let map;
    let markers = []; // Marker untuk Venue (Merah)
    let currentVenue = null;

    function renderFacilityCategory(venue, type, containerId, title, categoryId) {
        const container = document.getElementById(containerId);
        const categoryBlock = document.getElementById(categoryId);
        if (!container || !categoryBlock) return;

        categoryBlock.style.display = 'block';

        const typeMap = { lodging: 'hotel', hospital: 'hospital', restaurant: 'restaurant', police: 'police', pharmacy: 'pharmacy' };
        const venueFacilities = facilitiesData[venue.name];

        if (!venueFacilities) {
            container.innerHTML = `<p style="color:#9ca3af; font-style:italic; padding: 12px 0;">Tidak ada data ${title} untuk venue ini.</p>`;
            return;
        }

        const items = venueFacilities[typeMap[type]];
        if (!items || items.length === 0) {
            container.innerHTML = `<p style="color:#9ca3af; font-style:italic; padding: 12px 0;">Tidak ada ${title} terdekat ditemukan.</p>`;
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

    // Fungsi Render Marker Venue
    function renderVenues(venuesData) {
        const redIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        venuesData.forEach(venue => {
            const marker = L.marker([venue.lat, venue.lng], {
                icon: redIcon
            }).addTo(map);
            marker.bindTooltip(venue.name);

            marker.on("click", () => {
                showVenueDetails(venue);
            });

            markers.push(marker);
        });
    }

    // Fungsi Hapus Semua Marker di Peta
    function clearMarkers() {
        markers.forEach(m => map.removeLayer(m));
        markers = [];
    }

    // Fungsi Menangani Filter Maps
    function setupFilter() {
        const filterForm = document.getElementById('map-filter-form');

        // Saat form di-submit
        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const fasilitasVal = document.getElementById('fasilitas').value;
            const caborVal = document.getElementById('cabor').value.toLowerCase();
            const venueVal = document.getElementById('venue').value.toLowerCase();

            clearMarkers(); // Bersihkan peta
            document.getElementById('floating-gor-card').style.display = 'none';

            let isVenueFound = false;
            const bounds = L.latLngBounds();

            // 1. Proses Filter Cabor & Venue
            const filteredVenues = venueData.filter(v => {
                let matchCabor = true;
                let matchVenue = true;

                if (caborVal) matchCabor = v.cabor.toLowerCase().includes(caborVal);
                if (venueVal) matchVenue = v.name.toLowerCase().includes(venueVal);

                return matchCabor && matchVenue;
            });

            if (filteredVenues.length > 0) {
                renderVenues(filteredVenues);
                filteredVenues.forEach(v => bounds.extend([v.lat, v.lng]));
                isVenueFound = true;
            }

            // 2. Proses Cari Fasilitas dari data hardcoded PDF
            if (fasilitasVal) {
                if (isVenueFound) {
                    const v = filteredVenues[0];
                    currentVenue = v;
                    showVenueDetails(v);

                    const filterToCategory = {
                        'hotel':       'cat-hotel',
                        'rumah-sakit': 'cat-rs',
                        'apotek':      'cat-apotek',
                        'rumah-makan': 'cat-resto',
                    };
                    const targetCat = filterToCategory[fasilitasVal];

                    const placeholder = document.getElementById('facilities-placeholder');
                    if (placeholder) placeholder.style.display = 'none';

                    document.querySelectorAll('.facility-category').forEach(cat => {
                        cat.style.display = cat.id === targetCat ? 'block' : 'none';
                    });

                    document.querySelectorAll('.facility-filter-btn').forEach(btn => {
                        btn.classList.remove('active');
                        if (btn.dataset.filter === targetCat) btn.classList.add('active');
                    });
                } else {
                    alert('Venue tidak ditemukan dengan kriteria tersebut.');
                }
            } else {
                if (isVenueFound) {
                    if (filteredVenues.length === 1) {
                        map.setView([filteredVenues[0].lat, filteredVenues[0].lng], 15);
                    } else {
                        map.fitBounds(bounds, {
                            padding: [50, 50]
                        });
                    }

                    // Auto-fetch facilities untuk venue pertama yang ditemukan
                    const v = filteredVenues[0];
                    currentVenue = v;
                    showVenueDetails(v);
                } else {
                    alert('Venue tidak ditemukan dengan kriteria tersebut.');
                    map.setView([-6.587, 106.803], 14);
                }
            }
        });

        // Saat form di-reset
        filterForm.addEventListener('reset', function() {
            setTimeout(() => {
                clearMarkers();
                renderVenues(venueData);
                map.setView([-6.587, 106.803], 14);
                document.getElementById('floating-gor-card').style.display = 'none';
                // Show placeholder, hide all categories
                const placeholder = document.getElementById('facilities-placeholder');
                if (placeholder) placeholder.style.display = 'block';
                document.querySelectorAll('.facility-category').forEach(cat => {
                    cat.style.display = 'none';
                });
                // Reset filter buttons
                document.querySelectorAll('.facility-filter-btn').forEach(btn => {
                    btn.classList.remove('active');
                    if (btn.dataset.filter === 'all') btn.classList.add('active');
                });
            }, 100);
        });
    }

    function showVenueDetails(venue) {
        currentVenue = venue;
        const floatingCard = document.getElementById('floating-gor-card');
        floatingCard.style.display = 'block';
        floatingCard.style.zIndex = '1000'; 

        document.getElementById('card-gor-name').innerText = venue.name;
        document.getElementById('card-gor-addr').innerText = venue.address;
        document.getElementById('card-gor-gmaps').href = venue.gmaps_url;

        // Hide placeholder
        const placeholder = document.getElementById('facilities-placeholder');
        if (placeholder) placeholder.style.display = 'none';

        // Sync dropdown #venue dengan marker yang diklik
        const venueSelect = document.getElementById('venue');
        const matchOption = Array.from(venueSelect.options).find(opt => opt.text.trim() === venue.name);
        venueSelect.selectedIndex = matchOption ? matchOption.index : 0;

        const caborArr = venue.cabor.split(',').map(c => c.trim());
        const caborContainer = document.getElementById('card-gor-cabor-grid');
        caborContainer.innerHTML = '';
        caborArr.forEach(c => {
            let shortName = c;
            if (c.length > 10) {
                const words = c.split(' ');
                shortName = words[words.length - 1];
            }
            caborContainer.innerHTML += `
                <div class="cabor-item">
                    <div class="cabor-icon">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="3" fill="currentColor"/></svg>
                    </div>
                    <span>${shortName}</span>
                </div>
            `;
        });

        // Reset filter buttons to "Semua"
        document.querySelectorAll('.facility-filter-btn').forEach(btn => {
            btn.classList.remove('active');
            if (btn.dataset.filter === 'all') btn.classList.add('active');
        });
        document.querySelectorAll('.facility-category').forEach(cat => {
            if (cat.style.display === 'block') cat.style.display = 'block';
        });

        // Fetch fasilitas (Hotel, RS, Restoran, Polisi, Apotek)
        if (map) {
            var venueTypes = [
                ['lodging', 'hotel-container', 'Hotel', 'cat-hotel'],
                ['hospital', 'rs-container', 'Fasilitas Kesehatan', 'cat-rs'],
                ['restaurant', 'resto-container', 'Restoran', 'cat-resto'],
                ['police', 'police-container', 'Kantor Polisi', 'cat-police'],
                ['pharmacy', 'apotek-container', 'Apotek', 'cat-apotek'],
            ];
            venueTypes.forEach(function(t) {
                renderFacilityCategory(venue, t[0], t[1], t[2], t[3]);
            });
        }
    }

    function setupFacilityFilters() {
        const categoryMap = {
            'cat-hotel':   { type: 'lodging',   containerId: 'hotel-container',   title: 'Hotel',          catId: 'cat-hotel' },
            'cat-rs':      { type: 'hospital',   containerId: 'rs-container',      title: 'Fasilitas Kesehatan', catId: 'cat-rs' },
            'cat-resto':   { type: 'restaurant', containerId: 'resto-container',   title: 'Restoran',       catId: 'cat-resto' },
            'cat-police':  { type: 'police',     containerId: 'police-container',  title: 'Kantor Polisi',  catId: 'cat-police' },
            'cat-apotek':  { type: 'pharmacy',   containerId: 'apotek-container',  title: 'Apotek',         catId: 'cat-apotek' },
        };

        document.querySelectorAll('.facility-filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.facility-filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const filter = this.dataset.filter;
                document.querySelectorAll('.facility-category').forEach(cat => {
                    cat.style.display = 'none';
                });

                if (filter === 'all') {
                    if (currentVenue) {
                        Object.values(categoryMap).forEach(c => {
                            renderFacilityCategory(currentVenue, c.type, c.containerId, c.title, c.catId);
                        });
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