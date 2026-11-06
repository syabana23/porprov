@extends('admin.layouts.app')

@section('title', 'Dashboard - Admin Pandu Porprov')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
    <p class="text-sm text-gray-500 mt-1">Selamat datang di panel admin Website PORPROV Kota Bogor 2026.</p>
</div>

{{-- 5 Kartu Statistik Utama (Canva Design) --}}
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 mb-6">
    {{-- Card 1: Jadwal Pertandingan --}}
    <a href="{{ route('admin.schedules.index') }}" class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm hover:shadow-md hover:border-blue-300 transition-all group">
        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        </div>
        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Jadwal Pertandingan</div>
        <div class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['schedules'] }}</div>
        <div class="text-[11px] text-blue-600 font-medium mt-1">Lihat jadwal &rarr;</div>
    </a>

    {{-- Card 2: Venue --}}
    <a href="{{ route('admin.venues.index') }}" class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm hover:shadow-md hover:border-blue-300 transition-all group">
        <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Venue</div>
        <div class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['venues'] }}</div>
        <div class="text-[11px] text-indigo-600 font-medium mt-1">Kelola lokasi &rarr;</div>
    </a>

    {{-- Card 3: Cabang Olahraga --}}
    <a href="{{ route('admin.sports.index') }}" class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm hover:shadow-md hover:border-blue-300 transition-all group">
        <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
        </div>
        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Cabang Olahraga</div>
        <div class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['sports'] }}</div>
        <div class="text-[11px] text-amber-600 font-medium mt-1">Daftar cabor &rarr;</div>
    </a>

    {{-- Card 4: Kontingen --}}
    <a href="{{ route('admin.contingents.index') }}" class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm hover:shadow-md hover:border-blue-300 transition-all group">
        <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>
        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Kontingen</div>
        <div class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['contingents'] }}</div>
        <div class="text-[11px] text-emerald-600 font-medium mt-1">Data kontingen &rarr;</div>
    </a>

    {{-- Card 5: Fasilitas --}}
    <a href="{{ route('admin.facilities.index') }}" class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm hover:shadow-md hover:border-blue-300 transition-all group col-span-2 sm:col-span-1">
        <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center mb-3 group-hover:scale-105 transition-transform">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
        </div>
        <div class="text-xs font-medium text-gray-500 uppercase tracking-wider">Fasilitas</div>
        <div class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['facilities'] }}</div>
        <div class="text-[11px] text-purple-600 font-medium mt-1">Titik fasilitas &rarr;</div>
    </a>
</div>

{{-- Baris Bawah: Aktivitas Terbaru (Kiri) & Informasi Website (Kanan) --}}
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-6">
    {{-- Card: Aktivitas Terbaru --}}
    <div class="lg:col-span-7 bg-white border border-gray-200 rounded-2xl shadow-sm p-6 flex flex-col justify-between">
        <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-100">
            <div class="flex items-center gap-2">
                <div class="w-2 h-2 rounded-full bg-blue-600"></div>
                <h2 class="text-sm font-bold text-gray-900">Aktivitas Terbaru</h2>
            </div>
            <span class="text-xs font-semibold text-blue-600 hover:text-blue-700 cursor-pointer">Lihat Semua &rsaquo;</span>
        </div>

        @if($recentActivities->count() > 0)
        <div class="space-y-3 overflow-y-auto max-h-[300px]">
            @foreach($recentActivities as $act)
            <div class="flex items-start gap-3 p-3 rounded-xl bg-gray-50 border border-gray-100 text-xs">
                <div class="w-7 h-7 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center shrink-0 font-bold">
                    {{ strtoupper(substr($act->action, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-gray-800">{{ $act->description }}</p>
                    <p class="text-gray-500 text-[11px] mt-0.5">Oleh: {{ $act->user->name ?? 'Sistem' }} &bull; {{ $act->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
        {{-- State Kosong persis Canva Image 1 --}}
        <div class="py-12 flex flex-col items-center justify-center text-center">
            <div class="w-16 h-16 rounded-full bg-blue-50 text-blue-400 flex items-center justify-center mb-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
            <h3 class="text-sm font-bold text-gray-800">Belum ada aktivitas</h3>
            <p class="text-xs text-gray-500 mt-1">Data aktivitas pengguna akan tercatat di sini secara otomatis.</p>
        </div>
        @endif
    </div>

    {{-- Card: Informasi Website --}}
    <div class="lg:col-span-5 bg-white border border-gray-200 rounded-2xl shadow-sm p-6 flex flex-col justify-between">
        <div>
            <div class="flex items-center gap-2 mb-4 pb-3 border-b border-gray-100">
                <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                <h2 class="text-sm font-bold text-gray-900">Informasi Website</h2>
            </div>

            <div class="bg-blue-50/80 border border-blue-100 rounded-xl p-4 mb-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>
                        <h4 class="text-xs font-bold text-blue-900">Sinkronisasi Langsung Aktif</h4>
                        <p class="text-xs text-blue-800 mt-1 leading-relaxed">
                            Setiap penambahan atau perubahan data pertandingan, venue, cabor, dan klasemen di panel admin ini langsung terhubung secara live ke website publik.
                        </p>
                    </div>
                </div>
            </div>

            <div class="space-y-2 text-xs">
                <div class="flex justify-between py-1.5 border-b border-gray-100">
                    <span class="text-gray-500">Versi Sistem:</span>
                    <span class="font-semibold text-gray-800">PORPROV Kota Bogor 1.0</span>
                </div>
                <div class="flex justify-between py-1.5 border-b border-gray-100">
                    <span class="text-gray-500">Status Server:</span>
                    <span class="inline-flex items-center gap-1 font-semibold text-emerald-600">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Online
                    </span>
                </div>
                <div class="flex justify-between py-1.5 border-b border-gray-100">
                    <span class="text-gray-500">Pengguna Login:</span>
                    <span class="font-semibold text-gray-800">{{ auth()->user()->name }} ({{ auth()->user()->role->display_name ?? 'Admin' }})</span>
                </div>
            </div>
        </div>

        <div class="mt-4 pt-3">
            <a href="{{ url('/') }}" target="_blank" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-xl text-xs font-semibold hover:bg-blue-700 transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                Buka Website Publik
            </a>
        </div>
    </div>
</div>
@endsection
