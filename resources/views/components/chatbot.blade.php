{{-- Floating Toggle Button --}}
<button id="chat-toggle" aria-label="Buka Chatbot RAJA PORPROV" title="RAJA PORPROV Assistant">
    <svg id="chat-icon-open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.86 9.86 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
    </svg>
    <svg id="chat-icon-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="display:none">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
    <span class="chat-toggle-badge" id="chat-badge" style="display:none">1</span>
</button>

{{-- Chat Window --}}
<div id="chat-window" role="dialog" aria-label="RAJA PORPROV Chatbot" aria-modal="true">

    {{-- Header --}}
    <div id="chat-header">
        <div class="chat-header-left">
            <div class="chat-header-avatar">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2a5 5 0 100 10A5 5 0 0012 2zm0 12c-5.33 0-8 2.67-8 4v2h16v-2c0-1.33-2.67-4-8-4z" />
                </svg>
                <span class="chat-header-status"></span>
            </div>
            <div class="chat-header-info">
                <div class="chat-header-name">RAJA PORPROV</div>
                <div class="chat-header-sub">
                    <span class="status-dot"></span> Online · PORPROV Jabar XV 2026
                </div>
            </div>
        </div>
        <div class="chat-header-actions">
            <button id="chat-clear-btn" title="Hapus Percakapan" aria-label="Hapus percakapan">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
            <button id="chat-close-btn" title="Tutup" aria-label="Tutup chatbot">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Messages Body --}}
    <div id="chat-body" role="log" aria-live="polite" aria-label="Riwayat percakapan"></div>

    {{-- Suggested Questions --}}
    <div id="chat-suggestions">
        <button class="suggestion-chip" data-msg="Cabang olahraga apa saja?">🏅 Daftar Cabor</button>
        <button class="suggestion-chip" data-msg="Dimana venue pencak silat?">📍 Lokasi Venue</button>
        <button class="suggestion-chip" data-msg="Hotel dekat venue judo?">🏨 Hotel Terdekat</button>
        <button class="suggestion-chip" data-msg="Google Maps venue tenis meja">🗺️ Google Maps</button>
    </div>

    {{-- Footer / Input --}}
    <div id="chat-footer">
        <div id="chat-input-wrapper">
            <textarea
                id="chat-input"
                placeholder="Tanyakan sesuatu tentang PORPROV"
                rows="1"
                aria-label="Ketik pesan"
                autocomplete="off"></textarea>
            <button id="send-btn" aria-label="Kirim pesan" title="Kirim (Enter)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
                </svg>
            </button>
        </div>
        <div id="chat-footer-note">Powered by RAJA PORPROV · Data PORPROV Jabar XV 2026</div>
    </div>

</div>