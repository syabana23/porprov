@extends('layouts.app')

@section('title', 'Klasemen Medali - PANDU PORPROV')
@section('bodyClass', 'klasemen')

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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M8 21h8m-4-4v4m-6 0h12M7 4h10v4a5 5 0 01-10 0V4zm-2 0H3a1 1 0 001 1h3M17 4h3a1 1 0 01-1 1h-3" />
            </svg>
        </div>
        <div class="banner-text">
            <span class="banner-badge">PORPROV XV · 2026</span>
            <h1>KLASEMEN MEDALI</h1>
            <p>Perolehan medali seluruh kontingen selama PORPROV Jabar 2026</p>
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
            <h2>Perolehan Medali</h2>
        </div>
        <p>Peringkat diurutkan berdasarkan jumlah medali emas, lalu perak, lalu perunggu. Data diperbarui secara berkala selama pertandingan berlangsung.</p>
    </div>

    <div class="klasemen-table-wrap">
        <table class="klasemen-table">
            <thead>
                <tr>
                    <th class="col-rank">#</th>
                    <th class="col-kontingen">Kontingen</th>
                    <th class="col-medal">Emas</th>
                    <th class="col-medal">Perak</th>
                    <th class="col-medal">Perunggu</th>
                    <th class="col-total">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($klasemen as $index => $k)
                <tr class="{{ $index < 3 ? 'top-row top-' . ($index + 1) : '' }}">
                    <td class="col-rank">
                        @if ($index < 3)
                        <span class="rank-badge rank-{{ $index + 1 }}">{{ $index + 1 }}</span>
                        @else
                        <span class="rank-badge">{{ $index + 1 }}</span>
                        @endif
                    </td>
                    <td class="col-kontingen">
                        <div class="klasemen-kontingen">
                            <div class="klasemen-logo">
                                <img src="{{ asset('images/' . $k['logo']) }}" alt="Logo {{ $k['nama'] }}">
                            </div>
                            <span class="klasemen-name">{{ $k['nama'] }}</span>
                        </div>
                    </td>
                    <td class="col-medal"><span class="medal-count medal-emas">{{ $k['emas'] }}</span></td>
                    <td class="col-medal"><span class="medal-count medal-perak">{{ $k['perak'] }}</span></td>
                    <td class="col-medal"><span class="medal-count medal-perunggu">{{ $k['perunggu'] }}</span></td>
                    <td class="col-total"><span class="total-count">{{ $k['emas'] + $k['perak'] + $k['perunggu'] }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
