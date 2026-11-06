<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Contingent;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Schedule;
use App\Models\Sport;
use App\Models\Venue;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'schedules' => Schedule::count(),
            'venues' => Venue::count(),
            'sports' => Sport::count(),
            'contingents' => Contingent::count(),
            'facilities' => Facility::count(),
            'galleries' => Gallery::count(),
        ];

        $recentActivities = ActivityLog::with('user')->latest('created_at')->take(10)->get();

        $todaySchedules = Schedule::with(['sport', 'venue', 'contingent', 'opponentContingent'])
            ->whereDate('match_date', today())
            ->orderBy('start_time')
            ->get();

        return view('admin.dashboard', compact('stats', 'recentActivities', 'todaySchedules'));
    }
}
