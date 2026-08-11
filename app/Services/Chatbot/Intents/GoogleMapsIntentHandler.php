<?php

namespace App\Services\Chatbot\Intents;

use App\Contracts\IntentHandlerInterface;
use App\Contracts\KnowledgeRepositoryInterface;
use App\Services\Chatbot\ChatContext;
use App\Services\Chatbot\ChatResponse;

class GoogleMapsIntentHandler implements IntentHandlerInterface
{
    public function __construct(
        protected KnowledgeRepositoryInterface $repository
    ) {}

    public function canHandle(ChatContext $context): bool
    {
        return $context->intentIs('gmaps');
    }

    public function handle(ChatContext $context): ChatResponse
    {
        if ($context->hasCabor()) {
            return $this->buildCaborMapsResponse($context->cabor);
        }

        if ($context->hasVenue()) {
            return $this->buildVenueMapsResponse($context->venue);
        }

        $activeVenueName = $context->getActiveVenueName();
        if ($activeVenueName) {
            $venueData = $this->repository->findVenue($activeVenueName);
            if ($venueData) {
                return $this->buildVenueMapsResponse($venueData);
            }
        }

        return new ChatResponse(
            answer: "🗺️ <strong>Google Maps Venue PORPROV Jabar XV Kota Bogor 2026</strong>:<br>Silakan buka Peta Venue interaktif untuk melihat seluruh titik lokasi venue pertandingan.",
            button: ["text" => "📍 Buka Peta Venue Interaktif", "url" => "/peta-venue"]
        );
    }

    private function buildCaborMapsResponse(array $cabor): ChatResponse
    {
        $gmaps     = $cabor['gmaps'] ?? '';
        $venueName = $cabor['venue'];
        $alamat    = $cabor['alamat'] ?? '-';

        if (empty($gmaps)) {
            $venueData = $this->repository->findVenue($venueName);
            $gmaps     = $venueData['gmaps'] ?? '';
        }

        $html  = "🗺️ <strong>Petunjuk Arah Google Maps — Cabor {$cabor['nama']}</strong><br><br>";
        $html .= "🏢 <strong>Venue</strong>: {$venueName}<br>";
        $html .= "📍 <strong>Alamat</strong>: {$alamat}<br>";

        if (!empty($gmaps)) {
            $html .= "<br>🔗 <a href='{$gmaps}' target='_blank' style='color:#2563eb; text-decoration:underline; font-weight:bold;'>Klik di sini untuk membuka Google Maps ↗</a>";
            return new ChatResponse(
                answer: $html,
                button: [
                    "text" => "🗺️ Buka Google Maps ({$cabor['nama']})",
                    "url"  => $gmaps
                ]
            );
        }

        return new ChatResponse(
            answer: $html . "<br>ℹ️ Link Google Maps belum tersedia untuk venue ini.",
            button: ["text" => "🗺️ Peta Venue Interaktif", "url" => "/peta-venue"]
        );
    }

    private function buildVenueMapsResponse(array $venue): ChatResponse
    {
        $gmaps = $venue['gmaps'] ?? '';

        $html  = "🗺️ <strong>Petunjuk Arah Google Maps — Venue {$venue['nama']}</strong><br><br>";
        $html .= "📍 <strong>Alamat</strong>: {$venue['alamat']}<br>";

        if (!empty($gmaps)) {
            $html .= "<br>🔗 <a href='{$gmaps}' target='_blank' style='color:#2563eb; text-decoration:underline; font-weight:bold;'>Klik di sini untuk membuka Google Maps ↗</a>";
            return new ChatResponse(
                answer: $html,
                button: [
                    "text" => "🗺️ Buka Google Maps ({$venue['nama']})",
                    "url"  => $gmaps
                ]
            );
        }

        return new ChatResponse(
            answer: $html . "<br>ℹ️ Link Google Maps belum tersedia untuk venue ini.",
            button: ["text" => "🗺️ Peta Venue Interaktif", "url" => "/peta-venue"]
        );
    }
}
