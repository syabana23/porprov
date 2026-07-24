@extends('layouts.app')

@section('title', 'Jadwal - PORPROV XV KOTA BOGOR 2026')

{{-- ═══════════════════════════════════════════════════════════════════ --}}
{{-- ║  JADWAL & VENUE PERTANDINGAN — PORPROV XV KOTA BOGOR 2026       ║ --}}
{{-- ║  File : resources/views/jadwal.blade.php                        ║ --}}
{{-- ═══════════════════════════════════════════════════════════════════ --}}

@push('styles')
<style>
    /* ================================================================
       PAGE LAYOUT
       ================================================================ */
    .jadwal-page {
        max-width: 1200px;
        margin: 0 auto;
        padding: 24px 20px 40px;
    }

    /* ================================================================
       TABLE — Sticky Header + Sticky Columns + Zebra Striping
       ================================================================ */
    .jadwal-table-wrap {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.09);
        overflow: auto;
        margin-bottom: 28px;
        position: relative;
        max-height: 75vh;
        -webkit-overflow-scrolling: touch;
    }

    /* Scroll shadow indicator on right edge */
    .jadwal-table-wrap::after {
        content: '';
        position: sticky;
        right: 0;
        top: 0;
        bottom: 0;
        width: 24px;
        pointer-events: none;
        background: linear-gradient(to left, rgba(0, 0, 0, 0.06), transparent);
        z-index: 3;
        display: block;
        float: right;
        height: 100%;
    }

    .jadwal-table-wrap.scrolled-right::after {
        display: none;
    }

    .jadwal-tbl {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        font-size: 12px;
        min-width: 850px;
    }

    /* ── Sticky Header ── */
    .jadwal-tbl thead {
        background: #013469;
        color: #fff;
        position: sticky;
        top: 0;
        z-index: 12;
    }

    .jadwal-tbl thead th {
        padding: 10px 12px;
        text-align: left;
        font-weight: 600;
        font-size: 11.5px;
        border-right: 1px solid rgba(255, 255, 255, 0.15);
        border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        white-space: nowrap;
        background: #013469;
    }

    .jadwal-tbl thead th.date-col {
        text-align: center;
        font-size: 10px;
        padding: 6px 6px;
        min-width: 44px;
    }

    .jadwal-tbl thead .month-header th {
        background: #014590;
        font-size: 10px;
        text-align: center;
        letter-spacing: 0.04em;
    }

    /* ── Sticky Columns (No + Cabang Olahraga) ── */
    .jadwal-tbl thead tr:first-child th:nth-child(1) {
        position: sticky;
        left: 0;
        z-index: 14;
        background: #013469;
    }

    .jadwal-tbl thead tr:first-child th:nth-child(2) {
        position: sticky;
        left: 36px;
        z-index: 14;
        background: #013469;
    }

    .jadwal-tbl tbody td.no {
        position: sticky;
        left: 0;
        z-index: 5;
        background: #fff;
        text-align: center;
        font-weight: 700;
        color: #013469;
    }

    .jadwal-tbl tbody td.sport {
        position: sticky;
        left: 36px;
        z-index: 5;
        background: #fff;
        min-width: 160px;
    }

    /* Shadow on sticky column edge */
    .jadwal-tbl tbody td.sport::after {
        content: '';
        position: absolute;
        right: -6px;
        top: 0;
        bottom: 0;
        width: 6px;
        background: linear-gradient(to right, rgba(0, 0, 0, 0.04), transparent);
        pointer-events: none;
    }

    .jadwal-tbl thead tr:first-child th:nth-child(2)::after {
        content: '';
        position: absolute;
        right: -6px;
        top: 0;
        bottom: 0;
        width: 6px;
        background: linear-gradient(to right, rgba(0, 0, 0, 0.08), transparent);
        pointer-events: none;
    }

    /* ── Zebra Striping ── */
    .jadwal-tbl tbody tr:nth-child(even) td {
        background-color: #f8fafc;
    }

    .jadwal-tbl tbody tr:nth-child(even) td.no,
    .jadwal-tbl tbody tr:nth-child(even) td.sport {
        background-color: #f8fafc;
    }

    .jadwal-tbl tbody tr {
        border-bottom: 1px solid #e5e7eb;
        transition: background 0.15s;
    }

    .jadwal-tbl tbody tr:hover td {
        background-color: #eff6ff !important;
    }

    .jadwal-tbl tbody td {
        padding: 9px 12px;
        color: #374151;
        font-size: 12px;
        border-right: 1px solid #e5e7eb;
        border-bottom: 1px solid #e5e7eb;
    }

    .jadwal-tbl tbody td.sport,
    .jadwal-tbl tbody td.venue {
        font-weight: 600;
        color: #013469;
        cursor: pointer;
        transition: color 0.2s;
    }

    .jadwal-tbl tbody td.sport:hover,
    .jadwal-tbl tbody td.venue:hover {
        text-decoration: underline;
        color: #FDB813;
    }

    .jadwal-tbl tbody td.venue {
        max-width: 180px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .jadwal-tbl tbody td.durasi {
        text-align: center;
        font-weight: 600;
        white-space: nowrap;
    }

    .jadwal-tbl tbody td.day-cell {
        padding: 0;
        height: 36px;
        min-width: 38px;
    }

    .day-prep {
        background: #60a5fa;
        width: 100%;
        height: 100%;
        display: block;
    }

    .day-exec {
        background: #fb923c;
        width: 100%;
        height: 100%;
        display: block;
    }

    .day-final {
        background: #c084fc;
        width: 100%;
        height: 100%;
        display: block;
    }

    .day-empty {
        width: 100%;
        height: 100%;
        display: block;
    }

    /* ================================================================
       MOBILE TABLE COMPACT (≤640px)
       ================================================================ */
    @media (max-width: 640px) {
        .jadwal-table-wrap {
            max-height: none;
            border-radius: 8px;
        }

        .jadwal-tbl {
            min-width: 900px;
            font-size: 10px;
        }

        .jadwal-tbl thead th {
            padding: 6px 6px;
            font-size: 10px;
        }

        .jadwal-tbl thead th.date-col {
            padding: 4px 3px;
            font-size: 8px;
            min-width: 28px;
        }

        .jadwal-tbl tbody td {
            padding: 6px 6px;
            font-size: 10px;
        }

        .jadwal-tbl tbody td.sport {
            left: 32px;
            min-width: 110px;
            font-size: 10px;
        }

        .jadwal-tbl tbody td.sport::after {
            display: none;
        }

        .jadwal-tbl thead tr:first-child th:nth-child(2):after {
            display: none;
        }

        .jadwal-tbl tbody td.venue {
            max-width: 100px;
            font-size: 10px;
        }

        .jadwal-tbl tbody td.durasi {
            font-size: 10px;
        }

        .jadwal-tbl tbody td.day-cell {
            height: 28px;
            min-width: 26px;
        }

        .table-info-bar {
            flex-direction: column;
            align-items: flex-start;
            gap: 4px;
        }

        .scroll-hint {
            display: none;
        }
    }

    /* ================================================================
       TABLET COMPACT VIEW (641px – 1024px)
       ================================================================ */
    @media (min-width: 641px) and (max-width: 1024px) {
        .jadwal-table-wrap {
            max-height: 70vh;
        }

        .jadwal-tbl {
            min-width: 1100px;
        }

        .jadwal-tbl thead th.date-col {
            padding: 5px 4px;
            font-size: 9px;
            min-width: 38px;
        }

        .jadwal-tbl tbody td {
            padding: 7px 8px;
            font-size: 11px;
        }
    }

    /* ================================================================
       TABLE INFO BAR
       ================================================================ */
    .table-info-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        padding: 0 4px;
    }

    .table-count {
        font-size: 12px;
        color: #64748b;
    }

    .table-count strong {
        color: #013469;
        font-weight: 700;
    }

    .scroll-hint {
        display: none;
        align-items: center;
        gap: 4px;
        font-size: 11px;
        color: #94a3b8;
        animation: pulseHint 2s ease-in-out infinite;
    }

    @keyframes pulseHint {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }

    @media (max-width: 1024px) {
        .scroll-hint { display: flex; }
    }

    @media (max-width: 640px) {
        .table-info-bar {
            flex-direction: column;
            align-items: flex-start;
            gap: 4px;
            margin-bottom: 12px;
        }
        .scroll-hint { display: none; }
    }

    /* ================================================================
       BOTTOM LAYOUT
       ================================================================ */
    .jadwal-bottom {
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
    }

    /* ================================================================
       LEGEND
       ================================================================ */
    .legend-box {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        padding: 20px;
        min-width: 240px;
        flex: 0 0 auto;
    }

    .legend-box h3 {
        font-size: 14px;
        font-weight: 800;
        color: #013469;
        margin: 0 0 16px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 14px;
    }

    .legend-dot {
        width: 42px;
        height: 22px;
        border-radius: 50px;
        flex-shrink: 0;
    }

    .legend-dot.prep { background: #60a5fa; }
    .legend-dot.exec { background: #fb923c; }
    .legend-dot.final { background: #c084fc; }

    .legend-item span {
        font-size: 11.5px;
        color: #374151;
        font-weight: 500;
        line-height: 1.4;
    }

    .legend-note {
        background: #f3f4f6;
        border-radius: 8px;
        padding: 10px 12px;
        display: flex;
        gap: 8px;
        margin-top: 16px;
    }

    .legend-note svg {
        flex-shrink: 0;
        color: #6b7280;
    }

    .legend-note p {
        font-size: 10.5px;
        color: #6b7280;
        margin: 0;
        line-height: 1.5;
    }

    /* ================================================================
       DAY PICKER + DOWNLOAD
       ================================================================ */
    .day-picker-wrap {
        flex: 1;
    }

    .day-picker-wrap h4 {
        font-size: 13px;
        font-weight: 700;
        color: #374151;
        margin: 0 0 12px;
    }

    .day-picker {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    .day-btn {
        width: 52px;
        height: 60px;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
    }

    .day-btn:hover,
    .day-btn.active {
        background: #013469;
        border-color: #013469;
        color: #fff;
    }

    .day-btn .num {
        font-size: 18px;
        font-weight: 800;
        line-height: 1;
    }

    .day-btn .mon {
        font-size: 10px;
        font-weight: 500;
        text-transform: uppercase;
    }

    .download-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #013469;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
        font-weight: 700;
        padding: 14px 32px;
        border-radius: 10px;
        text-decoration: none;
        box-shadow: 0 4px 14px rgba(1, 52, 105, 0.25);
        transition: background 0.2s;
    }

    .download-btn:hover {
        background: #012050;
    }

    @media (max-width: 768px) {
        .jadwal-page {
            padding: 16px 16px 32px;
        }

        .jadwal-bottom {
            flex-direction: column;
            gap: 16px;
        }

        .legend-box {
            min-width: auto;
            width: 100%;
        }

        .day-picker-wrap {
            width: 100%;
        }

        .day-btn {
            width: 44px;
            height: 52px;
        }

        .day-btn .num { font-size: 15px; }

        .download-btn {
            width: 100%;
            justify-content: center;
            font-size: 14px;
            padding: 12px 24px;
        }
    }

    /* ================================================================
       FILTER
       ================================================================ */
    .jadwal-filter {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 24px;
        background: #fff;
        padding: 16px;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
    }

    .filter-box {
        flex: 1;
        min-width: 200px;
        display: flex;
        align-items: center;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 0 16px;
        transition: all 0.2s;
    }

    .filter-box:focus-within {
        border-color: #013469;
        box-shadow: 0 0 0 3px rgba(1, 52, 105, 0.1);
    }

    .filter-box svg {
        color: #64748b;
        flex-shrink: 0;
        margin-right: 12px;
    }

    .filter-box input,
    .filter-box select {
        width: 100%;
        background: transparent;
        border: none;
        padding: 12px 0;
        font-family: inherit;
        font-size: 14px;
        color: #1e293b;
        outline: none;
        cursor: pointer;
    }

    .filter-box input[type="text"] {
        cursor: text;
    }

    /* Agar icon kalender bawaan browser tidak menempel */
    .filter-box input[type="date"] {
        padding-right: 8px;
    }

    .reset-filter-btn {
        background: #f1f5f9;
        color: #475569;
        border: none;
        padding: 0 24px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .reset-filter-btn:hover {
        background: #e2e8f0;
        color: #0f172a;
    }

    .filter-box input::placeholder {
        color: #94a3b8;
    }

    /* ── Filter Mobile (≤640px) ── */
    @media (max-width: 640px) {
        .jadwal-filter {
            flex-direction: column;
            gap: 10px;
            padding: 14px;
        }

        .filter-box {
            min-width: 0;
            width: 100%;
            flex: none;
        }

        .reset-filter-btn {
            width: 100%;
            padding: 11px 0;
            text-align: center;
        }
    }

    /* ================================================================
       MODAL VENUE & FASILITAS
       ================================================================ */
    .venue-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(4px);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .venue-modal-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .venue-modal-content {
        background: #fff;
        width: 90%;
        max-width: 600px;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        transform: translateY(20px) scale(0.95);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        overflow: hidden;
        position: relative;
    }

    .venue-modal-overlay.active .venue-modal-content {
        transform: translateY(0) scale(1);
    }

    .venue-modal-close {
        position: absolute;
        top: 16px;
        right: 16px;
        background: rgba(255, 255, 255, 0.2);
        border: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        font-size: 20px;
        line-height: 1;
        color: #fff;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .venue-modal-close:hover {
        background: rgba(255, 255, 255, 0.4);
        transform: rotate(90deg);
    }

    .venue-modal-header {
        background: linear-gradient(135deg, #013469 0%, #014590 100%);
        padding: 24px;
        color: #fff;
    }

    .venue-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 12px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .venue-modal-header h2 {
        margin: 0 0 4px;
        font-size: 22px;
        font-weight: 800;
    }

    .venue-modal-header p {
        margin: 0;
        color: #cbd5e1;
        font-size: 14px;
    }

    .venue-modal-body {
        padding: 24px;
        max-height: 70vh;
        overflow-y: auto;
    }

    .venue-section {
        margin-bottom: 24px;
    }

    .venue-section:last-child {
        margin-bottom: 0;
    }

    .venue-section h3 {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 16px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 16px;
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 8px;
    }

    .venue-section h3 svg {
        color: #FDB813;
    }

    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 16px;
    }

    .hotel-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 16px;
        transition: all 0.2s;
    }

    .hotel-card:hover {
        border-color: #cbd5e1;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transform: translateY(-2px);
    }

    .hotel-card h4 {
        margin: 0 0 8px;
        font-size: 14px;
        font-weight: 700;
        color: #1e293b;
    }

    .hotel-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 12px;
        color: #64748b;
    }

    .hotel-rating {
        display: flex;
        align-items: center;
        gap: 4px;
        color: #eab308;
        font-weight: 600;
    }

    .facilities-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 12px;
    }

    .facility-item {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #f8fafc;
        padding: 12px 16px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 500;
        color: #334155;
    }

    .facility-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: #e0e7ff;
        color: #4f46e5;
        display: flex;
        align-items: center;
        justify-content: center;
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
            <h1>JADWAL & VENUE PERTANDINGAN</h1>
            <p>Informasi terkini seputar PORPROV XV Kota Bogor 2026</p>
        </div>
    </div>
    <div class="banner-accent-line"></div>
    <div class="banner-bottom-curve">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,20 1200,60 L1200,120 L0,120 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</section>

<div class="jadwal-page">
    <!-- Filter Section -->
    <div class="jadwal-filter">
        <!-- Pencarian -->
        <div class="filter-box">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input type="text" id="searchFilter" placeholder="Cari cabang olahraga atau venue...">
        </div>
        
        <!-- Kalender Date Picker -->
        <div class="filter-box" style="flex: 1.5;">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <input type="date" id="datePickerFilter" min="2026-10-31" max="2026-11-20" title="Pilih Tanggal Pertandingan">
        </div>
        
        <button class="reset-filter-btn" id="resetFilterBtn">Reset</button>
    </div>

    <!-- ── Table Info Bar ── -->
    <div class="table-info-bar">
        <span class="table-count" id="tableCount">Menampilkan <strong>28</strong> dari 28 cabang olahraga</span>
        <span class="scroll-hint" id="scrollHint">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            Geser tabel ke kanan untuk melihat tanggal
        </span>
    </div>

    <!-- ── Table ── -->
    <div class="jadwal-table-wrap" id="jadwalTableWrap">
        <table class="jadwal-tbl">
            <thead>
                <tr>
                    <th rowspan="2" style="width:36px">No</th>
                    <th rowspan="2">Cabang Olahraga</th>
                    <th rowspan="2">Venue</th>
                    <th rowspan="2" style="width:54px;text-align:center">Durasi</th>
                    <th colspan="1" style="background:#014590;text-align:center">Oktober</th>
                    <th colspan="20" style="background:#014590;text-align:center">November 2026</th>
                </tr>
                <tr class="month-header">
                    <th class="date-col">31<br>Sabtu</th>
                    <th class="date-col">1<br>Minggu</th>
                    <th class="date-col">2<br>Senin</th>
                    <th class="date-col">3<br>Selasa</th>
                    <th class="date-col">4<br>Rabu</th>
                    <th class="date-col">5<br>Kamis</th>
                    <th class="date-col">6<br>Jumat</th>
                    <th class="date-col">7<br>Sabtu</th>
                    <th class="date-col">8<br>Minggu</th>
                    <th class="date-col">9<br>Senin</th>
                    <th class="date-col">10<br>Selasa</th>
                    <th class="date-col">11<br>Rabu</th>
                    <th class="date-col">12<br>Kamis</th>
                    <th class="date-col">13<br>Jumat</th>
                    <th class="date-col">14<br>Sabtu</th>
                    <th class="date-col">15<br>Minggu</th>
                    <th class="date-col">16<br>Senin</th>
                    <th class="date-col">17<br>Selasa</th>
                    <th class="date-col">18<br>Rabu</th>
                    <th class="date-col">19<br>Kamis</th>
                    <th class="date-col">20<br>Jumat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="no">1</td>
                    <td class="sport" data-sport="Aerosport - Gantolle" data-venue="Majalengka">Aerosport - Gantolle</td>
                    <td class="venue" data-sport="Aerosport - Gantolle" data-venue="Majalengka">Majalengka</td>
                    <td class="durasi">13</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">2</td>
                    <td class="sport" data-sport="Aerosport - Paralayang" data-venue="Gunung Mas">Aerosport - Paralayang</td>
                    <td class="venue" data-sport="Aerosport - Paralayang" data-venue="Gunung Mas">Gunung Mas</td>
                    <td class="durasi">14</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">3</td>
                    <td class="sport" data-sport="Anggar" data-venue="Green Forest Hotel">Anggar</td>
                    <td class="venue" data-sport="Anggar" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">9</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">4</td>
                    <td class="sport" data-sport="Angkat Berat" data-venue="Green Forest Hotel">Angkat Berat</td>
                    <td class="venue" data-sport="Angkat Berat" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">7</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">5</td>
                    <td class="sport" data-sport="Angkat Besi" data-venue="Green Forest Hotel">Angkat Besi</td>
                    <td class="venue" data-sport="Angkat Besi" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">7</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">6</td>
                    <td class="sport" data-sport="Arung Jeram" data-venue="Green Forest Hotel">Arung Jeram</td>
                    <td class="venue" data-sport="Arung Jeram" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">12</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">7</td>
                    <td class="sport" data-sport="Binaraga" data-venue="Green Forest Hotel">Binaraga</td>
                    <td class="venue" data-sport="Binaraga" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">5</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                </tr>
                <tr>
                    <td class="no">8</td>
                    <td class="sport" data-sport="Bola Tangan Indoor" data-venue="PPSDMAP Kemenhub Kemang">Bola Tangan Indoor</td>
                    <td class="venue" data-sport="Bola Tangan Indoor" data-venue="PPSDMAP Kemenhub Kemang">PPSDMAP Kemenhub Kemang</td>
                    <td class="durasi">9</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">9</td>
                    <td class="sport" data-sport="Bola Tangan Pasir" data-venue="Padepokan Voli Sentul">Bola Tangan Pasir</td>
                    <td class="venue" data-sport="Bola Tangan Pasir" data-venue="Padepokan Voli Sentul">Padepokan Voli Sentul</td>
                    <td class="durasi">7</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                </tr>
                <tr>
                    <td class="no">10</td>
                    <td class="sport" data-sport="Dansa" data-venue="Green Forest Hotel">Dansa</td>
                    <td class="venue" data-sport="Dansa" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">6</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">11</td>
                    <td class="sport" data-sport="Drumband" data-venue="Indoor A GOR Pajajaran">Drumband</td>
                    <td class="venue" data-sport="Drumband" data-venue="Indoor A GOR Pajajaran">Indoor A GOR Pajajaran</td>
                    <td class="durasi">10</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">12</td>
                    <td class="sport" data-sport="Gimnastik Aerobik" data-venue="Arcamanik">Gimnastik Aerobik</td>
                    <td class="venue" data-sport="Gimnastik Aerobik" data-venue="Arcamanik">Arcamanik</td>
                    <td class="durasi">5</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">13</td>
                    <td class="sport" data-sport="Gimnastik Artistik" data-venue="Arcamanik">Gimnastik Artistik</td>
                    <td class="venue" data-sport="Gimnastik Artistik" data-venue="Arcamanik">Arcamanik</td>
                    <td class="durasi">6</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">14</td>
                    <td class="sport" data-sport="Gimnastik Ritmik" data-venue="Arcamanik">Gimnastik Ritmik</td>
                    <td class="venue" data-sport="Gimnastik Ritmik" data-venue="Arcamanik">Arcamanik</td>
                    <td class="durasi">6</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">15</td>
                    <td class="sport" data-sport="Judo" data-venue="Indoor B GOR Pajajaran">Judo</td>
                    <td class="venue" data-sport="Judo" data-venue="Indoor B GOR Pajajaran">Indoor B GOR Pajajaran</td>
                    <td class="durasi">8</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">16</td>
                    <td class="sport" data-sport="Kurash" data-venue="Indoor B GOR Pajajaran">Kurash</td>
                    <td class="venue" data-sport="Kurash" data-venue="Indoor B GOR Pajajaran">Indoor B GOR Pajajaran</td>
                    <td class="durasi">6</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">17</td>
                    <td class="sport" data-sport="Menembak" data-venue="Cisangkan">Menembak</td>
                    <td class="venue" data-sport="Menembak" data-venue="Cisangkan">Cisangkan</td>
                    <td class="durasi">11</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">18</td>
                    <td class="sport" data-sport="Modern Pentathlon" data-venue="Stadion Pajajaran">Modern Pentathlon</td>
                    <td class="venue" data-sport="Modern Pentathlon" data-venue="Stadion Pajajaran">Stadion Pajajaran</td>
                    <td class="durasi">11</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                </tr>
                <tr>
                    <td class="no">19</td>
                    <td class="sport" data-sport="Panahan" data-venue="Stadion Pajajaran">Panahan</td>
                    <td class="venue" data-sport="Panahan" data-venue="Stadion Pajajaran">Stadion Pajajaran</td>
                    <td class="durasi">12</td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">20</td>
                    <td class="sport" data-sport="Panjat Tebing" data-venue="Stadion Pajajaran">Panjat Tebing</td>
                    <td class="venue" data-sport="Panjat Tebing" data-venue="Stadion Pajajaran">Stadion Pajajaran</td>
                    <td class="durasi">15</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">21</td>
                    <td class="sport" data-sport="Pencak Silat" data-venue="Indoor A GOR Pajajaran">Pencak Silat</td>
                    <td class="venue" data-sport="Pencak Silat" data-venue="Indoor A GOR Pajajaran">Indoor A GOR Pajajaran</td>
                    <td class="durasi">8</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">22</td>
                    <td class="sport" data-sport="Petanque" data-venue="Green Forest Hotel">Petanque</td>
                    <td class="venue" data-sport="Petanque" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">9</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">23</td>
                    <td class="sport" data-sport="Sambo" data-venue="Indoor B GOR Pajajaran">Sambo</td>
                    <td class="venue" data-sport="Sambo" data-venue="Indoor B GOR Pajajaran">Indoor B GOR Pajajaran</td>
                    <td class="durasi">7</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">24</td>
                    <td class="sport" data-sport="Shorinji Kempo" data-venue="GOR Fokasi IPB">Shorinji Kempo</td>
                    <td class="venue" data-sport="Shorinji Kempo" data-venue="GOR Fokasi IPB">GOR Fokasi IPB</td>
                    <td class="durasi">7</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">25</td>
                    <td class="sport" data-sport="Ski Air" data-venue="Kota Baru Parahyangan">Ski Air</td>
                    <td class="venue" data-sport="Ski Air" data-venue="Kota Baru Parahyangan">Kota Baru Parahyangan</td>
                    <td class="durasi">9</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">26</td>
                    <td class="sport" data-sport="Taekwondo" data-venue="Indoor A GOR Pajajaran">Taekwondo</td>
                    <td class="venue" data-sport="Taekwondo" data-venue="Indoor A GOR Pajajaran">Indoor A GOR Pajajaran</td>
                    <td class="durasi">9</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">27</td>
                    <td class="sport" data-sport="Tarung Derajat" data-venue="GOR Fokasi IPB">Tarung Derajat</td>
                    <td class="venue" data-sport="Tarung Derajat" data-venue="GOR Fokasi IPB">GOR Fokasi IPB</td>
                    <td class="durasi">8</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                </tr>
                <tr>
                    <td class="no">28</td>
                    <td class="sport" data-sport="Tenis Meja" data-venue="GOR Yasmin">Tenis Meja</td>
                    <td class="venue" data-sport="Tenis Meja" data-venue="GOR Yasmin">GOR Yasmin</td>
                    <td class="durasi">12</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bottom: Legend + Day Picker + Download -->
    <div class="jadwal-bottom">
        <!-- Legend -->
        <div class="legend-box">
            <h3>KETERANGAN</h3>
            <div class="legend-item">
                <div class="legend-dot prep"></div>
                <span>Persiapan / Awal<br>Pertandingan</span>
            </div>
            <div class="legend-item">
                <div class="legend-dot exec"></div>
                <span>Pelaksanaan<br>Pertandingan</span>
            </div>
            <div class="legend-item">
                <div class="legend-dot final"></div>
                <span>Final / Penutupan<br>Pertandingan</span>
            </div>
            <div class="legend-note">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p>Klik pada nama cabang olahraga atau venue untuk melihat detail jadwal pertandingan.</p>
            </div>
        </div>

        <!-- Day Picker + Download -->
        <div class="day-picker-wrap">
            <h4>Pilih Hari ↑</h4>
            <div class="day-picker">
                <button class="day-btn"><span class="num">31</span><span class="mon">Okt</span></button>
                <button class="day-btn"><span class="num">1</span><span class="mon">Nov</span></button>
                <button class="day-btn"><span class="num">2</span><span class="mon">Nov</span></button>
                <button class="day-btn"><span class="num">3</span><span class="mon">Nov</span></button>
                <button class="day-btn"><span class="num">4</span><span class="mon">Nov</span></button>
                <button class="day-btn"><span class="num">5</span><span class="mon">Nov</span></button>
                <button class="day-btn"><span class="num">6</span><span class="mon">Nov</span></button>
                <button class="day-btn"><span class="num">7</span><span class="mon">Nov</span></button>
                <button class="day-btn"><span class="num">8</span><span class="mon">Nov</span></button>
                <button class="day-btn"><span class="num">9</span><span class="mon">Nov</span></button>
                <button class="day-btn"><span class="num">10</span><span class="mon">Nov</span></button>
                <button class="day-btn"><span class="num">11</span><span class="mon">Nov</span></button>
            </div>
            <a href="#" class="download-btn">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Unduh Jadwal
            </a>
        </div>
    </div>
</div>

<!-- Modal Fasilitas / Venue -->
<div id="venueModal" class="venue-modal-overlay">
    <div class="venue-modal-content">
        <button class="venue-modal-close" id="closeModalBtn">&times;</button>
        <div class="venue-modal-header">
            <span class="venue-badge">Informasi Venue & Fasilitas</span>
            <h2 id="modalVenueName">Nama Venue</h2>
            <p id="modalSportName">Cabang Olahraga: -</p>
        </div>
        <div class="venue-modal-body">
            <div class="venue-section">
                <h3>
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Hotel & Penginapan Terdekat
                </h3>
                <div class="cards-grid" id="modalHotels">
                    <!-- Hotels will be injected here -->
                </div>
            </div>

            <div class="venue-section">
                <h3>
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Fasilitas Pendukung
                </h3>
                <ul class="facilities-list" id="modalFacilities">
                    <!-- Facilities will be injected here -->
                </ul>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    /* ================================================================
       FILTERING LOGIC — Filter by search and date picker
       ================================================================ */
    const searchFilter = document.getElementById('searchFilter');
    const datePickerFilter = document.getElementById('datePickerFilter');
    const resetFilterBtn = document.getElementById('resetFilterBtn');
    const tableRows = document.querySelectorAll('.jadwal-tbl tbody tr');
    const dayBtns = document.querySelectorAll('.day-btn');
    const tableCount = document.getElementById('tableCount');
    const totalCount = tableRows.length;

    // Pemetaan tanggal ke index kolom (Berdasarkan urutan dari HTML tabel)
    const dateToIndexMap = {
        '2026-10-31': 4,
        '2026-11-01': 5,
        '2026-11-02': 6,
        '2026-11-03': 7,
        '2026-11-04': 8,
        '2026-11-05': 9,
        '2026-11-06': 10,
        '2026-11-07': 11,
        '2026-11-08': 12,
        '2026-11-09': 13,
        '2026-11-10': 14,
        '2026-11-11': 15,
        '2026-11-12': 16,
        '2026-11-13': 17,
        '2026-11-14': 18,
        '2026-11-15': 19,
        '2026-11-16': 20,
        '2026-11-17': 21,
        '2026-11-18': 22,
        '2026-11-19': 23,
        '2026-11-20': 24
    };

    function updateCount(visible) {
        tableCount.innerHTML = visible === totalCount
            ? 'Menampilkan <strong>' + totalCount + '</strong> dari ' + totalCount + ' cabang olahraga'
            : 'Menampilkan <strong>' + visible + '</strong> dari ' + totalCount + ' cabang olahraga';
    }

    function filterTable() {
        const searchTerm = searchFilter.value.toLowerCase();
        const selectedDate = datePickerFilter.value; // Format: "YYYY-MM-DD"
        let visibleCount = 0;

        tableRows.forEach(row => {
            const sport = row.querySelector('.sport').textContent.toLowerCase();
            const venue = row.querySelector('.venue').textContent.toLowerCase();
            const textMatch = sport.includes(searchTerm) || venue.includes(searchTerm);

            let dateMatch = true;

            // Jika pengguna memilih tanggal
            if (selectedDate) {
                const colIndex = dateToIndexMap[selectedDate];
                if (colIndex) {
                    const td = row.children[colIndex];
                    // Jika sel ada, tapi berisi elemen .day-empty -> tidak ada pertandingan
                    if (td && td.querySelector('.day-empty')) {
                        dateMatch = false;
                    }
                } else {
                    // Jika memilih tanggal diluar range event
                    dateMatch = false;
                }
            }

            if (textMatch && dateMatch) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        updateCount(visibleCount);

        // Sync tombol hari cepat (day-btn) di bagian bawah
        dayBtns.forEach(btn => btn.classList.remove('active'));
        if (selectedDate && dateToIndexMap[selectedDate]) {
            const dateObj = new Date(selectedDate);
            const d = dateObj.getDate();
            const m = dateObj.getMonth(); // 9 = Okt, 10 = Nov

            dayBtns.forEach(btn => {
                const num = parseInt(btn.querySelector('.num').textContent.trim());
                const mon = btn.querySelector('.mon').textContent.trim().toLowerCase();
                if (num === d && ((m === 9 && mon === 'okt') || (m === 10 && mon === 'nov'))) {
                    btn.classList.add('active');
                }
            });
        }
    }

    // Event Listeners Filter Utama
    searchFilter.addEventListener('input', filterTable);
    datePickerFilter.addEventListener('change', filterTable);

    resetFilterBtn.addEventListener('click', () => {
        searchFilter.value = '';
        datePickerFilter.value = '';
        dayBtns.forEach(btn => btn.classList.remove('active'));
        filterTable();
    });

    // Event Listeners Tombol Hari Cepat (Bawah)
    dayBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            dayBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const num = this.querySelector('.num').textContent.trim();
            const mon = this.querySelector('.mon').textContent.trim().toLowerCase();

            // Ubah menjadi format YYYY-MM-DD
            const y = 2026;
            const m = mon === 'okt' ? '10' : '11';
            const d = num.padStart(2, '0');
            const dateString = `${y}-${m}-${d}`;

            // Update isi Date Picker dan filter ulang
            datePickerFilter.value = dateString;
            filterTable();
        });
    });

    // Modal Data
    const venueData = {
        'Green Forest Hotel': {
            hotels: [{
                    name: 'Hotel Aston Bogor',
                    distance: '1.2 km',
                    rating: '4.5'
                },
                {
                    name: 'The Highland Park Resort',
                    distance: '2.5 km',
                    rating: '4.3'
                },
                {
                    name: 'Leuweung Geledegan Ecolodge',
                    distance: '3.0 km',
                    rating: '4.4'
                }
            ],
            facilities: [{
                    name: 'Minimarket',
                    type: 'shopping',
                    icon: 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'
                },
                {
                    name: 'Klinik 24 Jam',
                    type: 'health',
                    icon: 'M19 14l-7 7m0 0l-7-7m7 7V3'
                },
                {
                    name: 'ATM Center',
                    type: 'finance',
                    icon: 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'
                },
                {
                    name: 'Cafe & Resto',
                    type: 'food',
                    icon: 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'
                }
            ]
        },
        'Majalengka': {
            hotels: [{
                    name: 'Fitra Hotel',
                    distance: '3.0 km',
                    rating: '4.1'
                },
                {
                    name: 'Hotel Fieris',
                    distance: '4.5 km',
                    rating: '4.4'
                }
            ],
            facilities: [{
                    name: 'Puskesmas Terdekat',
                    type: 'health',
                    icon: 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'
                },
                {
                    name: 'Warung Makan Lokal',
                    type: 'food',
                    icon: 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'
                }
            ]
        },
        'Gunung Mas': {
            hotels: [{
                    name: 'Pesona Alam Resort',
                    distance: '5.0 km',
                    rating: '4.7'
                },
                {
                    name: 'Royal Safari Garden',
                    distance: '7.2 km',
                    rating: '4.5'
                }
            ],
            facilities: [{
                    name: 'Klinik P3K Gunung Mas',
                    type: 'health',
                    icon: 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'
                },
                {
                    name: 'Pusat Oleh-oleh',
                    type: 'shopping',
                    icon: 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'
                }
            ]
        },
        'PPSDMAP Kemenhub Kemang': {
            hotels: [{
                    name: 'Pendopo 45 Hotel',
                    distance: '2.1 km',
                    rating: '4.0'
                },
                {
                    name: 'Lorin Sentul Hotel',
                    distance: '6.5 km',
                    rating: '4.3'
                }
            ],
            facilities: [{
                    name: 'Kantin Kemenhub',
                    type: 'food',
                    icon: 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'
                },
                {
                    name: 'Minimarket',
                    type: 'shopping',
                    icon: 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'
                }
            ]
        }
    };

    const modal = document.getElementById('venueModal');
    const closeBtn = document.getElementById('closeModalBtn');
    const modalVenueName = document.getElementById('modalVenueName');
    const modalSportName = document.getElementById('modalSportName');
    const modalHotels = document.getElementById('modalHotels');
    const modalFacilities = document.getElementById('modalFacilities');

    function openModal(venue, sport) {
        modalVenueName.textContent = venue;
        modalSportName.textContent = 'Cabang Olahraga: ' + sport;

        const data = venueData[venue] || {
            hotels: [],
            facilities: []
        };

        // Render Hotels
        if (data.hotels.length > 0) {
            modalHotels.innerHTML = data.hotels.map(h => `
            <div class="hotel-card">
                <h4>${h.name}</h4>
                <div class="hotel-meta">
                    <span>Jarak: ${h.distance}</span>
                    <div class="hotel-rating">
                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        ${h.rating}
                    </div>
                </div>
            </div>
        `).join('');
        } else {
            modalHotels.innerHTML = '<p style="color:#64748b;font-size:13px;">Informasi hotel belum tersedia untuk venue ini.</p>';
        }

        // Render Facilities
        if (data.facilities.length > 0) {
            modalFacilities.innerHTML = data.facilities.map(f => `
            <li class="facility-item">
                <div class="facility-icon">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="${f.icon}"></path>
                    </svg>
                </div>
                ${f.name}
            </li>
        `).join('');
        } else {
            modalFacilities.innerHTML = '<p style="color:#64748b;font-size:13px;">Informasi fasilitas belum tersedia untuk venue ini.</p>';
        }

        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Attach Event Listeners to table cells
    document.querySelectorAll('.sport, .venue').forEach(cell => {
        cell.addEventListener('click', function() {
            const venue = this.getAttribute('data-venue');
            const sport = this.getAttribute('data-sport');
            if (venue && sport) {
                openModal(venue, sport);
            }
        });
    });

    closeBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    /* ================================================================
       SCROLL HINT — Auto-hide when user scrolls table right
       ================================================================ */
    const tableWrap = document.getElementById('jadwalTableWrap');
    const scrollHint = document.getElementById('scrollHint');
    if (tableWrap && scrollHint) {
        tableWrap.addEventListener('scroll', function() {
            if (this.scrollLeft > 100) {
                scrollHint.style.display = 'none';
                tableWrap.classList.add('scrolled-right');
            } else {
                tableWrap.classList.remove('scrolled-right');
            }
        });
    }
</script>
@endpush
@endsection