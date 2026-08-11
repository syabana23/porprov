<?php

namespace App\Providers;

use App\Contracts\KnowledgeRepositoryInterface;
use App\Repositories\JsonKnowledgeRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(KnowledgeRepositoryInterface::class, JsonKnowledgeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
