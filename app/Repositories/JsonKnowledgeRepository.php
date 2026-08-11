<?php

namespace App\Repositories;

use App\Contracts\KnowledgeRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class JsonKnowledgeRepository implements KnowledgeRepositoryInterface
{
    /** @var array Holds raw knowledge data */
    protected array $data = [];

    /** @var array Hash map index for cabors (name/slug/alias -> cabor) */
    protected array $caborIndex = [];

    /** @var array Hash map index for venues (name/id/alias -> venue) */
    protected array $venueIndex = [];

    /** @var static|null In-memory static cache instance */
    protected static ?array $staticMemoryCache = null;

    public function __construct()
    {
        $this->loadData();
    }

    /**
     * Loads knowledge data with Laravel Cache & static RAM memory cache.
     * Builds O(1) hash map indexes for instant lookups.
     */
    protected function loadData(): void
    {
        if (self::$staticMemoryCache !== null) {
            $this->data = self::$staticMemoryCache['data'];
            $this->caborIndex = self::$staticMemoryCache['caborIndex'];
            $this->venueIndex = self::$staticMemoryCache['venueIndex'];
            return;
        }

        $path = storage_path('app/chatbot/knowledge.json');

        $cacheKey = 'chatbot_knowledge_json_' . (File::exists($path) ? File::lastModified($path) : 0);

        $cached = Cache::rememberForever($cacheKey, function () use ($path) {
            if (!File::exists($path)) {
                return ['data' => [], 'caborIndex' => [], 'venueIndex' => []];
            }

            $raw = json_decode(File::get($path), true) ?? [];
            $caborIdx = [];
            $venueIdx = [];

            // Build O(1) Cabor Index
            foreach ($raw['cabors'] ?? [] as $cabor) {
                $caborIdx[strtolower(trim($cabor['nama']))] = $cabor;
                if (!empty($cabor['slug'])) {
                    $caborIdx[strtolower(trim($cabor['slug']))] = $cabor;
                }
                foreach ($cabor['aliases'] ?? [] as $alias) {
                    $caborIdx[strtolower(trim($alias))] = $cabor;
                }
            }

            // Build O(1) Venue Index
            foreach ($raw['venues'] ?? [] as $venue) {
                $venueIdx[strtolower(trim($venue['nama']))] = $venue;
                if (!empty($venue['id'])) {
                    $venueIdx[strtolower(trim($venue['id']))] = $venue;
                }
                foreach ($venue['aliases'] ?? [] as $alias) {
                    $venueIdx[strtolower(trim($alias))] = $venue;
                }
            }

            return [
                'data'       => $raw,
                'caborIndex' => $caborIdx,
                'venueIndex' => $venueIdx,
            ];
        });

        $this->data       = $cached['data'];
        $this->caborIndex = $cached['caborIndex'];
        $this->venueIndex = $cached['venueIndex'];

        self::$staticMemoryCache = $cached;
    }

    public function getFaqItems(): array
    {
        return $this->data['faq'] ?? [];
    }

    public function getCabors(): array
    {
        return $this->data['cabors'] ?? [];
    }

    public function getVenues(): array
    {
        return $this->data['venues'] ?? [];
    }

    public function getFacilities(): array
    {
        $allFacilities = [];
        foreach ($this->getVenues() as $venue) {
            $key = $venue['nama'] ?? ($venue['id'] ?? '');
            if ($key && isset($venue['facilities'])) {
                $allFacilities[$key] = $venue['facilities'];
            }
        }
        return $allFacilities;
    }

    /**
     * Find cabor with O(1) fast-path hash map index before falling back to regex.
     */
    public function findCabor(string $term): ?array
    {
        $term = strtolower(trim($term));
        if (empty($term)) {
            return null;
        }

        // 1. Instant O(1) Hash Map Match
        if (isset($this->caborIndex[$term])) {
            return $this->caborIndex[$term];
        }

        // 2. Word boundary match fallback
        foreach ($this->getCabors() as $cabor) {
            $names = array_merge([$cabor['nama'], $cabor['slug']], $cabor['aliases'] ?? []);
            foreach ($names as $name) {
                if (empty($name)) continue;
                $cleanName = strtolower(trim($name));
                if (preg_match('/\b' . preg_quote($cleanName, '/') . '\b/i', $term) ||
                    preg_match('/\b' . preg_quote($term, '/') . '\b/i', $cleanName)) {
                    return $cabor;
                }
            }
        }

        return null;
    }

    /**
     * Find venue with O(1) fast-path hash map index before falling back to regex.
     */
    public function findVenue(string $term): ?array
    {
        $term = strtolower(trim($term));
        if (empty($term)) {
            return null;
        }

        // 1. Instant O(1) Hash Map Match
        if (isset($this->venueIndex[$term])) {
            return $this->venueIndex[$term];
        }

        // 2. Word boundary match fallback
        foreach ($this->getVenues() as $venue) {
            $names = array_merge([$venue['nama'], $venue['id']], $venue['aliases'] ?? []);
            foreach ($names as $name) {
                if (empty($name)) continue;
                $cleanName = strtolower(trim($name));
                if (preg_match('/\b' . preg_quote($cleanName, '/') . '\b/i', $term) ||
                    preg_match('/\b' . preg_quote($term, '/') . '\b/i', $cleanName)) {
                    return $venue;
                }
            }
        }

        return null;
    }

    public function getFacilitiesForVenue(string $facilitiesKey, ?string $type = null): array
    {
        $venue = $this->findVenue($facilitiesKey);
        $facilities = $venue['facilities'] ?? [];

        if (empty($facilities)) {
            $lowerKey = strtolower($facilitiesKey);
            foreach ($this->getVenues() as $v) {
                $vNama = strtolower($v['nama']);
                if (str_contains($vNama, $lowerKey) || str_contains($lowerKey, $vNama)) {
                    $facilities = $v['facilities'] ?? [];
                    break;
                }
            }
        }

        if ($type) {
            return $facilities[$type] ?? [];
        }

        return $facilities;
    }
}
