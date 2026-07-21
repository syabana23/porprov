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

    .map-section {
        position: relative;
        width: 100%;
        height: 450px;
        background: #dde;
    }

    #map-canvas {
        width: 100% !important;
        height: 450px !important;
        display: block !important;
    }

    /* Floating GOR Card */
    .gor-card {
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
        /* Muncul via JS saat pin diklik */
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

    /* ── Content below map ── */
    .venue-body {
        max-width: 1200px;
        margin: 0 auto;
        padding: 28px 20px 40px;
    }

    .section-title {
        font-size: 18px;
        font-weight: 800;
        color: #013469;
        margin-bottom: 16px;
        text-transform: uppercase;
        border-left: 4px solid #2BB673;
        padding-left: 8px;
    }

    .place-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px;
    }

    /* Cards Layout */
    .place-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.09);
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .place-card .pc-img {
        height: 170px;
        overflow: hidden;
    }

    .place-card .pc-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .place-card:hover .pc-img img {
        transform: scale(1.04);
    }

    .place-card .pc-body {
        padding: 16px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .place-card .pc-name {
        font-size: 16px;
        font-weight: 800;
        color: #013469;
        margin: 0 0 6px;
    }

    .place-card .stars {
        display: flex;
        gap: 2px;
        margin-bottom: 6px;
    }

    .place-card .stars svg {
        color: #FDB813;
    }

    .place-card .pc-distance {
        font-size: 12px;
        font-weight: 700;
        color: #2BB673;
        margin: 0 0 8px;
    }

    .place-card .pc-addr {
        display: flex;
        align-items: flex-start;
        gap: 6px;
        font-size: 11px;
        color: #6b7280;
        margin-bottom: 12px;
        line-height: 1.5;
    }

    .place-card .pc-section-title {
        font-size: 12px;
        font-weight: 700;
        color: #013469;
        margin: 0 0 8px;
    }

    /* Facilities & Services */
    .facility-icons,
    .layanan-icons {
        display: flex;
        gap: 12px;
        margin-bottom: 14px;
    }

    .fi-item,
    .li-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
        width: 55px;
    }

    .fi-item svg,
    .li-item svg {
        color: #6b7280;
    }

    .fi-item span,
    .li-item span {
        font-size: 9px;
        color: #6b7280;
        text-align: center;
        white-space: nowrap;
    }

    .place-card .map-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        background: #013469;
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        padding: 9px 14px;
        border-radius: 7px;
        text-decoration: none;
        transition: background 0.2s;
        margin-top: auto;
    }

    .place-card .map-btn:hover {
        background: #012050;
    }

    @media (max-width: 768px) {
        .place-grid {
            grid-template-columns: 1fr;
        }

        .gor-card {
            position: relative;
            top: 0;
            right: 0;
            width: 100%;
            box-shadow: none;
            border-radius: 0;
        }

        .map-section {
            height: 350px;
        }

        .venue-banner {
            height: auto;
            min-height: 80px;
            padding: 16px;
        }
        .venue-banner h1 {
            font-size: 14px;
        }
        .venue-banner p {
            font-size: 10px;
        }
        #map-canvas {
            height: 350px !important;
        }
        .venue-body {
            padding: 20px 16px 32px;
        }
        .section-title {
            font-size: 15px;
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

<section class="map-section">
    <div id="map-canvas"></div>

    <div class="gor-card" id="floating-gor-card">
        <div class="gor-card-header">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" style="color: #374151;">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/>
            </svg>
            <span id="card-gor-name">-</span>
        </div>
        <div class="gor-card-body">
            <div class="addr">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" style="color: #6b7280; flex-shrink: 0; margin-top: -2px;">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/>
                </svg>
                <span id="card-gor-addr">-</span>
            </div>
            <div class="cabang-title">CABANG OLAHRAGA</div>
            <div class="cabor-grid" id="card-gor-cabor-grid"></div>

            <div class="tags-container">
                <span class="tag-pill">Hotel</span>
                <span class="tag-pill">Restoran</span>
                <span class="tag-pill">Kesehatan</span>
                <span class="tag-pill">Toko Obat</span>
            </div>

            <a href="#" id="card-gor-gmaps" target="_blank" class="map-btn">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 19H5V5h7V3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/>
                </svg>
                Buka di Google Maps
            </a>
        </div>
    </div>
</section>

<div class="venue-body">
    <div class="place-grid">
        <div>
            <h2 class="section-title">Hotel Terdekat (Radius < 3 Km)</h2>
                    <div id="hotel-container">
                        <p style="color:#6b7280; font-style:italic;">Silahkan klik salah satu pin venue pada peta terlebih dahulu.</p>
                    </div>
        </div>

        <div>
            <h2 class="section-title">Rumah Sakit Rujukan Terdekat</h2>
            <div id="rs-container">
                <p style="color:#6b7280; font-style:italic;">Silahkan klik salah satu pin venue pada peta terlebih dahulu.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF8W19WIUtkrIWIXb22YbAOxxdtsZKugU"></script>

<script>
    // 1. DATABASE DATA STRUKTUR (Venue GOR, Hotel & RS Terdekat)
    const venueData = [{
            id: 1,
            name: "GOR Pajajaran Indoor A",
            lat: -6.583321,
            lng: 106.800532,
            address: "Jl. Pemuda No.4, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16161",
            cabor: "Drumband, Pencak Silat, Taekwondo",
            image: "https://images.unsplash.com/photo-1574629810360-7efbb4d6cc12?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=GOR+Pajajaran+Bogor",
            hotels: [{
                    name: "Hotel Santika Bogor",
                    stars: 3,
                    distance: "2.1 km",
                    address: "Botani Square, Jl. Raya Pajajaran, Kota Bogor",
                    image: "https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=600&h=280&q=80",
                    gmaps: "https://maps.google.com/?q=Hotel+Santika+Bogor",
                    wifi: true,
                    restaurant: true,
                    parking: true
                },
                {
                    name: "Grand Savero Hotel Bogor",
                    stars: 4,
                    distance: "1.8 km",
                    address: "Jl. Raya Pajajaran No.27, Babakan, Kota Bogor",
                    image: "https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=600&h=280&q=80",
                    gmaps: "https://maps.google.com/?q=Grand+Savero+Hotel+Bogor",
                    wifi: true,
                    restaurant: true,
                    parking: true
                }
            ],
            hospitals: [{
                name: "RS PMI Kota Bogor",
                address: "Jl. Pajajaran No. 80 Bantarjati, Bogor",
                image: "https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=600&h=280&q=80",
                gmaps: "https://maps.google.com/?q=RS+PMI+Kota+Bogor",
                igd: true,
                rawat_inap: true,
                lab: true,
                apotek: true
            }]
        },
        {
            id: 2,
            name: "GOR Pajajaran Indoor B",
            lat: -6.584100,
            lng: 106.801200,
            address: "Kompleks Olahraga GOR Pajajaran, Jl. Pemuda, Kota Bogor",
            cabor: "Judo, Kurash, Sambo",
            image: "https://images.unsplash.com/photo-1517649763962-0c623066013b?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=-6.584100,106.801200",
            hotels: [{
                name: "Savero Style Bogor",
                stars: 3,
                distance: "1.9 km",
                address: "Jl. Pajajaran No.38, Babakan, Kota Bogor",
                image: "https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?auto=format&fit=crop&w=600&h=280&q=80",
                gmaps: "https://maps.google.com/?q=Savero+Style+Bogor",
                wifi: true,
                restaurant: true,
                parking: true
            }],
            hospitals: [{
                name: "RS PMI Kota Bogor",
                address: "Jl. Pajajaran No. 80 Bantarjati, Bogor",
                image: "https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=600&h=280&q=80",
                gmaps: "https://maps.google.com/?q=RS+PMI+Kota+Bogor",
                igd: true,
                rawat_inap: true,
                lab: true,
                apotek: true
            }]
        },
        {
            id: 3,
            name: "GOR Vokasi IPB",
            lat: -6.589165,
            lng: 106.806324,
            address: "Kampus IPB Cilibende, Jl. Kumbang No.14, Babakan, Kota Bogor",
            cabor: "Shorinji Kempo, Tarung Derajat",
            image: "https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Sekolah+Vokasi+IPB+Bogor",
            hotels: [{
                name: "Amaris Hotel Padjajaran Bogor",
                stars: 2,
                distance: "0.8 km",
                address: "Jl. Raya Pajajaran No.2, Kota Bogor",
                image: "https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?auto=format&fit=crop&w=600&h=280&q=80",
                gmaps: "https://maps.google.com/?q=Amaris+Hotel+Padjajaran+Bogor",
                wifi: true,
                restaurant: true,
                parking: true
            }],
            hospitals: [{
                name: "RS Siloam Bogor",
                address: "Jl. Raya Pajajaran No.27, RT.02/RW.04, Babakan, Kota Bogor",
                image: "https://images.unsplash.com/photo-1586773860418-d3b3de97e963?auto=format&fit=crop&w=600&h=280&q=80",
                gmaps: "https://maps.google.com/?q=RS+Siloam+Bogor",
                igd: true,
                rawat_inap: true,
                lab: true,
                apotek: true
            }]
        },
        {
            id: 4,
            name: "Majalengka",
            lat: -6.837000,
            lng: 108.216000,
            address: "Majalengka, Jawa Barat",
            cabor: "Aerosport - Gantolle",
            image: "https://images.unsplash.com/photo-1504280741564-f21aeac8ae69?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Majalengka",
            hotels: [],
            hospitals: []
        },
        {
            id: 5,
            name: "Gunung Mas",
            lat: -6.702000,
            lng: 106.993000,
            address: "Puncak, Bogor, Jawa Barat",
            cabor: "Aerosport - Paralayang",
            image: "https://images.unsplash.com/photo-1524850301259-7729d41d11d9?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Gunung+Mas+Puncak",
            hotels: [],
            hospitals: []
        },
        {
            id: 6,
            name: "Green Forest Hotel",
            lat: -6.634000,
            lng: 106.809000,
            address: "Bogor, Jawa Barat",
            cabor: "Anggar, Angkat Besi, Angkat Berat, Arung Jeram, Binaraga, Petanque",
            image: "https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Green+Forest+Hotel+Bogor",
            hotels: [],
            hospitals: []
        },
        {
            id: 7,
            name: "PPSDMAP Kemenhub Kemang",
            lat: -6.488000,
            lng: 106.756000,
            address: "Kemang, Bogor, Jawa Barat",
            cabor: "Bola Tangan Indoor",
            image: "https://images.unsplash.com/photo-1526232761682-d26e03ac148e?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=PPSDMAP+Kemenhub+Kemang",
            hotels: [],
            hospitals: []
        },
        {
            id: 8,
            name: "Padepokan Voli Sentul",
            lat: -6.568000,
            lng: 106.857000,
            address: "Sentul, Bogor, Jawa Barat",
            cabor: "Bola Tangan Pasir",
            image: "https://images.unsplash.com/photo-1593786481142-8c9096726f59?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Padepokan+Voli+Sentul",
            hotels: [],
            hospitals: []
        },
        {
            id: 9,
            name: "Brajamustika Hotel",
            lat: -6.581000,
            lng: 106.772000,
            address: "Bogor, Jawa Barat",
            cabor: "Dansa",
            image: "https://images.unsplash.com/photo-1542314831-c5a42a404f78?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Brajamustika+Hotel+Bogor",
            hotels: [],
            hospitals: []
        },
        {
            id: 10,
            name: "Arcamanik",
            lat: -6.907000,
            lng: 107.674000,
            address: "Sport Jabar Arcamanik, Bandung, Jawa Barat",
            cabor: "Gimnastik Aerobik, Gimnastic Artistik, Gimnastic Ritmik",
            image: "https://images.unsplash.com/photo-1552674605-15f373c9ceaa?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Sport+Jabar+Arcamanik",
            hotels: [],
            hospitals: []
        },
        {
            id: 11,
            name: "Cisangkan",
            lat: -6.877000,
            lng: 107.531000,
            address: "Lapang Tembak Cisangkan, Cimahi, Jawa Barat",
            cabor: "Menembak",
            image: "https://images.unsplash.com/photo-1576425114165-27a98fc304ed?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Lapang+Tembak+Cisangkan",
            hotels: [],
            hospitals: []
        },
        {
            id: 12,
            name: "Stadion Pajajaran",
            lat: -6.584500,
            lng: 106.800000,
            address: "Jl. Pemuda, Kota Bogor",
            cabor: "Modern Pentathion, Panahan, Panjat Tebing",
            image: "https://images.unsplash.com/photo-1522778119026-d647f0596c20?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Stadion+Pajajaran+Bogor",
            hotels: [],
            hospitals: []
        },
        {
            id: 13,
            name: "Kota Baru Parahyangan",
            lat: -6.852000,
            lng: 107.481000,
            address: "Padalarang, Kabupaten Bandung Barat, Jawa Barat",
            cabor: "Ski Air",
            image: "https://images.unsplash.com/photo-1520201163981-8cc95007dd2a?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Kota+Baru+Parahyangan",
            hotels: [],
            hospitals: []
        },
        {
            id: 14,
            name: "GOR Yasmin",
            lat: -6.561000,
            lng: 106.774000,
            address: "Bogor, Jawa Barat",
            cabor: "Tenis Meja",
            image: "https://images.unsplash.com/photo-1534158914592-062992fbe900?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=GOR+Yasmin+Bogor",
            hotels: [],
            hospitals: []
        }
    ];

    let map;
    let markers = [];
    // Fungsi inisialisasi maps
    function initMap() {
        const bogorCenter = {
            lat: -6.587,
            lng: 106.803
        };

        // Pastikan element target ada sebelum menggambar peta
        const mapElement = document.getElementById("map-canvas");
        if (!mapElement) {
            console.error("Elemen #map-canvas tidak ditemukan di HTML!");
            return;
        }

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

        // Loop data untuk memasang Pin Marker
        venueData.forEach(venue => {
            const marker = new google.maps.Marker({
                position: {
                    lat: venue.lat,
                    lng: venue.lng
                },
                map: map,
                title: venue.name,
                animation: google.maps.Animation.DROP
            });

            // Trigger Klik pada Pin
            marker.addListener("click", () => {
                showVenueDetails(venue);
            });

            markers.push(marker);
        });
    }
    // PENTING: Jalankan fungsi setelah window/browser selesai meload HTML secara utuh
    window.onload = function() {
        initMap();
    };

    // 3. LOGIKA UPDATE TAMPILAN KARTU SECARA DINAMIS
    function showVenueDetails(venue) {
        // A. Update Floating Card Map Atas
        document.getElementById('floating-gor-card').style.display = 'block';
        document.getElementById('card-gor-name').innerText = venue.name;
        document.getElementById('card-gor-addr').innerText = venue.address;
        document.getElementById('card-gor-gmaps').href = venue.gmaps_url;
        
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

        // B. Update Data List Hotel di Bagian Bawah
        const hotelContainer = document.getElementById('hotel-container');
        hotelContainer.innerHTML = ''; // Clear template lama

        venue.hotels.forEach(hotel => {
            let starHTML = '';
            for (let i = 0; i < hotel.stars; i++) {
                starHTML += `<svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>`;
            }
            for (let i = hotel.stars; i < 5; i++) {
                starHTML += `<svg width="16" height="16" fill="#e5e7eb" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>`;
            }

            hotelContainer.innerHTML += `
                <div class="place-card" style="margin-bottom: 20px;">
                    <div class="pc-img">
                        <img src="${hotel.image}" alt="${hotel.name}">
                    </div>
                    <div class="pc-body">
                        <div>
                            <p class="pc-name">${hotel.name}</p>
                            <div class="stars">${starHTML}</div>
                            <p class="pc-distance">${hotel.distance} dari ${venue.name}</p>
                            <div class="pc-addr">
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:1px">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                ${hotel.address}
                            </div>
                            <p class="pc-section-title">Fasilitas</p>
                            <div class="facility-icons">
                                <div class="fi-item"><svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" /></svg><span>WiFi</span></div>
                                <div class="fi-item"><svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg><span>Restoran</span></div>
                                <div class="fi-item"><svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /></svg><span>Parkir</span></div>
                            </div>
                        </div>
                        <a href="${hotel.gmaps}" target="_blank" class="map-btn">
                            <svg width="14" height="14" fill="none" stroke="#fff" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /></svg>
                            Buka di Google Maps
                        </a>
                    </div>
                </div>
            `;
        });

        // C. Update Data List Rumah Sakit di Bagian Bawah
        const rsContainer = document.getElementById('rs-container');
        rsContainer.innerHTML = ''; // Clear template lama

        venue.hospitals.forEach(rs => {
            rsContainer.innerHTML += `
                <div class="place-card" style="margin-bottom: 20px;">
                    <div class="pc-img">
                        <img src="${rs.image}" alt="${rs.name}">
                    </div>
                    <div class="pc-body">
                        <div>
                            <p class="pc-name">${rs.name}</p>
                            <div class="pc-addr">
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:1px">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                </svg>
                                ${rs.address}
                            </div>
                            <p class="pc-section-title">Layanan</p>
                            <div class="layanan-icons">
                                <div class="li-item"><svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg><span>IGD 24 Jam</span></div>
                                <div class="li-item"><svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1" /></svg><span>Rawat Inap</span></div>
                                <div class="li-item"><svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg><span>Laboratorium</span></div>
                                <div class="li-item"><svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg><span>Apotek</span></div>
                            </div>
                        </div>
                        <a href="${rs.gmaps}" target="_blank" class="map-btn">
                            <svg width="14" height="14" fill="none" stroke="#fff" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /></svg>
                            Buka di Google Maps
                        </a>
                    </div>
                </div>
            `;
        });
    }
</script>
@endpush