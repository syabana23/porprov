@extends('layouts.app')

@section('title', 'Jadwal - PANDU PORPROV')

{{-- ═══════════════════════════════════════════════════════════════════ --}}
{{-- ║  JADWAL & VENUE PERTANDINGAN — PANDU PORPROV                   ║ --}}
{{-- ═══════════════════════════════════════════════════════════════════ --}}


@section('content')
<!-- Banner -->
<section class="page-banner">
    <img class="banner-bg-img" src="{{ asset('images/hero-bg.png') }}" alt="">
    <div class="banner-particles">
        <span></span><span></span><span></span><span></span>
        <span></span><span></span>
    </div>
    <div class="banner-inner">
        <div class="banner-icon">
            <svg width="28" height="28" fill="none" stroke="#fff" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
        </div>
        <div class="banner-text">
            <span class="banner-badge">PORPROV XV · 2026</span>
            <h1>JADWAL & VENUE PERTANDINGAN</h1>
            <p>Informasi terkini seputar jadwal pertandingan PORPROV XV Kota Bogor 2026</p>
        </div>
    </div>
    <div class="banner-accent-line"></div>
    <div class="banner-bottom-curve">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,20 1200,60 L1200,120 L0,120 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</section>

<div class="jadwal-page">
    <!-- Filter Section -->
    <div class="jadwal-filter">
        <!-- Pencarian -->
        <div class="filter-box">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input type="text" id="searchFilter" placeholder="Cari cabang olahraga atau venue...">
        </div>
        
        <!-- Kalender Date Picker -->
        <div class="filter-box" style="flex: 1.5;">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <input type="date" id="datePickerFilter" min="2026-10-31" max="2026-11-20" title="Pilih Tanggal Pertandingan">
        </div>
        
        <button class="reset-filter-btn" id="resetFilterBtn">Reset</button>
    </div>

    <!-- Legend -->
    <div class="legend-box">
        <h3>KETERANGAN</h3>
        <div class="legend-items">
            <div class="legend-item">
                <div class="legend-dot prep"></div>
                <span>Persiapan / Kedatangan / Latihan Resmi</span>
            </div>
            <div class="legend-item">
                <div class="legend-dot exec"></div>
                <span>Hari Pertandingan / Kompetisi</span>
            </div>
            <div class="legend-item">
                <div class="legend-dot final"></div>
                <span>Final / Acara Penutupan / Kepulangan</span>
            </div>
        </div>
        <div class="legend-note">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p>Klik nama cabor/venue untuk detail</p>
        </div>
    </div>

    <!-- ── Table Info Bar ── -->
    <div class="table-info-bar">
        <span class="table-count" id="tableCount">Menampilkan <strong>28</strong> dari 28 cabang olahraga</span>
        <span class="scroll-hint" id="scrollHint">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            Geser tabel ke kanan untuk melihat tanggal
        </span>
    </div>

    <!-- ── Table ── -->
    <div class="jadwal-table-wrap" id="jadwalTableWrap">
        <table class="jadwal-tbl">
            <thead>
                <tr>
                    <th rowspan="2" style="width:36px">No</th>
                    <th rowspan="2">Cabang Olahraga</th>
                    <th rowspan="2">Venue</th>
                    <th rowspan="2" style="width:54px;text-align:center">Durasi</th>
                    <th colspan="1" style="background:#014590;text-align:center">Oktober</th>
                    <th colspan="20" style="background:#014590;text-align:center">November 2026</th>
                </tr>
                <tr class="month-header">
                    <th class="date-col">31<br>Sabtu</th>
                    <th class="date-col">1<br>Minggu</th>
                    <th class="date-col">2<br>Senin</th>
                    <th class="date-col">3<br>Selasa</th>
                    <th class="date-col">4<br>Rabu</th>
                    <th class="date-col">5<br>Kamis</th>
                    <th class="date-col">6<br>Jumat</th>
                    <th class="date-col">7<br>Sabtu</th>
                    <th class="date-col">8<br>Minggu</th>
                    <th class="date-col">9<br>Senin</th>
                    <th class="date-col">10<br>Selasa</th>
                    <th class="date-col">11<br>Rabu</th>
                    <th class="date-col">12<br>Kamis</th>
                    <th class="date-col">13<br>Jumat</th>
                    <th class="date-col">14<br>Sabtu</th>
                    <th class="date-col">15<br>Minggu</th>
                    <th class="date-col">16<br>Senin</th>
                    <th class="date-col">17<br>Selasa</th>
                    <th class="date-col">18<br>Rabu</th>
                    <th class="date-col">19<br>Kamis</th>
                    <th class="date-col">20<br>Jumat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="no">1</td>
                    <td class="sport" data-sport="Aerosport - Gantolle" data-venue="Majalengka">Aerosport - Gantolle</td>
                    <td class="venue" data-sport="Aerosport - Gantolle" data-venue="Majalengka">Majalengka</td>
                    <td class="durasi">13</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">2</td>
                    <td class="sport" data-sport="Aerosport - Paralayang" data-venue="Gunung Mas">Aerosport - Paralayang</td>
                    <td class="venue" data-sport="Aerosport - Paralayang" data-venue="Gunung Mas">Gunung Mas</td>
                    <td class="durasi">14</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">3</td>
                    <td class="sport" data-sport="Anggar" data-venue="Green Forest Hotel">Anggar</td>
                    <td class="venue" data-sport="Anggar" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">9</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">4</td>
                    <td class="sport" data-sport="Dansa" data-venue="Green Forest Hotel">Dansa</td>
                    <td class="venue" data-sport="Dansa" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">6</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">5</td>
                    <td class="sport" data-sport="Angkat Berat" data-venue="Green Forest Hotel">Angkat Berat</td>
                    <td class="venue" data-sport="Angkat Berat" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">7</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">6</td>
                    <td class="sport" data-sport="Angkat Besi" data-venue="Green Forest Hotel">Angkat Besi</td>
                    <td class="venue" data-sport="Angkat Besi" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">7</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">7</td>
                    <td class="sport" data-sport="Arung Jeram" data-venue="Green Forest Hotel">Arung Jeram</td>
                    <td class="venue" data-sport="Arung Jeram" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">12</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">8</td>
                    <td class="sport" data-sport="Binaraga" data-venue="Green Forest Hotel">Binaraga</td>
                    <td class="venue" data-sport="Binaraga" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">5</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                </tr>
                <tr>
                    <td class="no">9</td>
                    <td class="sport" data-sport="Bola Tangan Indoor" data-venue="PPSDMAP Kemenhub Kemang Kab-Bogor">Bola Tangan Indoor</td>
                    <td class="venue" data-sport="Bola Tangan Indoor" data-venue="PPSDMAP Kemenhub Kemang Kab-Bogor">PPSDMAP Kemenhub Kemang Kab-Bogor</td>
                    <td class="durasi">7</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                </tr>
                <tr>
                    <td class="no">10</td>
                    <td class="sport" data-sport="Bola Tangan Pasir" data-venue="Padepokan Voli Sentul">Bola Tangan Pasir</td>
                    <td class="venue" data-sport="Bola Tangan Pasir" data-venue="Padepokan Voli Sentul">Padepokan Voli Sentul</td>
                    <td class="durasi">7</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">11</td>
                    <td class="sport" data-sport="Drumband" data-venue="Indoor A GOR Pajajaran">Drumband</td>
                    <td class="venue" data-sport="Drumband" data-venue="Indoor A GOR Pajajaran">Indoor A GOR Pajajaran</td>
                    <td class="durasi">10</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">12</td>
                    <td class="sport" data-sport="Gimnastik Aerobik" data-venue="Arcamanik">Gimnastik Aerobik</td>
                    <td class="venue" data-sport="Gimnastik Aerobik" data-venue="Arcamanik">Arcamanik</td>
                    <td class="durasi">5</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">13</td>
                    <td class="sport" data-sport="Gimnastik Artistik" data-venue="Arcamanik">Gimnastik Artistik</td>
                    <td class="venue" data-sport="Gimnastik Artistik" data-venue="Arcamanik">Arcamanik</td>
                    <td class="durasi">6</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">14</td>
                    <td class="sport" data-sport="Gimnastik Ritmik" data-venue="Arcamanik">Gimnastik Ritmik</td>
                    <td class="venue" data-sport="Gimnastik Ritmik" data-venue="Arcamanik">Arcamanik</td>
                    <td class="durasi">6</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">15</td>
                    <td class="sport" data-sport="Judo" data-venue="Indoor B GOR Pajajaran">Judo</td>
                    <td class="venue" data-sport="Judo" data-venue="Indoor B GOR Pajajaran">Indoor B GOR Pajajaran</td>
                    <td class="durasi">8</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">16</td>
                    <td class="sport" data-sport="Kurash" data-venue="Indoor B GOR Pajajaran">Kurash</td>
                    <td class="venue" data-sport="Kurash" data-venue="Indoor B GOR Pajajaran">Indoor B GOR Pajajaran</td>
                    <td class="durasi">6</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">17</td>
                    <td class="sport" data-sport="Menembak" data-venue="Lapangan Tembak Cisangkan">Menembak</td>
                    <td class="venue" data-sport="Menembak" data-venue="Lapangan Tembak Cisangkan">Lapangan Tembak Cisangkan</td>
                    <td class="durasi">11</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">18</td>
                    <td class="sport" data-sport="Modern Pentathlon" data-venue="Stadion Pajajaran">Modern Pentathlon</td>
                    <td class="venue" data-sport="Modern Pentathlon" data-venue="Stadion Pajajaran">Stadion Pajajaran</td>
                    <td class="durasi">11</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                </tr>
                <tr>
                    <td class="no">19</td>
                    <td class="sport" data-sport="Panahan" data-venue="Stadion Pajajaran">Panahan</td>
                    <td class="venue" data-sport="Panahan" data-venue="Stadion Pajajaran">Stadion Pajajaran</td>
                    <td class="durasi">12</td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">20</td>
                    <td class="sport" data-sport="Panjat Tebing" data-venue="Stadion Pajajaran">Panjat Tebing</td>
                    <td class="venue" data-sport="Panjat Tebing" data-venue="Stadion Pajajaran">Stadion Pajajaran</td>
                    <td class="durasi">15</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                </tr>
                <tr>
                    <td class="no">21</td>
                    <td class="sport" data-sport="Pencak Silat" data-venue="Indoor A GOR Pajajaran">Pencak Silat</td>
                    <td class="venue" data-sport="Pencak Silat" data-venue="Indoor A GOR Pajajaran">Indoor A GOR Pajajaran</td>
                    <td class="durasi">8</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">22</td>
                    <td class="sport" data-sport="Petanque" data-venue="Green Forest Hotel">Petanque</td>
                    <td class="venue" data-sport="Petanque" data-venue="Green Forest Hotel">Green Forest Hotel</td>
                    <td class="durasi">9</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">23</td>
                    <td class="sport" data-sport="Sambo" data-venue="Indoor B GOR Pajajaran">Sambo</td>
                    <td class="venue" data-sport="Sambo" data-venue="Indoor B GOR Pajajaran">Indoor B GOR Pajajaran</td>
                    <td class="durasi">7</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">24</td>
                    <td class="sport" data-sport="Shorinji Kempo" data-venue="Gymnasium Sekolah Vokasi IPB">Shorinji Kempo</td>
                    <td class="venue" data-sport="Shorinji Kempo" data-venue="Gymnasium Sekolah Vokasi IPB">Gymnasium Sekolah Vokasi IPB</td>
                    <td class="durasi">7</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">25</td>
                    <td class="sport" data-sport="Ski Air" data-venue="Kota Baru Parahyangan">Ski Air</td>
                    <td class="venue" data-sport="Ski Air" data-venue="Kota Baru Parahyangan">Kota Baru Parahyangan</td>
                    <td class="durasi">9</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">26</td>
                    <td class="sport" data-sport="Taekwondo" data-venue="Indoor A GOR Pajajaran">Taekwondo</td>
                    <td class="venue" data-sport="Taekwondo" data-venue="Indoor A GOR Pajajaran">Indoor A GOR Pajajaran</td>
                    <td class="durasi">9</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">27</td>
                    <td class="sport" data-sport="Tarung Derajat" data-venue="Gymnasium Sekolah Vokasi IPB">Tarung Derajat</td>
                    <td class="venue" data-sport="Tarung Derajat" data-venue="Gymnasium Sekolah Vokasi IPB">Gymnasium Sekolah Vokasi IPB</td>
                    <td class="durasi">8</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                </tr>
                <tr>
                    <td class="no">28</td>
                    <td class="sport" data-sport="Tenis Meja" data-venue="GOR Yasmin Bulutangkis">Tenis Meja</td>
                    <td class="venue" data-sport="Tenis Meja" data-venue="GOR Yasmin Bulutangkis">GOR Yasmin Bulutangkis</td>
                    <td class="durasi">12</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>

            </tbody>
        </table>
    </div>

    <!-- Day Picker + Download -->
    <div class="day-picker-wrap">
        <h4>Pilih Hari ↑</h4>
        <div class="day-picker">
            <button class="day-btn"><span class="num">31</span><span class="mon">Okt</span></button>
            <button class="day-btn"><span class="num">1</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">2</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">3</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">4</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">5</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">6</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">7</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">8</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">9</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">10</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">11</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">12</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">13</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">14</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">15</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">16</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">17</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">18</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">19</span><span class="mon">Nov</span></button>
            <button class="day-btn"><span class="num">20</span><span class="mon">Nov</span></button>
        </div>
        <a href="#" class="download-btn">
            <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Unduh Jadwal
        </a>
    </div>
</div>

<!-- Modal Fasilitas / Venue -->
<div id="venueModal" class="venue-modal-overlay">
    <div class="venue-modal-content">
        <button class="venue-modal-close" id="closeModalBtn">&times;</button>
        <div class="venue-modal-header">
            <span class="venue-badge">Informasi Venue & Fasilitas</span>
            <h2 id="modalVenueName">Nama Venue</h2>
            <p id="modalSportName">Cabang Olahraga: -</p>
        </div>
        <div class="venue-modal-body">
            <div class="venue-section">
                <h3>
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Hotel & Penginapan Terdekat
                </h3>
                <div class="cards-grid" id="modalHotels">
                    <!-- Hotels will be injected here -->
                </div>
            </div>

            <div class="venue-section">
                <h3>
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Fasilitas Pendukung
                </h3>
                <ul class="facilities-list" id="modalFacilities">
                    <!-- Facilities will be injected here -->
                </ul>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    /* ================================================================
       FILTERING LOGIC — Filter by search and date picker
       ================================================================ */
    const searchFilter = document.getElementById('searchFilter');
    const datePickerFilter = document.getElementById('datePickerFilter');
    const resetFilterBtn = document.getElementById('resetFilterBtn');
    const tableRows = document.querySelectorAll('.jadwal-tbl tbody tr');
    const dayBtns = document.querySelectorAll('.day-btn');
    const tableCount = document.getElementById('tableCount');
    const totalCount = tableRows.length;

    // Pemetaan tanggal ke index kolom (Berdasarkan urutan dari HTML tabel)
    const dateToIndexMap = {
        '2026-10-31': 4,
        '2026-11-01': 5,
        '2026-11-02': 6,
        '2026-11-03': 7,
        '2026-11-04': 8,
        '2026-11-05': 9,
        '2026-11-06': 10,
        '2026-11-07': 11,
        '2026-11-08': 12,
        '2026-11-09': 13,
        '2026-11-10': 14,
        '2026-11-11': 15,
        '2026-11-12': 16,
        '2026-11-13': 17,
        '2026-11-14': 18,
        '2026-11-15': 19,
        '2026-11-16': 20,
        '2026-11-17': 21,
        '2026-11-18': 22,
        '2026-11-19': 23,
        '2026-11-20': 24
    };

    function updateCount(visible) {
        tableCount.innerHTML = visible === totalCount
            ? 'Menampilkan <strong>' + totalCount + '</strong> dari ' + totalCount + ' cabang olahraga'
            : 'Menampilkan <strong>' + visible + '</strong> dari ' + totalCount + ' cabang olahraga';
    }

    function filterTable() {
        const searchTerm = searchFilter.value.toLowerCase();
        const selectedDate = datePickerFilter.value; // Format: "YYYY-MM-DD"
        let visibleCount = 0;

        // Reset & sembunyikan kolom sebelum tanggal yang dipilih
        document.querySelectorAll('.jadwal-tbl .date-col').forEach(el => el.classList.remove('col-hidden'));
        document.querySelectorAll('.jadwal-tbl .day-cell').forEach(el => el.classList.remove('col-hidden'));
        if (selectedDate) {
            const colIndex = dateToIndexMap[selectedDate];
            if (colIndex) {
                const dateHeaders = document.querySelectorAll('.jadwal-tbl thead .month-header .date-col');
                dateHeaders.forEach((th, idx) => {
                    if (idx < colIndex - 4) th.classList.add('col-hidden');
                });
                tableRows.forEach(row => {
                    for (let i = 4; i < colIndex; i++) {
                        const td = row.children[i];
                        if (td) td.classList.add('col-hidden');
                    }
                });
            }
        }

        tableRows.forEach(row => {
            const sport = row.querySelector('.sport').textContent.toLowerCase();
            const venue = row.querySelector('.venue').textContent.toLowerCase();
            const textMatch = sport.includes(searchTerm) || venue.includes(searchTerm);

            let dateMatch = true;

            // Jika pengguna memilih tanggal — tampilkan hanya cabor yang aktif di tanggal itu
            if (selectedDate) {
                const colIndex = dateToIndexMap[selectedDate];
                if (colIndex) {
                    const td = row.children[colIndex];
                    if (td && td.querySelector('.day-empty')) {
                        dateMatch = false;
                    }
                } else {
                    dateMatch = false;
                }
            }

            if (textMatch && dateMatch) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        updateCount(visibleCount);

        // Sync tombol hari cepat (day-btn) di bagian bawah
        dayBtns.forEach(btn => btn.classList.remove('active'));
        if (selectedDate && dateToIndexMap[selectedDate]) {
            const dateObj = new Date(selectedDate);
            const d = dateObj.getDate();
            const m = dateObj.getMonth(); // 9 = Okt, 10 = Nov

            dayBtns.forEach(btn => {
                const num = parseInt(btn.querySelector('.num').textContent.trim());
                const mon = btn.querySelector('.mon').textContent.trim().toLowerCase();
                if (num === d && ((m === 9 && mon === 'okt') || (m === 10 && mon === 'nov'))) {
                    btn.classList.add('active');
                }
            });
        }
    }

    // Event Listeners Filter Utama
    searchFilter.addEventListener('input', filterTable);
    datePickerFilter.addEventListener('change', filterTable);

    resetFilterBtn.addEventListener('click', () => {
        searchFilter.value = '';
        datePickerFilter.value = '';
        dayBtns.forEach(btn => btn.classList.remove('active'));
        filterTable();
    });

    // Event Listeners Tombol Hari Cepat (Bawah)
    dayBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            dayBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const num = this.querySelector('.num').textContent.trim();
            const mon = this.querySelector('.mon').textContent.trim().toLowerCase();

            // Ubah menjadi format YYYY-MM-DD
            const y = 2026;
            const m = mon === 'okt' ? '10' : '11';
            const d = num.padStart(2, '0');
            const dateString = `${y}-${m}-${d}`;

            // Update isi Date Picker dan filter ulang
            datePickerFilter.value = dateString;
            filterTable();
        });
    });

    // Modal Data
    const venueData = {
        'Green Forest Hotel': {
            hotels: [{
                    name: 'Hotel Aston Bogor',
                    distance: '1.2 km',
                    rating: '4.5'
                },
                {
                    name: 'The Highland Park Resort',
                    distance: '2.5 km',
                    rating: '4.3'
                },
                {
                    name: 'Leuweung Geledegan Ecolodge',
                    distance: '3.0 km',
                    rating: '4.4'
                }
            ],
            facilities: [{
                    name: 'Minimarket',
                    type: 'shopping',
                    icon: 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'
                },
                {
                    name: 'Klinik 24 Jam',
                    type: 'health',
                    icon: 'M19 14l-7 7m0 0l-7-7m7 7V3'
                },
                {
                    name: 'ATM Center',
                    type: 'finance',
                    icon: 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'
                },
                {
                    name: 'Cafe & Resto',
                    type: 'food',
                    icon: 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'
                }
            ]
        },
        'Majalengka': {
            hotels: [{
                    name: 'Fitra Hotel',
                    distance: '3.0 km',
                    rating: '4.1'
                },
                {
                    name: 'Hotel Fieris',
                    distance: '4.5 km',
                    rating: '4.4'
                }
            ],
            facilities: [{
                    name: 'Puskesmas Terdekat',
                    type: 'health',
                    icon: 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'
                },
                {
                    name: 'Warung Makan Lokal',
                    type: 'food',
                    icon: 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'
                }
            ]
        },
        'Gunung Mas': {
            hotels: [{
                    name: 'Pesona Alam Resort',
                    distance: '5.0 km',
                    rating: '4.7'
                },
                {
                    name: 'Royal Safari Garden',
                    distance: '7.2 km',
                    rating: '4.5'
                }
            ],
            facilities: [{
                    name: 'Klinik P3K Gunung Mas',
                    type: 'health',
                    icon: 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'
                },
                {
                    name: 'Pusat Oleh-oleh',
                    type: 'shopping',
                    icon: 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'
                }
            ]
        },
        'PPSDMAP Kemenhub Kemang': {
            hotels: [{
                    name: 'Pendopo 45 Hotel',
                    distance: '2.1 km',
                    rating: '4.0'
                },
                {
                    name: 'Lorin Sentul Hotel',
                    distance: '6.5 km',
                    rating: '4.3'
                }
            ],
            facilities: [{
                    name: 'Kantin Kemenhub',
                    type: 'food',
                    icon: 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z'
                },
                {
                    name: 'Minimarket',
                    type: 'shopping',
                    icon: 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'
                }
            ]
        }
    };

    const modal = document.getElementById('venueModal');
    const closeBtn = document.getElementById('closeModalBtn');
    const modalVenueName = document.getElementById('modalVenueName');
    const modalSportName = document.getElementById('modalSportName');
    const modalHotels = document.getElementById('modalHotels');
    const modalFacilities = document.getElementById('modalFacilities');

    function openModal(venue, sport) {
        modalVenueName.textContent = venue;
        modalSportName.textContent = 'Cabang Olahraga: ' + sport;

        const data = venueData[venue] || {
            hotels: [],
            facilities: []
        };

        // Render Hotels
        if (data.hotels.length > 0) {
            modalHotels.innerHTML = data.hotels.map(h => `
            <div class="hotel-card">
                <h4>${h.name}</h4>
                <div class="hotel-meta">
                    <span>Jarak: ${h.distance}</span>
                    <div class="hotel-rating">
                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        ${h.rating}
                    </div>
                </div>
            </div>
        `).join('');
        } else {
            modalHotels.innerHTML = '<p style="color:#64748b;font-size:13px;">Informasi hotel belum tersedia untuk venue ini.</p>';
        }

        // Render Facilities
        if (data.facilities.length > 0) {
            modalFacilities.innerHTML = data.facilities.map(f => `
            <li class="facility-item">
                <div class="facility-icon">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="${f.icon}"></path>
                    </svg>
                </div>
                ${f.name}
            </li>
        `).join('');
        } else {
            modalFacilities.innerHTML = '<p style="color:#64748b;font-size:13px;">Informasi fasilitas belum tersedia untuk venue ini.</p>';
        }

        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Attach Event Listeners to table cells
    document.querySelectorAll('.sport, .venue').forEach(cell => {
        cell.addEventListener('click', function() {
            const venue = this.getAttribute('data-venue');
            const sport = this.getAttribute('data-sport');
            if (venue && sport) {
                openModal(venue, sport);
            }
        });
    });

    closeBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    /* ================================================================
       SCROLL HINT — Auto-hide when user scrolls table right
       ================================================================ */
    const tableWrap = document.getElementById('jadwalTableWrap');
    const scrollHint = document.getElementById('scrollHint');
    if (tableWrap && scrollHint) {
        tableWrap.addEventListener('scroll', function() {
            if (this.scrollLeft > 100) {
                scrollHint.style.display = 'none';
                tableWrap.classList.add('scrolled-right');
            } else {
                tableWrap.classList.remove('scrolled-right');
            }
        });
    }
</script>
@endpush
@endsection