@extends('layouts.app')

@section('title', 'Cabang Olahraga - PANDU PORPROV')
@section('bodyClass', 'cabor')

@section('content')
<section class="page-banner">
    <img class="banner-bg-img" src="{{ asset('images/venue1.jpeg') }}" alt="">
    <div class="banner-particles">
        <span></span><span></span><span></span><span></span>
        <span></span><span></span>
    </div>
    <div class="banner-inner">
        <div class="banner-icon">
            <svg width="28" height="28" fill="none" stroke="#fff" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M19 5h-2V3H7v2H5c-1.1 0-2 .9-2 2v1c0 2.55 1.92 4.63 4.39 4.94.63 1.5 1.98 2.63 3.61 2.96V19H7v2h10v-2h-4v-3.1c1.63-.33 2.98-1.46 3.61-2.96C19.08 12.63 21 10.55 21 8V7c0-1.1-.9-2-2-2zM5 8V7h2v3.82C5.84 10.4 5 9.3 5 8zm14 0c0 1.3-.84 2.4-2 2.82V7h2v1z" />
            </svg>
        </div>
        <div class="banner-text">
            <span class="banner-badge">PORNAVI · 2026</span>
            <h1>CABANG OLAHRAGA</h1>
            <p>Klik logo cabang olahraga untuk melihat penjelasan dan rute transportasi umum menuju venue</p>
        </div>
    </div>
    <div class="banner-accent-line"></div>
    <div class="banner-bottom-curve">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,20 1200,60 L1200,120 L0,120 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</section>

<div class="cabor-page">
    <div class="cabor-intro">
        <div class="cabor-intro-title">
            <div class="section-bar"></div>
            <h2>Daftar Cabang Olahraga</h2>
        </div>
        <p>Seluruh <strong>{{ count($cabors) }}</strong> cabang olahraga yang dipertandingkan pada PORPROV Jabar 2026. Klik salah satu logo untuk melihat informasi lengkap beserta rute transportasi umum menuju venue.</p>
    </div>

    <div class="cabor-grid-all">
        @foreach ($cabors as $cabor)
        <a href="#caborModal" class="cabor-card" data-slug="{{ $cabor['slug'] }}">
            <div class="cabor-card-logo">
                <img src="{{ asset('images/CABOR/' . $cabor['logo']) }}" alt="{{ $cabor['nama'] }}">
            </div>
            <span class="cabor-card-name">{{ $cabor['nama'] }}</span>
            <span class="cabor-card-venue">
                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{ $cabor['venue'] }}
            </span>
            <span class="cabor-card-cta">
                Lihat Info
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </span>
        </a>
        @endforeach
    </div>
</div>

<!-- Modal Detail Cabor -->
<div id="caborModal" class="cabor-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="caborModalName">
    <div class="cabor-modal-content">
        <button class="cabor-modal-close" id="caborModalClose" aria-label="Tutup">&times;</button>
        <div class="cabor-modal-header">
            <div class="cabor-modal-logo">
                <img id="caborModalLogo" src="" alt="">
            </div>
            <div class="cabor-modal-headtext">
                <span class="cabor-modal-badge">CABANG OLAHRAGA · 2026</span>
                <h2 id="caborModalName">Nama Cabor</h2>
                <p id="caborModalVenue">Venue</p>
            </div>
        </div>
        <div class="cabor-modal-body">
            <div class="cabor-info-block">
                <h3>
                    <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Tentang Cabang Olahraga
                </h3>
                <p id="caborModalDeskripsi"></p>
            </div>

            <div class="cabor-info-block">
                <h3>
                    <svg width="17" height="17" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Venue Pertandingan
                </h3>
                <p class="cabor-venue-name" id="caborModalVenueName"></p>
                <p class="cabor-venue-addr" id="caborModalAlamat"></p>
            </div>

            <div class="cabor-transport-header">
                <div class="cabor-transport-title">
                    <div class="section-bar"></div>
                    <h2>Rute Transportasi Umum</h2>
                </div>
                <p id="caborModalTransportHint"></p>
            </div>
            <div id="caborModalRute"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    window.CABORS = @json($cabors);
</script>
<script>
    const CABOR_IMG = "{{ asset('images/CABOR') }}";
    const caborModal = document.getElementById('caborModal');
    const caborCloseBtn = document.getElementById('caborModalClose');

    function renderRute(rute) {
        return rute.map(function(r, i) {
            var steps = r.langkah.map(function(l) {
                return '<li><span class="route-step-dot"></span><span class="route-step-text">' + l + '</span></li>';
            }).join('');
            return '<div class="route-card">' +
                '<div class="route-card-head">' +
                '<span class="route-number">' + (i + 1) + '</span>' +
                '<h3>' + r.judul + '</h3>' +
                '</div>' +
                '<ol class="route-steps">' + steps + '</ol>' +
                '</div>';
        }).join('');
    }

    function openCaborModal(cabor) {
        document.getElementById('caborModalLogo').src = CABOR_IMG + '/' + cabor.logo;
        document.getElementById('caborModalLogo').alt = cabor.nama;
        document.getElementById('caborModalName').textContent = cabor.nama;
        document.getElementById('caborModalVenue').textContent = cabor.venue;
        document.getElementById('caborModalDeskripsi').textContent = cabor.deskripsi;
        document.getElementById('caborModalVenueName').textContent = cabor.venue;
        document.getElementById('caborModalAlamat').textContent = cabor.alamat;
        document.getElementById('caborModalTransportHint').innerHTML = 'Berikut cara mencapai venue <strong>' + cabor.venue + '</strong> menggunakan transportasi umum.';
        document.getElementById('caborModalRute').innerHTML = renderRute(cabor.rute);
        caborModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeCaborModal() {
        caborModal.classList.remove('active');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.cabor-card').forEach(function(card) {
        card.addEventListener('click', function(e) {
            e.preventDefault();
            var cabor = window.CABORS.find(function(c) {
                return c.slug === this.dataset.slug;
            }.bind(this));
            if (cabor) openCaborModal(cabor);
        });
    });

    caborCloseBtn.addEventListener('click', closeCaborModal);
    caborModal.addEventListener('click', function(e) {
        if (e.target === caborModal) closeCaborModal();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && caborModal.classList.contains('active')) closeCaborModal();
    });
</script>
@endpush
