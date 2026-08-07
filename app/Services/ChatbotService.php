<?php

namespace App\Services;

use App\Contracts\IntentHandlerInterface;
use App\Contracts\KnowledgeRepositoryInterface;
use App\Services\Chatbot\ChatContext;
use App\Services\Chatbot\ChatResponse;
use App\Services\Chatbot\IntentResolver;
use App\Services\Chatbot\Intents\CaborListIntentHandler;
use App\Services\Chatbot\Intents\FacilityIntentHandler;
use App\Services\Chatbot\Intents\FAQIntentHandler;
use App\Services\Chatbot\Intents\FallbackIntentHandler;
use App\Services\Chatbot\Intents\GoogleMapsIntentHandler;
use App\Services\Chatbot\Intents\RouteIntentHandler;
use App\Services\Chatbot\Intents\ScheduleIntentHandler;
use App\Services\Chatbot\Intents\UnregisteredSportHandler;
use App\Services\Chatbot\Intents\VenueLocationIntentHandler;
use Illuminate\Support\Facades\Cache;

class ChatbotService
{
    /** @var IntentHandlerInterface[] */
    protected array $handlers = [];

    public function __construct(
        protected KnowledgeRepositoryInterface $repository,
        protected IntentResolver $resolver,
        UnregisteredSportHandler $unregisteredHandler,
        GoogleMapsIntentHandler $googleMapsHandler,
        FacilityIntentHandler $facilityHandler,
        RouteIntentHandler $routeHandler,
        ScheduleIntentHandler $scheduleHandler,
        CaborListIntentHandler $caborListHandler,
        VenueLocationIntentHandler $venueHandler,
        FAQIntentHandler $faqHandler,
        FallbackIntentHandler $fallbackHandler
    ) {
        /**
         * Handler chain — urutan menentukan prioritas.
         * Semakin atas, semakin tinggi prioritas.
         */
        $this->handlers = [
            $unregisteredHandler,   // Olahraga tidak terdaftar (basket, futsal, dll)
            $googleMapsHandler,     // Intent Google Maps
            $facilityHandler,       // Hotel, RS, Puskesmas, Restoran, Apotek, Polsek, Transport
            $routeHandler,          // Rute / transportasi ke venue
            $scheduleHandler,       // Jadwal pertandingan
            $caborListHandler,      // Daftar semua cabor
            $venueHandler,          // Lokasi venue / cabor
            $faqHandler,            // FAQ umum (halo, apa itu porprov, dll)
            $fallbackHandler,       // Fallback terakhir
        ];
    }

    public function getResponse(string $message): array
    {
        $trimMsg = trim($message);
        if (empty($trimMsg)) {
            return (new ChatResponse("Silakan ketikkan pertanyaan Anda seputar PORPROV Jabar XV Kota Bogor 2026."))->toArray();
        }

        $sessionKeys  = config('chatbot.session_keys') ?? [];
        $lastVenueKey = $sessionKeys['last_venue'] ?? 'last_venue';
        $lastCaborKey = $sessionKeys['last_cabor'] ?? 'last_cabor';

        $sessionVenue = session($lastVenueKey, '');
        $sessionCabor = session($lastCaborKey, '');

        $cacheKey = 'cb_resp_' . md5(strtolower($trimMsg) . '|' . $sessionVenue . '|' . $sessionCabor);

        return Cache::remember($cacheKey, 600, function () use ($message) {
            // 1. Resolve Context (Intent + Entities)
            $context = $this->resolver->resolveContext($message);

            // 2. Update Session State
            $this->updateSessionState($context);

            // 3. Find and Execute matching Intent Handler
            foreach ($this->handlers as $handler) {
                if ($handler->canHandle($context)) {
                    return $handler->handle($context)->toArray();
                }
            }

            return (new ChatResponse("Maaf, terjadi kesalahan saat memproses pertanyaan Anda."))->toArray();
        });
    }

    protected function updateSessionState(ChatContext $context): void
    {
        $keys         = config('chatbot.session_keys') ?? [];
        $lastCaborKey = $keys['last_cabor'] ?? 'last_cabor';
        $lastVenueKey = $keys['last_venue'] ?? 'last_venue';

        if ($context->hasCabor()) {
            session([$lastCaborKey => $context->cabor['nama']]);
            $venueForCabor = $this->repository->findVenue($context->cabor['venue']);
            if ($venueForCabor) {
                session([$lastVenueKey => $venueForCabor['nama']]);
            }
        } elseif ($context->hasVenue()) {
            session([$lastVenueKey => $context->venue['nama']]);
        }
    }
}
