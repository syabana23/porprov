<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;

$venueRutes = [
    'GOR Pajajaran' => [
        [
            'judul' => 'Bus',
            'langkah' => [
                'Rute Terbaik: Naik BISKITA Trans Pakuan yang menuju kawasan GOR Pajajaran atau Stasiun Bogor.',
                'Titik Turun: Turun di halte terdekat di sekitar kawasan GOR Pajajaran.',
                'Melanjutkan Perjalanan: Dari titik turun, Anda dapat berjalan kaki menuju lokasi pertandingan yang berada di kompleks GOR Pajajaran.',
            ],
        ],
        [
            'judul' => 'KRL',
            'langkah' => [
                'Stasiun Terdekat: Stasiun Bogor.',
                'Petunjuk Arah: Gunakan KRL Commuter Line dan turun di Stasiun Bogor.',
                'Melanjutkan Perjalanan: Dari stasiun, lanjutkan menggunakan BISKITA, angkot, ojek online, atau taksi menuju kawasan Jl. Pemuda/GOR Pajajaran.',
            ],
        ],
        [
            'judul' => 'Angkot',
            'langkah' => [
                'Angkot dari Stasiun/Terminal: Naik angkot Trayek 7 jurusan Terminal Bubulak – Merdeka – Ciparigi.',
                'Titik Turun: Turun di kawasan Jl. Pemuda/GOR Pajajaran.',
                'Melanjutkan Perjalanan: Dari jalan utama, Anda tinggal berjalan kaki untuk mencapai kompleks GOR Pajajaran.',
            ],
        ],
        [
            'judul' => 'Kendaraan Pribadi',
            'langkah' => [
                'Via Tol Jagorawi: Keluar menuju Kota Bogor, lalu ambil arah Tanah Sareal.',
                'Arah Lokasi: Ikuti navigasi menuju kawasan Jl. Pemuda dan GOR Pajajaran.',
                'Fasilitas Parkir: Gunakan area parkir yang tersedia di sekitar kompleks GOR Pajajaran.',
            ],
        ],
    ],
    'Green Forest Hotel' => [
        [
            'judul' => 'Bus',
            'langkah' => [
                'Rute Terbaik: Naik BISKITA Trans Pakuan yang menuju kawasan Bogor Selatan/Pajajaran.',
                'Titik Turun: Turun di halte terdekat menuju kawasan Pamoyanan.',
                'Melanjutkan Perjalanan: Dari titik turun, Anda dapat menggunakan layanan ojek online atau taksi menuju Green Forest Bogor dengan waktu tempuh menyesuaikan kondisi lalu lintas.',
            ],
        ],
        [
            'judul' => 'KRL',
            'langkah' => [
                'Stasiun Terdekat: Stasiun Bogor.',
                'Petunjuk Arah: Gunakan KRL Commuter Line dan turun di Stasiun Bogor.',
                'Melanjutkan Perjalanan: Dari stasiun, lanjutkan perjalanan menggunakan angkot, ojek online, atau taksi menuju kawasan Pamoyanan hingga mencapai lokasi Green Forest Bogor.',
            ],
        ],
        [
            'judul' => 'Angkot',
            'langkah' => [
                'Angkot dari Stasiun/Terminal: Naik angkot Trayek 28 jurusan Pabuaran – Lawang Saketeng/BTM.',
                'Titik Turun: Turun di kawasan Pamoyanan/Jl. Raya Cipaku.',
                'Melanjutkan Perjalanan: Dari titik turun, lanjutkan dengan berjalan kaki atau menggunakan ojek online menuju Green Forest Bogor.',
            ],
        ],
        [
            'judul' => 'Kendaraan Pribadi',
            'langkah' => [
                'Via Tol Jagorawi: Keluar menuju Kota Bogor, lalu ambil arah Bogor Selatan/Pamoyanan.',
                'Arah Lokasi: Ikuti navigasi menuju kawasan Jl. RE. Soemantadiredja hingga Green Forest Bogor.',
                'Fasilitas Parkir: Gunakan area parkir yang tersedia di sekitar kompleks venue.',
            ],
        ],
    ],
    'Gymnasium Sekolah Vokasi IPB' => [
        [
            'judul' => 'Bus',
            'langkah' => [
                'Rute Terbaik: Naik BISKITA Trans Pakuan menuju kawasan Pajajaran/Bogor Tengah.',
                'Titik Turun: Turun di halte terdekat menuju kawasan Cilibende/Babakan.',
                'Melanjutkan Perjalanan: Dari titik turun, lanjutkan menggunakan ojek online menuju Jl. Lodaya II dan GOR Vokasi IPB.',
            ],
        ],
        [
            'judul' => 'KRL',
            'langkah' => [
                'Stasiun Terdekat: Stasiun Bogor.',
                'Petunjuk Arah: Gunakan KRL Commuter Line dan turun di Stasiun Bogor.',
                'Melanjutkan Perjalanan: Dari stasiun, lanjutkan menggunakan angkot atau ojek online menuju kawasan Cilibende/Babakan hingga lokasi GOR Vokasi IPB.',
            ],
        ],
        [
            'judul' => 'Angkot',
            'langkah' => [
                'Angkot dari Stasiun/Terminal: Naik angkot Trayek 3 jurusan Cimahpar – BTM.',
                'Titik Turun: Turun di kawasan Jl. Lodaya.',
                'Melanjutkan Perjalanan: Dari titik turun, Anda dapat berjalan kaki atau menggunakan ojek online menuju GOR Vokasi IPB.',
            ],
        ],
        [
            'judul' => 'Kendaraan Pribadi',
            'langkah' => [
                'Via Tol Jagorawi: Keluar menuju Kota Bogor, lalu ambil arah Pajajaran/Bogor Tengah.',
                'Arah Lokasi: Ikuti navigasi menuju Jl. Lodaya II hingga GOR Vokasi IPB.',
                'Fasilitas Parkir: Gunakan area parkir yang tersedia di sekitar venue.',
            ],
        ],
    ],
    'GOR Yasmin Bulutangkis' => [
        [
            'judul' => 'Bus',
            'langkah' => [
                'Rute Terbaik: Naik BISKITA Trans Pakuan menuju kawasan Yasmin/Bubulak.',
                'Titik Turun: Turun di halte terdekat di kawasan Yasmin.',
                'Melanjutkan Perjalanan: Dari titik turun, lanjutkan berjalan kaki atau menggunakan ojek online menuju GOR Yasmin.',
            ],
        ],
        [
            'judul' => 'KRL',
            'langkah' => [
                'Stasiun Terdekat: Stasiun Bogor.',
                'Petunjuk Arah: Gunakan KRL Commuter Line dan turun di Stasiun Bogor.',
                'Melanjutkan Perjalanan: Dari stasiun, lanjutkan menggunakan BISKITA, angkot, atau ojek online menuju kawasan Yasmin/Cilendek Barat hingga lokasi GOR Yasmin.',
            ],
        ],
        [
            'judul' => 'Angkot',
            'langkah' => [
                'Angkot dari Stasiun/Terminal: Naik angkot Trayek 1 jurusan Cipinang Gading – Perumahan Yasmin.',
                'Titik Turun: Turun di kawasan Perumahan Yasmin/Cilendek Barat.',
                'Melanjutkan Perjalanan: Dari titik turun, lanjutkan berjalan kaki atau menggunakan ojek online menuju GOR Yasmin.',
            ],
        ],
        [
            'judul' => 'Kendaraan Pribadi',
            'langkah' => [
                'Via Tol: Keluar menuju Kota Bogor, lalu ambil arah Bogor Barat/Yasmin.',
                'Arah Lokasi: Ikuti navigasi menuju kawasan Jl. Wijaya Kusuma Raya hingga GOR Yasmin.',
                'Fasilitas Parkir: Gunakan area parkir yang tersedia di sekitar venue.',
            ],
        ],
    ],
    'PPSDMAP Kemenhub Kemang' => [
        [
            'judul' => 'Bus',
            'langkah' => [
                'Rute Terbaik: Naik bus atau angkutan umum yang menuju arah Kemang–Parung.',
                'Titik Turun: Turun di titik pemberhentian terdekat di sepanjang Jl. Raya Kemang–Parung.',
                'Melanjutkan Perjalanan: Dari titik turun, lanjutkan menggunakan ojek online atau taksi menuju PPSDMAP Kemenhub.',
            ],
        ],
        [
            'judul' => 'KRL',
            'langkah' => [
                'Stasiun Terdekat: Stasiun Bogor.',
                'Petunjuk Arah: Gunakan KRL Commuter Line dan turun di Stasiun Bogor.',
                'Melanjutkan Perjalanan: Dari stasiun, lanjutkan menggunakan angkot, ojek online, atau taksi menuju kawasan Kemang–Parung hingga lokasi venue.',
            ],
        ],
        [
            'judul' => 'Angkot',
            'langkah' => [
                'Angkot dari Stasiun/Terminal: Naik angkot Trayek 06 jurusan Terminal Merdeka – Parung.',
                'Titik Turun: Turun di kawasan Kemang/Jl. Raya Kemang–Parung.',
                'Melanjutkan Perjalanan: Dari titik turun, lanjutkan menggunakan ojek online menuju PPSDMAP Kemenhub.',
            ],
        ],
        [
            'judul' => 'Kendaraan Pribadi',
            'langkah' => [
                'Via Tol: Keluar menuju Kota Bogor, lalu ambil arah Kemang–Parung.',
                'Arah Lokasi: Ikuti Jl. Raya Kemang–Parung menuju kawasan Pd. Udik hingga PPSDMAP Kemenhub.',
                'Fasilitas Parkir: Gunakan area parkir yang tersedia di kompleks venue.',
            ],
        ],
    ],
    'Padepokan Voli Sentul' => [
        [
            'judul' => 'Bus',
            'langkah' => [
                'Rute Terbaik: Naik bus atau angkutan umum menuju kawasan Sentul City/Babakan Madang.',
                'Titik Turun: Turun di kawasan Sentul atau titik terdekat menuju Citaringgul.',
                'Melanjutkan Perjalanan: Dari titik turun, lanjutkan menggunakan ojek online menuju Padepokan Voli Sentul.',
            ],
        ],
        [
            'judul' => 'KRL',
            'langkah' => [
                'Stasiun Terdekat: Stasiun Bogor.',
                'Petunjuk Arah: Gunakan KRL Commuter Line dan turun di Stasiun Bogor.',
                'Melanjutkan Perjalanan: Dari stasiun, lanjutkan menggunakan ojek online atau taksi menuju kawasan Sentul–Citaringgul hingga lokasi Padepokan Voli Sentul.',
            ],
        ],
        [
            'judul' => 'Angkot',
            'langkah' => [
                'Angkot dari Stasiun/Terminal: Naik angkot Trayek 44 jurusan Citeureup – Babakan Madang.',
                'Titik Turun: Turun di kawasan Babakan Madang/Citaringgul.',
                'Melanjutkan Perjalanan: Dari titik turun, lanjutkan menggunakan ojek online menuju Padepokan Voli Sentul.',
            ],
        ],
        [
            'judul' => 'Kendaraan Pribadi',
            'langkah' => [
                'Via Tol Jagorawi: Keluar menuju kawasan Sentul/Sentul City.',
                'Arah Lokasi: Lanjutkan perjalanan menuju Babakan Madang–Citaringgul dan ikuti navigasi menuju Padepokan Voli Sentul.',
                'Fasilitas Parkir: Gunakan area parkir yang tersedia di sekitar venue dan ikuti arahan petugas.',
            ],
        ],
    ],
    'Gunung Mas (Cisarua)' => [
        [
            'judul' => 'Bus',
            'langkah' => [
                'Rute Terbaik: Naik bus atau angkutan umum dari Kota Bogor menuju arah Ciawi–Puncak–Cisarua.',
                'Titik Turun: Turun di kawasan Tugu/Cisarua atau titik terdekat menuju Gunung Mas.',
                'Melanjutkan Perjalanan: Dari jalan utama, lanjutkan menggunakan ojek menuju kawasan Gunung Mas/Paralayang Puncak.',
            ],
        ],
        [
            'judul' => 'KRL',
            'langkah' => [
                'Stasiun Terdekat: Stasiun Bogor.',
                'Petunjuk Arah: Gunakan KRL Commuter Line dan turun di Stasiun Bogor.',
                'Melanjutkan Perjalanan: Dari stasiun, lanjutkan menggunakan angkot menuju Sukasari, kemudian berganti angkutan menuju Ciawi–Cisarua. Dari Cisarua, lanjutkan menggunakan ojek menuju Gunung Mas.',
            ],
        ],
        [
            'judul' => 'Angkot',
            'langkah' => [
                'Angkot dari Stasiun/Terminal: Naik angkot Trayek 02 jurusan Sukasari – Bubulak menuju Sukasari. Selanjutnya berganti angkot Trayek 02A jurusan Sukasari – Cisarua.',
                'Titik Turun: Turun di kawasan Cisarua/Tugu Selatan.',
                'Melanjutkan Perjalanan: Dari titik turun, lanjutkan menggunakan ojek online menuju kawasan Gunung Mas/Paralayang Puncak.',
            ],
        ],
        [
            'judul' => 'Kendaraan Pribadi',
            'langkah' => [
                'Via Tol Jagorawi: Keluar di arah Ciawi, kemudian masuk ke Jl. Raya Puncak.',
                'Arah Lokasi: Lanjutkan melewati Gadog dan Cisarua menuju Tugu Selatan/Gunung Mas.',
                'Fasilitas Parkir: Gunakan area parkir di kawasan Gunung Mas dan ikuti arahan petugas menuju lokasi pertandingan.',
            ],
        ],
    ],
    'Sport Jabar Arcamanik' => [
        [
            'judul' => 'KRL Stasiun Bandung + Bus/Angkot',
            'langkah' => [
                'Naik kereta api lokal/KRL Commuter Line Bandung Raya dan turun di Stasiun Bandung.',
                'Lanjut naik Trans Metro Bandung/Metro Jabar Trans atau angkot jurusan Arcamanik.',
                'Turun di kawasan Arcamanik (Jl. Pacuan Kuda), menuju Sport Jabar.',
            ],
        ],
        [
            'judul' => 'KRL Stasiun Kiaracondong (lebih dekat)',
            'langkah' => [
                'Naik kereta api lokal/KRL dan turun di Stasiun Kiaracondong.',
                'Lanjut naik angkot jurusan Arcamanik (±15 menit) atau ojek.',
                'Turun di Sport Jabar, Jl. Pacuan Kuda, Sukamiskin, Arcamanik.',
            ],
        ],
        [
            'judul' => 'Dari Terminal Cicaheum / Kiaracondong',
            'langkah' => [
                'Naik angkot kota Bandung jurusan Arcamanik dari Terminal Cicaheum atau Pasar Kiaracondong.',
                'Turun di Jl. Pacuan Kuda, dekat Sport Jabar.',
            ],
        ],
    ],
    'Lapangan Tembak Cisangkan' => [
        [
            'judul' => 'KRL Stasiun Cimahi + Angkot',
            'langkah' => [
                'Naik KRL Commuter Line Bandung Raya dan turun di Stasiun Cimahi.',
                'Lanjut naik angkot jurusan Padasuka/Cisangkan atau ojek.',
                'Turun di Lapangan Tembak Cisangkan, Jl. Raya Cisangkan, Cimahi.',
            ],
        ],
        [
            'judul' => 'Dari Stasiun Bandung',
            'langkah' => [
                'Naik KRL/KA lokal dari Stasiun Bandung menuju Stasiun Cimahi.',
                'Lanjut naik angkot/ojek jurusan Padasuka/Cisangkan.',
                'Turun di Lapangan Tembak Cisangkan, Jl. Raya Cisangkan.',
            ],
        ],
        [
            'judul' => 'Angkot Kota Cimahi',
            'langkah' => [
                'Dari pusat Kota Cimahi naik angkot jurusan Padasuka.',
                'Turun di Lapangan Tembak Cisangkan, Jl. Raya Cisangkan, Cimahi Tengah.',
            ],
        ],
    ],
    'Kota Baru Parahyangan' => [
        [
            'judul' => 'Whoosh + Shuttle Gratis KCIC',
            'langkah' => [
                'Naik Kereta Cepat Whoosh dan turun di Stasiun Padalarang.',
                'Lanjut naik shuttle gratis KCIC menuju Kota Baru Parahyangan (tersedia ±30 perjalanan/hari).',
                'Turun di kawasan Kota Baru Parahyangan, menuju venue ski air.',
            ],
        ],
        [
            'judul' => 'Whoosh + Trans Metro Pasundan 2D',
            'langkah' => [
                'Naik Whoosh dan turun di Stasiun Padalarang.',
                'Lanjut naik bus Trans Metro Pasundan 2D (Kota Baru Parahyangan–Stasiun Padalarang–Cimahi–Alun-alun Bandung), tarif Rp4.900, beroperasi 04.30–20.00 WIB.',
                'Turun di kawasan Kota Baru Parahyangan.',
            ],
        ],
        [
            'judul' => 'KRL Commuter Line Bandung Raya',
            'langkah' => [
                'Naik KRL Commuter Line Bandung Raya dan turun di Stasiun Padalarang.',
                'Lanjut naik Trans Metro Pasundan 2D atau ojek/taksi menuju Kota Baru Parahyangan.',
            ],
        ],
        [
            'judul' => 'KA Feeder / Angkot Padalarang',
            'langkah' => [
                'Naik KA Feeder menuju Padalarang, atau angkot jurusan Padalarang/Kota Baru Parahyangan dari Cimahi/Bandung.',
                'Turun di kawasan Kota Baru Parahyangan, menuju venue ski air.',
            ],
        ],
    ],
    'Majalengka' => [
        [
            'judul' => 'Bus AKAP via Tol Cipali',
            'langkah' => [
                'Naik bus AKAP dari Terminal Kampung Rambutan/Pulo Gebang Jakarta jurusan Cirebon via Tol Cipali.',
                'Turun di exit Kertajati/Majalengka, lalu lanjut angkutan desa atau ojek menuju lokasi kegiatan (titik take-off).',
            ],
        ],
        [
            'judul' => 'Travel dari Bandung',
            'langkah' => [
                'Naik travel (Arnes Shuttle, MS Trans, Bhinneka Shuttle) dari Bandung (Balubur Town Square/Pasteur) jurusan Majalengka.',
                'Turun di kota Majalengka (±2 jam perjalanan).',
                'Lanjut angkutan lokal atau ojek menuju lokasi kegiatan.',
            ],
        ],
        [
            'judul' => 'Bus Cirebon–Majalengka',
            'langkah' => [
                'Naik bus Cirebon–Majalengka via Kuningan.',
                'Turun di kota Majalengka, lalu lanjut angkutan lokal menuju lokasi kegiatan.',
            ],
        ],
        [
            'judul' => 'Kereta ke Cirebon + Lanjut Bus/Travel',
            'langkah' => [
                'Naik kereta api dan turun di Stasiun Cirebon.',
                'Lanjut naik bus/travel menuju Majalengka.',
                'Lanjut angkutan lokal atau ojek menuju lokasi kegiatan.',
            ],
        ],
    ],
];

$venues = [
    [
        'id' => 1,
        'name' => 'GOR Pajajaran Indoor A',
        'lat' => -6.575816698132383,
        'lng' => 106.796958655819,
        'address' => 'GOR Pajajaran, Jl. Pemuda No.02, RT.04/RW.01, Tanah Sareal, Kota Bogor, Jawa Barat 16161',
        'cabor' => 'Drumband, Pencak Silat, Taekwondo',
        'gmaps_url' => 'https://maps.app.goo.gl/KcwQDC2JxcTsj1LJ8',
    ],
    [
        'id' => 2,
        'name' => 'GOR Pajajaran Indoor B',
        'lat' => -6.577928206784957,
        'lng' => 106.79690799953588,
        'address' => 'GOR Pajajaran, Jl. Pemuda No.02, RT.04/RW.01, Tanah Sareal, Kota Bogor, Jawa Barat 16161',
        'cabor' => 'Judo, Kurash, Sambo',
        'gmaps_url' => 'https://maps.app.goo.gl/h3ei411WRSdW5Uuf8',
    ],
    [
        'id' => 3,
        'name' => 'GOR Vokasi IPB',
        'lat' => -6.586864818074109,
        'lng' => 106.80744643623193,
        'address' => 'Jl. Lodaya II, RT.03/RW.05, Cilibende, Babakan, Kec. Bogor Tengah, Kota Bogor, Jawa Barat 16128',
        'cabor' => 'Shorinji Kempo, Tarung Derajat',
        'gmaps_url' => 'https://maps.app.goo.gl/ekjekDk57iBAQcTVA',
    ],
    [
        'id' => 4,
        'name' => 'Majalengka',
        'lat' => -6.836580168091458,
        'lng' => 108.22805804110702,
        'address' => 'Majalengka, Jawa Barat',
        'cabor' => 'Aerosport - Gantolle',
        'gmaps_url' => 'https://maps.google.com/?q=Majalengka',
    ],
    [
        'id' => 5,
        'name' => 'Gunung Mas',
        'lat' => -6.701561756877455,
        'lng' => 106.97130253598559,
        'address' => 'Puncak, Bogor, Jawa Barat',
        'cabor' => 'Aerosport - Paralayang',
        'gmaps_url' => 'https://maps.google.com/?q=Gunung+Mas+Puncak',
    ],
    [
        'id' => 6,
        'name' => 'Green Forest Hotel',
        'lat' => -6.64930420834099,
        'lng' => 106.806161644181,
        'address' => 'Bogor, Jawa Barat',
        'cabor' => 'Anggar, Angkat Besi, Angkat Berat, Arung Jeram, Binaraga, Petanque, Dansa',
        'gmaps_url' => 'https://maps.app.goo.gl/dgb7WBjKovkcfyLo9',
    ],
    [
        'id' => 7,
        'name' => 'PPSDMAP Kemenhub Kemang',
        'lat' => -6.498024311495613,
        'lng' => 106.74365521534482,
        'address' => 'Kemang, Bogor, Jawa Barat',
        'cabor' => 'Bola Tangan Indoor',
        'gmaps_url' => 'https://maps.app.goo.gl/Ma2cC3WY3DaWJYQ19',
    ],
    [
        'id' => 8,
        'name' => 'Padepokan Voli Sentul',
        'lat' => -6.571855570792679,
        'lng' => 106.8607669981466,
        'address' => 'Sentul, Bogor, Jawa Barat',
        'cabor' => 'Bola Tangan Pasir',
        'gmaps_url' => 'https://maps.app.goo.gl/cXPfu5acX62py9QY9',
    ],
    [
        'id' => 9,
        'name' => 'Arcamanik',
        'lat' => -6.911153350109742,
        'lng' => 107.67487895150336,
        'address' => 'Sport Jabar Arcamanik, Bandung, Jawa Barat',
        'cabor' => 'Gimnastik Aerobik, Gimnastik Artistik, Gimnastik Ritmik',
        'gmaps_url' => 'https://maps.google.com/?q=Sport+Jabar+Arcamanik',
    ],
    [
        'id' => 10,
        'name' => 'Cisangkan',
        'lat' => -6.8746820367318255,
        'lng' => 107.52764243801157,
        'address' => 'Lapang Tembak Cisangkan, Cimahi, Jawa Barat',
        'cabor' => 'Menembak',
        'gmaps_url' => 'https://maps.google.com/?q=Lapang+Tembak+Cisangkan',
    ],
    [
        'id' => 11,
        'name' => 'Stadion Pajajaran',
        'lat' => -6.5770496557407565,
        'lng' => 106.79707946745701,
        'address' => 'Stadion Pajajaran, Jl. Pemuda No.02, Kota Bogor',
        'cabor' => 'Modern Pentathlon, Panahan, Panjat Tebing',
        'gmaps_url' => 'https://maps.app.goo.gl/HgsrKKn8LD9V792UA',
    ],
    [
        'id' => 12,
        'name' => 'Kota Baru Parahyangan',
        'lat' => -6.85872946272341,
        'lng' => 107.4845999774748,
        'address' => 'Padalarang, Kabupaten Bandung Barat, Jawa Barat',
        'cabor' => 'Ski Air',
        'gmaps_url' => 'https://maps.google.com/?q=Kota+Baru+Parahyangan',
    ],
    [
        'id' => 13,
        'name' => 'GOR Yasmin',
        'lat' => -6.5669771863684225,
        'lng' => 106.77129339999999,
        'address' => 'Bogor, Jawa Barat',
        'cabor' => 'Tenis Meja',
        'gmaps_url' => 'https://maps.app.goo.gl/Fqw4Yn97RyvkSeg27',
    ],
];

$cabors = [
    [
        'slug' => 'aerosport-gantolle',
        'nama' => 'Aerosport - Gantolle',
        'logo' => '14.GANTOLE.png',
        'deskripsi' => 'Gantolle merupakan cabang aerosport yang menerbangkan sayap gantung (hang glider) tanpa mesin dengan lepas landas dari ketinggian. Perpaduan antara keterampilan mengendalikan sayap dan membaca arah angin membuat olahraga ini menuntut keberanian serta konsentrasi tinggi.',
        'venue' => 'Majalengka',
        'alamat' => 'Kabupaten Majalengka, Jawa Barat',
        'rute' => $venueRutes['Majalengka'],
    ],
    [
        'slug' => 'aerosport-paralayang',
        'nama' => 'Aerosport - Paralayang',
        'logo' => '3.PARALAYANG.png',
        'deskripsi' => 'Paralayang adalah olahraga terbang bebas dengan parasut besar (paraglider) yang diisi angin, lepas landas dari ketinggian dan mendarat dengan berjalan. Atlet dituntut menguasai teknik aerodinamika dan kondisi cuaca agar dapat terbang dengan stabil dan aman.',
        'venue' => 'Gunung Mas (Cisarua)',
        'alamat' => 'Jl. Raya Puncak KM 87, Tugu Selatan, Cisarua, Kab. Bogor',
        'rute' => $venueRutes['Gunung Mas (Cisarua)'],
    ],
    [
        'slug' => 'anggar',
        'nama' => 'Anggar',
        'logo' => '2.ANGGAR.png',
        'deskripsi' => 'Anggar adalah olahraga bela diri seni pedang yang dipertandingkan secara individu maupun beregu. Terdapat tiga senjata: floret, sabel, dan degen, dengan sistem penilaian elektronik untuk menentukan siapa yang berhasil menyentuh sasaran lawan terlebih dahulu.',
        'venue' => 'Green Forest Hotel',
        'alamat' => 'Jl. Pahlawan, Bondongan, Kec. Bogor Selatan, Kota Bogor',
        'rute' => $venueRutes['Green Forest Hotel'],
    ],
    [
        'slug' => 'dansa',
        'nama' => 'Dansa',
        'logo' => '27.DANSA.png',
        'deskripsi' => 'Dansa (dance sport) adalah olahraga seni yang menggabungkan gerakan tari dengan musik dalam pasangan. Terbagi dalam kategori standar dan Latin, penilaian menekankan teknik, kekompakan pasangan, serta ekspresi artistik di atas lantai dansa.',
        'venue' => 'Green Forest Hotel',
        'alamat' => 'Jl. Pahlawan, Bondongan, Kec. Bogor Selatan, Kota Bogor',
        'rute' => $venueRutes['Green Forest Hotel'],
    ],
    [
        'slug' => 'angkat-berat',
        'nama' => 'Angkat Berat',
        'logo' => '20.ANGKAT BERAT.png',
        'deskripsi' => 'Angkat berat adalah olahraga mengangkat beban logam seberat mungkin dalam satu gerakan angkatan. Atlet bersaing dalam kategori snatch dan clean & jerk, dengan total angkatan terbaik yang menentukan pemenangnya.',
        'venue' => 'Green Forest Hotel',
        'alamat' => 'Jl. Pahlawan, Bondongan, Kec. Bogor Selatan, Kota Bogor',
        'rute' => $venueRutes['Green Forest Hotel'],
    ],
    [
        'slug' => 'angkat-besi',
        'nama' => 'Angkat Besi',
        'logo' => '10.ANGKAT BESI.png',
        'deskripsi' => 'Angkat besi merupakan olahraga kekuatan yang menguji kemampuan atlet mengangkat barbel dari lantai hingga di atas kepala. Dua jenis angkatan utama adalah snatch dan clean & jerk yang dinilai dari teknik serta keberhasilan angkatan.',
        'venue' => 'Green Forest Hotel',
        'alamat' => 'Jl. Pahlawan, Bondongan, Kec. Bogor Selatan, Kota Bogor',
        'rute' => $venueRutes['Green Forest Hotel'],
    ],
    [
        'slug' => 'arung-jeram',
        'nama' => 'Arung Jeram',
        'logo' => '13.ARUNG JERAM.png',
        'deskripsi' => 'Arung jeram adalah olahraga air yang dilakukan dengan perahu karet melewati jeram-jeram sungai berarus deras. Mengutamakan kerja sama tim, kekompakan dayung, dan kemampuan membaca arus untuk melewati lintasan dengan aman dan cepat.',
        'venue' => 'Green Forest Hotel',
        'alamat' => 'Jl. Pahlawan, Bondongan, Kec. Bogor Selatan, Kota Bogor',
        'rute' => $venueRutes['Green Forest Hotel'],
    ],
    [
        'slug' => 'binaraga',
        'nama' => 'Binaraga',
        'logo' => '6.BINARAGA.png',
        'deskripsi' => 'Binaraga adalah olahraga yang menonjolkan estetika otot melalui pembentukan tubuh dengan latihan beban. Penilaian dilakukan berdasarkan kesimetrisan, proporsi, dan kekencangan otot pada pose yang ditampilkan atlet di panggung.',
        'venue' => 'Green Forest Hotel',
        'alamat' => 'Jl. Pahlawan, Bondongan, Kec. Bogor Selatan, Kota Bogor',
        'rute' => $venueRutes['Green Forest Hotel'],
    ],
    [
        'slug' => 'bola-tangan-indoor',
        'nama' => 'Bola Tangan Indoor',
        'logo' => '11.BOLA TANGAN.png',
        'deskripsi' => 'Bola tangan indoor dimainkan oleh dua tim berisi tujuh pemain yang saling melempar, mengoper, dan memasukkan bola ke gawang lawan. Permainan berlangsung cepat di lapangan tertutup dengan aturan langkah yang ketat.',
        'venue' => 'PPSDMAP Kemenhub Kemang',
        'alamat' => 'Jl. Raya Parung–Bogor, Kemang, Kab. Bogor',
        'rute' => $venueRutes['PPSDMAP Kemenhub Kemang'],
    ],
    [
        'slug' => 'bola-tangan-pasir',
        'nama' => 'Bola Tangan Pasir',
        'logo' => '11.BOLA TANGAN.png',
        'deskripsi' => 'Bola tangan pasir dimainkan di lapangan berpasir dengan aturan yang lebih dinamis dan santai. Dengan jumlah pemain yang lebih sedikit dan tempo cepat, olahraga ini menuntut kelincahan serta ketahanan fisik di permukaan pasir.',
        'venue' => 'Padepokan Voli Sentul',
        'alamat' => 'Kawasan Sirkuit Sentul Internasional, Babakan Madang, Kab. Bogor',
        'rute' => $venueRutes['Padepokan Voli Sentul'],
    ],
    [
        'slug' => 'drumband',
        'nama' => 'Drumband',
        'logo' => '24.DRUM BAND.png',
        'deskripsi' => 'Drumband adalah cabang olahraga seni yang memadukan musik perkusi, alat musik tiup, dan koreografi baris-berbaris. Penampilannya menuntut keselarasan ritme, kekompakan formasi, serta disiplin tinggi dari seluruh anggota tim.',
        'venue' => 'GOR Pajajaran Indoor A',
        'alamat' => 'Jl. Pemuda No. 02, Tanah Sareal, Kota Bogor',
        'rute' => $venueRutes['GOR Pajajaran'],
    ],
    [
        'slug' => 'gimnastik-aerobik',
        'nama' => 'Gimnastik Aerobik',
        'logo' => '21.SENAM.png',
        'deskripsi' => 'Gimnastik aerobik menggabungkan gerakan senam dengan musik berirama cepat dan gerakan aerobik kompleks. Atlet dinilai dari kesulitan gerakan, kekuatan, kelenturan, serta sinkronisasi antar atlet.',
        'venue' => 'Sport Jabar Arcamanik',
        'alamat' => 'Jl. Pacuan Kuda, Sukamiskin, Arcamanik, Kota Bandung',
        'rute' => $venueRutes['Sport Jabar Arcamanik'],
    ],
    [
        'slug' => 'gimnastik-artistik',
        'nama' => 'Gimnastik Artistik',
        'logo' => '21.SENAM.png',
        'deskripsi' => 'Gimnastik artistik adalah senam yang menampilkan kekuatan, keseimbangan, dan kelenturan pada alat seperti palang, gelang, kuda-kuda, dan lantai. Nomornya terbagi untuk putra dan putri dengan penilaian pada kesulitan dan eksekusi.',
        'venue' => 'Sport Jabar Arcamanik',
        'alamat' => 'Jl. Pacuan Kuda, Sukamiskin, Arcamanik, Kota Bandung',
        'rute' => $venueRutes['Sport Jabar Arcamanik'],
    ],
    [
        'slug' => 'gimnastik-ritmik',
        'nama' => 'Gimnastik Ritmik',
        'logo' => '21.SENAM.png',
        'deskripsi' => 'Gimnastik ritmik menggabungkan senam dengan alat seperti pita, bola, simpai, dan gada mengikuti musik. Penampilannya menonjolkan keanggunan, fleksibilitas, dan koordinasi gerakan yang selaras dengan irama.',
        'venue' => 'Sport Jabar Arcamanik',
        'alamat' => 'Jl. Pacuan Kuda, Sukamiskin, Arcamanik, Kota Bandung',
        'rute' => $venueRutes['Sport Jabar Arcamanik'],
    ],
    [
        'slug' => 'judo',
        'nama' => 'Judo',
        'logo' => '25.JUDO.png',
        'deskripsi' => 'Judo adalah bela diri asal Jepang yang berfokus pada teknik bantingan dan kuncian untuk menjatuhkan lawan. Pertandingan dimenangkan dengan mendapatkan ippon, waza-ari, atau akumulasi poin teknis, dengan prinsip saling menghormati.',
        'venue' => 'GOR Pajajaran Indoor B',
        'alamat' => 'Jl. Pemuda No. 02, Tanah Sareal, Kota Bogor',
        'rute' => $venueRutes['GOR Pajajaran'],
    ],
    [
        'slug' => 'kurash',
        'nama' => 'Kurash',
        'logo' => '18.KURASH.png',
        'deskripsi' => 'Kurash adalah olahraga gulat tradisional asal Asia Tengah yang bertujuan menjatuhkan lawan dengan teknik bantingan tanpa menyentuh lantai. Berbeda dari judo, kurash melarang teknik menahan atau kuncian di atas matras.',
        'venue' => 'GOR Pajajaran Indoor B',
        'alamat' => 'Jl. Pemuda No. 02, Tanah Sareal, Kota Bogor',
        'rute' => $venueRutes['GOR Pajajaran'],
    ],
    [
        'slug' => 'menembak',
        'nama' => 'Menembak',
        'logo' => '7.MENEMBAK.png',
        'deskripsi' => 'Menembak adalah cabang olahraga akurasi yang menguji ketepatan, kestabilan, dan konsentrasi atlet dalam membidik sasaran. Terdapat berbagai nomor senapan dan pistol pada jarak tertentu dengan sistem skor.',
        'venue' => 'Lapangan Tembak Cisangkan',
        'alamat' => 'Jl. Raya Cisangkan, Padasuka, Cimahi Tengah, Kota Cimahi',
        'rute' => $venueRutes['Lapangan Tembak Cisangkan'],
    ],
    [
        'slug' => 'modern-pentathlon',
        'nama' => 'Modern Pentathlon',
        'logo' => '26.MODERN PENTATHLON.png',
        'deskripsi' => 'Modern pentathlon menggabungkan lima nomor olahraga: anggar, renang, menembak, lari, dan berkuda. Atlet diuji ketangguhannya secara menyeluruh dalam kompetisi yang menuntut keterampilan serba bisa.',
        'venue' => 'Stadion Pajajaran',
        'alamat' => 'Jl. Pemuda No. 02, Tanah Sareal, Kota Bogor',
        'rute' => $venueRutes['GOR Pajajaran'],
    ],
    [
        'slug' => 'panahan',
        'nama' => 'Panahan',
        'logo' => '5.PANAHAN.png',
        'deskripsi' => 'Panahan adalah olahraga akurasi menggunakan busur dan anak panah untuk membidik sasaran pada jarak tertentu. Ketepatan, kestabilan, dan kontrol pernapasan menjadi kunci utama untuk meraih skor terbaik.',
        'venue' => 'Stadion Pajajaran',
        'alamat' => 'Jl. Pemuda No. 02, Tanah Sareal, Kota Bogor',
        'rute' => $venueRutes['GOR Pajajaran'],
    ],
    [
        'slug' => 'panjat-tebing',
        'nama' => 'Panjat Tebing',
        'logo' => '23.PANJAT TEBING.png',
        'deskripsi' => 'Panjat tebing adalah olahraga memanjat dinding atau tebing buatan yang menguji kekuatan, keseimbangan, dan ketahanan. Terdapat nomor speed, boulder, dan lead dengan tingkat kesulitan lintasan yang berbeda-beda.',
        'venue' => 'Stadion Pajajaran',
        'alamat' => 'Jl. Pemuda No. 02, Tanah Sareal, Kota Bogor',
        'rute' => $venueRutes['GOR Pajajaran'],
    ],
    [
        'slug' => 'pencak-silat',
        'nama' => 'Pencak Silat',
        'logo' => '12.PENCAK SILAT.png',
        'deskripsi' => 'Pencak silat adalah seni bela diri tradisional Indonesia yang memadukan gerakan menyerang, bertahan, dan seni gerak. Selain nomor tanding, terdapat kategori seni yang menampilkan keindahan gerakan jurus.',
        'venue' => 'GOR Pajajaran Indoor A',
        'alamat' => 'Jl. Pemuda No. 02, Tanah Sareal, Kota Bogor',
        'rute' => $venueRutes['GOR Pajajaran'],
    ],
    [
        'slug' => 'petanque',
        'nama' => 'Petanque',
        'logo' => '16.PENTAQUE.png',
        'deskripsi' => 'Petanque adalah olahraga lempar bola besi untuk mendekatkan diri ke bola sasaran (jack). Mengutamakan akurasi, strategi, dan ketenangan dalam setiap lemparan di lintasan berpasir.',
        'venue' => 'Green Forest Hotel',
        'alamat' => 'Jl. Pahlawan, Bondongan, Kec. Bogor Selatan, Kota Bogor',
        'rute' => $venueRutes['Green Forest Hotel'],
    ],
    [
        'slug' => 'sambo',
        'nama' => 'Sambo',
        'logo' => '17.SAMBO.png',
        'deskripsi' => 'Sambo adalah seni bela diri asal Rusia yang menggabungkan teknik gulat, bantingan, dan kuncian. Pertandingan dimenangkan dengan menjatuhkan lawan, mendapatkan poin teknis, maupun menyerah karena kuncian.',
        'venue' => 'GOR Pajajaran Indoor B',
        'alamat' => 'Jl. Pemuda No. 02, Tanah Sareal, Kota Bogor',
        'rute' => $venueRutes['GOR Pajajaran'],
    ],
    [
        'slug' => 'shorinji-kempo',
        'nama' => 'Shorinji Kempo',
        'logo' => '15.KEMPO.png',
        'deskripsi' => 'Shorinji kempo adalah seni bela diri asal Jepang yang menekankan keseimbangan teknik serangan dan pertahanan. Latihannya berfokus pada pembentukan karakter dan pertahanan diri dengan gerakan yang efisien.',
        'venue' => 'Gymnasium Sekolah Vokasi IPB',
        'alamat' => 'Jl. Lodaya II, Cilibende, Babakan, Kec. Bogor Tengah, Kota Bogor',
        'rute' => $venueRutes['Gymnasium Sekolah Vokasi IPB'],
    ],
    [
        'slug' => 'ski-air',
        'nama' => 'Ski Air',
        'logo' => '22.SKI AIR.png',
        'deskripsi' => 'Ski air adalah olahraga air yang dilakukan dengan meluncur di atas permukaan air menggunakan papan ski sambil ditarik perahu. Atlet dinilai dari kecepatan, keseimbangan, dan kemampuan melakukan trik di atas air.',
        'venue' => 'Kota Baru Parahyangan',
        'alamat' => 'Padalarang, Kab. Bandung Barat, Jawa Barat',
        'rute' => $venueRutes['Kota Baru Parahyangan'],
    ],
    [
        'slug' => 'taekwondo',
        'nama' => 'Taekwondo',
        'logo' => '9.TAEKWONDO.png',
        'deskripsi' => 'Taekwondo adalah seni bela diri asal Korea yang menonjolkan tendangan tinggi dan teknik serangan cepat. Pertandingan dinilai berdasarkan teknik tendangan dan pukulan yang sah ke sasaran badan dan kepala.',
        'venue' => 'GOR Pajajaran Indoor A',
        'alamat' => 'Jl. Pemuda No. 02, Tanah Sareal, Kota Bogor',
        'rute' => $venueRutes['GOR Pajajaran'],
    ],
    [
        'slug' => 'tarung-derajat',
        'nama' => 'Tarung Derajat',
        'logo' => '19.TARUNG DERAJAT.png',
        'deskripsi' => 'Tarung derajat adalah seni bela diri asal Indonesia yang mengedepankan kekuatan pukulan dan tendangan praktis. Dikenal dengan semboyan "Aku Ramah Bukan Berarti Takut", olahraga ini menekankan refleks dan efisiensi gerakan.',
        'venue' => 'Gymnasium Sekolah Vokasi IPB',
        'alamat' => 'Jl. Lodaya II, Cilibende, Babakan, Kec. Bogor Tengah, Kota Bogor',
        'rute' => $venueRutes['Gymnasium Sekolah Vokasi IPB'],
    ],
    [
        'slug' => 'tenis-meja',
        'nama' => 'Tenis Meja',
        'logo' => '8.TENIS MEJA.png',
        'deskripsi' => 'Tenis meja atau pingpong dimainkan di atas meja dengan bet dan bola kecil. Kecepatan reaksi, kontrol putaran bola, dan strategi menjadi kunci untuk memenangkan pertandingan.',
        'venue' => 'GOR Yasmin Bulutangkis',
        'alamat' => 'Jl. KH. R. Abdullah bin Nuh, Curugmekar, Kec. Bogor Barat, Kota Bogor',
        'rute' => $venueRutes['GOR Yasmin Bulutangkis'],
    ],
];

$kontingens = [
    ['slug' => 'kota-bogor', 'nama' => 'Kota Bogor', 'logo' => 'kota-bogor.png'],
    ['slug' => 'kota-bekasi', 'nama' => 'Kota Bekasi', 'logo' => 'kota-bekasi.png'],
    ['slug' => 'kota-depok', 'nama' => 'Kota Depok', 'logo' => 'kota-depok.png'],
    ['slug' => 'kota-bandung', 'nama' => 'Kota Bandung', 'logo' => 'kota-bandung.png'],
    ['slug' => 'kota-cimahi', 'nama' => 'Kota Cimahi', 'logo' => 'kota-cimahi.png'],
    ['slug' => 'kota-cirebon', 'nama' => 'Kota Cirebon', 'logo' => 'kota-cirebon.png'],
    ['slug' => 'kota-sukabumi', 'nama' => 'Kota Sukabumi', 'logo' => 'kota-sukabumi.png'],
    ['slug' => 'kota-tasikmalaya', 'nama' => 'Kota Tasikmalaya', 'logo' => 'kota-tasikmalaya.png'],
    ['slug' => 'kab-bogor', 'nama' => 'Kabupaten Bogor', 'logo' => 'kab-bogor.png'],
    ['slug' => 'kab-cianjur', 'nama' => 'Kabupaten Cianjur', 'logo' => 'kab-cianjur.png'],
    ['slug' => 'kab-ciamis', 'nama' => 'Kabupaten Ciamis', 'logo' => 'kab-ciamis.png'],
    ['slug' => 'kab-garut', 'nama' => 'Kabupaten Garut', 'logo' => 'kab-garut.png'],
    ['slug' => 'kab-karawang', 'nama' => 'Kabupaten Karawang', 'logo' => 'kab-karawang.png'],
    ['slug' => 'kab-sumedang', 'nama' => 'Kabupaten Sumedang', 'logo' => 'kab-sumedang.png'],
];

$klasemen = [];

$atlets = [];

$rawVideoId = '4vdOCO3KWB0';
$liveStream = [
    'video_id' => preg_match('/^[a-zA-Z0-9_-]{11}$/', $rawVideoId) ? $rawVideoId : '',
    'title' => 'Live Streaming Resmi PORPROV XV Kota Bogor 2026',
];

Route::post('/chatbot', [ChatbotController::class, 'chat'])->middleware('throttle:30,1');

Route::get('/cabor', function () use ($cabors) {
    return view('cabor', compact('cabors'));
});

Route::get('/kontingen', function () use ($kontingens) {
    return view('kontingen', compact('kontingens'));
});

Route::get('/klasemen-medali', function () {
    abort(404);
});

Route::get('/atlet', function () {
    abort(404);
});

Route::get('/live-streaming', function () use ($liveStream) {
    return view('live-streaming', compact('liveStream'));
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

$facilities = [
        ['nama' => 'Zest Hotel Bogor', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Pajajaran No. 27, Babakan, Kec. Bogor Tengah, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '1.2 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Zest%20Hotel%20Bogor%20Jl.%20Pajajaran%20No.%2027%2C%20Babakan%2C%20Kec.%20Bogor%20Tengah%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'The Mirah Hotel Bogor', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Pangrango No. 9A, Babakan, Kec. Bogor Tengah, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '1.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=The%20Mirah%20Hotel%20Bogor%20Jl.%20Pangrango%20No.%209A%2C%20Babakan%2C%20Kec.%20Bogor%20Tengah%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS Salak Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Jend. Sudirman No. 8, Sempur, Kec. Bogor Tengah, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '1.1 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20Salak%20Bogor%20Jl.%20Jend.%20Sudirman%20No.%208%2C%20Sempur%2C%20Kec.%20Bogor%20Tengah%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS PMI Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '2.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20PMI%20Bogor%20Jl.%20Pajajaran%20No.%2080%2C%20Baranangsiang%2C%20Kec.%20Bogor%20Timur%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma Juanda', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Jl. Ir. H. Juanda No. 30, Babakan, Kec. Bogor Tengah, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '2.0 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20Juanda%20Jl.%20Ir.%20H.%20Juanda%20No.%2030%2C%20Babakan%2C%20Kec.%20Bogor%20Tengah%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Bogor Tengah', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Sawojajar No. 38, Pabaton, Kec. Bogor Tengah, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '1.8 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Puskesmas%20Bogor%20Tengah%20Jl.%20Sawojajar%20No.%2038%2C%20Pabaton%2C%20Kec.%20Bogor%20Tengah%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polresta Bogor Kota (Mako Muslihat)', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Kapten Muslihat No. 18, Paledang, Kec. Bogor Tengah, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '2.3 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Polresta%20Bogor%20Kota%20%28Mako%20Muslihat%29%20Jl.%20Kapten%20Muslihat%20No.%2018%2C%20Paledang%2C%20Kec.%20Bogor%20Tengah%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Rumah Makan Ampera Pemuda', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Jl. Pemuda No. 27, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '300 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Rumah%20Makan%20Ampera%20Jl.%20Pemuda%20No.%2027%20Tanah%20Sareal%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'The Sahira Hotel', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. A. Yani No.17-23, RT.02/RW.02, Tanah Sareal, Kota Bogor, Jawa Barat 16161', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '300 m', 'gmaps' => 'https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/The+Sahira+Hotel,+Jl.+A.+Yani+No.17-23,+RT.02%2FRW.02,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/@-6.5764685,106.7978136,17.47z/data=!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c3993958a32d:0x905190fd46d58a74!2m2!1d106.7999397!2d-6.5749112?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'hotel, penginapan', 'website' => '', 'image' => ''],
        ['nama' => 'Key Inn Hotel', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Jend. Sudirman Gg. Lb. Pilar No.40B, RT.01/RW.03, Sempur, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16129', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '900 m', 'gmaps' => 'https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Key+Inn+Hotel+Bogor,+Jl.+Jend.+Sudirman+Gg.+Lb.+Pilar+No.40B,+RT.01%2FRW.03,+Sempur,+Bogor+Tengah,+Bogor+City,+West+Java+16129/@-6.5808268,106.7916117,16z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c58e1bbf04d5:0xd2750d460b939140!2m2!1d106.7970748!2d-6.5835792?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'hotel, penginapan', 'website' => '', 'image' => ''],
        ['nama' => 'RS Azra', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Raya Pajajaran No.219, RT.02/RW.11, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '1.2 km', 'gmaps' => 'https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Rumah+Sakit+Azra+Bogor,+Jl.+Raya+Pajajaran+No.219,+RT.02%2FRW.11,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.57281,106.7976765,16z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c42e35fd5fd3:0x5497922a2532233!2m2!1d106.8074803!2d-6.5793169?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'rawat inap, IGD, poliklinik', 'website' => '', 'image' => ''],
        ['nama' => 'RSIA Pasutri Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Merak No.3, RT.03/RW.06, Tanah Sareal, Kota Bogor, Jawa Barat 16161', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '800 m', 'gmaps' => 'https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/RSIA+Pasutri+Bogor,+CQHX%2BQQR,+Jl.+Merak+No.3,+RT.03%2FRW.06,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/@-6.5739631,106.7927543,16z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c5f7b0de7fd3:0x7ebb0e784df9fa48!2m2!1d106.798903!2d-6.570604?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'rawat inap, IGD, poliklinik', 'website' => '', 'image' => ''],
        ['nama' => 'RS Mulia Pajajaran Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Raya Pajajaran No.98, RT.02/RW.03, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '1.1 km', 'gmaps' => 'https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/RS+Mulia+Pajajaran+Bogor,+Jl.+Raya+Pajajaran+No.98,+RT.02%2FRW.03,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.5798556,106.7822267,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c5f2b4b395cf:0x96f61aa7b6f95871!2m2!1d106.8076464!2d-6.5757867?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'rawat inap, IGD, poliklinik', 'website' => '', 'image' => ''],
        ['nama' => 'Polsek Bogor Utara', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Raya Pajajaran No.26, RT.05/RW.10, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '1.1 km', 'gmaps' => 'https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Polsek+Bogor+Utara,+Jl.+Raya+Pajajaran+No.26,+RT.05%2FRW.10,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.5845962,106.7915827,15z/data=!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c5e2ccc27bef:0x95860988a497f417!2m2!1d106.8068179!2d-6.579187?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Mall Jambu Dua', 'tipe' => 'mall', 'tipe_label' => 'Mall', 'alamat' => 'Jl. A. Yani No.1, RT.01/RW.06, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '1.5 km', 'gmaps' => 'https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Jambu+Dua,+Jl.+A.+Yani+No.1,+RT.01%2FRW.06,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.5716908,106.7976765,16z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c55b908dacfb:0x6e2c85a178aa83f8!2m2!1d106.8079468!2d-6.569317?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'pusat perbelanjaan, food court', 'website' => '', 'image' => ''],
        ['nama' => 'ASTON Bogor Hotel & Resort', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Mulyaharja, Kec. Bogor Selatan, Kota Bogor', 'venue' => 'Green Forest Hotel', 'jarak' => '1.8 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=ASTON%20Bogor%20Hotel%20%26%20Resort%20Mulyaharja%2C%20Kec.%20Bogor%20Selatan%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Padodi Hotel', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Soemanta Diredja No. 10, Pamoyanan, Kec. Bogor Selatan', 'venue' => 'Green Forest Hotel', 'jarak' => '1.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Padodi%20Hotel%20Jl.%20Soemanta%20Diredja%20No.%2010%2C%20Pamoyanan%2C%20Kec.%20Bogor%20Selatan', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS Melania Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Pahlawan No. 91, Bondongan, Kec. Bogor Selatan', 'venue' => 'Green Forest Hotel', 'jarak' => '2.8 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20Melania%20Bogor%20Jl.%20Pahlawan%20No.%2091%2C%20Bondongan%2C%20Kec.%20Bogor%20Selatan', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma Pahlawan', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Jl. Pahlawan No. 40, Batutulis, Kec. Bogor Selatan', 'venue' => 'Green Forest Hotel', 'jarak' => '2.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20Pahlawan%20Jl.%20Pahlawan%20No.%2040%2C%20Batutulis%2C%20Kec.%20Bogor%20Selatan', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Cipaku', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Rangga Gading, Cipaku, Kec. Bogor Selatan', 'venue' => 'Green Forest Hotel', 'jarak' => '2.1 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Puskesmas%20Cipaku%20Jl.%20Rangga%20Gading%2C%20Cipaku%2C%20Kec.%20Bogor%20Selatan', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polsek Bogor Selatan', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Layung Sari No. 1, Empang, Kec. Bogor Selatan', 'venue' => 'Green Forest Hotel', 'jarak' => '2.6 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Polsek%20Bogor%20Selatan%20Jl.%20Layung%20Sari%20No.%201%2C%20Empang%2C%20Kec.%20Bogor%20Selatan', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Resto Kampoeng Konsep', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Jl. Soemanta Diredja No. 28, Pamoyanan, Kec. Bogor Selatan', 'venue' => 'Green Forest Hotel', 'jarak' => '400 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Resto%20Kampoeng%20Konsep%20Pamoyanan%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'The Jungle Water Park', 'tipe' => 'rekreasi', 'tipe_label' => 'Rekreasi', 'alamat' => 'Jl. Bogor Nirwana Boulevard, Perumahan Bogor Nirwana Residence, Mulyaharja, Kec. Bogor Selatan, Kota Bogor', 'venue' => 'Green Forest Hotel', 'jarak' => '4.5 km', 'gmaps' => 'https://www.google.com/maps/dir/Green+Forest+Bogor,+Jl.+RE.+Soemantadiredja+No.99,+RT.03%2FRW.12,+Pamoyanan,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16136/The+Jungle+Waterpark+Bogor,+Perumahan,+Jl.+Bogor+Nirwana+Residence+Jl.+Bukit+Nirwana+Raya,+RT.05%2FRW.12,+Mulyaharja,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16132/@-6.6438986,106.7893085,15z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69cf4fde33c0b3:0x70889815f5e23386!2m2!1d106.806108!2d-6.6494907!1m5!1m1!1s0x2e69cf5deba619f3:0x485a13f031e8b904!2m2!1d106.7949215!2d-6.6344794?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'waterpark, wahana air, arena bermain', 'website' => '', 'image' => ''],
        ['nama' => 'Mall BTM', 'tipe' => 'mall', 'tipe_label' => 'Mall', 'alamat' => 'Jl. Ir. H. Juanda No.68, RT.01/RW.13, Paledang, Kec. Bogor Tengah, Kota Bogor, Jawa Barat 16122', 'venue' => 'Green Forest Hotel', 'jarak' => '6.6 km', 'gmaps' => 'https://www.google.com/maps/dir/Green+Forest+Bogor,+Jl.+RE.+Soemantadiredja+No.99,+RT.03%2FRW.12,+Pamoyanan,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16136/Mall+BTM+Bogor,+Jl.+Ir.+H.+Juanda+No.68,+RT.01%2FRW.13,+Paledang,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16122/@-6.6254957,106.7846035,14z/data=!3m2!4b1!5s0x2e69c5c08b54d0b5:0x45125fa3ca6c7203!4m13!4m12!1m5!1m1!1s0x2e69cf4fde33c0b3:0x70889815f5e23386!2m2!1d106.806108!2d-6.6494907!1m5!1m1!1s0x2e69c5b6757d7817:0x82ab1619188f430e!2m2!1d106.7952921!2d-6.6050687?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '+62 822-2772-2296', 'layanan' => 'pusat perbelanjaan, food court, bioskop', 'website' => '', 'image' => ''],
        ['nama' => 'RS VANIA', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Siliwangi No.11, RT.01/RW.03, Sukasari, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16142', 'venue' => 'Green Forest Hotel', 'jarak' => '4 km', 'gmaps' => 'https://www.google.com/maps/dir/Green+Forest+Bogor,+Jl.+RE.+Soemantadiredja+No.99,+RT.03%2FRW.12,+Pamoyanan,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16136/RUMAH+SAKIT+VANIA,+Jl.+Siliwangi+No.11,+RT.01%2FRW.03,+Sukasari,+Kec.+Bogor+Tim.,+Kota+Bogor,+Jawa+Barat+16142/@-6.6296626,106.7838324,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69cf4fde33c0b3:0x70889815f5e23386!2m2!1d106.806108!2d-6.6494907!1m5!1m1!1s0x2e69c5e5dbfe64e7:0x8273af2732cab4e2!2m2!1d106.8078123!2d-6.6131137?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'rawat inap, IGD, poliklinik', 'website' => '', 'image' => ''],
        ['nama' => 'RS UMMI', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Empang II No.2, RT.04/RW.02, Empang, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16132', 'venue' => 'Green Forest Hotel', 'jarak' => '4.5 km', 'gmaps' => 'https://www.google.com/maps/dir/Green+Forest+Bogor,+Jl.+RE.+Soemantadiredja+No.99,+RT.03%2FRW.12,+Pamoyanan,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16136/RS+UMMI,+Jl.+Empang+II+No.2,+RT.04%2FRW.02,+Empang,+Kec.+Bogor+Sel.,+Kota+Bogor,+Jawa+Barat+16132/@-6.62865,106.7828612,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69cf4fde33c0b3:0x70889815f5e23386!2m2!1d106.806108!2d-6.6494907!1m5!1m1!1s0x2e69c5668d0c8dbb:0x6663382e4fa5d02a!2m2!1d106.7945423!2d-6.6086429?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'rawat inap, IGD, poliklinik', 'website' => '', 'image' => ''],
        ['nama' => 'IPB Hotel & Convention Centre', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Botani Square, Jl. Pajajaran, Baranangsiang', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '2.8 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=IPB%20Hotel%20%26%20Convention%20Centre%20Botani%20Square%2C%20Jl.%20Pajajaran%2C%20Baranangsiang', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS PMI Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '2.2 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20PMI%20Bogor%20Jl.%20Pajajaran%20No.%2080%2C%20Baranangsiang%2C%20Kec.%20Bogor%20Timur', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS Azra', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Raya Pajajaran No.219, RT.02/RW.11, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '1.9 km', 'gmaps' => 'https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Rumah+Sakit+Azra+Bogor,+Jl.+Raya+Pajajaran+No.219,+RT.02%2FRW.11,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.57281,106.7976765,16z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c42e35fd5fd3:0x5497922a2532233!2m2!1d106.8074803!2d-6.5793169?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma Pajajaran', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Jl. Pajajaran No. 35, Babakan, Kec. Bogor Tengah', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '1.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20Pajajaran%20Jl.%20Pajajaran%20No.%2035%2C%20Babakan%2C%20Kec.%20Bogor%20Tengah', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Bogor Utara', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Tegal Gundil, Kec. Bogor Utara', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '1.9 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Puskesmas%20Bogor%20Utara%20Jl.%20Tegal%20Gundil%2C%20Kec.%20Bogor%20Utara', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polsek Bogor Utara', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Raya Pajajaran No.26, RT.05/RW.10, Bantarjati, Kec. Bogor Utara, Kota Bogor, Jawa Barat 16153', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '1.9 km', 'gmaps' => 'https://www.google.com/maps/dir/Gor+pajajaran,+CQFX%2B99C,+RT.04%2FRW.01,+Tanah+Sareal,+Kota+Bogor,+Jawa+Barat+16161/Polsek+Bogor+Utara,+Jl.+Raya+Pajajaran+No.26,+RT.05%2FRW.10,+Bantarjati,+Kec.+Bogor+Utara,+Kota+Bogor,+Jawa+Barat+16153/@-6.5845962,106.7915827,15z/data=!4m13!4m12!1m5!1m1!1s0x2e69c5000cee40ab:0xa412bd10cefea370!2m2!1d106.7983925!2d-6.5765742!1m5!1m1!1s0x2e69c5e2ccc27bef:0x95860988a497f417!2m2!1d106.8068179!2d-6.579187?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Toko Adelways (Kantin IPB Cilibende)', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Jl. Cilibende, Babakan, Kec. Bogor Tengah', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '250 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Toko%20Adelways%20Jl.%20Cilibende%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Swiss-Belhotel Bogor', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Salak No.38-40, RT.03/RW.04, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16129', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '500 m', 'gmaps' => 'https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Swiss-Belhotel+Bogor,+Jl.+Salak+No.38-40,+RT.03%2FRW.04,+Babakan,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16129/@-6.5889391,106.8019192,18z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5cd17948f23:0xcc8d353aabd8f8c3!2m2!1d106.8041729!2d-6.5889394?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'hotel, penginapan', 'website' => '', 'image' => ''],
        ['nama' => 'RS Siloam Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Raya Pajajaran No.27, RT.01/RW.04, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '1.0 km', 'gmaps' => 'https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Siloam+Hospitals+Bogor,+Jl.+Raya+Pajajaran+No.27,+RT.01%2FRW.04,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/@-6.5956616,106.7956764,16z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5cfedf6086d:0x64de2ab6cd78dce4!2m2!1d106.8046881!2d-6.5956638?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'rawat inap, IGD, poliklinik', 'website' => '', 'image' => ''],
        ['nama' => 'Mall Botani Square Bogor', 'tipe' => 'mall', 'tipe_label' => 'Mall', 'alamat' => 'Jl. Raya Pajajaran No.40, RT.04/RW.05, Tugu Kujang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16127', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '1.5 km', 'gmaps' => 'https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Botani+Square,+Jl.+Raya+Pajajaran+No.40,+RT.04%2FRW.05,+Tugu+Kujang,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16127/@-6.6014327,106.7943125,15z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5c5287d2ae7:0x9edb391e7c74be19!2m2!1d106.8069032!2d-6.6014292?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'pusat perbelanjaan, food court, bioskop', 'website' => '', 'image' => ''],
        ['nama' => 'Kebun Raya Bogor', 'tipe' => 'rekreasi', 'tipe_label' => 'Rekreasi', 'alamat' => 'Jl. Otto Iskandardinata No.13, Paledang, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16122', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '1.4 km', 'gmaps' => 'https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Kebun+Raya+Bogor,+Jl.+Otto+Iskandardinata+No.13,+Paledang,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16122/@-6.5976279,106.7815411,15z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5c412a67abb:0x75f23c6b45a37ee5!2m2!1d106.7995698!2d-6.5976289?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'kebun botani, wisata alam, sejarah', 'website' => '', 'image' => ''],
        ['nama' => 'Lapangan Sempur Bogor', 'tipe' => 'rekreasi', 'tipe_label' => 'Rekreasi', 'alamat' => 'CR52+99J, Jl. Sempur, RT.02/RW.01, Sempur, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16129', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '1.0 km', 'gmaps' => 'https://www.google.com/maps/dir/Gymnasium+Sekolah+Vokasi+IPB,+CR65%2B76H,+Jl.+Lodaya+II,+RT.03%2FRW.05,+Cilibende,+Babakan,+Bogor+Tengah,+Bogor+City,+West+Java+16128/Lapangan+Sempur+Bogor,+CR52%2B99J,+Jl.+Sempur,+RT.02%2FRW.01,+Sempur,+Kecamatan+Bogor+Tengah,+Kota+Bogor,+Jawa+Barat+16129/@-6.5915343,106.7963791,17z/data=!3m1!5s0x2e69c4243e4284af:0xde1c35e312f243b7!4m13!4m12!1m5!1m1!1s0x2e69c500578948bd:0xf1a58274d6edbc5a!2m2!1d106.8078532!2d-6.5889797!1m5!1m1!1s0x2e69c5cb9987d027:0xdc1330b7afd8d1b7!2m2!1d106.8008852!2d-6.591534?entry=ttu&g_ep=EgoyMDI2MDgzMS4wIKXMDSoASAFQAw%3D%3D', 'telepon' => '-', 'layanan' => 'lapangan olahraga, jogging track', 'website' => '', 'image' => ''],
        ['nama' => 'WHIZ Prime Hotel Bogor Yasmin', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. KH. R. Abdullah Bin Nuh No. 33, Curugmekar', 'venue' => 'GOR Yasmin Bulutangkis', 'jarak' => '600 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=WHIZ%20Prime%20Hotel%20Bogor%20Yasmin%20Jl.%20KH.%20R.%20Abdullah%20Bin%20Nuh%20No.%2033%2C%20Curugmekar', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Swiss-Belcourt Bogor', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. KH. R. Abdullah Bin Nuh No. 27, Bukit Cimanggu City', 'venue' => 'GOR Yasmin Bulutangkis', 'jarak' => '1.2 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Swiss-Belcourt%20Bogor%20Jl.%20KH.%20R.%20Abdullah%20Bin%20Nuh%20No.%2027%2C%20Bukit%20Cimanggu%20City', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS Hermina Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. KH. R. Abdullah Bin Nuh No. E2, Hermina Grand Yasmin', 'venue' => 'GOR Yasmin Bulutangkis', 'jarak' => '900 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20Hermina%20Bogor%20Jl.%20KH.%20R.%20Abdullah%20Bin%20Nuh%20No.%20E2%2C%20Hermina%20Grand%20Yasmin', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS Islam Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Perdana No. 22, Budi Agung, Tanahsareal', 'venue' => 'GOR Yasmin Bulutangkis', 'jarak' => '2.0 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20Islam%20Bogor%20Jl.%20Perdana%20No.%2022%2C%20Budi%20Agung%2C%20Tanahsareal', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma Yasmin', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Ruko Taman Yasmin Sektor VI No. 108, Curugmekar', 'venue' => 'GOR Yasmin Bulutangkis', 'jarak' => '500 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20Yasmin%20Ruko%20Taman%20Yasmin%20Sektor%20VI%20No.%20108%2C%20Curugmekar', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Gang Kelor', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Raya Curug No. 12, Curugmekar, Kec. Bogor Barat', 'venue' => 'GOR Yasmin Bulutangkis', 'jarak' => '1.4 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Puskesmas%20Gang%20Kelor%20Jl.%20Raya%20Curug%20No.%2012%2C%20Curugmekar%2C%20Kec.%20Bogor%20Barat', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polsek Tanah Sareal', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Seremped, Kedung Badak, Kec. Tanah Sareal', 'venue' => 'GOR Yasmin Bulutangkis', 'jarak' => '2.4 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Polsek%20Tanah%20Sareal%20Jl.%20Seremped%2C%20Kedung%20Badak%2C%20Kec.%20Tanah%20Sareal', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Rumah Makan Ampera Yasmin', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Jl. KH. R. Abdullah Bin Nuh No. 37, Curugmekar', 'venue' => 'GOR Yasmin Bulutangkis', 'jarak' => '350 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Rumah%20Makan%20Ampera%20Yasmin%20Jl.%20KH.%20R.%20Abdullah%20Bin%20Nuh%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Salak Sunset Hotel', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Raya Kemang Parung No. 12, Kemang', 'venue' => 'PPSDMAP Kemenhub Kemang Kab-Bogor', 'jarak' => '2.1 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Salak%20Sunset%20Hotel%20Jl.%20Raya%20Kemang%20Parung%20No.%2012%2C%20Kemang', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS Sentosa Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Raya Kemang No. 18, Kemang, Kab. Bogor', 'venue' => 'PPSDMAP Kemenhub Kemang Kab-Bogor', 'jarak' => '1.3 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20Sentosa%20Bogor%20Jl.%20Raya%20Kemang%20No.%2018%2C%20Kemang%2C%20Kab.%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma Kemang', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Jl. Raya Parung-Bogor, Kemang, Kab. Bogor', 'venue' => 'PPSDMAP Kemenhub Kemang Kab-Bogor', 'jarak' => '800 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20Kemang%20Jl.%20Raya%20Parung-Bogor%2C%20Kemang%2C%20Kab.%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Kemang', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Raya Kemang No. 5, Kemang, Kab. Bogor', 'venue' => 'PPSDMAP Kemenhub Kemang Kab-Bogor', 'jarak' => '1.1 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Puskesmas%20Kemang%20Jl.%20Raya%20Kemang%20No.%205%2C%20Kemang%2C%20Kab.%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polsek Kemang', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Raya Kemang Parung No. 10, Kemang, Kab. Bogor', 'venue' => 'PPSDMAP Kemenhub Kemang Kab-Bogor', 'jarak' => '1.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Polsek%20Kemang%20Jl.%20Raya%20Kemang%20Parung%20No.%2010%2C%20Kemang%2C%20Kab.%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RM Ayam Goreng Bakar Sayati', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Jl. Raya Parung - Bogor, Semplak Barat, Kemang', 'venue' => 'PPSDMAP Kemenhub Kemang Kab-Bogor', 'jarak' => '450 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Ayam%20Goreng%20Bakar%20Sayati%20Kemang%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Lorin Sentul Hotel', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Kawasan Sirkuit Sentul Internasional, Babakan Madang', 'venue' => 'Padepokan Voli Sentul', 'jarak' => '1.2 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Lorin%20Sentul%20Hotel%20Kawasan%20Sirkuit%20Sentul%20Internasional%2C%20Babakan%20Madang', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Harris Hotel Sentul City', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Jend. Sudirman, Sentul City, Babakan Madang', 'venue' => 'Padepokan Voli Sentul', 'jarak' => '2.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Harris%20Hotel%20Sentul%20City%20Jl.%20Jend.%20Sudirman%2C%20Sentul%20City%2C%20Babakan%20Madang', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS EMC Sentul', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. MH. Thamrin No. 57, Sentul City, Babakan Madang', 'venue' => 'Padepokan Voli Sentul', 'jarak' => '2.7 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20EMC%20Sentul%20Jl.%20MH.%20Thamrin%20No.%2057%2C%20Sentul%20City%2C%20Babakan%20Madang', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma Sentul City', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Ruko Plaza Niaga 1, Sentul City', 'venue' => 'Padepokan Voli Sentul', 'jarak' => '2.3 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20Sentul%20City%20Ruko%20Plaza%20Niaga%201%2C%20Sentul%20City', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Babakan Madang', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Raya Sentul No. 1, Babakan Madang', 'venue' => 'Padepokan Voli Sentul', 'jarak' => '2.0 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Puskesmas%20Babakan%20Madang%20Jl.%20Raya%20Sentul%20No.%201%2C%20Babakan%20Madang', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polsek Babakan Madang', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Raya Babakan Madang No. 8, Kab. Bogor', 'venue' => 'Padepokan Voli Sentul', 'jarak' => '2.2 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Polsek%20Babakan%20Madang%20Jl.%20Raya%20Babakan%20Madang%20No.%208%2C%20Kab.%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Restoran Lorin Sentul', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Kawasan Sirkuit Sentul Internasional, Babakan Madang', 'venue' => 'Padepokan Voli Sentul', 'jarak' => '1.2 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Restoran%20Lorin%20Sentul%20Hotel%20Babakan%20Madang', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Bobocabin Gunung Mas', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Gunung Mas, Jl. Raya Puncak Gadog No. KM 87, Cisarua', 'venue' => 'Gunung Mas (Cisarua)', 'jarak' => '300 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Bobocabin%20Gunung%20Mas%20Gunung%20Mas%2C%20Jl.%20Raya%20Puncak%20Gadog%20No.%20KM%2087%2C%20Cisarua', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Grand Diara Hotel Puncak', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Raya Puncak - Gadog KM 77, Cisarua', 'venue' => 'Gunung Mas (Cisarua)', 'jarak' => '2.9 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Grand%20Diara%20Hotel%20Puncak%20Jl.%20Raya%20Puncak%20-%20Gadog%20KM%2077%2C%20Cisarua', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RSPG Cisarua (RS Paru Dr. M. Goenawan)', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Raya Puncak No. KM 83, Cisarua, Kab. Bogor', 'venue' => 'Gunung Mas (Cisarua)', 'jarak' => '1.8 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RSPG%20Cisarua%20%28RS%20Paru%20Dr.%20M.%20Goenawan%29%20Jl.%20Raya%20Puncak%20No.%20KM%2083%2C%20Cisarua%2C%20Kab.%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma Cisarua', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Jl. Raya Puncak No. 412, Cisarua, Kab. Bogor', 'venue' => 'Gunung Mas (Cisarua)', 'jarak' => '1.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20Cisarua%20Jl.%20Raya%20Puncak%20No.%20412%2C%20Cisarua%2C%20Kab.%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Cisarua', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Raya Puncak No. KM 81, Cisarua, Kab. Bogor', 'venue' => 'Gunung Mas (Cisarua)', 'jarak' => '2.1 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Puskesmas%20Cisarua%20Jl.%20Raya%20Puncak%20No.%20KM%2081%2C%20Cisarua%2C%20Kab.%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polsek Cisarua', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Raya Puncak KM 82, Cisarua, Kab. Bogor', 'venue' => 'Gunung Mas (Cisarua)', 'jarak' => '2.3 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Polsek%20Cisarua%20Jl.%20Raya%20Puncak%20KM%2082%2C%20Cisarua%2C%20Kab.%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Resto Agrowisata Gunung Mas', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Kawasan Agrowisata Gunung Mas, Tugu Selatan, Cisarua', 'venue' => 'Gunung Mas (Cisarua)', 'jarak' => '200 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Resto%20Agrowisata%20Gunung%20Mas%20Cisarua', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Hotel Trikarya Cimahi', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Raya Cisangkan No. 88, Padasuka, Cimahi Tengah', 'venue' => 'Lapangan Tembak Cisangkan', 'jarak' => '800 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Hotel%20Trikarya%20Cimahi%20Jl.%20Raya%20Cisangkan%20No.%2088%2C%20Padasuka%2C%20Cimahi%20Tengah', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS Dustira Cimahi', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Dr. Dustira No. 1, Baros, Cimahi Tengah', 'venue' => 'Lapangan Tembak Cisangkan', 'jarak' => '2.1 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20Dustira%20Cimahi%20Jl.%20Dr.%20Dustira%20No.%201%2C%20Baros%2C%20Cimahi%20Tengah', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma Cisangkan', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Jl. Raya Cisangkan No. 12, Padasuka, Cimahi Tengah', 'venue' => 'Lapangan Tembak Cisangkan', 'jarak' => '400 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20Cisangkan%20Jl.%20Raya%20Cisangkan%20No.%2012%2C%20Padasuka%2C%20Cimahi%20Tengah', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Cimahi Tengah', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Raden Demang Hardjakusumah No. 1, Cimahi', 'venue' => 'Lapangan Tembak Cisangkan', 'jarak' => '1.6 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Puskesmas%20Cimahi%20Tengah%20Jl.%20Raden%20Demang%20Hardjakusumah%20No.%201%2C%20Cimahi', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polres Cimahi', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Raya Cibeureum No. 1, Cimahi Selatan', 'venue' => 'Lapangan Tembak Cisangkan', 'jarak' => '2.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Polres%20Cimahi%20Jl.%20Raya%20Cibeureum%20No.%201%2C%20Cimahi%20Selatan', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RM Ampera Cisangkan', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Jl. Raya Barat No. 805, Padasuka, Cimahi Tengah', 'venue' => 'Lapangan Tembak Cisangkan', 'jarak' => '350 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RM%20Ampera%20Cisangkan%20Jl.%20Raya%20Barat%20No.%20805%20Cimahi', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Grand Cordela Hotel Bandung', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Soekarno-Hatta No. 791, Cisaranten Endah, Arcamanik', 'venue' => 'Arcamanik', 'jarak' => '2.4 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Grand%20Cordela%20Hotel%20Bandung%20Jl.%20Soekarno-Hatta%20No.%20791%2C%20Cisaranten%20Endah%2C%20Arcamanik', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS Hermina Arcamanik', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. A.H. Nasution No. 50, Antapani, Bandung', 'venue' => 'Arcamanik', 'jarak' => '1.7 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20Hermina%20Arcamanik%20Jl.%20A.H.%20Nasution%20No.%2050%2C%20Antapani%2C%20Bandung', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma Arcamanik', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Jl. Arcamanik Endah No. 42, Sukamiskin, Arcamanik', 'venue' => 'Arcamanik', 'jarak' => '600 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20Arcamanik%20Jl.%20Arcamanik%20Endah%20No.%2042%2C%20Sukamiskin%2C%20Arcamanik', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Arcamanik', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Cisaranten Kulon No. 4, Arcamanik, Bandung', 'venue' => 'Arcamanik', 'jarak' => '1.1 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Puskesmas%20Arcamanik%20Jl.%20Cisaranten%20Kulon%20No.%204%2C%20Arcamanik%2C%20Bandung', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polsek Arcamanik', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Pacuan Kuda No. 54, Sukamiskin, Arcamanik', 'venue' => 'Arcamanik', 'jarak' => '800 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Polsek%20Arcamanik%20Jl.%20Pacuan%20Kuda%20No.%2054%2C%20Sukamiskin%2C%20Arcamanik', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RM Khas Sunda Cibiuk Arcamanik', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Jl. Soekarno Hatta No. 741, Cisaranten Endah, Arcamanik', 'venue' => 'Arcamanik', 'jarak' => '1.8 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RM%20Khas%20Sunda%20Cibiuk%20Soekarno%20Hatta%20Arcamanik%20Bandung', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Mason Pine Hotel', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Raya Kotabaru Parahyangan, Cipeundeuy, Padalarang', 'venue' => 'Kota Baru Parahyangan', 'jarak' => '500 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Mason%20Pine%20Hotel%20Jl.%20Raya%20Kotabaru%20Parahyangan%2C%20Cipeundeuy%2C%20Padalarang', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS Cahya Kawaluyan', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Raya Parahyangan KM 1.5, Padalarang, Bandung Barat', 'venue' => 'Kota Baru Parahyangan', 'jarak' => '1.2 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20Cahya%20Kawaluyan%20Jl.%20Raya%20Parahyangan%20KM%201.5%2C%20Padalarang%2C%20Bandung%20Barat', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma KBP', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Ruko Bumi Simpang, Kota Baru Parahyangan', 'venue' => 'Kota Baru Parahyangan', 'jarak' => '800 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20KBP%20Ruko%20Bumi%20Simpang%2C%20Kota%20Baru%20Parahyangan', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Padalarang', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Raya Padalarang No. 470, Bandung Barat', 'venue' => 'Kota Baru Parahyangan', 'jarak' => '2.8 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Puskesmas%20Padalarang%20Jl.%20Raya%20Padalarang%20No.%20470%2C%20Bandung%20Barat', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polsek Padalarang', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Raya Padalarang No. 501, Bandung Barat', 'venue' => 'Kota Baru Parahyangan', 'jarak' => '2.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Polsek%20Padalarang%20Jl.%20Raya%20Padalarang%20No.%20501%2C%20Bandung%20Barat', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Bumi Aki Kota Baru Parahyangan', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Jl. Parahyangan Raya No. 1, Kota Baru Parahyangan', 'venue' => 'Kota Baru Parahyangan', 'jarak' => '600 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Bumi%20Aki%20Kota%20Baru%20Parahyangan%20Padalarang', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Fitra Hotel Majalengka', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. KH. Abdul Halim No. 88, Majalengka Kulon', 'venue' => 'Majalengka', 'jarak' => '1.1 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Fitra%20Hotel%20Majalengka%20Jl.%20KH.%20Abdul%20Halim%20No.%2088%2C%20Majalengka%20Kulon', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RSUD Majalengka', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Kesehatan No. 77, Majalengka Wetan', 'venue' => 'Majalengka', 'jarak' => '1.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RSUD%20Majalengka%20Jl.%20Kesehatan%20No.%2077%2C%20Majalengka%20Wetan', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma Majalengka', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Jl. KH. Abdul Halim No. 120, Majalengka', 'venue' => 'Majalengka', 'jarak' => '900 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20Majalengka%20Jl.%20KH.%20Abdul%20Halim%20No.%20120%2C%20Majalengka', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Majalengka', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. KH. Abdul Halim No. 200, Majalengka', 'venue' => 'Majalengka', 'jarak' => '1.3 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=%20%20%20Jl.%20KH.%20Abdul%20Halim%20No.%20200%2C%20Majalengka', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polres Majalengka', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. KH. Abdul Halim No. 512, Majalengka', 'venue' => 'Majalengka', 'jarak' => '2.0 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Polres%20Majalengka%20Jl.%20KH.%20Abdul%20Halim%20No.%20512%2C%20Majalengka', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RM Khas Sunda Saung Balong', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Jl. KH. Abdul Halim No. 160, Majalengka Wetan', 'venue' => 'Majalengka', 'jarak' => '700 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Saung%20Balong%20Jl.%20KH.%20Abdul%20Halim%20Majalengka', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'PO Kerub Pariwisata Indonesia', 'tipe' => 'transport', 'tipe_label' => 'Sewa Kendaraan', 'alamat' => 'SPBU 34-16113 Cemplang, Jl. Brigadir Jenderal H Saptadji Hadiprawira, RT.01/RW.09, Cilendek Bar., Kec. Bogor Bar., Kota Bogor, Jawa Barat 16113', 'venue' => 'Kota Bogor', 'jarak' => 'Kota Bogor', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=PO+Kerub+Pariwisata+Indonesia+Bogor', 'telepon' => '+62 822-9992-8709 (Ade)', 'layanan' => 'sewa kendaraan', 'website' => '', 'image' => ''],
        ['nama' => 'PO. Midas Transportasi', 'tipe' => 'transport', 'tipe_label' => 'Sewa Kendaraan', 'alamat' => 'Ruko Pinus Niaga No. 51, Pine Forest, Sentul City, Bogor', 'venue' => 'Sentul City', 'jarak' => 'Sentul City', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=PO+Midas+Transportasi+Sentul+City+Bogor', 'telepon' => '+62 878-7223-3106 (Midas)', 'layanan' => 'sewa kendaraan', 'website' => '', 'image' => ''],
        ['nama' => 'PO. Bin Ilyas Pariwisata', 'tipe' => 'transport', 'tipe_label' => 'Sewa Kendaraan', 'alamat' => 'Jl. Karadenan No.39, Karadenan, Cibinong, Kabupaten Bogor, Jawa Barat 16913', 'venue' => 'Cibinong', 'jarak' => 'Cibinong', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=PO+Bin+Ilyas+Pariwisata+Cibinong+Bogor', 'telepon' => '+62 877-8100-9726 (Bin Ilyas)', 'layanan' => 'sewa kendaraan', 'website' => '', 'image' => ''],
        ['nama' => 'Syafa Tour and Travel Bogor', 'tipe' => 'transport', 'tipe_label' => 'Sewa Kendaraan', 'alamat' => 'RT.03/RW.19, Katulampa, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16144', 'venue' => 'Kota Bogor', 'jarak' => 'Kota Bogor', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Syafa+Tour+and+Travel+Bogor+Katulampa', 'telepon' => '+62 838-1904-1575 (Endang)', 'layanan' => 'sewa kendaraan', 'website' => '', 'image' => ''],
        ['nama' => 'PO. AdisaPutro Trans', 'tipe' => 'transport', 'tipe_label' => 'Sewa Kendaraan', 'alamat' => 'Jl. Raya Cifor No. 14 RT 03/RW 08 Bubulak, Bogor Barat, Kota Bogor', 'venue' => 'Kota Bogor', 'jarak' => 'Kota Bogor', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=PO+AdisaPutro+Trans+Bubulak+Bogor', 'telepon' => '+62 857-7496-7369 (Rusli)', 'layanan' => 'sewa kendaraan', 'website' => '', 'image' => ''],
        ['nama' => 'PT. Surya Harapan Perdana (PasteurTrans)', 'tipe' => 'transport', 'tipe_label' => 'Sewa Kendaraan', 'alamat' => 'Jl. R. Saleh S. Bustaman No.15, RT.01/RW.11, Empang, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16132', 'venue' => 'Kota Bogor', 'jarak' => 'Kota Bogor', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=PT+Surya+Harapan+Perdana+PasteurTrans+Empang+Bogor', 'telepon' => '+62 823-2224-9794', 'layanan' => 'sewa kendaraan', 'website' => '', 'image' => ''],
        ['nama' => 'Master Tour & Travel', 'tipe' => 'transport', 'tipe_label' => 'Sewa Kendaraan', 'alamat' => 'Jl. Raya Cipaku No.21, RT.03/RW.01, Cipaku, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16133', 'venue' => 'Kota Bogor', 'jarak' => 'Kota Bogor', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Master+Tour+%26+Travel+Cipaku+Bogor', 'telepon' => '+62 857-1463-4597 (Wawang)', 'layanan' => 'sewa kendaraan', 'website' => '', 'image' => ''],
        ['nama' => 'IKIGAI Fitness', 'tipe' => 'rekreasi', 'tipe_label' => 'Fitness', 'alamat' => 'IKIGAI Ekalos, Gedung Plaza Ekalos, Jl. Siliwangi, RW.04, Sukasari, Bogor', 'venue' => ['GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'Green Forest Hotel', 'Gymnasium Sekolah Vokasi IPB', 'GOR Yasmin Bulutangkis', 'PPSDMAP Kemenhub Kemang Kab-Bogor', 'Padepokan Voli Sentul'], 'jarak' => '-', 'gmaps' => 'https://www.google.com/maps/place/IKIGAI+FITNESS+-+Lippo+Plaza+Ekalokasari+Bogor/@-6.6216624,106.8144763,17z/data=!3m2!4b1!5s0x2e69c5fdf77397b5:0x881f18442bc0f864!4m6!3m5!1s0x2e69c5d5719e94ab:0x8c6b0ea36866c2e6!8m2!3d-6.6216624!4d106.8170512!16s%2Fg%2F11stp2j67s?entry=ttu&g_ep=EgoyMDI2MDgwNS4xIKXMDSoASAFQAw%3D%3D', 'layanan' => 'fitness, buka pukul 06:00-21:00', 'website' => '', 'image' => ''],
    ];

$stats = [
    'total' => count($facilities),
    'rs' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'rs')),
    'puskesmas' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'puskesmas')),
    'apotek' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'apotek')),
    'hotel' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'hotel')),
    'polsek' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'polsek')),
    'restoran' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'restoran')),
    'transport' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'transport')),
    'rekreasi' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'rekreasi')),
    'mall' => count(array_filter($facilities, fn($f) => $f['tipe'] === 'mall')),
];

Route::get('/fasilitas', function () use ($facilities, $stats) {
    return view('fasilitas', compact('facilities', 'stats'));
});

Route::get('/', function () use ($venues, $cabors, $kontingens, $facilities) {
    $stats = [
        'venues' => count($venues),
        'cabors' => count($cabors),
        'kontingens' => count($kontingens),
        'fasilitas' => count($facilities),
    ];

    return view('welcome', compact('stats', 'venues'));
});

Route::get('/galeri', function () {
    return view('galeri');
});

Route::get('/kebijakan-privasi', function () {
    return view('privasi');
});
