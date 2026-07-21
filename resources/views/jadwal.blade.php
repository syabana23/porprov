@extends('layouts.app')

@section('title', 'Jadwal - PORPROV XV KOTA BOGOR 2026')

@push('styles')
<style>
    /* ── Banner ── */
    .jadwal-banner {
        background: #013469;
        position: relative;
        height: 110px;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .jadwal-banner .banner-content {
        padding: 0 28px;
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .jadwal-banner .banner-content svg {
        opacity: 0.85;
        flex-shrink: 0;
    }

    .jadwal-banner h1 {
        color: #fff;
        font-size: 22px;
        font-weight: 800;
        text-transform: uppercase;
        margin: 0;
        letter-spacing: 0.03em;
    }

    .jadwal-banner p {
        color: #c8d9ea;
        font-size: 12px;
        margin: 3px 0 0;
    }

    .jadwal-banner .deco-right {
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        display: flex;
        align-items: flex-end;
        padding-right: 24px;
    }

    .jadwal-banner .deco-right .mascot {
        height: 130%;
        width: auto;
        object-fit: contain;
    }

    .jadwal-banner .deco-wave {
        position: absolute;
        right: 0;
        top: 0;
        width: 35%;
        height: 100%;
    }

    .deco-wave .yellow-stripe {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: #FDB813;
        clip-path: polygon(30% 0%, 100% 0%, 100% 100%, 0% 100%);
        opacity: 0.9;
    }

    /* ── Page Layout ── */
    .jadwal-page {
        max-width: 1200px;
        margin: 0 auto;
        padding: 24px 20px 40px;
    }

    /* ── Table ── */
    .jadwal-table-wrap {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.09);
        overflow: auto;
        margin-bottom: 28px;
    }

    .jadwal-tbl {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
        min-width: 850px;
    }

    .jadwal-tbl thead {
        background: #013469;
        color: #fff;
    }

    .jadwal-tbl thead th {
        padding: 10px 12px;
        text-align: left;
        font-weight: 600;
        font-size: 11.5px;
        border-right: 1px solid rgba(255, 255, 255, 0.15);
        white-space: nowrap;
    }

    .jadwal-tbl thead th.date-col {
        text-align: center;
        font-size: 10px;
        padding: 6px 8px;
    }

    .jadwal-tbl thead .month-header th {
        background: #014590;
        font-size: 10px;
        text-align: center;
        letter-spacing: 0.04em;
    }

    .jadwal-tbl tbody tr {
        border-bottom: 1px solid #e5e7eb;
    }

    .jadwal-tbl tbody tr:hover {
        background: #f8fafc;
    }

    .jadwal-tbl tbody td {
        padding: 9px 12px;
        color: #374151;
        font-size: 12px;
        border-right: 1px solid #e5e7eb;
    }

    .jadwal-tbl tbody td.no {
        text-align: center;
        font-weight: 700;
        color: #013469;
    }

    .jadwal-tbl tbody td.sport {
        font-weight: 600;
        color: #013469;
        cursor: pointer;
    }

    .jadwal-tbl tbody td.sport:hover {
        text-decoration: underline;
    }

    .jadwal-tbl tbody td.durasi {
        text-align: center;
        font-weight: 600;
    }

    .jadwal-tbl tbody td.day-cell {
        padding: 0;
        height: 36px;
    }

    .day-prep {
        background: #60a5fa;
        width: 100%;
        height: 100%;
        display: block;
    }

    .day-exec {
        background: #fb923c;
        width: 100%;
        height: 100%;
        display: block;
    }

    .day-final {
        background: #c084fc;
        width: 100%;
        height: 100%;
        display: block;
    }

    .day-empty {
        width: 100%;
        height: 100%;
        display: block;
    }

    /* ── Bottom Layout ── */
    .jadwal-bottom {
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
    }

    /* ── Legend ── */
    .legend-box {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        padding: 20px;
        min-width: 240px;
        flex: 0 0 auto;
    }

    .legend-box h3 {
        font-size: 14px;
        font-weight: 800;
        color: #013469;
        margin: 0 0 16px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 14px;
    }

    .legend-dot {
        width: 42px;
        height: 22px;
        border-radius: 50px;
        flex-shrink: 0;
    }

    .legend-dot.prep {
        background: #60a5fa;
    }

    .legend-dot.exec {
        background: #fb923c;
    }

    .legend-dot.final {
        background: #c084fc;
    }

    .legend-item span {
        font-size: 11.5px;
        color: #374151;
        font-weight: 500;
        line-height: 1.4;
    }

    .legend-note {
        background: #f3f4f6;
        border-radius: 8px;
        padding: 10px 12px;
        display: flex;
        gap: 8px;
        margin-top: 16px;
    }

    .legend-note svg {
        flex-shrink: 0;
        color: #6b7280;
    }

    .legend-note p {
        font-size: 10.5px;
        color: #6b7280;
        margin: 0;
        line-height: 1.5;
    }

    /* ── Day Picker + Download ── */
    .day-picker-wrap {
        flex: 1;
    }

    .day-picker-wrap h4 {
        font-size: 13px;
        font-weight: 700;
        color: #374151;
        margin: 0 0 12px;
    }

    .day-picker {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    .day-btn {
        width: 52px;
        height: 60px;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-family: 'Poppins', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
    }

    .day-btn:hover,
    .day-btn.active {
        background: #013469;
        border-color: #013469;
        color: #fff;
    }

    .day-btn .num {
        font-size: 18px;
        font-weight: 800;
        line-height: 1;
    }

    .day-btn .mon {
        font-size: 10px;
        font-weight: 500;
        text-transform: uppercase;
    }

    .download-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #013469;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
        font-weight: 700;
        padding: 14px 32px;
        border-radius: 10px;
        text-decoration: none;
        box-shadow: 0 4px 14px rgba(1, 52, 105, 0.25);
        transition: background 0.2s;
    }

    .download-btn:hover {
        background: #012050;
    }

    @media (max-width: 768px) {
        .jadwal-page {
            padding: 16px 16px 32px;
        }
        .jadwal-bottom {
            flex-direction: column;
            gap: 16px;
        }
        .legend-box {
            min-width: auto;
            width: 100%;
        }
        .day-picker-wrap {
            width: 100%;
        }
        .day-btn {
            width: 44px;
            height: 52px;
        }
        .day-btn .num {
            font-size: 15px;
        }
        .download-btn {
            width: 100%;
            justify-content: center;
            font-size: 14px;
            padding: 12px 24px;
        }
        .jadwal-banner {
            height: auto;
            min-height: 100px;
        }
        .jadwal-banner .deco-right {
            display: none;
        }
        .jadwal-banner .deco-wave {
            width: 50%;
        }
        .jadwal-banner h1 {
            font-size: 16px;
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
            <h1>JADWAL & VENUE PERTANDINGAN</h1>
            <p>Informasi terkini seputar PORPROV XV Kota Bogor 2026</p>
        </div>
    </div>
    <div class="banner-accent-line"></div>
</section>

<div class="jadwal-page">
    <!-- Table -->
    <div class="jadwal-table-wrap">
        <table class="jadwal-tbl">
            <thead>
                <tr>
                    <th rowspan="2" style="width:36px">No</th>
                    <th rowspan="2">Cabang Olahraga</th>
                    <th rowspan="2">Venue</th>
                    <th rowspan="2" style="width:54px;text-align:center">Durasi</th>
                    <th colspan="1" style="background:#014590;text-align:center">Oktober</th>
                    <th colspan="8" style="background:#014590;text-align:center">November 2026</th>
                </tr>
                <tr class="month-header">
                    <th class="date-col">31<br>Jumat</th>
                    <th class="date-col">1<br>Sabtu</th>
                    <th class="date-col">2<br>Minggu</th>
                    <th class="date-col">3<br>Senin</th>
                    <th class="date-col">4<br>Selasa</th>
                    <th class="date-col">5<br>Rabu</th>
                    <th class="date-col">6<br>Kamis</th>
                    <th class="date-col">7<br>Jumat</th>
                    <th class="date-col">8<br>Sabtu</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="no">1</td>
                    <td class="sport">Aerosport - Gantolle</td>
                    <td>Majalengka</td>
                    <td class="durasi">13</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">2</td>
                    <td class="sport">Aerosport - Paralayang</td>
                    <td>Gunung Mas</td>
                    <td class="durasi">14</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">3</td>
                    <td class="sport">Anggar</td>
                    <td>Green Forest Hotel</td>
                    <td class="durasi">9</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                </tr>
                <tr>
                    <td class="no">4</td>
                    <td class="sport">Angkat Berat</td>
                    <td>Green Forest Hotel</td>
                    <td class="durasi">7</td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">5</td>
                    <td class="sport">Angkat Besi</td>
                    <td>Green Forest Hotel</td>
                    <td class="durasi">7</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                </tr>
                <tr>
                    <td class="no">6</td>
                    <td class="sport">Arung Jeram</td>
                    <td>Green Forest Hotel</td>
                    <td class="durasi">12</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">7</td>
                    <td class="sport">Binaraga</td>
                    <td>Green Forest Hotel</td>
                    <td class="durasi">5</td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
                <tr>
                    <td class="no">8</td>
                    <td class="sport">Bola Tangan Indoor</td>
                    <td>PPSDMAP Kemenhub Kemang</td>
                    <td class="durasi">9</td>
                    <td class="day-cell"><span class="day-prep"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-exec"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                    <td class="day-cell"><span class="day-final"></span></td>
                    <td class="day-cell"><span class="day-empty"></span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bottom: Legend + Day Picker + Download -->
    <div class="jadwal-bottom">
        <!-- Legend -->
        <div class="legend-box">
            <h3>KETERANGAN</h3>
            <div class="legend-item">
                <div class="legend-dot prep"></div>
                <span>Persiapan / Awal<br>Pertandingan</span>
            </div>
            <div class="legend-item">
                <div class="legend-dot exec"></div>
                <span>Pelaksanaan<br>Pertandingan</span>
            </div>
            <div class="legend-item">
                <div class="legend-dot final"></div>
                <span>Final / Penutupan<br>Pertandingan</span>
            </div>
            <div class="legend-note">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p>Klik pada nama cabang olahraga atau venue untuk melihat detail jadwal pertandingan.</p>
            </div>
        </div>

        <!-- Day Picker + Download -->
        <div class="day-picker-wrap">
            <h4>Pilih Hari ↑</h4>
            <div class="day-picker">
                <button class="day-btn"><span class="num">31</span><span class="mon">Okt</span></button>
                <button class="day-btn active"><span class="num">1</span><span class="mon">Nov</span></button>
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
            </div>
            <a href="#" class="download-btn">
                <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Unduh Jadwal
            </a>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('.day-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.day-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
@endpush
@endsection