<?php

namespace App\Services\Chatbot;

use App\Contracts\KnowledgeRepositoryInterface;

class IntentResolver
{
    protected array $unregisteredSports;

    public function __construct(
        protected KnowledgeRepositoryInterface $repository,
        protected TextNormalizer $normalizer,
        protected SearchEngine $searchEngine,
        protected IntentDetector $intentDetector
    ) {
        $this->unregisteredSports = config('chatbot.unregistered_sports', []);
    }

    public function resolveContext(string $rawMessage): ChatContext
    {
        $normalized = $this->normalizer->normalize($rawMessage);

        // 1. Detect Intent (order-independent keyword scoring)
        $intent = $this->intentDetector->detect($rawMessage);
        $intentScores = $this->intentDetector->detectAll($rawMessage);

        // 2. Detect entities (cabor & venue via SearchEngine)
        $foundCabor = $this->searchEngine->searchCabor($rawMessage);
        $foundVenue = $this->searchEngine->searchVenue($rawMessage);

        // 3. Resolve facility type from intent
        $facilityType = IntentDetector::intentToFacilityType($intent ?? '');
        // Fallback: try legacy keyword detection if intent doesn't give facility type
        if (!$facilityType) {
            $facilityType = $this->detectFacilityTypeLegacy($rawMessage);
        }

        // 4. Detect unregistered sport (only if no registered cabor found)
        $unregisteredSport = $foundCabor ? null : $this->detectUnregisteredSport($rawMessage);

        // 5. Resolve session context
        $keys = config('chatbot.session_keys');
        $sessionCabor = session($keys['last_cabor']);
        $sessionVenue = session($keys['last_venue']);

        return new ChatContext(
            rawMessage: $rawMessage,
            normalizedMessage: $normalized,
            intent: $intent,
            intentScores: $intentScores,
            cabor: $foundCabor,
            venue: $foundVenue,
            facilityType: $facilityType,
            unregisteredSport: $unregisteredSport,
            sessionCabor: $sessionCabor,
            sessionVenue: $sessionVenue
        );
    }

    /**
     * Legacy facility type detection via config keyword map.
     * Digunakan sebagai fallback jika IntentDetector tidak menghasilkan facility type.
     */
    protected function detectFacilityTypeLegacy(string $message): ?string
    {
        $facilityKeywords = config('chatbot.facility_keywords', []);
        $lower = strtolower($message);

        foreach ($facilityKeywords as $type => $keywords) {
            foreach ($keywords as $kw) {
                if (str_word_count($kw) > 1) {
                    if (str_contains($lower, $kw)) {
                        return $type;
                    }
                } else {
                    if (preg_match('/\b' . preg_quote($kw, '/') . '\b/i', $lower)) {
                        return $type;
                    }
                }
            }
        }

        return null;
    }

    protected function detectUnregisteredSport(string $message): ?string
    {
        $lower = strtolower($message);
        foreach ($this->unregisteredSports as $sport) {
            if (preg_match('/\b' . preg_quote($sport, '/') . '\b/i', $lower)) {
                return ucfirst($sport);
            }
        }
        return null;
    }

    public function isVenueQuery(string $message): bool
    {
        return (bool) preg_match('/(dimana|di mana|lokasi|venue|tempat|alamat|dimanakah|berada|di daerah mana|daerah mana)/i', strtolower($message));
    }

    public function isRouteQuery(string $message): bool
    {
        return (bool) preg_match('/(rute|cara ke|naik apa|akses|transportasi|angkot|krl|bus|biskita|menuju ke)/i', strtolower($message));
    }

    public function isScheduleQuery(string $message): bool
    {
        return (bool) preg_match('/(jadwal|kapan|jam berapa|tanggal|tgl|main kapan|bertanding)/i', strtolower($message));
    }
}
