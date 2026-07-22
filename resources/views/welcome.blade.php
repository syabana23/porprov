@extends('layouts.app')

@section('title', 'PORPROV XV KOTA BOGOR 2026 - Beranda')

@push('styles')
<style>
    /* ── Hero ── */
    .hero {
        position: relative;
        overflow: hidden;
        height: 400px;
        display: flex;
    }

    .hero-left {
        position: relative;
        z-index: 2;
        width: 60%;
        background: #013469;
        clip-path: polygon(0 0, 100% 0, 85% 100%, 0 100%);
        display: flex;
        align-items: center;
        padding: 40px 60px 40px 40px;
    }

    .hero-right {
        position: absolute;
        right: 0;
        top: 0;
        width: 55%;
        height: 100%;
    }

    .hero-right img.bg {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-right .mascot {
        position: absolute;
        bottom: 0;
        right: 30px;
        height: 280px;
        width: auto;
        object-fit: contain;
        z-index: 5;
    }

    .hero-left h2 {
        color: #fff;
        font-size: 44px;
        font-weight: 900;
        text-transform: uppercase;
        line-height: 1;
        margin: 0;
    }

    .hero-left h2 span {
        color: #FDB813;
        display: block;
        font-size: 52px;
    }

    .hero-left p.tagline {
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        margin: 12px 0 8px;
    }

    .hero-left p.desc {
        color: #c8d9ea;
        font-size: 11.5px;
        line-height: 1.55;
        margin: 0 0 20px;
        max-width: 300px;
    }

    .hero-btns {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-yellow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #FDB813;
        color: #013469;
        font-weight: 700;
        font-size: 12px;
        padding: 9px 18px;
        border-radius: 6px;
        text-decoration: none;
        font-family: 'Poppins', sans-serif;
        border: none;
        cursor: pointer;
    }

    .btn-outline-white {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: transparent;
        color: #fff;
        font-weight: 700;
        font-size: 12px;
        padding: 9px 18px;
        border-radius: 6px;
        text-decoration: none;
        border: 2px solid rgba(255, 255, 255, 0.7);
        font-family: 'Poppins', sans-serif;
    }

    /* ───────── Filter ───────── */
    .filter-section {
        max-width: 1200px;
        margin: 10px auto 10px;
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
        grid-template-columns: 2fr 1fr 1fr auto;
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

    /* ── Stats ── */
    .stats {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 20px 40px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }

    .stat-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.10);
        padding: 22px 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        transition: box-shadow 0.2s;
    }

    .stat-card:hover {
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.14);
    }

    .stat-icon {
        flex-shrink: 0;
    }

    .stat-num {
        font-size: 32px;
        font-weight: 800;
        color: #013469;
        line-height: 1;
    }

    .stat-label {
        font-size: 11.5px;
        color: #6b7280;
        font-weight: 500;
        margin-top: 2px;
    }

    /* ── Map Home ── */
    .map-home-section {
        max-width: 1200px;
        margin: 40px auto 60px;
        padding: 0 20px;
    }

    .section-title {
        font-size: 24px;
        font-weight: 800;
        color: #013469;
        margin-bottom: 20px;
        text-transform: uppercase;
        border-left: 5px solid #2BB673;
        padding-left: 12px;
    }

    .map-container {
        position: relative;
        width: 100%;
        height: 450px;
        background: #e5e7eb;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    #map-canvas {
        width: 100% !important;
        height: 100% !important;
        display: block !important;
    }

    .home-gor-card {
        position: absolute;
        top: 20px;
        right: 20px;
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

    .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 16px;
    }

    .tag-pill {
        background: #f4f6f9;
        color: #113264;
        padding: 6px 12px;
        border-radius: 16px;
        font-size: 12px;
        font-weight: 700;
    }

    .home-gor-card .map-btn {
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

    .home-gor-card .map-btn:hover {
        background: #012050;
    }

    @media (max-width: 768px) {
        .home-gor-card {
            position: relative;
            top: 0;
            right: 0;
            width: 100%;
            box-shadow: none;
            border-radius: 0;
        }

        .map-container {
            border-radius: 0;
            height: 350px;
        }

        .filter-section {
            margin: 20px 16px;
            padding: 0;
        }

        .filter-form {
            grid-template-columns: 1fr;
        }

        /* Hero mobile */
        .hero {
            height: auto;
            min-height: 320px;
            flex-direction: column;
        }

        .hero-left {
            width: 100%;
            clip-path: none;
            padding: 28px 20px 24px;
            min-height: 280px;
        }

        .hero-right {
            position: relative;
            width: 100%;
            height: 180px;
        }

        .hero-left h2 {
            font-size: 26px;
        }

        .hero-left h2 span {
            font-size: 30px;
        }

        .hero-left p.desc {
            max-width: 100%;
            font-size: 12px;
        }

        .hero-right .mascot {
            height: 160px;
            right: 16px;
        }

        /* Stats mobile */
        .stats {
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            padding: 20px 16px 30px;
        }

        .stat-card {
            padding: 16px 14px;
            gap: 12px;
        }

        .stat-num {
            font-size: 26px;
        }

        .stat-icon svg {
            width: 32px;
            height: 32px;
        }

        /* Map section mobile */
        .map-home-section {
            padding: 20px 5%;
        }
    }

    /* Facilities Cards CSS */
    .venue-body {
        margin-top: 50px;
        padding: 0 5%;
        margin-bottom: 80px;
    }

    .facility-category {
        margin-bottom: 40px;
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
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 2px solid #f3f4f6;
    }

    .facilities-header h2 {
        font-size: 1.25rem;
        font-weight: 800;
        color: #111827;
        margin: 0;
    }

    .facilities-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .place-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 20px;
    }

    .place-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #f3f4f6;
    }

    .place-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
    }

    .place-card .pc-img {
        height: 160px;
        overflow: hidden;
        position: relative;
    }

    .place-card .pc-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .place-card:hover .pc-img img {
        transform: scale(1.08);
    }

    .place-card .pc-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(4px);
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 800;
        color: #013469;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .place-card .pc-body {
        padding: 18px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .place-card .pc-name {
        font-size: 16px;
        font-weight: 800;
        color: #1f2937;
        margin: 0 0 6px;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .place-card .pc-addr {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        font-size: 12px;
        color: #6b7280;
        margin-bottom: 20px;
        line-height: 1.5;
    }

    .place-card .pc-addr svg {
        color: #9ca3af;
        margin-top: 2px;
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
        padding: 12px 16px;
        border-radius: 10px;
        text-decoration: none;
        transition: all 0.2s ease;
        margin-top: auto;
    }

    .place-card .map-btn:hover {
        background: #2563eb;
        color: #ffffff;
    }

    .section-title {
        font-size: 18px;
        margin-bottom: 14px;
    }

    @media (max-width: 768px) {
        .facility-category {
            padding: 16px;
            border-radius: 16px;
        }

        .place-grid {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            padding-bottom: 12px;
            gap: 16px;
        }

        .place-card {
            min-width: 260px;
            max-width: 280px;
            scroll-snap-align: start;
            flex-shrink: 0;
            margin-bottom: 0;
        }

        /* Sembunyikan scrollbar untuk tampilan yang lebih bersih */
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
<!-- Hero Section -->
<section class="hero">
    <!-- ... (Bagian Hero tetap sama seperti kode asli) ... -->
    <div class="hero-left">
        <div>
            <h2>PORPROV <span>KOTA BOGOR 2026</span></h2>
            <p class="tagline">Semangat Sportivitas, Bersatu untuk Prestasi!</p>
            <p class="desc">Kota Bogor siap menjadi tuan rumah yang ramah, berprestasi, dan menginspirasi pada ajang PORPROV Jawa Barat XV Tahun 2026</p>
            <div class="hero-btns">
                <a href="{{ url('/jadwal') }}" class="btn-yellow">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    LIHAT JADWAL
                </a>
                <a href="{{ url('/peta-venue') }}" class="btn-outline-white">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    PETA VENUE
                </a>
            </div>
        </div>
    </div>
    <div class="hero-right">
        <img class="bg" src="{{ asset('images/hero-bg.png') }}" alt="Kota Bogor">
        <img class="mascot" src="{{ asset('images/maskot.png') }}" alt="Maskot PORPROV">
    </div>
</section>

<!-- Statistics Cards -->
<section class="stats">
    <!-- ... (Bagian Stats tetap sama) ... -->
    <div class="stat-card">
        <div class="stat-icon">
            <svg width="40" height="40" fill="none" stroke="#013469" viewBox="0 0 24 24" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
        </div>
        <div>
            <div class="stat-num">80</div>
            <div class="stat-label">Hotel</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#013469" stroke-width="1.5">
                <circle cx="12" cy="5" r="2" stroke-linecap="round" stroke-linejoin="round" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 21l2.5-6M18 11l-3.5 3-1.5 4M13 10l-1 4-3 3M9 21v-3l2-2" />
            </svg>
        </div>
        <div>
            <div class="stat-num">28</div>
            <div class="stat-label">Cabang Olahraga</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <svg width="40" height="40" fill="none" stroke="#013469" viewBox="0 0 24 24" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10M12 14v4m-2-2h4" />
            </svg>
        </div>
        <div>
            <div class="stat-num">164</div>
            <div class="stat-label">Apotek</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <svg width="40" height="40" fill="none" stroke="#2BB673" viewBox="0 0 24 24" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
        </div>
        <div>
            <div class="stat-num">22</div>
            <div class="stat-label">Rumah Sakit</div>
        </div>
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

<!-- Map Section -->
<section class="map-home-section">
    <h2 class="section-title">Peta Lokasi Venue</h2>
    <div class="map-container">
        <div id="map-canvas"></div>

        <div class="home-gor-card" id="floating-gor-card">
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
</section>

<div class="venue-body" id="facilities-section">
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
<!-- PENTING: Tambahkan &libraries=places untuk mengaktifkan API pencarian fasilitas sekitar -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF8W19WIUtkrIWIXb22YbAOxxdtsZKugU&libraries=places"></script>
<script>
    const venueData = [{
            id: 1,
            name: "GOR Pajajaran Indoor A",
            lat: -6.583321,
            lng: 106.800532,
            address: "Jl. Pemuda No.4, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16161",
            cabor: "Drumband, Pencak Silat, Taekwondo",
            gmaps_url: "https://maps.google.com/?q=GOR+Pajajaran+Bogor",
        },
        {
            id: 2,
            name: "GOR Pajajaran Indoor B",
            lat: -6.584100,
            lng: 106.801200,
            address: "Kompleks Olahraga GOR Pajajaran, Jl. Pemuda, Kota Bogor",
            cabor: "Judo, Kurash, Sambo",
            gmaps_url: "https://maps.google.com/?q=-6.584100,106.801200",
        },
        {
            id: 3,
            name: "GOR Vokasi IPB",
            lat: -6.589165,
            lng: 106.806324,
            address: "Kampus IPB Cilibende, Jl. Kumbang No.14, Babakan, Kota Bogor",
            cabor: "Shorinji Kempo, Tarung Derajat",
            gmaps_url: "https://maps.google.com/?q=Sekolah+Vokasi+IPB+Bogor",
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
            address: "Bogor, Jawa Barat",
            cabor: "Dansa",
            gmaps_url: "https://maps.google.com/?q=Brajamustika+Hotel+Bogor"
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

    function fetchPlaces(latLng, type, containerId, title, categoryId) {
        const container = document.getElementById(containerId);
        const categoryBlock = document.getElementById(categoryId);
        if (!container || !categoryBlock) return;

        categoryBlock.style.display = 'block';
        container.innerHTML = '<p style="color:#9ca3af; font-style:italic; padding: 12px 0;">Sedang mencari data...</p>';

        const service = new google.maps.places.PlacesService(map);
        const request = {
            location: latLng,
            radius: '3000',
            type: [type]
        };

        service.nearbySearch(request, (results, status) => {
            if (status === google.maps.places.PlacesServiceStatus.OK && results.length > 0) {
                container.innerHTML = '';
                const topResults = results.slice(0, 4); // Ambil 4 teratas
                topResults.forEach(place => {
                    const placeImg = place.photos && place.photos.length > 0 ?
                        place.photos[0].getUrl({
                            maxWidth: 400
                        }) :
                        'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?auto=format&fit=crop&w=400&q=80';
                    const name = place.name;
                    const address = place.vicinity || '';
                    const mapUrl = `https://www.google.com/maps/search/?api=1&query=${place.geometry.location.lat()},${place.geometry.location.lng()}&query_place_id=${place.place_id}`;

                    container.innerHTML += `
                        <div class="place-card">
                            <div class="pc-img">
                                <span class="pc-badge">&lt; 3 km</span>
                                <img src="${placeImg}" alt="${name}" loading="lazy">
                            </div>
                            <div class="pc-body">
                                <div>
                                    <p class="pc-name">${name}</p>
                                    <div class="pc-addr">
                                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                        <span>${address}</span>
                                    </div>
                                </div>
                                <a href="${mapUrl}" target="_blank" class="map-btn">
                                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /></svg>
                                    Lihat Rute
                                </a>
                            </div>
                        </div>
                    `;
                });
            } else {
                container.innerHTML = `<p style="color:#9ca3af; font-style:italic; padding: 12px 0;">Tidak ada ${title} terdekat ditemukan.</p>`;
            }
        });
    }

    function initMap() {
        const bogorCenter = {
            lat: -6.587,
            lng: 106.803
        };

        const mapElement = document.getElementById("map-canvas");
        if (!mapElement) return;

        map = new google.maps.Map(mapElement, {
            zoom: 14,
            center: bogorCenter,
            mapTypeControl: false,
            streetViewControl: false,
            styles: [{
                featureType: "poi.business",
                stylers: [{
                    visibility: "off"
                }]
            }]
        });

        // Tampilkan semua venue pertama kali di load
        renderVenues(venueData);
        setupFilter();
    }

    // Fungsi Render Marker Venue
    function renderVenues(venuesData) {
        venuesData.forEach(venue => {
            const marker = new google.maps.Marker({
                position: {
                    lat: venue.lat,
                    lng: venue.lng
                },
                map: map,
                title: venue.name,
                animation: google.maps.Animation.DROP,
                icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png' // Icon venue
            });

            marker.addListener("click", () => {
                showVenueDetails(venue);
            });

            markers.push(marker);
        });
    }

    // Fungsi Hapus Semua Marker di Peta
    function clearMarkers() {
        markers.forEach(m => m.setMap(null));
        markers = [];
        fasilitasMarkers.forEach(m => m.setMap(null));
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
            const bounds = new google.maps.LatLngBounds();

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
                filteredVenues.forEach(v => bounds.extend(new google.maps.LatLng(v.lat, v.lng)));
                isVenueFound = true;
            }

            // 2. Proses Cari Fasilitas dengan Google Places API (Hotel, Rumah Sakit, dll)
            if (fasilitasVal) {
                let placeType = '';
                if (fasilitasVal === 'hotel') placeType = 'lodging';
                else if (fasilitasVal === 'rumah-sakit') placeType = 'hospital';
                else if (fasilitasVal === 'apotek') placeType = 'pharmacy';
                else if (fasilitasVal === 'rumah-makan') placeType = 'restaurant';

                // Tentukan lokasi pencarian: di Venue terpilih, atau tengah kota Bogor jika tidak ada Venue
                const searchCenter = isVenueFound ?
                    new google.maps.LatLng(filteredVenues[0].lat, filteredVenues[0].lng) :
                    map.getCenter();

                const service = new google.maps.places.PlacesService(map);
                const request = {
                    location: searchCenter,
                    radius: '3000', // Cari dalam radius 3 KM
                    type: [placeType]
                };

                service.nearbySearch(request, (results, status) => {
                    if (status === google.maps.places.PlacesServiceStatus.OK && results) {
                        results.forEach(place => {
                            const pMarker = new google.maps.Marker({
                                position: place.geometry.location,
                                map: map,
                                title: place.name,
                                icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' // Icon fasilitas
                            });

                            const infoWindow = new google.maps.InfoWindow({
                                content: `<div style="font-family:'Poppins',sans-serif; font-size:12px;"><strong>${place.name}</strong><br>${place.vicinity}</div>`
                            });

                            pMarker.addListener("click", () => infoWindow.open(map, pMarker));
                            fasilitasMarkers.push(pMarker);
                            bounds.extend(place.geometry.location);
                        });
                        map.fitBounds(bounds);
                    } else if (!isVenueFound) {
                        alert('Fasilitas tidak ditemukan di area sekitar.');
                    }
                });
            } else {
                // Adjust peta jika hanya filter Venue & Cabor
                if (isVenueFound) {
                    if (filteredVenues.length === 1) {
                        map.setCenter({
                            lat: filteredVenues[0].lat,
                            lng: filteredVenues[0].lng
                        });
                        map.setZoom(15);
                    } else {
                        map.fitBounds(bounds);
                    }
                } else {
                    alert('Venue tidak ditemukan dengan kriteria tersebut.');
                    map.setCenter({
                        lat: -6.587,
                        lng: 106.803
                    });
                    map.setZoom(14);
                }
            }
        });

        // Saat form di-reset
        filterForm.addEventListener('reset', function() {
            setTimeout(() => {
                clearMarkers();
                renderVenues(venueData);
                map.setCenter({
                    lat: -6.587,
                    lng: 106.803
                });
                map.setZoom(14);
                document.getElementById('floating-gor-card').style.display = 'none';
            }, 100);
        });
    }

    function showVenueDetails(venue) {
        document.getElementById('floating-gor-card').style.display = 'block';
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

        // Tampilkan fasilitas terdekat (Hotel, RS, Restoran, Polisi)
        if (map && google && google.maps && google.maps.places) {
            const latLng = new google.maps.LatLng(Number(venue.lat), Number(venue.lng));
            fetchPlaces(latLng, 'lodging', 'hotel-container', 'Hotel', 'cat-hotel');
            fetchPlaces(latLng, 'hospital', 'rs-container', 'Fasilitas Kesehatan', 'cat-rs');
            fetchPlaces(latLng, 'restaurant', 'resto-container', 'Restoran', 'cat-resto');
            fetchPlaces(latLng, 'police', 'police-container', 'Kantor Polisi', 'cat-police');
            fetchPlaces(latLng, 'pharmacy', 'apotek-container', 'Apotek', 'cat-apotek');

            // Scroll ke bagian fasilitas secara halus
            setTimeout(() => {
                const facilitiesSection = document.getElementById('facilities-section');
                if (facilitiesSection) {
                    facilitiesSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }, 300); // Sedikit delay agar view ter-update
        }
    }

    window.onload = function() {
        initMap();
    };
</script>
@endpush