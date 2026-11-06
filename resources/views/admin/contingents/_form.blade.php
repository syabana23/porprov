<input type="hidden" name="type" value="{{ old('type', $contingent->type ?? 'kota') }}">

<div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
    {{-- Nama Kontingen --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Nama Kontingen <span class="text-red-500">*</span></label>
        <input type="text" name="name" value="{{ old('name', $contingent->name ?? '') }}" required
               placeholder="Masukkan nama kontingen"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('name')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Provinsi --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Provinsi</label>
        <input type="text" name="province" value="{{ old('province', $contingent->province ?? 'Jawa Barat') }}"
               placeholder="Pilih provinsi"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('province')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Kabupaten/Kota --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Kabupaten/Kota</label>
        <input type="text" name="regency" value="{{ old('regency', $contingent->regency ?? '') }}"
               placeholder="Pilih kabupaten/kota"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('regency')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Status --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Status <span class="text-red-500">*</span></label>
        <select name="is_active" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            <option value="1" {{ old('is_active', $contingent->is_active ?? true) ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ !old('is_active', $contingent->is_active ?? true) ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
    </div>

    {{-- Jumlah Atlet --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Jumlah Atlet</label>
        <input type="number" name="athlete_count" value="{{ old('athlete_count', $contingent->athlete_count ?? 0) }}" min="0"
               placeholder="Contoh: 120"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('athlete_count')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Jumlah Official --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Jumlah Official</label>
        <input type="number" name="official_count" value="{{ old('official_count', $contingent->official_count ?? 0) }}" min="0"
               placeholder="Contoh: 35"
               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-xs focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('official_count')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Logo Kontingen --}}
    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Logo Kontingen</label>
        <label id="logo-upload-area" class="flex flex-col items-center justify-center w-full h-36 border-2 border-dashed border-blue-200 bg-slate-50/50 rounded-xl cursor-pointer hover:bg-blue-50/40 transition-colors">
            <div id="logo-placeholder" class="flex flex-col items-center justify-center p-4 text-center">
                <svg class="w-8 h-8 mb-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                <p class="text-xs text-gray-700 font-medium">Klik untuk mengunggah logo atau drag and drop</p>
                <p class="text-[11px] text-gray-400 mt-0.5">(PNG, JPG, maksimal 2MB)</p>
            </div>
            <img id="logo-preview" class="hidden max-h-24 rounded-lg object-contain my-2" alt="Preview Logo">
            <input type="file" name="logo" id="logo-input" accept="image/png,image/jpeg,image/jpg" class="hidden">
        </label>
        @error('logo')<p class="text-red-500 text-[11px] mt-1">{{ $message }}</p>@enderror

        @if(isset($contingent) && $contingent->logo)
            <div class="mt-3 flex items-center gap-3 p-3 bg-slate-50 border border-gray-200 rounded-xl">
                <img src="{{ $contingent->logo_url }}" class="w-12 h-12 object-contain rounded border border-gray-200 bg-white" alt="{{ $contingent->name }}">
                <div class="flex-1">
                    <div class="text-xs font-semibold text-gray-800">Logo Saat Ini</div>
                    <div class="text-[11px] text-gray-400">Pilih file baru di atas jika ingin mengganti logo kontingen ini.</div>
                </div>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script nonce="{{ $cspNonce ?? '' }}">
    document.addEventListener('DOMContentLoaded', function() {
        const logoInput = document.getElementById('logo-input');
        const logoPreview = document.getElementById('logo-preview');
        const logoPlaceholder = document.getElementById('logo-placeholder');

        logoInput?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    logoPreview.src = ev.target.result;
                    logoPreview.classList.remove('hidden');
                    if (logoPlaceholder) logoPlaceholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endpush
