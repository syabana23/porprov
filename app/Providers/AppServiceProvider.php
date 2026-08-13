<?php

namespace App\Providers;

use App\Contracts\KnowledgeRepositoryInterface;
use App\Repositories\JsonKnowledgeRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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
        View::composer('partials.footer', function ($view) {
            if (!session()->has('visited_session')) {
                session()->put('visited_session', true);
                Cache::increment('total_visit_count');
                Cache::increment('visit_count_today_' . date('Ymd'));
            }

            $visitCount = Cache::get('total_visit_count', 1245);
            $todayVisitors = Cache::get('visit_count_today_' . date('Ymd'), 0);

            // Online users: sessions active in last 15 minutes
            $onlineUsers = 1;
            try {
                $onlineUsers = DB::table('sessions')
                    ->where('last_activity', '>=', time() - 900)
                    ->count();
            } catch (\Exception $e) {
                // fallback if sessions table not available
            }

            $view->with('visitCount', $visitCount);
            $view->with('todayVisitors', $todayVisitors);
            $view->with('onlineUsers', $onlineUsers);
        });
    }
}
