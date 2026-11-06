@extends('admin.layouts.app')

@section('title', 'Tambah Galeri - Admin Pandu Porprov')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-blue-600">Tambah Galeri</h1>
    <p class="text-sm text-gray-500">Tambahkan foto atau video galeri baru</p>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm">
    <form method="POST" action="{{ route('admin.galleries.store') }}" enctype="multipart/form-data" class="p-6">
        @csrf
        @include('admin.galleries._form')
        <div class="flex items-center gap-3 mt-6 pt-6 border-t border-gray-200">
            <button type="submit" class="inline-flex items-center justify-center px-6 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors">Simpan Data</button>
            <a href="{{ route('admin.galleries.index') }}" class="inline-flex items-center justify-center px-6 py-2 border border-gray-300 text-gray-800 rounded-lg text-sm font-semibold hover:bg-gray-50 transition-colors">Batal</a>
        </div>
    </form>
</div>
@endsection
