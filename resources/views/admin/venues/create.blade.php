@extends('admin.layouts.app')

@section('title', 'Tambah Venue - Admin Pandu Porprov')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 sm:p-8">
        {{-- Header Sesuai Canva Image 2 --}}
        <div class="flex items-center gap-3.5 mb-6 pb-6 border-b border-gray-100">
            <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-xl shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-900">Tambah Venue</h1>
                <p class="text-xs text-gray-500 mt-0.5">Isi data venue yang akan ditambahkan ke dalam sistem.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.venues.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.venues._form')

            {{-- Footer Buttons Sesuai Canva Image 2 --}}
            <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.venues.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
