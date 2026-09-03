// resources/js/app.js
// Dark mode toggle and count‑up animation for statistics cards
import '../css/chatbot.css';

import './chatbot.js';
import './countdown.js';
import { CustomSelect } from './custom-select.js';

window.CustomSelect = CustomSelect;

document.addEventListener('DOMContentLoaded', () => {
  // ----- Initialize Custom Select Components Globally -----
  CustomSelect.initAll();
  // ----- Dark Mode -----
  const htmlEl = document.documentElement;
  const toggleBtn = document.getElementById('darkModeToggle');
  const themeIcon = document.getElementById('themeIcon');

  // Initialize theme from localStorage
  const storedTheme = localStorage.getItem('theme');
  if (storedTheme === 'dark') {
    htmlEl.classList.add('dark');
    if (themeIcon) themeIcon.setAttribute('d', 'M10 2a8 8 0 100 16 8 8 0 000-16z'); // moon icon path (placeholder)
  }

  if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
      htmlEl.classList.toggle('dark');
      const isDark = htmlEl.classList.contains('dark');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
      // Simple icon swap (sun / moon)
      if (themeIcon) {
        if (isDark) {
          // Moon
          themeIcon.setAttribute('d', 'M21 12.79A9 9 0 1111.21 3a7 7 0 009.79 9.79z');
        } else {
          // Sun
          themeIcon.setAttribute('d', 'M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41M12 6a6 6 0 100 12 6 6 0 000-12z');
        }
      }
    });
  }

  // ----- Count‑Up Animation -----
  const counters = document.querySelectorAll('.stats-card h3');
  const animateCount = (el, target) => {
    const duration = 1500; // ms
    const start = 0;
    const startTime = performance.now();
    const step = (now) => {
      const progress = Math.min((now - startTime) / duration, 1);
      const current = Math.floor(start + progress * (target - start));
      el.textContent = current;
      if (progress < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  };

  counters.forEach((el) => {
    const target = parseInt(el.textContent.replace(/[^0-9]/g, ''), 10);
    if (!isNaN(target)) {
      el.textContent = '0';
      animateCount(el, target);
    }
  });

  // ----- Logika Halaman Fasilitas -----
  initFasilitasPage();
});

function initFasilitasPage() {
  const listEl = document.getElementById('facilityList');
  if (!listEl) return;

  const dataScript = document.getElementById('facilities-data');
  let facilities = [];
  if (dataScript) {
    try {
      facilities = JSON.parse(dataScript.textContent || '[]');
    } catch (e) {
      console.error('Error parsing facilities data:', e);
      facilities = window.__FACILITIES__ || [];
    }
  } else {
    facilities = window.__FACILITIES__ || [];
  }

  const ITEMS_PER_PAGE = 5;
  let currentPage = 1;
  let filteredData = [...facilities];

  const categoryMeta = {
    hotel: {
      title: 'Hotel & Penginapan',
      description: 'Akomodasi resmi dan tempat menginap bagi kontingen, atlet, serta pengunjung.',
      color: '#4f46e5',
      bg: '#e0e7ff',
      icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M7 13c1.66 0 3-1.34 3-3S8.66 7 7 7s-3 1.34-3 3 1.34 3 3 3zm12-6h-8v7H3V5H1v15h2v-3h18v3h2v-9c0-2.21-1.79-4-4-4z"/></svg>`
    },
    rs: {
      title: 'Rumah Sakit',
      description: 'Fasilitas pelayanan kesehatan darurat dan rujukan medis selama kegiatan berlangsung.',
      color: '#dc2626',
      bg: '#fee2e2',
      icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-1.99.9-1.99 2L3 19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 11h-4v4h-4v-4H6v-4h4V6h4v4h4v4z"/></svg>`
    },
    puskesmas: {
      title: 'Puskesmas',
      description: 'Pusat kesehatan masyarakat tingkat pertama yang tersebar di sekitar lokasi venue.',
      color: '#d97706',
      bg: '#fef3c7',
      icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1 2 .9 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/></svg>`
    },
    apotek: {
      title: 'Apotek & Farmasi',
      description: 'Penyedia obat-obatan, perlengkapan medis ringan, dan perbekalan kesehatan.',
      color: '#db2777',
      bg: '#fce7f3',
      icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M4.5 10.5C3.67 10.5 3 11.17 3 12v6c0 .83.67 1.5 1.5 1.5h15c.83 0 1.5-.67 1.5-1.5v-6c0-.83-.67-1.5-1.5-1.5h-15zM12 4.5C9.51 4.5 7.5 6.51 7.5 9h9c0-2.49-2.01-4.5-4.5-4.5zM11 13h2v4h-2v-4z"/></svg>`
    },
    polsek: {
      title: 'Polres & Polsek (Keamanan)',
      description: 'Kantor dan pos kepolisian untuk menjamin keamanan dan ketertiban area venue.',
      color: '#059669',
      bg: '#d1fae5',
      icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/></svg>`
    },
    restoran: {
      title: 'Restoran & Kuliner',
      description: 'Fasilitas rumah makan dan kuliner terdekat dari area pertandingan.',
      color: '#ea580c',
      bg: '#ffedd5',
      icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-7v8h2.5v8H21V2h-5z"/></svg>`
    },
    transport: {
      title: 'Sewa Kendaraan (Transportasi)',
      description: 'Layanan sewa kendaraan dan penyedia armada transportasi resmi kontingen.',
      color: '#0284c7',
      bg: '#e0f2fe',
      icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5-1.5zM5 11l1.5-4.5h11L19 11H5z"/></svg>`
    },
    rekreasi: {
      title: 'Rekreasi',
      description: 'Fasilitas rekreasi seperti mall, pusat kebugaran (fitness), dan tempat hiburan.',
      color: '#0d9488',
      bg: '#ccfbf1',
      icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M20.57 14.86 22 13.43 20.57 12 17 15.57 8.43 7 12 3.43 10.57 2 9.14 3.43 7.71 2 5.57 4.14 4.14 2.71 2.71 4.14l1.43 1.43L2 7.71l1.43 1.43L2 10.57 3.43 12 7 8.43 15.57 17 12 20.57 13.43 22l1.43-1.43L16.29 22l2.14-2.14 1.43 1.43 1.43-1.43-1.43-1.43L22 16.29z"/></svg>`
    },
    mall: {
      title: 'Mall & Pusat Belanja',
      description: 'Pusat perbelanjaan dan mall terdekat dari area venue untuk kebutuhan pengunjung.',
      color: '#7c3aed',
      bg: '#ede9fe',
      icon: `<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>`
    }
  };

  // DOM elements
  const pgInfo = document.getElementById('pgInfo');
  const pgBtns = document.getElementById('pgBtns');
  const searchInput = document.getElementById('searchInput');
  const filterType = document.getElementById('filterType');
  const filterVenue = document.getElementById('filterVenue');
  const sortSelect = document.getElementById('sortSelect');
  const btnReset = document.getElementById('btnReset');
  const ssItems = document.querySelectorAll('.ss-item');

  // ---- Scroll indicator untuk strip kategori ----
  const statsStrip = document.querySelector('.stats-strip');
  const statsInner = document.querySelector('.stats-strip-inner');
  const scrollPrev = document.querySelector('.ss-scroll-prev');
  const scrollNext = document.querySelector('.ss-scroll-next');

  function updateScrollButtons() {
    if (!statsInner || !scrollPrev || !scrollNext) return;
    const maxScroll = statsInner.scrollWidth - statsInner.clientWidth;
    const hasOverflow = maxScroll > 0;
    scrollPrev.hidden = !hasOverflow || statsInner.scrollLeft <= 0;
    scrollNext.hidden = !hasOverflow || statsInner.scrollLeft >= maxScroll - 1;
    statsStrip.classList.toggle('at-start', !hasOverflow || statsInner.scrollLeft <= 0);
    statsStrip.classList.toggle('at-end', !hasOverflow || statsInner.scrollLeft >= maxScroll - 1);
  }

  if (statsInner && scrollPrev && scrollNext) {
    scrollPrev.addEventListener('click', () => {
      statsInner.scrollBy({ left: -300, behavior: 'smooth' });
    });
    scrollNext.addEventListener('click', () => {
      statsInner.scrollBy({ left: 300, behavior: 'smooth' });
    });
    statsInner.addEventListener('scroll', updateScrollButtons, { passive: true });
    window.addEventListener('resize', updateScrollButtons);
    updateScrollButtons();
  }

  // Populate venue dropdown dynamically
  if (filterVenue) {
    const venues = [...new Set(facilities.flatMap(f => (Array.isArray(f.venue) ? f.venue : [f.venue])).filter(Boolean))].sort();
    const currentVal = filterVenue.value;
    let venueOptions = `<option value="all">Semua Venue</option>`;
    venues.forEach(v => {
      venueOptions += `<option value="${escapeHtml(v)}">${escapeHtml(v)}</option>`;
    });
    filterVenue.innerHTML = venueOptions;
    if (venues.includes(currentVal)) {
      filterVenue.value = currentVal;
    }
  }

  function venueList(f) {
    return Array.isArray(f.venue) ? f.venue : [f.venue];
  }

  function getBadgeClass(tipe) {
    const map = {
      rs: 'badge-rs',
      puskesmas: 'badge-puskesmas',
      apotek: 'badge-apotek',
      hotel: 'badge-hotel',
      polsek: 'badge-polsek',
      restoran: 'badge-restoran',
      transport: 'badge-transport',
      rekreasi: 'badge-rekreasi',
      mall: 'badge-mall'
    };
    return map[tipe] || 'badge-rs';
  }

  function escapeHtml(str) {
    if (!str) return '';
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

  function renderItem(f) {
    const cat = categoryMeta[f.tipe] || { color: '#013469', bg: '#e0e7ff', icon: '' };

    const mapsBtn = f.gmaps ?
      `<a href="${escapeHtml(f.gmaps)}" target="_blank" rel="noopener noreferrer" class="btn-detail">Peta Lokasi &gt;</a>` :
      `<span class="btn-detail btn-disabled">Tidak ada peta</span>`;

    return `
      <div class="facility-item" data-tipe="${escapeHtml(f.tipe)}">
        <div class="fi-avatar" style="background: ${cat.bg}; color: ${cat.color};">
          ${cat.icon}
        </div>
        <div class="fi-details">
          <div class="fi-top">
            <div class="fi-left">
              <div class="fi-name-row">
                <span class="fi-name">${escapeHtml(f.nama)}</span>
                <span class="fi-badge ${getBadgeClass(f.tipe)}">${escapeHtml(f.tipe_label)}</span>
              </div>
              <div class="fi-addr">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:2px">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                </svg>
                <span>${escapeHtml(f.alamat)}</span>
              </div>
              <div class="fi-venue">
                <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16" />
                </svg>
                <span>Terdekat dari Venue: <strong>${escapeHtml(venueList(f).join(', '))}</strong></span>
              </div>
              ${f.telepon && f.telepon !== '-' ? `
              <div class="fi-phone">
                <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink:0;">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span>${escapeHtml(f.telepon)}</span>
              </div>
              ` : ''}
              ${f.layanan && f.layanan !== '-' ? `<div class="fi-layanan">Layanan: <span>${escapeHtml(f.layanan)}</span></div>` : ''}
            </div>
            <div class="fi-right">
              <span class="fi-kecamatan">Jarak: ${escapeHtml(f.jarak)}</span>
              ${mapsBtn}
            </div>
          </div>
        </div>
      </div>`;
  }

  function syncStatsStrip(selectedType) {
    ssItems.forEach(item => {
      const type = item.getAttribute('data-type');
      if (type === selectedType) {
        item.classList.add('active');
      } else {
        item.classList.remove('active');
      }
    });
  }

  function applyFilters() {
    const search = searchInput ? searchInput.value.toLowerCase().trim() : '';
    const type = filterType ? filterType.value : 'all';
    const venue = filterVenue ? filterVenue.value : 'all';

    syncStatsStrip(type);

    filteredData = facilities.filter(f => {
      const venuesOf = venueList(f);
      if (search && !f.nama.toLowerCase().includes(search) && !f.alamat.toLowerCase().includes(search) && !venuesOf.some(v => v.toLowerCase().includes(search))) {
        return false;
      }
      if (type !== 'all' && f.tipe !== type) return false;
      if (venue !== 'all' && !venuesOf.includes(venue)) return false;
      return true;
    });

    const sort = sortSelect ? sortSelect.value : 'nama';
    filteredData.sort((a, b) => {
      if (sort === 'nama') return a.nama.localeCompare(b.nama);
      if (sort === 'nama-desc') return b.nama.localeCompare(a.nama);
      return 0;
    });

    currentPage = 1;
    render();
  }

  function render() {
    const total = filteredData.length;
    const totalPages = Math.ceil(total / ITEMS_PER_PAGE);
    const start = (currentPage - 1) * ITEMS_PER_PAGE;
    const end = Math.min(start + ITEMS_PER_PAGE, total);
    const pageData = filteredData.slice(start, end);

    if (total === 0) {
      listEl.innerHTML = `
        <div class="no-results">
          <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          <p>Tidak ada fasilitas ditemukan</p>
        </div>`;
      if (pgInfo) pgInfo.textContent = '';
      if (pgBtns) pgBtns.innerHTML = '';
      return;
    }

    listEl.innerHTML = pageData.map(renderItem).join('');
    if (pgInfo) pgInfo.textContent = `Menampilkan ${start + 1}-${end} dari ${total} Fasilitas`;

    if (pgBtns) {
      let btnsHtml = '';
      if (currentPage > 1) {
        btnsHtml += `<button class="pg-btn" data-page="${currentPage - 1}">&lt;</button>`;
      }
      for (let i = 1; i <= totalPages; i++) {
        if (totalPages > 7) {
          if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
            btnsHtml += `<button class="pg-btn ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</button>`;
          } else if (i === currentPage - 2 || i === currentPage + 2) {
            btnsHtml += `<button class="pg-btn ellipsis" disabled>...</button>`;
          }
        } else {
          btnsHtml += `<button class="pg-btn ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</button>`;
        }
      }
      if (currentPage < totalPages) {
        btnsHtml += `<button class="pg-btn" data-page="${currentPage + 1}">&gt;</button>`;
      }
      pgBtns.innerHTML = btnsHtml;

      pgBtns.querySelectorAll('.pg-btn[data-page]').forEach(btn => {
        btn.addEventListener('click', () => {
          currentPage = parseInt(btn.dataset.page, 10);
          render();
          listEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
      });
    }
  }

  // Event Listeners
  if (searchInput) searchInput.addEventListener('input', applyFilters);
  if (filterType) filterType.addEventListener('change', applyFilters);
  if (filterVenue) filterVenue.addEventListener('change', applyFilters);
  if (sortSelect) sortSelect.addEventListener('change', applyFilters);

  if (btnReset) {
    btnReset.addEventListener('click', () => {
      if (searchInput) searchInput.value = '';
      if (filterType) filterType.value = 'all';
      if (filterVenue) filterVenue.value = 'all';
      if (sortSelect) sortSelect.value = 'nama';
      applyFilters();
    });
  }

  ssItems.forEach(item => {
    item.addEventListener('click', () => {
      const type = item.getAttribute('data-type') || 'all';
      if (filterType) filterType.value = type;
      applyFilters();
    });
  });

  applyFilters();
}


