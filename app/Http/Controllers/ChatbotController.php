<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatbotService;

class ChatbotController extends Controller
{
    public function __construct(
        protected ChatbotService $chatbot
    ) {}

    public function chat(Request $request)
    {
        $response = $this->chatbot->getResponse($request->message);

        return response()->json($response);
    }
}
