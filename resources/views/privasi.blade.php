@extends('layouts.app')

@section('title', 'Kebijakan Privasi - PANDU PORPROV')

@section('content')
<!-- Banner -->
<section class="page-banner">
    <img class="banner-bg-img" src="{{ asset('images/venue4.jpeg') }}" alt="">
    <div class="banner-inner">
        <div class="banner-icon">
            <svg width="28" height="28" fill="none" stroke="#fff" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <div class="banner-text">
            <span class="banner-badge">PORPROV XV · 2026</span>
            <h1>KEBIJAKAN PRIVASI</h1>
            <p>Kebijakan privasi dan perlindungan data pengunjung website</p>
        </div>
    </div>
    <div class="banner-accent-line"></div>
    <div class="banner-bottom-curve">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,20 1200,60 L1200,120 L0,120 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</section>

<!-- Privacy Policy Content -->
<div class="privasi-page">
    <div class="privasi-container">

        <div class="privasi-section">
            <h2>1. Pendahuluan</h2>
            <p>Selamat datang di website PANDU PORPROV XV Kota Bogor 2026. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda saat mengunjungi website kami. Dengan mengakses website ini, Anda menyetujui praktik yang dijelaskan dalam kebijakan ini.</p>
        </div>

        <div class="privasi-section">
            <h2>2. Informasi Yang Kami Kumpulkan</h2>
            <p>Kami dapat mengumpulkan informasi berikut dari pengunjung website:</p>
            <ul>
                <li><strong>Informasi Identitas:</strong> Nama, alamat email, dan nomor telepon saat Anda mengirimkan formulir kontak atau mendaftar untuk layanan tertentu.</li>
                <li><strong>Data Teknis:</strong> Alamat IP, jenis browser, sistem operasi, dan informasi perangkat lainnya secara otomatis dikumpulkan untuk keperluan analisis.</li>
                <li><strong>Data Penggunaan:</strong> Halaman yang dikunjungi, waktu kunjungan, durasi aktivitas, dan pola navigasi di website kami.</li>
                <li><strong>Cookies:</strong> File kecil yang disimpan di perangkat Anda untuk meningkatkan pengalaman browsing.</li>
            </ul>
        </div>

        <div class="privasi-section">
            <h2>3. Penggunaan Informasi</h2>
            <p>Informasi yang kami kumpulkan digunakan untuk:</p>
            <ul>
                <li>Menyediakan informasi terkait kegiatan PORPROV XV Kota Bogor 2026.</li>
                <li>Menanggapi pertanyaan, masukan, atau permintaan dari pengunjung.</li>
                <li>Menganalisis penggunaan website guna meningkatkan kualitas layanan.</li>
                <li>Memastikan keamanan dan kestabilan website.</li>
                <li>Mematuhi kewajiban hukum yang berlaku.</li>
            </ul>
        </div>

        <div class="privasi-section">
            <h2>4. Cookies</h2>
            <p>Website kami menggunakan cookies untuk:</p>
            <ul>
                <li>Mengingat preferensi pengguna (ukuran teks, mode aksesibilitas, dll).</li>
                <li>Menganalisis lalu lintas website melalui layanan analitik pihak ketiga.</li>
                <li>Meningkatkan fungsionalitas dan pengalaman pengguna.</li>
            </ul>
            <p>Pengguna dapat mengatur atau menonaktifkan cookies melalui pengaturan browser masing-masing.</p>
        </div>

        <div class="privasi-section">
            <h2>5. Keamanan Data</h2>
            <p>Kami berkomitmen untuk melindungi informasi pribadi Anda. Kami menerapkan langkah-langkah keamanan teknis dan organisasi yang sesuai untuk mencegah akses, penggunaan, atau pengungkapan data pribadi yang tidak sah. Namun, tidak ada metode transmisi atau penyimpanan data yang 100% aman, sehingga kami tidak dapat menjamin keamanan absolut.</p>
        </div>

        <div class="privasi-section">
            <h2>6. Tautan Pihak Ketiga</h2>
            <p>Website ini mungkin berisi tautan ke website pihak ketiga (seperti Google Maps, media sosial, dll). Kami tidak bertanggung jawab atas praktik privasi atau konten website pihak ketiga tersebut. Kami menyarankan pengunjung untuk membaca kebijakan privasi dari setiap website yang dikunjungi.</p>
        </div>

        <div class="privasi-section">
            <h2>7. Hak Pengguna</h2>
            <p>Sebagai pengunjung website, Anda memiliki hak untuk:</p>
            <ul>
                <li>Mengakses informasi pribadi yang kami miliki tentang Anda.</li>
                <li>Meminta koreksi atau pembaruan data pribadi Anda.</li>
                <li>Meminta penghapusan data pribadi Anda, kecuali diwajibkan oleh hukum.</li>
                <li>Menolak penggunaan data pribadi Anda untuk tujuan tertentu.</li>
            </ul>
        </div>

        <div class="privasi-section">
            <h2>8. Perubahan Kebijakan Privasi</h2>
            <p>Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu tanpa pemberitahuan sebelumnya. Perubahan akan diposting di halaman ini dengan tanggal pembaruan yang tertera di bawah. Disarankan untuk memeriksa halaman ini secara berkala.</p>
        </div>

        <div class="privasi-section">
            <h2>9. Hubungi Kami</h2>
            <p>Jika Anda memiliki pertanyaan atau kekhawatiran mengenai Kebijakan Privasi ini, silakan hubungi kami melalui:</p>
            <ul>
                <li><strong>Website:</strong> pandu-porprov.kotabogor.go.id</li>
                <li><strong>Pemerintah Kota Bogor</strong></li>
            </ul>
        </div>

        <div class="privasi-footer">
            <p>Terakhir diperbarui: <strong>27 Juli 2026</strong></p>
        </div>

    </div>
</div>
@endsection
