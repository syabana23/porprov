<?php

namespace App\Services\Chatbot;

use App\Contracts\KnowledgeRepositoryInterface;

class SearchEngine
{
    /** @var array Runtime static query cache */
    protected static array $searchCache = [];

    protected array $stopwords = [
        'di', 'ke', 'dari', 'yang', 'ada', 'apa', 'aja', 'saja', 'itu', 'ini',
        'terdekat', 'dekat', 'sekitar', 'area', 'daerah', 'dimana', 'di mana',
        'lokasi', 'venue', 'tempat', 'rute', 'akses', 'cara', 'menuju', 'jadwal',
        'kapan', 'jam', 'hotel', 'penginapan', 'rumah sakit', 'rs', 'puskesmas',
        'restoran', 'kuliner', 'polisi', 'polsek', 'apotek', 'sewa', 'rental'
    ];

    protected array $intentKeywords = [
        'hotel', 'penginapan', 'menginap', 'wisma', 'villa', 'kamar',
        'rumah sakit', 'rs', 'klinik', 'puskesmas', 'dokter', 'medis',
        'apotek', 'obat', 'farmasi',
        'restoran', 'rumah makan', 'kuliner', 'makan', 'resto', 'kantin',
        'polisi', 'polsek', 'polres', 'keamanan', 'mako',
        'sewa', 'rental', 'kendaraan', 'mobil', 'motor', 'transportasi',
        'venue', 'lokasi', 'tempat', 'rute', 'akses', 'jalan', 'jadwal',
        'dekat', 'sekitar', 'area', 'daerah', 'dimana', 'di mana', 'ada', 'apa', 'aja', 'saja', 'di', 'ke', 'dari'
    ];

    public function __construct(
        protected KnowledgeRepositoryInterface $repository,
        protected TextNormalizer $normalizer
    ) {}

    public function extractEntityQuery(string $query): string
    {
        $lower = strtolower($query);
        foreach ($this->intentKeywords as $kw) {
            $lower = preg_replace('/\b' . preg_quote($kw, '/') . '\b/i', ' ', $lower);
        }
        return trim(preg_replace('/\s+/', ' ', $lower));
    }

    public function searchCabor(string $query): ?array
    {
        $cacheKey = 'cabor_' . md5(strtolower(trim($query)));
        if (isset(self::$searchCache[$cacheKey])) {
            return self::$searchCache[$cacheKey];
        }

        $entityQuery = $this->extractEntityQuery($query);
        $searchTerm  = !empty($entityQuery) ? $entityQuery : $query;

        // 1. FAST PATH: Check O(1) direct hash match first
        $exactMatch = $this->repository->findCabor($searchTerm);
        if ($exactMatch) {
            return self::$searchCache[$cacheKey] = $exactMatch;
        }

        $normalizedQuery = $this->normalizer->normalize($searchTerm);
        $queryTokens     = $this->tokenize($normalizedQuery);

        if (empty($queryTokens)) {
            return self::$searchCache[$cacheKey] = null;
        }

        $bestScore = 0;
        $bestCabor = null;

        foreach ($this->repository->getCabors() as $cabor) {
            $score = $this->scoreEntity($normalizedQuery, $queryTokens, $cabor['nama'], $cabor['slug'], $cabor['aliases'] ?? []);

            if ($score > $bestScore && $score >= 30) {
                $bestScore = $score;
                $bestCabor = $cabor;
            }
        }

        return self::$searchCache[$cacheKey] = $bestCabor;
    }

    public function searchVenue(string $query): ?array
    {
        $cacheKey = 'venue_' . md5(strtolower(trim($query)));
        if (isset(self::$searchCache[$cacheKey])) {
            return self::$searchCache[$cacheKey];
        }

        $entityQuery = $this->extractEntityQuery($query);
        $searchTerm  = !empty($entityQuery) ? $entityQuery : $query;

        // 1. FAST PATH: Check O(1) direct hash match first
        $exactMatch = $this->repository->findVenue($searchTerm);
        if ($exactMatch) {
            return self::$searchCache[$cacheKey] = $exactMatch;
        }

        $normalizedQuery = $this->normalizer->normalize($searchTerm);
        $queryTokens     = $this->tokenize($normalizedQuery);

        if (empty($queryTokens)) {
            return self::$searchCache[$cacheKey] = null;
        }

        $bestScore = 0;
        $bestVenue = null;

        foreach ($this->repository->getVenues() as $venue) {
            $score = $this->scoreEntity($normalizedQuery, $queryTokens, $venue['nama'], $venue['id'], $venue['aliases'] ?? []);

            if ($score > $bestScore && $score >= 30) {
                $bestScore = $score;
                $bestVenue = $venue;
            }
        }

        return self::$searchCache[$cacheKey] = $bestVenue;
    }

    public function scoreEntity(string $fullQuery, array $queryTokens, string $primaryName, string $slug, array $aliases): float
    {
        $candidates = array_merge([$primaryName, $slug], $aliases);
        $maxScore = 0;

        foreach ($candidates as $candidate) {
            if (empty($candidate)) continue;

            $normalizedCandidate = $this->normalizer->normalize($candidate);
            $candidateTokens = $this->tokenize($normalizedCandidate);

            $score = 0;

            // 1. Exact Full Match
            if ($fullQuery === $normalizedCandidate) {
                return 100.0;
            }

            // 2. Substring Match
            if (str_contains($fullQuery, $normalizedCandidate) || str_contains($normalizedCandidate, $fullQuery)) {
                $score += 60.0;
            }

            // 3. Token Overlap & Guarded Levenshtein
            foreach ($queryTokens as $qToken) {
                if (in_array($qToken, $this->stopwords) && !in_array($qToken, $candidateTokens)) {
                    continue;
                }

                $qLen = strlen($qToken);

                foreach ($candidateTokens as $cToken) {
                    // Exact Token Match
                    if ($qToken === $cToken) {
                        $score += 40.0;
                        continue;
                    }

                    // Substring Token Match
                    if (str_contains($qToken, $cToken) || str_contains($cToken, $qToken)) {
                        $score += 25.0;
                        continue;
                    }

                    // Levenshtein Guard: Skip if length difference > 2
                    $cLen = strlen($cToken);
                    if ($qLen >= 4 && $cLen >= 4 && abs($qLen - $cLen) <= 2) {
                        $lev = levenshtein($qToken, $cToken);
                        if ($lev <= 2) {
                            $score += 20.0;
                        }
                    }
                }
            }

            // 4. Similar Text Guard: Only run if score is already promising
            if ($score > 10.0 || strlen($fullQuery) >= 4) {
                similar_text($fullQuery, $normalizedCandidate, $percent);
                if ($percent >= 60.0) {
                    $score += ($percent * 0.4);
                }
            }

            if ($score > $maxScore) {
                $maxScore = $score;
            }
        }

        return $maxScore;
    }

    public function tokenize(string $text): array
    {
        $clean = preg_replace('/[^a-z0-9\s]/', '', strtolower($text));
        $words = explode(' ', $clean);
        return array_values(array_filter($words, fn($w) => strlen(trim($w)) > 0));
    }
}
