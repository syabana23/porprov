<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Cabang Olahraga <span class="text-red-500">*</span></label>
        <input type="text" name="name" value="{{ old('name', $sport->name ?? '') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Slug (opsional)</label>
        <input type="text" name="slug" value="{{ old('slug', $sport->slug ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Otomatis jika dikosongkan">
        @error('slug')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Urutan Tampil</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $sport->sort_order ?? 0) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
        <textarea name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description', $sport->description ?? '') }}</textarea>
        @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-2">Logo Cabang Olahraga</label>
        <label class="flex flex-col items-center justify-center w-full min-h-[160px] border-2 border-dashed border-[#93c5fd] bg-[#f8fbff] rounded-xl cursor-pointer hover:bg-[#f0f7ff] transition-colors p-4 relative">
            <div id="sport-logo-placeholder" class="flex flex-col items-center justify-center pt-3 pb-4 text-center">
                <svg class="w-10 h-10 mb-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                <p class="mb-1 text-sm text-gray-800"><span class="font-semibold">Klik untuk upload logo</span> atau drag & drop</p>
                <p class="text-xs text-gray-500">PNG, JPG, JPEG, WEBP (maks. 4MB)</p>
            </div>
            <img id="sport-logo-preview" class="hidden max-h-32 rounded-lg object-contain my-2 shadow-sm" alt="Preview Logo">
            <input type="file" name="logo" id="sport-logo-input" accept="image/png,image/jpeg,image/jpg,image/webp" class="hidden">
        </label>
        @error('logo')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror

        @if(isset($sport) && $sport->logo)
            <div class="mt-3 flex items-center gap-3 p-3 bg-gray-50 rounded-xl border border-gray-200">
                <img src="{{ $sport->logo_url }}" class="w-14 h-14 object-contain rounded-lg border border-gray-200 bg-white p-1" alt="{{ $sport->name }}">
                <div>
                    <span class="text-xs font-semibold text-gray-700">Logo saat ini</span>
                    <p class="text-[11px] text-gray-500">Unggah file baru di atas jika ingin mengganti logo cabor ini.</p>
                </div>
            </div>
        @endif
    </div>
    <div class="md:col-span-2">
        <label class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $sport->is_active ?? true) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
            <span class="text-sm text-gray-700">Aktif</span>
        </label>
    </div>
</div>

@push('scripts')
<script nonce="{{ $cspNonce ?? '' }}">
    document.addEventListener('DOMContentLoaded', function() {
        const logoInput = document.getElementById('sport-logo-input');
        const logoPreview = document.getElementById('sport-logo-preview');
        const logoPlaceholder = document.getElementById('sport-logo-placeholder');

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
