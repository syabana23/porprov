@extends('layouts.app')

@section('title', 'Fasilitas Kesehatan - PORPROV XV KOTA BOGOR 2026')


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
            <span class="banner-badge">PORPROV XV &middot; 2026</span>
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
                <div class="ss-num">{{ $stats['total'] }}</div>
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
                <div class="ss-num">{{ $stats['rs'] }}</div>
                <div class="ss-lbl">Rumah Sakit</div>
            </div>
        </div>
        <div class="ss-item" data-type="puskesmas">
            <div class="ss-icon-wrap" style="background: rgba(245, 158, 11, 0.08); color: #f59e0b;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16M9 7h6M9 11h6M9 15h6" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">{{ $stats['puskesmas'] }}</div>
                <div class="ss-lbl">Puskesmas</div>
            </div>
        </div>
        <div class="ss-item" data-type="apotek">
            <div class="ss-icon-wrap" style="background: rgba(236, 72, 153, 0.08); color: #ec4899;">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10M12 14v4m-2-2h4" />
                </svg>
            </div>
            <div class="ss-info">
                <div class="ss-num">{{ $stats['apotek'] }}</div>
                <div class="ss-lbl">Apotek</div>
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
                    <option value="rs">Rumah Sakit</option>
                    <option value="puskesmas">Puskesmas</option>
                    <option value="apotek">Apotek</option>
                </select>
            </div>
        </div>

        <div class="filter-group">
            <label class="filter-label">Lokasi</label>
            <div class="filter-select-wrap">
                <select class="filter-select" id="filterLokasi">
                    <option value="all">Semua Wilayah</option>
                    <option value="Bogor Tengah">Bogor Tengah</option>
                    <option value="Bogor Utara">Bogor Utara</option>
                    <option value="Bogor Selatan">Bogor Selatan</option>
                    <option value="Bogor Barat">Bogor Barat</option>
                    <option value="Bogor Timur">Bogor Timur</option>
                    <option value="Tanah Sareal">Tanah Sareal</option>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Facility data from PHP
    const facilities = @json($facilities);

    const ITEMS_PER_PAGE = 10;
    let currentPage = 1;
    let filteredData = [...facilities];

    // DOM refs
    const listEl = document.getElementById('facilityList');
    const pgInfo = document.getElementById('pgInfo');
    const pgBtns = document.getElementById('pgBtns');
    const searchInput = document.getElementById('searchInput');
    const filterType = document.getElementById('filterType');
    const filterLokasi = document.getElementById('filterLokasi');
    const sortSelect = document.getElementById('sortSelect');
    const btnReset = document.getElementById('btnReset');
    const ssItems = document.querySelectorAll('.ss-item');

    function getBadgeClass(tipe) {
        const map = { rs: 'badge-rs', puskesmas: 'badge-puskesmas', klinik: 'badge-klinik', apotek: 'badge-apotek', lab: 'badge-lab' };
        return map[tipe] || 'badge-rs';
    }

    function getInitials(nama) {
        return nama.split(' ').map(w => w[0]).join('').substring(0, 2).toUpperCase();
    }

    function renderItem(f) {
        const thumbContent = f.image
            ? `<img src="${f.image}" alt="${f.nama}">`
            : `<div class="fi-placeholder">${getInitials(f.nama)}</div>`;

        const websiteBtn = f.website
            ? `<a href="${f.website}" target="_blank" class="btn-detail">Kunjungi Website &gt;</a>`
            : `<span class="btn-detail" style="opacity:0.5;cursor:default;">Tidak ada website</span>`;

        return `
        <div class="facility-item" data-tipe="${f.tipe}" data-kecamatan="${f.kecamatan}">
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
                        ${f.telepon && f.telepon !== '-' ? `
                        <div class="fi-phone">
                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            ${f.telepon}
                        </div>
                        ` : ''}
                        <div class="fi-layanan">Layanan: <span>${f.layanan}</span></div>
                    </div>
                    <div class="fi-right">
                        <span class="fi-kecamatan">${f.kecamatan}</span>
                        ${websiteBtn}
                    </div>
                </div>
            </div>
        </div>`;
    }

    function applyFilters() {
        const search = searchInput.value.toLowerCase().trim();
        const type = filterType.value;
        const lokasi = filterLokasi.value;

        filteredData = facilities.filter(f => {
            if (search && !f.nama.toLowerCase().includes(search) && !f.alamat.toLowerCase().includes(search)) return false;
            if (type !== 'all' && f.tipe !== type) return false;
            if (lokasi !== 'all' && f.kecamatan !== lokasi) return false;
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

        listEl.innerHTML = pageData.map(renderItem).join('');
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
                listEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });
    }

    // Event listeners
    searchInput.addEventListener('input', applyFilters);
    filterType.addEventListener('change', applyFilters);
    filterLokasi.addEventListener('change', applyFilters);
    sortSelect.addEventListener('change', applyFilters);

    btnReset.addEventListener('click', () => {
        searchInput.value = '';
        filterType.value = 'all';
        filterLokasi.value = 'all';
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
