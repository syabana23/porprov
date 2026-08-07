<?php

namespace App\Services\Chatbot\Intents;

use App\Contracts\IntentHandlerInterface;
use App\Services\Chatbot\ChatContext;
use App\Services\Chatbot\ChatResponse;
use App\Services\Chatbot\IntentResolver;

class RouteIntentHandler implements IntentHandlerInterface
{
    protected array $routesData = [
        'GOR Pajajaran' => [
            'KRL + Angkot via Jl. Pemuda (Naik KRL turun Stasiun Bogor -> Angkot 07/17/18/23 turun depan GOR Pajajaran)',
            'BisKita Trans Pakuan Koridor 5/6 (Turun halte GOR/Air Mancur)',
            'Dari Terminal Baranangsiang (Angkot 07/17/18)'
        ],
        'Green Forest Hotel' => [
            'KRL + Angkot via Jl. Pahlawan (Turun Stasiun Bogor -> Angkot 01/08 turun depan Green Forest Hotel)',
            'Angkot 02 (Lawang Saketeng - BTM via Jl. Pahlawan)'
        ],
        'Gymnasium Sekolah Vokasi IPB' => [
            'KRL + Angkot 03/30 (Turun Stasiun Bogor -> Angkot 03/30 turun Jl. Lodaya/Kumbang)',
            'BisKita Koridor 1 (Turun Botani Square -> jalan kaki ±10 menit ke Cilibende)'
        ],
        'GOR Yasmin' => [
            'KRL + Angkot Yasmin (Stasiun Bogor -> Angkot 01/11/12/26 turun Ruko Taman Yasmin)',
            'BisKita Koridor 1 (Turun halte Ruko Yasmin / RS Hermina)'
        ]
    ];

    public function __construct(
        protected IntentResolver $resolver
    ) {}

    public function canHandle(ChatContext $context): bool
    {
        if ($context->intentIs('route')) {
            return true;
        }
        return $this->resolver->isRouteQuery($context->rawMessage);
    }

    public function handle(ChatContext $context): ChatResponse
    {
        $venueName = $context->getActiveVenueName() ?? 'GOR Pajajaran Indoor A';

        $matchedKey = null;
        foreach (array_keys($this->routesData) as $key) {
            if (str_contains(strtolower($venueName), strtolower($key)) || str_contains(strtolower($key), strtolower($venueName))) {
                $matchedKey = $key;
                break;
            }
        }

        if (!$matchedKey) {
            return new ChatResponse(
                answer: "🚌 <strong>Rute Perjalanan ke {$venueName}</strong>:<br>Anda dapat menuju {$venueName} menggunakan transportasi umum lokal (Angkot/KRL/BisKita) atau transportasi online.",
                button: [
                    "text" => "📍 Lihat Peta & Rute Lengkap",
                    "url" => "/peta-venue"
                ]
            );
        }

        $html = "🚌 <strong>Rute & Akses Transportasi ke {$venueName}</strong>:<br><br>";
        foreach ($this->routesData[$matchedKey] as $idx => $step) {
            $num = $idx + 1;
            $html .= "<strong>{$num}.</strong> {$step}<br>";
        }

        return new ChatResponse(
            answer: $html,
            button: [
                "text" => "📍 Buka Peta Venue",
                "url" => "/peta-venue"
            ]
        );
    }
}
