@extends('layouts.app')

@section('title', 'Galeri - PANDU PORPROV')

@section('content')
<!-- Banner -->
<section class="page-banner">
    <img class="banner-bg-img" src="{{ asset('images/venue4.jpeg') }}" alt="">
    <div class="banner-inner">
        <div class="banner-icon">
            <svg width="28" height="28" fill="none" stroke="#fff" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
        <div class="banner-text">
            <span class="banner-badge">PORNAVI · 2026</span>
            <h1>GALERI DOKUMENTASI</h1>
            <p>Dokumentasi lapangan selama kegiatan berlangsung</p>
        </div>
    </div>
    <div class="banner-accent-line"></div>
    <div class="banner-bottom-curve">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,20 1200,60 L1200,120 L0,120 Z" fill="#f8fafc"></path>
        </svg>
    </div>
</section>

<!-- Gallery Content -->
<div class="galeri-page">
    <div class="galeri-filter" style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div style="display: flex; gap: 8px; flex-wrap: wrap; align-items: center;">
            <button class="filter-btn active" data-category="all">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                Semua
            </button>
            @foreach($categories as $cat)
                <button class="filter-btn" data-category="{{ \Illuminate\Support\Str::slug($cat) }}" style="background: #e2e8f0; color: #334155;">
                    {{ $cat }}
                </button>
            @endforeach
        </div>
        <div style="position: relative; max-width: 320px; width: 100%;">
            <input type="text" id="searchGaleri" placeholder="Cari foto/galeri..." style="width: 100%; padding: 8px 14px 8px 36px; border: 1.5px solid #e2e8f0; border-radius: 9999px; font-size: 13px; outline: none; transition: all 0.2s; background: #fff;">
            <svg style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; color: #94a3b8;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
    </div>

    <div class="gallery-grid" id="galleryGrid">
        @forelse($galleries as $gallery)
        <div class="gallery-item"
             data-category="{{ \Illuminate\Support\Str::slug($gallery->category ?? 'venue') }}"
             data-title="{{ $gallery->title }}"
             data-img="{{ $gallery->image_url ?? asset('images/venue1.jpeg') }}"
             data-category-name="{{ $gallery->category ?? 'Venue' }}"
             data-date="{{ $gallery->published_at ? \Carbon\Carbon::parse($gallery->published_at)->translatedFormat('d M Y') : $gallery->created_at->translatedFormat('d M Y') }}"
             data-caption="{{ $gallery->caption ?? '' }}"
             data-media-type="{{ $gallery->media_type }}"
             data-video-url="{{ $gallery->url ?? '' }}">
            <img src="{{ $gallery->image_url ?? asset('images/venue1.jpeg') }}" alt="{{ $gallery->title }}" loading="lazy">
            <div class="overlay"></div>
            @if($gallery->media_type === 'video')
                <div style="position: absolute; top: 12px; right: 12px; background: rgba(220,38,38,0.9); color: #fff; border-radius: 9999px; padding: 4px 10px; font-size: 11px; font-weight: 700; display: flex; align-items: center; gap: 4px;">
                    <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    Video
                </div>
            @endif
            <div class="info">
                <p class="item-name">{{ $gallery->title }}</p>
                <div class="item-meta">
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ $gallery->published_at ? \Carbon\Carbon::parse($gallery->published_at)->translatedFormat('d M Y') : $gallery->created_at->translatedFormat('d M Y') }}
                    </span>
                    <span>
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ $gallery->category ?? 'Venue' }}
                    </span>
                </div>
            </div>
        </div>
        @empty
        <div style="grid-column: 1 / -1; text-align: center; padding: 48px 16px; color: #64748b;">
            <p style="font-size: 15px; font-weight: 500;">Belum ada dokumentasi galeri yang dipublikasikan.</p>
        </div>
        @endforelse
    </div>

    <!-- Empty state for search/filter -->
    <div id="galleryEmptyState" style="display: none; text-align: center; padding: 48px 16px; color: #64748b;">
        <svg style="margin: 0 auto 12px; width: 40px; height: 40px; color: #cbd5e1;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <p style="font-size: 15px; font-weight: 500;">Tidak ada galeri yang sesuai dengan pencarian.</p>
    </div>

    @if($galleries->count() > 8)
    <!-- Load More -->
    <div class="load-more-wrap" id="loadMoreWrap">
        <button class="btn-load-more" id="btnLoadMore">
            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Muat Lebih Banyak
        </button>
    </div>
    @endif
</div>

<!-- Lightbox Modal -->
<div id="galleryModal" class="gallery-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="modalGalleryTitle">
    <div class="gallery-modal-content">
        <button class="gallery-modal-close" id="modalGalleryClose" aria-label="Tutup">&times;</button>
        <div class="gallery-modal-img-wrap" id="modalMediaWrap">
            <img id="modalGalleryImg" class="gallery-modal-img" src="" alt="">
        </div>
        <div class="gallery-modal-body">
            <div class="gallery-modal-meta">
                <span class="badge" id="modalGalleryCategory">Venue</span>
                <span id="modalGalleryDate">10 Nov 2026</span>
            </div>
            <h3 class="gallery-modal-title" id="modalGalleryTitle">Judul</h3>
            <p class="gallery-modal-caption" id="modalGalleryCaption"></p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchGaleri');
        const filterBtns = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('.gallery-grid .gallery-item');
        const emptyState = document.getElementById('galleryEmptyState');
        const modal = document.getElementById('galleryModal');
        const modalClose = document.getElementById('modalGalleryClose');
        const modalImg = document.getElementById('modalGalleryImg');
        const modalTitle = document.getElementById('modalGalleryTitle');
        const modalDate = document.getElementById('modalGalleryDate');
        const modalCategory = document.getElementById('modalGalleryCategory');
        const modalCaption = document.getElementById('modalGalleryCaption');

        let currentCategory = 'all';
        let currentSearch = '';

        function filterItems() {
            let visibleCount = 0;
            items.forEach(item => {
                const title = (item.getAttribute('data-title') || '').toLowerCase();
                const category = item.getAttribute('data-category') || '';
                const matchCategory = (currentCategory === 'all' || category === currentCategory);
                const matchSearch = title.includes(currentSearch);

                if (matchCategory && matchSearch) {
                    item.style.display = '';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            if (emptyState) {
                emptyState.style.display = (visibleCount === 0 && items.length > 0) ? 'block' : 'none';
            }
        }

        searchInput?.addEventListener('input', function(e) {
            currentSearch = e.target.value.toLowerCase().trim();
            filterItems();
        });

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => {
                    b.classList.remove('active');
                    b.style.background = '#e2e8f0';
                    b.style.color = '#334155';
                });
                this.classList.add('active');
                this.style.background = '#013469';
                this.style.color = '#fff';

                currentCategory = this.getAttribute('data-category');
                filterItems();
            });
        });

        // Open Lightbox Modal
        items.forEach(item => {
            item.addEventListener('click', function() {
                const title = this.getAttribute('data-title');
                const img = this.getAttribute('data-img');
                const category = this.getAttribute('data-category-name');
                const date = this.getAttribute('data-date');
                const caption = this.getAttribute('data-caption');

                if (modalTitle) modalTitle.textContent = title || '';
                if (modalCategory) modalCategory.textContent = category || 'Venue';
                if (modalDate) modalDate.textContent = date || '';
                if (modalCaption) modalCaption.textContent = caption || '';
                if (modalImg) {
                    modalImg.src = img || '';
                    modalImg.alt = title || '';
                }

                if (modal) {
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            });
        });

        function closeModal() {
            if (modal) {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        modalClose?.addEventListener('click', closeModal);
        modal?.addEventListener('click', function(e) {
            if (e.target === modal) closeModal();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal?.classList.contains('active')) {
                closeModal();
            }
        });
    });
</script>
@endpush
@endsection
