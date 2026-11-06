@extends('admin.layouts.app')

@section('title', 'Tambah Kontingen - Admin Pandu Porprov')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <div class="flex items-center gap-3 mb-1">
            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div>
                <h1 class="text-2xl font-semibold text-blue-600">Tambah Kontingen</h1>
                <p class="text-sm text-gray-500">Tambahkan data kontingen baru ke sistem.</p>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.contingents.index') }}" class="inline-flex items-center gap-2 px-4 py-2 border border-gray-300 text-gray-800 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali
    </a>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden max-w-3xl">
    <div class="px-5 py-4 border-b border-gray-200">
        <h2 class="text-sm font-semibold text-gray-700">Form Data Kontingen</h2>
    </div>
    <form method="POST" action="{{ route('admin.contingents.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="p-5">
            @include('admin.contingents._form')
        </div>
        <div class="px-5 py-4 border-t border-gray-200 flex justify-end gap-3">
            <a href="{{ route('admin.contingents.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 border border-gray-300 text-gray-800 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors">
                × Batal
            </a>
            <button type="submit" class="inline-flex items-center gap-2 justify-center px-5 py-2.5 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection
