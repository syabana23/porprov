<?php

namespace App\Services\Chatbot\Intents;

use App\Contracts\IntentHandlerInterface;
use App\Contracts\KnowledgeRepositoryInterface;
use App\Services\Chatbot\ChatContext;
use App\Services\Chatbot\ChatResponse;
use App\Services\Chatbot\IntentResolver;

class VenueLocationIntentHandler implements IntentHandlerInterface
{
    public function __construct(
        protected KnowledgeRepositoryInterface $repository,
        protected IntentResolver $resolver
    ) {}

    public function canHandle(ChatContext $context): bool
    {
        // Trigger jika intent venue_location, atau ada cabor/venue tapi belum ditangani fasilitas
        if ($context->intentIs('venue_location')) {
            return true;
        }
        // Fallback: ada entitas cabor/venue dan intent bukan fasilitas / gmaps
        if (($context->hasCabor() || $context->hasVenue()) &&
            !in_array($context->intent, ['hotel', 'hospital', 'puskesmas', 'restaurant', 'pharmacy', 'police', 'transport', 'gmaps', 'schedule', 'route'])) {
            return true;
        }
        // Fallback legacy regex untuk query tanpa intent terdeteksi
        if (!$context->hasIntent() && $this->resolver->isVenueQuery($context->rawMessage)) {
            return true;
        }
        return false;
    }

    public function handle(ChatContext $context): ChatResponse
    {
        if ($context->hasCabor()) {
            return $this->buildCaborResponse($context->cabor);
        }

        if ($context->hasVenue()) {
            return $this->buildVenueResponse($context->venue);
        }

        $activeVenueName = $context->getActiveVenueName();
        if ($activeVenueName) {
            $venueData = $this->repository->findVenue($activeVenueName);
            if ($venueData) {
                return $this->buildVenueResponse($venueData);
            }
        }

        return new ChatResponse(
            answer: "📍 <strong>Peta Venue PERTANDINGAN PORPROV Jabar XV</strong>:<br>Silakan lihat Peta Venue untuk mencari titik lokasi seluruh 28 cabang olahraga.",
            button: ["text" => "📍 Buka Peta Venue Interaktif", "url" => "/peta-venue"]
        );
    }

    private function buildCaborResponse(array $cabor): ChatResponse
    {
        $venueName  = $cabor['venue'];
        $venueData  = $this->repository->findVenue($venueName);
        $alamat     = $cabor['alamat'] ?? ($venueData['alamat'] ?? '-');
        $gmaps      = $cabor['gmaps'] ?? ($venueData['gmaps'] ?? '');
        $deskripsi  = $cabor['deskripsi'] ?? '';

        $html  = "📍 <strong>Venue Cabang Olahraga: {$cabor['nama']}</strong><br><br>";
        $html .= "🏢 <strong>Lokasi / Venue</strong>: {$venueName}<br>";
        $html .= "📌 <strong>Alamat</strong>: {$alamat}<br>";
        if (!empty($gmaps)) {
            $html .= "🔗 <strong>Google Maps</strong>: <a href='{$gmaps}' target='_blank' style='color:#2563eb; text-decoration:underline;'>Petunjuk Arah Google Maps</a><br>";
        }
        if (!empty($deskripsi)) {
            $html .= "<br>ℹ️ <i>{$deskripsi}</i><br>";
        }

        return new ChatResponse(
            answer: $html,
            button: ["text" => "📍 Lihat Peta Venue Interaktif", "url" => "/peta-venue"]
        );
    }

    private function buildVenueResponse(array $venue): ChatResponse
    {
        $caborsList = implode(', ', $venue['cabors'] ?? []);
        $gmaps      = $venue['gmaps'] ?? '';

        $html  = "📍 <strong>Informasi Venue: {$venue['nama']}</strong><br><br>";
        $html .= "📌 <strong>Alamat</strong>: {$venue['alamat']}<br>";
        if (!empty($gmaps)) {
            $html .= "🔗 <strong>Google Maps</strong>: <a href='{$gmaps}' target='_blank' style='color:#2563eb; text-decoration:underline;'>Petunjuk Arah Google Maps</a><br>";
        }
        $html .= "ℹ️ <strong>Deskripsi</strong>: {$venue['deskripsi']}<br>";
        if (!empty($caborsList)) {
            $html .= "🏆 <strong>Cabor Dipertandingkan</strong>: {$caborsList}<br>";
        }

        return new ChatResponse(
            answer: $html,
            button: ["text" => "📍 Buka Peta Venue", "url" => "/peta-venue"]
        );
    }
}
