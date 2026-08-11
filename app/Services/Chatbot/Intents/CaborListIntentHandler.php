<?php

namespace App\Services\Chatbot\Intents;

use App\Contracts\IntentHandlerInterface;
use App\Contracts\KnowledgeRepositoryInterface;
use App\Services\Chatbot\ChatContext;
use App\Services\Chatbot\ChatResponse;

class CaborListIntentHandler implements IntentHandlerInterface
{
    public function __construct(
        protected KnowledgeRepositoryInterface $repository
    ) {}

    public function canHandle(ChatContext $context): bool
    {
        return $context->intentIs('cabor_list');
    }

    public function handle(ChatContext $context): ChatResponse
    {
        $cabors = $this->repository->getCabors();
        if (empty($cabors)) {
            return new ChatResponse(
                answer: "🏅 Data cabang olahraga belum tersedia.",
                button: ["text" => "📍 Peta Venue", "url" => "/peta-venue"]
            );
        }

        $html = "🏅 <strong>Daftar Cabang Olahraga PORPROV Jabar XV Kota Bogor 2026</strong> (<strong>" . count($cabors) . " Cabor</strong>):<br><br>";

        foreach ($cabors as $idx => $cabor) {
            $num   = $idx + 1;
            $html .= "<strong>{$num}.</strong> {$cabor['nama']} — <em>{$cabor['venue']}</em><br>";
        }

        return new ChatResponse(
            answer: $html,
            button: ["text" => "📍 Lihat Peta Venue", "url" => "/peta-venue"]
        );
    }
}
