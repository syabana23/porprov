@extends('admin.layouts.app')

@section('title', 'Pertandingan - Admin Pandu Porprov')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Pertandingan</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola data jadwal pertandingan PORPROV Kota Bogor 2026.</p>
    </div>
    @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
    <a href="{{ route('admin.schedules.create') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm self-start md:self-auto">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Pertandingan
    </a>
    @endif
</div>

{{-- Filter & Search Bar (Modern & Rapi Tanpa Numpuk) --}}
<div class="bg-white border border-gray-200 rounded-xl shadow-sm mb-5 p-3.5 sm:p-4">
    <form method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3 items-end">
        {{-- Search Bar --}}
        <div class="sm:col-span-2 lg:col-span-3">
            <label class="block text-[11px] font-semibold text-gray-600 uppercase tracking-wider mb-1">Pencarian</label>
            <div class="relative search-input-wrap">
                <div class="search-icon-container absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none" style="top: 0; bottom: 0; left: 0; display: flex; align-items: center; padding-left: 0.875rem;">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-top: 2px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari pertandingan / tim..."
                       style="padding-left: 2.75rem !important;"
                       class="w-full pr-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder:text-gray-400">
            </div>
        </div>

        {{-- Cabang Olahraga --}}
        <div class="lg:col-span-3">
            <label class="block text-[11px] font-semibold text-gray-600 uppercase tracking-wider mb-1">Cabang Olahraga</label>
            <select name="sport_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Semua cabang olahraga</option>
                @foreach($sports as $sport)
                    <option value="{{ $sport->id }}" {{ request('sport_id') == $sport->id ? 'selected' : '' }}>{{ $sport->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Venue --}}
        <div class="lg:col-span-2">
            <label class="block text-[11px] font-semibold text-gray-600 uppercase tracking-wider mb-1">Venue</label>
            <select name="venue_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Semua venue</option>
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}" {{ request('venue_id') == $venue->id ? 'selected' : '' }}>{{ $venue->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Tanggal --}}
        <div class="lg:col-span-2">
            <label class="block text-[11px] font-semibold text-gray-600 uppercase tracking-wider mb-1">Tanggal</label>
            <input type="date" name="date" value="{{ request('date') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>

        {{-- Action Buttons --}}
        <div class="lg:col-span-2 flex items-center gap-2">
            <button type="submit" class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-semibold transition-colors shadow-sm">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <span>Cari</span>
            </button>
            <a href="{{ route('admin.schedules.index') }}" class="inline-flex items-center justify-center px-3 py-2 border border-gray-300 text-gray-700 rounded-lg text-xs font-semibold hover:bg-gray-50 transition-colors">
                Reset
            </a>
        </div>
    </form>
</div>

{{-- Tabel Pertandingan (Ukuran Teks Dikecilkan & Pas Layar Tanpa Geser) --}}
<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-xs">
            <thead class="bg-slate-50 border-b border-gray-200 text-gray-500">
                <tr>
                    <th class="text-left px-3 py-2.5 font-bold text-[11px] uppercase tracking-wider w-28 whitespace-nowrap">Waktu</th>
                    <th class="text-left px-3 py-2.5 font-bold text-[11px] uppercase tracking-wider w-36 whitespace-nowrap">Cabor & Kategori</th>
                    <th class="text-left px-3 py-2.5 font-bold text-[11px] uppercase tracking-wider min-w-[170px]">Pertandingan & Peserta</th>
                    <th class="text-left px-3 py-2.5 font-bold text-[11px] uppercase tracking-wider w-36 whitespace-nowrap">Venue</th>
                    <th class="text-center px-3 py-2.5 font-bold text-[11px] uppercase tracking-wider w-24 whitespace-nowrap">Status</th>
                    @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                    <th class="text-center px-3 py-2.5 font-bold text-[11px] uppercase tracking-wider w-20 sticky right-0 bg-slate-50 shadow-[-4px_0_8px_-2px_rgba(0,0,0,0.06)] border-l border-gray-200 whitespace-nowrap">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($schedules as $schedule)
                <tr class="group hover:bg-slate-50/80 transition-colors">
                    {{-- Waktu --}}
                    <td class="px-3 py-2.5 whitespace-nowrap">
                        <div class="font-semibold text-gray-900 text-xs">{{ $schedule->match_date ? $schedule->match_date->format('d M Y') : '-' }}</div>
                        <div class="text-[11px] text-gray-500 font-medium">
                            {{ $schedule->start_time ? substr($schedule->start_time, 0, 5) : '08:00' }}@if($schedule->end_time) - {{ substr($schedule->end_time, 0, 5) }}@endif WIB
                        </div>
                    </td>

                    {{-- Cabang Olahraga & Kategori --}}
                    <td class="px-3 py-2.5 whitespace-nowrap">
                        <div class="font-semibold text-gray-900 text-xs">{{ $schedule->sport->name ?? '-' }}</div>
                        <span class="inline-block mt-0.5 px-1.5 py-0.5 rounded text-[10px] font-medium bg-slate-100 text-slate-700 border border-slate-200">
                            {{ $schedule->category ?? 'Umum' }}
                        </span>
                    </td>

                    {{-- Pertandingan & Peserta --}}
                    <td class="px-3 py-2.5">
                        <div class="font-bold text-gray-900 text-xs leading-snug">{{ $schedule->match_title }}</div>
                        @if($schedule->contingent)
                        <div class="text-[11px] mt-1 flex items-center gap-1.5 flex-wrap">
                            <span class="px-1.5 py-0.5 bg-blue-50 text-blue-700 rounded font-semibold text-[10px] border border-blue-100">{{ $schedule->contingent->name }}</span>
                            @if($schedule->opponentContingent)
                                <span class="text-[9px] font-extrabold text-gray-400">VS</span>
                                <span class="px-1.5 py-0.5 bg-amber-50 text-amber-800 rounded font-semibold text-[10px] border border-amber-100">{{ $schedule->opponentContingent->name }}</span>
                            @endif
                        </div>
                        @endif
                    </td>

                    {{-- Venue --}}
                    <td class="px-3 py-2.5 whitespace-nowrap text-gray-700">
                        <div class="inline-flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span class="font-medium text-gray-900 text-xs">{{ $schedule->venue->name ?? '-' }}</span>
                        </div>
                    </td>

                    {{-- Status Badge --}}
                    <td class="px-3 py-2.5 text-center whitespace-nowrap">
                        @php
                            $statusMap = [
                                'upcoming' => ['label' => 'Terjadwal', 'class' => 'bg-emerald-50 text-emerald-700 border border-emerald-200'],
                                'ongoing' => ['label' => 'Dalam Proses', 'class' => 'bg-amber-50 text-amber-700 border border-amber-200'],
                                'finished' => ['label' => 'Selesai', 'class' => 'bg-gray-100 text-gray-700 border border-gray-200'],
                            ];
                            $currStatus = $statusMap[$schedule->status] ?? ['label' => ucfirst($schedule->status), 'class' => 'bg-blue-50 text-blue-700 border border-blue-200'];
                        @endphp
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold {{ $currStatus['class'] }}">
                            {{ $currStatus['label'] }}
                        </span>
                    </td>

                    {{-- Aksi (Sticky Right agar Selalu Terlihat Tanpa Digeser) --}}
                    @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                    <td class="px-3 py-2.5 text-center whitespace-nowrap sticky right-0 bg-white group-hover:bg-slate-50/95 shadow-[-4px_0_8px_-2px_rgba(0,0,0,0.06)] border-l border-gray-200 transition-colors">
                        <div class="inline-flex items-center gap-1.5">
                            <a href="{{ route('admin.schedules.edit', $schedule) }}" title="Ubah Pertandingan" class="p-1.5 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg transition-colors cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form method="POST" action="{{ route('admin.schedules.destroy', $schedule) }}" data-delete-message="Yakin ingin menghapus pertandingan ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Hapus Pertandingan" class="p-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg transition-colors cursor-pointer">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-12 text-center text-gray-500">
                        <div class="w-12 h-12 rounded-full bg-gray-100 text-gray-400 mx-auto flex items-center justify-center mb-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <p class="font-semibold text-gray-700">Belum ada data jadwal pertandingan</p>
                        <p class="text-xs text-gray-400 mt-0.5">Silakan klik "Tambah Pertandingan" untuk menambahkan jadwal.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($schedules->hasPages())
    <div class="px-5 py-4 border-t border-gray-100 bg-gray-50/50">
        {{ $schedules->links() }}
    </div>
    @endif
</div>
@endsection
