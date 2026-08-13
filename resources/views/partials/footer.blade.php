<footer class="site-footer">
    <div class="footer-main">
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Kolom 1: Branding -->
                <div class="footer-col footer-brand">
                    <h4 class="footer-title">Tentang PORPROV</h4>
                    <a href="{{ url('/') }}" class="footer-logo">
                        <img src="{{ asset('images/logo_baru.PNG') }}" alt="Logo PORPROV XV">
                    </a>
                    <p class="footer-desc">
                        <strong>PORPROV XV</strong> Kota Bogor 2026 adalah ajang sport festival terbesar tingkat provinsi — tempat atlet dari seluruh kota/kabupaten di Jawa Barat.
                    </p>
                </div>

                <!-- Kolom 2: Penyelenggara -->
                <div class="footer-col footer-organizers">
                    <h4 class="footer-title footer-title-center">Diselenggarakan Oleh</h4>
                    <div class="organizers-group">
                        <!-- Baris Logo Kota -->
                        <div class="organizer-row organizer-coas">
                            <div class="organizer-item">
                                <img src="{{ asset('images/footer/kota_bekasi.png') }}" alt="Kota Bekasi" class="org-coa">
                            </div>
                            <div class="organizer-item">
                                <img src="{{ asset('images/footer/kota_depok.png') }}" alt="Kota Depok" class="org-coa">
                            </div>
                            <div class="organizer-item">
                                <img src="{{ asset('images/footer/kota_bogor.png') }}" alt="Kota Bogor" class="org-coa">
                            </div>
                        </div>
                        <!-- Baris Maskot -->
                        <div class="organizer-row organizer-mascots">
                            <div class="organizer-item">
                                <img src="{{ asset('images/footer/maskot_bekasi.png') }}" alt="Maskot Bekasi" class="org-mascot">
                            </div>
                            <div class="organizer-item">
                                <img src="{{ asset('images/footer/maskot_depok.png') }}" alt="Maskot Depok" class="org-mascot">
                            </div>
                            <div class="organizer-item">
                                <img src="{{ asset('images/footer/anggar.png') }}" alt="Maskot Bogor" class="org-mascot">
                            </div>
                        </div>
                    </div>
                </div>

<<<<<<< HEAD
                <!-- Kolom 3: Navigasi Cepat -->
                <div class="footer-col footer-links-col">
                    <h4 class="footer-title">Navigasi Cepat</h4>
                    <a href="{{ url('/') }}">Beranda</a>
                    <a href="{{ url('/peta-venue') }}">Peta Venue</a>
                    <a href="{{ url('/fasilitas') }}">Fasilitas</a>
                    <a href="{{ url('/klasemen-medali') }}">Klasemen Medali</a>
                </div>

                <!-- Kolom 4: Informasi -->
                <div class="footer-col footer-links-col">
                    <h4 class="footer-title">Informasi</h4>
                    <a href="{{ url('/jadwal') }}">Jadwal</a>
                    <a href="{{ url('/galeri') }}">Galeri</a>
                    <a href="{{ url('/kebijakan-privasi') }}">Kebijakan Privasi</a>
                </div>

                <!-- Kolom 5: Visit Counter (gaya subang.go.id) -->
                <div class="footer-col footer-counter-col">
                    <h4 class="footer-title">Statistik</h4>
                    <div class="visit-counter-stats">
                        <div class="stat-row">
                            <span class="stat-icon">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                            </span>
                            <span class="stat-label">Pengguna Online</span>
                            <span class="stat-value">{{ number_format($onlineUsers ?? 1, 0, ',', '.') }}</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-icon">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
                            </span>
                            <span class="stat-label">Pengunjung Hari Ini</span>
                            <span class="stat-value">{{ number_format($todayVisitors ?? 0, 0, ',', '.') }}</span>
                        </div>
                        <div class="stat-row">
                            <span class="stat-icon">
                                <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                            </span>
                            <span class="stat-label">Total Pengunjung</span>
                            <span class="stat-value">{{ number_format($visitCount ?? 1245, 0, ',', '.') }}</span>
                        </div>
=======
                <!-- Kolom 3: Navigasi -->
                <div class="footer-links">
                    <div class="footer-links-col">
                        <h4 class="footer-title">Navigasi Cepat</h4>
                        <a href="{{ url('/') }}">Beranda</a>
                        <a href="{{ url('/peta-venue') }}">Peta Venue</a>
                        <a href="{{ url('/fasilitas') }}">Fasilitas</a>
                    </div>
                    <div class="footer-links-col">
                        <h4 class="footer-title">Informasi</h4>
                        <a href="{{ url('/jadwal') }}">Jadwal</a>
                        <a href="{{ url('/galeri') }}">Galeri</a>
                        <a href="{{ url('/kebijakan-privasi') }}">Kebijakan Privasi</a>
>>>>>>> b2de0e2ae6c581c8dd6cceb735b63d46eb234926
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Bar -->
    <div class="footer-bottom">
        <img src="{{ asset('images/footer/ribbon-sm.png') }}" alt="" aria-hidden="true" class="ribbon ribbon-left">
        <img src="{{ asset('images/footer/ribbon-sm.png') }}" alt="" aria-hidden="true" class="ribbon ribbon-right">
        <p>&copy; 2026 Pemerintah Kota Bogor</p>
    </div>
</footer>
