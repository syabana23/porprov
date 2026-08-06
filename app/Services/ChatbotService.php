<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class ChatbotService
{
    protected KnowledgeService $knowledge;
    protected TextMatcher $matcher;

    public function __construct(
        KnowledgeService $knowledge,
        TextMatcher $matcher
    ) {
        $this->knowledge = $knowledge;
        $this->matcher = $matcher;
    }

    public function getResponse($message)
    {
        $bestScore = 0;
        $bestAnswer = null;

        foreach ($this->knowledge->all() as $item) {

            $score = $this->matcher->score(
                $message,
                $item["questions"]
            );

            if ($score > $bestScore) {

                $bestScore = $score;

                $bestAnswer = [
                    "answer" => $item["answer"],
                    "button" => $item["button"] ?? null
                ];
            }
        }

        if ($bestScore >= 1) {

            return $bestAnswer;
        }

        return [
            "answer" => "Maaf, saya belum memahami pertanyaan tersebut.",
            "button" => null
        ];
    }
}
