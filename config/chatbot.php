<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Chatbot Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for text normalization, unregistered sports, and facility keywords.
    | All primary domain data (venues, cabors, FAQs, facilities, gmaps) is loaded
    | exclusively from storage/app/chatbot/knowledge.json.
    |
    */

    'synonyms' => [
        'lokasi' => 'venue',
        'tempat' => 'venue',
        'gor' => 'venue',
        'stadion' => 'venue',
        'arena' => 'venue',
        'lapangan' => 'venue',
        'dimana' => 'venue',
        'di mana' => 'venue',
        'hotel' => 'hotel',
        'penginapan' => 'hotel',
        'menginap' => 'hotel',
        'wisma' => 'hotel',
        'villa' => 'hotel',
        'rumah sakit' => 'rs',
        'klinik' => 'rs',
        'puskesmas' => 'puskesmas',
        'dokter' => 'rs',
        'medis' => 'rs',
        'apotek' => 'apotek',
        'obat' => 'apotek',
        'restoran' => 'restoran',
        'rumah makan' => 'restoran',
        'kuliner' => 'restoran',
        'makan' => 'restoran',
        'polsek' => 'polisi',
        'polres' => 'polisi',
        'polisi' => 'polisi',
        'keamanan' => 'polisi',
        'sewa' => 'transport',
        'rental' => 'transport',
        'main' => 'pertandingan',
        'bertanding' => 'pertandingan',
        'rute' => 'rute',
        'angkot' => 'rute',
        'krl' => 'rute',
        'akses' => 'rute',
        'jalan' => 'rute',
        'naik apa' => 'rute',
    ],

    'unregistered_sports' => [
        'basket', 'basketball', 'bola basket',
        'futsal',
        'sepak bola', 'sepakbola', 'bola',
        'voli', 'volly', 'volleyball', 'bola voli',
        'badminton', 'bulutangkis', 'bulu tangkis',
        'renang', 'swimming',
        'catur', 'chess', 'e-sport', 'esport', 'mobile legends'
    ],

    'facility_keywords' => [
        'hotel' => ['hotel', 'penginapan', 'menginap', 'wisma', 'villa', 'kamar'],
        'hospital' => ['rumah sakit', 'rs', 'klinik', 'dokter', 'medis'],
        'puskesmas' => ['puskesmas', 'puskemas'],
        'pharmacy' => ['apotek', 'obat', 'farmasi'],
        'restaurant' => ['restoran', 'rumah makan', 'kuliner', 'makan', 'resto', 'kantin'],
        'police' => ['polisi', 'polsek', 'polres', 'keamanan', 'mako'],
        'transport' => ['sewa kendaraan', 'sewa mobil', 'sewa motor', 'rental', 'transportasi', 'sewa'],
    ],

    'session_keys' => [
        'last_cabor' => 'chatbot_last_cabor',
        'last_venue' => 'chatbot_last_venue',
        'last_facilities_key' => 'chatbot_last_facilities_key',
    ],
];
