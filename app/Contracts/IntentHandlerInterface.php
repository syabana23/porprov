<?php

namespace App\Contracts;

use App\Services\Chatbot\ChatContext;
use App\Services\Chatbot\ChatResponse;

interface IntentHandlerInterface
{
    public function canHandle(ChatContext $context): bool;

    public function handle(ChatContext $context): ChatResponse;
}
