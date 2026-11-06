@extends('admin.layouts.app')

@section('title', $venue->name.' - Admin Pandu Porprov')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-semibold text-blue-600">{{ $venue->name }}</h1>
        <p class="text-sm text-gray-500">Detail Venue</p>
    </div>
    <div class="flex gap-2">
        @if(auth()->user()->isAdmin() || auth()->user()->isSuperAdmin())
        <a href="{{ route('admin.venues.edit', $venue) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">Edit</a>
        @endif
        <a href="{{ route('admin.venues.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-sm">Kembali</a>
    </div>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="font-medium mb-2">Informasi</h3>
            <dl class="space-y-2 text-sm">
                <div><dt class="text-gray-500">Alamat</dt><dd>{{ $venue->address ?? '-' }}</dd></div>
                <div><dt class="text-gray-500">Koordinat</dt><dd>{{ $venue->latitude && $venue->longitude ? $venue->latitude.', '.$venue->longitude : '-' }}</dd></div>
                <div><dt class="text-gray-500">Google Maps
