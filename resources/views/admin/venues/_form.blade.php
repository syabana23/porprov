<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Nama Venue --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Nama Venue <span class="text-red-500">*</span></label>
        <input type="text" name="name" value="{{ old('name', $venue->name ?? '') }}" required placeholder="Masukkan nama venue" class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Cabang Olahraga --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Cabang Olahraga</label>
        <input type="text" name="description" value="{{ old('description', $venue->description ?? (isset($venue) ? $venue->sports->pluck('name')->implode(', ') : '')) }}" placeholder="Contoh: Pencak Silat, Judo, Taekwondo" class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Alamat Lengkap --}}
    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Alamat Lengkap</label>
        <textarea name="address" rows="3" placeholder="Masukkan alamat lengkap venue" class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">{{ old('address', $venue->address ?? '') }}</textarea>
        @error('address')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Koordinat Map --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Latitude (Peta Leaflet)</label>
        <input type="text" name="latitude" value="{{ old('latitude', $venue->latitude ?? '') }}" placeholder="-6.575816" class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('latitude')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Longitude (Peta Leaflet)</label>
        <input type="text" name="longitude" value="{{ old('longitude', $venue->longitude ?? '') }}" placeholder="106.796958" class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('longitude')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Google Maps URL --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Link Google Maps</label>
        <input type="url" name="gmaps_url" value="{{ old('gmaps_url', $venue->gmaps_url ?? '') }}" placeholder="https://maps.app.goo.gl/..." class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('gmaps_url')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Status (Sesuai Canva Image 2) --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Status <span class="text-red-500">*</span></label>
        @php
            $currentIsActive = old('is_active', isset($venue) ? ($venue->is_active ? '1' : '0') : '1');
        @endphp
        <select name="is_active" class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            <option value="1" {{ (string)$currentIsActive === '1' ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ (string)$currentIsActive === '0' ? 'selected' : '' }}>Nonaktif</option>
        </select>
        @error('is_active')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Foto Venue (Sesuai Canva Image 2) --}}
    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Foto Venue</label>
        <label class="flex flex-col items-center justify-center w-full min-h-[160px] border-2 border-dashed border-blue-300 bg-blue-50/40 rounded-2xl cursor-pointer hover:bg-blue-50 transition-colors p-4 relative">
            <div id="venue-image-placeholder" class="flex flex-col items-center justify-center pt-2 pb-3 text-center">
                <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mb-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                </div>
                <p class="mb-1 text-sm font-semibold text-gray-800">Klik untuk mengunggah foto atau drag and drop</p>
                <p class="text-xs text-gray-500">JPG, PNG, JPEG, WEBP (maksimal 2MB)</p>
            </div>
            <img id="venue-image-preview" class="hidden max-h-36 rounded-xl object-contain my-2 shadow-sm" alt="Preview Foto Venue">
            <input type="file" name="image" id="venue-image-input" accept="image/png,image/jpeg,image/jpg,image/webp" class="hidden">
        </label>
        @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror

        @if(isset($venue) && $venue->image)
            <div class="mt-3 flex items-center gap-3 p-3 bg-gray-50 rounded-xl border border-gray-200">
                <img src="{{ $venue->image_url }}" class="w-16 h-16 object-cover rounded-lg border border-gray-200" alt="Preview Foto">
                <div>
                    <span class="text-xs font-semibold text-gray-700">Foto saat ini</span>
                    <p class="text-[11px] text-gray-500">Unggah foto baru di atas jika ingin mengganti foto venue ini.</p>
                </div>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script nonce="{{ $cspNonce ?? '' }}">
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('venue-image-input');
        const imagePreview = document.getElementById('venue-image-preview');
        const imagePlaceholder = document.getElementById('venue-image-placeholder');

        imageInput?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    imagePreview.src = ev.target.result;
                    imagePreview.classList.remove('hidden');
                    if (imagePlaceholder) imagePlaceholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endpush
