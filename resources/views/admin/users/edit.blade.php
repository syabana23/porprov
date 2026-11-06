@extends('admin.layouts.app')

@section('title', 'Ubah Pengguna - Admin Pandu Porprov')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-blue-600">Ubah Pengguna</h1>
    <p class="text-sm text-gray-500">Perbarui data pengguna</p>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm">
    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="p-6">
        @csrf
        @method('PUT')
        @include('admin.users._form')
        <div class="flex items-center gap-3 mt-6">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors">Perbarui</button>
            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-gray-800 rounded-lg text-sm font-semibold hover:bg-gray-50 transition-colors">Batal</a>
        </div>
    </form>
</div>
@endsection
