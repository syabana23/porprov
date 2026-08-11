<?php

namespace App\Services\Chatbot;

/**
 * IntentDetector
 *
 * Mendeteksi intent dari pesan pengguna secara bebas urutan kata tanpa switch/match.
 * Setiap intent diberi skor berdasarkan kecocokan keyword yang ditemukan.
 * Intent dengan skor tertinggi dipilih sebagai intent utama.
 */
class IntentDetector
{
    protected array $intentKeywords = [
        'gmaps' => [
            'google maps', 'gmaps', 'google map', 'peta', 'maps',
            'petunjuk arah', 'arah ke', 'navigasi', 'direction',
        ],
        'schedule' => [
            'jadwal', 'kapan', 'jam berapa', 'tanggal', 'tgl',
            'main kapan', 'bertanding', 'pertandingan kapan', 'jadwal main',
        ],
        'route' => [
            'rute', 'cara ke', 'naik apa', 'akses', 'transportasi',
            'angkot', 'krl', 'bus', 'biskita', 'menuju ke', 'menuju',
            'cara menuju', 'bagaimana ke', 'jalan ke',
        ],
        'hotel' => [
            'hotel', 'penginapan', 'menginap', 'wisma', 'villa',
            'resort', 'homestay', 'kamar',
        ],
        'hospital' => [
            'rumah sakit', 'rs', 'klinik', 'dokter', 'medis',
            'igd', 'ugd', 'pelayanan kesehatan', 'kesehatan',
        ],
        'puskesmas' => [
            'puskesmas', 'puskemas', 'posyandu',
        ],
        'restaurant' => [
            'restoran', 'rumah makan', 'kuliner', 'makan', 'makanan',
            'warung', 'cafe', 'kafe', 'resto', 'kantin', 'kedai',
        ],
        'pharmacy' => [
            'apotek', 'apotik', 'obat', 'farmasi', 'kimia farma',
        ],
        'police' => [
            'polisi', 'polsek', 'polres', 'polresta', 'keamanan',
            'mako', 'kantor polisi',
        ],
        'transport' => [
            'sewa kendaraan', 'sewa mobil', 'sewa motor', 'rental',
            'transportasi', 'sewa', 'taksi', 'ojek', 'grab', 'gojek',
        ],
        'venue_location' => [
            'dimana', 'di mana', 'dimanakah', 'lokasinya', 'lokasi',
            'venue', 'tempat', 'alamat', 'berada', 'daerah mana',
            'letak', 'di mana letaknya', 'dimana letaknya',
        ],
        'cabor_list' => [
            'daftar cabor', 'cabor apa saja', 'apa saja cabang olahraga',
            'cabang olahraga apa', 'list cabor', 'semua cabor',
            'cabor ada apa', 'olahraga apa saja', 'list olahraga',
        ],
        'general_faq' => [
            'halo', 'hai', 'hi', 'selamat', 'pagi', 'siang', 'sore', 'malam',
            'apa itu porprov', 'porprov apa', 'tentang porprov',
            'galeri', 'gallery', 'foto', 'dokumentasi',
            'sponsor', 'panitia', 'contact', 'kontak',
        ],
    ];

    protected static array $facilityIntentMap = [
        'hotel'      => 'hotel',
        'hospital'   => 'hospital',
        'puskesmas'  => 'puskesmas',
        'restaurant' => 'restaurant',
        'pharmacy'   => 'pharmacy',
        'police'     => 'police',
        'transport'  => 'transport',
    ];

    public function detect(string $message): ?string
    {
        $lower = strtolower($message);
        $scores = [];

        foreach ($this->intentKeywords as $intent => $keywords) {
            $score = 0;
            foreach ($keywords as $kw) {
                if (str_word_count($kw) > 1) {
                    if (str_contains($lower, $kw)) {
                        $score += $this->intentWeight($kw);
                    }
                } else {
                    if (preg_match('/\b' . preg_quote($kw, '/') . '\b/', $lower)) {
                        $score += $this->intentWeight($kw);
                    }
                }
            }
            if ($score > 0) {
                $scores[$intent] = $score;
            }
        }

        if (empty($scores)) {
            return null;
        }

        arsort($scores);
        return array_key_first($scores);
    }

    public function detectAll(string $message): array
    {
        $lower = strtolower($message);
        $scores = [];

        foreach ($this->intentKeywords as $intent => $keywords) {
            $score = 0;
            foreach ($keywords as $kw) {
                if (str_word_count($kw) > 1) {
                    if (str_contains($lower, $kw)) {
                        $score += $this->intentWeight($kw);
                    }
                } else {
                    if (preg_match('/\b' . preg_quote($kw, '/') . '\b/', $lower)) {
                        $score += $this->intentWeight($kw);
                    }
                }
            }
            if ($score > 0) {
                $scores[$intent] = $score;
            }
        }

        arsort($scores);
        return $scores;
    }

    protected function intentWeight(string $keyword): float
    {
        $words = str_word_count(trim($keyword));
        if ($words >= 3) {
            return 3.0;
        }
        if ($words === 2) {
            return 2.0;
        }
        return 1.0;
    }

    public static function intentToFacilityType(string $intent): ?string
    {
        return self::$facilityIntentMap[$intent] ?? null;
    }

    public static function isFacilityIntent(string $intent): bool
    {
        return isset(self::$facilityIntentMap[$intent]);
    }
}
