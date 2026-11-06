<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contingent;
use App\Models\Standing;
use Illuminate\Http\Request;

class StandingController extends Controller
{
    public function index(Request $request)
    {
        $query = Standing::with('contingent')
            ->join('contingents', 'standings.contingent_id', '=', 'contingents.id');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('contingents.name', 'like', "%{$search}%");
        }

        $standings = $query->orderBy('standings.gold', 'desc')
            ->orderBy('standings.silver', 'desc')
            ->orderBy('standings.bronze', 'desc')
            ->select('standings.*')
            ->get();

        $contingents = Contingent::whereDoesntHave('standing')->orderBy('name')->get();

        return view('admin.standings.index', compact('standings', 'contingents'));
    }

    public function create()
    {
        $this->authorizeAction();
        $contingents = Contingent::whereDoesntHave('standing')->orderBy('name')->get();

        return view('admin.standings.create', compact('contingents'));
    }

    public function edit(Standing $standing)
    {
        $this->authorizeAction();
        $standing->load('contingent');

        return view('admin.standings.edit', compact('standing'));
    }

    public function update(Request $request, Standing $standing)
    {
        $this->authorizeAction();

        $request->validate([
            'gold' => ['required', 'integer', 'min:0'],
            'silver' => ['required', 'integer', 'min:0'],
            'bronze' => ['required', 'integer', 'min:0'],
        ]);

        $gold = (int) $request->input('gold', 0);
        $silver = (int) $request->input('silver', 0);
        $bronze = (int) $request->input('bronze', 0);

        $standing->update([
            'gold' => $gold,
            'silver' => $silver,
            'bronze' => $bronze,
            'total' => $gold + $silver + $bronze,
            'updated_by' => auth()->id(),
        ]);

        Standing::recalculateRanks();

        return redirect()->route('admin.standings.index')->with('success', 'Klasemen medali berhasil diperbarui.');
    }

    public function bulkUpdate(Request $request)
    {
        $this->authorizeAction();
        $data = $request->input('standings', []);

        foreach ($data as $standingId => $values) {
            $standing = Standing::find($standingId);
            if (!$standing) {
                continue;
            }

            $gold = (int) ($values['gold'] ?? 0);
            $silver = (int) ($values['silver'] ?? 0);
            $bronze = (int) ($values['bronze'] ?? 0);

            $standing->update([
                'gold' => $gold,
                'silver' => $silver,
                'bronze' => $bronze,
                'total' => $gold + $silver + $bronze,
                'updated_by' => auth()->id(),
            ]);
        }

        Standing::recalculateRanks();

        return redirect()->route('admin.standings.index')->with('success', 'Klasemen medali berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        $this->authorizeAction();
        $request->validate([
            'contingent_id' => ['required', 'exists:contingents,id', 'unique:standings,contingent_id'],
            'gold'   => ['nullable', 'integer', 'min:0'],
            'silver' => ['nullable', 'integer', 'min:0'],
            'bronze' => ['nullable', 'integer', 'min:0'],
        ]);

        $gold   = (int) $request->input('gold', 0);
        $silver = (int) $request->input('silver', 0);
        $bronze = (int) $request->input('bronze', 0);

        Standing::create([
            'contingent_id' => $request->contingent_id,
            'gold'   => $gold,
            'silver' => $silver,
            'bronze' => $bronze,
            'total'  => $gold + $silver + $bronze,
            'updated_by' => auth()->id(),
        ]);

        Standing::recalculateRanks();

        return redirect()->route('admin.standings.index')->with('success', 'Data perolehan medali berhasil ditambahkan.');
    }

    public function destroy(Standing $standing)
    {
        $this->authorizeAction();
        $standing->delete();

        Standing::recalculateRanks();

        return redirect()->route('admin.standings.index')->with('success', 'Data klasemen berhasil dihapus.');
    }

    private function authorizeAction(): void
    {
        $user = auth()->user();
        if (!$user || (!$user->isSuperAdmin() && !$user->isAdmin())) {
            abort(403, 'Hanya Admin atau Superadmin yang dapat mengelola data ini.');
        }
    }
}
