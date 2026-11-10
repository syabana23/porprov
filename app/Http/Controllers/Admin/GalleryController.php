<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($request->filled('media_type')) {
            $query->where('media_type', $request->media_type);
        }

        if ($request->filled('status')) {
            $query->where('is_published', $request->status === 'published');
        }

        $galleries = $query->orderBy('sort_order')->orderByDesc('created_at')->paginate(15)->withQueryString();

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        $this->authorizeAction();
        return view('admin.galleries.create');
    }

    public function store(GalleryRequest $request)
    {
        $this->authorizeAction();
        $data = $request->validated();

        if (!isset($data['sort_order']) || $data['sort_order'] === null) {
            $data['sort_order'] = 0;
        }

        if (empty($data['slug']) && !empty($data['title'])) {
            $data['slug'] = $this->generateUniqueSlug($data['title']);
        }

        if ($request->hasFile('file') && $data['media_type'] === 'image') {
            $data['file_path'] = $request->file('file')->store('galleries', 'public');
        }

        if ($data['is_published'] ?? false) {
            $data['published_at'] = now();
        }

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery)
    {
        $this->authorizeAction();
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
        $this->authorizeAction();
        $data = $request->validated();

        if (array_key_exists('sort_order', $data) && $data['sort_order'] === null) {
            unset($data['sort_order']);
        }

        if (empty($data['slug']) && !empty($data['title'])) {
            $data['slug'] = $this->generateUniqueSlug($data['title'], $gallery->id);
        }

        if ($request->hasFile('file') && $data['media_type'] === 'image') {
            if ($gallery->file_path && Storage::disk('public')->exists($gallery->file_path)) {
                Storage::disk('public')->delete($gallery->file_path);
            }
            $data['file_path'] = $request->file('file')->store('galleries', 'public');
        }

        if (($data['is_published'] ?? false) && !$gallery->published_at) {
            $data['published_at'] = now();
        } elseif (!($data['is_published'] ?? false)) {
            $data['published_at'] = null;
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        $this->authorizeAction();
        if ($gallery->file_path && Storage::disk('public')->exists($gallery->file_path)) {
            Storage::disk('public')->delete($gallery->file_path);
        }
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil dihapus.');
    }

    private function authorizeAction(): void
    {
        $user = auth()->user();
        if (!$user || (!$user->isSuperAdmin() && !$user->isAdmin())) {
            abort(403, 'Hanya Admin atau Superadmin yang dapat mengelola data ini.');
        }
    }

    private function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (Gallery::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
