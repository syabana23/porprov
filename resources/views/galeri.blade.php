@extends('layouts.app')

@section('title', 'Galeri - PORPROV XV KOTA BOGOR 2026')


@section('content')
<!-- Banner -->
<section class="page-banner">
    <img class="banner-bg-img" src="{{ asset('images/hero-bg.png') }}" alt="">
    <div class="banner-inner">
        <div class="banner-icon">
            <svg width="28" height="28" fill="none" stroke="#fff" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <div class="banner-text">
            <span class="banner-badge">PORPROV XV · 2026</span>
            <h1>GALERI DOKUMENTASI</h1>
            <p>Dokumentasi lapangan Kota Bogor selama kegiatan berlangsung</p>
        </div>
    </div>
    <div class="banner-accent-line"></div>
    <div class="banner-bottom-curve">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,20 1200,60 L1200,120 L0,120 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</section>

<!-- Gallery Content -->
<div class="galeri-page">
    <div class="galeri-filter">
        <button class="filter-btn">
            <svg width="14" height="14" fill="none" stroke="#fff" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
            Semua
        </button>
    </div>

    <div class="gallery-grid">

        <!-- Item 1 -->
        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?auto=format&fit=crop&w=600&h=400&q=80" alt="Indoor A">
            <div class="overlay"></div>
            <div class="info">
                <p class="item-name">Indoor A</p>
                <div class="item-meta">
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        10 Nov 2026
                    </span>
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        4 foto
                    </span>
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1518605368461-1ee12523e05f?auto=format&fit=crop&w=600&h=400&q=80" alt="Lapangan Luar">
            <div class="overlay"></div>
            <div class="info">
                <p class="item-name">Lapangan Luar</p>
                <div class="item-meta">
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        10 Nov 2026
                    </span>
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        7 foto
                    </span>
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1582236359520-a7d2cc037cc7?auto=format&fit=crop&w=600&h=400&q=80" alt="Indoor B">
            <div class="overlay"></div>
            <div class="info">
                <p class="item-name">Indoor B</p>
                <div class="item-meta">
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        03 Nov 2026
                    </span>
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        6 foto
                    </span>
                </div>
            </div>
        </div>

        <!-- Item 4 -->
        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1508344928928-7165b67de128?auto=format&fit=crop&w=600&h=400&q=80" alt="Lapangan Luar 2">
            <div class="overlay"></div>
            <div class="info">
                <p class="item-name">Lapangan Luar</p>
                <div class="item-meta">
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        10 Nov 2026
                    </span>
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        7 foto
                    </span>
                </div>
            </div>
        </div>

        <!-- Item 5 -->
        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1590494490333-e18bd08779be?auto=format&fit=crop&w=600&h=400&q=80" alt="Indoor B">
            <div class="overlay"></div>
            <div class="info">
                <p class="item-name">Indoor B</p>
                <div class="item-meta">
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        10 Nov 2026
                    </span>
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        6 foto
                    </span>
                </div>
            </div>
        </div>

        <!-- Item 6 -->
        <div class="gallery-item">
            <img src="https://images.unsplash.com/photo-1517466787929-bc90951d0974?auto=format&fit=crop&w=600&h=400&q=80" alt="Lapangan Luar 3">
            <div class="overlay"></div>
            <div class="info">
                <p class="item-name">Lapangan Luar</p>
                <div class="item-meta">
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        10 Nov 2026
                    </span>
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        7 foto
                    </span>
                </div>
            </div>
        </div>

    </div>

    <!-- Load More -->
    <div class="load-more-wrap">
        <button class="btn-load-more">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            Muat Lebih Banyak
        </button>
    </div>
</div>
@endsection
