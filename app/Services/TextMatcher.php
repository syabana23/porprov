<?php

namespace App\Services;

class TextMatcher
{

    private array $synonyms = [

        "lokasi" => "venue",

        "tempat" => "venue",

        "gor" => "venue",

        "stadion" => "venue",

        "arena" => "venue",

        "lapangan" => "venue",

        "main" => "pertandingan",

        "bertanding" => "pertandingan",

        "opening" => "pembukaan",

        "opening ceremony" => "pembukaan",

        "closing" => "penutupan",

    ];

    public function normalize($text)
    {
        $text = strtolower($text);

        foreach ($this->synonyms as $from => $to) {

            $text = str_replace($from, $to, $text);
        }

        $text = preg_replace('/[^a-z0-9\s]/', '', $text);

        $text = preg_replace('/\s+/', ' ', $text);

        return trim($text);
    }

    public function score($message, $questions)
    {
        $messageWords = explode(' ', $this->normalize($message));

        $bestScore = 0;

        foreach ($questions as $question) {

            $questionWords = explode(' ', $this->normalize($question));

            $matched = array_intersect($messageWords, $questionWords);

            $score = count($matched);

            if ($score > $bestScore) {

                $bestScore = $score;
            }
        }

        return $bestScore;
    }
}
