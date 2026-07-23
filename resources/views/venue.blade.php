@extends('layouts.app')

@section('title', 'Peta Venue - PORPROV XV KOTA BOGOR 2026')

@push('styles')
<style>
    .venue-banner {
        background: #013469;
        height: 80px;
        display: flex;
        align-items: center;
        padding: 0 28px;
        gap: 14px;
    }

    .venue-banner svg {
        opacity: 0.9;
        flex-shrink: 0;
    }

    .venue-banner h1 {
        color: #fff;
        font-size: 20px;
        font-weight: 800;
        text-transform: uppercase;
        margin: 0;
        letter-spacing: 0.04em;
    }

    .venue-banner p {
        color: #a8c8e8;
        font-size: 11px;
        margin: 3px 0 0;
    }

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

    .map-section {
        position: relative;
        max-width: 1200px;
        margin: 0 auto 40px;
        padding: 0 20px;
    }

    #map-canvas {
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
        right: 40px;
        width: 300px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        z-index: 99;
        overflow: hidden;
        display: none;
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

    /* ── Facilities Section (Same as Home) ── */
    .venue-body {
        max-width: 1200px;
        margin: 40px auto 80px;
        padding: 0 20px;
    }

    .facilities-section-title {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 32px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f3f4f6;
    }

    .fst-icon {
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .facilities-section-title h2 {
        font-size: 1.5rem;
        font-weight: 800;
        color: #111827;
        margin: 0;
    }

    .fst-subtitle {
        font-size: 14px;
        color: #6b7280;
        margin: 4px 0 0;
    }

    .facility-category {
        margin-bottom: 32px;
        background: #fff;
        padding: 24px;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        border: 1px solid #f9fafb;
    }

    .facilities-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 2px solid #f3f4f6;
    }

    .facilities-header h2 {
        font-size: 1.15rem;
        font-weight: 800;
        color: #111827;
        margin: 0;
    }

    .facilities-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .place-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 16px;
    }

    .place-card {
        background: #fafbfc;
        border-radius: 14px;
        padding: 18px;
        display: flex;
        flex-direction: column;
        gap: 14px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #f0f1f3;
    }

    .place-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        background: #fff;
    }

    .place-card-top {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .pc-category-icon {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .pc-info {
        flex: 1;
        min-width: 0;
    }

    .pc-name {
        font-size: 14px;
        font-weight: 700;
        color: #1f2937;
        margin: 0 0 4px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .pc-addr {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: #6b7280;
        line-height: 1.4;
    }

    .pc-addr svg {
        color: #9ca3af;
        flex-shrink: 0;
    }

    .pc-badge {
        background: #dbeafe;
        color: #2563eb;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
        flex-shrink: 0;
    }

    .place-card .map-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: #f3f4f6;
        color: #374151;
        font-size: 13px;
        font-weight: 700;
        padding: 11px 16px;
        border-radius: 10px;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .place-card .map-btn:hover {
        background: #2563eb;
        color: #ffffff;
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

        .map-section {
            padding: 0 16px;
        }

        #map-canvas {
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

        .facilities-section-title {
            gap: 12px;
            margin-bottom: 24px;
        }

        .fst-icon {
            width: 48px;
            height: 48px;
        }

        .fst-icon svg {
            width: 24px;
            height: 24px;
        }

        .facilities-section-title h2 {
            font-size: 1.25rem;
        }

        .facility-category {
            padding: 16px;
            border-radius: 16px;
        }

        .place-grid {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            padding-bottom: 12px;
            gap: 14px;
        }

        .place-card {
            min-width: 260px;
            max-width: 280px;
            scroll-snap-align: start;
            flex-shrink: 0;
        }

        .place-grid::-webkit-scrollbar {
            display: none;
        }

        .place-grid {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    }
</style>
@endpush

@section('content')
<section class="venue-banner">
    <svg width="28" height="28" fill="none" stroke="#fff" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
    </svg>
    <div>
        <h1>PETA VENUE PORPROV XV 2026</h1>
        <p>Klik pin pada peta untuk melihat Detail Olahraga, Hotel Terdekat & Rumah Sakit Terdekat (< 3 Km)</p>
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

<section class="map-section">
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
</section>

<!-- Facilities Section (Ported from Home) -->
<div class="venue-body" id="facilities-section">
    <div class="facilities-section-title">
        <div class="fst-icon">
            <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
        </div>
        <div>
            <h2>Fasilitas Terdekat</h2>
            <p class="fst-subtitle">Temukan fasilitas di sekitar lokasi yang dipilih</p>
        </div>
    </div>

    <!-- Hotel Section -->
    <div class="facility-category" id="cat-hotel" style="display:none;">
        <div class="facilities-header">
            <div class="facilities-icon" style="background:#fef3c7; color:#d97706;">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
                </svg>
            </div>
            <h2>Hotel & Penginapan Terdekat</h2>
        </div>
        <div id="hotel-container" class="place-grid"></div>
    </div>

    <!-- RS / Puskesmas Section -->
    <div class="facility-category" id="cat-rs" style="display:none;">
        <div class="facilities-header">
            <div class="facilities-icon" style="background:#fee2e2; color:#dc2626;">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z" />
                </svg>
            </div>
            <h2>Fasilitas Kesehatan Terdekat</h2>
        </div>
        <div id="rs-container" class="place-grid"></div>
    </div>

    <!-- Restoran Section -->
    <div class="facility-category" id="cat-resto" style="display:none;">
        <div class="facilities-header">
            <div class="facilities-icon" style="background:#dcfce7; color:#16a34a;">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-7v8h2.5v8H21V2h-5z" />
                </svg>
            </div>
            <h2>Restoran Terdekat</h2>
        </div>
        <div id="resto-container" class="place-grid"></div>
    </div>

    <!-- Polisi Section -->
    <div class="facility-category" id="cat-police" style="display:none;">
        <div class="facilities-header">
            <div class="facilities-icon" style="background:#e0e7ff; color:#4f46e5;">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                </svg>
            </div>
            <h2>Kantor Polisi Terdekat</h2>
        </div>
        <div id="police-container" class="place-grid"></div>
    </div>

    <!-- Apotek Section -->
    <div class="facility-category" id="cat-apotek" style="display:none;">
        <div class="facilities-header">
            <div class="facilities-icon" style="background:#f3e8ff; color:#9333ea;">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z" />
                </svg>
            </div>
            <h2>Apotek Terdekat</h2>
        </div>
        <div id="apotek-container" class="place-grid"></div>
    </div>
</div>
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
                    categoryIcon = '<svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>';
                } else if (type === 'hospital') {
                    iconBg = '#fee2e2';
                    iconColor = '#dc2626';
                    categoryIcon = '<svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/></svg>';
                } else if (type === 'restaurant') {
                    iconBg = '#dcfce7';
                    iconColor = '#16a34a';
                    categoryIcon = '<svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-7v8h2.5v8H21V2h-5z"/></svg>';
                } else if (type === 'police') {
                    iconBg = '#e0e7ff';
                    iconColor = '#4f46e5';
                    categoryIcon = '<svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/></svg>';
                } else if (type === 'pharmacy') {
                    iconBg = '#f3e8ff';
                    iconColor = '#9333ea';
                    categoryIcon = '<svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/></svg>';
                }

                const mapUrl = place.mapUrl || `https://www.openstreetmap.org/directions?engine=fossgis_osrm_car&route=${latLng[0]}%2C${latLng[1]}%3B${lat}%2C${lon}`;

                container.innerHTML += `
                    <div class="place-card">
                        <div class="place-card-top">
                            <div class="pc-category-icon" style="background:${iconBg}; color:${iconColor};">
                                ${categoryIcon}
                            </div>
                            <div class="pc-info">
                                <p class="pc-name">${name}</p>
                                <div class="pc-addr">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    <span>${address}</span>
                                </div>
                            </div>
                            <span class="pc-badge">&lt; 3 km</span>
                        </div>
                        <a href="${mapUrl}" target="_blank" class="map-btn">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /></svg>
                            Lihat Rute
                        </a>
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

                                const pMarker = L.marker([lat, lon], {
                                    icon: blueIcon
                                }).addTo(map);
                                pMarker.bindPopup(`<div style="font-family:'Poppins',sans-serif; font-size:12px;"><strong>${name}</strong></div>`);

                                fasilitasMarkers.push(pMarker);
                                bounds.extend([lat, lon]);
                            });
                            map.fitBounds(bounds, {
                                padding: [50, 50]
                            });
                        } else if (!isVenueFound) {
                            alert('Fasilitas tidak ditemukan di area sekitar.');
                        } else {
                            if (filteredVenues.length === 1) {
                                map.setView([filteredVenues[0].lat, filteredVenues[0].lng], 15);
                            } else {
                                map.fitBounds(bounds, {
                                    padding: [50, 50]
                                });
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
                            else map.fitBounds(bounds, {
                                padding: [50, 50]
                            });
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
            }, 100);
        });
    }

    function showVenueDetails(venue) {
        const floatingCard = document.getElementById('floating-gor-card');
        floatingCard.style.display = 'block';
        floatingCard.style.zIndex = '1000'; 

        document.getElementById('card-gor-name').innerText = venue.name;
        document.getElementById('card-gor-addr').innerText = venue.address;
        document.getElementById('card-gor-gmaps').href = venue.gmaps_url;

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

        // Fetch fasilitas (Hotel, RS, Restoran, Polisi, Apotek)
        if (map) {
            fetchPlaces(venue, 'lodging', 'hotel-container', 'Hotel', 'cat-hotel');
            fetchPlaces(venue, 'hospital', 'rs-container', 'Fasilitas Kesehatan', 'cat-rs');
            fetchPlaces(venue, 'restaurant', 'resto-container', 'Restoran', 'cat-resto');
            fetchPlaces(venue, 'police', 'police-container', 'Kantor Polisi', 'cat-police');
            fetchPlaces(venue, 'pharmacy', 'apotek-container', 'Apotek', 'cat-apotek');

            // Scroll ke bagian fasilitas
            setTimeout(() => {
                const facilitiesSection = document.getElementById('facilities-section');
                if (facilitiesSection) {
                    facilitiesSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }, 500); 
        }
    }

    window.onload = function() {
        initMap();
    };
</script>
@endpush