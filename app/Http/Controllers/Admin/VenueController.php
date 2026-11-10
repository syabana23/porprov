<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VenueRequest;
use App\Models\District;
use App\Models\Sport;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VenueController extends Controller
{
    public function index(Request $request)
    {
        $query = Venue::with('sports');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('sports', fn($sq) => $sq->where('name', 'like', "%{$search}%"));
            });
        }

        if ($request->filled('sport_id')) {
            $query->whereHas('sports', function ($q) use ($request) {
                $q->where('id', $request->sport_id);
            });
        }

        if ($request->filled('district')) {
            $query->where('address', 'like', "%{$request->district}%");
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $venues = $query->orderBy('sort_order')->orderBy('name')->paginate(15)->withQueryString();
        $sports = Sport::orderBy('name')->get();
        $districts = District::orderBy('name')->get();

        return view('admin.venues.index', compact('venues', 'sports', 'districts'));
    }

    public function create()
    {
        $this->authorizeAction();
        $sports = Sport::orderBy('name')->get();
        $districts = District::orderBy('name')->get();
        return view('admin.venues.create', compact('sports', 'districts'));
    }

    public function store(VenueRequest $request)
    {
        $this->authorizeAction();
        $data = $request->validated();

        if (!isset($data['sort_order']) || $data['sort_order'] === null) {
            $data['sort_order'] = 0;
        }

        if (empty($data['slug']) && !empty($data['name'])) {
            $data['slug'] = $this->generateUniqueSlug($data['name']);
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('venues', 'public');
        }

        Venue::create($data);

        return redirect()->route('admin.venues.index')->with('success', 'Venue berhasil ditambahkan.');
    }

    public function show(Venue $venue)
    {
        return view('admin.venues.show', compact('venue'));
    }

    public function edit(Venue $venue)
    {
        $this->authorizeAction();
        $sports = Sport::orderBy('name')->get();
        $districts = District::orderBy('name')->get();
        $venue->load('sports');
        return view('admin.venues.edit', compact('venue', 'sports', 'districts'));
    }

    public function update(VenueRequest $request, Venue $venue)
    {
        $this->authorizeAction();
        $data = $request->validated();

        if (array_key_exists('sort_order', $data) && $data['sort_order'] === null) {
            unset($data['sort_order']);
        }

        if (empty($data['slug']) && !empty($data['name'])) {
            $data['slug'] = $this->generateUniqueSlug($data['name'], $venue->id);
        }

        if ($request->hasFile('image')) {
            if ($venue->image && Storage::disk('public')->exists($venue->image)) {
                Storage::disk('public')->delete($venue->image);
            }
            $data['image'] = $request->file('image')->store('venues', 'public');
        }

        $venue->update($data);

        return redirect()->route('admin.venues.index')->with('success', 'Venue berhasil diperbarui.');
    }

    public function destroy(Venue $venue)
    {
        $this->authorizeAction();
        if ($venue->image && Storage::disk('public')->exists($venue->image)) {
            Storage::disk('public')->delete($venue->image);
        }
        $venue->delete();

        return redirect()->route('admin.venues.index')->with('success', 'Venue berhasil dihapus.');
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

        while (Venue::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
