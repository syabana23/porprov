<?php

namespace App\Services\Chatbot\Intents;

use App\Contracts\IntentHandlerInterface;
use App\Services\Chatbot\ChatContext;
use App\Services\Chatbot\ChatResponse;

class UnregisteredSportHandler implements IntentHandlerInterface
{
    public function canHandle(ChatContext $context): bool
    {
        return $context->hasUnregisteredSport() && !$context->hasCabor();
    }

    public function handle(ChatContext $context): ChatResponse
    {
        $sportName = $context->unregisteredSport;

        $html = "ℹ️ <strong>Informasi Cabang Olahraga</strong>:<br>";
        $html .= "Cabang olahraga <strong>{$sportName}</strong> tidak terdaftar dalam 28 Cabor Resmi yang dipertandingkan pada <strong>PORPROV Jabar XV Kota Bogor 2026</strong>.<br><br>";
        $html .= "🏆 <strong>Berikut 28 Cabor Resmi yang dipertandingkan:</strong><br>";
        $html .= "• <i>Aerosport (Gantolle & Paralayang)</i><br>";
        $html .= "• <i>Anggar, Dansa, Angkat Berat, Angkat Besi, Arung Jeram, Binaraga</i><br>";
        $html .= "• <i>Bola Tangan Indoor & Bola Tangan Pasir</i><br>";
        $html .= "• <i>Drumband, Gimnastik (Aerobik, Artistik, Ritmik)</i><br>";
        $html .= "• <i>Judo, Kurash, Menembak, Modern Pentathlon</i><br>";
        $html .= "• <i>Panahan, Panjat Tebing, Pencak Silat, Petanque</i><br>";
        $html .= "• <i>Sambo, Shorinji Kempo, Ski Air, Taekwondo, Tarung Derajat, Tenis Meja</i><br><br>";
        $html .= "Silakan tanyakan lokasi venue atau hotel terdekat untuk salah satu cabor di atas!";

        return new ChatResponse(
            answer: $html,
            button: [
                "text" => "📍 Buka Peta Venue",
                "url" => "/peta-venue"
            ]
        );
    }
}
