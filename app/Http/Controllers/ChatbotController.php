<?php

namespace App\Http\Controllers;

use App\Services\ChatbotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function __construct(
        protected ChatbotService $chatbot
    ) {}

    public function chat(Request $request): JsonResponse
    {
        $request->validate([
            'message' => 'nullable|string|max:500',
        ]);

        $message = trim((string) $request->input('message', ''));

        // Safety cap: limit input length to prevent excessive regex processing
        if (mb_strlen($message) > 500) {
            $message = mb_substr($message, 0, 500);
        }

        $response = $this->chatbot->getResponse($message);

        return response()->json($response);
    }
}
