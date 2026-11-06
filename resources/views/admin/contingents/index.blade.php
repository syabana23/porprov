@extends('admin.layouts.app')

@section('title', 'Daftar Kontingen - Admin Pandu Porprov')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-[#013469]">Daftar kontingen</h1>
        <p class="text-xs text-gray-500 mt-1">Kelola data kontingen dari seluruh kabupaten/kota yang mengikuti PORPROV Jabar 2026</p>
    </div>
    @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
    <a href="{{ route('admin.contingents.create') }}" class="inline-flex items-center gap-2 bg-[#013469] hover:bg-[#02458a] text-white px-4 py-2.5 rounded-lg text-xs font-semibold transition-colors shadow-sm whitespace-nowrap">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Kontingen
    </a>
    @endif
</div>

{{-- 4 Stat Cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    {{-- Total Kontingen --}}
    <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm flex items-center gap-3">
        <div class="w-11 h-11 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
        </div>
        <div>
            <div class="text-[11px] text-gray-500 font-medium">Total Kontingen</div>
            <div class="text-xl font-bold text-gray-900 leading-tight">{{ $stats['total_contingents'] ?? 0 }}</div>
            <div class="text-[10px] text-gray-400">Kabupaten/Kota</div>
        </div>
    </div>

    {{-- Total Atlet --}}
    <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm flex items-center gap-3">
        <div class="w-11 h-11 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
        </div>
        <div>
            <div class="text-[11px] text-gray-500 font-medium">Total Atlet</div>
            <div class="text-xl font-bold text-gray-900 leading-tight">{{ number_format($stats['total_athletes'] ?? 0) }}</div>
            <div class="text-[10px] text-gray-400">Orang</div>
        </div>
    </div>

    {{-- Total Official --}}
    <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm flex items-center gap-3">
        <div class="w-11 h-11 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
        </div>
        <div>
            <div class="text-[11px] text-gray-500 font-medium">Total Official</div>
            <div class="text-xl font-bold text-gray-900 leading-tight">{{ number_format($stats['total_officials'] ?? 0) }}</div>
            <div class="text-[10px] text-gray-400">Orang</div>
        </div>
    </div>

    {{-- Total Cabor Diikuti --}}
    <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm flex items-center gap-3">
        <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
            </svg>
        </div>
        <div>
            <div class="text-[11px] text-gray-500 font-medium">Total Cabor Diikuti</div>
            <div class="text-xl font-bold text-gray-900 leading-tight">{{ $stats['total_sports'] ?? 0 }}</div>
            <div class="text-[10px] text-gray-400">Cabang Olahraga</div>
        </div>
    </div>
</div>

{{-- Filter Card --}}
<div class="bg-white border border-gray-200 rounded-xl shadow-sm mb-4">
    <div class="p-4">
        <form method="GET" class="flex flex-col sm:flex-row gap-3 items-center justify-between">
            <div class="relative flex-1 w-full sm:max-w-md search-input-wrap">
                <div class="search-icon-container absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none" style="top: 0; bottom: 0; left: 0; display: flex; align-items: center; padding-left: 0.875rem;">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-top: 2px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama kontingen..." style="padding-left: 2.75rem !important;" class="w-full pr-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <select name="status" onchange="this.form.submit()" class="px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-xs font-semibold hover:bg-blue-700 transition-colors">Cari</button>
                @if(request()->hasAny(['search', 'status']))
                <a href="{{ route('admin.contingents.index') }}" class="px-3 py-2 text-xs border border-gray-300 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors">Reset</a>
                @endif
            </div>
        </form>
    </div>
</div>

{{-- Table --}}
<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-xs">
            <thead class="bg-slate-50 text-gray-500 border-b border-gray-100">
                <tr>
                    <th class="text-center px-4 py-3 font-semibold w-12">No</th>
                    <th class="text-center px-4 py-3 font-semibold w-16">Logo</th>
                    <th class="text-left px-5 py-3 font-semibold">Nama Kontingen</th>
                    <th class="text-left px-5 py-3 font-semibold">Kabupaten/Kota</th>
                    <th class="text-center px-4 py-3 font-semibold">Jumlah Atlet</th>
                    <th class="text-center px-4 py-3 font-semibold">Jumlah Official</th>
                    <th class="text-center px-4 py-3 font-semibold w-24">Status</th>
                    @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                    <th class="text-center px-4 py-3 font-semibold w-24">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($contingents as $index => $contingent)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-4 py-3 text-center text-gray-400">
                        {{ $contingents->firstItem() + $index }}
                    </td>
                    <td class="px-4 py-3 text-center">
                        <img src="{{ $contingent->logo_url }}" class="w-8 h-8 rounded object-contain mx-auto border border-gray-100 bg-white" alt="{{ $contingent->name }}">
                    </td>
                    <td class="px-5 py-3 font-semibold text-gray-800">
                        {{ $contingent->name }}
                    </td>
                    <td class="px-5 py-3 text-gray-600">
                        {{ $contingent->regency ?? $contingent->name }}
                    </td>
                    <td class="px-4 py-3 text-center font-medium text-gray-700">
                        {{ $contingent->athlete_count ?? 0 }}
                    </td>
                    <td class="px-4 py-3 text-center font-medium text-gray-700">
                        {{ $contingent->official_count ?? 0 }}
                    </td>
                    <td class="px-4 py-3 text-center">
                        @if($contingent->is_active)
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 text-[11px] rounded-full font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Aktif
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 text-[11px] rounded-full font-medium bg-red-50 text-red-600 border border-red-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                            Tidak Aktif
                        </span>
                        @endif
                    </td>
                    @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1.5">
                            <a href="{{ route('admin.contingents.edit', $contingent) }}" class="p-1.5 bg-blue-50 hover:bg-blue-100 rounded text-blue-600 transition-colors" title="Edit">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            </a>
                            <form method="POST" action="{{ route('admin.contingents.destroy', $contingent) }}" data-delete-message="Yakin ingin menghapus kontingen {{ $contingent->name }}?">
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
                    <td colspan="8" class="px-5 py-8 text-center text-gray-400">
                        Belum ada data kontingen ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($contingents->hasPages())
    <div class="px-5 py-3 border-t border-gray-100 bg-slate-50 flex items-center justify-between text-xs text-gray-500">
        <div>Menampilkan {{ $contingents->firstItem() }}-{{ $contingents->lastItem() }} dari {{ $contingents->total() }} data</div>
        <div>{{ $contingents->links() }}</div>
    </div>
    @endif
</div>
@endsection
