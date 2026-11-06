<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SportRequest;
use App\Models\Sport;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SportController extends Controller
{
    public function index(Request $request)
    {
        $query = Sport::with('venue');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($request->filled('venue_id')) {
            $query->where('venue_id', $request->venue_id);
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $sports = $query->orderBy('sort_order')->orderBy('name')->paginate(15)->withQueryString();
        $venues = Venue::orderBy('name')->get();

        return view('admin.sports.index', compact('sports', 'venues'));
    }

    public function create()
    {
        $this->authorizeAction();
        $venues = Venue::orderBy('name')->get();
        return view('admin.sports.create', compact('venues'));
    }

    public function store(SportRequest $request)
    {
        $this->authorizeAction();
        $data = $request->validated();

        if (empty($data['slug']) && !empty($data['name'])) {
            $data['slug'] = $this->generateUniqueSlug($data['name']);
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('sports', 'public');
        }

        Sport::create($data);

        return redirect()->route('admin.sports.index')->with('success', 'Cabang Olahraga berhasil ditambahkan.');
    }

    public function show(Sport $sport)
    {
        $sport->load('venue');
        return view('admin.sports.show', compact('sport'));
    }

    public function edit(Sport $sport)
    {
        $this->authorizeAction();
        $venues = Venue::orderBy('name')->get();
        return view('admin.sports.edit', compact('sport', 'venues'));
    }

    public function update(SportRequest $request, Sport $sport)
    {
        $this->authorizeAction();
        $data = $request->validated();

        if (empty($data['slug']) && !empty($data['name'])) {
            $data['slug'] = $this->generateUniqueSlug($data['name'], $sport->id);
        }

        if ($request->hasFile('logo')) {
            if ($sport->logo && Storage::disk('public')->exists($sport->logo)) {
                Storage::disk('public')->delete($sport->logo);
            }
            $data['logo'] = $request->file('logo')->store('sports', 'public');
        }

        $sport->update($data);

        return redirect()->route('admin.sports.index')->with('success', 'Cabang Olahraga berhasil diperbarui.');
    }

    public function destroy(Sport $sport)
    {
        $this->authorizeAction();
        if ($sport->logo && Storage::disk('public')->exists($sport->logo)) {
            Storage::disk('public')->delete($sport->logo);
        }
        $sport->delete();

        return redirect()->route('admin.sports.index')->with('success', 'Cabang Olahraga berhasil dihapus.');
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

        while (Sport::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
