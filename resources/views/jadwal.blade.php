@extends('layouts.app')

@section('title', 'Jadwal - PANDU PORPROV')

{{-- ═══════════════════════════════════════════════════════════════════ --}}
{{-- ║  JADWAL & VENUE PERTANDINGAN — PANDU PORPROV                   ║ --}}
{{-- ═══════════════════════════════════════════════════════════════════ --}}


@section('content')
<!-- Banner -->
<section class="page-banner">
    <img class="banner-bg-img" src="{{ asset('images/venue1.jpeg') }}" alt="">
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
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
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
            <div class="facility-filter-buttons">
                <button class="facility-filter-btn active" data-filter="all">Semua</button>
                <button class="facility-filter-btn" data-filter="cat-hotel">Hotel</button>
                <button class="facility-filter-btn" data-filter="cat-health">Kesehatan</button>
                <button class="facility-filter-btn" data-filter="cat-resto">Restoran</button>
                <button class="facility-filter-btn" data-filter="cat-police">Polisi</button>
                <button class="facility-filter-btn" data-filter="cat-apotek">Apotek</button>
            </div>

            <div class="facility-categories" id="modalFacilityCategories">
                <div class="facility-category" id="cat-hotel">
                    <div class="facility-cat-header">
                        <span class="cat-dot" style="background:#d97706;"></span>
                        <div class="facility-cat-icon" style="background:#fef3c7; color:#d97706;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z" />
                            </svg>
                        </div>
                        <h3>Hotel & Penginapan</h3>
                    </div>
                    <div class="facility-list-wrap">
                        <div class="facility-empty" style="text-align:center;padding:30px 10px;color:#94a3b8;font-size:13px;font-style:italic;">Tidak ada hotel untuk venue ini.</div>
                    </div>
                </div>

                <div class="facility-category" id="cat-health">
                    <div class="facility-cat-header">
                        <span class="cat-dot" style="background:#dc2626;"></span>
                        <div class="facility-cat-icon" style="background:#fee2e2;color:#dc2626;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z" />
                            </svg>
                        </div>
                        <h3>Fasilitas Kesehatan</h3>
                    </div>
                    <div class="facility-list-wrap">
                        <div class="facility-empty" style="text-align:center;padding:30px 10px;color:#94a3b8;font-size:13px;font-style:italic;">Tidak ada fasilitas kesehatan untuk venue ini.</div>
                    </div>
                </div>

                <div class="facility-category" id="cat-resto">
                    <div class="facility-cat-header">
                        <span class="cat-dot" style="background:#16a34a;"></span>
                        <div class="facility-cat-icon" style="background:#dcfce7;color:#16a34a;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-7v8h2.5v8H21V2h-5z" />
                            </svg>
                        </div>
                        <h3>Restoran</h3>
                    </div>
                    <div class="facility-list-wrap">
                        <div class="facility-empty" style="text-align:center;padding:30px 10px;color:#94a3b8;font-size:13px;font-style:italic;">Tidak ada restoran untuk venue ini.</div>
                    </div>
                </div>

                <div class="facility-category" id="cat-police">
                    <div class="facility-cat-header">
                        <span class="cat-dot" style="background:#4f46e5;"></span>
                        <div class="facility-cat-icon" style="background:#e0e7ff;color:#4f46e5;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
                            </svg>
                        </div>
                        <h3>Kantor Polisi</h3>
                    </div>
                    <div class="facility-list-wrap">
                        <div class="facility-empty" style="text-align:center;padding:30px 10px;color:#94a3b8;font-size:13px;font-style:italic;">Tidak ada kantor polisi untuk venue ini.</div>
                    </div>
                </div>

                <div class="facility-category" id="cat-apotek">
                    <div class="facility-cat-header">
                        <span class="cat-dot" style="background:#9333ea;"></span>
                        <div class="facility-cat-icon" style="background:#f3e8ff;color:#9333ea;">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z" />
                            </svg>
                        </div>
                        <h3>Apotek</h3>
                    </div>
                    <div class="facility-list-wrap">
                        <div class="facility-empty" style="text-align:center;padding:30px 10px;color:#94a3b8;font-size:13px;font-style:italic;">Tidak ada apotek untuk venue ini.</div>
                    </div>
                </div>
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
        tableCount.innerHTML = visible === totalCount ?
            'Menampilkan <strong>' + totalCount + '</strong> dari ' + totalCount + ' cabang olahraga' :
            'Menampilkan <strong>' + visible + '</strong> dari ' + totalCount + ' cabang olahraga';
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

    // Modal Data — All 13 venues with full facility data from welcome.blade.php
    const venueData = {
        'Green Forest Hotel': {
            hotel: [{
                    name: 'Hotel Aston Bogor',
                    address: 'Jl. Raya Pajajaran No. 127, Babakan, Kec. Bogor Tengah',
                    distance: '1.2 km',
                    rating: '4.5',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Hotel+Aston+Bogor'
                },
                {
                    name: 'The Highland Park Resort',
                    address: 'Jl. Raya Pajajaran, Kp. Baru, Babakan',
                    distance: '2.5 km',
                    rating: '4.3',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=The+Highland+Park+Resort+Bogor'
                },
                {
                    name: 'Leuweung Geledegan Ecolodge',
                    address: 'Jl. Raya Leuweung Geledegan, Bogor Selatan',
                    distance: '3.0 km',
                    rating: '4.4',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Leuweung+Geledegan+Ecolodge+Bogor'
                }
            ],
            hospital: [{
                    name: 'RS Melania Bogor',
                    address: 'Jl. Pahlawan No. 91, Bondongan, Kec. Bogor Selatan',
                    distance: '2.8 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+Melania+Bogor'
                },
                {
                    name: 'Puskesmas Cipaku',
                    address: 'Jl. Rangga Gading, Cipaku, Kec. Bogor Selatan',
                    distance: '2.1 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Puskesmas+Cipaku+Bogor'
                }
            ],
            restaurant: [{
                name: 'Resto Kampoeng Konsep',
                address: 'Jl. Soemanta Diredja No. 28, Pamoyanan, Kec. Bogor Selatan',
                distance: '400 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Resto+Kampoeng+Konsep+Bogor'
            }],
            police: [{
                name: 'Polsek Bogor Selatan',
                address: 'Jl. Layung Sari No. 1, Empang, Kec. Bogor Selatan',
                distance: '2.6 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Polsek+Bogor+Selatan'
            }],
            pharmacy: [{
                name: 'Apotek Kimia Farma Pahlawan',
                address: 'Jl. Pahlawan No. 40, Batutulis, Kec. Bogor Selatan',
                distance: '2.5 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Pahlawan+Bogor'
            }]
        },
        'Majalengka': {
            hotel: [{
                    name: 'Fitra Hotel',
                    address: 'Jl. KH. Abdul Halim No. 88, Majalengka Kulon',
                    distance: '3.0 km',
                    rating: '4.1',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Fitra+Hotel+Majalengka'
                },
                {
                    name: 'Hotel Fieris',
                    address: 'Jl. KH. Abdul Halim No. 100, Majalengka',
                    distance: '4.5 km',
                    rating: '4.4',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Hotel+Fieris+Majalengka'
                }
            ],
            hospital: [{
                    name: 'RSUD Majalengka',
                    address: 'Jl. Kesehatan No. 77, Majalengka Wetan',
                    distance: '1.5 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RSUD+Majalengka'
                },
                {
                    name: 'Puskesmas Majalengka',
                    address: 'Jl. KH. Abdul Halim No. 200, Majalengka',
                    distance: '1.3 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Puskesmas+Majalengka'
                }
            ],
            restaurant: [{
                name: 'RM Khas Sunda Saung Balong',
                address: 'Jl. KH. Abdul Halim No. 160, Majalengka Wetan',
                distance: '700 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=RM+Khas+Sunda+Saung+Balong+Majalengka'
            }],
            police: [{
                name: 'Polres Majalengka',
                address: 'Jl. KH. Abdul Halim No. 512, Majalengka',
                distance: '2.0 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Polres+Majalengka'
            }],
            pharmacy: [{
                name: 'Apotek Kimia Farma Majalengka',
                address: 'Jl. KH. Abdul Halim No. 120, Majalengka',
                distance: '900 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Majalengka'
            }]
        },
        'Gunung Mas': {
            hotel: [{
                    name: 'Pesona Alam Resort',
                    address: 'Jl. Raya Puncak Gadog No. KM 87, Cisarua',
                    distance: '5.0 km',
                    rating: '4.7',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Pesona+Alam+Resort+Cisarua'
                },
                {
                    name: 'Royal Safari Garden',
                    address: 'Jl. Raya Puncak - Gadog KM 77, Cisarua',
                    distance: '7.2 km',
                    rating: '4.5',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Royal+Safari+Garden+Cisarua'
                }
            ],
            hospital: [{
                    name: 'RSPG Cisarua (RS Paru Dr. M. Goenawan)',
                    address: 'Jl. Raya Puncak No. KM 83, Cisarua, Kab. Bogor',
                    distance: '1.8 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RSPG+Cisarua+RS+Paru+Cisarua'
                },
                {
                    name: 'Puskesmas Cisarua',
                    address: 'Jl. Raya Puncak No. KM 81, Cisarua, Kab. Bogor',
                    distance: '2.1 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Puskesmas+Cisarua'
                }
            ],
            restaurant: [{
                name: 'Resto Agrowisata Gunung Mas',
                address: 'Kawasan Agrowisata Gunung Mas, Tugu Selatan, Cisarua',
                distance: '200 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Resto+Agrowisata+Gunung+Mas+Cisarua'
            }],
            police: [{
                name: 'Polsek Cisarua',
                address: 'Jl. Raya Puncak KM 82, Cisarua, Kab. Bogor',
                distance: '2.3 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Polsek+Cisarua'
            }],
            pharmacy: [{
                name: 'Apotek Kimia Farma Cisarua',
                address: 'Jl. Raya Puncak No. 412, Cisarua, Kab. Bogor',
                distance: '1.5 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Cisarua'
            }]
        },
        'PPSDMAP Kemenhub Kemang': {
            hotel: [{
                name: 'Salak Sunset Hotel',
                address: 'Jl. Raya Kemang Parung No. 12, Kemang',
                distance: '2.1 km',
                rating: '4.0',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Salak+Sunset+Hotel+Kemang'
            }],
            hospital: [{
                    name: 'RS Sentosa Bogor',
                    address: 'Jl. Raya Kemang No. 18, Kemang, Kab. Bogor',
                    distance: '1.3 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+Sentosa+Bogor'
                },
                {
                    name: 'Puskesmas Kemang',
                    address: 'Jl. Raya Kemang No. 5, Kemang, Kab. Bogor',
                    distance: '1.1 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Puskesmas+Kemang'
                }
            ],
            restaurant: [{
                name: 'RM Ayam Goreng Bakar Sayati',
                address: 'Jl. Raya Parung - Bogor, Semplak Barat, Kemang',
                distance: '450 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=RM+Ayam+Goreng+Bakar+Sayati+Kemang'
            }],
            police: [{
                name: 'Polsek Kemang',
                address: 'Jl. Raya Kemang Parung No. 10, Kemang, Kab. Bogor',
                distance: '1.5 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Polsek+Kemang'
            }],
            pharmacy: [{
                name: 'Apotek Kimia Farma Kemang',
                address: 'Jl. Raya Parung-Bogor, Kemang, Kab. Bogor',
                distance: '800 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Kemang'
            }]
        },
        'GOR Pajajaran Indoor A': {
            hotel: [{
                    name: 'Zest Hotel Bogor',
                    address: 'Jl. Pajajaran No. 27, Babakan, Kec. Bogor Tengah',
                    distance: '1.2 km',
                    rating: '4.2',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Zest+Hotel+Bogor'
                },
                {
                    name: 'The Mirah Hotel Bogor',
                    address: 'Jl. Pangrango No. 9A, Babakan, Kec. Bogor Tengah',
                    distance: '1.5 km',
                    rating: '4.0',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=The+Mirah+Hotel+Bogor'
                }
            ],
            hospital: [{
                    name: 'RS Salak Bogor',
                    address: 'Jl. Jend. Sudirman No. 8, Sempur, Kec. Bogor Tengah',
                    distance: '1.1 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+Salak+Bogor'
                },
                {
                    name: 'RS PMI Bogor',
                    address: 'Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur',
                    distance: '2.5 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+PMI+Bogor'
                },
                {
                    name: 'Puskesmas Bogor Tengah',
                    address: 'Jl. Sawojajar No. 38, Pabaton, Kec. Bogor Tengah',
                    distance: '1.8 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Puskesmas+Bogor+Tengah'
                }
            ],
            restaurant: [{
                name: 'Rumah Makan Ampera Pemuda',
                address: 'Jl. Pemuda No. 27, Tanah Sareal, Kec. Tanah Sereal',
                distance: '300 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=RM+Ampera+Pemuda+Bogor'
            }],
            police: [{
                name: 'Polresta Bogor Kota (Mako Muslihat)',
                address: 'Jl. Kapten Muslihat No. 18, Paledang, Kec. Bogor Tengah',
                distance: '2.3 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Polresta+Bogor+Kota'
            }],
            pharmacy: [{
                name: 'Apotek Kimia Farma Juanda',
                address: 'Jl. Ir. H. Juanda No. 30, Babakan, Kec. Bogor Tengah',
                distance: '2.0 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Juanda+Bogor'
            }]
        },
        'GOR Pajajaran Indoor B': {
            hotel: [{
                    name: 'Zest Hotel Bogor',
                    address: 'Jl. Pajajaran No. 27, Babakan, Kec. Bogor Tengah',
                    distance: '1.2 km',
                    rating: '4.2',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Zest+Hotel+Bogor'
                },
                {
                    name: 'The Mirah Hotel Bogor',
                    address: 'Jl. Pangrango No. 9A, Babakan, Kec. Bogor Tengah',
                    distance: '1.5 km',
                    rating: '4.0',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=The+Mirah+Hotel+Bogor'
                }
            ],
            hospital: [{
                    name: 'RS Salak Bogor',
                    address: 'Jl. Jend. Sudirman No. 8, Sempur, Kec. Bogor Tengah',
                    distance: '1.1 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+Salak+Bogor'
                },
                {
                    name: 'RS PMI Bogor',
                    address: 'Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur',
                    distance: '2.5 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+PMI+Bogor'
                },
                {
                    name: 'Puskesmas Bogor Tengah',
                    address: 'Jl. Sawojajar No. 38, Pabaton, Kec. Bogor Tengah',
                    distance: '1.8 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Puskesmas+Bogor+Tengah'
                }
            ],
            restaurant: [{
                name: 'Rumah Makan Ampera Pemuda',
                address: 'Jl. Pemuda No. 27, Tanah Sareal, Kec. Tanah Sereal',
                distance: '300 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=RM+Ampera+Pemuda+Bogor'
            }],
            police: [{
                name: 'Polresta Bogor Kota (Mako Muslihat)',
                address: 'Jl. Kapten Muslihat No. 18, Paledang, Kec. Bogor Tengah',
                distance: '2.3 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Polresta+Bogor+Kota'
            }],
            pharmacy: [{
                name: 'Apotek Kimia Farma Juanda',
                address: 'Jl. Ir. H. Juanda No. 30, Babakan, Kec. Bogor Tengah',
                distance: '2.0 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Juanda+Bogor'
            }]
        },
        'GOR Yasmin': {
            hotel: [{
                    name: 'WHIZ Prime Hotel Bogor Yasmin',
                    address: 'Jl. KH. R. Abdullah Bin Nuh No. 33, Curugmekar',
                    distance: '600 m',
                    rating: '4.3',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=WHIZ+Prime+Hotel+Bogor+Yasmin'
                },
                {
                    name: 'Swiss-Belcourt Bogor',
                    address: 'Jl. KH. R. Abdullah Bin Nuh No. 27, Bukit Cimanggu City',
                    distance: '1.2 km',
                    rating: '4.1',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Swiss-Belcourt+Bogor'
                }
            ],
            hospital: [{
                    name: 'RS Hermina Bogor',
                    address: 'Jl. KH. R. Abdullah Bin Nuh No. E2, Hermina Grand Yasmin',
                    distance: '900 m',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+Hermina+Bogor'
                },
                {
                    name: 'RS Islam Bogor',
                    address: 'Jl. Perdana No. 22, Budi Agung, Tanahsareal',
                    distance: '2.0 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+Islam+Bogor'
                },
                {
                    name: 'Puskesmas Gang Kelor',
                    address: 'Jl. Raya Curug No. 12, Curugmekar, Kec. Bogor Barat',
                    distance: '1.4 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Puskesmas+Gang+Kelor+Bogor'
                }
            ],
            restaurant: [{
                name: 'Rumah Makan Ampera Yasmin',
                address: 'Jl. KH. R. Abdullah Bin Nuh No. 37, Curugmekar',
                distance: '350 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=RM+Ampera+Yasmin+Bogor'
            }],
            police: [{
                name: 'Polsek Tanah Sareal',
                address: 'Jl. Seremped, Kedung Badak, Kec. Tanah Sareal',
                distance: '2.4 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Polsek+Tanah+Sareal'
            }],
            pharmacy: [{
                name: 'Apotek Kimia Farma Yasmin',
                address: 'Ruko Taman Yasmin Sektor VI No. 108, Curugmekar',
                distance: '500 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Yasmin+Bogor'
            }]
        },
        'GOR Vokasi IPB': {
            hotel: [{
                name: 'IPB Hotel & Convention Centre',
                address: 'Botani Square, Jl. Pajajaran, Baranangsiang',
                distance: '2.8 km',
                rating: '4.0',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=IPB+Hotel+Convention+Centre+Botani+Bogor'
            }],
            hospital: [{
                    name: 'RS PMI Bogor',
                    address: 'Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur',
                    distance: '2.2 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+PMI+Bogor'
                },
                {
                    name: 'Puskesmas Bogor Utara',
                    address: 'Jl. Tegal Gundil, Kec. Bogor Utara',
                    distance: '1.9 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Puskesmas+Bogor+Utara'
                }
            ],
            restaurant: [{
                name: 'Toko Adelways (Kantin IPB Cilibende)',
                address: 'Jl. Cilibende, Babakan, Kec. Bogor Tengah',
                distance: '250 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Toko+Adelways+IPB+Cilibende'
            }],
            police: [{
                name: 'Polsek Bogor Utara',
                address: 'Jl. Pajajaran No. 200, Cibuluh, Kec. Bogor Utara',
                distance: '2.1 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Polsek+Bogor+Utara'
            }],
            pharmacy: [{
                name: 'Apotek Kimia Farma Pajajaran',
                address: 'Jl. Pajajaran No. 35, Babakan, Kec. Bogor Tengah',
                distance: '1.5 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Pajajaran+Bogor'
            }]
        },
        'Kota Baru Parahyangan': {
            hotel: [{
                name: 'Mason Pine Hotel',
                address: 'Jl. Raya Kotabaru Parahyangan, Cipeundeuy, Padalarang',
                distance: '500 m',
                rating: '4.2',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Mason+Pine+Hotel+Padalarang'
            }],
            hospital: [{
                    name: 'RS Cahya Kawaluyan',
                    address: 'Jl. Raya Parahyangan KM 1.5, Padalarang, Bandung Barat',
                    distance: '1.2 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+Cahya+Kawaluyan+Padalarang'
                },
                {
                    name: 'Puskesmas Padalarang',
                    address: 'Jl. Raya Padalarang No. 470, Bandung Barat',
                    distance: '2.8 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Puskesmas+Padalarang'
                }
            ],
            restaurant: [{
                name: 'Bumi Aki Kota Baru Parahyangan',
                address: 'Jl. Parahyangan Raya No. 1, Kota Baru Parahyangan',
                distance: '600 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Bumi+Aki+Kota+Baru+Parahyangan'
            }],
            police: [{
                name: 'Polsek Padalarang',
                address: 'Jl. Raya Padalarang No. 501, Bandung Barat',
                distance: '2.5 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Polsek+Padalarang'
            }],
            pharmacy: [{
                name: 'Apotek Kimia Farma KBP',
                address: 'Ruko Bumi Simpang, Kota Baru Parahyangan',
                distance: '800 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+KBP'
            }]
        },
        'Cisangkan': {
            hotel: [{
                name: 'Hotel Trikarya Cimahi',
                address: 'Jl. Raya Cisangkan No. 88, Padasuka, Cimahi Tengah',
                distance: '800 m',
                rating: '3.9',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Hotel+Trikarya+Cimahi'
            }],
            hospital: [{
                    name: 'RS Dustira Cimahi',
                    address: 'Jl. Dr. Dustira No. 1, Baros, Cimahi Tengah',
                    distance: '2.1 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+Dustira+Cimahi'
                },
                {
                    name: 'Puskesmas Cimahi Tengah',
                    address: 'Jl. Raden Demang Hardjakusumah No. 1, Cimahi',
                    distance: '1.6 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Puskesmas+Cimahi+Tengah'
                }
            ],
            restaurant: [{
                name: 'RM Ampera Cisangkan',
                address: 'Jl. Raya Barat No. 805, Padasuka, Cimahi Tengah',
                distance: '350 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=RM+Ampera+Cisangkan'
            }],
            police: [{
                name: 'Polres Cimahi',
                address: 'Jl. Raya Cibeureum No. 1, Cimahi Selatan',
                distance: '2.5 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Polres+Cimahi'
            }],
            pharmacy: [{
                name: 'Apotek Kimia Farma Cisangkan',
                address: 'Jl. Raya Cisangkan No. 12, Padasuka, Cimahi Tengah',
                distance: '400 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Cisangkan'
            }]
        },
        'Padepokan Voli Sentul': {
            hotel: [{
                    name: 'Lorin Sentul Hotel',
                    address: 'Kawasan Sirkuit Sentul Internasional, Babakan Madang',
                    distance: '1.2 km',
                    rating: '4.2',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Lorin+Sentul+Hotel'
                },
                {
                    name: 'Harris Hotel Sentul City',
                    address: 'Jl. Jend. Sudirman, Sentul City, Babakan Madang',
                    distance: '2.5 km',
                    rating: '4.0',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Harris+Hotel+Sentul+City'
                }
            ],
            hospital: [{
                    name: 'RS EMC Sentul',
                    address: 'Jl. MH. Thamrin No. 57, Sentul City, Babakan Madang',
                    distance: '2.7 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+EMC+Sentul'
                },
                {
                    name: 'Puskesmas Babakan Madang',
                    address: 'Jl. Raya Sentul No. 1, Babakan Madang',
                    distance: '2.0 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Puskesmas+Babakan+Madang'
                }
            ],
            restaurant: [{
                name: 'Restoran Lorin Sentul',
                address: 'Kawasan Sirkuit Sentul Internasional, Babakan Madang',
                distance: '1.2 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Restoran+Lorin+Sentul'
            }],
            police: [{
                name: 'Polsek Babakan Madang',
                address: 'Jl. Raya Babakan Madang No. 8, Kab. Bogor',
                distance: '2.2 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Polsek+Babakan+Madang'
            }],
            pharmacy: [{
                name: 'Apotek Kimia Farma Sentul City',
                address: 'Ruko Plaza Niaga 1, Sentul City',
                distance: '2.3 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Sentul+City'
            }]
        },
        'Stadion Pajajaran': {
            hotel: [{
                    name: 'Zest Hotel Bogor',
                    address: 'Jl. Pajajaran No. 27, Babakan, Kec. Bogor Tengah',
                    distance: '1.2 km',
                    rating: '4.2',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Zest+Hotel+Bogor'
                },
                {
                    name: 'The Mirah Hotel Bogor',
                    address: 'Jl. Pangrango No. 9A, Babakan, Kec. Bogor Tengah',
                    distance: '1.5 km',
                    rating: '4.0',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=The+Mirah+Hotel+Bogor'
                }
            ],
            hospital: [{
                    name: 'RS Salak Bogor',
                    address: 'Jl. Jend. Sudirman No. 8, Sempur, Kec. Bogor Tengah',
                    distance: '1.1 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+Salak+Bogor'
                },
                {
                    name: 'RS PMI Bogor',
                    address: 'Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur',
                    distance: '2.5 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+PMI+Bogor'
                },
                {
                    name: 'Puskesmas Bogor Tengah',
                    address: 'Jl. Sawojajar No. 38, Pabaton, Kec. Bogor Tengah',
                    distance: '1.8 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Puskesmas+Bogor+Tengah'
                }
            ],
            restaurant: [{
                name: 'Rumah Makan Ampera Pemuda',
                address: 'Jl. Pemuda No. 27, Tanah Sareal, Kec. Tanah Sereal',
                distance: '300 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=RM+Ampera+Pemuda+Bogor'
            }],
            police: [{
                name: 'Polresta Bogor Kota (Mako Muslihat)',
                address: 'Jl. Kapten Muslihat No. 18, Paledang, Kec. Bogor Tengah',
                distance: '2.3 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Polresta+Bogor+Kota'
            }],
            pharmacy: [{
                name: 'Apotek Kimia Farma Juanda',
                address: 'Jl. Ir. H. Juanda No. 30, Babakan, Kec. Bogor Tengah',
                distance: '2.0 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Juanda+Bogor'
            }]
        },
        'Arcamanik': {
            hotel: [{
                name: 'Grand Cordela Hotel Bandung',
                address: 'Jl. Soekarno-Hatta No. 791, Cisaranten Endah, Arcamanik',
                distance: '2.4 km',
                rating: '4.1',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Grand+Cordela+Hotel+Bandung+Arcamanik'
            }],
            hospital: [{
                    name: 'RS Hermina Arcamanik',
                    address: 'Jl. A.H. Nasution No. 50, Antapani, Bandung',
                    distance: '1.7 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=RS+Hermina+Arcamanik'
                },
                {
                    name: 'Puskesmas Arcamanik',
                    address: 'Jl. Cisaranten Kulon No. 4, Arcamanik, Bandung',
                    distance: '1.1 km',
                    mapUrl: 'https://www.google.com/maps/search/?api=1&query=Puskesmas+Arcamanik'
                }
            ],
            restaurant: [{
                name: 'RM Khas Sunda Cibiuk Arcamanik',
                address: 'Jl. Soekarno Hatta No. 741, Cisaranten Endah, Arcamanik',
                distance: '1.8 km',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=RM+Khas+Sunda+Cibiuk+Arcamanik'
            }],
            police: [{
                name: 'Polsek Arcamanik',
                address: 'Jl. Pacuan Kuda No. 54, Sukamiskin, Arcamanik',
                distance: '800 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Polsek+Arcamanik'
            }],
            pharmacy: [{
                name: 'Apotek Kimia Farma Arcamanik',
                address: 'Jl. Arcamanik Endah No. 42, Sukamiskin, Arcamanik',
                distance: '600 m',
                mapUrl: 'https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Arcamanik'
            }]
        }
    };

    const venueNameMap = {
        'GOR Yasmin Bulutangkis': 'GOR Yasmin',
        'Gymnasium Sekolah Vokasi IPB': 'GOR Vokasi IPB',
        'Indoor A GOR Pajajaran': 'GOR Pajajaran Indoor A',
        'Indoor B GOR Pajajaran': 'GOR Pajajaran Indoor B',
        'Lapangan Tembak Cisangkan': 'Cisangkan',
        'PPSDMAP Kemenhub Kemang Kab-Bogor': 'PPSDMAP Kemenhub Kemang',
        'Stadion Pajajaran': 'Stadion Pajajaran',
        'Green Forest Hotel': 'Green Forest Hotel',
        'Gunung Mas': 'Gunung Mas',
        'Majalengka': 'Majalengka',
        'Arcamanik': 'Arcamanik',
        'Padepokan Voli Sentul': 'Padepokan Voli Sentul',
        'Kota Baru Parahyangan': 'Kota Baru Parahyangan',
        'GOR Pajajaran Indoor A': 'GOR Pajajaran Indoor A',
        'GOR Pajajaran Indoor B': 'GOR Pajajaran Indoor B'
    };

    const modal = document.getElementById('venueModal');
    const closeBtn = document.getElementById('closeModalBtn');
    const modalVenueName = document.getElementById('modalVenueName');
    const modalSportName = document.getElementById('modalSportName');
    const modalFacilityCategories = document.getElementById('modalFacilityCategories');

    function getFacilityCategoryData(data, category) {
        return data[category] || [];
    }

    function renderFacilityItem(item, showRating) {
        let ratingHtml = '';
        if (showRating && item.rating) {
            ratingHtml = `
                <div class="hotel-rating">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    ${item.rating}
                </div>
            `;
        }
        return `
            <div class="facility-list-item">
                <div class="fli-icon">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/>
                    </svg>
                </div>
                <div class="fli-info">
                    <p class="fli-name">${item.name}${ratingHtml ? '' : ''}</p>
                    <p class="fli-addr">${item.address || ''} (${item.distance})</p>
                </div>
                ${item.mapUrl ? `<a href="${item.mapUrl}" target="_blank" class="fli-route">Rute</a>` : ''}
            </div>
        `;
    }

    function renderHotelItem(item) {
        return `
            <div class="hotel-card">
                <h4>${item.name}</h4>
                <div class="hotel-meta">
                    <span>${item.address || ''}</span>
                </div>
                <div class="hotel-meta">
                    <span>Jarak: ${item.distance}</span>
                    ${item.rating ? `
                        <div class="hotel-rating">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            ${item.rating}
                        </div>
                    ` : ''}
                </div>
                ${item.mapUrl ? `<a href="${item.mapUrl}" target="_blank" class="fli-route" style="display:inline-block;margin-top:6px;">Rute</a>` : ''}
            </div>
        `;
    }

    function openModal(venue, sport) {
        modalVenueName.textContent = venue;
        modalSportName.textContent = 'Cabang Olahraga: ' + sport;

        const mappedVenue = venueNameMap[venue] || venue;
        const data = venueData[mappedVenue];

        const categories = ['hotel', 'hospital', 'restaurant', 'police', 'pharmacy'];
        const catElements = {
            hotel: document.getElementById('cat-hotel'),
            hospital: document.getElementById('cat-health'),
            restaurant: document.getElementById('cat-resto'),
            police: document.getElementById('cat-police'),
            pharmacy: document.getElementById('cat-apotek')
        };

        categories.forEach(cat => {
            const el = catElements[cat];
            if (!el) return;
            const wrap = el.querySelector('.facility-list-wrap');
            const items = getFacilityCategoryData(data, cat);
            const emptyMsg = {
                hotel: 'Tidak ada hotel untuk venue ini.',
                hospital: 'Tidak ada fasilitas kesehatan untuk venue ini.',
                restaurant: 'Tidak ada restoran untuk venue ini.',
                police: 'Tidak ada kantor polisi untuk venue ini.',
                pharmacy: 'Tidak ada apotek untuk venue ini.'
            };
            if (items.length > 0) {
                wrap.innerHTML = items.map(item => {
                    if (cat === 'hotel') {
                        return renderHotelItem(item);
                    }
                    return renderFacilityItem(item, false);
                }).join('');
            } else {
                wrap.innerHTML = `<p style="color:#94a3b8;font-style:italic;font-size:12px;padding:16px 0;text-align:center;">${emptyMsg[cat]}</p>`;
            }
        });

        resetFilterButtons();
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function resetFilterButtons() {
        document.querySelectorAll('.facility-filter-btn').forEach(btn => {
            btn.classList.remove('active');
        });
        const allBtn = document.querySelector('.facility-filter-btn[data-filter="all"]');
        if (allBtn) allBtn.classList.add('active');
        document.querySelectorAll('.facility-category').forEach(cat => {
            cat.style.display = 'block';
        });
    }

    function closeModal() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.sport, .venue').forEach(cell => {
        cell.addEventListener('click', function() {
            const venue = this.getAttribute('data-venue');
            const sport = this.getAttribute('data-sport');
            if (venue && sport) {
                openModal(venue, sport);
            }
        });
    });

    document.querySelectorAll('.facility-filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.facility-filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const filter = this.getAttribute('data-filter');
            document.querySelectorAll('.facility-category').forEach(cat => {
                if (filter === 'all') {
                    cat.style.display = 'block';
                } else {
                    cat.style.display = cat.id === filter ? 'block' : 'none';
                }
            });
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