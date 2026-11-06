@extends('admin.layouts.app')

@section('title', 'Pengguna - Admin Pandu Porprov')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-semibold text-blue-600">Pengguna</h1>
        <p class="text-sm text-gray-500">Kelola data pengguna sistem</p>
    </div>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm mb-6">
    <div class="p-4 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3">
        <form method="GET" class="flex flex-col md:flex-row gap-3 flex-1">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..." class="flex-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <select name="role_id" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Semua Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ request('role_id') == $role->id ? 'selected' : '' }}>{{ $role->display_name }}</option>
                @endforeach
            </select>
            <select name="status" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Semua Status</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
            <button class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors">Cari</button>
            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-gray-800 rounded-lg text-sm font-semibold hover:bg-gray-50 transition-colors">Reset</a>
        </form>
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors whitespace-nowrap">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Pengguna
        </a>
    </div>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm min-w-[900px]">
            <thead class="bg-slate-50">
                <tr>
                    <th class="text-center px-4 py-3 text-xs text-gray-500 font-semibold whitespace-nowrap">No</th>
                    <th class="text-left px-4 py-3 text-xs text-gray-500 font-semibold whitespace-nowrap">Username</th>
                    <th class="text-left px-4 py-3 text-xs text-gray-500 font-semibold whitespace-nowrap">Password</th>
                    <th class="text-left px-4 py-3 text-xs text-gray-500 font-semibold whitespace-nowrap">Role</th>
                    <th class="text-center px-4 py-3 text-xs text-gray-500 font-semibold whitespace-nowrap">Status</th>
                    <th class="text-center px-4 py-3 text-xs text-gray-500 font-semibold whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $user)
                <tr class="border-t border-gray-200 hover:bg-slate-50">
                    <td class="px-4 py-3 text-center text-gray-700 whitespace-nowrap">{{ $users->firstItem() + $index }}</td>
                    <td class="px-4 py-3">
                        <div class="min-w-[150px]">
                            <div class="font-medium text-gray-800">{{ $user->name }}</div>
                            <div class="text-xs text-[#8295ae]">{{ $user->email }}</div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-gray-700 font-mono text-xs">
                        <div class="max-w-[180px] truncate" title="{{ $user->getOriginal('password') }}">{{ $user->getOriginal('password') }}</div>
                    </td>
                    <td class="px-4 py-3 text-gray-700 whitespace-nowrap">{{ $user->role->display_name ?? '-' }}</td>
                    <td class="px-4 py-3 text-center whitespace-nowrap">
                        <span class="px-2 py-1 text-xs rounded-full {{ $user->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ $user->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap">
                        <div class="flex items-center justify-center gap-1">
                            <a href="{{ route('admin.users.edit', $user) }}" class="inline-flex items-center justify-center w-8 h-8 hover:bg-blue-50 rounded-lg text-blue-600" title="Ubah">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            @if(auth()->id() !== $user->id)
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" data-delete-message="Yakin ingin menghapus pengguna ini?" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center w-8 h-8 hover:bg-red-50 rounded-lg text-red-600" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-8 text-center text-gray-500">Belum ada data pengguna</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($users->hasPages())
    <div class="px-4 py-4 border-t border-gray-200">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection
