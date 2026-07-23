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
            gmaps_url: "https://www.google.com/maps/place/GOR+Pajajaran+Indoor/@-6.5761045,106.7944374,17z/data=!3m1!4b1!4m6!3m5!1s0x2e69c55c7834537f:0x4e88799594588c3b!8m2!3d-6.5761098!4d106.7970123!16s%2Fg%2F11pvgf0m64?entry=ttu&g_ep=EgoyMDI2MDcxOS4wIKXMDSoASAFQAw%3D%3D",
        },
        {
            id: 2,
            name: "GOR Pajajaran Indoor B",
            lat: -6.584100,
            lng: 106.801200,
            address: "Gor Pajajaran, Jl. Pemuda No.02 kel, RT.04/RW.01, Tanah Sareal, Kota Bogor, Jawa Barat 16161",
            cabor: "Judo, Kurash, Sambo",
            gmaps_url: "https://www.google.com/maps/place/Toko+olahraga+Ewing+Sport+bogor/@-6.5761098,106.7970123,17z/data=!4m6!3m5!1s0x2e69c4379e67ca1f:0x9a0730042810b803!8m2!3d-6.5761098!4d106.7970123!16s%2Fg%2F1pzr718yr?entry=ttu&g_ep=EgoyMDI2MDcxOS4wIKXMDSoASAFQAw%3D%3D",
        },
        {
            id: 3,
            name: "GOR Vokasi IPB",
            lat: -6.589165,
            lng: 106.806324,
            address: "Jl. Lodaya II, RT.03/RW.05, Cilibende, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128",
            cabor: "Shorinji Kempo, Tarung Derajat",
            gmaps_url: "https://www.google.com/maps/place/Gymnasium+Sekolah+Vokasi+IPB/@-6.5889744,106.8052783,17z/data=!3m1!4b1!4m6!3m5!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!8m2!3d-6.5889797!4d106.8078532!16s%2Fg%2F11vwvhlk43?entry=ttu&g_ep=EgoyMDI2MDcxOS4wIKXMDSoASAFQAw%3D%3D",
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
            gmaps_url: "https://maps.google.com/?q=Green+Forest+Hotel+Bogor"
        },
        {
            id: 7,
            name: "PPSDMAP Kemenhub Kemang",
            lat: -6.488000,
            lng: 106.756000,
            address: "Kemang, Bogor, Jawa Barat",
            cabor: "Bola Tangan Indoor",
            gmaps_url: "https://maps.google.com/?q=PPSDMAP+Kemenhub+Kemang"
        },
        {
            id: 8,
            name: "Padepokan Voli Sentul",
            lat: -6.568000,
            lng: 106.857000,
            address: "Sentul, Bogor, Jawa Barat",
            cabor: "Bola Tangan Pasir",
            gmaps_url: "https://maps.google.com/?q=Padepokan+Voli+Sentul"
        },
        {
            id: 9,
            name: "Brajamustika Hotel",
            lat: -6.581000,
            lng: 106.772000,
            address: "Jl. DR. Sumeru, RT.01/RW.10, Menteng, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16111",
            cabor: "Dansa",
            gmaps_url: "https://www.google.com/maps/place/Hotel+Braja+Mustika/@-6.5812267,106.773803,17z/data=!3m1!4b1!4m9!3m8!1s0x2e69c4513eee3a2d:0x85ff382a1dc9430f!5m2!4m1!1i2!8m2!3d-6.581232!4d106.7763779!16s%2Fg%2F1tj35dw0?entry=ttu&g_ep=EgoyMDI2MDcxOS4wIKXMDSoASAFQAw%3D%3D"
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
            gmaps_url: "https://maps.google.com/?q=Stadion+Pajajaran+Bogor"
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
            gmaps_url: "https://maps.google.com/?q=GOR+Yasmin+Bogor"
        }
    ];

    let map;
    let markers = []; // Marker untuk Venue (Merah)
    let fasilitasMarkers = []; // Marker untuk Fasilitas dari Places API (Biru)
    let currentVenue = null;

    function fetchPlaces(venue, type, containerId, title, categoryId) {
        const latLng = [Number(venue.lat), Number(venue.lng)];
        const container = document.getElementById(containerId);
        const categoryBlock = document.getElementById(categoryId);
        if (!container || !categoryBlock) return;

        categoryBlock.style.display = 'block';
        container.innerHTML = '<p style="color:#9ca3af; font-style:italic; padding: 12px 0;">Sedang mencari data dari OpenStreetMap...</p>';

        const venueName = venue.name.toLowerCase();
        const isPajajaran = venueName.includes("pajajaran");
        const isYasmin = venueName.includes("yasmin");

        let customData = null;
        if (isPajajaran) {
            if (type === 'hospital') {
                customData = [{
                    name: "Puskesmas Bogor Selatan",
                    address: "Bogor Selatan",
                    mapUrl: "https://maps.google.com/?q=Puskesmas+Bogor+Selatan+Bogor"
                }];
            } else if (type === 'lodging') {
                customData = [{
                    name: "AMAROOSSA ROYAL BOGOR HOTEL",
                    address: "Bogor Tengah",
                    mapUrl: "https://www.google.com/maps/search/?api=1&query=Amaroossa+Royal+Bogor"
                }];
            } else if (type === 'restaurant') {
                customData = [{
                    name: "HARTZ CHICKEN BUFFET",
                    address: "Kota Bogor",
                    mapUrl: "https://www.google.com/maps/search/?api=1&query=Hartz+Chicken+Buffet+Bogor"
                }];
            }
        } else if (isYasmin) {
            if (type === 'hospital') {
                customData = [{
                    name: "RSU Islam Bogor",
                    address: "Kota Bogor",
                    mapUrl: "https://www.google.com/maps/search/?api=1&query=RSU+Islam+Bogor"
                }];
            } else if (type === 'lodging') {
                customData = [{
                    name: "SAHIRA BUTIK HOTEL, PT",
                    address: "Kota Bogor",
                    mapUrl: "https://www.google.com/maps/search/?api=1&query=Sahira+Butik+Hotel+Bogor"
                }];
            }
        }

        const renderResults = (placesList, isCustom = false) => {
            container.innerHTML = '';
            placesList.forEach(place => {
                const lat = place.lat || (place.center && place.center.lat) || latLng[0];
                const lon = place.lon || (place.center && place.center.lon) || latLng[1];
                const name = place.name || (place.tags && place.tags.name ? place.tags.name : title + ' Tanpa Nama');
                const address = place.address || (place.tags && place.tags['addr:street'] ? place.tags['addr:street'] : 'Area sekitar');

                let iconBg = '#dbeafe',
                    iconColor = '#2563eb',
                    categoryIcon = '';
                if (type === 'lodging') {
                    iconBg = '#fef3c7';
                    iconColor = '#d97706';
                    categoryIcon = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>';
                } else if (type === 'hospital') {
                    iconBg = '#fee2e2';
                    iconColor = '#dc2626';
                    categoryIcon = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/></svg>';
                } else if (type === 'restaurant') {
                    iconBg = '#dcfce7';
                    iconColor = '#16a34a';
                    categoryIcon = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-7v8h2.5v8H21V2h-5z"/></svg>';
                } else if (type === 'police') {
                    iconBg = '#e0e7ff';
                    iconColor = '#4f46e5';
                    categoryIcon = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/></svg>';
                } else if (type === 'pharmacy') {
                    iconBg = '#f3e8ff';
                    iconColor = '#9333ea';
                    categoryIcon = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/></svg>';
                }

                const mapUrl = place.mapUrl || `https://www.openstreetmap.org/directions?engine=fossgis_osrm_car&route=${latLng[0]}%2C${latLng[1]}%3B${lat}%2C${lon}`;

                container.innerHTML += `
                    <div class="facility-list-item">
                        <div class="fli-icon" style="background:${iconBg}; color:${iconColor};">
                            ${categoryIcon}
                        </div>
                        <div class="fli-info">
                            <p class="fli-name">${name}</p>
                            <p class="fli-addr">${address}</p>
                        </div>
                        <a href="${mapUrl}" target="_blank" class="fli-route">Rute</a>
                    </div>
                `;
            });
        };

        if (customData) {
            renderResults(customData, true);
            return;
        }

        let overpassTag = '';
        if (type === 'lodging') overpassTag = '["tourism"~"hotel|guest_house|motel"]';
        else if (type === 'hospital') overpassTag = '["amenity"="hospital"]';
        else if (type === 'pharmacy') overpassTag = '["amenity"="pharmacy"]';
        else if (type === 'restaurant') overpassTag = '["amenity"~"restaurant|cafe|fast_food"]';
        else if (type === 'police') overpassTag = '["amenity"="police"]';
        else overpassTag = `["amenity"="${type}"]`;

        const query = `
            [out:json];
            (
              node${overpassTag}(around:3000, ${latLng[0]}, ${latLng[1]});
              way${overpassTag}(around:3000, ${latLng[0]}, ${latLng[1]});
              relation${overpassTag}(around:3000, ${latLng[0]}, ${latLng[1]});
            );
            out center;
        `;

        fetch('https://overpass-api.de/api/interpreter', {
                method: 'POST',
                body: query
            })
            .then(res => res.json())
            .then(data => {
                if (data.elements && data.elements.length > 0) {
                    const topResults = data.elements.slice(0, 4);
                    renderResults(topResults);
                } else {
                    container.innerHTML = `<p style="color:#9ca3af; font-style:italic; padding: 12px 0;">Tidak ada ${title} terdekat ditemukan.</p>`;
                }
            })
            .catch(err => {
                console.error(err);
                container.innerHTML = `<p style="color:#9ca3af; font-style:italic; padding: 12px 0;">Gagal mengambil data ${title}.</p>`;
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
        fasilitasMarkers.forEach(m => map.removeLayer(m));
        fasilitasMarkers = [];
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

            // 2. Proses Cari Fasilitas dengan Overpass API
            if (fasilitasVal) {
                let overpassTag = '';
                if (fasilitasVal === 'hotel') overpassTag = '["tourism"~"hotel|guest_house|motel"]';
                else if (fasilitasVal === 'rumah-sakit') overpassTag = '["amenity"="hospital"]';
                else if (fasilitasVal === 'apotek') overpassTag = '["amenity"="pharmacy"]';
                else if (fasilitasVal === 'rumah-makan') overpassTag = '["amenity"~"restaurant|cafe|fast_food"]';

                const searchCenter = isVenueFound ? [filteredVenues[0].lat, filteredVenues[0].lng] : [map.getCenter().lat, map.getCenter().lng];

                // Map top filter ke side panel
                const filterToCategory = {
                    'hotel':       { type: 'lodging',   containerId: 'hotel-container',   title: 'Hotel',           catId: 'cat-hotel' },
                    'rumah-sakit': { type: 'hospital',   containerId: 'rs-container',      title: 'Fasilitas Kesehatan', catId: 'cat-rs' },
                    'apotek':      { type: 'pharmacy',   containerId: 'apotek-container',  title: 'Apotek',          catId: 'cat-apotek' },
                    'rumah-makan': { type: 'restaurant', containerId: 'resto-container',   title: 'Restoran',        catId: 'cat-resto' },
                };
                const matchedCategory = filterToCategory[fasilitasVal];

                // Sembunyikan placeholder, tampilkan kategori yang cocok
                const placeholder = document.getElementById('facilities-placeholder');
                if (placeholder) placeholder.style.display = 'none';
                document.querySelectorAll('.facility-category').forEach(cat => {
                    cat.style.display = cat.id === (matchedCategory ? matchedCategory.catId : '') ? 'block' : 'none';
                });

                // Aktifkan filter button yang sesuai
                document.querySelectorAll('.facility-filter-btn').forEach(btn => {
                    btn.classList.remove('active');
                    if (matchedCategory && btn.dataset.filter === matchedCategory.catId) btn.classList.add('active');
                    else if (!matchedCategory && btn.dataset.filter === 'all') btn.classList.add('active');
                });

                const query = `
                    [out:json];
                    (
                      node${overpassTag}(around:3000, ${searchCenter[0]}, ${searchCenter[1]});
                      way${overpassTag}(around:3000, ${searchCenter[0]}, ${searchCenter[1]});
                      relation${overpassTag}(around:3000, ${searchCenter[0]}, ${searchCenter[1]});
                    );
                    out center;
                `;

                const blueIcon = new L.Icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                });

                document.getElementById('floating-gor-card').style.display = 'block';
                document.getElementById('card-gor-name').innerText = "Mencari fasilitas...";
                document.getElementById('card-gor-addr').innerText = "Sedang mengambil data dari OpenStreetMap";

                fetch('https://overpass-api.de/api/interpreter', {
                        method: 'POST',
                        body: query
                    })
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('floating-gor-card').style.display = 'none';
                        if (data.elements && data.elements.length > 0) {
                            data.elements.forEach(place => {
                                const lat = place.lat || place.center.lat;
                                const lon = place.lon || place.center.lon;
                                const name = place.tags && place.tags.name ? place.tags.name : 'Fasilitas Tanpa Nama';

                                // Marker di peta
                                const pMarker = L.marker([lat, lon], {
                                    icon: blueIcon
                                }).addTo(map);
                                pMarker.bindPopup(`<div style="font-family:'Poppins',sans-serif; font-size:12px;"><strong>${name}</strong></div>`);
                                fasilitasMarkers.push(pMarker);
                                bounds.extend([lat, lon]);

                                // Render ke side panel
                                if (matchedCategory) {
                                    const container = document.getElementById(matchedCategory.containerId);
                                    if (container) {
                                        const address = place.tags && place.tags['addr:street'] ? place.tags['addr:street'] : 'Area sekitar';
                                        let iconBg = '#dbeafe', iconColor = '#2563eb', categoryIcon = '';
                                        if (matchedCategory.type === 'lodging') {
                                            iconBg = '#fef3c7'; iconColor = '#d97706';
                                            categoryIcon = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>';
                                        } else if (matchedCategory.type === 'hospital') {
                                            iconBg = '#fee2e2'; iconColor = '#dc2626';
                                            categoryIcon = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/></svg>';
                                        } else if (matchedCategory.type === 'restaurant') {
                                            iconBg = '#dcfce7'; iconColor = '#16a34a';
                                            categoryIcon = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-7v8h2.5v8H21V2h-5z"/></svg>';
                                        } else if (matchedCategory.type === 'pharmacy') {
                                            iconBg = '#f3e8ff'; iconColor = '#9333ea';
                                            categoryIcon = '<svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/></svg>';
                                        }
                                        const mapUrl = `https://www.openstreetmap.org/directions?engine=fossgis_osrm_car&route=${searchCenter[0]}%2C${searchCenter[1]}%3B${lat}%2C${lon}`;
                                        container.innerHTML += `
                                            <div class="facility-list-item">
                                                <div class="fli-icon" style="background:${iconBg}; color:${iconColor};">${categoryIcon}</div>
                                                <div class="fli-info">
                                                    <p class="fli-name">${name}</p>
                                                    <p class="fli-addr">${address}</p>
                                                </div>
                                                <a href="${mapUrl}" target="_blank" class="fli-route">Rute</a>
                                            </div>
                                        `;
                                    }
                                }
                            });
                            map.fitBounds(bounds, { padding: [50, 50] });
                        } else if (!isVenueFound) {
                            alert('Fasilitas tidak ditemukan di area sekitar.');
                        } else {
                            if (filteredVenues.length === 1) {
                                map.setView([filteredVenues[0].lat, filteredVenues[0].lng], 15);
                            } else {
                                map.fitBounds(bounds, { padding: [50, 50] });
                            }
                            alert('Tidak ada fasilitas terdekat yang ditemukan dari OpenStreetMap.');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        document.getElementById('floating-gor-card').style.display = 'none';
                        alert('Gagal memuat data dari OpenStreetMap.');
                        if (isVenueFound) {
                            if (filteredVenues.length === 1) map.setView([filteredVenues[0].lat, filteredVenues[0].lng], 15);
                            else map.fitBounds(bounds, { padding: [50, 50] });
                        }
                    });
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
            fetchPlaces(venue, 'lodging', 'hotel-container', 'Hotel', 'cat-hotel');
            fetchPlaces(venue, 'hospital', 'rs-container', 'Fasilitas Kesehatan', 'cat-rs');
            fetchPlaces(venue, 'restaurant', 'resto-container', 'Restoran', 'cat-resto');
            fetchPlaces(venue, 'police', 'police-container', 'Kantor Polisi', 'cat-police');
            fetchPlaces(venue, 'pharmacy', 'apotek-container', 'Apotek', 'cat-apotek');
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
                            fetchPlaces(currentVenue, c.type, c.containerId, c.title, c.catId);
                        });
                    }
                } else if (categoryMap[filter] && currentVenue) {
                    const c = categoryMap[filter];
                    fetchPlaces(currentVenue, c.type, c.containerId, c.title, c.catId);
                }
            });
        });
    }

    window.onload = function() {
        initMap();
    };
</script>
@endpush