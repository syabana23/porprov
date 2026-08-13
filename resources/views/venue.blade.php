@extends('layouts.app')

@section('title', 'Peta Venue - PANDU PORPROV')



@section('content')
<section class="page-banner">
    <img class="banner-bg-img" src="{{ asset('images/venue2.jpeg') }}" alt="">
    <div class="banner-particles">
        <span></span><span></span><span></span><span></span>
        <span></span><span></span>
    </div>
    <div class="banner-inner">
        <div class="banner-icon">
            <svg width="28" height="28" fill="none" stroke="#fff" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
        </div>
        <div class="banner-text">
            <span class="banner-badge">PORNAVI · 2026</span>
            <h1>PETA VENUE PERTANDINGAN</h1>
            <p>Klik pin pada peta untuk melihat Detail Olahraga, Hotel Terdekat & Rumah Sakit Terdekat</p>
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
    <form class="jadwal-filter" id="map-filter-form">
        <!-- Titik Venue -->
        <div class="filter-box">
            <select class="filter-select" id="venue">
                <option value="">Pilih Venue</option>
                <option value="gor pajajaran indoor a">GOR Pajajaran Indoor A</option>
                <option value="gor pajajaran indoor b">GOR Pajajaran Indoor B</option>
                <option value="gor vokasi ipb">GOR Vokasi IPB</option>
                <option value="gor yasmin">GOR Yasmin</option>
                <option value="stadion pajajaran">Stadion Pajajaran</option>
                <option value="green forest hotel">Green Forest Hotel</option>
                <option value="ppsdmap kemenhub kemang">PPSDMAP Kemenhub Kemang</option>
                <option value="padepokan voli sentul">Padepokan Voli Sentul</option>
                <option value="gunung mas">Gunung Mas</option>
                <option value="cisangkan">Cisangkan</option>
                <option value="arcamanik">Arcamanik</option>
                <option value="kota baru parahyangan">Kota Baru Parahyangan</option>
                <option value="majalengka">Majalengka</option>
            </select>
        </div>
        <!-- Cabang Olahraga -->
        <div class="filter-box">
            <select class="filter-select" id="cabor">
                <option value="">Pilih Cabang Olahraga</option>
                <option value="aerosport">Aerosport - Gantolle</option>
                <option value="aerosport">Aerosport - Paralayang</option>
                <option value="anggar">Anggar</option>
                <option value="dansa">Dansa</option>
                <option value="angkat berat">Angkat Berat</option>
                <option value="angkat besi">Angkat Besi</option>
                <option value="arung jeram">Arung Jeram</option>
                <option value="binaraga">Binaraga</option>
                <option value="bola tangan">Bola Tangan Indoor</option>
                <option value="bola tangan">Bola Tangan Pasir</option>
                <option value="drumband">Drumband</option>
                <option value="gimnastik">Gimnastik Aerobik</option>
                <option value="gimnastik">Gimnastik Artistik</option>
                <option value="gimnastik">Gimnastik Ritmik</option>
                <option value="judo">Judo</option>
                <option value="kurash">Kurash</option>
                <option value="menembak">Menembak</option>
                <option value="modern pentathlon">Modern Pentathlon</option>
                <option value="panahan">Panahan</option>
                <option value="panjat tebing">Panjat Tebing</option>
                <option value="pencak silat">Pencak Silat</option>
                <option value="petanque">Petanque</option>
                <option value="sambo">Sambo</option>
                <option value="shorinji kempo">Shorinji Kempo</option>
                <option value="ski air">Ski Air</option>
                <option value="taekwondo">Taekwondo</option>
                <option value="tarung derajat">Tarung Derajat</option>
                <option value="tenis meja">Tenis Meja</option>
            </select>
        </div>
        <!-- Fasilitas -->
        <div class="filter-box">
            <select class="filter-select" id="fasilitas">
                <option value="">Cari Fasilitas</option>
                <option value="hotel">Hotel & Penginapan</option>
                <option value="rumah-sakit">Rumah Sakit & Klinik</option>
                <option value="apotek">Apotek</option>
                <option value="rumah-makan">Restoran & Kuliner</option>
                <option value="polisi">Polisi & Keamanan</option>
                <option value="transport">Sewa Kendaraan</option>
                <option value="rekreasi">Rekreasi</option>
            </select>
        </div>
        <div class="filter-actions">
            <button type="submit" class="btn-cari">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <span>Cari</span>
            </button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</section>

<div class="map-facilities-wrapper">
    <div class="map-box-card">
        <div class="map-container-wrap">
            <div id="map-canvas"></div>
        </div>

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
            <span class="facilities-badge">7 Kategori Tersedia</span>
        </div>

        <div class="facility-filter-buttons">
            <button class="facility-filter-btn active" data-filter="all">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                Semua
            </button>
            <button class="facility-filter-btn" data-filter="cat-hotel">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
                </svg>
                Hotel
            </button>
            <button class="facility-filter-btn" data-filter="cat-rs">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z" />
                </svg>
                Kesehatan
            </button>
            <button class="facility-filter-btn" data-filter="cat-resto">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-7v8h2.5v8H21V2h-5z" />
                </svg>
                Restoran
            </button>
            <button class="facility-filter-btn" data-filter="cat-police">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                </svg>
                Polisi
            </button>
            <button class="facility-filter-btn" data-filter="cat-apotek">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M4.5 10.5C3.67 10.5 3 11.17 3 12v6c0 .83.67 1.5 1.5 1.5h15c.83 0 1.5-.67 1.5-1.5v-6c0-.83-.67-1.5-1.5-1.5h-15zM12 4.5C9.51 4.5 7.5 6.51 7.5 9h9c0-2.49-2.01-4.5-4.5-4.5zM11 13h2v4h-2v-4z" />
                </svg>
                Apotek
            </button>
            <button class="facility-filter-btn" data-filter="cat-transport">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5-1.5zM5 11l1.5-4.5h11L19 11H5z" />
                </svg>
                Sewa Kendaraan
            </button>
            <button class="facility-filter-btn" data-filter="cat-rekreasi">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20.57 14.86 22 13.43 20.57 12 17 15.57 8.43 7 12 3.43 10.57 2 9.14 3.43 7.71 2 5.57 4.14 4.14 2.71 2.71 4.14l1.43 1.43L2 7.71l1.43 1.43L2 10.57 3.43 12 7 8.43 15.57 17 12 20.57 13.43 22l1.43-1.43L16.29 22l2.14-2.14 1.43 1.43 1.43-1.43-1.43-1.43L22 16.29z" />
                </svg>
                Rekreasi
            </button>
        </div>

        <div class="facilities-list-wrap" id="facilities-list-wrap">
            <div class="facilities-empty" id="facilities-placeholder">
                <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.98 1.98 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <p>Klik marker venue di peta untuk menampilkan fasilitas terdekat</p>
            </div>

            <!-- Hotel -->
            <div class="facility-category" id="cat-hotel" style="display:none;">
                <div class="facility-cat-header">
                    <span class="cat-dot" style="background:#d97706;"></span>
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
                    <span class="cat-dot" style="background:#dc2626;"></span>
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
                    <span class="cat-dot" style="background:#16a34a;"></span>
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
                    <span class="cat-dot" style="background:#4f46e5;"></span>
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
                    <span class="cat-dot" style="background:#9333ea;"></span>
                    <div class="facility-cat-icon" style="background:#f3e8ff; color:#9333ea;">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z" />
                        </svg>
                    </div>
                    <h3>Apotek</h3>
                </div>
                <div id="apotek-container"></div>
            </div>

            <!-- Sewa Kendaraan -->
            <div class="facility-category" id="cat-transport" style="display:none;">
                <div class="facility-cat-header">
                    <span class="cat-dot" style="background:#0284c7;"></span>
                    <div class="facility-cat-icon" style="background:#e0f2fe; color:#0284c7;">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5-1.5zM5 11l1.5-4.5h11L19 11H5z" />
                        </svg>
                    </div>
                    <h3>Sewa Kendaraan</h3>
                </div>
                <div id="transport-container"></div>
            </div>

            <!-- Rekreasi -->
            <div class="facility-category" id="cat-rekreasi" style="display:none;">
                <div class="facility-cat-header">
                    <span class="cat-dot" style="background:#0d9488;"></span>
                    <div class="facility-cat-icon" style="background:#ccfbf1; color:#0d9488;">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.57 14.86 22 13.43 20.57 12 17 15.57 8.43 7 12 3.43 10.57 2 9.14 3.43 7.71 2 5.57 4.14 4.14 2.71 2.71 4.14l1.43 1.43L2 7.71l1.43 1.43L2 10.57 3.43 12 7 8.43 15.57 17 12 20.57 13.43 22l1.43-1.43L16.29 22l2.14-2.14 1.43 1.43 1.43-1.43-1.43-1.43L22 16.29z" />
                        </svg>
                    </div>
                    <h3>Rekreasi</h3>
                </div>
                <div id="rekreasi-container"></div>
            </div>
        </div>
    </div>
</div>

<!-- Legacy hidden facilities (kept for JS compatibility) -->
<div class="venue-body" id="facilities-section" style="display:none;"></div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/leaflet/leaflet.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('vendor/leaflet/leaflet.js') }}"></script>

<script>
    // 1. DATABASE DATA STRUKTUR (Dari welcome.blade.php agar seragam)
    const venueData = [{
            id: 1,
            name: "GOR Pajajaran Indoor A",
            lat: -6.575816698132383,
            lng: 106.796958655819,
            address: "GOR Pajajaran, Jl. Pemuda No.02, RT.04/RW.01, Tanah Sareal, Kota Bogor, Jawa Barat 16161",
            cabor: "Drumband, Pencak Silat, Taekwondo",
            gmaps_url: "https://maps.app.goo.gl/KcwQDC2JxcTsj1LJ8",
        },
        {
            id: 2,
            name: "GOR Pajajaran Indoor B",
            lat: -6.577928206784957,
            lng: 106.79690799953588,
            address: "GOR Pajajaran, Jl. Pemuda No.02, RT.04/RW.01, Tanah Sareal, Kota Bogor, Jawa Barat 16161",
            cabor: "Judo, Kurash, Sambo",
            gmaps_url: "https://maps.app.goo.gl/h3ei411WRSdW5Uuf8",
        },
        {
            id: 3,
            name: "GOR Vokasi IPB",
            lat: -6.586864818074109,
            lng: 106.80744643623193,
            address: "Jl. Lodaya II, RT.03/RW.05, Cilibende, Babakan, Kec. Bogor Tengah, Kota Bogor, Jawa Barat 16128",
            cabor: "Shorinji Kempo, Tarung Derajat",
            gmaps_url: "https://maps.app.goo.gl/ekjekDk57iBAQcTVA",
        },
        {
            id: 4,
            name: "Majalengka",
            lat: -6.836580168091458,
            lng: 108.22805804110702,
            address: "Majalengka, Jawa Barat",
            cabor: "Aerosport - Gantolle",
            gmaps_url: "https://maps.google.com/?q=Majalengka"
        },
        {
            id: 5,
            name: "Gunung Mas",
            lat: -6.701561756877455,
            lng: 106.97130253598559,
            address: "Puncak, Bogor, Jawa Barat",
            cabor: "Aerosport - Paralayang",
            gmaps_url: "https://www.google.com/maps/dir//Gunung+Mas+Wisata+Puncak,+Jl.+Pangrango,+Tugu+Sel.,+Kec.+Cisarua,+Kabupaten+Bogor,+Jawa+Barat+16750/@-6.5894223,106.4822393,10z/data=!4m17!1m8!3m7!1s0x2e69b52b7592188d:0xc43a962f4e24c6f6!2sGunung+Mas+Wisata+Puncak!8m2!3d-6.709873!4d106.9681268!15sChFHdW51bmcgTWFzIFB1bmNha1oTIhFndW51bmcgbWFzIHB1bmNha5IBEnRvdXJpc3RfYXR0cmFjdGlvbpoBRENpOURRVWxSUVVOdlpFTm9kSGxqUmpsdlQycFdhMlZFYUU5VlZscFpWVlJHZW1WcVZqTlNia1pEWWtaQ05tTlZSUkFC4AEA-gEECAAQRQ!16s%2Fg%2F11s7lzyyym!4m7!1m0!1m5!1m1!1s0x2e69b52b7592188d:0xc43a962f4e24c6f6!2m2!1d106.9681268!2d-6.709873?entry=ttu&g_ep=EgoyMDI2MDcyMi4wIKXMDSoASAFQAw%3D%3D"
        },
        {
            id: 6,
            name: "Green Forest Hotel",
            lat: -6.64930420834099,
            lng: 106.806161644181,
            address: "Bogor, Jawa Barat",
            cabor: "Anggar, Angkat Besi, Angkat Berat, Arung Jeram, Binaraga, Petanque, Dansa",
            gmaps_url: "https://maps.app.goo.gl/dgb7WBjKovkcfyLo9"
        },
        {
            id: 7,
            name: "PPSDMAP Kemenhub Kemang",
            lat: -6.498024311495613,
            lng: 106.74365521534482,
            address: "Kemang, Bogor, Jawa Barat",
            cabor: "Bola Tangan Indoor",
            gmaps_url: "https://maps.app.goo.gl/Ma2cC3WY3DaWJYQ19"
        },
        {
            id: 8,
            name: "Padepokan Voli Sentul",
            lat: -6.571855570792679,
            lng: 106.8607669981466,
            address: "Sentul, Bogor, Jawa Barat",
            cabor: "Bola Tangan Pasir",
            gmaps_url: "https://maps.app.goo.gl/cXPfu5acX62py9QY9"
        },
        {
            id: 9,
            name: "Arcamanik",
            lat: -6.911153350109742,
            lng: 107.67487895150336,
            address: "Sport Jabar Arcamanik, Bandung, Jawa Barat",
            cabor: "Gimnastik Aerobik, Gimnastik Artistik, Gimnastik Ritmik",
            gmaps_url: "https://maps.google.com/?q=Sport+Jabar+Arcamanik"
        },
        {
            id: 10,
            name: "Cisangkan",
            lat: -6.8746820367318255,
            lng: 107.52764243801157,
            address: "Lapang Tembak Cisangkan, Cimahi, Jawa Barat",
            cabor: "Menembak",
            gmaps_url: "https://maps.google.com/?q=Lapang+Tembak+Cisangkan"
        },
        {
            id: 11,
            name: "Stadion Pajajaran",
            lat: -6.5770496557407565,
            lng: 106.79707946745701,
            address: "Stadion Pajajaran, Jl. Pemuda No.02, Kota Bogor",
            cabor: "Modern Pentathlon, Panahan, Panjat Tebing",
            gmaps_url: "https://maps.app.goo.gl/HgsrKKn8LD9V792UA"
        },
        {
            id: 12,
            name: "Kota Baru Parahyangan",
            lat: -6.85872946272341,
            lng: 107.4845999774748,
            address: "Padalarang, Kabupaten Bandung Barat, Jawa Barat",
            cabor: "Ski Air",
            gmaps_url: "https://www.google.com/maps/dir//Kota+Baru+Parahyangan,+Jl.+Wangsaniaga+Wetan+No.26,+Kertajaya,+Padalarang,+West+Bandung+Regency,+West+Java+40553/@-6.5166431,105.719382,8z/data=!4m17!1m8!3m7!1s0x2e68e546cdd70a63:0xa954b7a90d38dbfb!2sKota+Baru+Parahyangan!8m2!3d-6.8589189!4d107.4845934!15sChVLb3RhIEJhcnUgUGFyYWh5YW5nYW6SARNob3VzaW5nX2RldmVsb3BtZW504AEA!16s%2Fg%2F11fr0r18sz!4m7!1m0!1m5!1m1!1s0x2e68e546cdd70a63:0xa954b7a90d38dbfb!2m2!1d107.4845934!2d-6.8589189?entry=ttu&g_ep=EgoyMDI2MDcyMi4wIKXMDSoASAFQAw%3D%3D"
        },
        {
            id: 13,
            name: "GOR Yasmin",
            lat: -6.5669771863684225,
            lng: 106.77129339999999,
            address: "Bogor, Jawa Barat",
            cabor: "Tenis Meja",
            gmaps_url: "https://maps.app.goo.gl/Fqw4Yn97RyvkSeg27"
        }
    ];

    /* ── Data Fasilitas Hardcoded dari PDF ── */
    const transportFacilities = [{
            name: "PO Kerub Pariwisata Indonesia",
            address: "SPBU 34-16113 Cemplang, Jl. Brigadir Jenderal H Saptadji Hadiprawira, RT.01/RW.09, Cilendek Bar., Kec. Bogor Bar., Kota Bogor",
            distance: "PIC: +62 822-9992-8709 (Ade)",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=PO+Kerub+Pariwisata+Indonesia+Bogor"
        },
        {
            name: "PO. Midas Transportasi",
            address: "Ruko Pinus Niaga No. 51, Pine Forest, Sentul City, Bogor",
            distance: "PIC: +62 878-7223-3106 (Midas)",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=PO+Midas+Transportasi+Sentul+City+Bogor"
        },
        {
            name: "PO. Bin Ilyas Pariwisata",
            address: "Jl. Karadenan No.39, Karadenan, Cibinong, Kabupaten Bogor",
            distance: "PIC: +62 877-8100-9726 (Bin Ilyas)",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=PO+Bin+Ilyas+Pariwisata+Cibinong+Bogor"
        },
        {
            name: "Syafa Tour and Travel Bogor",
            address: "RT.03/RW.19, Katulampa, Kec. Bogor Tim., Kota Bogor",
            distance: "PIC: +62 838-1904-1575 (Endang)",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Syafa+Tour+and+Travel+Bogor+Katulampa"
        },
        {
            name: "PO. AdisaPutro Trans",
            address: "Jl. Raya Cifor No. 14 RT 03/RW 08 Bubulak, Bogor Barat, Kota Bogor",
            distance: "PIC: +62 857-7496-7369 (Rusli)",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=PO+AdisaPutro+Trans+Bubulak+Bogor"
        },
        {
            name: "PT. Surya Harapan Perdana (PasteurTrans)",
            address: "Jl. R. Saleh S. Bustaman No.15, RT.01/RW.11, Empang, Kec. Bogor Sel., Kota Bogor",
            distance: "PIC: +62 823-2224-9794",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=PT+Surya+Harapan+Perdana+PasteurTrans+Empang+Bogor"
        },
        {
            name: "Master Tour & Travel",
            address: "Jl. Raya Cipaku No.21, RT.03/RW.01, Cipaku, Kec. Bogor Sel., Kota Bogor",
            distance: "PIC: +62 857-1463-4597 (Wawang)",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Master+Tour+%26+Travel+Cipaku+Bogor"
        }
    ];

    const rekreasiFacilities = [{
        name: "IKIGAI Fitness",
        address: "IKIGAI Ekalos, Gedung Plaza Ekalos, Jl. Siliwangi, RW.04, Sukasari, Bogor",
        distance: "buka 06:00-21:00",
        mapUrl: "https://www.google.com/maps/place/IKIGAI+FITNESS+-+Lippo+Plaza+Ekalokasari+Bogor/@-6.6216624,106.8144763,17z/data=!3m2!4b1!5s0x2e69c5fdf77397b5:0x881f18442bc0f864!4m6!3m5!1s0x2e69c5d5719e94ab:0x8c6b0ea36866c2e6!8m2!3d-6.6216624!4d106.8170512!16s%2Fg%2F11stp2j67s?entry=ttu&g_ep=EgoyMDI2MDgwNS4xIKXMDSoASAFQAw%3D%3D"
    }];

    const pajajaranFacilities = {
        hotel: [{
                name: "Zest Hotel Bogor",
                address: "Jl. Pajajaran No. 27, Babakan, Kec. Bogor Tengah, Kota Bogor",
                distance: "1.2 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Zest+Hotel+Bogor+Jl.+Pajajaran+No.+27+Babakan+Bogor+Tengah"
            },
            {
                name: "The Mirah Hotel Bogor",
                address: "Jl. Pangrango No. 9A, Babakan, Kec. Bogor Tengah, Kota Bogor",
                distance: "1.5 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=The+Mirah+Hotel+Bogor+Jl.+Pangrango+No.+9A+Babakan+Bogor+Tengah"
            }
        ],
        hospital: [{
                name: "RS Salak Bogor",
                address: "Jl. Jend. Sudirman No. 8, Sempur, Kec. Bogor Tengah, Kota Bogor",
                distance: "1.1 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Salak+Bogor+Jl.+Jend.+Sudirman+No.+8+Sempur+Bogor+Tengah"
            },
            {
                name: "RS PMI Bogor",
                address: "Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur, Kota Bogor",
                distance: "2.5 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+PMI+Bogor+Jl.+Pajajaran+No.+80+Baranangsiang+Bogor+Timur"
            },
            {
                name: "Puskesmas Bogor Tengah",
                address: "Jl. Sawojajar No. 38, Pabaton, Kec. Bogor Tengah, Kota Bogor",
                distance: "1.8 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Bogor+Tengah+Jl.+Sawojajar+No.+38+Pabaton+Bogor+Tengah"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Juanda",
            address: "Jl. Ir. H. Juanda No. 30, Babakan, Kec. Bogor Tengah, Kota Bogor",
            distance: "2.0 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Juanda+Jl.+Ir.+H.+Juanda+No.+30+Babakan+Bogor+Tengah"
        }],
        police: [{
            name: "Polresta Bogor Kota (Mako Muslihat)",
            address: "Jl. Kapten Muslihat No. 18, Paledang, Kec. Bogor Tengah, Kota Bogor",
            distance: "2.3 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polresta+Bogor+Kota+Mako+Muslihat+Jl.+Kapten+Muslihat+No.+18+Paledang+Bogor+Tengah"
        }],
        restaurant: [{
            name: "Rumah Makan Ampera Pemuda",
            address: "Jl. Pemuda No. 27, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor",
            distance: "300 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Rumah%20Makan%20Ampera%20Pemuda%20Jl.%20Pemuda%20No.%2027%20Tanah%20Sareal%20Bogor"
        }],
        transport: transportFacilities,
        rekreasi: rekreasiFacilities
    };

    const greenForestFacilities = {
        hotel: [{
                name: "ASTON Bogor Hotel & Resort",
                address: "Mulyaharja, Kec. Bogor Selatan, Kota Bogor",
                distance: "1.8 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=ASTON+Bogor+Hotel+%26+Resort+Mulyaharja+Bogor+Selatan"
            },
            {
                name: "Padodi Hotel",
                address: "Jl. Soemanta Diredja No. 10, Pamoyanan, Kec. Bogor Selatan",
                distance: "1.5 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Padodi+Hotel+Jl.+Soemanta+Diredja+No.+10+Pamoyanan+Bogor+Selatan"
            }
        ],
        hospital: [{
                name: "RS Melania Bogor",
                address: "Jl. Pahlawan No. 91, Bondongan, Kec. Bogor Selatan",
                distance: "2.8 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Melania+Bogor+Jl.+Pahlawan+No.+91+Bondongan+Bogor+Selatan"
            },
            {
                name: "Puskesmas Cipaku",
                address: "Jl. Rangga Gading, Cipaku, Kec. Bogor Selatan",
                distance: "2.1 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Cipaku+Jl.+Rangga+Gading+Cipaku+Bogor+Selatan"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Pahlawan",
            address: "Jl. Pahlawan No. 40, Batutulis, Kec. Bogor Selatan",
            distance: "2.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Pahlawan+Jl.+Pahlawan+No.+40+Batutulis+Bogor+Selatan"
        }],
        police: [{
            name: "Polsek Bogor Selatan",
            address: "Jl. Layung Sari No. 1, Empang, Kec. Bogor Selatan",
            distance: "2.6 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Bogor+Selatan+Jl.+Layung+Sari+No.+1+Empang+Bogor+Selatan"
        }],
        restaurant: [{
            name: "Resto Kampoeng Konsep",
            address: "Jl. Soemanta Diredja No. 28, Pamoyanan, Kec. Bogor Selatan",
            distance: "400 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Resto%20Kampoeng%20Konsep%20Jl.%20Soemanta%20Diredja%20No.%2028%20Pamoyanan%20Bogor%20Selatan"
        }],
        rekreasi: rekreasiFacilities
    };

    const vokasiFacilities = {
        hotel: [{
            name: "IPB Hotel & Convention Centre",
            address: "Botani Square, Jl. Pajajaran, Baranangsiang",
            distance: "2.8 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=IPB+Hotel+%26+Convention+Centre+Botani+Square+Jl.+Pajajaran+Baranangsiang"
        }],
        hospital: [{
                name: "RS PMI Bogor",
                address: "Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur",
                distance: "2.2 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+PMI+Bogor+Jl.+Pajajaran+No.+80+Baranangsiang+Bogor+Timur"
            },
            {
                name: "Puskesmas Bogor Utara",
                address: "Jl. Tegal Gundil, Kec. Bogor Utara",
                distance: "1.9 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Bogor+Utara+Jl.+Tegal+Gundil+Bogor+Utara"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Pajajaran",
            address: "Jl. Pajajaran No. 35, Babakan, Kec. Bogor Tengah",
            distance: "1.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Pajajaran+Jl.+Pajajaran+No.+35+Babakan+Bogor+Tengah"
        }],
        police: [{
            name: "Polsek Bogor Utara",
            address: "Jl. Pajajaran No. 200, Cibuluh, Kec. Bogor Utara",
            distance: "2.1 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Bogor+Utara+Jl.+Pajajaran+No.+200+Cibuluh+Bogor+Utara"
        }],
        restaurant: [{
            name: "Toko Adelways (Kantin IPB Cilibende)",
            address: "Jl. Cilibende, Babakan, Kec. Bogor Tengah",
            distance: "250 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Toko%20Adelways%20Jl.%20Cilibende%20Babakan%20Bogor%20Tengah"
        }],
        rekreasi: rekreasiFacilities
    };

    const yasminFacilities = {
        hotel: [{
                name: "WHIZ Prime Hotel Bogor Yasmin",
                address: "Jl. KH. R. Abdullah Bin Nuh No. 33, Curugmekar",
                distance: "600 m",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=WHIZ+Prime+Hotel+Bogor+Yasmin+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+33+Curugmekar"
            },
            {
                name: "Swiss-Belcourt Bogor",
                address: "Jl. KH. R. Abdullah Bin Nuh No. 27, Bukit Cimanggu City",
                distance: "1.2 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Swiss-Belcourt+Bogor+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+27+Bukit+Cimanggu+City"
            }
        ],
        hospital: [{
                name: "RS Hermina Bogor",
                address: "Jl. KH. R. Abdullah Bin Nuh No. E2, Hermina Grand Yasmin",
                distance: "900 m",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Hermina+Bogor+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+E2+Hermina+Grand+Yasmin"
            },
            {
                name: "RS Islam Bogor",
                address: "Jl. Perdana No. 22, Budi Agung, Tanahsareal",
                distance: "2.0 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Islam+Bogor+Jl.+Perdana+No.+22+Budi+Agung+Tanahsareal"
            },
            {
                name: "Puskesmas Gang Kelor",
                address: "Jl. Raya Curug No. 12, Curugmekar, Kec. Bogor Barat",
                distance: "1.4 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Gang+Kelor+Jl.+Raya+Curug+No.+12+Curugmekar+Bogor+Barat"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Yasmin",
            address: "Ruko Taman Yasmin Sektor VI No. 108, Curugmekar",
            distance: "500 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Yasmin+Ruko+Taman+Yasmin+Sektor+VI+No.+108+Curugmekar"
        }],
        police: [{
            name: "Polsek Tanah Sareal",
            address: "Jl. Seremped, Kedung Badak, Kec. Tanah Sareal",
            distance: "2.4 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Tanah+Sareal+Jl.+Seremped+Kedung+Badak+Tanah+Sareal"
        }],
        restaurant: [{
            name: "Rumah Makan Ampera Yasmin",
            address: "Jl. KH. R. Abdullah Bin Nuh No. 37, Curugmekar",
            distance: "350 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Rumah%20Makan%20Ampera%20Yasmin%20Jl.%20KH.%20R.%20Abdullah%20Bin%20Nuh%20No.%2037%20Curugmekar"
        }],
        rekreasi: rekreasiFacilities
    };

    const kemangFacilities = {
        hotel: [{
            name: "Salak Sunset Hotel",
            address: "Jl. Raya Kemang Parung No. 12, Kemang",
            distance: "2.1 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Salak+Sunset+Hotel+Jl.+Raya+Kemang+Parung+No.+12+Kemang"
        }],
        hospital: [{
                name: "RS Sentosa Bogor",
                address: "Jl. Raya Kemang No. 18, Kemang, Kab. Bogor",
                distance: "1.3 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Sentosa+Bogor+Jl.+Raya+Kemang+No.+18+Kemang+Kab.+Bogor"
            },
            {
                name: "Puskesmas Kemang",
                address: "Jl. Raya Kemang No. 5, Kemang, Kab. Bogor",
                distance: "1.1 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Kemang+Jl.+Raya+Kemang+No.+5+Kemang+Kab.+Bogor"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Kemang",
            address: "Jl. Raya Parung-Bogor, Kemang, Kab. Bogor",
            distance: "800 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Kemang+Jl.+Raya+Parung-Bogor+Kemang+Kab.+Bogor"
        }],
        police: [{
            name: "Polsek Kemang",
            address: "Jl. Raya Kemang Parung No. 10, Kemang, Kab. Bogor",
            distance: "1.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Kemang+Jl.+Raya+Kemang+Parung+No.+10+Kemang+Kab.+Bogor"
        }],
        restaurant: [{
            name: "RM Ayam Goreng Bakar Sayati",
            address: "Jl. Raya Parung - Bogor, Semplak Barat, Kemang",
            distance: "450 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Ayam%20Goreng%20Bakar%20Sayati%20Jl.%20Raya%20Parung%20Bogor%20Semplak%20Barat%20Kemang"
        }],
        rekreasi: rekreasiFacilities
    };

    const sentulFacilities = {
        hotel: [{
                name: "Lorin Sentul Hotel",
                address: "Kawasan Sirkuit Sentul Internasional, Babakan Madang",
                distance: "1.2 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Lorin+Sentul+Hotel+Kawasan+Sirkuit+Sentul+Internasional+Babakan+Madang"
            },
            {
                name: "Harris Hotel Sentul City",
                address: "Jl. Jend. Sudirman, Sentul City, Babakan Madang",
                distance: "2.5 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Harris+Hotel+Sentul+City+Jl.+Jend.+Sudirman+Sentul+City+Babakan+Madang"
            }
        ],
        hospital: [{
                name: "RS EMC Sentul",
                address: "Jl. MH. Thamrin No. 57, Sentul City, Babakan Madang",
                distance: "2.7 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+EMC+Sentul+Jl.+MH.+Thamrin+No.+57+Sentul+City+Babakan+Madang"
            },
            {
                name: "Puskesmas Babakan Madang",
                address: "Jl. Raya Sentul No. 1, Babakan Madang",
                distance: "2.0 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Babakan+Madang+Jl.+Raya+Sentul+No.+1+Babakan+Madang"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Sentul City",
            address: "Ruko Plaza Niaga 1, Sentul City",
            distance: "2.3 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Sentul+City+Ruko+Plaza+Niaga+1+Sentul+City"
        }],
        police: [{
            name: "Polsek Babakan Madang",
            address: "Jl. Raya Babakan Madang No. 8, Kab. Bogor",
            distance: "2.2 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Babakan+Madang+Jl.+Raya+Babakan+Madang+No.+8+Kab.+Bogor"
        }],
        restaurant: [{
            name: "Restoran Lorin Sentul",
            address: "Kawasan Sirkuit Sentul Internasional, Babakan Madang",
            distance: "1.2 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Restoran%20Lorin%20Sentul%20Kawasan%20Sirkuit%20Sentul%20Internasional%20Babakan%20Madang"
        }],
        rekreasi: rekreasiFacilities
    };

    const gunungMasFacilities = {
        hotel: [{
                name: "Bobocabin Gunung Mas",
                address: "Gunung Mas, Jl. Raya Puncak Gadog No. KM 87, Cisarua",
                distance: "300 m",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Bobocabin+Gunung+Mas+Jl.+Raya+Puncak+Gadog+KM+87+Cisarua"
            },
            {
                name: "Grand Diara Hotel Puncak",
                address: "Jl. Raya Puncak - Gadog KM 77, Cisarua",
                distance: "2.9 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Grand+Diara+Hotel+Puncak+Jl.+Raya+Puncak+Gadog+KM+77+Cisarua"
            }
        ],
        hospital: [{
                name: "RSPG Cisarua (RS Paru Dr. M. Goenawan)",
                address: "Jl. Raya Puncak No. KM 83, Cisarua, Kab. Bogor",
                distance: "1.8 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RSPG+Cisarua+RS+Paru+Dr.+M.+Goenawan+Jl.+Raya+Puncak+KM+83+Cisarua+Kab.+Bogor"
            },
            {
                name: "Puskesmas Cisarua",
                address: "Jl. Raya Puncak No. KM 81, Cisarua, Kab. Bogor",
                distance: "2.1 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Cisarua+Jl.+Raya+Puncak+KM+81+Cisarua+Kab.+Bogor"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Cisarua",
            address: "Jl. Raya Puncak No. 412, Cisarua, Kab. Bogor",
            distance: "1.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Cisarua+Jl.+Raya+Puncak+No.+412+Cisarua+Kab.+Bogor"
        }],
        police: [{
            name: "Polsek Cisarua",
            address: "Jl. Raya Puncak KM 82, Cisarua, Kab. Bogor",
            distance: "2.3 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Cisarua+Jl.+Raya+Puncak+KM+82+Cisarua+Kab.+Bogor"
        }],
        restaurant: [{
            name: "Resto Agrowisata Gunung Mas",
            address: "Kawasan Agrowisata Gunung Mas, Tugu Selatan, Cisarua",
            distance: "200 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Resto%20Agrowisata%20Gunung%20Mas%20Kawasan%20Agrowisata%20Gunung%20Mas%20Tugu%20Selatan%20Cisarua"
        }]
    };

    const cisangkanFacilities = {
        hotel: [{
            name: "Hotel Trikarya Cimahi",
            address: "Jl. Raya Cisangkan No. 88, Padasuka, Cimahi Tengah",
            distance: "800 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Hotel+Trikarya+Cimahi+Jl.+Raya+Cisangkan+No.+88+Padasuka+Cimahi+Tengah"
        }],
        hospital: [{
                name: "RS Dustira Cimahi",
                address: "Jl. Dr. Dustira No. 1, Baros, Cimahi Tengah",
                distance: "2.1 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Dustira+Cimahi+Jl.+Dr.+Dustira+No.+1+Baros+Cimahi+Tengah"
            },
            {
                name: "Puskesmas Cimahi Tengah",
                address: "Jl. Raden Demang Hardjakusumah No. 1, Cimahi",
                distance: "1.6 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Cimahi+Tengah+Jl.+Raden+Demang+Hardjakusumah+No.+1+Cimahi"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Cisangkan",
            address: "Jl. Raya Cisangkan No. 12, Padasuka, Cimahi Tengah",
            distance: "400 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Cisangkan+Jl.+Raya+Cisangkan+No.+12+Padasuka+Cimahi+Tengah"
        }],
        police: [{
            name: "Polres Cimahi",
            address: "Jl. Raya Cibeureum No. 1, Cimahi Selatan",
            distance: "2.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polres+Cimahi+Jl.+Raya+Cibeureum+No.+1+Cimahi+Selatan"
        }],
        restaurant: [{
            name: "RM Ampera Cisangkan",
            address: "Jl. Raya Barat No. 805, Padasuka, Cimahi Tengah",
            distance: "350 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=RM%20Ampera%20Cisangkan%20Jl.%20Raya%20Barat%20No.%20805%20Padasuka%20Cimahi%20Tengah"
        }]
    };

    const arcamanikFacilities = {
        hotel: [{
            name: "Grand Cordela Hotel Bandung",
            address: "Jl. Soekarno-Hatta No. 791, Cisaranten Endah, Arcamanik",
            distance: "2.4 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Grand+Cordela+Hotel+Bandung+Jl.+Soekarno-Hatta+No.+791+Cisaranten+Endah+Arcamanik"
        }],
        hospital: [{
                name: "RS Hermina Arcamanik",
                address: "Jl. A.H. Nasution No. 50, Antapani, Bandung",
                distance: "1.7 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Hermina+Arcamanik+Jl.+A.H.+Nasution+No.+50+Antapani+Bandung"
            },
            {
                name: "Puskesmas Arcamanik",
                address: "Jl. Cisaranten Kulon No. 4, Arcamanik, Bandung",
                distance: "1.1 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Arcamanik+Jl.+Cisaranten+Kulon+No.+4+Arcamanik+Bandung"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Arcamanik",
            address: "Jl. Arcamanik Endah No. 42, Sukamiskin, Arcamanik",
            distance: "600 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Arcamanik+Jl.+Arcamanik+Endah+No.+42+Sukamiskin+Arcamanik"
        }],
        police: [{
            name: "Polsek Arcamanik",
            address: "Jl. Pacuan Kuda No. 54, Sukamiskin, Arcamanik",
            distance: "800 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Arcamanik+Jl.+Pacuan+Kuda+No.+54+Sukamiskin+Arcamanik"
        }],
        restaurant: [{
            name: "RM Khas Sunda Cibiuk Arcamanik",
            address: "Jl. Soekarno Hatta No. 741, Cisaranten Endah, Arcamanik",
            distance: "1.8 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=RM%20Khas%20Sunda%20Cibiuk%20Arcamanik%20Jl.%20Soekarno%20Hatta%20No.%20741%20Cisaranten%20Endah%20Arcamanik"
        }]
    };

    const kotaBaruFacilities = {
        hotel: [{
            name: "Mason Pine Hotel",
            address: "Jl. Raya Kotabaru Parahyangan, Cipeundeuy, Padalarang",
            distance: "500 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Mason+Pine+Hotel+Jl.+Raya+Kotabaru+Parahyangan+Cipeundeuy+Padalarang"
        }],
        hospital: [{
                name: "RS Cahya Kawaluyan",
                address: "Jl. Raya Parahyangan KM 1.5, Padalarang, Bandung Barat",
                distance: "1.2 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Cahya+Kawaluyan+Jl.+Raya+Parahyangan+KM+1.5+Padalarang+Bandung+Barat"
            },
            {
                name: "Puskesmas Padalarang",
                address: "Jl. Raya Padalarang No. 470, Bandung Barat",
                distance: "2.8 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Padalarang+Jl.+Raya+Padalarang+No.+470+Bandung+Barat"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma KBP",
            address: "Ruko Bumi Simpang, Kota Baru Parahyangan",
            distance: "800 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+KBP+Ruko+Bumi+Simpang+Kota+Baru+Parahyangan"
        }],
        police: [{
            name: "Polsek Padalarang",
            address: "Jl. Raya Padalarang No. 501, Bandung Barat",
            distance: "2.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Padalarang+Jl.+Raya+Padalarang+No.+501+Bandung+Barat"
        }],
        restaurant: [{
            name: "Bumi Aki Kota Baru Parahyangan",
            address: "Jl. Parahyangan Raya No. 1, Kota Baru Parahyangan",
            distance: "600 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Bumi%20Aki%20Kota%20Baru%20Parahyangan%20Jl.%20Parahyangan%20Raya%20No.%201%20Kota%20Baru%20Parahyangan"
        }]
    };

    const majalengkaFacilities = {
        hotel: [{
            name: "Fitra Hotel Majalengka",
            address: "Jl. KH. Abdul Halim No. 88, Majalengka Kulon",
            distance: "1.1 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Fitra+Hotel+Majalengka+Jl.+KH.+Abdul+Halim+No.+88+Majalengka+Kulon"
        }],
        hospital: [{
                name: "RSUD Majalengka",
                address: "Jl. Kesehatan No. 77, Majalengka Wetan",
                distance: "1.5 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RSUD+Majalengka+Jl.+Kesehatan+No.+77+Majalengka+Wetan"
            },
            {
                name: "Puskesmas Majalengka",
                address: "Jl. KH. Abdul Halim No. 200, Majalengka",
                distance: "1.3 km",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Majalengka+Jl.+KH.+Abdul+Halim+No.+200+Majalengka"
            }
        ],
        pharmacy: [{
            name: "Apotek Kimia Farma Majalengka",
            address: "Jl. KH. Abdul Halim No. 120, Majalengka",
            distance: "900 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Majalengka+Jl.+KH.+Abdul+Halim+No.+120+Majalengka"
        }],
        police: [{
            name: "Polres Majalengka",
            address: "Jl. KH. Abdul Halim No. 512, Majalengka",
            distance: "2.0 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polres+Majalengka+Jl.+KH.+Abdul+Halim+No.+512+Majalengka"
        }],
        restaurant: [{
            name: "RM Khas Sunda Saung Balong",
            address: "Jl. KH. Abdul Halim No. 160, Majalengka Wetan",
            distance: "700 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Saung%20Balong%20Jl.%20KH.%20Abdul%20Halim%20No.%20160%20Majalengka%20Wetan"
        }]
    };

    const facilitiesData = {
        "GOR Pajajaran Indoor A": pajajaranFacilities,
        "GOR Pajajaran Indoor B": pajajaranFacilities,
        "Stadion Pajajaran": pajajaranFacilities,
        "Green Forest Hotel": greenForestFacilities,
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

        const typeMap = {
            lodging: 'hotel',
            hospital: 'hospital',
            restaurant: 'restaurant',
            police: 'police',
            pharmacy: 'pharmacy',
            transport: 'transport',
            rekreasi: 'rekreasi'
        };
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
            if (type === 'lodging') {
                iconBg = '#fef3c7';
                iconColor = '#d97706';
            } else if (type === 'hospital') {
                iconBg = '#fee2e2';
                iconColor = '#dc2626';
            } else if (type === 'restaurant') {
                iconBg = '#dcfce7';
                iconColor = '#16a34a';
            } else if (type === 'police') {
                iconBg = '#e0e7ff';
                iconColor = '#4f46e5';
            } else if (type === 'pharmacy') {
                iconBg = '#f3e8ff';
                iconColor = '#9333ea';
            } else if (type === 'transport') {
                iconBg = '#e0f2fe';
                iconColor = '#0284c7';
            } else if (type === 'rekreasi') {
                iconBg = '#ccfbf1';
                iconColor = '#0d9488';
            } else {
                iconBg = '#dbeafe';
                iconColor = '#2563eb';
            }

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
        "Aerosport - Gantolle": "14.GANTOLE.png",
        "Aerosport - Paralayang": "3.PARALAYANG.png",
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
    };

    function createSportIcon(sportName) {
        const iconFile = caborIcons[sportName] || '';
        const imgHtml = iconFile ?
            `<img src="/images/cabor/${iconFile}" class="sport-marker-inner" alt="">` :
            `<svg width="18" height="18" fill="#013469" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8"/></svg>`;
        return L.divIcon({
            html: `<div class="sport-marker">${imgHtml}</div>`,
            className: '',
            iconSize: [44, 44],
            iconAnchor: [22, 22],
            popupAnchor: [0, -22]
        });
    }

    function getOffset(index, total) {
        const spacing = 0.0003;
        const start = -(total - 1) * spacing / 2;
        return {
            lat: 0,
            lng: start + index * spacing
        };
    }

    function initMap() {
        const bogorCenter = [-6.587, 106.803];

        const mapElement = document.getElementById("map-canvas");
        if (!mapElement) return;

        map = L.map('map-canvas').setView(bogorCenter, 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        renderVenues(venueData);
        setupFilter();
        setupFacilityFilters();

        const bogorBounds = L.latLngBounds();
        venueData.forEach(v => bogorBounds.extend([v.lat, v.lng]));
        map.fitBounds(bogorBounds, {
            padding: [40, 40],
            maxZoom: 14
        });

        ensureMapSize(mapElement);
    }

    function ensureMapSize(mapElement) {
        if (!mapElement) return;
        const invalidate = function() {
            if (map) map.invalidateSize();
        };
        setTimeout(invalidate, 100);
        window.addEventListener('load', invalidate);
        const parent = mapElement.parentElement;
        if (parent && window.ResizeObserver) {
            const ro = new ResizeObserver(invalidate);
            ro.observe(parent);
        }
    }

    // Smooth Modern Parabolic Fly Animation (Zoom Out -> Pan -> Zoom In)
    function smoothFlyTo(latLng, targetZoom = 16) {
        if (!map) return;
        map.flyTo(L.latLng(latLng), targetZoom, {
            duration: 1.8,
            easeLinearity: 0.15,
            noMoveStart: false
        });
    }

    function smoothFlyToBounds(bounds, options = {}) {
        if (!map) return;
        map.flyToBounds(bounds, {
            padding: options.padding || [50, 50],
            maxZoom: options.maxZoom || 15,
            duration: 1.8,
            easeLinearity: 0.15
        });
    }

    function resetVenueBounds() {
        const bogorBounds = L.latLngBounds();
        venueData.forEach(v => bogorBounds.extend([v.lat, v.lng]));
        smoothFlyToBounds(bogorBounds, {
            padding: [40, 40],
            maxZoom: 14
        });
    }

    // Fungsi Render Marker Venue
    function renderVenues(venuesData, filterCabor) {
        venuesData.forEach(venue => {
            const caborList = venue.cabor.split(',').map(c => c.trim());
            caborList.forEach((cabor, index) => {
                if (filterCabor && cabor.toLowerCase() !== filterCabor.toLowerCase()) return;
                const offset = getOffset(index, caborList.length);
                const icon = createSportIcon(cabor);
                const marker = L.marker([venue.lat + offset.lat, venue.lng + offset.lng], {
                    icon: icon
                }).addTo(map);
                marker.bindTooltip(`${cabor} - ${venue.name}`);
                marker.on("click", () => {
                    smoothFlyTo([venue.lat + offset.lat, venue.lng + offset.lng], 16);
                    showVenueDetails(venue);
                    const vs = document.getElementById('venue');
                    const v = venue.name.toLowerCase();
                    if (Array.from(vs.options).some(o => o.value === v)) vs.value = v;
                    if (window.filterCaborByVenue) window.filterCaborByVenue();
                });
                markers.push(marker);
            });
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
        const venueSelect = document.getElementById('venue');
        const caborSelect = document.getElementById('cabor');
        const fasilitasSelect = document.getElementById('fasilitas');

        const allCaborOptions = Array.from(caborSelect.options).map(o => ({ value: o.value, text: o.text }));

        function filterCaborByVenue() {
            const venueVal = venueSelect.value.toLowerCase();
            caborSelect.innerHTML = '';
            caborSelect.add(new Option(allCaborOptions[0].text, ''));

            if (!venueVal) {
                allCaborOptions.slice(1).forEach(o => caborSelect.add(new Option(o.text, o.value)));
                caborSelect.value = '';
                return;
            }

            const venue = venueData.find(v => v.name.toLowerCase().includes(venueVal));
            if (!venue) {
                allCaborOptions.slice(1).forEach(o => caborSelect.add(new Option(o.text, o.value)));
                caborSelect.value = '';
                return;
            }

            const venueCabors = venue.cabor.split(',').map(c => c.trim().toLowerCase());
            allCaborOptions.slice(1).forEach(o => {
                if (venueCabors.includes(o.text.trim().toLowerCase())) {
                    caborSelect.add(new Option(o.text, o.value));
                }
            });
            caborSelect.value = '';
        }

        window.filterCaborByVenue = filterCaborByVenue;

        if (venueSelect) {
            venueSelect.addEventListener('change', function() {
                filterCaborByVenue();
                filterForm.dispatchEvent(new Event('submit'));
            });
        }
        if (caborSelect) {
            caborSelect.addEventListener('change', function() {
                filterForm.dispatchEvent(new Event('submit'));
            });
        }
        if (fasilitasSelect) {
            fasilitasSelect.addEventListener('change', function() {
                filterForm.dispatchEvent(new Event('submit'));
            });
        }

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

            let filterCabor = null;
            if (caborVal) {
                const matched = Object.keys(caborIcons).find(k => k.toLowerCase().includes(caborVal));
                if (matched) filterCabor = matched;
            }

            if (filteredVenues.length > 0) {
                renderVenues(filteredVenues, filterCabor);
                filteredVenues.forEach(v => bounds.extend([v.lat, v.lng]));
                isVenueFound = true;
            }

            // 2. Proses Cari Fasilitas dari data hardcoded PDF
            if (fasilitasVal) {
                if (isVenueFound) {
                    const v = filteredVenues[0];
                    currentVenue = v;
                    smoothFlyTo([v.lat, v.lng], 16);
                    showVenueDetails(v);

                    const filterToCategory = {
                        'hotel': 'cat-hotel',
                        'rumah-sakit': 'cat-rs',
                        'apotek': 'cat-apotek',
                        'rumah-makan': 'cat-resto',
                        'polisi': 'cat-police',
                        'transport': 'cat-transport',
                        'rekreasi': 'cat-rekreasi',
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
                        smoothFlyTo([filteredVenues[0].lat, filteredVenues[0].lng], 16);
                    } else {
                        smoothFlyToBounds(bounds, {
                            padding: [50, 50],
                            maxZoom: 15
                        });
                    }

                    // Auto-fetch facilities untuk venue pertama yang ditemukan
                    const v = filteredVenues[0];
                    currentVenue = v;
                    showVenueDetails(v);
                } else {
                    alert('Venue tidak ditemukan dengan kriteria tersebut.');
                    resetVenueBounds();
                }
            }
        });

        // Saat form di-reset
        filterForm.addEventListener('reset', function() {
            setTimeout(() => {
                clearMarkers();
                renderVenues(venueData);
                resetVenueBounds();
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
            const iconFile = caborIcons[c] || '';
            const iconHtml = iconFile ?
                `<img src="/images/cabor/${iconFile}" alt="${c}">` :
                '';
            caborContainer.innerHTML += `
                <div class="cabor-item">
                    <div class="cabor-icon">
                        ${iconHtml}
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
                ['transport', 'transport-container', 'Sewa Kendaraan', 'cat-transport'],
                ['rekreasi', 'rekreasi-container', 'Rekreasi', 'cat-rekreasi'],
            ];
            venueTypes.forEach(function(t) {
                renderFacilityCategory(venue, t[0], t[1], t[2], t[3]);
            });
        }

        if (window.innerWidth <= 768 && floatingCard) {
            floatingCard.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
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
            'cat-transport': {
                type: 'transport',
                containerId: 'transport-container',
                title: 'Sewa Kendaraan',
                catId: 'cat-transport'
            },
            'cat-rekreasi': {
                type: 'rekreasi',
                containerId: 'rekreasi-container',
                title: 'Rekreasi',
                catId: 'cat-rekreasi'
            },
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
        window.addEventListener('resize', function() {
            if (map) map.invalidateSize();
        });
    };
</script>
@endpush