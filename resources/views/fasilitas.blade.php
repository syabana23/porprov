@extends('layouts.app')

@section('title', 'Fasilitas - PANDU PORPROV')


@section('content')
<!-- Banner -->
<section class="page-banner">
    <img class="banner-bg-img" src="{{ asset('images/venue3.jpeg') }}" alt="">
    <div class="banner-inner">
        <div class="banner-icon">
            <svg width="28" height="28" fill="none" stroke="#fff" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
        </div>
        <div class="banner-text">
            <span class="banner-badge">PORPROV XV &middot; 2026</span>
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
    </div>
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
                <select class="filter-select" id="filterType">
                    <option value="all">Semua Jenis</option>
                    <option value="hotel">Hotel</option>
                    <option value="rs">Rumah Sakit</option>
                    <option value="apotek">Apotek</option>
                    <option value="puskesmas">Puskesmas</option>
                    <option value="polsek">Polres / Polsek</option>
                    <option value="restoran">Restoran</option>
                    <option value="transport">Sewa Kendaraan</option>
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

{{-- Data fasilitas: dipisah dari @push agar formatter tidak merusaknya --}}
<script>
    window.__FACILITIES__ = @json($facilities);
</script>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Facility data dari PHP (disimpan di window.__FACILITIES__ agar aman dari formatter)
        const facilities = window.__FACILITIES__ || [];

        const ITEMS_PER_PAGE = 5;
        let currentPage = 1;
        let filteredData = [...facilities];

        // Metadata Kategori untuk Penyangga / Header Grouping
        const categoryMeta = {
            hotel: {
                title: 'Hotel & Penginapan',
                description: 'Akomodasi resmi dan tempat menginap bagi kontingen, atlet, serta pengunjung.',
                color: '#4f46e5',
                bg: '#e0e7ff',
                icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>`
            },
            rs: {
                title: 'Rumah Sakit',
                description: 'Fasilitas pelayanan kesehatan darurat dan rujukan medis selama kegiatan berlangsung.',
                color: '#dc2626',
                bg: '#fee2e2',
                icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/></svg>`
            },
            puskesmas: {
                title: 'Puskesmas',
                description: 'Pusat kesehatan masyarakat tingkat pertama yang tersebar di sekitar lokasi venue.',
                color: '#d97706',
                bg: '#fef3c7',
                icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1 2 .9 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/></svg>`
            },
            apotek: {
                title: 'Apotek & Farmasi',
                description: 'Penyedia obat-obatan, perlengkapan medis ringan, dan perbekalan kesehatan.',
                color: '#db2777',
                bg: '#fce7f3',
                icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M4.5 10.5C3.67 10.5 3 11.17 3 12v6c0 .83.67 1.5 1.5 1.5h15c.83 0 1.5-.67 1.5-1.5v-6c0-.83-.67-1.5-1.5-1.5h-15zM12 4.5C9.51 4.5 7.5 6.51 7.5 9h9c0-2.49-2.01-4.5-4.5-4.5zM11 13h2v4h-2v-4z"/></svg>`
            },
            polsek: {
                title: 'Polres & Polsek (Keamanan)',
                description: 'Kantor dan pos kepolisian untuk menjamin keamanan dan ketertiban area venue.',
                color: '#059669',
                bg: '#d1fae5',
                icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/></svg>`
            },
            restoran: {
                title: 'Restoran & Kuliner',
                description: 'Fasilitas rumah makan dan kuliner terdekat dari area pertandingan.',
                color: '#ea580c',
                bg: '#ffedd5',
                icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-7v8h2.5v8H21V2h-5z"/></svg>`
            },
            transport: {
                title: 'Sewa Kendaraan (Transportasi)',
                description: 'Layanan sewa kendaraan dan penyedia armada transportasi resmi kontingen.',
                color: '#0284c7',
                bg: '#e0f2fe',
                icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5-1.5zM5 11l1.5-4.5h11L19 11H5z"/></svg>`
            }
        };

        // DOM refs
        const listEl = document.getElementById('facilityList');
        const pgInfo = document.getElementById('pgInfo');
        const pgBtns = document.getElementById('pgBtns');
        const searchInput = document.getElementById('searchInput');
        const filterType = document.getElementById('filterType');
        const filterVenue = document.getElementById('filterVenue');
        const sortSelect = document.getElementById('sortSelect');
        const btnReset = document.getElementById('btnReset');
        const ssItems = document.querySelectorAll('.ss-item');

        function getBadgeClass(tipe) {
            const map = {
                rs: 'badge-rs',
                puskesmas: 'badge-puskesmas',
                apotek: 'badge-apotek',
                hotel: 'badge-hotel',
                polsek: 'badge-polsek',
                restoran: 'badge-restoran',
                transport: 'badge-transport'
            };
            return map[tipe] || 'badge-rs';
        }

        function getInitials(nama) {
            return nama.split(' ').map(w => w[0]).join('').substring(0, 2).toUpperCase();
        }

        function renderItem(f) {
            const thumbContent = f.image ?
                `<img src="${f.image}" alt="${f.nama}">` :
                `<div class="fi-placeholder">${getInitials(f.nama)}</div>`;

            const mapsBtn = f.gmaps ?
                `<a href="${f.gmaps}" target="_blank" class="btn-detail" >Peta Lokasi &gt;</a>` :
                `<span class="btn-detail" style="opacity:0.5;cursor:default;">Tidak ada peta</span>`;

            return `
        <div class="facility-item" data-tipe="${f.tipe}">
            <div class="fi-thumb">${thumbContent}</div>
            <div class="fi-details">
                <div class="fi-top">
                    <div class="fi-left">
                        <div class="fi-name-row">
                            <span class="fi-name">${f.nama}</span>
                            <span class="fi-badge ${getBadgeClass(f.tipe)}">${f.tipe_label}</span>
                        </div>
                        <div class="fi-addr">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:1px">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            ${f.alamat}
                        </div>
                        <div class="fi-venue" style="font-size:11px;color:#1e3a8a;margin-top:4px;display:flex;align-items:center;gap:5px;">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16" />
                            </svg>
                            Terdekat dari Titik Venue: <span style="font-weight:600;">${f.venue}</span>
                        </div>
                        ${f.telepon && f.telepon !== '-' ? `
                        <div class="fi-phone">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            ${f.telepon}
                        </div>
                        ` : ''}
                        ${f.layanan && f.layanan !== '-' ? `<div class="fi-layanan">Layanan: <span>${f.layanan}</span></div>` : ''}
                    </div>
                    <div class="fi-right">
                        <span class="fi-kecamatan" style="background:#f0fdf4;color:#166534;font-weight:700;">Jarak: ${f.jarak}</span>
                        ${mapsBtn}
                    </div>
                </div>
            </div>
        </div>`;
        }

        function renderGrouped(pageData) {
            const categoryOrder = ['hotel', 'rs', 'puskesmas', 'apotek', 'polsek', 'restoran', 'transport'];
            let html = '';

            categoryOrder.forEach(typeKey => {
                const groupItems = pageData.filter(item => item.tipe === typeKey);
                if (groupItems.length > 0) {
                    const cat = categoryMeta[typeKey] || {
                        title: typeKey.toUpperCase(),
                        description: 'Fasilitas pendukung venue',
                        color: '#013469',
                        bg: '#e2e8f0',
                        icon: ''
                    };

                    html += `
                    <div class="facility-category-section">
                        <div class="fcs-header" style="border-left-color: ${cat.color};">
                            <div class="fcs-icon" style="background: ${cat.bg}; color: ${cat.color};">
                                ${cat.icon}
                            </div>
                            <div class="fcs-title-wrap">
                                <div class="fcs-title">
                                    <h3>${cat.title}</h3>
                                    <span class="fcs-count" style="background: ${cat.bg}; color: ${cat.color};">${groupItems.length} Fasilitas</span>
                                </div>
                                <p class="fcs-desc">${cat.description}</p>
                            </div>
                        </div>
                        <div class="fcs-items">
                            ${groupItems.map(renderItem).join('')}
                        </div>
                    </div>`;
                }
            });

            return html;
        }

        function applyFilters() {
            const search = searchInput.value.toLowerCase().trim();
            const type = filterType.value;
            const venue = filterVenue.value;

            filteredData = facilities.filter(f => {
                if (search && !f.nama.toLowerCase().includes(search) && !f.alamat.toLowerCase().includes(search) && !f.venue.toLowerCase().includes(search)) return false;
                if (type !== 'all' && f.tipe !== type) return false;
                if (venue !== 'all' && f.venue !== venue) return false;
                return true;
            });

            // Sort
            const sort = sortSelect.value;
            filteredData.sort((a, b) => {
                if (sort === 'nama') return a.nama.localeCompare(b.nama);
                if (sort === 'nama-desc') return b.nama.localeCompare(a.nama);
                return 0;
            });

            currentPage = 1;
            render();
        }

        function render() {
            const total = filteredData.length;
            const totalPages = Math.ceil(total / ITEMS_PER_PAGE);
            const start = (currentPage - 1) * ITEMS_PER_PAGE;
            const end = Math.min(start + ITEMS_PER_PAGE, total);
            const pageData = filteredData.slice(start, end);

            if (total === 0) {
                listEl.innerHTML = `
                <div class="no-results">
                    <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <p>Tidak ada fasilitas ditemukan</p>
                </div>`;
                pgInfo.textContent = '';
                pgBtns.innerHTML = '';
                return;
            }

            listEl.innerHTML = renderGrouped(pageData);
            pgInfo.textContent = `Menampilkan ${start + 1}-${end} dari ${total} Fasilitas`;

            // Pagination buttons
            let btnsHtml = '';
            if (currentPage > 1) {
                btnsHtml += `<button class="pg-btn" data-page="${currentPage - 1}">&lt;</button>`;
            }
            for (let i = 1; i <= totalPages; i++) {
                if (totalPages > 7) {
                    if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                        btnsHtml += `<button class="pg-btn ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</button>`;
                    } else if (i === currentPage - 2 || i === currentPage + 2) {
                        btnsHtml += `<button class="pg-btn" style="border:none;background:none;cursor:default;">...</button>`;
                    }
                } else {
                    btnsHtml += `<button class="pg-btn ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</button>`;
                }
            }
            if (currentPage < totalPages) {
                btnsHtml += `<button class="pg-btn" data-page="${currentPage + 1}">&gt;</button>`;
            }
            pgBtns.innerHTML = btnsHtml;

            // Bind pagination clicks
            pgBtns.querySelectorAll('.pg-btn[data-page]').forEach(btn => {
                btn.addEventListener('click', () => {
                    currentPage = parseInt(btn.dataset.page);
                    render();
                    listEl.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            });
        }

        // Event listeners
        searchInput.addEventListener('input', applyFilters);
        filterType.addEventListener('change', applyFilters);
        filterVenue.addEventListener('change', applyFilters);
        sortSelect.addEventListener('change', applyFilters);

        btnReset.addEventListener('click', () => {
            searchInput.value = '';
            filterType.value = 'all';
            filterVenue.value = 'all';
            sortSelect.value = 'nama';
            ssItems.forEach(i => i.classList.remove('active'));
            document.querySelector('.ss-item[data-type="all"]').classList.add('active');
            applyFilters();
        });

        // Stats strip click -> filter sync
        ssItems.forEach(item => {
            item.addEventListener('click', () => {
                ssItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
                const type = item.getAttribute('data-type');
                filterType.value = type === 'all' ? 'all' : type;
                applyFilters();
            });
        });

        // Initial render
        applyFilters();
    });
</script>
@endpush
@endsection