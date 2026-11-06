@extends('admin.layouts.app')

@section('title', 'Edit Data Venue - Admin Pandu Porprov')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 sm:p-8">
        {{-- Header Sesuai Canva Image 2 --}}
        <div class="flex items-center gap-3.5 mb-6 pb-6 border-b border-gray-100">
            <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-xl shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-900">Edit Data Venue</h1>
                <p class="text-xs text-gray-500 mt-0.5">Ubah data venue sesuai kebutuhan.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.venues.update', $venue) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.venues._form')

            {{-- Footer Buttons Sesuai Canva Image 2 --}}
            <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.venues.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-xl text-sm font-semibold hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white rounded-xl text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
