@extends('layouts.app')

@section('title', 'Live Streaming - PANDU PORPROV')
@section('bodyClass', 'live-streaming')

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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
        </div>
        <div class="banner-text">
            <span class="banner-badge">PORPROV XV · 2026</span>
            <h1>LIVE STREAMING</h1>
            <p>Tonton aksi terbaik atlet PORPROV XV Kota Bogor 2026 secara live</p>
        </div>
    </div>
    <div class="banner-accent-line"></div>
    <div class="banner-bottom-curve">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,20 1200,60 L1200,120 L0,120 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</section>

<div class="live-page">
    <div class="live-main">
        <div class="live-head">
            <span class="live-badge"><span class="live-dot"></span> LIVE</span>
            <h2 class="live-title">{{ $liveStream['title'] }}</h2>
        </div>

        <div class="live-player-wrap">
            <iframe
                src="https://www.youtube.com/embed/{{ $liveStream['video_id'] }}"
                title="Live Streaming PORPROV XV Kota Bogor 2026"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
            </iframe>
        </div>

        <p class="live-note">Streaming akan aktif saat pertandingan berlangsung. Nantikan pertandingan seru dari para atlet terbaik Jawa Barat.</p>

        <div class="live-actions">
            <a class="live-btn" href="https://www.youtube.com/watch?v={{ $liveStream['video_id'] }}" target="_blank" rel="noopener">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Tonton Live Pertandingan
            </a>
        </div>
    </div>
</div>
@endsection
