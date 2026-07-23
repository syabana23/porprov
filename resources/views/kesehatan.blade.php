@extends('layouts.app')

@section('title', 'Fasilitas Kesehatan - PORPROV XV KOTA BOGOR 2026')

@push('styles')
<style>
    /* ── Stats strip ── */
    /* ── Stats strip ── */
    .stats-strip {
        background: #ffffff;
        border-bottom: 1px solid #e5e7eb;
        padding: 14px 0;
        transition: background-color 0.3s, border-color 0.3s;
    }
    html.dark .stats-strip {
        background: #1e293b;
        border-bottom: 1px solid #334155;
    }

    .stats-strip-inner {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        gap: 16px;
        padding: 0 20px;
        overflow-x: auto;
        scrollbar-width: none; /* Hide scrollbar Firefox */
    }
    .stats-strip-inner::-webkit-scrollbar {
        display: none; /* Hide scrollbar Chrome/Safari/Safari */
    }

    .ss-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 18px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        flex-shrink: 0;
    }
    html.dark .ss-item {
        background: #1e293b;
        border-color: #334155;
    }

    .ss-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        background: #f1f5f9;
        border-color: #cbd5e1;
    }
    html.dark .ss-item:hover {
        background: #334155;
        border-color: #475569;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    /* Active state styling */
    .ss-item.active {
        background: #013469;
        border-color: #013469;
    }
    html.dark .ss-item.active {
        background: #3b82f6;
        border-color: #3b82f6;
    }
    .ss-item.active .ss-num {
        color: #ffffff;
    }
    .ss-item.active .ss-lbl {
        color: rgba(255, 255, 255, 0.8);
    }
    .ss-item.active .ss-icon-wrap {
        background: rgba(255, 255, 255, 0.15) !important;
        color: #ffffff !important;
    }
    .ss-item.active .ss-icon-wrap svg {
        stroke: #ffffff !important;
    }

    /* Icon Wrappers inside items */
    .ss-icon-wrap {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all 0.2s;
    }

    /* Stats info texts */
    .ss-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .ss-num {
        font-size: 16px;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.2;
        transition: color 0.2s;
    }
    html.dark .ss-num {
        color: #f8fafc;
    }

    .ss-lbl {
        font-size: 11px;
        color: #64748b;
        font-weight: 500;
        line-height: 1.2;
        transition: color 0.2s;
    }
    html.dark .ss-lbl {
        color: #94a3b8;
    }

    /* ── Body layout ── */
    .kesehatan-body {
        max-width: 1200px;
        margin: 0 auto;
        padding: 24px 20px 40px;
        display: flex;
        gap: 24px;
    }

    /* ── Sidebar filter ── */
    .filter-sidebar {
        width: 220px;
        flex-shrink: 0;
    }

    .filter-sidebar h2 {
        font-size: 16px;
        font-weight: 800;
        color: #013469;
        margin: 0 0 16px;
    }

    .filter-group {
        margin-bottom: 16px;
    }

    .filter-label {
        font-size: 12px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 6px;
        display: block;
    }

    .filter-select-wrap {
        position: relative;
    }

    .filter-select {
        width: 100%;
        padding: 7px 28px 7px 10px;
        font-size: 12px;
        font-family: 'Poppins', sans-serif;
        border: 1px solid #d1d5db;
        border-radius: 7px;
        background: #fff;
        color: #374151;
        appearance: none;
        outline: none;
        cursor: pointer;
    }

    .filter-select-wrap::after {
        content: '▾';
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: #6b7280;
        font-size: 11px;
    }

    .btn-locate {
        width: 100%;
        background: #013469;
        color: #fff;
        border: none;
        border-radius: 7px;
        padding: 8px;
        font-size: 12px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        margin-bottom: 8px;
        transition: background 0.2s;
    }

    .btn-locate:hover {
        background: #012050;
    }

    .btn-reset {
        width: 100%;
        background: #fff;
        color: #013469;
        border: 1.5px solid #013469;
        border-radius: 7px;
        padding: 8px;
        font-size: 12px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        cursor: pointer;
        margin-bottom: 16px;
        transition: background 0.2s;
    }

    .btn-reset:hover {
        background: #f0f4fa;
    }

    .info-box {
        background: #dbeafe;
        border-radius: 10px;
        padding: 12px 14px;
        display: flex;
        gap: 10px;
        border-left: 4px solid #013469;
    }

    .info-box svg {
        flex-shrink: 0;
        color: #013469;
    }

    .info-box .ib-title {
        font-size: 12px;
        font-weight: 800;
        color: #013469;
        margin-bottom: 4px;
    }

    .info-box p {
        font-size: 10.5px;
        color: #374151;
        line-height: 1.55;
        margin: 0;
    }

    /* ── Main list ── */
    .facility-list-wrap {
        flex: 1;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        padding: 20px;
    }

    .flw-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
    }

    .flw-header h2 {
        font-size: 18px;
        font-weight: 800;
        color: #013469;
        margin: 0;
    }

    .flw-sort {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        color: #6b7280;
    }

    .flw-sort select {
        font-size: 11px;
        border: 1px solid #e5e7eb;
        border-radius: 5px;
        padding: 3px 6px;
        outline: none;
        font-family: 'Poppins', sans-serif;
    }

    .facility-item {
        display: flex;
        gap: 14px;
        padding: 14px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        margin-bottom: 12px;
        background: #fafafa;
        transition: box-shadow 0.2s;
    }

    .facility-item:hover {
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.10);
    }

    .fi-thumb {
        width: 110px;
        height: 90px;
        flex-shrink: 0;
        border-radius: 8px;
        overflow: hidden;
    }

    .fi-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .fi-details {
        flex: 1;
    }

    .fi-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .fi-left .fi-name-row {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 4px;
    }

    .fi-left .fi-name {
        font-size: 14px;
        font-weight: 800;
        color: #013469;
    }

    .fi-left .fi-badge {
        font-size: 10px;
        font-weight: 600;
        padding: 2px 8px;
        border-radius: 20px;
    }

    .badge-rs {
        background: #dcfce7;
        color: #15803d;
    }

    .badge-klinik {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .badge-apotek {
        background: #f3e8ff;
        color: #7c3aed;
    }

    .badge-apotek24 {
        background: #fce7f3;
        color: #9d174d;
    }

    .fi-addr {
        display: flex;
        align-items: flex-start;
        gap: 5px;
        font-size: 11px;
        color: #6b7280;
        margin-bottom: 3px;
    }

    .fi-phone {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        color: #6b7280;
        margin-bottom: 4px;
    }

    .fi-layanan {
        font-size: 11px;
        color: #374151;
    }

    .fi-layanan span {
        font-weight: 600;
        color: #013469;
    }

    .fi-right {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: space-between;
        flex-shrink: 0;
    }

    .fi-distance {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 16px;
        font-weight: 800;
        color: #013469;
        white-space: nowrap;
    }

    .fi-distance svg {
        color: #013469;
    }

    .btn-detail {
        background: #013469;
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        font-family: 'Poppins', sans-serif;
        padding: 6px 12px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        text-decoration: none;
        transition: background 0.2s;
        display: inline-block;
    }

    .btn-detail:hover {
        background: #012050;
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .pg-info {
        font-size: 12px;
        color: #6b7280;
    }

    .pg-btns {
        display: flex;
        gap: 4px;
    }

    .pg-btn {
        width: 30px;
        height: 30px;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        color: #374151;
        font-family: 'Poppins', sans-serif;
        transition: all 0.2s;
    }

    .pg-btn:hover {
        background: #f3f4f6;
    }

    .pg-btn.active {
        background: #013469;
        color: #fff;
        border-color: #013469;
    }

    @media (max-width: 768px) {
        .kesehatan-body {
            flex-direction: column;
            padding: 16px 16px 32px;
            gap: 16px;
        }
        .filter-sidebar {
            width: 100%;
        }
        .filter-group {
            display: flex;
            gap: 10px;
            align-items: flex-end;
        }
        .filter-group .filter-label {
            margin-bottom: 0;
            white-space: nowrap;
        }
        .filter-group .filter-select-wrap {
            flex: 1;
        }
        .facility-item {
            flex-direction: column;
            gap: 12px;
        }
        .fi-thumb {
            width: 100%;
            height: 140px;
        }
        .fi-top {
            flex-direction: column;
            gap: 10px;
        }
        .fi-right {
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        .flw-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
        .pagination {
            flex-direction: column;
            gap: 12px;
            align-items: center;
        }
        .kesehatan-banner {
            height: auto;
            min-height: 100px;
        }
        .kesehatan-banner .bg-img {
            display: none;
        }
        .kesehatan-banner::after {
            width: 100%;
        }
        .kesehatan-banner h1 {
            font-size: 18px;
        }
        .stats-strip-inner {
            gap: 10px;
            padding: 0 16px;
        }
    }
</style>
@endpush

@section('content')
<!-- Banner -->
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
            <h1>FASILITAS KESEHATAN</h1>
            <p>Informasi Fasilitas Kesehatan di Wilayah Kota Bogor</p>
        </div>
    </div>
    <div class="banner-accent-line"></div>
    <div class="banner-bottom-curve">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,20 1200,60 L1200,120 L0,120 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</section>

<!-- Stats Strip -->
<div class="stats-strip">
    <div class="stats-strip-inner">
        <div class="ss-item active" data-type="all">
            <div class="ss-icon-wrap" style="background: rgba(1, 52, 105, 0.08); color: #013469;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">415</div>
                <div class="ss-lbl">Semua Fasilitas</div>
            </div>
        </div>
        <div class="ss-item" data-type="rs">
            <div class="ss-icon-wrap" style="background: rgba(239, 68, 68, 0.08); color: #e53e3e;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">22</div>
                <div class="ss-lbl">Rumah Sakit</div>
            </div>
        </div>
        <div class="ss-item" data-type="klinik">
            <div class="ss-icon-wrap" style="background: rgba(59, 130, 246, 0.08); color: #3b82f6;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16M9 7h6M9 11h6M9 15h6" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">154</div>
                <div class="ss-lbl">Klinik</div>
            </div>
        </div>
        <div class="ss-item" data-type="lab">
            <div class="ss-icon-wrap" style="background: rgba(139, 92, 246, 0.08); color: #8b5cf6;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">10</div>
                <div class="ss-lbl">Laboratorium</div>
            </div>
        </div>
        <div class="ss-item" data-type="apotek">
            <div class="ss-icon-wrap" style="background: rgba(236, 72, 153, 0.08); color: #ec4899;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10M12 14v4m-2-2h4" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">164</div>
                <div class="ss-lbl">Apotek</div>
            </div>
        </div>
        <div class="ss-item" data-type="other">
            <div class="ss-icon-wrap" style="background: rgba(107, 114, 128, 0.08); color: #6b7280;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">65</div>
                <div class="ss-lbl">Lainnya</div>
            </div>
        </div>
    </div>
</div>

<!-- Body -->
<div class="kesehatan-body">
    <!-- Filter Sidebar -->
    <div class="filter-sidebar">
        <h2>Filter Pencarian</h2>

        <div class="filter-group">
            <label class="filter-label">Jenis Fasilitas</label>
            <div class="filter-select-wrap">
                <select class="filter-select">
                    <option>Semua Jenis</option>
                    <option>Rumah Sakit</option>
                    <option>Klinik</option>
                    <option>Apotek</option>
                    <option>Laboratorium</option>
                </select>
            </div>
        </div>

        <div class="filter-group">
            <label class="filter-label">Lokasi</label>
            <div class="filter-select-wrap">
                <select class="filter-select">
                    <option>Semua Wilayah</option>
                    <option>Bogor Tengah</option>
                    <option>Bogor Utara</option>
                    <option>Bogor Selatan</option>
                    <option>Bogor Barat</option>
                    <option>Bogor Timur</option>
                </select>
            </div>
        </div>

        <div class="filter-group">
            <label class="filter-label">Jarak</label>
            <div class="filter-select-wrap">
                <select class="filter-select">
                    <option>Semua Jarak</option>
                    <option>&lt; 2 km</option>
                    <option>&lt; 5 km</option>
                    <option>&lt; 10 km</option>
                </select>
            </div>
        </div>

        <button class="btn-locate">
            <svg width="14" height="14" fill="none" stroke="#fff" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            </svg>
            Gunakan Lokasi Saya
        </button>
        <button class="btn-reset">Reset Filter</button>

        <div class="info-box">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <div class="ib-title">▸ INFORMASI</div>
                <p>Fasilitas kesehatan ini siap mendukung kebutuhan medis selama pelaksanaan PORPROV XV Kota Bogor 2026</p>
            </div>
        </div>
    </div>

    <!-- Facility List -->
    <div class="facility-list-wrap">
        <div class="flw-header">
            <h2>Daftar Fasilitas Kesehatan</h2>
            <div class="flw-sort">
                Urutkan:
                <select>
                    <option>Terdekat</option>
                    <option>Nama A-Z</option>
                </select>
            </div>
        </div>

        <!-- Item 1 -->
        <div class="facility-item">
            <div class="fi-thumb">
                <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=200&h=160&q=80" alt="RS PMI">
            </div>
            <div class="fi-details">
                <div class="fi-top">
                    <div class="fi-left">
                        <div class="fi-name-row">
                            <span class="fi-name">RS PMI Bogor</span>
                            <span class="fi-badge badge-rs">✓ Aktif</span>
                            <span class="fi-badge badge-rs">Rumah Sakit</span>
                        </div>
                        <div class="fi-addr">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:1px">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            Jl. Raya Pajajaran No.90
                        </div>
                        <div class="fi-phone">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            (0251) 833 455
                        </div>
                        <div class="fi-layanan">Layanan: <span>IGD 24 jam, Rawat Inap</span></div>
                    </div>
                    <div class="fi-right">
                        <div class="fi-distance">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            2.1 km
                        </div>
                        <a href="#" class="btn-detail">Lihat Detail &gt;</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="facility-item">
            <div class="fi-thumb">
                <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=200&h=160&q=80" alt="RS Azra">
            </div>
            <div class="fi-details">
                <div class="fi-top">
                    <div class="fi-left">
                        <div class="fi-name-row">
                            <span class="fi-name">RS Azra Bogor</span>
                            <span class="fi-badge badge-rs">✓ Aktif</span>
                            <span class="fi-badge badge-rs">Rumah Sakit</span>
                        </div>
                        <div class="fi-addr">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:1px">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            Jl. Pajajaran No.219
                        </div>
                        <div class="fi-phone">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            (0251) 831 845
                        </div>
                        <div class="fi-layanan">Layanan: <span>IGD 24 jam, Rawat Inap</span></div>
                    </div>
                    <div class="fi-right">
                        <div class="fi-distance">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            2.6 km
                        </div>
                        <a href="#" class="btn-detail">Lihat Detail &gt;</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="facility-item">
            <div class="fi-thumb">
                <img src="https://images.unsplash.com/photo-1587370560942-ad2a04eabb6d?auto=format&fit=crop&w=200&h=160&q=80" alt="Apotek">
            </div>
            <div class="fi-details">
                <div class="fi-top">
                    <div class="fi-left">
                        <div class="fi-name-row">
                            <span class="fi-name">Apotek Kimia Farma</span>
                            <span class="fi-badge badge-apotek24">Apotek 24 Jam</span>
                        </div>
                        <div class="fi-addr">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:1px">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            Jl. Raya Pajajaran No.90
                        </div>
                        <div class="fi-phone">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            (0251) 832 114
                        </div>
                        <div class="fi-layanan">Layanan: <span>Obat Resep, Obat Bebas, Alat Kesehatan</span></div>
                    </div>
                    <div class="fi-right">
                        <div class="fi-distance">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            1.8 km
                        </div>
                        <a href="#" class="btn-detail">Lihat Detail &gt;</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <span class="pg-info">Menampilkan 1-3 dari 60 Fasilitas</span>
            <div class="pg-btns">
                <button class="pg-btn">&lt;</button>
                <button class="pg-btn active">1</button>
                <button class="pg-btn">2</button>
                <button class="pg-btn" style="border:none;background:none;cursor:default;">...</button>
                <button class="pg-btn">3</button>
                <button class="pg-btn">&gt;</button>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const selectEl = document.querySelector('.filter-select');
    const ssItems = document.querySelectorAll('.ss-item');

    ssItems.forEach(item => {
        item.addEventListener('click', () => {
            ssItems.forEach(i => i.classList.remove('active'));
            item.classList.add('active');

            const type = item.getAttribute('data-type');
            if (selectEl) {
                if (type === 'all') selectEl.value = 'Semua Jenis';
                else if (type === 'rs') selectEl.value = 'Rumah Sakit';
                else if (type === 'klinik') selectEl.value = 'Klinik';
                else if (type === 'apotek') selectEl.value = 'Apotek';
                else if (type === 'lab') selectEl.value = 'Laboratorium';
                
                // Dispatch change event to trigger filter logic if any exists
                selectEl.dispatchEvent(new Event('change'));
            }
        });
    });
});
</script>
@endpush
@endsection