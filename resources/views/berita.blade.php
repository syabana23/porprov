@extends('layouts.app')

@section('title', 'Berita - PORPROV XV KOTA BOGOR 2026')

@push('styles')
<style>
    /* ── Page body ── */
    .berita-body {
        max-width: 1200px;
        margin: 0 auto;
        padding: 28px 20px 40px;
        display: flex;
        gap: 28px;
    }

    /* ── News section ── */
    .news-main {
        flex: 1;
    }

    .section-title {
        font-size: 20px;
        font-weight: 800;
        color: #013469;
        margin: 0 0 20px;
        border-left: 5px solid #FDB813;
        padding-left: 12px;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
    }

    .news-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        transition: box-shadow 0.2s;
    }

    .news-card:hover {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.13);
    }

    .news-card .thumb {
        position: relative;
        height: 160px;
        overflow: hidden;
    }

    .news-card .thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .news-card:hover .thumb img {
        transform: scale(1.04);
    }

    .news-card .cat-badge {
        position: absolute;
        bottom: 8px;
        left: 8px;
        background: #013469;
        color: #fff;
        font-size: 10px;
        font-weight: 600;
        padding: 3px 9px;
        border-radius: 4px;
    }

    .news-card .body {
        padding: 14px 14px 16px;
    }

    .news-card .news-title {
        font-size: 13px;
        font-weight: 700;
        color: #013469;
        margin: 0 0 10px;
        line-height: 1.45;
    }

    .news-card .news-title a {
        color: inherit;
        text-decoration: none;
    }

    .news-card .news-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 10.5px;
        color: #9ca3af;
        margin-bottom: 10px;
    }

    .news-card .news-meta span {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .news-card .news-excerpt {
        font-size: 11.5px;
        color: #4b5563;
        line-height: 1.6;
    }

    /* ── Quick Info sidebar ── */
    .quick-info {
        width: 260px;
        flex-shrink: 0;
    }

    .quick-info .qi-title {
        font-size: 18px;
        font-weight: 800;
        color: #013469;
        margin: 0 0 16px;
    }

    .qi-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .qi-item {
        background: #fff;
        border-radius: 10px;
        padding: 14px 12px;
        display: flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
        text-decoration: none;
        transition: box-shadow 0.2s;
    }

    .qi-item:hover {
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
    }

    .qi-item .qi-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .qi-icon.gray {
        background: #f3f4f6;
    }

    .qi-icon.green {
        background: #e8f7f0;
    }

    .qi-item .qi-label {
        font-size: 11px;
        font-weight: 600;
        color: #374151;
    }

    @media (max-width: 768px) {
        .berita-body {
            flex-direction: column;
            padding: 20px 16px 32px;
            gap: 20px;
        }
        .news-grid {
            grid-template-columns: 1fr;
            gap: 14px;
        }
        .news-card .thumb {
            height: 140px;
        }
        .quick-info {
            width: 100%;
        }
        .qi-grid {
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .section-title {
            font-size: 17px;
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
            <h1>Berita Terbaru</h1>
            <p>Informasi terkini seputar PORPROV XV Kota Bogor 2026</p>
        </div>
    </div>
    <div class="banner-accent-line"></div>
</section>

<!-- Body -->
<div class="berita-body">
    <!-- News grid -->
    <div class="news-main">
        <h2 class="section-title">Berita Terpopuler</h2>
        <div class="news-grid">

            <!-- Card 1 -->
            <div class="news-card">
                <div class="thumb">
                    <img src="https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?auto=format&fit=crop&w=400&h=220&q=80" alt="Angkat Besi">
                    <span class="cat-badge">Pertandingan</span>
                </div>
                <div class="body">
                    <p class="news-title"><a href="#">Angkat Besi Digelar di GOR Indoor 1 Kota Bogor</a></p>
                    <div class="news-meta">
                        <span>
                            <svg width="11" height="11" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                            14 Nov 2026
                        </span>
                        <span>
                            <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            1.25k
                        </span>
                    </div>
                    <p class="news-excerpt">Cabang olahraga Angkat Besi akan berlangsung di GOR Indoor 1 mulai 7-13 November 2026...</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="news-card">
                <div class="thumb">
                    <img src="https://images.unsplash.com/photo-1519666013628-9121fc1ff677?auto=format&fit=crop&w=400&h=220&q=80" alt="Renang">
                    <span class="cat-badge">Pertandingan</span>
                </div>
                <div class="body">
                    <p class="news-title"><a href="#">Renang di Mulai, 300 Atlet Siap Bersaing</a></p>
                    <div class="news-meta">
                        <span>
                            <svg width="11" height="11" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                            13 Nov 2026
                        </span>
                        <span>
                            <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            980
                        </span>
                    </div>
                    <p class="news-excerpt">Sebanyak 300 atlet renang dari 27 kabupaten/kota siap memperebutkan medali emas...</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="news-card">
                <div class="thumb">
                    <img src="https://images.unsplash.com/photo-1574629810360-7efbb4d6cc12?auto=format&fit=crop&w=400&h=220&q=80" alt="Futsal">
                    <span class="cat-badge">Pertandingan</span>
                </div>
                <div class="body">
                    <p class="news-title"><a href="#">Futsal Kota Bogor Siap Digelar</a></p>
                    <div class="news-meta">
                        <span>
                            <svg width="11" height="11" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                            12 Nov 2026
                        </span>
                        <span>
                            <svg width="11" height="11" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            875
                        </span>
                    </div>
                    <p class="news-excerpt">Pertandingan futsal akan berlangsung di GOR Pajajaran Bogor...</p>
                </div>
            </div>

        </div>
    </div>

    <!-- Quick Info -->
    <div class="quick-info">
        <p class="qi-title">INFO CEPAT</p>
        <div class="qi-grid">
            <a href="{{ url('/jadwal') }}" class="qi-item">
                <div class="qi-icon gray">
                    <svg width="20" height="20" fill="none" stroke="#4b5563" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="qi-label">Jadwal Pertandingan</span>
            </a>
            <a href="{{ url('/fasilitas') }}" class="qi-item">
                <div class="qi-icon green">
                    <svg width="20" height="20" fill="none" stroke="#2BB673" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <span class="qi-label">Fasilitas Kesehatan</span>
            </a>
            <a href="{{ url('/peta-venue') }}" class="qi-item">
                <div class="qi-icon gray">
                    <svg width="20" height="20" fill="none" stroke="#4b5563" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <span class="qi-label">Peta Venue</span>
            </a>
            <a href="#" class="qi-item">
                <div class="qi-icon gray">
                    <svg width="20" height="20" fill="none" stroke="#4b5563" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h2.28a1 1 0 01.949.685l1.518 4.555a1 1 0 01-.502 1.21l-1.37.684a11.042 11.042 0 005.516 5.516l.683-1.37a1 1 0 011.21-.503l4.555 1.519a1 1 0 01.685.949V19a1 1 0 01-1 1H18C9.163 20 4 14.837 4 8V4z" />
                    </svg>
                </div>
                <span class="qi-label">Kuliner Terdekat</span>
            </a>
        </div>
    </div>
</div>
@endsection