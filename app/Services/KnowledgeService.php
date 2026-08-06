<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class KnowledgeService
{
    protected array $knowledge;

    public function __construct()
    {
        $path = storage_path('app/chatbot/knowledge.json');

        if (!File::exists($path)) {
            $this->knowledge = [];
            return;
        }

        $this->knowledge = json_decode(File::get($path), true);
    }

    public function all()
    {
        return $this->knowledge;
    }
}
