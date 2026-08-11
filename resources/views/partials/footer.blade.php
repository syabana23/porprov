<footer class="site-footer">
    <div class="footer-main">
        <div class="footer-container">
            <div class="footer-grid">
                <!-- Kolom 1: Branding -->
                <div class="footer-brand">
                    <a href="{{ url('/') }}" class="footer-logo">
                        <img src="{{ asset('images/logo_baru.PNG') }}" alt="Logo PORPROV XV">
                    </a>
                    <p class="footer-desc">
                        <strong>PORPROV XV</strong> Kota Bogor 2026 adalah ajang sport festival terbesar tingkat provinsi — tempat atlet dari seluruh kota/kabupaten di Jawa Barat.
                    </p>
                </div>

                <!-- Kolom 2: Penyelenggara -->
                <div class="footer-organizers">
                    <h4 class="footer-title">Diselenggarakan Oleh :</h4>
                    <div class="organizers-coa">
                        <img src="{{ asset('images/footer/kota_bekasi.png') }}" alt="Kota Bekasi">
                        <img src="{{ asset('images/footer/kota_depok.png') }}" alt="Kota Depok">
                        <img src="{{ asset('images/footer/kota_bogor.png') }}" alt="Kota Bogor">
                    </div>
                    <div class="organizers-mascots">
                        <img src="{{ asset('images/footer/maskot_bekasi.png') }}" alt="Maskot Bekasi">
                        <img src="{{ asset('images/footer/maskot_depok.png') }}" alt="Maskot Depok">
                        <img src="{{ asset('images/footer/anggar.png') }}" alt="Maskot Bekasi 2">
                    </div>
                </div>

                <!-- Kolom 3: Navigasi -->
                <div class="footer-links">
                    <div class="footer-links-col">
                        <h4 class="footer-title">Navigasi Cepat</h4>
                        <a href="{{ url('/') }}">Beranda</a>
                        <a href="{{ url('/peta-venue') }}">Peta Venue</a>
                        <a href="{{ url('/fasilitas') }}">Fasilitas</a>
                        <a href="{{ url('/klasemen-medali') }}">Klasemen Medali</a>
                    </div>
                    <div class="footer-links-col">
                        <h4 class="footer-title">Informasi</h4>
                        <a href="{{ url('/jadwal') }}">Jadwal</a>
                        <a href="{{ url('/galeri') }}">Galeri</a>
                        <a href="{{ url('/kebijakan-privasi') }}">Kebijakan Privasi</a>
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
