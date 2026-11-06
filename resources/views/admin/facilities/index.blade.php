@extends('admin.layouts.app')

@section('title', 'Data Fasilitas - Admin Pandu Porprov')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-[#013469]">Data Fasilitas</h1>
        <p class="text-xs text-gray-500 mt-1">Kelola fasilitas pendukung PORPROV Jawa Barat 2026</p>
    </div>
    @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
    <a href="{{ route('admin.facilities.create') }}" class="inline-flex items-center gap-2 bg-[#013469] hover:bg-[#02458a] text-white px-4 py-2.5 rounded-lg text-xs font-semibold transition-colors shadow-sm whitespace-nowrap">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Fasilitas
    </a>
    @endif
</div>

{{-- Filter Card --}}
<div class="bg-white border border-gray-200 rounded-xl shadow-sm mb-4">
    <div class="p-4">
        <form method="GET" class="flex flex-col sm:flex-row gap-3 items-center justify-between">
            <div class="flex items-center gap-2 flex-1 w-full sm:max-w-md">
                <div class="relative flex-1 search-input-wrap">
                    <div class="search-icon-container absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none" style="top: 0; bottom: 0; left: 0; display: flex; align-items: center; padding-left: 0.875rem;">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-top: 2px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama fasilitas atau alamat..." style="padding-left: 2.75rem !important;" class="w-full pr-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <button type="submit" class="px-3.5 py-2 bg-[#013469] hover:bg-[#02458a] text-white rounded-lg text-xs font-semibold transition-colors shrink-0">Cari</button>
            </div>
            <div class="flex flex-wrap items-center gap-2 w-full sm:w-auto">
                <select name="type" onchange="this.form.submit()" class="px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Tipe</option>
                    @foreach($types as $t)
                        <option value="{{ $t->type }}" {{ request('type') == $t->type ? 'selected' : '' }}>{{ $t->type_label ?? ucfirst($t->type) }}</option>
                    @endforeach
                </select>
                <select name="status" onchange="this.form.submit()" class="px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @if(request()->hasAny(['search', 'type', 'status']))
                <a href="{{ route('admin.facilities.index') }}" class="px-3 py-2 text-xs border border-gray-300 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors">Reset</a>
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
                    <th class="text-left px-5 py-3 font-semibold">Nama Fasilitas</th>
                    <th class="text-left px-4 py-3 font-semibold">Tipe</th>
                    <th class="text-left px-5 py-3 font-semibold">Alamat</th>
                    <th class="text-left px-4 py-3 font-semibold">Venue Terkait / Jarak</th>
                    <th class="text-center px-4 py-3 font-semibold w-24">Status</th>
                    @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
                    <th class="text-center px-4 py-3 font-semibold w-24">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($facilities as $index => $facility)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-4 py-3 text-center text-gray-400">
                        {{ $facilities->firstItem() + $index }}
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-3">
                            @if($facility->image_url)
                                <img src="{{ $facility->image_url }}" class="w-8 h-8 rounded-lg object-cover border border-gray-100 shrink-0" alt="{{ $facility->name }}">
                            @else
                                <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                </div>
                            @endif
                            <div>
                                <div class="font-semibold text-gray-800">{{ $facility->name }}</div>
                                @if($facility->phone)
                                <div class="text-[11px] text-gray-400">{{ $facility->phone }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        @php
                            $badgeClasses = match($facility->type) {
                                'hotel' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                                'rs' => 'bg-red-50 text-red-700 border-red-200',
                                'puskesmas' => 'bg-amber-50 text-amber-700 border-amber-200',
                                'apotek' => 'bg-pink-50 text-pink-700 border-pink-200',
                                'polsek' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                'restoran' => 'bg-orange-50 text-orange-700 border-orange-200',
                                'transport' => 'bg-sky-50 text-sky-700 border-sky-200',
                                'rekreasi' => 'bg-teal-50 text-teal-700 border-teal-200',
                                'mall' => 'bg-purple-50 text-purple-700 border-purple-200',
                                default => 'bg-gray-50 text-gray-700 border-gray-200',
                            };
                        @endphp
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium border {{ $badgeClasses }}">
                            {{ $facility->type_label ?? ucfirst($facility->type) }}
                        </span>
                    </td>
                    <td class="px-5 py-3 text-gray-600 max-w-xs truncate" title="{{ $facility->address }}">
                        {{ $facility->address ?? '-' }}
                    </td>
                    <td class="px-4 py-3 text-gray-600 max-w-xs truncate">
                        @if($facility->venue_relation)
                            <span class="font-medium text-gray-700">{{ $facility->venue_relation }}</span>
                            @if($facility->distance)
                                <span class="text-gray-400 text-[11px]">({{ $facility->distance }})</span>
                            @endif
                        @else
                            -
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center">
                        @if($facility->is_active)
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
                            <a href="{{ route('admin.facilities.edit', $facility) }}" class="p-1.5 bg-blue-50 hover:bg-blue-100 rounded text-blue-600 transition-colors" title="Edit">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            </a>
                            <form method="POST" action="{{ route('admin.facilities.destroy', $facility) }}" data-delete-message="Yakin ingin menghapus fasilitas {{ $facility->name }}?">
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
                    <td colspan="7" class="px-5 py-8 text-center text-gray-400">
                        Belum ada data fasilitas ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($facilities->hasPages())
    <div class="px-5 py-3 border-t border-gray-100 bg-slate-50 flex items-center justify-between text-xs text-gray-500">
        <div>Menampilkan {{ $facilities->firstItem() }}-{{ $facilities->lastItem() }} dari {{ $facilities->total() }} data</div>
        <div>{{ $facilities->links() }}</div>
    </div>
    @endif
</div>
@endsection
