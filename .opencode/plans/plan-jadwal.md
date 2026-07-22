# Rencana Implementasi: Perbaikan Section Jadwal

## Ringkasan
Semua perubahan dilakukan dalam 1 file: `resources/views/jadwal.blade.php` (1933 baris).

## Perubahan 1: Komentar Penanda Section
Tambah komentar section header di bagian atas file dan di setiap batas section.

## Perubahan 2: CSS - Table Info Bar (BARU)
Tambah sebelum `/* ── Table ── */` kira-kira di baris 87.

## Perubahan 3: CSS - Table (DIUBAH)
Ubah `.jadwal-table-wrap`, `.jadwal-tbl`, `.jadwal-tbl thead`, `.jadwal-tbl thead th`, `.jadwal-tbl thead th.date-col`. Tambah sticky header, sticky columns, zebra striping, scroll shadow, venue truncation.

## Perubahan 4: CSS - Mobile Card View (BARU)
Tambah `@media (max-width: 640px)` block untuk card view.

## Perubahan 5: CSS - Tablet compact (BARU)
Tambah `@media (min-width: 641px) and (max-width: 1024px)` block.

## Perubahan 6: CSS - Filter mobile (BARU)
Tambah `@media (max-width: 640px)` untuk filter di dalam existing filter section.

## Perubahan 7: HTML - Table Info Bar (SETELAH filter, SEBELUM table)
Tambah div baru dengan class `table-info-bar` berisi row count + scroll hint.

## Perubahan 8: JavaScript - Row count + Scroll hint
Tambah `updateCount()` function, `visibleCount` counter di filter, scroll event listener.

---

File lengkap hasil akhir dapat dilihat setelah implementasi.
