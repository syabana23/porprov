<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FacilityRequest;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index(Request $request)
    {
        $query = Facility::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('type_label', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%")
                    ->orWhere('related_venue', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $facilities = $query->orderBy('sort_order')->orderBy('name')->paginate(15)->withQueryString();
        $types = Facility::select('type', 'type_label')->distinct()->get();

        $stats = [
            'total' => Facility::count(),
            'hotel' => Facility::where('type', 'hotel')->count(),
            'rs' => Facility::where('type', 'rs')->count(),
            'puskesmas' => Facility::where('type', 'puskesmas')->count(),
            'apotek' => Facility::where('type', 'apotek')->count(),
            'polsek' => Facility::where('type', 'polsek')->count(),
            'restoran' => Facility::where('type', 'restoran')->count(),
            'transport' => Facility::where('type', 'transport')->count(),
            'rekreasi' => Facility::where('type', 'rekreasi')->count(),
            'mall' => Facility::where('type', 'mall')->count(),
        ];

        return view('admin.facilities.index', compact('facilities', 'types', 'stats'));
    }

    public function create()
    {
        $this->authorizeAction();
        return view('admin.facilities.create');
    }

    public function store(FacilityRequest $request)
    {
        $this->authorizeAction();
        $data = $request->validated();

        if (!isset($data['sort_order']) || $data['sort_order'] === null) {
            $data['sort_order'] = 0;
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('facilities', 'public');
        }

        Facility::create($data);

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function show(Facility $facility)
    {
        return view('admin.facilities.show', compact('facility'));
    }

    public function edit(Facility $facility)
    {
        $this->authorizeAction();
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(FacilityRequest $request, Facility $facility)
    {
        $this->authorizeAction();
        $data = $request->validated();

        if (array_key_exists('sort_order', $data) && $data['sort_order'] === null) {
            unset($data['sort_order']);
        }

        if ($request->hasFile('image')) {
            if ($facility->image && Storage::disk('public')->exists($facility->image)) {
                Storage::disk('public')->delete($facility->image);
            }
            $data['image'] = $request->file('image')->store('facilities', 'public');
        }

        $facility->update($data);

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Facility $facility)
    {
        $this->authorizeAction();
        if ($facility->image && Storage::disk('public')->exists($facility->image)) {
            Storage::disk('public')->delete($facility->image);
        }
        $facility->delete();

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil dihapus.');
    }

    private function authorizeAction(): void
    {
        $user = auth()->user();
        if (!$user || (!$user->isSuperAdmin() && !$user->isAdmin())) {
            abort(403, 'Hanya Admin atau Superadmin yang dapat mengelola data ini.');
        }
    }
}
