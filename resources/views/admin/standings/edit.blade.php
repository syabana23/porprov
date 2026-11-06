@extends('admin.layouts.app')

@section('title', 'Edit Data Perolehan Medali - Admin Pandu Porprov')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <div class="flex items-center gap-3 mb-1">
            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            </div>
            <div>
                <h1 class="text-2xl font-semibold text-blue-600">Edit Data Perolehan Medali</h1>
                <p class="text-sm text-gray-500">Ubah data perolehan medali sesuai kebutuhan.</p>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.standings.index') }}" class="inline-flex items-center gap-2 px-4 py-2 border border-gray-300 text-gray-800 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali
    </a>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden max-w-2xl">
    <div class="px-5 py-4 border-b border-gray-200">
        <h2 class="text-sm font-semibold text-gray-700">Form Edit Data</h2>
    </div>
    <form method="POST" action="{{ route('admin.standings.update', $standing) }}" class="p-5">
        @csrf
        @method('PUT')

        {{-- Pilih Kontingen (readonly select style) --}}
        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-800 mb-2">Pilih Kontingen</label>
            <div class="relative">
                <input type="text" value="{{ $standing->contingent->name ?? '-' }}" readonly
                       class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm bg-slate-50 text-gray-800 font-medium">
                @if($standing->contingent)
                    <img src="{{ $standing->contingent->logo_url }}" class="absolute right-3 top-1/2 -translate-y-1/2 w-6 h-6 object-contain" alt="">
                @endif
            </div>
        </div>

        {{-- Input Medali 3 cards --}}
        <div class="grid grid-cols-3 gap-4 mb-5">
            {{-- Emas --}}
            <div class="bg-slate-50 p-4 rounded-xl border border-gray-200 text-center">
                <label class="block text-sm font-semibold text-yellow-600 mb-2">🥇 Emas</label>
                <input type="number" id="gold" name="gold" value="{{ old('gold', $standing->gold) }}" min="0" required
                       class="w-full px-3 py-2 border border-yellow-300 bg-white rounded-lg text-sm text-center font-bold text-yellow-700 focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition">
                @error('gold')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            {{-- Perak --}}
            <div class="bg-slate-50 p-4 rounded-xl border border-gray-200 text-center">
                <label class="block text-sm font-semibold text-gray-500 mb-2">🥈 Perak</label>
                <input type="number" id="silver" name="silver" value="{{ old('silver', $standing->silver) }}" min="0" required
                       class="w-full px-3 py-2 border border-gray-300 bg-white rounded-lg text-sm text-center font-bold text-gray-600 focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                @error('silver')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            {{-- Perunggu --}}
            <div class="bg-slate-50 p-4 rounded-xl border border-gray-200 text-center">
                <label class="block text-sm font-semibold text-orange-600 mb-2">🥉 Perunggu</label>
                <input type="number" id="bronze" name="bronze" value="{{ old('bronze', $standing->bronze) }}" min="0" required
                       class="w-full px-3 py-2 border border-orange-300 bg-white rounded-lg text-sm text-center font-bold text-orange-600 focus:ring-2 focus:ring-orange-400 focus:border-transparent transition">
                @error('bronze')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="flex justify-end gap-3 mt-6">
            <a href="{{ route('admin.standings.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 border border-gray-300 text-gray-800 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="inline-flex items-center gap-2 justify-center px-5 py-2.5 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
