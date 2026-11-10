<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContingentRequest;
use App\Models\Contingent;
use App\Models\Standing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContingentController extends Controller
{
    public function index(Request $request)
    {
        $query = Contingent::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('regency', 'like', "%{$search}%")
                    ->orWhere('province', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $contingents = $query->orderBy('sort_order')->orderBy('name')->paginate(15)->withQueryString();

        $stats = [
            'total_contingents' => Contingent::count(),
            'total_athletes' => Contingent::sum('athlete_count'),
            'total_officials' => Contingent::sum('official_count'),
            'total_sports' => \App\Models\Sport::count(),
        ];

        return view('admin.contingents.index', compact('contingents', 'stats'));
    }

    public function create()
    {
        $this->authorizeAction();
        return view('admin.contingents.create');
    }

    public function store(ContingentRequest $request)
    {
        $this->authorizeAction();
        $data = $request->validated();

        if (!isset($data['sort_order']) || $data['sort_order'] === null) {
            $data['sort_order'] = 0;
        }

        if (empty($data['slug']) && !empty($data['name'])) {
            $data['slug'] = $this->generateUniqueSlug($data['name']);
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('contingents', 'public');
        }

        $contingent = Contingent::create($data);

        Standing::firstOrCreate(['contingent_id' => $contingent->id], [
            'gold' => 0,
            'silver' => 0,
            'bronze' => 0,
            'total' => 0,
        ]);

        return redirect()->route('admin.contingents.index')->with('success', 'Kontingen berhasil ditambahkan.');
    }

    public function show(Contingent $contingent)
    {
        $contingent->load('standing');
        return view('admin.contingents.show', compact('contingent'));
    }

    public function edit(Contingent $contingent)
    {
        $this->authorizeAction();
        return view('admin.contingents.edit', compact('contingent'));
    }

    public function update(ContingentRequest $request, Contingent $contingent)
    {
        $this->authorizeAction();
        $data = $request->validated();

        if (array_key_exists('sort_order', $data) && $data['sort_order'] === null) {
            unset($data['sort_order']);
        }

        if (empty($data['slug']) && !empty($data['name'])) {
            $data['slug'] = $this->generateUniqueSlug($data['name'], $contingent->id);
        }

        if ($request->hasFile('logo')) {
            if ($contingent->logo && Storage::disk('public')->exists($contingent->logo)) {
                Storage::disk('public')->delete($contingent->logo);
            }
            $data['logo'] = $request->file('logo')->store('contingents', 'public');
        }

        $contingent->update($data);

        return redirect()->route('admin.contingents.index')->with('success', 'Kontingen berhasil diperbarui.');
    }

    public function destroy(Contingent $contingent)
    {
        $this->authorizeAction();
        if ($contingent->logo && Storage::disk('public')->exists($contingent->logo)) {
            Storage::disk('public')->delete($contingent->logo);
        }
        $contingent->delete();

        return redirect()->route('admin.contingents.index')->with('success', 'Kontingen berhasil dihapus.');
    }

    private function authorizeAction(): void
    {
        $user = auth()->user();
        if (!$user || (!$user->isSuperAdmin() && !$user->isAdmin())) {
            abort(403, 'Hanya Admin atau Superadmin yang dapat mengelola data ini.');
        }
    }

    private function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (Contingent::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
