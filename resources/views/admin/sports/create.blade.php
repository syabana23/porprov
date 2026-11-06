@extends('admin.layouts.app')

@section('title', 'Tambah Cabang Olahraga - Admin Pandu Porprov')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <div class="flex items-center gap-3 mb-1">
            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <div>
                <h1 class="text-2xl font-semibold text-blue-600">Tambah Cabang Olahraga</h1>
                <p class="text-sm text-gray-500">Tambahkan data cabang olahraga baru ke sistem.</p>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.sports.index') }}" class="inline-flex items-center gap-2 px-4 py-2 border border-gray-300 text-gray-800 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali
    </a>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden max-w-3xl">
    <div class="px-5 py-4 border-b border-gray-200">
        <h2 class="text-sm font-semibold text-gray-700">Form Data Cabang Olahraga</h2>
    </div>
    <form method="POST" action="{{ route('admin.sports.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="p-5">
            @include('admin.sports._form')
        </div>
        <div class="px-5 py-4 border-t border-gray-200 flex justify-end gap-3">
            <a href="{{ route('admin.sports.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 border border-gray-300 text-gray-800 rounded-lg text-sm font-semibold hover:bg-slate-50 transition-colors">
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

