@extends('admin.layouts.app')

@section('title', 'Galeri - Admin Pandu Porprov')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-semibold text-blue-600">Galeri</h1>
        <p class="text-sm text-gray-500">Kelola foto dan video galeri</p>
    </div>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm mb-6">
    <div class="p-4 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3">
        <form method="GET" class="flex flex-col md:flex-row gap-3 flex-1">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama galeri..." class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <select name="media_type" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Semua Tipe</option>
                <option value="image" {{ request('media_type') == 'image' ? 'selected' : '' }}>Gambar</option>
                <option value="video" {{ request('media_type') == 'video' ? 'selected' : '' }}>Video</option>
            </select>
            <select name="status" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Semua Status</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Dipublikasikan</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
            <button class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors">Cari</button>
            <a href="{{ route('admin.galleries.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-gray-800 rounded-lg text-sm font-semibold hover:bg-gray-50 transition-colors">Reset</a>
        </form>
        @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
        <a href="{{ route('admin.galleries.create') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Galeri
        </a>
        @endif
    </div>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-semibold">Galeri</th>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-semibold">Kategori</th>
                    <th class="text-center px-5 py-3 text-xs text-gray-500 font-semibold">Tipe</th>
                    <th class="text-center px-5 py-3 text-xs text-gray-500 font-semibold">Status</th>
                    <th class="text-center px-5 py-3 text-xs text-gray-500 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galleries as $gallery)
                <tr class="border-t border-gray-200 hover:bg-slate-50">
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-3">
                            @if($gallery->media_type == 'image' && $gallery->image_url)
                                <img src="{{ $gallery->image_url }}" class="w-12 h-12 rounded-lg object-cover border border-gray-100 shadow-sm" alt="{{ $gallery->title }}">
                            @else
                                <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                            <div>
                                <div class="font-medium text-gray-800">{{ $gallery->title }}</div>
                                <div class="text-xs text-[#8295ae]">{{ $gallery->slug }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-3 text-gray-700">{{ $gallery->category ?? '-' }}</td>
                    <td class="px-5 py-3 text-center capitalize text-gray-700">{{ $gallery->media_type }}</td>
                    <td class="px-5 py-3 text-center">
                        <span class="px-2 py-1 text-xs rounded-full {{ $gallery->is_published ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ $gallery->is_published ? 'Dipublikasikan' : 'Draft' }}
                        </span>
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex items-center justify-center gap-2">
                            @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="p-2 hover:bg-blue-50 rounded-lg text-blue-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form method="POST" action="{{ route('admin.galleries.destroy', $gallery) }}" data-delete-message="Yakin ingin menghapus galeri ini?">
                                @csrf
                                @method('DELETE')
                                <button class="p-2 hover:bg-red-50 rounded-lg text-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-5 py-8 text-center text-gray-500">Belum ada data galeri</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($galleries->hasPages())
    <div class="px-5 py-4 border-t border-gray-200">
        {{ $galleries->links() }}
    </div>
    @endif
</div>
@endsection
