@extends('admin.layouts.app')

@section('title', 'Klasemen Medali - Admin Pandu Porprov')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-semibold text-blue-600">Klasemen Medali</h1>
        <p class="text-sm text-gray-500">Kelola perolehan medali kontingen PORPROV XV Jawa Barat 2026</p>
    </div>
    @if($contingents->count() > 0 && (auth()->user()->isAdmin() || auth()->user()->isSuperAdmin()))
    <a href="{{ route('admin.standings.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Data
    </a>
    @endif
</div>

{{-- Form Input Perolehan Medali --}}
@if($contingents->count() > 0 && (auth()->user()->isAdmin() || auth()->user()->isSuperAdmin()))
<div class="bg-white border border-gray-200 rounded-xl shadow-sm mb-6">
    <div class="px-5 py-4 border-b border-gray-200">
        <h2 class="text-sm font-semibold text-gray-700">Form Input Perolehan Medali</h2>
    </div>
    <form method="POST" action="{{ route('admin.standings.store') }}" class="p-5">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Pilih Kontingen</label>
                <select name="contingent_id" required class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    <option value="">Pilih Kontingen</option>
                    @foreach($contingents as $contingent)
                        <option value="{{ $contingent->id }}">{{ $contingent->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-yellow-600 uppercase tracking-wide mb-1.5">Medali Emas</label>
                <input type="number" name="gold" value="0" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 focus:border-transparent text-center font-semibold text-yellow-700">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Medali Perak</label>
                <input type="number" name="silver" value="0" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-gray-400 focus:border-transparent text-center font-semibold text-gray-600">
            </div>
            <div>
                <label class="block text-xs font-semibold text-orange-600 uppercase tracking-wide mb-1.5">Medali Perunggu</label>
                <input type="number" name="bronze" value="0" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-orange-400 focus:border-transparent text-center font-semibold text-orange-600">
            </div>
        </div>

        <div class="flex justify-end gap-2 pt-2">
            <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Data
            </button>
            <button type="reset" class="inline-flex items-center gap-1.5 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors">
                Reset
            </button>
        </div>
    </form>
</div>
@endif

{{-- Tabel Klasemen --}}
<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
    <div class="px-5 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div>
            <h2 class="text-sm font-semibold text-gray-700">Data Klasemen Medali</h2>
            <p class="text-xs text-gray-400 mt-0.5">Klasemen perolehan medali kontingen PORPROV XV Jawa Barat 2026</p>
        </div>
        <form method="GET" action="{{ route('admin.standings.index') }}" class="w-full sm:w-auto flex items-center gap-2">
            <div class="relative w-full sm:w-64 search-input-wrap">
                <div class="search-icon-container absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none" style="top: 0; bottom: 0; left: 0; display: flex; align-items: center; padding-left: 0.875rem;">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-top: 2px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input type="text" id="standing-search" name="search" value="{{ request('search') }}" placeholder="Cari kontingen..." style="padding-left: 2.75rem !important;" class="w-full pr-3 py-1.5 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <button type="submit" class="px-3 py-1.5 bg-blue-600 text-white rounded-lg text-xs font-semibold hover:bg-blue-700 transition-colors shrink-0">Cari</button>
            @if(request('search'))
                <a href="{{ route('admin.standings.index') }}" class="px-3 py-1.5 border border-gray-300 text-gray-600 rounded-lg text-xs hover:bg-gray-50 transition-colors shrink-0">Reset</a>
            @endif
        </form>
    </div>
    <div class="overflow-x-auto">
        <table id="standings-table" class="w-full text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="text-center px-4 py-3 text-xs text-gray-500 font-semibold w-14">No</th>
                    <th class="text-left px-5 py-3 text-xs text-gray-500 font-semibold">Kontingen</th>
                    <th class="text-center px-4 py-3 text-xs text-yellow-600 font-semibold">Emas</th>
                    <th class="text-center px-4 py-3 text-xs text-gray-500 font-semibold">Perak</th>
                    <th class="text-center px-4 py-3 text-xs text-orange-600 font-semibold">Perunggu</th>
                    <th class="text-center px-4 py-3 text-xs text-gray-700 font-semibold">Total</th>
                    <th class="text-center px-4 py-3 text-xs text-blue-600 font-semibold">Rank</th>
                    @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                    <th class="text-center px-4 py-3 text-xs text-gray-500 font-semibold w-24">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($standings as $index => $standing)
                <tr class="border-t border-gray-100 hover:bg-slate-50 transition-colors standing-row" data-name="{{ strtolower($standing->contingent->name ?? '') }}">
                    <td class="px-4 py-3 text-center text-xs text-gray-500">
                        {{ $index + 1 }}
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-3">
                            @if($standing->contingent)
                                <img src="{{ $standing->contingent->logo_url }}" class="w-7 h-7 rounded object-contain shrink-0" alt="">
                            @else
                                <div class="w-7 h-7 rounded bg-blue-50 flex items-center justify-center text-blue-600 shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                            @endif
                            <span class="font-medium text-gray-800 text-xs sm:text-sm">{{ $standing->contingent->name ?? '-' }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <span class="inline-flex items-center justify-center min-w-8 py-0.5 px-2 rounded font-semibold text-yellow-700 bg-yellow-50 text-xs">
                            {{ $standing->gold }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <span class="inline-flex items-center justify-center min-w-8 py-0.5 px-2 rounded font-semibold text-gray-600 bg-gray-50 text-xs">
                            {{ $standing->silver }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <span class="inline-flex items-center justify-center min-w-8 py-0.5 px-2 rounded font-semibold text-orange-600 bg-orange-50 text-xs">
                            {{ $standing->bronze }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center font-bold text-gray-800 text-xs sm:text-sm">
                        {{ $standing->total }}
                    </td>
                    <td class="px-4 py-3 text-center">
                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full text-xs font-bold
                            {{ ($standing->rank ?? ($index + 1)) == 1 ? 'bg-yellow-400 text-white' : (($standing->rank ?? ($index + 1)) == 2 ? 'bg-slate-300 text-gray-800' : (($standing->rank ?? ($index + 1)) == 3 ? 'bg-amber-600 text-white' : 'text-gray-600 bg-gray-100')) }}">
                            {{ $standing->rank ?? ($index + 1) }}
                        </span>
                    </td>
                    @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1.5">
                            <a href="{{ route('admin.standings.edit', $standing) }}" class="p-1.5 bg-blue-50 hover:bg-blue-100 rounded text-blue-600 transition-colors" title="Edit">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            </a>
                            <form method="POST" action="{{ route('admin.standings.destroy', $standing) }}" data-delete-message="Yakin ingin menghapus data klasemen {{ $standing->contingent->name ?? '' }}?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 bg-red-50 hover:bg-red-100 rounded text-red-500 transition-colors" title="Hapus">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="{{ (auth()->user()->isAdmin() || auth()->user()->isSuperAdmin()) ? 8 : 7 }}" class="px-5 py-12 text-center">
                        <div class="flex flex-col items-center gap-2 text-gray-500">
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            <span class="text-sm">Belum ada data klasemen</span>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-3 border-t border-gray-100 bg-slate-50 text-xs text-gray-400">
        *Data perolehan medali dihitung secara otomatis.
    </div>
</div>

@push('scripts')
<script nonce="{{ $cspNonce ?? '' }}">
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('standing-search');
        if (!searchInput) return;

        function filterRows() {
            const query = searchInput.value.toLowerCase().trim();
            const rows = document.querySelectorAll('#standings-table tbody tr.standing-row');
            rows.forEach(row => {
                const name = (row.getAttribute('data-name') || row.innerText || '').toLowerCase();
                row.style.display = name.includes(query) ? '' : 'none';
            });
        }

        searchInput.addEventListener('input', filterRows);
        searchInput.addEventListener('keyup', filterRows);
    });
</script>
@endpush
@endsection
