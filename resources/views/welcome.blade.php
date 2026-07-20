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
        width: 260px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
        z-index: 99;
        overflow: hidden;
        display: none;
    }

    .gor-card-header {
        background: #013469;
        color: #fff;
        padding: 10px 12px;
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 700;
    }

    .gor-card-img {
        height: 120px;
        overflow: hidden;
    }

    .gor-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gor-card-body {
        padding: 12px;
    }

    .gor-card-body .addr {
        font-size: 11px;
        color: #6b7280;
        display: flex;
        align-items: flex-start;
        gap: 4px;
        margin-bottom: 8px;
        line-height: 1.4;
    }

    .gor-card-body .cabang-title {
        font-size: 10px;
        font-weight: 700;
        color: #013469;
        margin-bottom: 6px;
        letter-spacing: 0.05em;
    }

    .cabang-list-text {
        font-size: 11px;
        color: #374151;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .home-gor-card .map-btn {
        display: block;
        background: #013469;
        color: #fff;
        text-align: center;
        font-size: 11px;
        font-weight: 700;
        padding: 8px;
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
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero">
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
        {{-- Note for user: Change hero background image at public/images/hero-bg.png --}}
        <img class="bg" src="{{ asset('images/hero-bg.png') }}" alt="Kota Bogor">
        {{-- Note for user: Change mascot image at public/images/maskot.png --}}
        <img class="mascot" src="{{ asset('images/maskot.png') }}" alt="Maskot PORPROV">
    </div>
</section>

<!-- Statistics Cards -->
<section class="stats">
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

<!-- Map Section -->
<section class="map-home-section">
    <h2 class="section-title">Peta Lokasi Venue</h2>
    <div class="map-container">
        <div id="map-canvas"></div>

        <div class="home-gor-card" id="floating-gor-card">
            <div class="gor-card-header">
                <svg width="14" height="14" fill="none" stroke="#fff" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                </svg>
                <span id="card-gor-name">-</span>
            </div>
            <div class="gor-card-img">
                <img id="card-gor-img" src="" alt="Venue Image">
            </div>
            <div class="gor-card-body">
                <div class="addr">
                    <svg width="13" height="13" fill="none" stroke="#9ca3af" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    </svg>
                    <span id="card-gor-addr">-</span>
                </div>
                <div class="cabang-title">CABANG OLAHRAGA</div>
                <div class="cabang-list-text" id="card-gor-cabor">-</div>
                <a href="#" id="card-gor-gmaps" target="_blank" class="map-btn">Buka di Google Maps</a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF8W19WIUtkrIWIXb22YbAOxxdtsZKugU"></script>
<script>
    const venueData = [{
            id: 1,
            name: "GOR Pajajaran Indoor A",
            lat: -6.583321,
            lng: 106.800532,
            address: "Jl. Pemuda No.4, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16161",
            cabor: "Drumband, Pencak Silat, Taekwondo",
            image: "https://images.unsplash.com/photo-1574629810360-7efbb4d6cc12?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=GOR+Pajajaran+Bogor",
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
        },
        {
            id: 4,
            name: "Majalengka",
            lat: -6.837000,
            lng: 108.216000,
            address: "Majalengka, Jawa Barat",
            cabor: "Aerosport - Gantolle",
            image: "https://images.unsplash.com/photo-1504280741564-f21aeac8ae69?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Majalengka"
        },
        {
            id: 5,
            name: "Gunung Mas",
            lat: -6.702000,
            lng: 106.993000,
            address: "Puncak, Bogor, Jawa Barat",
            cabor: "Aerosport - Paralayang",
            image: "https://images.unsplash.com/photo-1524850301259-7729d41d11d9?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Gunung+Mas+Puncak"
        },
        {
            id: 6,
            name: "Green Forest Hotel",
            lat: -6.634000,
            lng: 106.809000,
            address: "Bogor, Jawa Barat",
            cabor: "Anggar, Angkat Besi, Angkat Berat, Arung Jeram, Binaraga, Petanque",
            image: "https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Green+Forest+Hotel+Bogor"
        },
        {
            id: 7,
            name: "PPSDMAP Kemenhub Kemang",
            lat: -6.488000,
            lng: 106.756000,
            address: "Kemang, Bogor, Jawa Barat",
            cabor: "Bola Tangan Indoor",
            image: "https://images.unsplash.com/photo-1526232761682-d26e03ac148e?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=PPSDMAP+Kemenhub+Kemang"
        },
        {
            id: 8,
            name: "Padepokan Voli Sentul",
            lat: -6.568000,
            lng: 106.857000,
            address: "Sentul, Bogor, Jawa Barat",
            cabor: "Bola Tangan Pasir",
            image: "https://images.unsplash.com/photo-1593786481142-8c9096726f59?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Padepokan+Voli+Sentul"
        },
        {
            id: 9,
            name: "Brajamustika Hotel",
            lat: -6.581000,
            lng: 106.772000,
            address: "Bogor, Jawa Barat",
            cabor: "Dansa",
            image: "https://images.unsplash.com/photo-1542314831-c5a42a404f78?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Brajamustika+Hotel+Bogor"
        },
        {
            id: 10,
            name: "Arcamanik",
            lat: -6.907000,
            lng: 107.674000,
            address: "Sport Jabar Arcamanik, Bandung, Jawa Barat",
            cabor: "Gimnastik Aerobik, Gimnastic Artistik, Gimnastic Ritmik",
            image: "https://images.unsplash.com/photo-1552674605-15f373c9ceaa?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Sport+Jabar+Arcamanik"
        },
        {
            id: 11,
            name: "Cisangkan",
            lat: -6.877000,
            lng: 107.531000,
            address: "Lapang Tembak Cisangkan, Cimahi, Jawa Barat",
            cabor: "Menembak",
            image: "https://images.unsplash.com/photo-1576425114165-27a98fc304ed?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Lapang+Tembak+Cisangkan"
        },
        {
            id: 12,
            name: "Stadion Pajajaran",
            lat: -6.584500,
            lng: 106.800000,
            address: "Jl. Pemuda, Kota Bogor",
            cabor: "Modern Pentathion, Panahan, Panjat Tebing",
            image: "https://images.unsplash.com/photo-1522778119026-d647f0596c20?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Stadion+Pajajaran+Bogor"
        },
        {
            id: 13,
            name: "Kota Baru Parahyangan",
            lat: -6.852000,
            lng: 107.481000,
            address: "Padalarang, Kabupaten Bandung Barat, Jawa Barat",
            cabor: "Ski Air",
            image: "https://images.unsplash.com/photo-1520201163981-8cc95007dd2a?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=Kota+Baru+Parahyangan"
        },
        {
            id: 14,
            name: "GOR Yasmin",
            lat: -6.561000,
            lng: 106.774000,
            address: "Bogor, Jawa Barat",
            cabor: "Tenis Meja",
            image: "https://images.unsplash.com/photo-1534158914592-062992fbe900?auto=format&fit=crop&w=400&h=150&q=80",
            gmaps_url: "https://maps.google.com/?q=GOR+Yasmin+Bogor"
        }
    ];

    let map;
    let markers = [];

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

            marker.addListener("click", () => {
                showVenueDetails(venue);
            });

            markers.push(marker);
        });
    }

    window.onload = function() {
        initMap();
    };

    function showVenueDetails(venue) {
        document.getElementById('floating-gor-card').style.display = 'block';
        document.getElementById('card-gor-name').innerText = venue.name;
        document.getElementById('card-gor-img').src = venue.image;
        document.getElementById('card-gor-addr').innerText = venue.address;
        document.getElementById('card-gor-cabor').innerText = venue.cabor;
        document.getElementById('card-gor-gmaps').href = venue.gmaps_url;
    }
</script>
@endpush