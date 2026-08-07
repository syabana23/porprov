<?php

namespace App\Services\Chatbot\Intents;

use App\Contracts\IntentHandlerInterface;
use App\Services\Chatbot\ChatContext;
use App\Services\Chatbot\ChatResponse;
use App\Services\Chatbot\IntentResolver;

class ScheduleIntentHandler implements IntentHandlerInterface
{
    public function __construct(
        protected IntentResolver $resolver
    ) {}

    public function canHandle(ChatContext $context): bool
    {
        if ($context->intentIs('schedule')) {
            return true;
        }
        return $this->resolver->isScheduleQuery($context->rawMessage);
    }

    public function handle(ChatContext $context): ChatResponse
    {
        $caborInfo = $context->hasCabor() ? " untuk cabor <strong>{$context->cabor['nama']}</strong>" : "";

        return new ChatResponse(
            answer: "📅 <strong>Jadwal Pertandingan PORPROV Jabar XV</strong>{$caborInfo}:<br>Silakan lihat menu Jadwal untuk rincian lengkap tanggal, waktu, dan statistik pertandingan.",
            button: [
                "text" => "📅 Lihat Jadwal Pertandingan",
                "url" => "/jadwal"
            ]
        );
    }
}
