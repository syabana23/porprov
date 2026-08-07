<?php

namespace App\Services\Chatbot\Intents;

use App\Contracts\IntentHandlerInterface;
use App\Contracts\KnowledgeRepositoryInterface;
use App\Services\Chatbot\ChatContext;
use App\Services\Chatbot\ChatResponse;

class FAQIntentHandler implements IntentHandlerInterface
{
    public function __construct(
        protected KnowledgeRepositoryInterface $repository
    ) {}

    public function canHandle(ChatContext $context): bool
    {
        return $this->getBestMatchingFaq($context) !== null;
    }

    public function handle(ChatContext $context): ChatResponse
    {
        $faq = $this->getBestMatchingFaq($context);
        if (!$faq) {
            return new ChatResponse(answer: "Informasi tidak ditemukan.");
        }

        return new ChatResponse(
            answer: $faq['answer'],
            button: $faq['button'] ?? null
        );
    }

    private function getBestMatchingFaq(ChatContext $context): ?array
    {
        $messageWords = explode(' ', $context->normalizedMessage);
        $bestScore = 0;
        $bestFaq = null;

        foreach ($this->repository->getFaqItems() as $item) {
            foreach ($item['questions'] as $question) {
                $questionWords = explode(' ', strtolower($question));
                $matched = array_intersect($messageWords, $questionWords);
                $score = count($matched);
                if ($score > $bestScore) {
                    $bestScore = $score;
                    $bestFaq = $item;
                }
            }
        }

        return ($bestScore >= 1) ? $bestFaq : null;
    }
}
