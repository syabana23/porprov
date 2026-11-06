<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScheduleRequest;
use App\Models\Contingent;
use App\Models\Schedule;
use App\Models\Sport;
use App\Models\Venue;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $query = Schedule::with(['sport', 'venue', 'contingent', 'opponentContingent']);

        if ($request->filled('sport_id')) {
            $query->where('sport_id', $request->sport_id);
        }

        if ($request->filled('venue_id')) {
            $query->where('venue_id', $request->venue_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date')) {
            $query->whereDate('match_date', $request->date);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('match_title', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhereHas('sport', fn($sq) => $sq->where('name', 'like', "%{$search}%"))
                    ->orWhereHas('venue', fn($vq) => $vq->where('name', 'like', "%{$search}%"))
                    ->orWhereHas('contingent', fn($cq) => $cq->where('name', 'like', "%{$search}%"))
                    ->orWhereHas('opponentContingent', fn($ocq) => $ocq->where('name', 'like', "%{$search}%"));
            });
        }

        $schedules = $query->orderBy('match_date')->orderBy('start_time')->paginate(15)->withQueryString();
        $sports = Sport::orderBy('name')->get();
        $venues = Venue::orderBy('name')->get();

        return view('admin.schedules.index', compact('schedules', 'sports', 'venues'));
    }

    public function create()
    {
        $this->authorizeAction();
        $sports = Sport::orderBy('name')->get();
        $venues = Venue::orderBy('name')->get();
        $contingents = Contingent::orderBy('name')->get();
        return view('admin.schedules.create', compact('sports', 'venues', 'contingents'));
    }

    public function store(ScheduleRequest $request)
    {
        $this->authorizeAction();
        $data = $request->validated();
        $data['created_by'] = auth()->id();

        Schedule::create($data);

        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal pertandingan berhasil ditambahkan.');
    }

    public function show(Schedule $schedule)
    {
        $schedule->load(['sport', 'venue', 'contingent', 'opponentContingent', 'creator']);
        return view('admin.schedules.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        $this->authorizeAction();
        $sports = Sport::orderBy('name')->get();
        $venues = Venue::orderBy('name')->get();
        $contingents = Contingent::orderBy('name')->get();
        return view('admin.schedules.edit', compact('schedule', 'sports', 'venues', 'contingents'));
    }

    public function update(ScheduleRequest $request, Schedule $schedule)
    {
        $this->authorizeAction();
        $data = $request->validated();
        $schedule->update($data);

        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal pertandingan berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule)
    {
        $this->authorizeAction();
        $schedule->delete();

        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal pertandingan berhasil dihapus.');
    }

    private function authorizeAction(): void
    {
        $user = auth()->user();
        if (!$user || (!$user->isSuperAdmin() && !$user->isAdmin())) {
            abort(403, 'Hanya Admin atau Superadmin yang dapat mengelola data ini.');
        }
    }
}
