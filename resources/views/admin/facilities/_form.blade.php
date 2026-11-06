<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Nama Fasilitas --}}
    <div>
        <label class="block text-sm font-semibold text-gray-800 mb-2">Nama Fasilitas <span class="text-red-500">*</span></label>
        <input type="text" name="name" value="{{ old('name', $facility->name ?? '') }}" required
               placeholder="Masukkan nama fasilitas"
               class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Jenis Fasilitas --}}
    <div>
        <label class="block text-sm font-semibold text-gray-800 mb-2">Jenis Fasilitas <span class="text-red-500">*</span></label>
        <div class="relative">
            <select name="type" required class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition appearance-none pr-9">
                <option value="">Pilih jenis fasilitas</option>
                @foreach([
                    'hotel' => 'Hotel',
                    'rs' => 'Rumah Sakit',
                    'apotek' => 'Apotek',
                    'puskesmas' => 'Puskesmas',
                    'restoran' => 'Restoran',
                    'polsek' => 'Polres / Polsek',
                    'mall' => 'Mall',
                    'rekreasi' => 'Rekreasi',
                ] as $value => $label)
                    <option value="{{ $value }}" {{ old('type', $facility->type ?? '') == $value ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </div>
        @error('type')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Alamat --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-gray-800 mb-2">Alamat</label>
        <input type="text" name="address" value="{{ old('address', $facility->address ?? '') }}"
               placeholder="Masukkan alamat lengkap fasilitas"
               class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('address')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Venue Terdekat --}}
    <div>
        <label class="block text-sm font-semibold text-gray-800 mb-2">Venue Terdekat</label>
        <div class="relative">
            <select name="venue_relation" class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition appearance-none pr-9">
                <option value="">Pilih venue terdekat</option>
                @foreach([
                    'GOR Pajajaran / Stadion Pajajaran (Indoor A, Indoor B, Stadion)',
                    'Green Forest Hotel',
                    'Gymnasium Sekolah Vokasi IPB',
                    'GOR Yasmin Bulutangkis',
                    'Sport Center IPB Dramaga',
                    'Padepokan Voli Sentul',
                    'Gunung Mas (Cisarua)',
                    'Sport Jabar Arcamanik',
                    'Lapangan Tembak Cisangkan',
                    'Kota Baru Parahyangan',
                    'Majalengka',
                ] as $venue)
                    <option value="{{ $venue }}" {{ old('venue_relation', $facility->venue_relation ?? '') == $venue ? 'selected' : '' }}>{{ $venue }}</option>
                @endforeach
            </select>
            <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </div>
        @error('venue_relation')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Status --}}
    <div>
        <label class="block text-sm font-semibold text-gray-800 mb-2">Status</label>
        <div class="relative">
            <select name="is_active" class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition appearance-none pr-9">
                <option value="1" {{ old('is_active', $facility->is_active ?? true) ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ !old('is_active', $facility->is_active ?? true) ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
            <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </div>
    </div>

    {{-- Foto Fasilitas --}}
    <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-gray-800 mb-2">Foto Fasilitas</label>
        <label id="photo-upload-area" class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-[#93c5fd] bg-[#f8fbff] rounded-xl cursor-pointer hover:bg-[#f0f7ff] transition-colors">
            <div id="photo-placeholder" class="flex flex-col items-center justify-center">
                <svg class="w-10 h-10 mb-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                <p class="mb-1 text-sm text-gray-800"><span class="font-semibold">Pilih Foto</span></p>
                <p class="text-xs text-gray-500">JPG, PNG (Maksimal 2MB)</p>
            </div>
            <img id="photo-preview" class="hidden max-h-32 rounded-lg object-contain" alt="Preview">
            <input type="file" name="image" id="photo-input" accept="image/*" class="hidden">
        </label>
        @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        @if(isset($facility) && $facility->image)
            <div class="mt-3 flex items-center gap-3">
                <img src="{{ $facility->image_url }}" class="w-20 h-20 object-cover rounded-lg border border-gray-200" alt="Foto saat ini">
                <div class="text-xs text-gray-500">Foto saat ini. Upload baru di atas untuk mengganti.</div>
            </div>
        @endif
    </div>

    {{-- Extra fields (collapsed / optional) --}}
    <div>
        <label class="block text-sm font-semibold text-gray-800 mb-2">Telepon</label>
        <input type="text" name="phone" value="{{ old('phone', $facility->phone ?? '') }}"
               placeholder="-"
               class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
    </div>
    <div>
        <label class="block text-sm font-semibold text-gray-800 mb-2">Jarak dari Venue</label>
        <input type="text" name="distance" value="{{ old('distance', $facility->distance ?? '') }}"
               placeholder="1.2 km"
               class="w-full px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
    </div>
</div>

@push('scripts')
<script nonce="{{ $cspNonce ?? '' }}">
    document.addEventListener('DOMContentLoaded', function() {
        const photoInput = document.getElementById('photo-input');
        const photoPreview = document.getElementById('photo-preview');
        const photoPlaceholder = document.getElementById('photo-placeholder');

        photoInput?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    photoPreview.src = ev.target.result;
                    photoPreview.classList.remove('hidden');
                    if (photoPlaceholder) photoPlaceholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endpush
