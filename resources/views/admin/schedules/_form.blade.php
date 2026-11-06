<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
    {{-- Cabang Olahraga --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Cabang Olahraga <span class="text-red-500">*</span></label>
        <select name="sport_id" required class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            <option value="">Pilih Cabang Olahraga</option>
            @foreach($sports as $sport)
                <option value="{{ $sport->id }}" {{ old('sport_id', $schedule->sport_id ?? '') == $sport->id ? 'selected' : '' }}>{{ $sport->name }}</option>
            @endforeach
        </select>
        @error('sport_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Kategori --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Kategori</label>
        <input type="text" name="category" value="{{ old('category', $schedule->category ?? '') }}" placeholder="Contoh: Beregu, Individu, Pool A" class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('category')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Nama Pertandingan --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Nama Pertandingan <span class="text-red-500">*</span></label>
        <input type="text" name="match_title" value="{{ old('match_title', $schedule->match_title ?? '') }}" required placeholder="Contoh: Babak Penyisihan, Final Tunggal" class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('match_title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Peserta / Kontingen 1 --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Peserta / Kontingen 1</label>
        <select name="contingent_id" class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            <option value="">Pilih Kontingen 1</option>
            @foreach($contingents as $contingent)
                <option value="{{ $contingent->id }}" {{ old('contingent_id', $schedule->contingent_id ?? '') == $contingent->id ? 'selected' : '' }}>{{ $contingent->name }}</option>
            @endforeach
        </select>
        @error('contingent_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Peserta / Kontingen 2 --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Peserta / Kontingen 2 (Lawan)</label>
        <select name="opponent_contingent_id" class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            <option value="">Pilih Kontingen Lawan (opsional)</option>
            @foreach($contingents as $contingent)
                <option value="{{ $contingent->id }}" {{ old('opponent_contingent_id', $schedule->opponent_contingent_id ?? '') == $contingent->id ? 'selected' : '' }}>{{ $contingent->name }}</option>
            @endforeach
        </select>
        @error('opponent_contingent_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Venue --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Venue</label>
        <select name="venue_id" class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            <option value="">Pilih Venue</option>
            @foreach($venues as $venue)
                <option value="{{ $venue->id }}" {{ old('venue_id', $schedule->venue_id ?? '') == $venue->id ? 'selected' : '' }}>{{ $venue->name }}</option>
            @endforeach
        </select>
        @error('venue_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Tanggal Pertandingan --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Tanggal Pertandingan <span class="text-red-500">*</span></label>
        <input type="date" name="match_date" value="{{ old('match_date', isset($schedule->match_date) ? (is_string($schedule->match_date) ? $schedule->match_date : $schedule->match_date->format('Y-m-d')) : '') }}" required class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
        @error('match_date')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Waktu Mulai & Selesai --}}
    <div>
        <div class="grid grid-cols-2 gap-2">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Waktu Mulai</label>
                <input type="time" name="start_time" value="{{ old('start_time', isset($schedule->start_time) ? substr($schedule->start_time, 0, 5) : '') }}" class="w-full px-3 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Waktu Selesai</label>
                <input type="time" name="end_time" value="{{ old('end_time', isset($schedule->end_time) ? substr($schedule->end_time, 0, 5) : '') }}" class="w-full px-3 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            </div>
        </div>
        @error('start_time')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        @error('end_time')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Status Pertandingan --}}
    <div>
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Status <span class="text-red-500">*</span></label>
        <select name="status" required class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
            <option value="upcoming" {{ old('status', $schedule->status ?? 'upcoming') == 'upcoming' ? 'selected' : '' }}>Terjadwal</option>
            <option value="ongoing" {{ old('status', $schedule->status ?? '') == 'ongoing' ? 'selected' : '' }}>Dalam Proses</option>
            <option value="finished" {{ old('status', $schedule->status ?? '') == 'finished' ? 'selected' : '' }}>Selesai</option>
        </select>
        @error('status')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- Catatan (span full) --}}
    <div class="col-span-full">
        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Catatan Tambahan (opsional)</label>
        <textarea name="notes" rows="2" placeholder="Informasi tambahan pertandingan, babak, meja/lapangan..." class="w-full px-3.5 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">{{ old('notes', $schedule->notes ?? '') }}</textarea>
        @error('notes')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
</div>

{{-- Notice Box Sesuai Canva --}}
<div class="mt-6 p-4 rounded-xl bg-blue-50/70 border border-blue-100 flex items-center gap-3">
    <svg class="w-5 h-5 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    <p class="text-xs text-blue-800 font-medium">Pastikan data yang dimasukkan sudah benar dan terkonfirmasi dengan pengawas pertandingan resmi.</p>
</div>
