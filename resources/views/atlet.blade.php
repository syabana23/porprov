@extends('layouts.app')

@section('title', 'Klasemen Atlet - PANDU PORPROV')
@section('bodyClass', 'atlet')

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
            <h1>KLASEMEN ATLET</h1>
            <p>Perolehan medali atlet perorangan selama PORPROV Jabar 2026</p>
        </div>
    </div>
    <div class="banner-accent-line"></div>
    <div class="banner-bottom-curve">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,20 1200,60 L1200,120 L0,120 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</section>

<div class="klasemen-page">
    <div class="klasemen-intro">
        <div class="klasemen-intro-title">
            <div class="section-bar"></div>
            <h2>Perolehan Medali Atlet</h2>
        </div>
        <p>Atlet diurutkan berdasarkan jumlah medali emas, lalu perak, lalu perunggu. Data diperbarui secara berkala selama pertandingan berlangsung.</p>
    </div>

    @if (empty($atlets))
    <div class="atlet-empty">
        <svg width="46" height="46" fill="none" stroke="#94a3b8" viewBox="0 0 24 24" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 21h8m-4-4v4m-6 0h12M7 4h10v4a5 5 0 01-10 0V4zm-2 0H3a1 1 0 001 1h3M17 4h3a1 1 0 01-1 1h-3" />
        </svg>
        <p>Belum ada data klasemen atlet.</p>
        <span>Data akan ditampilkan setelah pertandingan dimulai.</span>
    </div>
    @else
    <div class="klasemen-table-wrap">
        <table class="klasemen-table">
            <thead>
                <tr>
                    <th class="col-rank">#</th>
                    <th class="col-kontingen">Atlet</th>
                    <th class="col-cabor">Cabor</th>
                    <th class="col-medal">Emas</th>
                    <th class="col-medal">Perak</th>
                    <th class="col-medal">Perunggu</th>
                    <th class="col-total">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($atlets as $index => $a)
                <tr class="{{ $index < 3 ? 'top-row top-' . ($index + 1) : '' }}">
                    <td class="col-rank">
                        @if ($index < 3)
                        <span class="rank-badge rank-{{ $index + 1 }}">{{ $index + 1 }}</span>
                        @else
                        <span class="rank-badge">{{ $index + 1 }}</span>
                        @endif
                    </td>
                    <td class="col-kontingen">
                        <div class="atlet-athlete">
                            <span class="atlet-avatar">{{ strtoupper(substr($a['nama'], 0, 1)) }}</span>
                            <div class="atlet-meta">
                                <span class="atlet-name">{{ $a['nama'] }}</span>
                                <span class="atlet-kontingen">{{ $a['kontingen'] }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="col-cabor"><span class="atlet-cabor">{{ $a['cabor'] }}</span></td>
                    <td class="col-medal"><span class="medal-count medal-emas">{{ $a['emas'] }}</span></td>
                    <td class="col-medal"><span class="medal-count medal-perak">{{ $a['perak'] }}</span></td>
                    <td class="col-medal"><span class="medal-count medal-perunggu">{{ $a['perunggu'] }}</span></td>
                    <td class="col-total"><span class="total-count">{{ $a['emas'] + $a['perak'] + $a['perunggu'] }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
