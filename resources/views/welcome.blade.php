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
        padding: 55px 20px 100px;
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
        color: #e2e8f0;
        font-style: italic;
        margin-bottom: 18px;
        letter-spacing: 0.2px;
    }

    .hero-desc {
        color: #cbd5e1;
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

    /* Hero Right Side Mascot & Talk Bubble */
    .hero-media {
        position: relative;
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }

    .mascot-wrapper {
        position: relative;
        display: inline-block;
    }

    .mascot-img {
        height: 340px;
        width: auto;
        object-fit: contain;
        filter: drop-shadow(0 12px 24px rgba(0, 0, 0, 0.35));
    }

    .speech-bubble {
        position: absolute;
        top: -15px;
        left: -85px;
        background: #ffffff;
        color: #013469;
        font-weight: 800;
        font-size: 13px;
        padding: 11px 20px;
        border-radius: 22px;
        border-bottom-right-radius: 2px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
        line-height: 1.35;
        text-align: center;
        animation: floatBubble 3.5s ease-in-out infinite;
        z-index: 5;
    }

    .speech-bubble::after {
        content: '';
        position: absolute;
        bottom: -8px;
        right: 12px;
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 2px solid transparent;
        border-top: 10px solid #ffffff;
    }

    @media (max-width: 768px) {
        .speech-bubble {
            position: absolute;
            top: -35px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 11px;
            padding: 8px 14px;
            white-space: nowrap;
            border-bottom-right-radius: 22px;
        }

        .speech-bubble::after {
            right: 50%;
            transform: translateX(50%);
        }
    }

    @keyframes floatBubble {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-7px);
        }
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

        .hero-media {
            margin-top: 20px;
        }

        .mascot-img {
            height: 220px;
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
            padding: 36px 16px 75px;
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
     1. HERO SECTION WITH RESTORED BACKGROUND IMAGE
     ═══════════════════════════════════════════════════════════════════ -->
<section class="hero-wrapper">
    <!-- Restored Hero Background Image Overlay from original layout -->
    <img src="{{ asset('images/hero-bg.png') }}" class="hero-bg-img-overlay" alt="PORPROV XV Kota Bogor Background">

    <!-- Floating Particles -->
    <div class="hero-particles">
        <span></span><span></span><span></span><span></span>
        <span></span><span></span><span></span><span></span>
    </div>

    <!-- Decorative Wave SVG -->
    <svg class="hero-bg-wave-svg" viewBox="0 0 1440 320" fill="none">
        <path d="M0,192L48,176C96,160,192,128,288,138.7C384,149,480,203,576,208C672,213,768,171,864,165.3C960,160,1056,192,1152,197.3C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z" fill="url(#gradWave)"></path>
        <defs>
            <linearGradient id="gradWave" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#ffffff" stop-opacity="0.25" />
                <stop offset="100%" stop-color="#ffffff" stop-opacity="0" />
            </linearGradient>
        </defs>
    </svg>

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

        <!-- Hero Mascot & Speech Bubble -->
        <div class="hero-media">
            <div class="mascot-wrapper">
                <div class="speech-bubble">
                    Bogor Siap Jadi Tuan Rumah Terbaik!
                </div>
                <img class="mascot-img" src="{{ asset('images/maskot.png') }}" alt="Maskot PORPROV XV Kota Bogor">
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

    let map;
    let markers = [];
    let fasilitasMarkers = [];
    let currentVenue = null;

    function fetchPlaces(venue, type, containerId, title, categoryId) {
        const latLng = [Number(venue.lat), Number(venue.lng)];
        const container = document.getElementById(containerId);
        const categoryBlock = document.getElementById(categoryId);
        if (!container || !categoryBlock) return;

        categoryBlock.style.display = 'block';
        container.innerHTML = '<p style="color:#94a3b8; font-style:italic; font-size:12px; padding: 8px 0;">Sedang memuat data terdekat...</p>';

        const venueName = venue.name.toLowerCase();
        const isPajajaran = venueName.includes("pajajaran");
        const isYasmin = venueName.includes("yasmin");

        let customData = null;
        if (isPajajaran) {
            if (type === 'hospital') {
                customData = [{
                    name: "Puskesmas Bogor Selatan",
                    address: "Bogor Selatan",
                    mapUrl: "https://maps.google.com/?q=Puskesmas+Bogor+Selatan+Bogor"
                }];
            } else if (type === 'lodging') {
                customData = [{
                    name: "AMAROOSSA ROYAL BOGOR HOTEL",
                    address: "Bogor Tengah",
                    mapUrl: "https://www.google.com/maps/search/?api=1&query=Amaroossa+Royal+Bogor"
                }];
            } else if (type === 'restaurant') {
                customData = [{
                    name: "HARTZ CHICKEN BUFFET",
                    address: "Kota Bogor",
                    mapUrl: "https://www.google.com/maps/search/?api=1&query=Hartz+Chicken+Buffet+Bogor"
                }];
            }
        } else if (isYasmin) {
            if (type === 'hospital') {
                customData = [{
                    name: "RSU Islam Bogor",
                    address: "Kota Bogor",
                    mapUrl: "https://www.google.com/maps/search/?api=1&query=RSU+Islam+Bogor"
                }];
            } else if (type === 'lodging') {
                customData = [{
                    name: "SAHIRA BUTIK HOTEL, PT",
                    address: "Kota Bogor",
                    mapUrl: "https://www.google.com/maps/search/?api=1&query=Sahira+Butik+Hotel+Bogor"
                }];
            }
        }

        const renderResults = (placesList) => {
            container.innerHTML = '';
            placesList.forEach(place => {
                const lat = place.lat || (place.center && place.center.lat) || latLng[0];
                const lon = place.lon || (place.center && place.center.lon) || latLng[1];
                const name = place.name || (place.tags && place.tags.name ? place.tags.name : title + ' Terdekat');
                const address = place.address || (place.tags && place.tags['addr:street'] ? place.tags['addr:street'] : 'Sekitar lokasi');

                let iconBg = '#dbeafe',
                    iconColor = '#2563eb';
                if (type === 'lodging') {
                    iconBg = '#fef3c7';
                    iconColor = '#d97706';
                } else if (type === 'hospital') {
                    iconBg = '#fee2e2';
                    iconColor = '#dc2626';
                } else if (type === 'restaurant') {
                    iconBg = '#dcfce7';
                    iconColor = '#16a34a';
                } else if (type === 'police') {
                    iconBg = '#e0e7ff';
                    iconColor = '#4f46e5';
                } else if (type === 'pharmacy') {
                    iconBg = '#f3e8ff';
                    iconColor = '#9333ea';
                }

                const mapUrl = place.mapUrl || `https://www.openstreetmap.org/directions?engine=fossgis_osrm_car&route=${latLng[0]}%2C${latLng[1]}%3B${lat}%2C${lon}`;

                container.innerHTML += `
                    <div class="facility-list-item">
                        <div class="fli-icon" style="background:${iconBg}; color:${iconColor};">
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/></svg>
                        </div>
                        <div class="fli-info">
                            <p class="fli-name">${name}</p>
                            <p class="fli-addr">${address}</p>
                        </div>
                        <a href="${mapUrl}" target="_blank" class="fli-route">Rute</a>
                    </div>
                `;
            });
        };

        if (customData) {
            renderResults(customData);
            return;
        }

        let overpassTag = '["tourism"~"hotel|guest_house"]';
        if (type === 'hospital') overpassTag = '["amenity"="hospital"]';
        else if (type === 'pharmacy') overpassTag = '["amenity"="pharmacy"]';
        else if (type === 'restaurant') overpassTag = '["amenity"~"restaurant|cafe"]';
        else if (type === 'police') overpassTag = '["amenity"="police"]';

        const query = `[out:json];(node${overpassTag}(around:3000, ${latLng[0]}, ${latLng[1]});way${overpassTag}(around:3000, ${latLng[0]}, ${latLng[1]}););out center 4;`;

        fetch('https://overpass-api.de/api/interpreter', {
                method: 'POST',
                body: query
            })
            .then(res => res.json())
            .then(data => {
                if (data.elements && data.elements.length > 0) {
                    renderResults(data.elements.slice(0, 4));
                } else {
                    container.innerHTML = `<p style="color:#94a3b8; font-style:italic; font-size:12px; padding: 8px 0;">Tidak ada ${title} terdekat ditemukan.</p>`;
                }
            })
            .catch(err => {
                container.innerHTML = `<p style="color:#94a3b8; font-style:italic; font-size:12px; padding: 8px 0;">Gagal memuat data.</p>`;
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
            });
            markers.push(marker);
        });
    }

    function clearMarkers() {
        markers.forEach(m => map.removeLayer(m));
        markers = [];
        fasilitasMarkers.forEach(m => map.removeLayer(m));
        fasilitasMarkers = [];
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
            fetchPlaces(venue, 'lodging', 'hotel-container', 'Hotel', 'cat-hotel');
            fetchPlaces(venue, 'hospital', 'rs-container', 'Fasilitas Kesehatan', 'cat-rs');
            fetchPlaces(venue, 'restaurant', 'resto-container', 'Restoran', 'cat-resto');
            fetchPlaces(venue, 'police', 'police-container', 'Kantor Polisi', 'cat-police');
            fetchPlaces(venue, 'pharmacy', 'apotek-container', 'Apotek', 'cat-apotek');
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
                        Object.values(categoryMap).forEach(c => fetchPlaces(currentVenue, c.type, c.containerId, c.title, c.catId));
                    }
                } else if (categoryMap[filter] && currentVenue) {
                    const c = categoryMap[filter];
                    fetchPlaces(currentVenue, c.type, c.containerId, c.title, c.catId);
                }
            });
        });
    }

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