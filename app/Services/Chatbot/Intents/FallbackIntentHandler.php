<?php

namespace App\Services\Chatbot\Intents;

use App\Contracts\IntentHandlerInterface;
use App\Services\Chatbot\ChatContext;
use App\Services\Chatbot\ChatResponse;

class FallbackIntentHandler implements IntentHandlerInterface
{
    public function canHandle(ChatContext $context): bool
    {
        return true; // Fallback handler always handles if reached
    }

    public function handle(ChatContext $context): ChatResponse
    {
        return new ChatResponse(
            answer: "Maaf, saya belum memahami pertanyaan tersebut.<br><br>Anda dapat menanyakan hal seperti:<br>• 📍 <i>'Dimana venue pencak silat?'</i><br>• 🏨 <i>'Hotel terdekat dari venue pencak silat ada apa?'</i><br>• 🏥 <i>'Rumah sakit terdekat dari GOR Pajajaran'</i><br>• 📅 <i>'Jadwal pertandingan'</i>",
            button: [
                "text" => "📍 Buka Peta Venue",
                "url" => "/peta-venue"
            ]
        );
    }
}
