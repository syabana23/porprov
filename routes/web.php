<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;

$venueRutes = [
    'GOR Pajajaran' => [
        [
            'judul' => 'KRL + Angkot via Jl. Pemuda',
            'langkah' => [
                'Naik KRL Commuter Line dan turun di Stasiun Bogor.',
                'Naik angkot trayek 07 (Bubulak–Ciparigi), 17 (Salabenda–Pasar Anyar), 18 (Villa Mutiara–Pasar Anyar), atau 23 (Taman Griya Kencana–Pasar Anyar) yang melewati Jl. Pemuda.',
                'Turun di depan GOR/Stadion Pajajaran, Jl. Pemuda, Tanah Sareal.',
            ],
        ],
        [
            'judul' => 'BisKita Trans Pakuan Koridor 5/6 (halte GOR)',
            'langkah' => [
                'Naik KRL Commuter Line dan turun di Stasiun Bogor.',
                'Lanjut naik BisKita Trans Pakuan Koridor 5 (Ciparigi–Stasiun Bogor) atau Koridor 6 (Parung Banteng–Stasiun Bogor) yang melewati Jl. Pemuda.',
                'Turun di halte GOR/Air Mancur, lalu jalan kaki menuju GOR/Stadion Pajajaran.',
            ],
        ],
        [
            'judul' => 'Dari Terminal Baranangsiang',
            'langkah' => [
                'Dari Terminal Baranangsiang naik angkot trayek 07/07A (jurusan Ciparigi), 17, atau 18 yang melewati Jl. Pemuda.',
                'Turun di depan GOR/Stadion Pajajaran, Jl. Pemuda, Tanah Sareal.',
            ],
        ],
        [
            'judul' => 'Dari Pasar Anyar / Terminal Merdeka',
            'langkah' => [
                'Naik angkot trayek 17 (Salabenda), 18 (Villa Mutiara), 23 (Taman Griya Kencana), atau 24 (Pondok Rumput) dari kawasan Pasar Anyar/Air Mancur.',
                'Turun di Jl. Pemuda, di depan GOR/Stadion Pajajaran.',
            ],
        ],
        [
            'judul' => 'Transjabodetabek dari Jakarta',
            'langkah' => [
                'Naik bus Transjabodetabek jurusan Bogor (mis. Bogor–Senen atau Blok M–Bogor).',
                'Turun di kawasan Jl. Pemuda atau Terminal Merdeka, lalu lanjut angkot trayek 07/17/18 menuju GOR/Stadion Pajajaran.',
            ],
        ],
    ],
    'Green Forest Hotel' => [
        [
            'judul' => 'KRL + Angkot via Jl. Pahlawan',
            'langkah' => [
                'Naik KRL Commuter Line dan turun di Stasiun Bogor.',
                'Naik angkot trayek 01 (Cipinang Gading–Perum Yasmin) atau trayek 08 (Taman Pajajaran–Bantar Kemang–Terminal Merdeka) yang melewati Jl. Pahlawan.',
                'Turun di depan Green Forest Hotel, Jl. Pahlawan, Bogor Selatan.',
            ],
        ],
        [
            'judul' => 'Angkot Trayek 02',
            'langkah' => [
                'Naik angkot trayek 02 (Warung Nangka–Lawang Saketeng/Bogor Trade Mall) dari kawasan Lawang Saketeng, Empang, atau Rancamaya yang melewati Jl. Pahlawan.',
                'Turun di Jl. Pahlawan, dekat Green Forest Hotel, Bogor Selatan.',
            ],
        ],
        [
            'judul' => 'Angkot Trayek 14',
            'langkah' => [
                'Naik angkot trayek 14 (Sukasari–Pasir Kuda–Terminal Bubulak) yang melewati Jl. Pahlawan (via Jl. Layungsari).',
                'Turun di Jl. Pahlawan / kawasan Bondongan, dekat Green Forest Hotel.',
            ],
        ],
        [
            'judul' => 'Angkot Trayek 29',
            'langkah' => [
                'Naik angkot trayek 29 (Pabuaran–Terminal Merdeka) yang melewati Jl. Pahlawan dan kawasan Bogor Nirwana Resident.',
                'Turun di dekat Green Forest Hotel, Jl. Pahlawan, Bogor Selatan.',
            ],
        ],
        [
            'judul' => 'BisKita + Angkot',
            'langkah' => [
                'Naik BisKita Trans Pakuan Koridor 2 (Bubulak–Ciawi) dan turun di halte Stasiun Bogor/Masjid Raya.',
                'Lanjut naik angkot trayek 01 atau 08 menuju Jl. Pahlawan, Green Forest Hotel.',
            ],
        ],
    ],
    'Gymnasium Sekolah Vokasi IPB' => [
        [
            'judul' => 'KRL + Angkot Trayek 03',
            'langkah' => [
                'Naik KRL Commuter Line dan turun di Stasiun Bogor.',
                'Naik angkot trayek 03 (Cimahpar–Bogor Trade Mall) yang melewati Jl. Kumbang–Jl. Lodaya.',
                'Turun di Jl. Kumbang / Jl. Lodaya, lalu jalan kaki menuju Gymnasium Sekolah Vokasi IPB.',
            ],
        ],
        [
            'judul' => 'Angkot Trayek 30',
            'langkah' => [
                'Naik angkot trayek 30 (Warung Jambu–Bogor Trade Mall) yang melewati Jl. Kumbang–Jl. Lodaya.',
                'Turun di Jl. Lodaya, lalu jalan kaki menuju Gymnasium Sekolah Vokasi IPB (Cilibende).',
            ],
        ],
        [
            'judul' => 'BisKita Trans Pakuan Koridor 1',
            'langkah' => [
                'Naik BisKita Trans Pakuan Koridor 1 (Bubulak–Cidangiang).',
                'Turun di halte Botani Square / Terminal Baranangsiang, lalu jalan kaki (±10 menit) menuju Gymnasium Sekolah Vokasi IPB di Cilibende.',
            ],
        ],
        [
            'judul' => 'Dari Terminal Baranangsiang',
            'langkah' => [
                'Dari Terminal Baranangsiang naik angkot trayek 03 atau 30.',
                'Turun di Jl. Kumbang / Jl. Lodaya, lalu jalan kaki menuju Gymnasium Sekolah Vokasi IPB.',
            ],
        ],
    ],
    'GOR Yasmin Bulutangkis' => [
        [
            'judul' => 'KRL + Angkot jurusan Yasmin',
            'langkah' => [
                'Naik KRL Commuter Line dan turun di Stasiun Bogor.',
                'Naik angkot trayek 01 jurusan Perum Yasmin, atau trayek 11 (Curug–Pasar Anyar), 12 (Bubulak–Pasar Anyar), atau 26 (Terminal Merdeka–Villa Mutiara) yang melewati kawasan Yasmin–Curugmekar.',
                'Turun di dekat GOR Yasmin, Jl. KH. R. Abdullah bin Nuh, Curugmekar.',
            ],
        ],
        [
            'judul' => 'BisKita Trans Pakuan Koridor 1',
            'langkah' => [
                'Naik BisKita Trans Pakuan Koridor 1 (Bubulak–Cidangiang).',
                'Turun di halte Ruko Yasmin / RS Hermina / Kolam Renang Yasmin, lalu jalan kaki menuju GOR Yasmin.',
            ],
        ],
        [
            'judul' => 'Angkot Trayek 22',
            'langkah' => [
                'Naik angkot trayek 22 (Terminal Bubulak–Kencana) yang melewati Jl. KH. R. Abdullah bin Nuh (kawasan Yasmin).',
                'Turun di kawasan Curugmekar, dekat GOR Yasmin Bulutangkis.',
            ],
        ],
        [
            'judul' => 'Angkot Trayek 15',
            'langkah' => [
                'Naik angkot trayek 15 (Terminal Merdeka–Situgede) yang melewati Jl. KH. R. Abdullah bin Nuh.',
                'Turun di dekat GOR Yasmin Bulutangkis, Jl. KH. R. Abdullah bin Nuh, Curugmekar.',
            ],
        ],
    ],
    'PPSDMAP Kemenhub Kemang' => [
        [
            'judul' => 'KRL + Angkot jurusan Parung',
            'langkah' => [
                'Naik KRL Commuter Line dan turun di Stasiun Bogor.',
                'Dari Terminal Baranangsiang naik angkot jurusan Parung yang melewati Jl. Raya Parung–Bogor.',
                'Turun di depan PPSDMAP Kemenhub, Jl. Raya Parung, Kemang.',
            ],
        ],
        [
            'judul' => 'Dari Terminal Parung',
            'langkah' => [
                'Dari Terminal Parung naik angkot jurusan Bogor.',
                'Turun di depan PPSDMAP Kemenhub, Jl. Raya Parung–Bogor, Kemang.',
            ],
        ],
        [
            'judul' => 'KRL Stasiun Cibinong + Angkot',
            'langkah' => [
                'Naik KRL Commuter Line dan turun di Stasiun Cibinong.',
                'Lanjut naik angkot jurusan Parung/Kemang yang melewati Jl. Raya Parung–Bogor.',
                'Turun di depan PPSDMAP Kemenhub, Kemang.',
            ],
        ],
        [
            'judul' => 'Ojek / Taksi (last mile)',
            'langkah' => [
                'Dari Stasiun Bogor atau terminal terdekat lanjut naik ojek atau taksi menuju PPSDMAP Kemenhub, Jl. Raya Parung–Bogor, Kemang.',
            ],
        ],
    ],
    'Padepokan Voli Sentul' => [
        [
            'judul' => 'KRL Bojonggede + Bus Listrik Gratis',
            'langkah' => [
                'Naik KRL Commuter Line dan turun di Stasiun Bojonggede.',
                'Naik bus listrik gratis jurusan Sentul City.',
                'Turun di kawasan Sentul City, lanjut jalan kaki atau ojek menuju Padepokan Voli Sentul.',
            ],
        ],
        [
            'judul' => 'KRL Bogor + Angkot jurusan Sentul',
            'langkah' => [
                'Naik KRL Commuter Line dan turun di Stasiun Bogor.',
                'Dari Terminal Baranangsiang naik angkot jurusan Sentul City/Cibinong.',
                'Turun di kawasan Sirkuit Sentul Internasional, lanjut jalan kaki menuju Padepokan Voli Sentul.',
            ],
        ],
        [
            'judul' => 'Dari Terminal Cibinong',
            'langkah' => [
                'Dari Terminal Cibinong naik angkot jurusan Sentul (Babakan Madang).',
                'Turun di kawasan Sirkuit Sentul Internasional, dekat Padepokan Voli Sentul.',
            ],
        ],
        [
            'judul' => 'Dari Jakarta via Transjabodetabek',
            'langkah' => [
                'Naik bus Transjabodetabek jurusan Bogor dan turun di Bogor.',
                'Lanjut naik angkot jurusan Sentul City, atau ojek/taksi menuju Padepokan Voli Sentul.',
            ],
        ],
    ],
    'Gunung Mas (Cisarua)' => [
        [
            'judul' => 'KRL + Angkot via Sukasari',
            'langkah' => [
                'Naik KRL Commuter Line dan turun di Stasiun Bogor.',
                'Naik angkot trayek 27 (Buntar–Sukasari) atau ojek menuju Sukasari.',
                'Lanjut naik angkot jurusan Cisarua/Puncak, turun di Gunung Mas (Jl. Raya Puncak KM 87).',
            ],
        ],
        [
            'judul' => 'Bus AKDP jurusan Puncak/Cianjur',
            'langkah' => [
                'Dari Terminal Baranangsiang naik bus jurusan Puncak/Cianjur (Elang, Cipta Staya, Sari Wangi, dll).',
                'Turun di depan Gunung Mas, Jl. Raya Puncak KM 87, Cisarua.',
            ],
        ],
        [
            'judul' => 'BisKita Koridor 2 + Angkot',
            'langkah' => [
                'Naik BisKita Trans Pakuan Koridor 2 (Bubulak–Ciawi).',
                'Turun di kawasan Ciawi, lanjut naik angkot jurusan Cisarua.',
                'Turun di Gunung Mas, Jl. Raya Puncak KM 87, Cisarua.',
            ],
        ],
        [
            'judul' => 'KRL + Angkot jurusan Puncak',
            'langkah' => [
                'Naik KRL Commuter Line dan turun di Stasiun Bogor.',
                'Dari Terminal Baranangsiang naik angkot jurusan Cisarua/Puncak, turun di Gunung Mas (Jl. Raya Puncak KM 87).',
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

$liveStream = [
    'video_id' => '4vdOCO3KWB0',
    'title' => 'Live Streaming Resmi PORPROV XV Kota Bogor 2026',
];

Route::get('/chatbot/chat', [ChatbotController::class, 'chat']);
Route::post('/chatbot', [ChatbotController::class, 'chat']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cabor', function () use ($cabors) {
    return view('cabor', compact('cabors'));
});

Route::get('/kontingen', function () use ($kontingens) {
    return view('kontingen', compact('kontingens'));
});

Route::get('/klasemen-medali', function () use ($klasemen) {
    usort($klasemen, function ($a, $b) {
        return [$b['emas'], $b['perak'], $b['perunggu']] <=> [$a['emas'], $a['perak'], $a['perunggu']];
    });
    return view('klasemen-medali', compact('klasemen'));
});

Route::get('/atlet', function () use ($atlets) {
    usort($atlets, function ($a, $b) {
        return [$b['emas'], $b['perak'], $b['perunggu']] <=> [$a['emas'], $a['perak'], $a['perunggu']];
    });
    return view('atlet', compact('atlets'));
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

Route::get('/fasilitas', function () {
    $facilities = [
        ['nama' => 'Zest Hotel Bogor', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Pajajaran No. 27, Babakan, Kec. Bogor Tengah, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '1.2 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Zest%20Hotel%20Bogor%20Jl.%20Pajajaran%20No.%2027%2C%20Babakan%2C%20Kec.%20Bogor%20Tengah%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'The Mirah Hotel Bogor', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Pangrango No. 9A, Babakan, Kec. Bogor Tengah, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '1.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=The%20Mirah%20Hotel%20Bogor%20Jl.%20Pangrango%20No.%209A%2C%20Babakan%2C%20Kec.%20Bogor%20Tengah%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS Salak Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Jend. Sudirman No. 8, Sempur, Kec. Bogor Tengah, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '1.1 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20Salak%20Bogor%20Jl.%20Jend.%20Sudirman%20No.%208%2C%20Sempur%2C%20Kec.%20Bogor%20Tengah%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS PMI Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '2.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20PMI%20Bogor%20Jl.%20Pajajaran%20No.%2080%2C%20Baranangsiang%2C%20Kec.%20Bogor%20Timur%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma Juanda', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Jl. Ir. H. Juanda No. 30, Babakan, Kec. Bogor Tengah, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '2.0 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20Juanda%20Jl.%20Ir.%20H.%20Juanda%20No.%2030%2C%20Babakan%2C%20Kec.%20Bogor%20Tengah%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Bogor Tengah', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Sawojajar No. 38, Pabaton, Kec. Bogor Tengah, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '1.8 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Puskesmas%20Bogor%20Tengah%20Jl.%20Sawojajar%20No.%2038%2C%20Pabaton%2C%20Kec.%20Bogor%20Tengah%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polresta Bogor Kota (Mako Muslihat)', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Kapten Muslihat No. 18, Paledang, Kec. Bogor Tengah, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '2.3 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Polresta%20Bogor%20Kota%20%28Mako%20Muslihat%29%20Jl.%20Kapten%20Muslihat%20No.%2018%2C%20Paledang%2C%20Kec.%20Bogor%20Tengah%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Rumah Makan Ampera Pemuda', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Jl. Pemuda No. 27, Tanah Sareal, Kec. Tanah Sereal, Kota Bogor', 'venue' => 'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'jarak' => '300 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Rumah%20Makan%20Ampera%20Jl.%20Pemuda%20No.%2027%20Tanah%20Sareal%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'ASTON Bogor Hotel & Resort', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Mulyaharja, Kec. Bogor Selatan, Kota Bogor', 'venue' => 'Green Forest Hotel', 'jarak' => '1.8 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=ASTON%20Bogor%20Hotel%20%26%20Resort%20Mulyaharja%2C%20Kec.%20Bogor%20Selatan%2C%20Kota%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Padodi Hotel', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Jl. Soemanta Diredja No. 10, Pamoyanan, Kec. Bogor Selatan', 'venue' => 'Green Forest Hotel', 'jarak' => '1.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Padodi%20Hotel%20Jl.%20Soemanta%20Diredja%20No.%2010%2C%20Pamoyanan%2C%20Kec.%20Bogor%20Selatan', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS Melania Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Pahlawan No. 91, Bondongan, Kec. Bogor Selatan', 'venue' => 'Green Forest Hotel', 'jarak' => '2.8 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20Melania%20Bogor%20Jl.%20Pahlawan%20No.%2091%2C%20Bondongan%2C%20Kec.%20Bogor%20Selatan', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma Pahlawan', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Jl. Pahlawan No. 40, Batutulis, Kec. Bogor Selatan', 'venue' => 'Green Forest Hotel', 'jarak' => '2.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20Pahlawan%20Jl.%20Pahlawan%20No.%2040%2C%20Batutulis%2C%20Kec.%20Bogor%20Selatan', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Cipaku', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Rangga Gading, Cipaku, Kec. Bogor Selatan', 'venue' => 'Green Forest Hotel', 'jarak' => '2.1 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Puskesmas%20Cipaku%20Jl.%20Rangga%20Gading%2C%20Cipaku%2C%20Kec.%20Bogor%20Selatan', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polsek Bogor Selatan', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Layung Sari No. 1, Empang, Kec. Bogor Selatan', 'venue' => 'Green Forest Hotel', 'jarak' => '2.6 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Polsek%20Bogor%20Selatan%20Jl.%20Layung%20Sari%20No.%201%2C%20Empang%2C%20Kec.%20Bogor%20Selatan', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Resto Kampoeng Konsep', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Jl. Soemanta Diredja No. 28, Pamoyanan, Kec. Bogor Selatan', 'venue' => 'Green Forest Hotel', 'jarak' => '400 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Resto%20Kampoeng%20Konsep%20Pamoyanan%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'IPB Hotel & Convention Centre', 'tipe' => 'hotel', 'tipe_label' => 'Hotel', 'alamat' => 'Botani Square, Jl. Pajajaran, Baranangsiang', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '2.8 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=IPB%20Hotel%20%26%20Convention%20Centre%20Botani%20Square%2C%20Jl.%20Pajajaran%2C%20Baranangsiang', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'RS PMI Bogor', 'tipe' => 'rs', 'tipe_label' => 'Rumah Sakit', 'alamat' => 'Jl. Pajajaran No. 80, Baranangsiang, Kec. Bogor Timur', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '2.2 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=RS%20PMI%20Bogor%20Jl.%20Pajajaran%20No.%2080%2C%20Baranangsiang%2C%20Kec.%20Bogor%20Timur', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Apotek Kimia Farma Pajajaran', 'tipe' => 'apotek', 'tipe_label' => 'Apotek', 'alamat' => 'Jl. Pajajaran No. 35, Babakan, Kec. Bogor Tengah', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '1.5 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Apotek%20Kimia%20Farma%20Pajajaran%20Jl.%20Pajajaran%20No.%2035%2C%20Babakan%2C%20Kec.%20Bogor%20Tengah', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Puskesmas Bogor Utara', 'tipe' => 'puskesmas', 'tipe_label' => 'Puskesmas', 'alamat' => 'Jl. Tegal Gundil, Kec. Bogor Utara', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '1.9 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Puskesmas%20Bogor%20Utara%20Jl.%20Tegal%20Gundil%2C%20Kec.%20Bogor%20Utara', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Polsek Bogor Utara', 'tipe' => 'polsek', 'tipe_label' => 'Polres / Polsek', 'alamat' => 'Jl. Pajajaran No. 200, Cibuluh, Kec. Bogor Utara', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '2.1 km', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Polsek%20Bogor%20Utara%20Jl.%20Pajajaran%20No.%20200%2C%20Cibuluh%2C%20Kec.%20Bogor%20Utara', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
        ['nama' => 'Toko Adelways (Kantin IPB Cilibende)', 'tipe' => 'restoran', 'tipe_label' => 'Restoran', 'alamat' => 'Jl. Cilibende, Babakan, Kec. Bogor Tengah', 'venue' => 'Gymnasium Sekolah Vokasi IPB', 'jarak' => '250 m', 'gmaps' => 'https://www.google.com/maps/search/?api=1&query=Toko%20Adelways%20Jl.%20Cilibende%20Bogor', 'telepon' => '-', 'layanan' => '-', 'website' => '', 'image' => ''],
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
        ['nama' => 'IKIGAI Fitness', 'tipe' => 'rekreasi', 'tipe_label' => 'Fitness', 'alamat' => 'IKIGAI Ekalos, Gedung Plaza Ekalos, Jl. Siliwangi, RW.04, Sukasari, Bogor', 'venue' => ['GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)', 'Green Forest Hotel', 'Gymnasium Sekolah Vokasi IPB', 'GOR Yasmin Bulutangkis', 'PPSDMAP Kemenhub Kemang Kab-Bogor', 'Padepokan Voli Sentul'], 'jarak' => '-', 'gmaps' => 'https://www.google.com/maps/place/IKIGAI+FITNESS+-+Lippo+Plaza+Ekalokasari+Bogor/@-6.6216624,106.8144763,17z/data=!3m2!4b1!5s0x2e69c5fdf77397b5:0x881f18442bc0f864!4m6!3m5!1s0x2e69c5d5719e94ab:0x8c6b0ea36866c2e6!8m2!3d-6.6216624!4d106.8170512!16s%2Fg%2F11stp2j67s?entry=ttu&g_ep=EgoyMDI2MDgwNS4xIKXMDSoASAFQAw%3D%3D', 'telepon' => '081229112334', 'layanan' => 'fitness, buka pukul 06:00-21:00', 'website' => '', 'image' => ''],
    ];

    // Count stats
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
    ];

    return view('fasilitas', compact('facilities', 'stats'));
});

Route::get('/galeri', function () {
    return view('galeri');
});

Route::get('/kebijakan-privasi', function () {
    return view('privasi');
});
