@extends('layouts.app')

@section('title', 'Kontingen - PANDU PORPROV')
@section('bodyClass', 'kontingen')

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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </div>
        <div class="banner-text">
            <span class="banner-badge">PORPROV XV · 2026</span>
            <h1>KONTINGEN</h1>
            <p>Seluruh kontingen daerah yang bertanding pada PORPROV Jabar 2026</p>
        </div>
    </div>
    <div class="banner-accent-line"></div>
    <div class="banner-bottom-curve">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,20 1200,60 L1200,120 L0,120 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</section>

<div class="kontingen-page">
    <div class="kontingen-intro">
        <div class="kontingen-intro-title">
            <div class="section-bar"></div>
            <h2>Daftar Kontingen</h2>
        </div>
        <p>Sebanyak <strong>{{ count($kontingens) }}</strong> kabupaten/kota di Jawa Barat berlaga pada PORPROV Jabar 2026.</p>
    </div>

    <div class="kontingen-grid">
        @foreach ($kontingens as $kontingen)
        <div class="kontingen-card">
            <div class="kontingen-logo">
                <img src="{{ asset('images/' . $kontingen['logo']) }}" alt="Logo {{ $kontingen['nama'] }}">
            </div>
            <span class="kontingen-name">{{ $kontingen['nama'] }}</span>
        </div>
        @endforeach
    </div>
</div>
@endsection
