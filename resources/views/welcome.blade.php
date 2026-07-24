@extends('layouts.app')

@section('title', 'PORPROV XV KOTA BOGOR 2026 - Beranda')

@push('styles')
<style>
    /* ═══════════════════════════════════════════════════════════════════
       GLOBAL LAYOUT & RESETS
       ═══════════════════════════════════════════════════════════════════ */
    body {
        -webkit-overflow-scrolling: touch;
    }

    /* ═══════════════════════════════════════════════════════════════════
       1. HERO SECTION WITH BACKGROUND IMAGE & CURVED BLEND
       ═══════════════════════════════════════════════════════════════════ */
    .hero-wrapper {
        position: relative;
        background: linear-gradient(135deg, #001a33 0%, #013469 40%, #0a4fa8 75%, #0d63cc 100%);
        padding: 90px 20px 100px;
        color: #fff;
    }

    /* Floating Particle Dots */
    .hero-particles {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 1;
        overflow: hidden;
    }

    .hero-particles span {
        position: absolute;
        width: 6px;
        height: 6px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        animation: particleFloat 8s ease-in-out infinite;
    }

    .hero-particles span:nth-child(1) {
        top: 10%;
        left: 15%;
        animation-delay: 0s;
        width: 8px;
        height: 8px;
    }

    .hero-particles span:nth-child(2) {
        top: 30%;
        left: 85%;
        animation-delay: 1.5s;
        width: 5px;
        height: 5px;
    }

    .hero-particles span:nth-child(3) {
        top: 60%;
        left: 10%;
        animation-delay: 3s;
        width: 7px;
        height: 7px;
    }

    .hero-particles span:nth-child(4) {
        top: 80%;
        left: 75%;
        animation-delay: 4.5s;
        width: 4px;
        height: 4px;
    }

    .hero-particles span:nth-child(5) {
        top: 45%;
        left: 50%;
        animation-delay: 2s;
        width: 6px;
        height: 6px;
    }

    .hero-particles span:nth-child(6) {
        top: 15%;
        left: 55%;
        animation-delay: 5.5s;
        width: 5px;
        height: 5px;
    }

    .hero-particles span:nth-child(7) {
        top: 70%;
        left: 30%;
        animation-delay: 0.8s;
        width: 9px;
        height: 9px;
        opacity: 0.08;
    }

    .hero-particles span:nth-child(8) {
        top: 90%;
        left: 90%;
        animation-delay: 3.8s;
        width: 4px;
        height: 4px;
    }

    @keyframes particleFloat {

        0%,
        100% {
            transform: translateY(0) scale(1);
            opacity: 0.15;
        }

        50% {
            transform: translateY(-30px) scale(1.3);
            opacity: 0.3;
        }
    }

    /* Background Image overlay from previous template */
    .hero-bg-img-overlay {
        position: absolute;
        top: 0;
        right: 0;
        width: 60%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        opacity: 0.35;
        z-index: 1;
        pointer-events: none;
        -webkit-mask-image: linear-gradient(to right, transparent 0%, black 45%);
        mask-image: linear-gradient(to right, transparent 0%, black 45%);
    }

    /* Dynamic SVG Overlay Wave */
    .hero-bg-wave-svg {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 2;
        opacity: 0.12;
    }

    .hero-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        z-index: 3;
        gap: 30px;
    }

    .hero-content {
        flex: 1;
        max-width: 640px;
    }

    .hero-pill-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(253, 184, 19, 0.15);
        border: 1px solid rgba(253, 184, 19, 0.4);
        padding: 6px 18px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 700;
        color: #FDB813;
        margin-bottom: 22px;
        backdrop-filter: blur(6px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .hero-title {
        font-size: 46px;
        font-weight: 900;
        line-height: 1.12;
        margin: 0 0 12px;
        letter-spacing: -0.5px;
        color: #ffffff;
        text-transform: uppercase;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .hero-title .yellow-accent {
        color: #FDB813;
        display: block;
        font-size: 52px;
        letter-spacing: 0px;
    }

    .hero-tagline-bubble {
        display: inline-block;
        font-size: 20px;
        font-weight: 800;
        color: #FDB813;
        font-style: italic;
        margin-bottom: 18px;
        letter-spacing: 0.2px;
    }

    .hero-desc {
        color: #fff;
        font-size: 14.5px;
        line-height: 1.65;
        margin: 0 0 30px;
        max-width: 530px;
    }

    .hero-actions {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    .btn-hero-primary {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #FDB813 0%, #f59e0b 100%);
        color: #012050;
        font-weight: 800;
        font-size: 14px;
        padding: 13px 28px;
        border-radius: 10px;
        text-decoration: none;
        box-shadow: 0 6px 20px rgba(253, 184, 19, 0.35);
        transition: all 0.25s ease;
    }

    .btn-hero-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 28px rgba(253, 184, 19, 0.5);
        color: #000;
    }

    .btn-hero-secondary {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        font-weight: 700;
        font-size: 14px;
        padding: 13px 28px;
        border-radius: 10px;
        text-decoration: none;
        border: 1.5px solid rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(6px);
        transition: all 0.25s ease;
    }

    .btn-hero-secondary:hover {
        background: rgba(255, 255, 255, 0.22);
        border-color: #fff;
        color: #fff;
        transform: translateY(-2px);
    }

    /* Bottom Curve Overlay */
    .hero-bottom-curve {
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        z-index: 3;
    }

    .hero-bottom-curve svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 50px;
    }

    /* ═══════════════════════════════════════════════════════════════════
       1B. HERO SLIDESHOW (Background Images + CABOR Icons)
       ═══════════════════════════════════════════════════════════════════ */
    .hero-wrapper.hero-slideshow {
        overflow: hidden;
        min-height: 520px;
    }

    .hero-slides {
        position: absolute;
        inset: 0;
        z-index: 0;
    }

    .hero-slide {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        opacity: 0;
        transition: opacity 1.5s ease-in-out;
        z-index: 0;
    }

    .hero-slide.active {
        opacity: 1;
        z-index: 1;
    }

    .hero-slide-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0, 26, 51, 0.88) 0%, rgba(1, 52, 105, 0.72) 40%, rgba(10, 79, 168, 0.45) 75%, rgba(13, 99, 204, 0.25) 100%);
        z-index: 1;
    }

    .hero-slide-cabor {
        position: absolute;
        right: 40px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;
    }

    .hero-slide-cabor img {
        width: auto;
        height: auto;
        max-width: 280px;
        max-height: 60vh;
        object-fit: contain;
    }

    @media (max-width: 768px) {
        .hero-slide-cabor img {
            max-width: 160px;
        }
        .hero-wrapper.hero-slideshow {
            min-height: 420px;
        }
    }

    @media (max-width: 480px) {
        .hero-slide-cabor img {
            max-width: 110px;
        }
    }
        .hero-wrapper.hero-slideshow {
            min-height: 420px;
        }
    }

    /* ═══════════════════════════════════════════════════════════════════
       2. STATISTICS OVERLAP BAR
       ═══════════════════════════════════════════════════════════════════ */
    .stats-overlap-container {
        max-width: 1160px;
        margin: -30px auto 45px;
        padding: 0 20px;
        position: relative;
        z-index: 10;
    }

    .stats-grid {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 18px;
        box-shadow: 0 12px 35px rgba(1, 52, 105, 0.12);
        padding: 22px 28px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        border: 1px solid rgba(226, 232, 240, 0.85);
    }

    .stat-card-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 8px 12px;
        border-right: 1px solid #f1f5f9;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        border-radius: 12px;
    }

    .stat-card-item:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 16px rgba(1, 52, 105, 0.08);
    }

    .stat-card-item:last-child {
        border-right: none;
    }

    .stat-icon-square {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: transform 0.3s ease;
    }

    .stat-card-item:hover .stat-icon-square {
        transform: scale(1.1) rotate(-3deg);
    }

    .stat-icon-square.blue {
        background: #eff6ff;
        color: #2563eb;
    }

    .stat-icon-square.yellow {
        background: #fefce8;
        color: #d97706;
    }

    .stat-icon-square.navy {
        background: #e0e7ff;
        color: #4338ca;
    }

    .stat-icon-square.green {
        background: #f0fdf4;
        color: #16a34a;
    }

    .stat-val {
        font-size: 28px;
        font-weight: 900;
        color: #0f172a;
        line-height: 1;
    }

    .stat-title {
        font-size: 13px;
        font-weight: 700;
        color: #334155;
        margin-top: 3px;
    }

    .stat-sub {
        font-size: 11px;
        color: #94a3b8;
        margin-top: 1px;
    }

    /* ═══════════════════════════════════════════════════════════════════
       3. SECTION HEADERS & COMMON WRAPPERS
       ═══════════════════════════════════════════════════════════════════ */
    .section-wrap {
        max-width: 1200px;
        margin: 0 auto 60px;
        padding: 0 20px;
    }

    .section-divider {
        max-width: 1200px;
        margin: 0 auto 20px;
        padding: 0 20px;
    }

    .section-divider hr {
        border: none;
        height: 2px;
        background: linear-gradient(to right, transparent, #e2e8f0 20%, #e2e8f0 80%, transparent);
        margin: 0;
    }

    .section-header-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }

    .section-title-group {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .section-bar {
        width: 5px;
        height: 26px;
        background: linear-gradient(to bottom, #013469, #FDB813);
        border-radius: 4px;
    }

    .section-heading {
        font-size: 22px;
        font-weight: 800;
        color: #013469;
        margin: 0;
        letter-spacing: -0.3px;
    }

    .section-subtitle {
        font-size: 12.5px;
        color: #64748b;
        margin: 2px 0 0;
    }

    .section-link {
        font-size: 13.5px;
        font-weight: 700;
        color: #2563eb;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
    }

    .section-link:hover {
        color: #1d4ed8;
        transform: translateX(3px);
    }

    /* ═══════════════════════════════════════════════════════════════════
       4. MAP & FACILITIES SIDE-BY-SIDE SECTION
       ═══════════════════════════════════════════════════════════════════ */
    .map-section-grid {
        display: grid;
        grid-template-columns: 65% 35%;
        gap: 24px;
        align-items: stretch;
    }

    /* Left Side: Map Container */
    .map-box-card {
        background: #ffffff;
        border-radius: 18px;
        box-shadow: 0 4px 22px rgba(0, 0, 0, 0.06);
        border: 1px solid #e2e8f0;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .map-container-wrap {
        position: relative;
        width: 100%;
        height: 400px;
        min-height: 300px;
        background: #e2e8f0;
    }

    #map-canvas {
        width: 100% !important;
        height: 100% !important;
    }

    /* Selected Venue Detail Box inside Left Column */
    .home-gor-card {
        background: #f8fafc;
        border-top: 1px solid #e2e8f0;
        padding: 18px 20px;
        display: none;
        /* Shown dynamically when clicking a map venue */
    }

    .gor-card-header {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 15.5px;
        font-weight: 800;
        color: #013469;
        margin-bottom: 6px;
    }

    .gor-card-body .addr {
        font-size: 12px;
        color: #64748b;
        display: flex;
        align-items: flex-start;
        gap: 6px;
        margin-bottom: 12px;
        line-height: 1.4;
    }

    .cabor-grid {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .cabor-tag {
        background: #e0f2fe;
        color: #0369a1;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11.5px;
        font-weight: 700;
    }

    .map-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: #013469;
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        padding: 9px 18px;
        text-decoration: none;
        border-radius: 8px;
        transition: background 0.2s;
    }

    .map-btn:hover {
        background: #012050;
        color: #fff;
    }

    /* Right Side: Facilities & Filter */
    .facilities-panel-card {
        background: #ffffff;
        border-radius: 18px;
        box-shadow: 0 4px 22px rgba(0, 0, 0, 0.06);
        border: 1px solid #e2e8f0;
        padding: 22px;
        display: flex;
        flex-direction: column;
    }

    .filter-form-clean {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-bottom: 18px;
    }

    .filter-form-clean .full-width {
        grid-column: 1 / -1;
    }

    .filter-input-styled,
    .filter-select-styled {
        width: 100%;
        height: 44px;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        padding: 0 14px;
        font-size: 13px;
        font-family: inherit;
        outline: none;
        background-color: #fff;
        transition: all 0.2s;
    }

    .filter-input-styled:focus,
    .filter-select-styled:focus {
        border-color: #013469;
        box-shadow: 0 0 0 3px rgba(1, 52, 105, 0.1);
    }

    .filter-actions {
        display: flex;
        gap: 10px;
        grid-column: 1 / -1;
    }

    .btn-search-blue {
        flex: 1;
        height: 44px;
        background: #013469;
        color: #fff;
        font-weight: 700;
        font-size: 13.5px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-search-blue:hover {
        background: #012050;
    }

    .btn-reset-light {
        height: 44px;
        padding: 0 18px;
        background: #f1f5f9;
        color: #475569;
        font-weight: 600;
        font-size: 13px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-reset-light:hover {
        background: #e2e8f0;
    }

    .facility-tabs-bar {
        display: flex;
        gap: 6px;
        overflow-x: auto;
        padding-bottom: 10px;
        border-bottom: 1px solid #f1f5f9;
        margin-bottom: 16px;
    }

    .facility-tabs-bar::-webkit-scrollbar {
        height: 4px;
    }

    .facility-tabs-bar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }

    .facility-filter-btn {
        padding: 6px 14px;
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        color: #64748b;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.2s;
    }

    .facility-filter-btn:hover,
    .facility-filter-btn.active {
        background: #013469;
        border-color: #013469;
        color: #fff;
    }

    .facilities-scroll-list {
        flex: 1;
        max-height: 280px;
        overflow-y: auto;
        padding-right: 4px;
    }

    .facilities-scroll-list::-webkit-scrollbar {
        width: 5px;
    }

    .facilities-scroll-list::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .facility-list-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 11px;
        border-radius: 10px;
        border: 1px solid #f1f5f9;
        margin-bottom: 8px;
        transition: background 0.2s;
    }

    .facility-list-item:hover {
        background: #f8fafc;
        border-color: #e2e8f0;
    }

    .fli-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .fli-info {
        flex: 1;
        min-width: 0;
    }

    .fli-name {
        font-size: 13px;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .fli-addr {
        font-size: 11px;
        color: #64748b;
        margin: 2px 0 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .fli-route {
        padding: 5px 12px;
        background: #e0f2fe;
        color: #0284c7;
        font-size: 11.5px;
        font-weight: 700;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.2s;
    }

    .fli-route:hover {
        background: #0284c7;
        color: #fff;
    }

    /* ═══════════════════════════════════════════════════════════════════
       5. UPCOMING MATCHES SECTION (BELOW MAP)
       ═══════════════════════════════════════════════════════════════════ */
    .matches-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 22px;
    }

    .match-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2e8f0;
        padding: 22px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }

    .match-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        border-radius: 16px 0 0 16px;
    }

    .match-card::before {
        background: linear-gradient(to bottom, #013469, #0a4fa8);
    }

    .cabor-icon {
        width: 24px;
        height: 24px;
        object-fit: contain;
        vertical-align: middle;
        margin-right: 5px;
    }

    .cabor-tag-icon {
        width: 18px;
        height: 18px;
        object-fit: contain;
        vertical-align: middle;
        margin-right: 3px;
    }

    .sport-marker {
        background: #fff;
        border: 2.5px solid #013469;
        border-radius: 50%;
        width: 44px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(1, 52, 105, 0.3);
    }

    .sport-marker-inner {
        width: 28px;
        height: 28px;
        object-fit: contain;
    }

    .match-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(1, 52, 105, 0.15);
        border-color: #cbd5e1;
    }

    .match-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 14px;
    }

    .match-sport-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #eff6ff;
        color: #1d4ed8;
        font-size: 12px;
        font-weight: 700;
        padding: 4px 14px;
        border-radius: 20px;
    }

    .match-date-badge {
        font-size: 11.5px;
        color: #d97706;
        font-weight: 700;
        background: #fefce8;
        padding: 4px 10px;
        border-radius: 6px;
        border: 1px solid #fef08a;
    }

    .match-title {
        font-size: 16px;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 8px;
        line-height: 1.35;
    }

    .match-venue-info {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12.5px;
        color: #64748b;
        margin-bottom: 18px;
    }

    .match-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 14px;
        border-top: 1px dashed #e2e8f0;
    }

    .match-status {
        font-size: 11.5px;
        font-weight: 700;
        color: #16a34a;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .match-status .dot {
        width: 8px;
        height: 8px;
        background: #16a34a;
        border-radius: 50%;
        box-shadow: 0 0 6px rgba(22, 163, 74, 0.5);
    }

    .btn-detail-sm {
        font-size: 12.5px;
        font-weight: 700;
        color: #013469;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: color 0.2s;
    }

    .btn-detail-sm:hover {
        color: #FDB813;
    }

    /* ═══════════════════════════════════════════════════════════════════
       SCROLL REVEAL ANIMATION
       ═══════════════════════════════════════════════════════════════════ */
    .reveal {
        opacity: 0;
        transform: translateY(24px);
        transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1),
            transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .reveal-delay-1 {
        transition-delay: 0.1s;
    }

    .reveal-delay-2 {
        transition-delay: 0.2s;
    }

    .reveal-delay-3 {
        transition-delay: 0.3s;
    }

    .reveal-delay-4 {
        transition-delay: 0.4s;
    }

    .stat-card-item.reveal {
        transition-delay: calc(var(--i, 0) * 0.1s);
    }

    @media (prefers-reduced-motion: reduce) {
        .reveal {
            opacity: 1;
            transform: none;
            transition: none;
        }
    }

    /* ── Panel fasilitas 35% — filter 1 kolom di layar sedang ── */
    @media (max-width: 1200px) {
        .filter-form-clean {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 992px) {
        .hero-bg-img-overlay {
            width: 100%;
            opacity: 0.2;
            -webkit-mask-image: none;
            mask-image: none;
        }

        .hero-container {
            flex-direction: column;
            text-align: center;
        }

        .hero-content {
            max-width: 100%;
        }

        .hero-desc {
            margin: 0 auto 26px;
        }

        .hero-actions {
            justify-content: center;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .stat-card-item:nth-child(odd) {
            border-right: 1px solid #f1f5f9;
        }

        .stat-card-item:nth-child(-n+2) {
            border-bottom: 1px solid #f1f5f9;
        }

        .map-section-grid {
            grid-template-columns: 1fr;
        }

        .map-container-wrap {
            height: 340px;
        }

        .section-heading {
            font-size: 19px;
        }
    }

    @media (max-width: 576px) {
        .hero-wrapper {
            padding: 80px 16px 75px;
        }

        .section-divider {
            padding: 0 16px;
            margin-bottom: 12px;
        }

        .section-divider hr {
            opacity: 0.5;
        }

        .hero-title {
            font-size: 26px;
            letter-spacing: -0.3px;
        }

        .hero-title .yellow-accent {
            font-size: 30px;
        }

        .hero-tagline-bubble {
            font-size: 14px;
        }

        .hero-desc {
            font-size: 13px;
        }

        .btn-hero-primary,
        .btn-hero-secondary {
            width: 100%;
            justify-content: center;
            padding: 14px 20px;
            font-size: 13px;
            min-height: 48px;
        }

        .hero-pill-badge {
            font-size: 11px;
            padding: 5px 14px;
        }

        .stats-overlap-container {
            margin-top: -20px;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            padding: 16px;
            gap: 10px;
        }

        .stat-card-item {
            padding: 8px 4px;
            border-right: none;
            border-bottom: 1px solid #f1f5f9;
        }

        .stat-card-item:last-child {
            border-bottom: none;
        }

        .stat-val {
            font-size: 22px;
        }

        .stat-title {
            font-size: 12px;
        }

        .section-wrap {
            padding: 0 16px;
            margin-bottom: 40px;
        }

        .section-heading {
            font-size: 18px;
        }

        .section-subtitle {
            font-size: 11px;
        }

        .filter-form-clean {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .filter-select-styled,
        .filter-input-styled {
            height: 48px;
            font-size: 16px;
        }

        .btn-search-blue {
            height: 48px;
            font-size: 14px;
        }

        .btn-reset-light {
            height: 48px;
            font-size: 13px;
        }

        .facility-filter-btn {
            padding: 10px 16px;
            font-size: 12px;
            min-height: 44px;
        }

        .facilities-scroll-list {
            max-height: 40vh;
        }

        .map-container-wrap {
            height: 300px;
            min-height: 280px;
        }

        .matches-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .match-card {
            padding: 18px;
        }

        .match-title {
            font-size: 14px;
        }
    }
</style>
@endpush

@section('content')

<!-- ═══════════════════════════════════════════════════════════════════
     1. HERO SECTION WITH VENUE SLIDESHOW BACKGROUND & CABOR ICONS
     ═══════════════════════════════════════════════════════════════════ -->
<section class="hero-wrapper hero-slideshow">
    <!-- Slideshow Backgrounds (4 venue images + CABOR icons) -->
    <div class="hero-slides" id="hero-slides">
        <!-- Slide 1: GOR Pajajaran Indoor A & B -->
        <div class="hero-slide active" style="background-image: url('{{ asset('images/venue1.jpeg') }}')">
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-cabor">
                <img src="{{ asset('images/cabor/12.PENCAK SILAT.png') }}" alt="Pencak Silat">
            </div>
        </div>
        <!-- Slide 2: Stadion Pajajaran -->
        <div class="hero-slide" style="background-image: url('{{ asset('images/venue2.jpeg') }}')">
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-cabor">
                <img src="{{ asset('images/cabor/7.MENEMBAK.png') }}" alt="Menembak">
            </div>
        </div>
        <!-- Slide 3: GOR Vokasi IPB -->
        <div class="hero-slide" style="background-image: url('{{ asset('images/venue3.jpeg') }}')">
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-cabor">
                <img src="{{ asset('images/cabor/5.PANAHAN.png') }}" alt="Panahan">
            </div>
        </div>
        <!-- Slide 4: GOR Yasmin -->
        <div class="hero-slide" style="background-image: url('{{ asset('images/venue4.jpeg') }}')">
            <div class="hero-slide-overlay"></div>
            <div class="hero-slide-cabor">
                <img src="{{ asset('images/cabor/19.TARUNG DERAJAT.png') }}" alt="Tarung Derajat">
            </div>
        </div>
    </div>

    <!-- Floating Particles -->
    <div class="hero-particles">
        <span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span>
    </div>

    <div class="hero-container">
        <!-- Hero Text Content -->
        <div class="hero-content">
            <div class="hero-pill-badge">
                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                </svg>
                Menuju Ajang Olahraga Terbesar Jawa Barat
            </div>

            <h1 class="hero-title">
                PORPROV XV <span class="yellow-accent">KOTA BOGOR 2026</span>
            </h1>

            <div class="hero-tagline-bubble">
                "Bersatu, Berprestasi, Bogor Juara!"
            </div>

            <p class="hero-desc">
                Semangat sportivitas, persaudaraan dan prestasi untuk membangun Jawa Barat yang lebih maju. Kota Bogor siap menjadi tuan rumah yang ramah dan menginspirasi.
            </p>

            <div class="hero-actions">
                <a href="{{ url('/jadwal') }}" class="btn-hero-primary">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Lihat Jadwal
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
                <a href="{{ url('/peta-venue') }}" class="btn-hero-secondary">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Peta Venue
                </a>
            </div>
        </div>

    </div>

    <!-- Bottom Curve Wave -->
    <div class="hero-bottom-curve">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,20 1200,60 L1200,120 L0,120 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     2. STATISTICS OVERLAP CARDS
     ═══════════════════════════════════════════════════════════════════ -->
<div class="stats-overlap-container reveal">
    <div class="stats-grid">
        <!-- Stat Item 1: Hotel -->
        <div class="stat-card-item reveal" style="--i: 0">
            <div class="stat-icon-square blue">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <div>
                <div class="stat-val">80+</div>
                <div class="stat-title">Hotel</div>
                <div class="stat-sub">Penginapan Nyaman</div>
            </div>
        </div>

        <!-- Stat Item 2: Cabor -->
        <div class="stat-card-item reveal" style="--i: 1">
            <div class="stat-icon-square yellow">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <circle cx="12" cy="5" r="2" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 21l2.5-6M18 11l-3.5 3-1.5 4M13 10l-1 4-3 3M9 21v-3l2-2" />
                </svg>
            </div>
            <div>
                <div class="stat-val">28+</div>
                <div class="stat-title">Cabang Olahraga</div>
                <div class="stat-sub">Kompetisi Bergengsi</div>
            </div>
        </div>

        <!-- Stat Item 3: Apotek -->
        <div class="stat-card-item reveal" style="--i: 2">
            <div class="stat-icon-square navy">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10M12 14v4m-2-2h4" />
                </svg>
            </div>
            <div>
                <div class="stat-val">164+</div>
                <div class="stat-title">Apotek</div>
                <div class="stat-sub">Siap Melayani</div>
            </div>
        </div>

        <!-- Stat Item 4: Rumah Sakit -->
        <div class="stat-card-item reveal" style="--i: 3">
            <div class="stat-icon-square green">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <div>
                <div class="stat-val">22+</div>
                <div class="stat-title">Rumah Sakit</div>
                <div class="stat-sub">Layanan Kesehatan</div>
            </div>
        </div>
    </div>
</div>

<!-- ═══════════════════════════════════════════════════════════════════
     DIVIDER
     ═══════════════════════════════════════════════════════════════════ -->
<div class="section-divider">
    <hr>
</div>

<!-- ═══════════════════════════════════════════════════════════════════
     3. MAP & NEARBY FACILITIES SIDE-BY-SIDE SECTION
     ═══════════════════════════════════════════════════════════════════ -->
<section class="section-wrap reveal">
    <div class="section-header-flex">
        <div>
            <div class="section-title-group">
                <div class="section-bar"></div>
                <h2 class="section-heading">Peta Lokasi Venue & Fasilitas</h2>
            </div>
            <p class="section-subtitle">Temukan lokasi venue pertandingan dan fasilitas umum terdekat di Kota Bogor</p>
        </div>
    </div>

    <div class="map-section-grid">
        <!-- LEFT: INTERACTIVE MAP -->
        <div class="map-box-card">
            <div class="map-container-wrap">
                <div id="map-canvas"></div>
            </div>

            <!-- Dynamic Selected Venue Detail Card inside Left Column -->
            <div class="home-gor-card" id="floating-gor-card">
                <div class="gor-card-header">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z" />
                    </svg>
                    <span id="card-gor-name">-</span>
                </div>
                <div class="gor-card-body">
                    <div class="addr">
                        <span id="card-gor-addr">-</span>
                    </div>
                    <div class="cabor-grid" id="card-gor-cabor-grid"></div>
                    <a href="#" id="card-gor-gmaps" target="_blank" class="map-btn">
                        <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 19H5V5h7V3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z" />
                        </svg>
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>

        <!-- RIGHT: SEARCH FILTER & NEARBY FACILITIES -->
        <div class="facilities-panel-card">
            <!-- Filter Form -->
            <form id="map-filter-form" class="filter-form-clean">
                <div class="full-width">
                    <select class="filter-select-styled" id="fasilitas">
                        <option value="">Semua Fasilitas Terdekat</option>
                        <option value="hotel">Hotel & Penginapan</option>
                        <option value="rumah-sakit">Rumah Sakit & Klinik</option>
                        <option value="apotek">Apotek</option>
                        <option value="rumah-makan">Restoran & Kuliner</option>
                    </select>
                </div>

                <div>
                    <select class="filter-select-styled" id="cabor">
                        <option value="">Filter Cabang Olahraga</option>
                        <option value="drumband">Drumband</option>
                        <option value="pencak silat">Pencak Silat</option>
                        <option value="taekwondo">Taekwondo</option>
                        <option value="judo">Judo</option>
                        <option value="kurash">Kurash</option>
                        <option value="sambo">Sambo</option>
                        <option value="tenis meja">Tenis Meja</option>
                    </select>
                </div>

                <div>
                    <select class="filter-select-styled" id="venue">
                        <option value="">Filter Nama Venue</option>
                        <option value="gor pajajaran indoor a">GOR Pajajaran Indoor A</option>
                        <option value="gor pajajaran indoor b">GOR Pajajaran Indoor B</option>
                        <option value="gor yasmin">GOR Yasmin</option>
                        <option value="stadion pajajaran">Stadion Pajajaran</option>
                        <option value="gor vokasi ipb">GOR Vokasi IPB</option>
                    </select>
                </div>

                <div class="filter-actions">
                    <button type="submit" class="btn-search-blue">Terapkan Filter</button>
                    <button type="reset" class="btn-reset-light">Reset</button>
                </div>
            </form>

            <!-- Category Tabs -->
            <div class="facility-tabs-bar">
                <button class="facility-filter-btn active" data-filter="all">Semua</button>
                <button class="facility-filter-btn" data-filter="cat-hotel">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 18h16v-2H2v2zm0-5h16V5H2v8zm2-6h12v4H4V7z" />
                    </svg>
                    Hotel
                </button>
                <button class="facility-filter-btn" data-filter="cat-rs">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-2H7v-2h2V7h2v2h2v2h-2v2z" />
                    </svg>
                    Kesehatan
                </button>
                <button class="facility-filter-btn" data-filter="cat-resto">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 2v4H2V2h2zm12 0v4h-2V2h2zM4 8h12v8a2 2 0 01-2 2H6a2 2 0 01-2-2V8z" />
                    </svg>
                    Restoran
                </button>
                <button class="facility-filter-btn" data-filter="cat-police">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2l8 3v6a8 8 0 01-8 7 8 8 0 01-8-7V5l8-3zm0 2.1L4 6.2v4.8c0 3.2 2.4 6.2 6 7 3.6-.8 6-3.8 6-7V6.2l-6-2.1zM9 8h2v5H9V8z" />
                    </svg>
                    Polisi
                </button>
                <button class="facility-filter-btn" data-filter="cat-apotek">
                    <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M12.5 3.5a4 4 0 010 5.66L8.16 13.5a4 4 0 11-5.66-5.66l4.34-4.34a4 4 0 015.66 0zM7.5 5.5L3.16 9.84a2.5 2.5 0 103.54 3.54l4.34-4.34a2.5 2.5 0 00-3.54-3.54z" />
                    </svg>
                    Apotek
                </button>
            </div>

            <!-- Scrollable Facility Results List -->
            <div class="facilities-scroll-list" id="facilities-list-wrap">
                <div class="facilities-empty" id="facilities-placeholder" style="text-align:center; padding:35px 10px; color:#94a3b8; font-size:12.5px; font-style:italic;">
                    Klik marker venue di peta untuk menampilkan daftar fasilitas terdekat secara otomatis.
                </div>

                <!-- Hotel -->
                <div class="facility-category" id="cat-hotel" style="display:none;">
                    <div id="hotel-container"></div>
                </div>

                <!-- Kesehatan -->
                <div class="facility-category" id="cat-rs" style="display:none;">
                    <div id="rs-container"></div>
                </div>

                <!-- Restoran -->
                <div class="facility-category" id="cat-resto" style="display:none;">
                    <div id="resto-container"></div>
                </div>

                <!-- Polisi -->
                <div class="facility-category" id="cat-police" style="display:none;">
                    <div id="police-container"></div>
                </div>

                <!-- Apotek -->
                <div class="facility-category" id="cat-apotek" style="display:none;">
                    <div id="apotek-container"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════════
     DIVIDER
     ═══════════════════════════════════════════════════════════════════ -->
<div class="section-divider">
    <hr>
</div>

<!-- ═══════════════════════════════════════════════════════════════════
     4. UPCOMING MATCHES SECTION (BELOW MAP)
     ═══════════════════════════════════════════════════════════════════ -->
<section class="section-wrap reveal">
    <div class="section-header-flex">
        <div>
            <div class="section-title-group">
                <div class="section-bar"></div>
                <h2 class="section-heading">Jadwal Pertandingan Mendatang</h2>
            </div>
            <p class="section-subtitle">Jadwal cabang olahraga yang akan segera berlangsung pada PORPROV XV 2026</p>
        </div>
        <a href="{{ url('/jadwal') }}" class="section-link">
            Lihat Semua Jadwal
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>

    <div class="matches-grid">
        <!-- Match Card 1: Pencak Silat -->
        <div class="match-card">
            <div>
                <div class="match-card-header">
                    <span class="match-sport-badge" style="background:#eff6ff;color:#013469;">
                        <img src="{{ asset('images/cabor/12.PENCAK SILAT.png') }}" class="cabor-icon" alt="Pencak Silat">
                        Pencak Silat
                    </span>
                    <span class="match-date-badge">2 Nov - 9 Nov 2026</span>
                </div>
                <h3 class="match-title">Babak Penyisihan & Final Pencak Silat</h3>
                <div class="match-venue-info">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    GOR Pajajaran Indoor A
                </div>
            </div>
            <div class="match-footer">
                <span class="match-status"><span class="dot"></span> Terjadwal</span>
                <a href="{{ url('/jadwal') }}" class="btn-detail-sm">
                    Detail Jadwal →
                </a>
            </div>
        </div>

        <!-- Match Card 2: Drumband -->
        <div class="match-card">
            <div>
                <div class="match-card-header">
                    <span class="match-sport-badge" style="background:#eff6ff;color:#013469;">
                        <img src="{{ asset('images/cabor/24.DRUM BAND.png') }}" class="cabor-icon" alt="Drumband">
                        Drumband
                    </span>
                    <span class="match-date-badge">7 Nov - 16 Nov 2026</span>
                </div>
                <h3 class="match-title">Kompetisi Drumband Antar Kontingen</h3>
                <div class="match-venue-info">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    GOR Pajajaran Indoor A
                </div>
            </div>
            <div class="match-footer">
                <span class="match-status"><span class="dot"></span> Terjadwal</span>
                <a href="{{ url('/jadwal') }}" class="btn-detail-sm">
                    Detail Jadwal →
                </a>
            </div>
        </div>

        <!-- Match Card 3: Panahan -->
        <div class="match-card">
            <div>
                <div class="match-card-header">
                    <span class="match-sport-badge" style="background:#eff6ff;color:#013469;">
                        <img src="{{ asset('images/cabor/5.PANAHAN.png') }}" class="cabor-icon" alt="Panahan">
                        Panahan
                    </span>
                    <span class="match-date-badge">31 Okt - 11 Nov 2026</span>
                </div>
                <h3 class="match-title">Kualifikasi & Final Panahan</h3>
                <div class="match-venue-info">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Stadion Pajajaran
                </div>
            </div>
            <div class="match-footer">
                <span class="match-status"><span class="dot"></span> Terjadwal</span>
                <a href="{{ url('/jadwal') }}" class="btn-detail-sm">
                    Detail Jadwal →
                </a>
            </div>
        </div>

        <!-- Match Card 4: Judo -->
        <div class="match-card">
            <div>
                <div class="match-card-header">
                    <span class="match-sport-badge" style="background:#eff6ff;color:#013469;">
                        <img src="{{ asset('images/cabor/25.JUDO.png') }}" class="cabor-icon" alt="Judo">
                        Judo
                    </span>
                    <span class="match-date-badge">3 Nov - 10 Nov 2026</span>
                </div>
                <h3 class="match-title">Pertandingan Judo</h3>
                <div class="match-venue-info">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    GOR Pajajaran Indoor B
                </div>
            </div>
            <div class="match-footer">
                <span class="match-status"><span class="dot"></span> Terjadwal</span>
                <a href="{{ url('/jadwal') }}" class="btn-detail-sm">
                    Detail Jadwal →
                </a>
            </div>
        </div>

        <!-- Match Card 5: Kurash -->
        <div class="match-card">
            <div>
                <div class="match-card-header">
                    <span class="match-sport-badge" style="background:#eff6ff;color:#013469;">
                        <img src="{{ asset('images/cabor/18.KURASH.png') }}" class="cabor-icon" alt="Kurash">
                        Kurash
                    </span>
                    <span class="match-date-badge">9 Nov - 14 Nov 2026</span>
                </div>
                <h3 class="match-title">Pertandingan Kurash</h3>
                <div class="match-venue-info">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    GOR Pajajaran Indoor B
                </div>
            </div>
            <div class="match-footer">
                <span class="match-status"><span class="dot"></span> Terjadwal</span>
                <a href="{{ url('/jadwal') }}" class="btn-detail-sm">
                    Detail Jadwal →
                </a>
            </div>
        </div>

        <!-- Match Card 6: Sambo -->
        <div class="match-card">
            <div>
                <div class="match-card-header">
                    <span class="match-sport-badge" style="background:#eff6ff;color:#013469;">
                        <img src="{{ asset('images/cabor/17.SAMBO.png') }}" class="cabor-icon" alt="Sambo">
                        Sambo
                    </span>
                    <span class="match-date-badge">13 Nov - 19 Nov 2026</span>
                </div>
                <h3 class="match-title">Pertandingan Sambo</h3>
                <div class="match-venue-info">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    GOR Pajajaran Indoor B
                </div>
            </div>
            <div class="match-footer">
                <span class="match-status"><span class="dot"></span> Terjadwal</span>
                <a href="{{ url('/jadwal') }}" class="btn-detail-sm">
                    Detail Jadwal →
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<!-- Leaflet JS and CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    const venueData = [{
            id: 1,
            name: "GOR Pajajaran Indoor A",
            lat: -6.583321,
            lng: 106.800532,
            address: "Gor Pajajaran, Jl. Pemuda No.02, Tanah Sareal, Kota Bogor",
            cabor: "Drumband, Pencak Silat, Taekwondo",
            gmaps_url: "https://www.google.com/maps/place/GOR+Pajajaran+Indoor/@-6.5761045,106.7944374,17z",
        },
        {
            id: 2,
            name: "GOR Pajajaran Indoor B",
            lat: -6.584100,
            lng: 106.801200,
            address: "Gor Pajajaran, Jl. Pemuda No.02, Tanah Sareal, Kota Bogor",
            cabor: "Judo, Kurash, Sambo",
            gmaps_url: "https://www.google.com/maps/place/Toko+olahraga+Ewing+Sport+bogor/@-6.5761098,106.7970123,17z",
        },
        {
            id: 3,
            name: "GOR Vokasi IPB",
            lat: -6.589165,
            lng: 106.806324,
            address: "Jl. Lodaya II, Cilibende, Babakan, Kota Bogor",
            cabor: "Shorinji Kempo, Tarung Derajat",
            gmaps_url: "https://www.google.com/maps/place/Gymnasium+Sekolah+Vokasi+IPB/@-6.5889744,106.8052783,17z",
        },
        {
            id: 4,
            name: "Stadion Pajajaran",
            lat: -6.584500,
            lng: 106.800000,
            address: "Jl. Pemuda, Tanah Sareal, Kota Bogor",
            cabor: "Modern Pentathlon, Panahan, Panjat Tebing",
            gmaps_url: "https://maps.google.com/?q=Stadion+Pajajaran+Bogor"
        },
        {
            id: 5,
            name: "GOR Yasmin",
            lat: -6.561000,
            lng: 106.774000,
            address: "Kecamatan Bogor Barat, Kota Bogor",
            cabor: "Tenis Meja",
            gmaps_url: "https://maps.google.com/?q=GOR+Yasmin+Bogor"
        }
    ];

    /* ── Data Fasilitas Hardcoded dari PDF ── */
    const pajajaranFacilities = {
        hotel: [
            { name: "Zest Hotel Bogor", address: "Jl. Pajajaran No. 27, Babakan, Kec. Bogor Tengah, Kota Bogor", distance: "1.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Zest+Hotel+Bogor+Jl.+Pajajaran+No.+27+Babakan+Bogor+Tengah" },
            { name: "The Mirah Hotel Bogor", address: "Jl. Pangrango No. 9A, Babakan, Kec. Bogor Tengah, Kota Bogor", distance: "1.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=The+Mirah+Hotel+Bogor+Jl.+Pangrango+No.+9A+Babakan+Bogor+Tengah" }
        ],
        hospital: [
            { name: "RS Salak Bogor", address: "Jl. Jend. Sudirman No. 8, Sempur, Kec. Bogor Tengah, Kota Bogor", distance: "1.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Salak+Bogor+Jl.+Jend.+Sudirman+No.+8+Sempur+Bogor+Tengah" },
            { name: "RS PMI Bogor", address: "Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur, Kota Bogor", distance: "2.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+PMI+Bogor+Jl.+Pajajaran+No.+80+Baranangsiang+Bogor+Timur" },
            { name: "Puskesmas Bogor Tengah", address: "Jl. Sawojajar No. 38, Pabaton, Kec. Bogor Tengah, Kota Bogor", distance: "1.8 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Bogor+Tengah+Jl.+Sawojajar+No.+38+Pabaton+Bogor+Tengah" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Juanda", address: "Jl. Ir. H. Juanda No. 30, Babakan, Kec. Bogor Tengah, Kota Bogor", distance: "2.0 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Juanda+Jl.+Ir.+H.+Juanda+No.+30+Babakan+Bogor+Tengah" }
        ],
        police: [
            { name: "Polresta Bogor Kota (Mako Muslihat)", address: "Jl. Kapten Muslihat No. 18, Paledang, Kec. Bogor Tengah, Kota Bogor", distance: "2.3 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polresta+Bogor+Kota+Mako+Muslihat+Jl.+Kapten+Muslihat+No.+18+Paledang+Bogor+Tengah" }
        ],
        restaurant: []
    };

    const greenForestFacilities = {
        hotel: [
            { name: "ASTON Bogor Hotel & Resort", address: "Mulyaharja, Kec. Bogor Selatan, Kota Bogor", distance: "1.8 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=ASTON+Bogor+Hotel+%26+Resort+Mulyaharja+Bogor+Selatan" },
            { name: "Padodi Hotel", address: "Jl. Soemanta Diredja No. 10, Pamoyanan, Kec. Bogor Selatan", distance: "1.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Padodi+Hotel+Jl.+Soemanta+Diredja+No.+10+Pamoyanan+Bogor+Selatan" }
        ],
        hospital: [
            { name: "RS Melania Bogor", address: "Jl. Pahlawan No. 91, Bondongan, Kec. Bogor Selatan", distance: "2.8 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Melania+Bogor+Jl.+Pahlawan+No.+91+Bondongan+Bogor+Selatan" },
            { name: "Puskesmas Cipaku", address: "Jl. Rangga Gading, Cipaku, Kec. Bogor Selatan", distance: "2.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Cipaku+Jl.+Rangga+Gading+Cipaku+Bogor+Selatan" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Pahlawan", address: "Jl. Pahlawan No. 40, Batutulis, Kec. Bogor Selatan", distance: "2.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Pahlawan+Jl.+Pahlawan+No.+40+Batutulis+Bogor+Selatan" }
        ],
        police: [
            { name: "Polsek Bogor Selatan", address: "Jl. Layung Sari No. 1, Empang, Kec. Bogor Selatan", distance: "2.6 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Bogor+Selatan+Jl.+Layung+Sari+No.+1+Empang+Bogor+Selatan" }
        ],
        restaurant: []
    };

    const brajamustikaFacilities = {
        hotel: [
            { name: "Hotel Salak The Heritage", address: "Jl. Ir. H. Juanda No. 8, Pabaton, Kec. Bogor Tengah", distance: "1.6 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Hotel+Salak+The+Heritage+Jl.+Ir.+H.+Juanda+No.+8+Pabaton+Bogor+Tengah" },
            { name: "Hotel Grand Savero Bogor", address: "Jl. Pajajaran No. 27, Babakan, Kec. Bogor Tengah", distance: "2.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Hotel+Grand+Savero+Bogor+Jl.+Pajajaran+No.+27+Babakan+Bogor+Tengah" }
        ],
        hospital: [
            { name: "RS Karya Bhakti Pratiwi", address: "Jl. DR. Sumeru No. 120, Menteng, Kec. Bogor Barat", distance: "1.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Karya+Bhakti+Pratiwi+Jl.+DR.+Sumeru+No.+120+Menteng+Bogor+Barat" },
            { name: "RSUD Kota Bogor", address: "Jl. DR. Sumeru No. 120, Menteng, Kec. Bogor Barat", distance: "1.3 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RSUD+Kota+Bogor+Jl.+DR.+Sumeru+No.+120+Menteng+Bogor+Barat" },
            { name: "Puskesmas Gang Aut / Menteng", address: "Jl. Mawar No. 8, Menteng, Kec. Bogor Barat", distance: "1.0 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Gang+Aut+Menteng+Jl.+Mawar+No.+8+Menteng+Bogor+Barat" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Sumeru", address: "Jl. DR. Sumeru No. 50, Menteng, Kec. Bogor Barat", distance: "900 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Sumeru+Jl.+DR.+Sumeru+No.+50+Menteng+Bogor+Barat" }
        ],
        police: [
            { name: "Polsek Bogor Barat", address: "Jl. Semplak Raya No. 1, Kec. Bogor Barat", distance: "2.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Bogor+Barat+Jl.+Semplak+Raya+No.+1+Bogor+Barat" }
        ],
        restaurant: []
    };

    const vokasiFacilities = {
        hotel: [
            { name: "IPB Hotel & Convention Centre", address: "Botani Square, Jl. Pajajaran, Baranangsiang", distance: "2.8 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=IPB+Hotel+%26+Convention+Centre+Botani+Square+Jl.+Pajajaran+Baranangsiang" }
        ],
        hospital: [
            { name: "RS PMI Bogor", address: "Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur", distance: "2.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+PMI+Bogor+Jl.+Pajajaran+No.+80+Baranangsiang+Bogor+Timur" },
            { name: "Puskesmas Bogor Utara", address: "Jl. Tegal Gundil, Kec. Bogor Utara", distance: "1.9 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Bogor+Utara+Jl.+Tegal+Gundil+Bogor+Utara" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Pajajaran", address: "Jl. Pajajaran No. 35, Babakan, Kec. Bogor Tengah", distance: "1.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Pajajaran+Jl.+Pajajaran+No.+35+Babakan+Bogor+Tengah" }
        ],
        police: [
            { name: "Polsek Bogor Utara", address: "Jl. Pajajaran No. 200, Cibuluh, Kec. Bogor Utara", distance: "2.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Bogor+Utara+Jl.+Pajajaran+No.+200+Cibuluh+Bogor+Utara" }
        ],
        restaurant: []
    };

    const yasminFacilities = {
        hotel: [
            { name: "WHIZ Prime Hotel Bogor Yasmin", address: "Jl. KH. R. Abdullah Bin Nuh No. 33, Curugmekar", distance: "600 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=WHIZ+Prime+Hotel+Bogor+Yasmin+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+33+Curugmekar" },
            { name: "Swiss-Belcourt Bogor", address: "Jl. KH. R. Abdullah Bin Nuh No. 27, Bukit Cimanggu City", distance: "1.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Swiss-Belcourt+Bogor+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+27+Bukit+Cimanggu+City" }
        ],
        hospital: [
            { name: "RS Hermina Bogor", address: "Jl. KH. R. Abdullah Bin Nuh No. E2, Hermina Grand Yasmin", distance: "900 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Hermina+Bogor+Jl.+KH.+R.+Abdullah+Bin+Nuh+No.+E2+Hermina+Grand+Yasmin" },
            { name: "RS Islam Bogor", address: "Jl. Perdana No. 22, Budi Agung, Tanahsareal", distance: "2.0 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Islam+Bogor+Jl.+Perdana+No.+22+Budi+Agung+Tanahsareal" },
            { name: "Puskesmas Gang Kelor", address: "Jl. Raya Curug No. 12, Curugmekar, Kec. Bogor Barat", distance: "1.4 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Gang+Kelor+Jl.+Raya+Curug+No.+12+Curugmekar+Bogor+Barat" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Yasmin", address: "Ruko Taman Yasmin Sektor VI No. 108, Curugmekar", distance: "500 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Yasmin+Ruko+Taman+Yasmin+Sektor+VI+No.+108+Curugmekar" }
        ],
        police: [
            { name: "Polsek Tanah Sareal", address: "Jl. Seremped, Kedung Badak, Kec. Tanah Sareal", distance: "2.4 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Tanah+Sareal+Jl.+Seremped+Kedung+Badak+Tanah+Sareal" }
        ],
        restaurant: []
    };

    const kemangFacilities = {
        hotel: [
            { name: "Salak Sunset Hotel", address: "Jl. Raya Kemang Parung No. 12, Kemang", distance: "2.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Salak+Sunset+Hotel+Jl.+Raya+Kemang+Parung+No.+12+Kemang" }
        ],
        hospital: [
            { name: "RS Sentosa Bogor", address: "Jl. Raya Kemang No. 18, Kemang, Kab. Bogor", distance: "1.3 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Sentosa+Bogor+Jl.+Raya+Kemang+No.+18+Kemang+Kab.+Bogor" },
            { name: "Puskesmas Kemang", address: "Jl. Raya Kemang No. 5, Kemang, Kab. Bogor", distance: "1.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Kemang+Jl.+Raya+Kemang+No.+5+Kemang+Kab.+Bogor" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Kemang", address: "Jl. Raya Parung-Bogor, Kemang, Kab. Bogor", distance: "800 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Kemang+Jl.+Raya+Parung-Bogor+Kemang+Kab.+Bogor" }
        ],
        police: [
            { name: "Polsek Kemang", address: "Jl. Raya Kemang Parung No. 10, Kemang, Kab. Bogor", distance: "1.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Kemang+Jl.+Raya+Kemang+Parung+No.+10+Kemang+Kab.+Bogor" }
        ],
        restaurant: []
    };

    const sentulFacilities = {
        hotel: [
            { name: "Lorin Sentul Hotel", address: "Kawasan Sirkuit Sentul Internasional, Babakan Madang", distance: "1.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Lorin+Sentul+Hotel+Kawasan+Sirkuit+Sentul+Internasional+Babakan+Madang" },
            { name: "Harris Hotel Sentul City", address: "Jl. Jend. Sudirman, Sentul City, Babakan Madang", distance: "2.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Harris+Hotel+Sentul+City+Jl.+Jend.+Sudirman+Sentul+City+Babakan+Madang" }
        ],
        hospital: [
            { name: "RS EMC Sentul", address: "Jl. MH. Thamrin No. 57, Sentul City, Babakan Madang", distance: "2.7 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+EMC+Sentul+Jl.+MH.+Thamrin+No.+57+Sentul+City+Babakan+Madang" },
            { name: "Puskesmas Babakan Madang", address: "Jl. Raya Sentul No. 1, Babakan Madang", distance: "2.0 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Babakan+Madang+Jl.+Raya+Sentul+No.+1+Babakan+Madang" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Sentul City", address: "Ruko Plaza Niaga 1, Sentul City", distance: "2.3 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Sentul+City+Ruko+Plaza+Niaga+1+Sentul+City" }
        ],
        police: [
            { name: "Polsek Babakan Madang", address: "Jl. Raya Babakan Madang No. 8, Kab. Bogor", distance: "2.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Babakan+Madang+Jl.+Raya+Babakan+Madang+No.+8+Kab.+Bogor" }
        ],
        restaurant: []
    };

    const gunungMasFacilities = {
        hotel: [
            { name: "Bobocabin Gunung Mas", address: "Gunung Mas, Jl. Raya Puncak Gadog No. KM 87, Cisarua", distance: "300 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Bobocabin+Gunung+Mas+Jl.+Raya+Puncak+Gadog+KM+87+Cisarua" },
            { name: "Grand Diara Hotel Puncak", address: "Jl. Raya Puncak - Gadog KM 77, Cisarua", distance: "2.9 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Grand+Diara+Hotel+Puncak+Jl.+Raya+Puncak+Gadog+KM+77+Cisarua" }
        ],
        hospital: [
            { name: "RSPG Cisarua (RS Paru Dr. M. Goenawan)", address: "Jl. Raya Puncak No. KM 83, Cisarua, Kab. Bogor", distance: "1.8 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RSPG+Cisarua+RS+Paru+Dr.+M.+Goenawan+Jl.+Raya+Puncak+KM+83+Cisarua+Kab.+Bogor" },
            { name: "Puskesmas Cisarua", address: "Jl. Raya Puncak No. KM 81, Cisarua, Kab. Bogor", distance: "2.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Cisarua+Jl.+Raya+Puncak+KM+81+Cisarua+Kab.+Bogor" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Cisarua", address: "Jl. Raya Puncak No. 412, Cisarua, Kab. Bogor", distance: "1.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Cisarua+Jl.+Raya+Puncak+No.+412+Cisarua+Kab.+Bogor" }
        ],
        police: [
            { name: "Polsek Cisarua", address: "Jl. Raya Puncak KM 82, Cisarua, Kab. Bogor", distance: "2.3 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Cisarua+Jl.+Raya+Puncak+KM+82+Cisarua+Kab.+Bogor" }
        ],
        restaurant: []
    };

    const cisangkanFacilities = {
        hotel: [
            { name: "Hotel Trikarya Cimahi", address: "Jl. Raya Cisangkan No. 88, Padasuka, Cimahi Tengah", distance: "800 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Hotel+Trikarya+Cimahi+Jl.+Raya+Cisangkan+No.+88+Padasuka+Cimahi+Tengah" }
        ],
        hospital: [
            { name: "RS Dustira Cimahi", address: "Jl. Dr. Dustira No. 1, Baros, Cimahi Tengah", distance: "2.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Dustira+Cimahi+Jl.+Dr.+Dustira+No.+1+Baros+Cimahi+Tengah" },
            { name: "Puskesmas Cimahi Tengah", address: "Jl. Raden Demang Hardjakusumah No. 1, Cimahi", distance: "1.6 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Cimahi+Tengah+Jl.+Raden+Demang+Hardjakusumah+No.+1+Cimahi" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Cisangkan", address: "Jl. Raya Cisangkan No. 12, Padasuka, Cimahi Tengah", distance: "400 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Cisangkan+Jl.+Raya+Cisangkan+No.+12+Padasuka+Cimahi+Tengah" }
        ],
        police: [
            { name: "Polres Cimahi", address: "Jl. Raya Cibeureum No. 1, Cimahi Selatan", distance: "2.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polres+Cimahi+Jl.+Raya+Cibeureum+No.+1+Cimahi+Selatan" }
        ],
        restaurant: []
    };

    const arcamanikFacilities = {
        hotel: [
            { name: "Grand Cordela Hotel Bandung", address: "Jl. Soekarno-Hatta No. 791, Cisaranten Endah, Arcamanik", distance: "2.4 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Grand+Cordela+Hotel+Bandung+Jl.+Soekarno-Hatta+No.+791+Cisaranten+Endah+Arcamanik" }
        ],
        hospital: [
            { name: "RS Hermina Arcamanik", address: "Jl. A.H. Nasution No. 50, Antapani, Bandung", distance: "1.7 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Hermina+Arcamanik+Jl.+A.H.+Nasution+No.+50+Antapani+Bandung" },
            { name: "Puskesmas Arcamanik", address: "Jl. Cisaranten Kulon No. 4, Arcamanik, Bandung", distance: "1.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Arcamanik+Jl.+Cisaranten+Kulon+No.+4+Arcamanik+Bandung" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Arcamanik", address: "Jl. Arcamanik Endah No. 42, Sukamiskin, Arcamanik", distance: "600 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Arcamanik+Jl.+Arcamanik+Endah+No.+42+Sukamiskin+Arcamanik" }
        ],
        police: [
            { name: "Polsek Arcamanik", address: "Jl. Pacuan Kuda No. 54, Sukamiskin, Arcamanik", distance: "800 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Arcamanik+Jl.+Pacuan+Kuda+No.+54+Sukamiskin+Arcamanik" }
        ],
        restaurant: []
    };

    const kotaBaruFacilities = {
        hotel: [
            { name: "Mason Pine Hotel", address: "Jl. Raya Kotabaru Parahyangan, Cipeundeuy, Padalarang", distance: "500 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Mason+Pine+Hotel+Jl.+Raya+Kotabaru+Parahyangan+Cipeundeuy+Padalarang" }
        ],
        hospital: [
            { name: "RS Cahya Kawaluyan", address: "Jl. Raya Parahyangan KM 1.5, Padalarang, Bandung Barat", distance: "1.2 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RS+Cahya+Kawaluyan+Jl.+Raya+Parahyangan+KM+1.5+Padalarang+Bandung+Barat" },
            { name: "Puskesmas Padalarang", address: "Jl. Raya Padalarang No. 470, Bandung Barat", distance: "2.8 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Padalarang+Jl.+Raya+Padalarang+No.+470+Bandung+Barat" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma KBP", address: "Ruko Bumi Simpang, Kota Baru Parahyangan", distance: "800 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+KBP+Ruko+Bumi+Simpang+Kota+Baru+Parahyangan" }
        ],
        police: [
            { name: "Polsek Padalarang", address: "Jl. Raya Padalarang No. 501, Bandung Barat", distance: "2.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polsek+Padalarang+Jl.+Raya+Padalarang+No.+501+Bandung+Barat" }
        ],
        restaurant: []
    };

    const majalengkaFacilities = {
        hotel: [
            { name: "Fitra Hotel Majalengka", address: "Jl. KH. Abdul Halim No. 88, Majalengka Kulon", distance: "1.1 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Fitra+Hotel+Majalengka+Jl.+KH.+Abdul+Halim+No.+88+Majalengka+Kulon" }
        ],
        hospital: [
            { name: "RSUD Majalengka", address: "Jl. Kesehatan No. 77, Majalengka Wetan", distance: "1.5 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=RSUD+Majalengka+Jl.+Kesehatan+No.+77+Majalengka+Wetan" },
            { name: "Puskesmas Majalengka", address: "Jl. KH. Abdul Halim No. 200, Majalengka", distance: "1.3 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Puskesmas+Majalengka+Jl.+KH.+Abdul+Halim+No.+200+Majalengka" }
        ],
        pharmacy: [
            { name: "Apotek Kimia Farma Majalengka", address: "Jl. KH. Abdul Halim No. 120, Majalengka", distance: "900 m", mapUrl: "https://www.google.com/maps/search/?api=1&query=Apotek+Kimia+Farma+Majalengka+Jl.+KH.+Abdul+Halim+No.+120+Majalengka" }
        ],
        police: [
            { name: "Polres Majalengka", address: "Jl. KH. Abdul Halim No. 512, Majalengka", distance: "2.0 km", mapUrl: "https://www.google.com/maps/search/?api=1&query=Polres+Majalengka+Jl.+KH.+Abdul+Halim+No.+512+Majalengka" }
        ],
        restaurant: []
    };

    const facilitiesData = {
        "GOR Pajajaran Indoor A": pajajaranFacilities,
        "GOR Pajajaran Indoor B": pajajaranFacilities,
        "Stadion Pajajaran": pajajaranFacilities,
        "Green Forest Hotel": greenForestFacilities,
        "Brajamustika Hotel": brajamustikaFacilities,
        "GOR Vokasi IPB": vokasiFacilities,
        "GOR Yasmin": yasminFacilities,
        "PPSDMAP Kemenhub Kemang": kemangFacilities,
        "Padepokan Voli Sentul": sentulFacilities,
        "Gunung Mas": gunungMasFacilities,
        "Cisangkan": cisangkanFacilities,
        "Arcamanik": arcamanikFacilities,
        "Kota Baru Parahyangan": kotaBaruFacilities,
        "Majalengka": majalengkaFacilities,
    };

    let map;
    let markers = [];
    let currentVenue = null;

    function renderFacilityCategory(venue, type, containerId, title, categoryId) {
        const container = document.getElementById(containerId);
        const categoryBlock = document.getElementById(categoryId);
        if (!container || !categoryBlock) return;

        categoryBlock.style.display = 'block';

        const typeMap = { lodging: 'hotel', hospital: 'hospital', restaurant: 'restaurant', police: 'police', pharmacy: 'pharmacy' };
        const venueFacilities = facilitiesData[venue.name];

        if (!venueFacilities) {
            container.innerHTML = `<p style="color:#94a3b8; font-style:italic; font-size:12px; padding: 8px 0;">Tidak ada data ${title} untuk venue ini.</p>`;
            return;
        }

        const items = venueFacilities[typeMap[type]];
        if (!items || items.length === 0) {
            container.innerHTML = `<p style="color:#94a3b8; font-style:italic; font-size:12px; padding: 8px 0;">Tidak ada ${title} terdekat ditemukan.</p>`;
            return;
        }

        container.innerHTML = '';
        items.forEach(item => {
            let iconBg, iconColor;
            if (type === 'lodging') { iconBg = '#fef3c7'; iconColor = '#d97706'; }
            else if (type === 'hospital') { iconBg = '#fee2e2'; iconColor = '#dc2626'; }
            else if (type === 'restaurant') { iconBg = '#dcfce7'; iconColor = '#16a34a'; }
            else if (type === 'police') { iconBg = '#e0e7ff'; iconColor = '#4f46e5'; }
            else if (type === 'pharmacy') { iconBg = '#f3e8ff'; iconColor = '#9333ea'; }
            else { iconBg = '#dbeafe'; iconColor = '#2563eb'; }

            container.innerHTML += `
                <div class="facility-list-item">
                    <div class="fli-icon" style="background:${iconBg}; color:${iconColor};">
                        <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/>
                        </svg>
                    </div>
                    <div class="fli-info">
                        <p class="fli-name">${item.name}</p>
                        <p class="fli-addr">${item.address} (${item.distance})</p>
                    </div>
                    <a href="${item.mapUrl}" target="_blank" class="fli-route">Rute</a>
                </div>
            `;
        });
    }

    function initMap() {
        const bogorCenter = [-6.587, 106.803];
        const mapElement = document.getElementById("map-canvas");
        if (!mapElement) return;

        map = L.map('map-canvas').setView(bogorCenter, 14);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        renderVenues(venueData);
        setupFilter();
        setupFacilityFilters();
    }

    function createSportIcon(sportName) {
        const iconFile = caborIcons[sportName] || '';
        const imgHtml = iconFile
            ? `<img src="/images/cabor/${iconFile}" class="sport-marker-inner" alt="">`
            : `<svg width="18" height="18" fill="#013469" viewBox="0 0 20 20"><circle cx="10" cy="10" r="8"/></svg>`;
        return L.divIcon({
            html: `<div class="sport-marker">${imgHtml}</div>`,
            className: '',
            iconSize: [44, 44],
            iconAnchor: [22, 22],
            popupAnchor: [0, -22]
        });
    }

    function renderVenues(venuesData, sportIconName) {
        venuesData.forEach(venue => {
            let icon;
            if (sportIconName) {
                icon = createSportIcon(sportIconName);
            } else {
                icon = new L.Icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                });
            }
            const marker = L.marker([venue.lat, venue.lng], {
                icon: icon
            }).addTo(map);
            marker.bindTooltip(venue.name);
            marker.on("click", () => {
                showVenueDetails(venue);
                const vs = document.getElementById('venue');
                const v = venue.name.toLowerCase();
                if (Array.from(vs.options).some(o => o.value === v)) vs.value = v;
            });
            markers.push(marker);
        });
    }

    function clearMarkers() {
        markers.forEach(m => map.removeLayer(m));
        markers = [];
    }

    function setupFilter() {
        const filterForm = document.getElementById('map-filter-form');
        filterForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const caborVal = document.getElementById('cabor').value.toLowerCase();
            const venueVal = document.getElementById('venue').value.toLowerCase();

            clearMarkers();
            document.getElementById('floating-gor-card').style.display = 'none';

            const bounds = L.latLngBounds();
            const filteredVenues = venueData.filter(v => {
                let matchCabor = caborVal ? v.cabor.toLowerCase().includes(caborVal) : true;
                let matchVenue = venueVal ? v.name.toLowerCase().includes(venueVal) : true;
                return matchCabor && matchVenue;
            });

            let sportIconName = null;
            if (caborVal) {
                const matched = Object.keys(caborIcons).find(k => k.toLowerCase().includes(caborVal));
                if (matched) sportIconName = matched;
            }

            if (filteredVenues.length > 0) {
                renderVenues(filteredVenues, sportIconName);
                filteredVenues.forEach(v => bounds.extend([v.lat, v.lng]));
                map.fitBounds(bounds, {
                    padding: [40, 40]
                });
                showVenueDetails(filteredVenues[0]);
            } else {
                alert('Venue tidak ditemukan dengan kriteria tersebut.');
                renderVenues(venueData);
                map.setView([-6.587, 106.803], 14);
            }
        });

        filterForm.addEventListener('reset', function() {
            setTimeout(() => {
                clearMarkers();
                renderVenues(venueData);
                map.setView([-6.587, 106.803], 14);
                document.getElementById('floating-gor-card').style.display = 'none';
                const placeholder = document.getElementById('facilities-placeholder');
                if (placeholder) placeholder.style.display = 'block';
                document.querySelectorAll('.facility-category').forEach(cat => cat.style.display = 'none');
            }, 100);
        });
    }

    const caborIcons = {
        "Drumband": "24.DRUM BAND.png",
        "Pencak Silat": "12.PENCAK SILAT.png",
        "Taekwondo": "9.TAEKWONDO.png",
        "Judo": "25.JUDO.png",
        "Kurash": "18.KURASH.png",
        "Sambo": "17.SAMBO.png",
        "Shorinji Kempo": "15.KEMPO.png",
        "Tarung Derajat": "19.TARUNG DERAJAT.png",
        "Modern Pentathlon": "26.MODERN PENTATHLON.png",
        "Panahan": "5.PANAHAN.png",
        "Panjat Tebing": "23.PANJAT TEBING.png",
        "Tenis Meja": "8.TENIS MEJA.png",
        "Anggar": "2.ANGGAR.png",
        "Angkat Berat": "20.ANGKAT BERAT.png",
        "Angkat Besi": "10.ANGKAT BESI.png",
        "Arung Jeram": "13.ARUNG JERAM.png",
        "Binaraga": "6.BINARAGA.png",
        "Bola Tangan Indoor": "11.BOLA TANGAN.png",
        "Bola Tangan Pasir": "11.BOLA TANGAN.png",
        "Dansa": "27.DANSA.png",
        "Gimnastik Aerobik": "21.SENAM.png",
        "Gimnastik Artistik": "21.SENAM.png",
        "Gimnastik Ritmik": "21.SENAM.png",
        "Menembak": "7.MENEMBAK.png",
        "Petanque": "16.PENTAQUE.png",
        "Ski Air": "22.SKI AIR.png",
    };

    function showVenueDetails(venue) {
        currentVenue = venue;
        const floatingCard = document.getElementById('floating-gor-card');
        floatingCard.style.display = 'block';

        document.getElementById('card-gor-name').innerText = venue.name;
        document.getElementById('card-gor-addr').innerText = venue.address;
        document.getElementById('card-gor-gmaps').href = venue.gmaps_url;

        const placeholder = document.getElementById('facilities-placeholder');
        if (placeholder) placeholder.style.display = 'none';

        const caborArr = venue.cabor.split(',').map(c => c.trim());
        const caborContainer = document.getElementById('card-gor-cabor-grid');
        caborContainer.innerHTML = '';
        caborArr.forEach(c => {
            const iconFile = caborIcons[c] || '';
            const iconHtml = iconFile ? `<img src="/images/cabor/${iconFile}" class="cabor-tag-icon" alt=""> ` : '';
            caborContainer.innerHTML += `<span class="cabor-tag">${iconHtml}${c}</span>`;
        });

        if (map) {
            renderFacilityCategory(venue, 'lodging', 'hotel-container', 'Hotel', 'cat-hotel');
            renderFacilityCategory(venue, 'hospital', 'rs-container', 'Fasilitas Kesehatan', 'cat-rs');
            renderFacilityCategory(venue, 'restaurant', 'resto-container', 'Restoran', 'cat-resto');
            renderFacilityCategory(venue, 'police', 'police-container', 'Kantor Polisi', 'cat-police');
            renderFacilityCategory(venue, 'pharmacy', 'apotek-container', 'Apotek', 'cat-apotek');
        }
    }

    function setupFacilityFilters() {
        const categoryMap = {
            'cat-hotel': {
                type: 'lodging',
                containerId: 'hotel-container',
                title: 'Hotel',
                catId: 'cat-hotel'
            },
            'cat-rs': {
                type: 'hospital',
                containerId: 'rs-container',
                title: 'Fasilitas Kesehatan',
                catId: 'cat-rs'
            },
            'cat-resto': {
                type: 'restaurant',
                containerId: 'resto-container',
                title: 'Restoran',
                catId: 'cat-resto'
            },
            'cat-police': {
                type: 'police',
                containerId: 'police-container',
                title: 'Kantor Polisi',
                catId: 'cat-police'
            },
            'cat-apotek': {
                type: 'pharmacy',
                containerId: 'apotek-container',
                title: 'Apotek',
                catId: 'cat-apotek'
            },
        };

        document.querySelectorAll('.facility-filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.facility-filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                const filter = this.dataset.filter;
                document.querySelectorAll('.facility-category').forEach(cat => cat.style.display = 'none');

                if (filter === 'all') {
                    if (currentVenue) {
                        Object.values(categoryMap).forEach(c => renderFacilityCategory(currentVenue, c.type, c.containerId, c.title, c.catId));
                    }
                } else if (categoryMap[filter] && currentVenue) {
                    const c = categoryMap[filter];
                    renderFacilityCategory(currentVenue, c.type, c.containerId, c.title, c.catId);
                }
            });
        });
    }

    // ── Hero Slideshow Auto-Slide ──
    (function initHeroSlideshow() {
        const slides = document.querySelectorAll('.hero-slide');
        if (slides.length < 2) return;
        let current = 0;
        setInterval(function() {
            slides[current].classList.remove('active');
            current = (current + 1) % slides.length;
            slides[current].classList.add('active');
        }, 5000);
    })();

    window.onload = function() {
        initMap();
    };

    // ── Scroll Reveal Animation ──
    (function initReveal() {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -40px 0px'
        });

        document.querySelectorAll('.reveal').forEach(function(el) {
            observer.observe(el);
        });
    })();
</script>
@endpush