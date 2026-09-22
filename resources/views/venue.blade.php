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
        <div class="filter-box-full-width">
            <select class="filter-select-styled" id="venue">
                <option value="">Pilih Venue</option>
                <option value="gor pajajaran indoor a">GOR Pajajaran Indoor A</option>
                <option value="gor pajajaran indoor b">GOR Pajajaran Indoor B</option>
                <option value="gor vokasi ipb">GOR Vokasi IPB</option>
                <option value="gor yasmin">GOR Yasmin</option>
                <option value="stadion pajajaran">Stadion Pajajaran</option>
                <option value="green forest hotel">Green Forest Hotel</option>
                <option value="sport center ipb dramaga">Sport Center IPB Dramaga</option>
                <option value="padepokan voli sentul">Padepokan Voli Sentul</option>
                <option value="gunung mas">Gunung Mas</option>
                <option value="cisangkan">Cisangkan</option>
                <option value="arcamanik">Arcamanik</option>
                <option value="kota baru parahyangan">Kota Baru Parahyangan</option>
                <option value="majalengka">Majalengka</option>
            </select>
        </div>
        <!-- Cabang Olahraga -->
        <div class="filter-box-full-width">
            <select class="filter-select-styled" id="cabor">
                <option value="">Pilih Cabang Olahraga</option>
                <option value="aerosport-gantolle">Aerosport - Gantolle</option>
                <option value="aerosport-paralayang">Aerosport - Paralayang</option>
                <option value="anggar">Anggar</option>
                <option value="dansa">Dansa</option>
                <option value="angkat berat">Angkat Berat</option>
                <option value="angkat besi">Angkat Besi</option>
                <option value="arung jeram">Arung Jeram</option>
                <option value="binaraga">Binaraga</option>
                <option value="bola-tangan-indoor">Bola Tangan Indoor</option>
                <option value="bola-tangan-pasir">Bola Tangan Pasir</option>
                <option value="drumband">Drumband</option>
                <option value="gimnastik-aerobik">Gimnastik Aerobik</option>
                <option value="gimnastik-artistik">Gimnastik Artistik</option>
                <option value="gimnastik-ritmik">Gimnastik Ritmik</option>
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
        <div class="filter-box-full-width">
            <select class="filter-select-styled" id="fasilitas">
                <option value="">Cari Fasilitas</option>
                <option value="hotel">Hotel & Penginapan</option>
                <option value="rumah-sakit">Rumah Sakit & Klinik</option>
                <option value="apotek">Apotek</option>
                <option value="rumah-makan">Restoran & Kuliner</option>
                <option value="polisi">Polisi & Keamanan</option>
                <option value="transport">Sewa Kendaraan</option>
                <option value="rekreasi">Rekreasi</option>
                <option value="mall">Mall</option>
            </select>
        </div>
        <div class="filter-actions">
            <button type="submit" class="btn-cari">
                <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

                <!-- Route Controls (otomatis, tanpa pilihan fasilitas manual) -->
                <div class="route-controls" id="route-controls" style="display:none;">
                    <div class="route-divider"></div>
                    <div class="route-loading" id="route-loading" style="display:none;">
                        <span class="route-spinner"></span>
                        <span>Mencari fasilitas terdekat & menghitung rute...</span>
                    </div>
                    <button class="btn-clear-route" id="btn-clear-route" type="button" style="display:none;">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Hapus Rute
                    </button>
                    <div class="route-info" id="route-info" style="display:none;">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.447 2.724A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                        </svg>
                        <span class="route-info-title" id="route-info-title"></span>
                        <span>Jarak: <span id="route-distance"></span></span> &middot;
                        <span>Estimasi waktu: <span id="route-duration"></span></span> &middot;
                        <span id="route-stops"></span>
                    </div>
                    <div class="route-usage" id="route-usage" style="display:none;"></div>
                    <div class="route-error" id="route-error" style="display:none;"></div>
                </div>
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
            <button class="facility-filter-btn" data-filter="cat-mall">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                </svg>
                Mall
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

            <!-- Mall -->
            <div class="facility-category" id="cat-mall" style="display:none;">
                <div class="facility-cat-header">
                    <span class="cat-dot" style="background:#7c3aed;"></span>
                    <div class="facility-cat-icon" style="background:#ede9fe; color:#7c3aed;">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                        </svg>
                    </div>
                    <h3>Mall & Pusat Belanja</h3>
                </div>
                <div id="mall-container"></div>
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
<script src="{{ asset('vendor/leaflet/leaflet.js') }}" nonce="{{ $cspNonce }}"></script>

<script nonce="{{ $cspNonce }}">
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
            maxStops: 9,
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
            lat: -6.7010382,
            lng: 106.9694386,
            address: "Jl. Raya Puncak KM 87, Tugu Selatan, Cisarua, Kab. Bogor",
            cabor: "Aerosport - Paralayang",
            gmaps_url: "https://www.google.com/maps/search/?api=1&query=Agrowisata+Gunung+Mas+Cisarua",
            maxStops: 3
        },
        {
            id: 6,
            name: "Green Forest Hotel",
            lat: -6.64930420834099,
            lng: 106.806161644181,
            address: "Bogor, Jawa Barat",
            cabor: "Anggar, Angkat Besi, Angkat Berat, Arung Jeram, Binaraga, Petanque, Dansa",
            gmaps_url: "https://maps.app.goo.gl/dgb7WBjKovkcfyLo9",
            maxStops: 7
        },
        {
            id: 7,
            name: "Sport Center IPB Dramaga",
            lat: -6.5858263,
            lng: 106.7317778,
            address: "Sport Center, Jl. Raya Dramaga, Babakan, Kec. Dramaga, Kabupaten Bogor, Jawa Barat",
            cabor: "Bola Tangan Indoor",
            gmaps_url: "https://www.google.com/maps/place/Sport+Center/@-6.5858263,106.7317778,17z/data=!3m1!4b1!4m6!3m5!1s0x2e69c4d6e6893129:0x102008023a172318!8m2!3d-6.5858263!4d106.7317778!16s%2Fg%2F11bzv48r3t"
        },
        {
            id: 8,
            name: "Padepokan Voli Sentul",
            lat: -6.571855570792679,
            lng: 106.8607669981466,
            address: "Sentul, Bogor, Jawa Barat",
            cabor: "Bola Tangan Pasir",
            gmaps_url: "https://maps.app.goo.gl/cXPfu5acX62py9QY9",
            maxStops: 7
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
            gmaps_url: "https://maps.app.goo.gl/Fqw4Yn97RyvkSeg27",
            maxStops: 9
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
            },
            {
                name: "The Sahira Hotel",
                address: "Jl. A. Yani No.17-23, RT.02/RW.02, Tanah Sareal, Kota Bogor, Jawa Barat 16161",
                distance: "300 m",
                mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/The+Sahira+Hotel,+Jl.+A.+Yani+No.17-23,+RT.02%2FRW.02,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/@-6.5764685,106.7978136,17.47z/data=!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c3993958a32d:0x905190fd46d58a74!2m2!1d106.7999397!2d-6.5749112?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
            },
            {
                name: "Key Inn Hotel",
                address: "Jl. Jend. Sudirman Gg. Lb. Pilar No.40B, RT.01/RW.03, Sempur, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16129",
                distance: "900 m",
                mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Key+Inn+Hotel+Bogor,+Jl.+Jend.+Sudirman+Gg.+Lb.+Pilar+No.40B,+RT.01%2FRW.03,+Sempur,+Bogor+Tengah,+Bogor+City,+West+Java+16129/@-6.5808268,106.7916117,16z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c58e1bbf04d5:0xd2750d460b939140!2m2!1d106.7970748!2d-6.5835792?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
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
            },
            {
                name: "RS Azra",
                address: "Jl. Raya Pajajaran No.219, RT.02/RW.11, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153",
                distance: "1.2 km",
                mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Rumah+Sakit+Azra+Bogor,+Jl.+Raya+Pajajaran+No.219,+RT.02%2FRW.11,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.57281,106.7976765,16z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c42e35fd5fd3:0x5497922a2532233!2m2!1d106.8074803!2d-6.5793169?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
            },
            {
                name: "RSIA Pasutri Bogor",
                address: "Jl. Merak No.3, RT.03/RW.06, Tanah Sareal, Kota Bogor, Jawa Barat 16161",
                distance: "800 m",
                mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/RSIA+Pasutri+Bogor,+CQHX%2BQQR,+Jl.+Merak+No.3,+RT.03%2FRW.06,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/@-6.5739631,106.7927543,16z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c5f7b0de7fd3:0x7ebb0e784df9fa48!2m2!1d106.798903!2d-6.570604?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
            },
            {
                name: "RS Mulia Pajajaran Bogor",
                address: "Jl. Raya Pajajaran No.98, RT.02/RW.03, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153",
                distance: "1.1 km",
                mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/RS+Mulia+Pajajaran+Bogor,+Jl.+Raya+Pajajaran+No.98,+RT.02%2FRW.03,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.5798556,106.7822267,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c5f2b4b395cf:0x96f61aa7b6f95871!2m2!1d106.8076464!2d-6.5757867?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
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
        }, {
            name: "Polsek Bogor Utara",
            address: "Jl. Raya Pajajaran No.26, RT.05/RW.10, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153",
            distance: "1.1 km",
            mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Polsek+Bogor+Utara,+Jl.+Raya+Pajajaran+No.26,+RT.05%2FRW.10,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.5845962,106.7915827,15z/data=!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c5e2ccc27bef:0x95860988a497f417!2m2!1d106.8068179!2d-6.579187?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }],
        restaurant: [{
            name: "Rumah Makan Ampera Pemuda",
            address: "Jl. Pemuda No. 27, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor",
            distance: "300 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Rumah%20Makan%20Ampera%20Pemuda%20Jl.%20Pemuda%20No.%2027%20Tanah%20Sareal%20Bogor"
        }],
        transport: transportFacilities,
        rekreasi: rekreasiFacilities,
        mall: [{
            name: "Mall Jambu Dua",
            address: "Jl. A. Yani No.1, RT.01/RW.06, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153",
            distance: "1.5 km",
            mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Jambu+Dua,+Jl.+A.+Yani+No.1,+RT.01%2FRW.06,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.5716908,106.7976765,16z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c55b908dacfb:0x6e2c85a178aa83f8!2m2!1d106.8079468!2d-6.569317?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }]
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
            },
            {
                name: "RS VANIA",
                address: "Jl. Siliwangi No.11, RT.01/RW.03, Sukasari, Kec. Bogor Tim., Kota Bogor",
                distance: "4 km",
                mapUrl: "https://www.google.com/maps/dir/Green+Forest+Bogor,+Jl.+RE.+Soemantadiredja+No.99,+RT.03%2FRW.12,+Pamoyanan,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16136/RUMAH+SAKIT+VANIA,+Jl.+Siliwangi+No.11,+RT.01%2FRW.03,+Sukasari,+Kec.+Bogor+Tim.,+Kota+Bogor,+Jawa+Barat+16142/@-6.6296626,106.7838324,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69cf4fde33c0b3:0x70889815f5e23386!2m2!1d106.806108!2d-6.6494907!1m5!1m1!1s0x2e69c5e5dbfe64e7:0x8273af2732cab4e2!2m2!1d106.8078123!2d-6.6131137?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
            },
            {
                name: "RS UMMI",
                address: "Jl. Empang II No.2, RT.04/RW.02, Empang, Kec. Bogor Sel., Kota Bogor",
                distance: "4.5 km",
                mapUrl: "https://www.google.com/maps/dir/Green+Forest+Bogor,+Jl.+RE.+Soemantadiredja+No.99,+RT.03%2FRW.12,+Pamoyanan,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16136/RS+UMMI,+Jl.+Empang+II+No.2,+RT.04%2FRW.02,+Empang,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16132/@-6.62865,106.7828612,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69cf4fde33c0b3:0x70889815f5e23386!2m2!1d106.806108!2d-6.6494907!1m5!1m1!1s0x2e69c5668d0c8dbb:0x6663382e4fa5d02a!2m2!1d106.7945423!2d-6.6086429?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
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
        transport: transportFacilities,
        rekreasi: [...rekreasiFacilities, {
            name: "The Jungle Water Park",
            address: "Jl. Bogor Nirwana Boulevard, Mulyaharja, Kec. Bogor Selatan",
            distance: "4.5 km",
            mapUrl: "https://www.google.com/maps/dir/Green+Forest+Bogor,+Jl.+RE.+Soemantadiredja+No.99,+RT.03%2FRW.12,+Pamoyanan,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16136/The+Jungle+Waterpark+Bogor,+Perumahan,+Jl.+Bogor+Nirwana+Residence+Jl.+Bukit+Nirwana+Raya,+RT.05%2FRW.12,+Mulyaharja,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16132/@-6.6438986,106.7893085,15z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69cf4fde33c0b3:0x70889815f5e23386!2m2!1d106.806108!2d-6.6494907!1m5!1m1!1s0x2e69cf5deba619f3:0x485a13f031e8b904!2m2!1d106.7949215!2d-6.6344794?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }],
        mall: [{
            name: "Mall BTM",
            address: "Jl. Ir. H. Juanda No.68, RT.01/RW.13, Paledang, Kec. Bogor Tengah, Kota Bogor",
            distance: "6.6 km",
            mapUrl: "https://www.google.com/maps/dir/Green+Forest+Bogor,+Jl.+RE.+Soemantadiredja+No.99,+RT.03%2FRW.12,+Pamoyanan,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16136/Mall+BTM+Bogor,+Jl.+Ir.+H.+Juanda+No.68,+RT.01%2FRW.13,+Paledang,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16122/@-6.6254957,106.7846035,14z/data=!3m2!4b1!5s0x2e69c5c08b54d0b5:0x45125fa3ca6c7203!4m13!4m12!1m5!1m1!1s0x2e69cf4fde33c0b3:0x70889815f5e23386!2m2!1d106.806108!2d-6.6494907!1m5!1m1!1s0x2e69c5b6757d7817:0x82ab1619188f430e!2m2!1d106.7952921!2d-6.6050687?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }]
    };

    const vokasiFacilities = {
        hotel: [{
            name: "IPB Hotel & Convention Centre",
            address: "Botani Square, Jl. Pajajaran, Baranangsiang",
            distance: "2.8 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=IPB+Hotel+%26+Convention+Centre+Botani+Square+Jl.+Pajajaran+Baranangsiang"
        }, {
            name: "Swiss-Belhotel Bogor",
            address: "Jl. Salak No.38-40, RT.03/RW.04, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16129",
            distance: "500 m",
            mapUrl: "https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Swiss-Belhotel+Bogor,+Jl.+Salak+No.38-40,+RT.03%2FRW.04,+Babakan,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16129/@-6.5889391,106.8019192,18z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5cd17948f23:0xcc8d353aabd8f8c3!2m2!1d106.8041729!2d-6.5889394?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
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
            },
            {
                name: "RS Azra",
                address: "Jl. Raya Pajajaran No.219, RT.02/RW.11, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153",
                distance: "1.9 km",
                mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Rumah+Sakit+Azra+Bogor,+Jl.+Raya+Pajajaran+No.219,+RT.02%2FRW.11,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.57281,106.7976765,16z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c42e35fd5fd3:0x5497922a2532233!2m2!1d106.8074803!2d-6.5793169?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
            },
            {
                name: "RS Siloam Bogor",
                address: "Jl. Raya Pajajaran No.27, RT.01/RW.04, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128",
                distance: "1.0 km",
                mapUrl: "https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Siloam+Hospitals+Bogor,+Jl.+Raya+Pajajaran+No.27,+RT.01%2FRW.04,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/@-6.5956616,106.7956764,16z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5cfedf6086d:0x64de2ab6cd78dce4!2m2!1d106.8046881!2d-6.5956638?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
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
            address: "Jl. Raya Pajajaran No.26, RT.05/RW.10, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153",
            distance: "1.9 km",
            mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Polsek+Bogor+Utara,+Jl.+Raya+Pajajaran+No.26,+RT.05%2FRW.10,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.5845962,106.7915827,15z/data=!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c5e2ccc27bef:0x95860988a497f417!2m2!1d106.8068179!2d-6.579187?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }],
        restaurant: [{
            name: "Toko Adelways (Kantin IPB Cilibende)",
            address: "Jl. Cilibende, Babakan, Kec. Bogor Tengah",
            distance: "250 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Toko%20Adelways%20Jl.%20Cilibende%20Babakan%20Bogor%20Tengah"
        }, {
            name: "Teras Om Frend",
            address: "CR65+HMX Il, Jl. Lodaya, RT.003/RW.002, Babakan, Kec. Bogor Tengah, Kota Bogor, Jawa Barat 16128",
            distance: "150 m",
            mapUrl: "https://www.google.com/maps/place/CR65%2BHMX+Teras+Om+Frend,+Il,+Jl.+Lodaya,+RT.003%2FRW.002,+Babakan,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16128/@-6.588509,106.8092212,16z/data=!3m1!1e3!4m6!3m5!1s0x2e69c5001ab40295:0xf34d26c1bef53a78!8m2!3d-6.588509!4d106.8092212!16s%2Fg%2F11ntswsj17?g_ep=Eg1tbF8yMDI2MDkwMV8wIOC7DCoASAJQAg%3D%3D"
        }],
        rekreasi: [...rekreasiFacilities, {
            name: "Kebun Raya Bogor",
            address: "Jl. Otto Iskandardinata No.13, Paledang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16122",
            distance: "1.4 km",
            mapUrl: "https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Kebun+Raya+Bogor,+Jl.+Otto+Iskandardinata+No.13,+Paledang,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16122/@-6.5976279,106.7815411,15z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5c412a67abb:0x75f23c6b45a37ee5!2m2!1d106.7995698!2d-6.5976289?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }, {
            name: "Lapangan Sempur Bogor",
            address: "CR52+99J, Jl. Sempur, RT.02/RW.01, Sempur, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16129",
            distance: "1.0 km",
            mapUrl: "https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Lapangan+Sempur+Bogor,+CR52%2B99J,+Jl.+Sempur,+RT.02%2FRW.01,+Sempur,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16129/@-6.5915343,106.7963791,17z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5cb9987d027:0xdc1330b7afd8d1b7!2m2!1d106.8008852!2d-6.591534?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }],
        mall: [{
            name: "Mall Botani Square Bogor",
            address: "Jl. Raya Pajajaran No.40, RT.04/RW.05, Tugu Kujang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16127",
            distance: "1.5 km",
            mapUrl: "https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Botani+Square,+Jl.+Raya+Pajajaran+No.40,+RT.04%2FRW.05,+Tugu+Kujang,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16127/@-6.6014327,106.7943125,15z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5c5287d2ae7:0x9edb391e7c74be19!2m2!1d106.8069032!2d-6.6014292?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }]
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
                address: "Jl. Sholeh Iskandar Jl. Bukit Cimanggu City Raya No.1, RT.01/RW.13, Cibadak, Tanah Sareal, Kota Bogor, Jawa Barat 16168",
                distance: "1.5 km",
                mapUrl: "https://maps.app.goo.gl/2VQeXZGysaj5Fjg36"
            },
            {
                name: "Bogor Icon Hotel",
                address: "Jl. Bukit Cimanggu City Raya No.1, RT.01/RW.13, Cibadak, Tanah Sareal, Kota Bogor, Jawa Barat 16166",
                distance: "1.3 km",
                mapUrl: "https://maps.app.goo.gl/692aN19h5YPbm6aQA"
            }
        ],
        hospital: [{
                name: "RS Hermina Bogor",
                address: "Jl. KH. R. Abdullah Bin Nuh No. E2, Hermina Grand Yasmin",
                distance: "900 m",
                mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Hermina+Bogor+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+E2+Hermina+Grand+Yasmin"
            },
            {
                name: "RSUD Kota Bogor",
                address: "Jl. DR. Sumeru No.120, RT.03/RW.20, Menteng, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16112",
                distance: "2.3 km",
                mapUrl: "https://maps.app.goo.gl/yVasRkJ3pjvQF2RQA"
            },
            {
                name: "RS Graha Medika Bogor",
                address: "Jl. KH. R. Abdullah Bin Nuh No.2, RT.04/RW.12, Cilendek Barat, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16113",
                distance: "700 m",
                mapUrl: "https://maps.app.goo.gl/qsWiRw3Y9JBqEABNA"
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
        }, {
            name: "Polsek Bogor Barat",
            address: "CQ9G+V9J, Jl. DR. Sumeru No.89, RT.01/RW.10, Menteng, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16111",
            distance: "2.1 km",
            mapUrl: "https://maps.app.goo.gl/B8HtTPSJUEYy1k6f7"
        }, {
            name: "Polsek Bogor Utara",
            address: "Jl. Raya Pajajaran No.26, RT.05/RW.10, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153",
            distance: "1.1 km",
            mapUrl: "https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Polsek+Bogor+Utara,+Jl.+Raya+Pajajaran+No.26,+RT.05%2FRW.10,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.5845962,106.7915827,15z/data=!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c5e2ccc27bef:0x95860988a497f417!2m2!1d106.8068179!2d-6.579187?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D"
        }],
        restaurant: [{
            name: "Rumah Makan Ampera Yasmin",
            address: "Jl. KH. R. Abdullah Bin Nuh No. 37, Curugmekar",
            distance: "350 m",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Rumah%20Makan%20Ampera%20Yasmin%20Jl.%20KH.%20R.%20Abdullah%20Bin%20Nuh%20No.%2037%20Curugmekar"
        }],
        rekreasi: [...rekreasiFacilities, {
            name: "Yasmin Waterpark",
            address: "Yasmin Centre, Jl. KH. R. Abdullah Bin Nuh, RT.06/RW.02, Curugmekar, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16113",
            distance: "800 m",
            mapUrl: "https://maps.app.goo.gl/1PXjuMGZak6tU5PG8"
        }, {
            name: "Marcopolo Water Adventure",
            address: "Jl. Bukit Cimanggu City Raya Jl. Sholeh Iskandar, RT.01/RW.11, Cibadak, Tanah Sareal, Kota Bogor, Jawa Barat 16168",
            distance: "1.6 km",
            mapUrl: "https://maps.app.goo.gl/gnAWSfJ5eQWq9PBy5"
        }, {
            name: "Kawasan Wisata Situ Gede",
            address: "Jl. Cilubang Nagrak No.RT 02/04, RT.03/RW.06, Situgede, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16115",
            distance: "3.1 km",
            mapUrl: "https://maps.app.goo.gl/j4ccYwx5RgpNgXmTA"
        }],
        mall: [{
            name: "Bogor Great Mall",
            address: "Jl. KH. R. Abdullah Bin Nuh, RT.05/RW.04, Cibadak, Tanah Sareal, Kota Bogor, Jawa Barat 16166",
            distance: "1.1 km",
            mapUrl: "https://maps.app.goo.gl/BbmsiFRYf9hPwSsi8"
        }]
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
            },
            {
                name: "Hotel Green Wattana Sentul",
                address: "Jl. Juanda Blok F3/R21, Cijayanti, Kec. Babakan Madang, Kabupaten Bogor, Jawa Barat 16810",
                distance: "1.5 km",
                mapUrl: "https://maps.app.goo.gl/fJfgjh4i5iwLaxHW8"
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
        rekreasi: [...rekreasiFacilities, {
            name: "JungleLand Adventure Theme Park",
            address: "Kawasan Sentul Nirwana, Jl. Jungle Land No.1, Karang Tengah, Kec. Babakan Madang, Kabupaten Bogor, Jawa Barat 16810",
            distance: "2.2 km",
            mapUrl: "https://maps.app.goo.gl/1o395KjTfXxryYD27"
        }, {
            name: "Curug Bidadari Sentul",
            address: "9WP5+99R, Jl. Sentul Paradise Park, Bojong Koneng, Kec. Babakan Madang, Kabupaten Bogor, Jawa Barat 16810",
            distance: "1.9 km",
            mapUrl: "https://maps.app.goo.gl/SU2GdDQk9xq4YUMn8"
        }, {
            name: "Bukit Pelangi",
            address: "9VFM+9VQ, Jl. Bukit Pelangi, Gn. Geulis, Kec. Sukaraja, Kabupaten Bogor, Jawa Barat 16710",
            distance: "4.0 km",
            mapUrl: "https://maps.app.goo.gl/VyMSmfFjCZhzAiD4A"
        }],
        mall: [{
            name: "Mall AEON Sentul Bogor",
            address: "Jl. MH. Thamrin, Citaringgul, Kec. Babakan Madang, Kabupaten Bogor, Jawa Barat 16810",
            distance: "1.6 km",
            mapUrl: "https://maps.app.goo.gl/o5QoJqAqdvAfqkZn8"
        }]
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
            },
            {
                name: "The Grand Hill Hotel",
                address: "Jl. Raya Puncak, Tugu Sel., Kec. Cisarua, Kabupaten Bogor, Jawa Barat 16750",
                distance: "1.2 km",
                mapUrl: "https://maps.app.goo.gl/rZMK4NJpnARgWhZw5"
            }
        ],
        hospital: [{
                name: "RSP Goenawan Partowidigdo",
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

    const dramagaFacilities = {
        hotel: [{
            name: "Sienna Residence Bogor",
            address: "Jl. Letjen Ibrahim Adjie No.8, Ciherang, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16680",
            distance: "2.5 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Sienna+Residence+Bogor+Jl.+Letjen+Ibrahim+Adjie+No.+8+Ciherang+Dramaga"
        }],
        hospital: [{
            name: "RS Karya Bhakti Pratiwi",
            address: "Jl. Raya Dramaga KM.7, Dramaga, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16880",
            distance: "2.0 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Karya+Bhakti+Pratiwi+Jl.+Raya+Dramaga+KM.+7+Dramaga+Bogor"
        }, {
            name: "RS Medika Dramaga",
            address: "Jl. Raya Dramaga No.KM 7,3, RT.01/RW.06, Margajaya, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16680",
            distance: "1.8 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Medika+Dramaga+Jl.+Raya+Dramaga+No.+KM+7.3+Margajaya+Bogor"
        }],
        police: [{
            name: "Polsek Dramaga",
            address: "Jl. Raya Dramaga, Margajaya, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16680",
            distance: "2.7 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Dramaga+Jl.+Raya+Dramaga+Margajaya+Bogor"
        }],
        rekreasi: [{
            name: "Kawasan Wisata Situ Gede",
            address: "Jl. Cilubang Nagrak No.RT 02/04, RT.03/RW.06, Situgede, Kec. Bogor Barat, Kota Bogor, Jawa Barat 16115",
            distance: "4.1 km",
            mapUrl: "https://www.google.com/maps/search/?api=1&query=Kawasan+Wisata+Situ+Gede+Bogor"
        }]
    };

    const facilitiesData = {
        "GOR Pajajaran Indoor A": pajajaranFacilities,
        "GOR Pajajaran Indoor B": pajajaranFacilities,
        "Stadion Pajajaran": pajajaranFacilities,
        "Green Forest Hotel": greenForestFacilities,
        "GOR Vokasi IPB": vokasiFacilities,
        "GOR Yasmin": yasminFacilities,
        "Padepokan Voli Sentul": sentulFacilities,
        "Gunung Mas": gunungMasFacilities,
        "Cisangkan": cisangkanFacilities,
        "Arcamanik": arcamanikFacilities,
        "Kota Baru Parahyangan": kotaBaruFacilities,
        "Majalengka": majalengkaFacilities,
        "Sport Center IPB Dramaga": dramagaFacilities,
    };

    // Fasilitas yang WAJIB ikut jalur rute venue tertentu (sisanya tetap
    // pemilihan otomatis terdekat, total ≤ ROUTE_STOPS_MAX).
    const routePinnedFacilities = {
        "GOR Vokasi IPB": [
            "Swiss-Belhotel Bogor",
            "RS PMI Bogor",
            "RS Siloam Bogor",
            "RS Azra Bogor",
            "Polsek Bogor Utara",
            "Mall Botani Square Bogor",
            "Lapangan Sempur Bogor",
            "Kebun Raya Bogor",
            "Teras Om Frend"
        ],
        "GOR Pajajaran Indoor B": ["Mall Jambu Dua"],
        "Green Forest Hotel": [
            "ASTON Bogor Hotel & Resort",
            "RS UMMI",
            "RS VANIA",
            "RS Melania Bogor",
            "Polsek Bogor Selatan",
            "The Jungle Water Park",
            "Mall BTM"
        ],
        "GOR Yasmin": [
            "Bogor Icon Hotel",
            "RS Hermina Bogor",
            "RS Graha Medika Bogor",
            "RSUD Kota Bogor",
            "Polsek Bogor Barat",
            "Bogor Great Mall",
            "Yasmin Waterpark",
            "Marcopolo Water Adventure",
            "Kawasan Wisata Situ Gede"
        ],
        "Sport Center IPB Dramaga": [
            "Sienna Residence Bogor",
            "RS Karya Bhakti Pratiwi",
            "RS Medika Dramaga",
            "Polsek Dramaga",
            "Kawasan Wisata Situ Gede"
        ],
        "Gunung Mas": [
            "The Grand Hill Hotel",
            "RSP Goenawan Partowidigdo",
            "Polsek Cisarua"
        ],
        "Padepokan Voli Sentul": [
            "Hotel Green Wattana Sentul",
            "RS EMC Sentul",
            "Polsek Babakan Madang",
            "Mall AEON Sentul Bogor",
            "JungleLand Adventure Theme Park",
            "Curug Bidadari Sentul",
            "Bukit Pelangi"
        ]
    };

    // Koordinat fasilitas hasil geocoding (Nominatim/Photon), di-bake agar
    // titik rute konsisten dengan data & tahan rate-limit.
    const facilityCoordsMap = {
        "Apotek Kimia Farma Arcamanik": [-6.9135, 107.6765],
        "Apotek Kimia Farma Cisangkan": [-6.8785, 107.5295],
        "Apotek Kimia Farma Cisarua": [-6.6795, 106.9400],
        "Apotek Kimia Farma Juanda": [-6.5949, 106.7997],
        "Apotek Kimia Farma KBP": [-6.8683426, 107.4672913],
        "Apotek Kimia Farma Majalengka": [-6.8370, 108.2300],
        "Apotek Kimia Farma Pahlawan": [-6.6200, 106.7995],
        "Apotek Kimia Farma Pajajaran": [-6.5875, 106.8050],
        "Apotek Kimia Farma Sentul City": [-6.5670, 106.8560],
        "Apotek Kimia Farma Yasmin": [-6.5658, 106.7675],
        "ASTON Bogor Hotel & Resort": [-6.6364, 106.7962],
        "Bobocabin Gunung Mas": [-6.7062251, 106.9688804],
        "Bogor Great Mall": [-6.5560457, 106.7755713],
        "Bogor Icon Hotel": [-6.5561334, 106.7827129],
        "Bukit Pelangi": [-6.618203, 106.8808525],
        "Bumi Aki Kota Baru Parahyangan": [-6.866775, 107.4648551],
        "Curug Bidadari Sentul": [-6.6140625, 106.9084375],
        "Fitra Hotel Majalengka": [-6.8361704, 108.2322636],
        "Grand Cordela Hotel Bandung": [-6.9370389, 107.687952],
        "Grand Diara Hotel Puncak": [-6.6885, 106.9560],
        "Harris Hotel Sentul City": [-6.5595269, 106.8506102],
        "Hotel Green Wattana Sentul": [-6.5590, 106.8580],
        "Hotel Trikarya Cimahi": [-6.8805, 107.5345],
        "IKIGAI Fitness": [-6.6216624, 106.8144763],
        "IPB Hotel & Convention Centre": [-6.6021771, 106.8066276],
        "JungleLand Adventure Theme Park": [-6.5728839, 106.8947001],
        "Kawasan Wisata Situ Gede": [-6.5580, 106.7560],
        "Polsek Dramaga": [-6.5628768, 106.7244512],
        "RS Karya Bhakti Pratiwi": [-6.5694373, 106.7382634],
        "RS Medika Dramaga": [-6.5718338, 106.7394547],
        "Sienna Residence Bogor": [-6.5741302, 106.7508281],
        "Kebun Raya Bogor": [-6.5983048, 106.7994229],
        "Key Inn Hotel": [-6.5835792, 106.7970748],
        "Lapangan Sempur Bogor": [-6.5916349, 106.8007857],
        "Lorin Sentul Hotel": [-6.5315604, 106.85655],
        "Mall AEON Sentul Bogor": [-6.5669259, 106.8578248],
        "Mall BTM": [-6.6048843, 106.7955589],
        "Mall Botani Square Bogor": [-6.6013419, 106.8073342],
        "Mall Jambu Dua": [-6.5687869, 106.8092602],
        "Marcopolo Water Adventure": [-6.5478286, 106.7826037],
        "Mason Pine Hotel": [-6.8639199, 107.4801649],
        "Master Tour & Travel": [-6.6305, 106.8100],
        "Padodi Hotel": [-6.6368, 106.8070],
        "PO Kerub Pariwisata Indonesia": [-6.5709, 106.7717],
        "PO. AdisaPutro Trans": [-6.5565, 106.7575],
        "PO. Bin Ilyas Pariwisata": [-6.5030, 106.8425],
        "PO. Midas Transportasi": [-6.5590, 106.8520],
        "PT. Surya Harapan Perdana (PasteurTrans)": [-6.6085, 106.7945],
        "Polres Cimahi": [-6.8852792, 107.5535739],
        "Polres Majalengka": [-6.8410, 108.2280],
        "Polresta Bogor Kota (Mako Muslihat)": [-6.5965986, 106.7914163],
        "Polsek Arcamanik": [-6.9120, 107.6750],
        "Polsek Babakan Madang": [-6.5716116, 106.8651862],
        "Polsek Bogor Barat": [-6.5820, 106.7785],
        "Polsek Bogor Selatan": [-6.6422893, 106.8076973],
        "Polsek Bogor Utara": [-6.5792052, 106.8067405],
        "Polsek Cisarua": [-6.6926, 106.9458],
        "Polsek Kemang": [-6.4787686, 106.7234857],
        "Polsek Padalarang": [-6.8422655, 107.4969093],
        "Polsek Tanah Sareal": [-6.5425753, 106.7841037],
        "Puskesmas Arcamanik": [-6.9145472, 107.6786845],
        "Puskesmas Babakan Madang": [-6.5324324, 106.8564552],
        "Puskesmas Bogor Tengah": [-6.5929668, 106.7944517],
        "Puskesmas Bogor Utara": [-6.5477817, 106.8218678],
        "Puskesmas Cimahi Tengah": [-6.8723378, 107.5420574],
        "Puskesmas Cipaku": [-6.6304133, 106.8108651],
        "Puskesmas Cisarua": [-6.6821598, 106.9343392],
        "Puskesmas Gang Kelor": [-6.5789198, 106.7725332],
        "Puskesmas Kemang": [-6.539033, 106.7377041],
        "Puskesmas Majalengka": [-6.8313609, 108.2061656],
        "Puskesmas Padalarang": [-6.8425848, 107.4952806],
        "Resto Agrowisata Gunung Mas": [-6.7034, 106.9713],
        "Resto Kampoeng Konsep": [-6.6345, 106.8055],
        "Restoran Lorin Sentul": [-6.5315604, 106.85655],
        "RM Ampera Cisangkan": [-6.8795, 107.5305],
        "RM Khas Sunda Cibiuk Arcamanik": [-6.9105, 107.6740],
        "RM Khas Sunda Saung Balong": [-6.833943, 108.2294288],
        "RS Azra": [-6.5791788, 106.8080928],
        "RS Cahya Kawaluyan": [-6.8657101, 107.4739769],
        "RS Dustira Cimahi": [-6.886595, 107.5342305],
        "RS EMC Sentul": [-6.5671542, 106.8537723],
        "RS Graha Medika Bogor": [-6.5647497, 106.7617167],
        "RS Hermina Arcamanik": [-6.9049139, 107.6667357],
        "RS Hermina Bogor": [-6.5575957, 106.7739056],
        "RS Islam Bogor": [-6.5510, 106.7820],
        "RS Melania Bogor": [-6.6112552, 106.8007868],
        "RS Mulia Pajajaran Bogor": [-6.5755166, 106.807309],
        "RS PMI Bogor": [-6.5984054, 106.8060224],
        "RS Salak Bogor": [-6.5932, 106.8005],
        "RS Sentosa Bogor": [-6.4953005, 106.7511403],
        "RS Siloam Bogor": [-6.5955895, 106.8049335],
        "RS UMMI": [-6.6088556, 106.7946494],
        "RS VANIA": [-6.6128581, 106.8079247],
        "RSIA Pasutri Bogor": [-6.5705914, 106.7989952],
        "RSP Goenawan Partowidigdo": [-6.6883853, 106.9395411],
        "RSUD Kota Bogor": [-6.5804103, 106.7784481],
        "RSUD Majalengka": [-6.7608967, 108.1955299],
        "Rumah Makan Ampera Pemuda": [-6.5789558, 106.7964602],
        "Rumah Makan Ampera Yasmin": [-6.5592, 106.7839],
        "Swiss-Belcourt Bogor": [-6.5573, 106.7817],
        "Swiss-Belhotel Bogor": [-6.5886646, 106.8042799],
        "Syafa Tour and Travel Bogor": [-6.5975, 106.8285],
        "The Grand Hill Hotel": [-6.6894345, 106.9610658],
        "The Jungle Water Park": [-6.6344256, 106.7954514],
        "The Mirah Hotel Bogor": [-6.5907329, 106.8036028],
        "The Sahira Hotel": [-6.5750492, 106.8001943],
        "Teras Om Frend": [-6.5885, 106.8092],
        "Toko Adelways (Kantin IPB Cilibende)": [-6.5954187, 106.7882974],
        "WHIZ Prime Hotel Bogor Yasmin": [-6.5668, 106.7705],
        "Yasmin Waterpark": [-6.5617285, 106.7651193],
        "Zest Hotel Bogor": [-6.5933754, 106.8051007],
    };

    let map;
    let markers = []; // Marker untuk Venue (Merah)
    let currentVenue = null;
    let currentRouteLayer = null;
    let routeStopMarkers = [];
    let userLocationMarker = null;
    let facilityLayerMarkers = [];

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
            rekreasi: 'rekreasi',
            mall: 'mall'
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
            } else if (type === 'mall') {
                iconBg = '#ede9fe';
                iconColor = '#7c3aed';
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

    function norm(s) {
        return (s || '').toString().toLowerCase().replace(/[\s-]+/g, '');
    }

    // Fungsi Render Marker Venue
    function renderVenues(venuesData, filterCabors) {
        venuesData.forEach(venue => {
            const caborList = venue.cabor.split(',').map(c => c.trim());
            caborList.forEach((cabor, index) => {
                if (filterCabors && filterCabors.length && !filterCabors.includes(norm(cabor))) return;
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
                    if (window.applyFasilitasFilter) {
                        const f = document.getElementById('fasilitas');
                        window.applyFasilitasFilter(f ? f.value : '');
                    }
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

        const allCaborOptions = Array.from(caborSelect.options).map(o => ({
            value: o.value,
            text: o.text
        }));

        function filterCaborByVenue() {
            const venueVal = venueSelect.value.toLowerCase();
            const currentCabor = caborSelect.value;
            caborSelect.innerHTML = '';
            caborSelect.add(new Option(allCaborOptions[0].text, ''));

            if (venueVal) {
                const venue = venueData.find(v => norm(v.name).includes(norm(venueVal)));
                if (venue) {
                    const venueCabors = venue.cabor.split(',').map(c => norm(c));
                    allCaborOptions.slice(1).forEach(o => {
                        if (venueCabors.includes(norm(o.text))) {
                            caborSelect.add(new Option(o.text, o.value));
                        }
                    });
                } else {
                    allCaborOptions.slice(1).forEach(o => caborSelect.add(new Option(o.text, o.value)));
                }
            } else {
                allCaborOptions.slice(1).forEach(o => caborSelect.add(new Option(o.text, o.value)));
            }

            caborSelect.value = Array.from(caborSelect.options).some(o => o.value === currentCabor) ? currentCabor : '';
        }

        window.filterCaborByVenue = filterCaborByVenue;

        function applyFasilitasFilter(fasilitasVal) {
            const filterToCategory = {
                'hotel': 'cat-hotel',
                'rumah-sakit': 'cat-rs',
                'apotek': 'cat-apotek',
                'rumah-makan': 'cat-resto',
                'polisi': 'cat-police',
                'transport': 'cat-transport',
                'rekreasi': 'cat-rekreasi',
                'mall': 'cat-mall',
            };
            const targetCat = filterToCategory[fasilitasVal];
            const placeholder = document.getElementById('facilities-placeholder');

            document.querySelectorAll('.facility-filter-btn').forEach(btn => btn.classList.remove('active'));

            if (!currentVenue) {
                if (placeholder) placeholder.style.display = 'block';
                document.querySelectorAll('.facility-category').forEach(cat => cat.style.display = 'none');
                document.querySelectorAll('.facility-filter-btn').forEach(btn => {
                    if (btn.dataset.filter === 'all') btn.classList.add('active');
                });
                return;
            }

            if (!targetCat) {
                if (placeholder) placeholder.style.display = 'none';
                document.querySelectorAll('.facility-category').forEach(cat => cat.style.display = 'block');
                document.querySelectorAll('.facility-filter-btn').forEach(btn => {
                    if (btn.dataset.filter === 'all') btn.classList.add('active');
                });
                return;
            }

            if (placeholder) placeholder.style.display = 'none';
            document.querySelectorAll('.facility-category').forEach(cat => {
                cat.style.display = cat.id === targetCat ? 'block' : 'none';
            });
            document.querySelectorAll('.facility-filter-btn').forEach(btn => {
                if (btn.dataset.filter === targetCat) btn.classList.add('active');
            });
        }

        window.applyFasilitasFilter = applyFasilitasFilter;

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
            clearRoute(); // Bersihkan rute sebelumnya
            document.getElementById('floating-gor-card').style.display = 'none';

            const bounds = L.latLngBounds();

            // 1. Proses Filter Cabor & Venue
            const filteredVenues = venueData.filter(v => {
                let matchCabor = true;
                let matchVenue = true;

                if (caborVal) matchCabor = norm(v.cabor).includes(norm(caborVal));
                if (venueVal) matchVenue = norm(v.name).includes(norm(venueVal));

                return matchCabor && matchVenue;
            });

            let filterCabors = [];
            if (caborVal) {
                filterCabors = Object.keys(caborIcons)
                    .filter(k => norm(k).includes(norm(caborVal)))
                    .map(k => norm(k));
            }

            if (filteredVenues.length > 0) {
                renderVenues(filteredVenues, filterCabors);
                filteredVenues.forEach(v => bounds.extend([v.lat, v.lng]));
                if (filteredVenues.length === 1) {
                    const singleVenue = filteredVenues[0];
                    currentVenue = singleVenue;
                    smoothFlyTo([singleVenue.lat, singleVenue.lng], 16);
                    showVenueDetails(singleVenue);
                } else {
                    smoothFlyToBounds(bounds, {
                        padding: [50, 50],
                        maxZoom: 15
                    });
                }
            } else {
                alert('Venue tidak ditemukan dengan kriteria tersebut.');
                resetVenueBounds();
            }

            // 2. Proses Fasilitas — ikuti venue terakhir dipilih
            applyFasilitasFilter(fasilitasVal);
        });

        // Saat form di-reset
        filterForm.addEventListener('reset', function() {
            setTimeout(() => {
                clearMarkers();
                clearRoute();
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
                // Pulihkan daftar Cabor penuh (tidak terikat venue sebelumnya)
                const venueSel = document.getElementById('venue');
                const caborSel = document.getElementById('cabor');
                if (venueSel) venueSel.value = '';
                if (caborSel) filterCaborByVenue();
                currentVenue = null;
            }, 100);
        });
    }

    function showVenueDetails(venue) {
        currentVenue = venue;
        clearRoute();
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
                ['mall', 'mall-container', 'Mall', 'cat-mall'],
            ];
            venueTypes.forEach(function(t) {
                renderFacilityCategory(venue, t[0], t[1], t[2], t[3]);
            });
        }

        // Siapkan kontrol rute di card venue
        const routeControls = document.getElementById('route-controls');
        if (routeControls) routeControls.style.display = 'flex';
        const routeErr = document.getElementById('route-error');
        if (routeErr) routeErr.style.display = 'none';

        if (window.innerWidth <= 768 && floatingCard) {
            floatingCard.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
        }

        // Rute tampil otomatis setiap venue dipilih/dibuka
        if (map && currentVenue) {
            setTimeout(() => { startAutoRoute(); }, 60);
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
            'cat-mall': {
                type: 'mall',
                containerId: 'mall-container',
                title: 'Mall',
                catId: 'cat-mall'
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

    // ═══════════════════════════════════════════════════════════════
    // ROUTING — Satu jalur rute otomatis dari venue → fasilitas terdekat
    // Geocoding: OSM Nominatim via JSONP (bebas CORS, gratis, tanpa API key)
    // Routing:   OSRM Route Service (urutan greedy → satu LineString mengikuti jalan)
    // ═══════════════════════════════════════════════════════════════

    // Rute biru tunggal: lokasi pengguna → ≤6 fasilitas VALID → venue
    // (tanpa lokasi: venue → ≤6 fasilitas VALID terdekat). Marker & jalur rute
    // memakai satu set yang sama (≤7). Fasilitas tanpa koordinat valid DILEWATI
    // (pakai berikutnya), tanpa koordinat palsu/estimasi. GEOCODE_LIMIT
    // membatasi request geocode runtime.
    const ROUTE_STOPS_MAX = 7;      // maks fasilitas yang masuk marker & jalur rute (3–7)
    const ROUTE_GEOCODE_LIMIT = 24; // maks fasilitas yang dicoba di-geocode runtime
    const NOMINATIM_DELAY_MS = 1100; // rate limit Nominatim (>= 1 detik/request)

    function createFacilityStopIcon(color) {
        return L.divIcon({
            html: `<div class="route-stop-marker" style="--stop-color:${color}">
                <span></span>
            </div>`,
            className: '',
            iconSize: [18, 18],
            iconAnchor: [9, 9]
        });
    }

    // Icon marker lokasi pengguna — berbeda dari marker fasilitas/venue.
    function createUserLocationIcon() {
        return L.divIcon({
            html: `<div class="user-loc-marker"><span class="ul-pulse"></span><span class="ul-core"></span></div>`,
            className: '',
            iconSize: [24, 24],
            iconAnchor: [12, 12]
        });
    }

    // Ambil lokasi pengguna via geolocation browser (titik awal rute).
    // Return Promise.resolve(pos) atau Promise.resolve({ error: 'denied'|'unavailable' }).
    function getUserLocation() {
        return new Promise(resolve => {
            if (!('geolocation' in navigator)) {
                return resolve({ error: 'unavailable' });
            }
            navigator.geolocation.getCurrentPosition(
                function(pos) {
                    resolve({ lat: pos.coords.latitude, lng: pos.coords.longitude });
                },
                function(err) {
                    const denied = err && (err.code === err.PERMISSION_DENIED || err.code === 1);
                    resolve({ error: denied ? 'denied' : 'unavailable' });
                },
                { enableHighAccuracy: true, timeout: 10000, maximumAge: 30000 }
            );
        });
    }

    function clearRoute() {
        if (currentRouteLayer && map) {
            map.removeLayer(currentRouteLayer);
            currentRouteLayer = null;
        }
        (routeStopMarkers || []).forEach(m => { if (m && map) map.removeLayer(m); });
        routeStopMarkers = [];
        if (userLocationMarker && map) {
            map.removeLayer(userLocationMarker);
            userLocationMarker = null;
        }
        (facilityLayerMarkers || []).forEach(m => { if (m && map) map.removeLayer(m); });
        facilityLayerMarkers = [];
        const info = document.getElementById('route-info');
        const error = document.getElementById('route-error');
        const usage = document.getElementById('route-usage');
        const loading = document.getElementById('route-loading');
        const btnClear = document.getElementById('btn-clear-route');
        const btnRoute = document.getElementById('btn-show-route');
        const infoTitle = document.getElementById('route-info-title');
        if (info) info.style.display = 'none';
        if (infoTitle) infoTitle.textContent = '';
        if (error) error.style.display = 'none';
        if (usage) usage.style.display = 'none';
        if (loading) loading.style.display = 'none';
        if (btnClear) btnClear.style.display = 'none';
        if (btnRoute) {
            btnRoute.classList.remove('loading');
            btnRoute.disabled = false;
            btnRoute.style.display = 'flex';
        }
    }

    function formatDistance(meters) {
        if (meters >= 1000) {
            return (meters / 1000).toFixed(1) + ' km';
        }
        return Math.round(meters) + ' m';
    }

    function formatDuration(seconds) {
        const mins = Math.round(seconds / 60);
        if (mins < 60) return mins + ' menit';
        const hours = Math.floor(mins / 60);
        const remainMins = mins % 60;
        return hours + ' jam ' + remainMins + ' menit';
    }

    // Ekstrak koordinat langsung dari URL Google Maps jika tersedia (tanpa geocoding)
    function extractCoordsFromMapUrl(mapUrl) {
        if (!mapUrl) return null;
        const m3 = mapUrl.match(/!3d(-?\d+\.?\d*)!4d(-?\d+\.?\d*)/);
        if (m3) return { lat: parseFloat(m3[1]), lng: parseFloat(m3[2]) };
        const mAt = mapUrl.match(/@(-?\d+\.?\d*),(-?\d+\.?\d*)/);
        if (mAt) return { lat: parseFloat(mAt[1]), lng: parseFloat(mAt[2]) };
        const mQuery = mapUrl.match(/query=(-?\d+\.?\d*),(-?\d+\.?\d*)/);
        if (mQuery) return { lat: parseFloat(mQuery[1]), lng: parseFloat(mQuery[2]) };
        return null;
    }

    // Ekstrak teks nama+alamat dari URL text-search Google Maps utk geocoding
    function parseQueryFromMapUrl(mapUrl) {
        if (!mapUrl) return null;
        const m = mapUrl.match(/[?&]query=([^&]+)/);
        if (!m) return null;
        try {
            return decodeURIComponent(m[1].replace(/\+/g, ' '));
        } catch (e) {
            return null;
        }
    }

    // Geocode satu fasilitas via OSM Nominatim (tanpa API key).
    // Dipanggil via JSONP (<script src>) sehingga bebas dari blokir CORS browser.
    // Return null jika gagal/rate-limit/response kosong (fasilitas di-skip, tanpa koordinat palsu).
    function geocodeFacility(query) {
        return new Promise(resolve => {
            if (!query) return resolve(null);
            const cbName = '_nomCb_' + Date.now() + '_' + Math.floor(Math.random() * 1e5);
            let done = false;
            let s = null;
            let timer = null;
            function finish(val) {
                if (done) return;
                done = true;
                clearTimeout(timer);
                if (s && s.parentNode) s.parentNode.removeChild(s);
                delete window[cbName];
                resolve(val);
            }
            window[cbName] = function(data) {
                if (!data || data.length === 0) return finish(null);
                finish({ lat: parseFloat(data[0].lat), lng: parseFloat(data[0].lon) });
            };
            try {
                s = document.createElement('script');
                s.async = true;
                s.onerror = function() { finish(null); };
                s.src = 'https://nominatim.openstreetmap.org/search?' + new URLSearchParams({
                    q: query,
                    format: 'json',
                    limit: '1',
                    countrycodes: 'id',
                    json_callback: cbName
                }).toString();
            } catch (e) {
                finish(null);
                return;
            }
            timer = setTimeout(function() { finish(null); }, 8000);
            document.head.appendChild(s);
        });
    }

    function haversineKm(lat1, lng1, lat2, lng2) {
        const R = 6371;
        const dLat = (lat2 - lat1) * Math.PI / 180;
        const dLng = (lng2 - lng1) * Math.PI / 180;
        const a = Math.sin(dLat / 2) ** 2 +
            Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
            Math.sin(dLng / 2) ** 2;
        return R * 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    }

    // Parse nilai jarak dari data fasilitas ("300 m", "1.2 km") menjadi km.
    function parseDistanceKm(str) {
        if (!str) return NaN;
        const m = String(str).trim().match(/^([\d.,]+)\s*(km|m)?$/i);
        if (!m) return NaN;
        const v = parseFloat(m[1].replace(',', '.'));
        if (isNaN(v) || v < 0) return NaN;
        return (m[2] || '').toLowerCase() === 'm' ? v / 1000 : v;
    }

    // Bearing awal (derajat 0-360) dari titik A ke titik B.
    function bearingDeg(lat1, lng1, lat2, lng2) {
        const toRad = Math.PI / 180;
        const phi1 = lat1 * toRad;
        const phi2 = lat2 * toRad;
        const dLng = (lng2 - lng1) * toRad;
        const y = Math.sin(dLng) * Math.cos(phi2);
        const x = Math.cos(phi1) * Math.sin(phi2) - Math.sin(phi1) * Math.cos(phi2) * Math.cos(dLng);
        return (Math.atan2(y, x) * 180 / Math.PI + 360) % 360;
    }

    // Titik tujuan dari start + arah (derajat) + jarak (km).
    function destinationPoint(lat, lng, brngDeg, km) {
        const toRad = Math.PI / 180;
        const R = 6371;
        const brng = brngDeg * toRad;
        const d = km / R;
        const phi1 = lat * toRad;
        const lam1 = lng * toRad;
        const phi2 = Math.asin(Math.sin(phi1) * Math.cos(d) + Math.cos(phi1) * Math.sin(d) * Math.cos(brng));
        const lam2 = lam1 + Math.atan2(
            Math.sin(brng) * Math.sin(d) * Math.cos(phi1),
            Math.cos(d) - Math.sin(phi1) * Math.sin(phi2)
        );
        return { lat: phi2 / toRad, lng: lam2 / toRad };
    }

    // Ekstrak nama kota/kabupaten dari alamat venue untuk fallback geocoding.
    function extractCityFromAddress(address) {
        if (!address) return '';
        const m = address.match(/(?:Kota|Kab(?:upaten)?\.?\s+)(\w[\w\s]*?)(?:,|\s*\d|$)/i);
        if (m) return m[1].trim();
        // fallback: cari kata kota umum
        const cities = ['Bogor', 'Cimahi', 'Bandung', 'Majalengka', 'Padalarang', 'Depok', 'Bekasi', 'Sukabumi'];
        for (const c of cities) {
            if (address.indexOf(c) !== -1) return c;
        }
        return '';
    }

    // Ambil fasilitas terdekat (sesuai daftar per venue) dari venue;
    // utk masing-masing dapatkan koordinat: baked → URL map → geocoding runtime.
    // Return: array fasilitas ber-koordinat valid yang terpakai sebagai marker
    // DAN jalur rute (satu set yang sama). realOnly=true: hasil dipotong ke
    // ≤ ROUTE_STOPS_MAX fasilitas terdekat; fasilitas tanpa koordinat valid
    // DILEWATI (tanpa estimasi/palsu). Geocode: nama pendek dulu (hit-rate
    // tinggi), fallback nama+kota. Filter: hasil geocode harus ≤ 40 km dari
    // venue (buang false positive).
    async function collectNearestFacilities(venue, opts) {
        const venueFacilities = facilitiesData[venue.name];
        if (!venueFacilities) return [];

        opts = opts || {};
        const MAX_DIST_KM = 40; // toleransi jarak maks dari venue
        const venueCity = extractCityFromAddress(venue.address);

        const priorityOrder = ['hospital', 'hotel', 'pharmacy', 'restaurant', 'police', 'transport', 'rekreasi', 'mall', 'lodging'];
        const categoryLabels = {
            hotel: 'Hotel', lodging: 'Hotel', hospital: 'Rumah Sakit',
            pharmacy: 'Apotek', restaurant: 'Restoran', police: 'Polisi',
            transport: 'Transport', rekreasi: 'Rekreasi', mall: 'Mall'
        };

        // Kumpulkan semua kandidat fasilitas (kategori prioritas didahulukan)
        const candidates = [];
        priorityOrder.forEach(type => {
            const items = venueFacilities[type] || [];
            items.forEach(item => {
                if (!item || !item.name) return;
                candidates.push({
                    name: item.name,
                    address: item.address || '',
                    distance: item.distance || '',
                    mapUrl: item.mapUrl || '',
                    type: type,
                    label: categoryLabels[type] || type
                });
            });
        });

        // Batasi jumlah yg dicoba di-geocode agar cepat (prioritas kategori)
        const toProcess = candidates.slice(0, ROUTE_GEOCODE_LIMIT);
        let resolved = [];
        const needsEstimate = [];

        for (let i = 0; i < toProcess.length; i++) {
            const fac = toProcess[i];
            let coord = null;

            // Prioritas 1: koordinat yang sudah di-bake di facilityCoordsMap
            const baked = facilityCoordsMap[fac.name];
            if (baked) {
                coord = { lat: baked[0], lng: baked[1] };
            } else {
                // Prioritas 2: ekstrak koordinat dari URL Google Maps
                coord = extractCoordsFromMapUrl(fac.mapUrl);
            }

            if (!coord) {
                // Prioritas 3: geocoding runtime bertingkat (nama pendek → nama + kota)
                const queryChain = [fac.name];
                if (venueCity && fac.name.indexOf(venueCity) === -1) {
                    queryChain.push(fac.name + ' ' + venueCity);
                }

                for (let qi = 0; qi < queryChain.length; qi++) {
                    const result = await geocodeFacility(queryChain[qi]);
                    if (result) {
                        // Filter jarak: buang false positive (salah kota/provinsi)
                        const dist = haversineKm(result.lat, result.lng, venue.lat, venue.lng);
                        if (dist <= MAX_DIST_KM) {
                            coord = result;
                            break;
                        }
                    }
                    // delay rate limit antar request
                    await new Promise(r => setTimeout(r, NOMINATIM_DELAY_MS));
                }
            }

            if (coord) {
                coord.distToVenue = haversineKm(coord.lat, coord.lng, venue.lat, venue.lng);
                coord.name = fac.name;
                coord.type = fac.type;
                coord.label = fac.label;
                coord.address = fac.address;
                coord.estimated = false;
                resolved.push(coord);
            } else {
                needsEstimate.push(fac);
            }
        }

        // FALLBACK ESTIMASI (hanya utk tampilan peta, BUKAN utk rute).
        // Saat realOnly=true, fasilitas tanpa koordinat valid DILEWATI —
        // "jangan membuat koordinat palsu", rute pakai fasilitas berikutnya.
        if (!opts.realOnly && needsEstimate.length > 0 && resolved.length > 0) {
            const anchor = resolved.slice().sort((a, b) => a.distToVenue - b.distToVenue)[0];
            needsEstimate.forEach(fac => {
                const distKm = parseDistanceKm(fac.distance);
                if (!(distKm > 0) || distKm > MAX_DIST_KM) return;
                const brng = bearingDeg(venue.lat, venue.lng, anchor.lat, anchor.lng);
                const p = destinationPoint(venue.lat, venue.lng, brng, distKm);
                resolved.push({
                    lat: p.lat, lng: p.lng,
                    distToVenue: distKm,
                    name: fac.name,
                    type: fac.type,
                    label: fac.label,
                    address: fac.address,
                    estimated: true
                });
            });
        }

        // urutkan fasilitas berdasarkan jarak ke venue (terdekat → terjauh).
        resolved.sort((a, b) => a.distToVenue - b.distToVenue);

        // realOnly=true: marker & jalur rute memakai satu set fasilitas terdekat
        // (≤ ROUTE_STOPS_MAX). Fasilitas tanpa koordinat valid sudah DILEWATI
        // saat pengumpulan kandidat (tanpa estimasi/palsu). Fasilitas yang
        // ter-pin (routePinnedFacilities) WAJIB ikut rute; sisanya terdekat.
        if (opts.realOnly) {
            const capStops = (venue && venue.maxStops) ? venue.maxStops : ROUTE_STOPS_MAX;
            const pinnedList = (routePinnedFacilities && routePinnedFacilities[venue.name]) || [];
            if (pinnedList.length > 0) {
                const pinned = resolved.filter(f => pinnedList.indexOf(f.name) !== -1);
                const rest = resolved.filter(f => pinnedList.indexOf(f.name) === -1);
                resolved = pinned.concat(rest).slice(0, capStops);
                resolved.sort((a, b) => a.distToVenue - b.distToVenue);
            } else {
                resolved = resolved.slice(0, capStops);
            }
        }

        return resolved;
    }

    // Susun urutan kunjungan secara logis (greedy nearest-neighbor):
    // mulai dari titik start, selalu lanjut ke titik terdekat yang belum
    // dikunjungi, akhiri di venue. Hanya menentukan URUTAN waypoint,
    // bukan bentuk garis (bentuk garis tetap dari OSRM route geometry).
    function orderWaypoints(points, startIdx, endIdx) {
        const remaining = points.map((_, i) => i);
        const removeIdx = (arr, idx) => arr.splice(arr.indexOf(idx), 1);
        const order = [startIdx];
        removeIdx(remaining, startIdx);
        removeIdx(remaining, endIdx);

        let cur = startIdx;
        while (remaining.length > 0) {
            let best = -1;
            let bestDist = Infinity;
            for (let i = 0; i < remaining.length; i++) {
                const d = haversineKm(
                    points[cur].lat, points[cur].lng,
                    points[remaining[i]].lat, points[remaining[i]].lng
                );
                if (d < bestDist) {
                    bestDist = d;
                    best = remaining[i];
                }
            }
            if (best === -1) break;
            order.push(best);
            removeIdx(remaining, best);
            cur = best;
        }
        order.push(endIdx);
        return order.map(i => points[i]);
    }

    // OSRM: gabungkan semua waypoint jadi SATU LineString geometry yang
    // mengikuti jalan sebenarnya (bukan garis lurus antar titik).
    // 1) Coba /trip (roundtrip=false) utk OPTIMASI urutan waypoint.
    // 2) Fallback ke /route dgn urutan greedy yg sudah ditentukan
    //    (dua-duanya tetap mengikuti jaringan jalan).
    async function fetchConnectedRoute(points) {
        if (!points || points.length < 2) return null;
        const coordsStr = points.map(p => `${p.lng},${p.lat}`).join(';');
        const base = 'https://router.project-osrm.org';

        try {
            const tripUrl = `${base}/trip/v1/driving/${coordsStr}?roundtrip=false&source=first&destination=last&overview=full&geometries=geojson&steps=false`;
            const res = await fetch(tripUrl);
            if (res.ok) {
                const data = await res.json();
                if (data.code === 'Ok' && data.trips && data.trips.length > 0) {
                    const t = data.trips[0];
                    if (t.legs && t.legs.length > 0 && t.geometry) {
                        const coords = t.geometry.coordinates.map(c => [c[1], c[0]]);
                        return { coordinates: coords, distance: t.distance, duration: t.duration };
                    }
                }
            }
        } catch (e) { /* lanjut ke fallback route */ }

        try {
            const routeUrl = `${base}/route/v1/driving/${coordsStr}?overview=full&geometries=geojson`;
            const res = await fetch(routeUrl);
            if (!res.ok) return null;
            const data = await res.json();
            if (data.code !== 'Ok' || !data.routes || data.routes.length === 0) return null;
            const route = data.routes[0];
            const coords = route.geometry.coordinates.map(c => [c[1], c[0]]);
            return {
                coordinates: coords,
                distance: route.distance,
                duration: route.duration
            };
        } catch (e) {
            return null;
        }
    }

    // Orchestrator utama: tombol "Tampilkan Rute" → lokasi pengguna →
    // fasilitas terdekat (koordinat valid saja) → OSRM buat SATU jalur
    // biru: lokasi pengguna → ≤6 fasilitas → venue.
    async function startAutoRoute() {
        if (!currentVenue || !map) return;

        clearRoute();

        const btn = document.getElementById('btn-show-route');
        const loading = document.getElementById('route-loading');
        const error = document.getElementById('route-error');
        const info = document.getElementById('route-info');
        const usage = document.getElementById('route-usage');
        const btnClear = document.getElementById('btn-clear-route');
        const infoTitle = document.getElementById('route-info-title');

        // state loading
        if (btn) btn.style.display = 'none';
        loading.style.display = 'flex';

        // 1. Lokasi pengguna = titik awal rute (OPSIONAL). Jika diizinkan →
        //    user → fasilitas → venue. Jika ditolak/tak ada → rute dari venue
        //    → fasilitas terdekat (tetap satu garis biru utuh, tanpa wajib izin).
        const pos = await getUserLocation();
        const hasUserLoc = !!(pos && !pos.error);
        if (hasUserLoc) {
            userLocationMarker = L.marker([pos.lat, pos.lng], {
                icon: createUserLocationIcon(),
                zIndexOffset: 1000
            }).addTo(map);
            userLocationMarker.bindTooltip('Lokasi Anda');
        }

        // 2. Fasilitas terdekat dengan koordinat VALID (baked/URL/geocode), satu
        //    set yang sama untuk marker & jalur rute (≤ ROUTE_STOPS_MAX).
        //    Tanpa koordinat valid → dilewati, pakai fasilitas berikutnya.
        let facilityCoords = [];
        try {
            facilityCoords = await collectNearestFacilities(currentVenue, { realOnly: true });
        } catch (e) {
            facilityCoords = [];
        }

        // 3. Marker fasilitas terdekat di peta (warna per kategori).
        const stopColors = {
            hospital: '#dc2626', hotel: '#d97706', lodging: '#d97706',
            pharmacy: '#9333ea', restaurant: '#16a34a', police: '#4f46e5',
            transport: '#0284c7', rekreasi: '#0d9488', mall: '#0ea5e9', venue: '#2563eb'
        };
        facilityLayerMarkers = [];
        facilityCoords.forEach(f => {
            const color = stopColors[f.type] || '#6b7280';
            const m = L.marker([f.lat, f.lng], {
                icon: createFacilityStopIcon(color),
                zIndexOffset: 300
            }).addTo(map);
            m.bindTooltip(`${f.label || ''} ${f.name}` + (f.address ? ' · ' + f.address : ''));
            facilityLayerMarkers.push(m);
        });

        // 4. Waypoint: (lokasi user →) ≤ROUTE_STOPS_MAX fasilitas terdekat → venue.
        const venuePts = facilityCoords.map(f => ({
            lat: f.lat, lng: f.lng,
            name: f.name, type: f.type, label: f.label,
            address: f.address, estimated: f.estimated
        }));
        const waypoints = [];
        if (hasUserLoc) {
            waypoints.push({ lat: pos.lat, lng: pos.lng, name: 'Lokasi Anda', type: 'user' });
        } else {
            waypoints.push({ lat: currentVenue.lat, lng: currentVenue.lng, name: currentVenue.name, type: 'venue' });
        }
        waypoints.push(...venuePts);
        if (hasUserLoc) {
            waypoints.push({ lat: currentVenue.lat, lng: currentVenue.lng, name: currentVenue.name, type: 'venue' });
        }

        // 5. Urutkan kunjungan: mulai dari titik awal (index 0), akhiri di
        //    venue (pakai lokasi) atau fasilitas terjauh (tanpa lokasi).
        const orderedPoints = orderWaypoints(waypoints, 0, waypoints.length - 1);

        // 6. OSRM (trip utk optimasi urutan, fallback route greedy) — SATU
        //    LineString yang mengikuti jalan sebenarnya.
        const result = await fetchConnectedRoute(orderedPoints);

        loading.style.display = 'none';
        if (btn) btn.style.display = 'flex';

        if (!result) {
            error.textContent = 'Rute tidak dapat ditemukan.';
            error.style.display = 'flex';
            return;
        }

        // 7. Polyline biru tunggal
        currentRouteLayer = L.polyline(result.coordinates, {
            color: '#2563eb',
            weight: 5,
            opacity: 0.78,
            smoothFactor: 1,
            lineCap: 'round',
            lineJoin: 'round'
        }).addTo(map);

        // 8. Info jarak/waktu/jumlah fasilitas
        infoTitle.textContent = hasUserLoc
            ? 'Rute ke ' + currentVenue.name
            : 'Rute dari ' + currentVenue.name + ' ke fasilitas terdekat';
        document.getElementById('route-distance').textContent = formatDistance(result.distance);
        document.getElementById('route-duration').textContent = formatDuration(result.duration);
        document.getElementById('route-stops').textContent = venuePts.length + ' fasilitas di rute';
        info.style.display = 'flex';
        btnClear.style.display = 'flex';

        // 9. Zoom fit keseluruhan rute (user → venue)
        const bounds = L.latLngBounds([
            [hasUserLoc ? pos.lat : currentVenue.lat, hasUserLoc ? pos.lng : currentVenue.lng],
            [currentVenue.lat, currentVenue.lng]
        ]);
        result.coordinates.forEach(c => bounds.extend(c));
        map.flyToBounds(bounds, {
            padding: [60, 60],
            maxZoom: 15,
            duration: 1.2
        });
    }

    function setupRouteControls() {
        const btnRoute = document.getElementById('btn-show-route');
        const btnClear = document.getElementById('btn-clear-route');
        const routeError = document.getElementById('route-error');

        if (btnRoute) {
            btnRoute.addEventListener('click', function() {
                if (!currentVenue) return;
                routeError.style.display = 'none';
                startAutoRoute();
            });
        }

        if (btnClear) {
            btnClear.addEventListener('click', function() {
                clearRoute();
            });
        }
    }

    window.onload = function() {
        initMap();
        setupRouteControls();
        window.addEventListener('resize', function() {
            if (map) map.invalidateSize();
        });
    };
</script>
@endpush