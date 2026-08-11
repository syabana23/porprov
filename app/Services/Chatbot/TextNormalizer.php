<?php

namespace App\Services\Chatbot;

class TextNormalizer
{
    protected array $synonyms;

    public function __construct(?array $synonyms = null)
    {
        $this->synonyms = $synonyms ?? config('chatbot.synonyms', []);
    }

    public function normalize(string $text): string
    {
        $text = strtolower($text);

        foreach ($this->synonyms as $from => $to) {
            $text = str_replace($from, $to, $text);
        }

        $text = preg_replace('/[^a-z0-9\s]/', '', $text);
        $text = preg_replace('/\s+/', ' ', $text);

        return trim($text);
    }
}
