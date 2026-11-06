@extends('admin.layouts.app')

@section('title', 'Tambah Data Perolehan Medali - Admin Pandu Porprov')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <div class="flex items-center gap-3 mb-1">
            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <div>
                <h1 class="text-2xl font-semibold text-blue-600">Tambah Data Perolehan Medali</h1>
                <p class="text-sm text-gray-500">Kelola perolehan medali kontingen PORPROV XV Jawa Barat 2026</p>
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
        <h2 class="text-sm font-semibold text-gray-700">Form Tambah Data</h2>
    </div>
    <form method="POST" action="{{ route('admin.standings.store') }}" class="p-5">
        @csrf

        {{-- Pilih Kontingen --}}
        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-800 mb-2">Pilih Kontingen</label>
            <select name="contingent_id" required class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                <option value="">Pilih Kontingen</option>
                @foreach($contingents as $contingent)
                    <option value="{{ $contingent->id }}" {{ old('contingent_id') == $contingent->id ? 'selected' : '' }}>
                        {{ $contingent->name }}
                    </option>
                @endforeach
            </select>
            @error('contingent_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Input Medali --}}
        <div class="grid grid-cols-3 gap-4 mb-5">
            {{-- Emas --}}
            <div class="bg-slate-50 p-4 rounded-xl border border-gray-200 text-center">
                <label class="block text-sm font-semibold text-yellow-600 mb-2">🥇 Emas</label>
                <input type="number" name="gold" value="{{ old('gold', 0) }}" min="0" required
                       class="w-full px-3 py-2 border border-yellow-300 bg-white rounded-lg text-sm text-center font-bold text-yellow-700 focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition">
                @error('gold')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            {{-- Perak --}}
            <div class="bg-slate-50 p-4 rounded-xl border border-gray-200 text-center">
                <label class="block text-sm font-semibold text-gray-500 mb-2">🥈 Perak</label>
                <input type="number" name="silver" value="{{ old('silver', 0) }}" min="0" required
                       class="w-full px-3 py-2 border border-gray-300 bg-white rounded-lg text-sm text-center font-bold text-gray-600 focus:ring-2 focus:ring-gray-400 focus:border-transparent transition">
                @error('silver')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            {{-- Perunggu --}}
            <div class="bg-slate-50 p-4 rounded-xl border border-gray-200 text-center">
                <label class="block text-sm font-semibold text-orange-600 mb-2">🥉 Perunggu</label>
                <input type="number" name="bronze" value="{{ old('bronze', 0) }}" min="0" required
                       class="w-full px-3 py-2 border border-orange-300 bg-white rounded-lg text-sm text-center font-bold text-orange-600 focus:ring-2 focus:ring-orange-400 focus:border-transparent transition">
                @error('bronze')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="bg-blue-50 border border-blue-100 rounded-lg px-4 py-3 mb-6 flex items-start gap-2.5">
            <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <p class="text-xs text-blue-700 leading-relaxed">
                Pastikan jumlah medali yang di input sesuai data resmi.<br>
                Jumlah medali tidak boleh negatif.
            </p>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.standings.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 border border-gray-300 text-gray-800 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="inline-flex items-center gap-2 justify-center px-5 py-2.5 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection

