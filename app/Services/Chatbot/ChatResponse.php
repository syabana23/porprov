<?php

namespace App\Services\Chatbot;

class ChatResponse
{
    public function __construct(
        public readonly string $answer,
        public readonly ?array $button = null
    ) {}

    public function toArray(): array
    {
        return [
            'answer' => $this->answer,
            'button' => $this->button,
        ];
    }
}
