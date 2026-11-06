@extends('admin.layouts.app')

@section('title', 'Kelola Venue - Admin Pandu Porprov')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Kelola Venue</h1>
        <p class="text-sm text-gray-500 mt-1">Tambah, edit, dan hapus data venue yang akan ditampilkan di website PORPROV Kota Bogor 2026.</p>
    </div>
    @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
    <a href="{{ route('admin.venues.create') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm self-start md:self-auto">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Venue
    </a>
    @endif
</div>

{{-- Filter Bar (Sesuai Canva Image 5) --}}
<div class="bg-white border border-gray-200 rounded-2xl shadow-sm mb-6 p-4">
    <form method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Cabang Olahraga</label>
            <select name="sport_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Semua cabang olahraga</option>
                @foreach($sports as $sport)
                    <option value="{{ $sport->id }}" {{ request('sport_id') == $sport->id ? 'selected' : '' }}>{{ $sport->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Kecamatan</label>
            <select name="district" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Semua kecamatan</option>
                @foreach($districts as $district)
                    <option value="{{ $district->name }}" {{ request('district') == $district->name ? 'selected' : '' }}>{{ $district->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Pencarian</label>
            <div class="relative search-input-wrap">
                <div class="search-icon-container absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none" style="top: 0; bottom: 0; left: 0; display: flex; align-items: center; padding-left: 0.875rem;">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-top: 2px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau alamat venue..." style="padding-left: 2.75rem !important;" class="w-full pr-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
        </div>
        <div class="flex items-end gap-2">
            <button type="submit" class="flex-1 inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm">
                Cari
            </button>
            <a href="{{ route('admin.venues.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-50 transition-colors">
                Reset
            </a>
        </div>
    </form>
</div>

{{-- Tabel Venue (Sesuai Canva Image 5) --}}
<div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 border-b border-gray-200">
                <tr>
                    <th class="text-center px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-12">No</th>
                    <th class="text-center px-4 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-16">Foto</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Venue</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Cabang Olahraga</th>
                    <th class="text-left px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Alamat</th>
                    <th class="text-center px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                    <th class="text-center px-5 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider w-24">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($venues as $index => $venue)
                <tr class="hover:bg-slate-50/80 transition-colors">
                    {{-- No --}}
                    <td class="px-4 py-3.5 text-center text-xs font-medium text-gray-500">
                        {{ $venues->firstItem() + $index }}
                    </td>

                    {{-- Foto --}}
                    <td class="px-4 py-3.5 text-center">
                        @if($venue->image_url)
                            <img src="{{ $venue->image_url }}" class="w-12 h-12 rounded-xl object-cover border border-gray-200 mx-auto shadow-sm" alt="{{ $venue->name }}">
                        @else
                            <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-100 text-blue-600 flex items-center justify-center mx-auto">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                        @endif
                    </td>

                    {{-- Nama Venue --}}
                    <td class="px-5 py-3.5 font-bold text-gray-900">
                        <div>{{ $venue->name }}</div>
                        @if($venue->gmaps_url)
                        <a href="{{ $venue->gmaps_url }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] text-blue-600 hover:text-blue-800 mt-0.5">
                            <span>Google Maps</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                        @endif
                    </td>

                    {{-- Cabang Olahraga --}}
                    <td class="px-5 py-3.5 text-xs text-gray-700 max-w-xs">
                        @php
                            $caborList = $venue->sports->pluck('name')->filter()->implode(', ');
                        @endphp
                        {{ !empty($caborList) ? $caborList : ($venue->description ?? '-') }}
                    </td>

                    {{-- Alamat --}}
                    <td class="px-5 py-3.5 text-xs text-gray-600 max-w-sm">
                        {{ $venue->address ?? '-' }}
                    </td>

                    {{-- Status Badge --}}
                    <td class="px-5 py-3.5 text-center whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold {{ $venue->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-gray-100 text-gray-600 border border-gray-200' }}">
                            {{ $venue->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </td>

                    {{-- Aksi --}}
                    @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                    <td class="px-5 py-3.5 text-center whitespace-nowrap">
                        <div class="inline-flex items-center gap-1.5">
                            <a href="{{ route('admin.venues.edit', $venue) }}" title="Ubah Venue" class="p-1.5 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form method="POST" action="{{ route('admin.venues.destroy', $venue) }}" data-delete-message="Yakin ingin menghapus venue ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Hapus Venue" class="p-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-5 py-12 text-center text-gray-500">
                        <div class="w-12 h-12 rounded-full bg-gray-100 text-gray-400 mx-auto flex items-center justify-center mb-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <p class="font-semibold text-gray-700">Belum ada data venue</p>
                        <p class="text-xs text-gray-400 mt-0.5">Silakan klik "Tambah Venue" untuk menambahkan lokasi baru.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($venues->hasPages())
    <div class="px-5 py-4 border-t border-gray-100 bg-gray-50/50">
        {{ $venues->links() }}
    </div>
    @endif
</div>
@endsection
