<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-2">Judul <span class="text-red-500">*</span></label>
        <input type="text" name="title" value="{{ old('title', $gallery->title ?? '') }}" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Slug (opsional)</label>
        <input type="text" name="slug" value="{{ old('slug', $gallery->slug ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Otomatis jika dikosongkan">
        @error('slug')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Tipe Media <span class="text-red-500">*</span></label>
        <select name="media_type" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="image" {{ old('media_type', $gallery->media_type ?? 'image') == 'image' ? 'selected' : '' }}>Gambar</option>
            <option value="video" {{ old('media_type', $gallery->media_type ?? '') == 'video' ? 'selected' : '' }}>Video (Link)</option>
        </select>
        @error('media_type')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
        <input type="text" name="category" value="{{ old('category', $gallery->category ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        @error('category')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Urutan Tampil</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $gallery->sort_order ?? 0) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-2">Upload Gambar (jika tipe Gambar)</label>
        <label class="flex flex-col items-center justify-center w-full min-h-[160px] border-2 border-dashed border-[#93c5fd] bg-[#f8fbff] rounded-xl cursor-pointer hover:bg-[#f0f7ff] transition-colors p-4 relative">
            <div id="gallery-placeholder" class="flex flex-col items-center justify-center pt-3 pb-4 text-center">
                <svg class="w-10 h-10 mb-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                <p class="mb-1 text-sm text-gray-800"><span class="font-semibold">Klik untuk upload foto</span> atau drag & drop</p>
                <p class="text-xs text-gray-500">PNG, JPG, JPEG, WEBP (maks. 4MB)</p>
            </div>
            <img id="gallery-preview" class="hidden max-h-36 rounded-lg object-contain my-2 shadow-sm" alt="Preview Gambar">
            <input type="file" name="file" id="gallery-file-input" accept="image/png,image/jpeg,image/jpg,image/webp" class="hidden">
        </label>
        @error('file')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror

        @if(isset($gallery) && $gallery->media_type == 'image' && $gallery->file_path)
            <div class="mt-3 flex items-center gap-3 p-3 bg-gray-50 rounded-xl border border-gray-200">
                <img src="{{ $gallery->image_url }}" class="w-16 h-16 object-cover rounded-lg border border-gray-200" alt="{{ $gallery->title }}">
                <div>
                    <span class="text-xs font-semibold text-gray-700">Gambar saat ini</span>
                    <p class="text-[11px] text-gray-500">Unggah file baru di atas jika ingin mengganti gambar galeri ini.</p>
                </div>
            </div>
        @endif
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-2">Link Video (jika tipe Video)</label>
        <input type="url" name="url" value="{{ old('url', $gallery->url ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="https://youtube.com/...">
        @error('url')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-2">Caption</label>
        <textarea name="caption" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('caption', $gallery->caption ?? '') }}</textarea>
        @error('caption')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
    <div class="md:col-span-2">
        <label class="flex items-center gap-2">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $gallery->is_published ?? true) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
            <span class="text-sm text-gray-700">Publikasikan</span>
        </label>
    </div>
</div>

@push('scripts')
<script nonce="{{ $cspNonce ?? '' }}">
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('gallery-file-input');
        const filePreview = document.getElementById('gallery-preview');
        const placeholder = document.getElementById('gallery-placeholder');

        fileInput?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    filePreview.src = ev.target.result;
                    filePreview.classList.remove('hidden');
                    if (placeholder) placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endpush
