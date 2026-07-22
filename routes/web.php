<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/berita', function () {
    return view('berita');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/peta-venue', function () {
    return view('venue');
});

Route::get('/fasilitas', function () {
    $facilities = [
        // === Rumah Sakit ===
        ['nama' => 'RS PMI Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Raya Pajajaran No.90', 'kelurahan' => 'Baranangsiang', 'kecamatan' => 'Bogor Timur', 'telepon' => '(0251) 833 455', 'layanan' => 'IGD 24 jam, Rawat Inap', 'website' => '', 'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=200&h=160&q=80'],
        ['nama' => 'RS Azra Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Pajajaran No.219', 'kelurahan' => 'Baranangsiang', 'kecamatan' => 'Bogor Timur', 'telepon' => '(0251) 831 845', 'layanan' => 'IGD 24 jam, Rawat Inap', 'website' => '', 'image' => 'https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=200&h=160&q=80'],

        // === Apotek ===
        ['nama' => 'Apotek Kimia Farma', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Jl. Raya Pajajaran No.90', 'kelurahan' => 'Baranangsiang', 'kecamatan' => 'Bogor Timur', 'telepon' => '(0251) 832 114', 'layanan' => 'Obat Resep, Obat Bebas, Alat Kesehatan', 'website' => '', 'image' => 'https://images.unsplash.com/photo-1587370560942-ad2a04eabb6d?auto=format&fit=crop&w=200&h=160&q=80'],

        // === Puskesmas (25 data dari gambar) ===
        ['nama' => 'Puskesmas Bogor Selatan', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Batu Tulis No. 62 RT. 01 RW. 08, Kel. Batu Tulis, Kec. Bogor Selatan', 'kelurahan' => 'Batu Tulis', 'kecamatan' => 'Bogor Selatan', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmbogorselatan.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Cipaku', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Raya Cipaku No.01, Bogor Selatan', 'kelurahan' => 'Cipaku', 'kecamatan' => 'Bogor Selatan', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmcipaku.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Bondongan', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Pahlawan No. 108/68 A Empang Bogor Selatan Kota Bogor', 'kelurahan' => 'Bondongan', 'kecamatan' => 'Bogor Selatan', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmbondongan.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Lawang Gintung', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Skip No.13 Lawang Gintung, Bogor Selatan', 'kelurahan' => 'Lawang Gintung', 'kecamatan' => 'Bogor Selatan', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmlawanggintung.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Mulyaharja', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Raya Pondok Bitung No.14 Rt. 003/003, Mulyaharja, Bogor Sel., Kota Bogor', 'kelurahan' => 'Mulyaharja', 'kecamatan' => 'Bogor Selatan', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmmulyaharja.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Bogor Timur', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Pakuan No. 6 RT. 01 RW. 11, Kel. Baranangsiang, Kec. Bogor Timur', 'kelurahan' => 'Baranangsiang', 'kecamatan' => 'Bogor Timur', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmbogortimur.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Pulo Armyn', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Raya Tajur No. 40 RT. 04 RW. 01, Kel. Tajur, Kec. Bogor Timur', 'kelurahan' => 'Tajur', 'kecamatan' => 'Bogor Timur', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmpuloarmyn.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Bogor Tengah', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Telepon No. 1 RT. 02 RW. 01, Kel. Pabaton, Kec. Bogor Tengah', 'kelurahan' => 'Pabaton', 'kecamatan' => 'Bogor Tengah', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmbogortengah.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Sempur', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Sempur Kaler No. 100 RT. 05 RW. 02, Kel. Sempur, Kec. Bogor Tengah', 'kelurahan' => 'Sempur', 'kecamatan' => 'Bogor Tengah', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmsempur.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Gang Aut', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Gang Aut No. 18, Gudang, Bogor Tengah', 'kelurahan' => 'Gudang', 'kecamatan' => 'Bogor Tengah', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmgangaut.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Belong', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Roda No. 25 RT. 02 RW. 06, Kel. Babakan Pasar, Kec. Bogor Tengah', 'kelurahan' => 'Babakan Pasar', 'kecamatan' => 'Bogor Tengah', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmbelong.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Merdeka', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Merdeka No. 114 Bogor Tengah Kota Bogor', 'kelurahan' => 'Ciwaringin', 'kecamatan' => 'Bogor Tengah', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmmerdeka.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Semplak', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. K.H. Abdullah Bin Nuh, Yasmin sektor VI Curug Mekar, Bogor Barat', 'kelurahan' => 'Curug Mekar', 'kecamatan' => 'Bogor Barat', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmsemplak.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Pancasan', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. R. Aria Surialaga No. 12 RT. 01 RW. 06, Kel. Pasir Jaya, Kec. Bogor Barat', 'kelurahan' => 'Pasir Jaya', 'kecamatan' => 'Bogor Barat', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmpancasan.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Pasir Mulya', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Pasir Mulya No.30, Bogor Barat', 'kelurahan' => 'Pasir Mulya', 'kecamatan' => 'Bogor Barat', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmpasirmulya.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Gang Kelor', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Dr. Semeru Gang Kelor Raya No. 6 RT. 01 RW. 09, Kel. Menteng, Kec. Bogor Barat', 'kelurahan' => 'Menteng', 'kecamatan' => 'Bogor Barat', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmgangkelor.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Sindang Barang', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Sirnasari IV No. 3 RT. 02 RW. 09, Kel. Sindang Barang, Kec. Bogor Barat', 'kelurahan' => 'Sindang Barang', 'kecamatan' => 'Bogor Barat', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmsindangbarang.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Bogor Utara', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => "Jl. Raden Kan'an No.81 Rt05/04 Kel. Tanah Baru, Bogor Utara", 'kelurahan' => 'Tanah Baru', 'kecamatan' => 'Bogor Utara', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmbogorutara.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Tegal Gundil', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Palupuh Raya No. 1 RT. 001 RW. 002, Kel. Tegal Gundil, Kec. Bogor Utara', 'kelurahan' => 'Tegal Gundil', 'kecamatan' => 'Bogor Utara', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmtegalgundil.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Warung Jambu', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Gatot Kaca 1 No.01, Bogor Utara', 'kelurahan' => 'Bantar Jati', 'kecamatan' => 'Bogor Utara', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmwarungjambu.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Tanah Sareal', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jalan RM Tirto Adhi Soerjo No 3 16161', 'kelurahan' => 'Tanah Sareal', 'kecamatan' => 'Tanah Sareal', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmtanahsareal.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Pondok Rumput', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Gang Biawas No. 19 RT. 05 RW. 11, Kel. Kebon Pedes, Kec. Tanah Sareal', 'kelurahan' => 'Kebon Pedes', 'kecamatan' => 'Tanah Sareal', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmpondokrumput.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Kedung Badak', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Panataran No. 1 RT. 06 RW. 09, Kel. Kedung Badak, Kec. Tanah Sareal', 'kelurahan' => 'Kedung Badak', 'kecamatan' => 'Tanah Sareal', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmkedungbadak.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Kayu Manis', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Pool Binamarga Rt02/01 Kel. Kayu Manis, Tanah Sareal', 'kelurahan' => 'Kayu Manis', 'kecamatan' => 'Tanah Sareal', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmkayumanis.kotabogor.go.id', 'image' => ''],
        ['nama' => 'Puskesmas Mekarwangi', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Subur No.2 Bukit Cimanggu City Bogor, Tanah Sareal', 'kelurahan' => 'Cibadak', 'kecamatan' => 'Tanah Sareal', 'telepon' => '-', 'layanan' => 'Pelayanan Kesehatan Masyarakat', 'website' => 'https://pkmmekarwangi.kotabogor.go.id', 'image' => ''],
    ];

    // Count stats
    $stats = [
        'total' => count($facilities),
        'rs' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'rs')),
        'puskesmas' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'puskesmas')),
        'apotek' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'apotek')),
        'klinik' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'klinik')),
        'lab' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'lab')),
    ];

    return view('fasilitas', compact('facilities', 'stats'));
});

Route::get('/galeri', function () {
    return view('galeri');
});
