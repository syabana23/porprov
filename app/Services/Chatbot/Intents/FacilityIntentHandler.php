<?php

namespace App\Services\Chatbot\Intents;

use App\Contracts\IntentHandlerInterface;
use App\Contracts\KnowledgeRepositoryInterface;
use App\Services\Chatbot\ChatContext;
use App\Services\Chatbot\ChatResponse;
use App\Services\Chatbot\IntentDetector;

class FacilityIntentHandler implements IntentHandlerInterface
{
    protected array $typeLabels = [
        'hotel'      => ['title' => 'Hotel & Penginapan Terdekat', 'icon' => '🏨'],
        'hospital'   => ['title' => 'Rumah Sakit Terdekat', 'icon' => '🏥'],
        'puskesmas'  => ['title' => 'Puskesmas Terdekat', 'icon' => '🩺'],
        'restaurant' => ['title' => 'Restoran & Tempat Kuliner Terdekat', 'icon' => '🍽️'],
        'police'     => ['title' => 'Polres / Polsek Keamanan Terdekat', 'icon' => '👮'],
        'pharmacy'   => ['title' => 'Apotek Terdekat', 'icon' => '💊'],
        'transport'  => ['title' => 'Sewa Kendaraan & Transportasi Terdekat', 'icon' => '🚗'],
    ];

    public function __construct(
        protected KnowledgeRepositoryInterface $repository
    ) {}

    public function canHandle(ChatContext $context): bool
    {
        // Dua jalur: intent-based (primary) atau facilityType legacy (fallback)
        if ($context->hasIntent() && IntentDetector::isFacilityIntent($context->intent)) {
            return true;
        }
        return $context->hasFacilityType();
    }

    public function handle(ChatContext $context): ChatResponse
    {
        // Resolve facility type: dari intent (priority) atau dari legay facilityType
        $facilityType = IntentDetector::intentToFacilityType($context->intent ?? '')
            ?? $context->facilityType;

        // Resolve venue dari cabor atau venue langsung atau session fallback
        $venueName   = null;
        $contextLabel = '';

        if ($context->hasCabor()) {
            $caborVenue = $this->repository->findVenue($context->cabor['venue']);
            if ($caborVenue) {
                $venueName    = $caborVenue['nama'];
                $contextLabel = "cabor <strong>{$context->cabor['nama']}</strong> (venue <strong>{$venueName}</strong>)";
            }
        }

        if (!$venueName && $context->hasVenue()) {
            $venueName    = $context->venue['nama'];
            $contextLabel = "venue <strong>{$venueName}</strong>";
        }

        if (!$venueName) {
            $sessionVenue = $context->sessionVenue;
            $sessionCabor = $context->sessionCabor;

            if ($sessionVenue) {
                $venueName    = $sessionVenue;
                $caborLabel   = $sessionCabor ? "cabor {$sessionCabor} / " : "";
                $contextLabel = "{$caborLabel}venue <strong>{$venueName}</strong>";
            } else {
                $venueName    = "GOR Pajajaran Indoor A";
                $contextLabel = "venue <strong>GOR Pajajaran Indoor A</strong>";
            }
        }

        $facList = $this->repository->getFacilitiesForVenue($venueName, $facilityType);
        $meta    = $this->typeLabels[$facilityType] ?? ['title' => 'Fasilitas Terdekat', 'icon' => '📍'];

        if (empty($facList)) {
            return new ChatResponse(
                answer: "{$meta['icon']} Belum ada data <strong>{$meta['title']}</strong> yang terdaftar untuk {$contextLabel}.",
                button: ["text" => "📍 Buka Peta Venue", "url" => "/peta-venue"]
            );
        }

        $html = "{$meta['icon']} <strong>{$meta['title']} dari {$contextLabel}</strong>:<br><br>";

        foreach ($facList as $index => $item) {
            $num   = $index + 1;
            $html .= "<strong>{$num}. {$item['name']}</strong><br>";
            $html .= "&nbsp;&nbsp;📍 Alamat: {$item['address']}<br>";
            $html .= "&nbsp;&nbsp;📏 Jarak: <strong>{$item['distance']}</strong><br>";
            if (!empty($item['gmaps'])) {
                $html .= "&nbsp;&nbsp;🔗 <a href='{$item['gmaps']}' target='_blank' style='color:#2563eb; text-decoration:underline;'>Buka di Google Maps</a><br>";
            }
            $html .= "<br>";
        }

        return new ChatResponse(
            answer: $html,
            button: ["text" => "📍 Lihat di Peta Venue", "url" => "/peta-venue"]
        );
    }
}
