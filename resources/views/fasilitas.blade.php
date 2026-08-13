@extends('layouts.app')

@section('title', 'Fasilitas - PANDU PORPROV')


@section('content')
<!-- Banner -->
<section class="page-banner">
    <img class="banner-bg-img" src="{{ asset('images/venue3.jpeg') }}" alt="">
    <div class="banner-inner">
        <div class="banner-icon">
            <svg width="28" height="28" fill="none" stroke="#fff" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
            </svg>
        </div>
        <div class="banner-text">
            <span class="banner-badge">PORNAVI · 2026</span>
            <h1>FASILITAS </h1>
            <p>Informasi Fasilitas yang tersedia</p>
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
    <button type="button" class="ss-scroll-btn ss-scroll-prev" aria-label="Geser kategori ke kiri" hidden>&#8249;</button>
    <div class="stats-strip-inner">
        <div class="ss-item active" data-type="all">
            <div class="ss-icon-wrap" style="background: rgba(1, 52, 105, 0.08); color: #013469;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">{{ $stats['total'] }}</div>
                <div class="ss-lbl">Semua Fasilitas</div>
            </div>
        </div>
        <div class="ss-item" data-type="hotel">
            <div class="ss-icon-wrap" style="background: rgba(79, 70, 229, 0.08); color: #4f46e5;">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">{{ $stats['hotel'] }}</div>
                <div class="ss-lbl">Hotel</div>
            </div>
        </div>
        <div class="ss-item" data-type="rs">
            <div class="ss-icon-wrap" style="background: rgba(220, 38, 38, 0.08); color: #dc2626;">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">{{ $stats['rs'] }}</div>
                <div class="ss-lbl">Rumah Sakit</div>
            </div>
        </div>
        <div class="ss-item" data-type="puskesmas">
            <div class="ss-icon-wrap" style="background: rgba(217, 119, 6, 0.08); color: #d97706;">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1 2 .9 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">{{ $stats['puskesmas'] }}</div>
                <div class="ss-lbl">Puskesmas</div>
            </div>
        </div>
        <div class="ss-item" data-type="apotek">
            <div class="ss-icon-wrap" style="background: rgba(219, 39, 119, 0.08); color: #db2777;">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M4.5 10.5C3.67 10.5 3 11.17 3 12v6c0 .83.67 1.5 1.5 1.5h15c.83 0 1.5-.67 1.5-1.5v-6c0-.83-.67-1.5-1.5-1.5h-15zM12 4.5C9.51 4.5 7.5 6.51 7.5 9h9c0-2.49-2.01-4.5-4.5-4.5zM11 13h2v4h-2v-4z" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">{{ $stats['apotek'] }}</div>
                <div class="ss-lbl">Apotek</div>
            </div>
        </div>
        <div class="ss-item" data-type="polsek">
            <div class="ss-icon-wrap" style="background: rgba(5, 150, 105, 0.08); color: #059669;">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">{{ $stats['polsek'] }}</div>
                <div class="ss-lbl">Polres/Polsek</div>
            </div>
        </div>
        <div class="ss-item" data-type="restoran">
            <div class="ss-icon-wrap" style="background: rgba(234, 88, 12, 0.08); color: #ea580c;">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-7v8h2.5v8H21V2h-5z" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">{{ $stats['restoran'] }}</div>
                <div class="ss-lbl">Restoran</div>
            </div>
        </div>
        <div class="ss-item" data-type="transport">
            <div class="ss-icon-wrap" style="background: rgba(2, 132, 199, 0.08); color: #0284c7;">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5-1.5zM5 11l1.5-4.5h11L19 11H5z" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">{{ $stats['transport'] ?? 0 }}</div>
                <div class="ss-lbl">Sewa Kendaraan</div>
            </div>
        </div>
        <div class="ss-item" data-type="rekreasi">
            <div class="ss-icon-wrap" style="background: rgba(13, 148, 136, 0.08); color: #0d9488;">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20.57 14.86 22 13.43 20.57 12 17 15.57 8.43 7 12 3.43 10.57 2 9.14 3.43 7.71 2 5.57 4.14 4.14 2.71 2.71 4.14l1.43 1.43L2 7.71l1.43 1.43L2 10.57 3.43 12 7 8.43 15.57 17 12 20.57 13.43 22l1.43-1.43L16.29 22l2.14-2.14 1.43 1.43 1.43-1.43-1.43-1.43L22 16.29z" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">{{ $stats['rekreasi'] }}</div>
                <div class="ss-lbl">Rekreasi</div>
            </div>
        </div>
    </div>
    <button type="button" class="ss-scroll-btn ss-scroll-next" aria-label="Geser kategori ke kanan" hidden>&#8250;</button>
</div>

<!-- Body -->
<div class="fasilitas-body">
    <!-- Filter Sidebar -->
    <div class="filter-sidebar">
        <h2>Filter Pencarian</h2>

        <div class="filter-group">
            <label class="filter-label">Cari Nama</label>
            <input type="text" id="searchInput" class="search-input" placeholder="Ketik nama fasilitas...">
        </div>

        <div class="filter-group">
            <label class="filter-label">Jenis Fasilitas</label>
            <div class="filter-select-wrap">
                <select class="filter-select" id="f ilterType">
                    <option value="all">Semua Jenis</option>
                    <option value="hotel">Hotel</option>
                    <option value="rs">Rumah Sakit</option>
                    <option value="apotek">Apotek</option>
                    <option value="puskesmas">Puskesmas</option>
                    <option value="polsek">Polres / Polsek</option>
                    <option value="restoran">Restoran</option>
                    <option value="transport">Sewa Kendaraan</option>
                    <option value="rekreasi">Rekreasi</option>
                </select>
            </div>
        </div>

        <div class="filter-group">
            <label class="filter-label">Venue Terkait</label>
            <div class="filter-select-wrap">
                <select class="filter-select" id="filterVenue">
                    <option value="all">Semua Venue</option>
                    <option value="GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)">GOR Pajajaran / Stadion Pajajaran</option>
                    <option value="Green Forest Hotel">Green Forest Hotel</option>
                    <option value="Gymnasium Sekolah Vokasi IPB">Gymnasium Sekolah Vokasi IPB</option>
                    <option value="GOR Yasmin Bulutangkis">GOR Yasmin Bulutangkis</option>
                    <option value="PPSDMAP Kemenhub Kemang Kab-Bogor">PPSDMAP Kemenhub Kemang</option>
                    <option value="Padepokan Voli Sentul">Padepokan Voli Sentul</option>
                    <option value="Gunung Mas (Cisarua)">Gunung Mas (Cisarua)</option>
                    <option value="Lapangan Tembak Cisangkan">Lapangan Tembak Cisangkan</option>
                    <option value="Arcamanik">Arcamanik</option>
                    <option value="Kota Baru Parahyangan">Kota Baru Parahyangan</option>
                    <option value="Majalengka">Majalengka</option>
                </select>
            </div>
        </div>

        <button class="btn-reset" id="btnReset">Reset Filter</button>

        <div class="info-box">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <div class="ib-title">&#9654; INFORMASI</div>
                <p>Fasilitas pendukung di sekitar venue siap menyukseskan pelaksanaan PORPROV XV Jawa Barat 2026.</p>
            </div>
        </div>
    </div>

    <!-- Facility List -->
    <div class="facility-list-wrap">
        <div class="flw-header">
            <h2>Daftar Fasilitas Pendukung</h2>
            <div class="flw-sort">
                Urutkan:
                <select id="sortSelect">
                    <option value="nama">Nama A-Z</option>
                    <option value="nama-desc">Nama Z-A</option>
                </select>
            </div>
        </div>

        <div id="facilityList">
            <!-- Items rendered by JS -->
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <span class="pg-info" id="pgInfo"></span>
            <div class="pg-btns" id="pgBtns"></div>
        </div>
    </div>
</div>

{{-- Data fasilitas tersimpan aman untuk dibaca oleh JS bundle --}}
<script id="facilities-data" type="application/json">
    @json($facilities)
</script>
@endsection