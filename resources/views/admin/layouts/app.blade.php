<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Pandu Porprov')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo_baru.PNG') }}">
    <style>[x-cloak] { display: none !important; }</style>
    <script nonce="{{ $cspNonce ?? '' }}" src="https://cdn.tailwindcss.com"></script>
    <script nonce="{{ $cspNonce ?? '' }}">
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#013469',
                        accent: '#FDB813',
                    }
                }
            }
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body class="admin-body bg-slate-50 font-[Poppins] text-gray-900 antialiased overflow-x-hidden min-h-screen">
    <div class="min-h-screen w-full flex flex-col lg:pl-[258px]">
        <aside class="hidden lg:flex lg:flex-col w-[258px] bg-blue-900 text-white fixed inset-y-0 left-0 z-40 h-full shadow-lg">
            <div class="flex items-center gap-3 px-5 py-5">
                <img src="{{ asset('images/logo_baru.PNG') }}" class="h-9" alt="Logo">
                <div>
                    <div class="text-sm font-semibold leading-tight">Pandu Porprov</div>
                    <div class="text-[10px] text-[#ffd45a] leading-tight">Kota Bogor 2026</div>
                </div>
            </div>
            <nav class="flex-1 px-3 space-y-1 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm min-w-0 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600' : 'hover:bg-white/10' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span class="truncate">Dashboard</span>
                </a>
                <a href="{{ route('admin.schedules.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm min-w-0 {{ request()->routeIs('admin.schedules.*') ? 'bg-blue-600' : 'hover:bg-white/10' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span class="truncate">Pertandingan</span>
                </a>
                <a href="{{ route('admin.venues.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm min-w-0 {{ request()->routeIs('admin.venues.*') ? 'bg-blue-600' : 'hover:bg-white/10' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span class="truncate">Venue</span>
                </a>
                <a href="{{ route('admin.sports.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm min-w-0 {{ request()->routeIs('admin.sports.*') ? 'bg-blue-600' : 'hover:bg-white/10' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                    <span class="truncate">Cabang Olahraga</span>
                </a>
                <a href="{{ route('admin.contingents.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm min-w-0 {{ request()->routeIs('admin.contingents.*') ? 'bg-blue-600' : 'hover:bg-white/10' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    <span class="truncate">Kontingen</span>
                </a>
                <a href="{{ route('admin.facilities.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm min-w-0 {{ request()->routeIs('admin.facilities.*') ? 'bg-blue-600' : 'hover:bg-white/10' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span class="truncate">Fasilitas</span>
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm min-w-0 {{ request()->routeIs('admin.galleries.*') ? 'bg-blue-600' : 'hover:bg-white/10' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span class="truncate">Galeri</span>
                </a>
                <a href="{{ route('admin.standings.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm min-w-0 {{ request()->routeIs('admin.standings.*') ? 'bg-blue-600' : 'hover:bg-white/10' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    <span class="truncate">Klasemen Medali</span>
                </a>
                @if(auth()->user()->isSuperAdmin())
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm min-w-0 {{ request()->routeIs('admin.users.*') ? 'bg-blue-600' : 'hover:bg-white/10' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span class="truncate">Pengguna</span>
                </a>
                @endif
            </nav>
            <div class="px-3 py-4 border-t border-white/10">
                <form id="logout-form-sidebar" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="button" class="btn-logout-trigger flex items-center gap-3 px-3 py-2 rounded-lg text-sm hover:bg-white/10 w-full text-left min-w-0 text-white transition-colors cursor-pointer">
                        <svg class="w-5 h-5 shrink-0 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        <span class="truncate text-white">Logout</span>
                    </button>
                </form>
            </div>
        </aside>
        <div class="flex-1 flex flex-col min-w-0 w-full overflow-x-hidden">
            <header class="bg-white h-14 flex items-center justify-between px-4 sm:px-6 lg:px-8 border-b border-gray-200 sticky top-0 z-30 w-full shadow-[0_1px_2px_rgba(16,36,70,0.02)]">
                <div class="flex items-center gap-3">
                    <button type="button" id="admin-mobile-toggle" class="lg:hidden p-1.5 text-gray-600 hover:bg-slate-100 rounded-lg transition-colors" title="Toggle Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <a href="{{ url('/') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 text-xs text-blue-600 hover:text-blue-700 font-medium">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        Lihat Situs Publik
                    </a>
                </div>
                <div class="relative ml-auto">
                    <button type="button" id="admin-user-menu-btn" class="flex items-center gap-2 text-gray-800 text-sm hover:text-blue-600 transition-colors">
                        <div class="w-8 h-8 rounded-full bg-[#e9f2ff] flex items-center justify-center text-blue-600 font-semibold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div class="hidden sm:flex flex-col items-start leading-tight">
                            <span class="font-medium truncate max-w-[160px]">{{ auth()->user()->name }}</span>
                            <span class="text-xs text-gray-500">{{ auth()->user()->role->display_name ?? '' }}</span>
                        </div>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div id="admin-user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden z-50">
                        <div class="px-4 py-3 border-b border-[#f0f4fb]">
                            <div class="text-sm font-medium text-gray-800 truncate">{{ auth()->user()->name }}</div>
                            <div class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</div>
                        </div>
                        <form id="logout-form-dropdown" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="button" class="btn-logout-trigger w-full text-left px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 flex items-center gap-2 cursor-pointer transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>
            <main class="admin-main flex-1 p-4 sm:p-6 lg:p-8 w-full min-w-0 max-w-7xl mx-auto box-border" style="margin-top: 0 !important;">
                @if(session('success'))
                    <div id="success-flash" data-message="{{ session('success') }}" class="hidden"></div>
                @endif
                @if(session('error'))
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">{{ session('error') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="success-modal" class="fixed inset-0 z-[100] hidden items-center justify-center">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-sm mx-4 p-8 text-center">
            <div class="mx-auto w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mb-4">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Data Berhasil Disimpan!</h3>
            <p id="success-modal-message" class="text-sm text-gray-500 mb-6"></p>
            <button id="success-modal-close" class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">Ok</button>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="delete-modal" class="fixed inset-0 z-[100] hidden items-center justify-center">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-sm mx-4 p-8 text-center">
            <div class="mx-auto w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mb-4">
                <svg class="w-10 h-10 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Konfirmasi Hapus</h3>
            <p id="delete-modal-message" class="text-sm text-gray-500 mb-6">Yakin ingin menghapus data ini?</p>
            <div class="flex items-center gap-3">
                <button id="delete-modal-cancel" class="flex-1 inline-flex items-center justify-center px-4 py-2.5 border border-gray-300 text-gray-800 rounded-lg font-semibold hover:bg-gray-50 transition-colors">Batal</button>
                <button id="delete-modal-confirm" class="flex-1 inline-flex items-center justify-center px-4 py-2.5 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition-colors">Hapus</button>
            </div>
        </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <div id="logout-modal" class="fixed inset-0 z-[100] hidden items-center justify-center">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-sm mx-4 p-6 sm:p-8 text-center">
            <div class="mx-auto w-16 h-16 rounded-full bg-red-50 flex items-center justify-center mb-4 border border-red-100">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Konfirmasi Keluar</h3>
            <p class="text-sm text-gray-500 mb-6">Apakah Anda yakin ingin keluar dari sesi admin?</p>
            <div class="flex items-center gap-3">
                <button type="button" id="logout-modal-cancel" class="flex-1 inline-flex items-center justify-center px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition-colors cursor-pointer">
                    Batal
                </button>
                <button type="button" id="logout-modal-confirm" class="flex-1 inline-flex items-center justify-center px-4 py-2.5 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 shadow-sm transition-colors cursor-pointer">
                    Ya, Keluar
                </button>
            </div>
        </div>
    </div>

    <script nonce="{{ $cspNonce ?? '' }}">
        (function() {
            const userMenuBtn = document.getElementById('admin-user-menu-btn');
            const userMenu = document.getElementById('admin-user-menu');
            if (userMenuBtn && userMenu) {
                userMenuBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    userMenu.classList.toggle('hidden');
                });
                document.addEventListener('click', function(e) {
                    if (!userMenu.contains(e.target) && !userMenuBtn.contains(e.target)) {
                        userMenu.classList.add('hidden');
                    }
                });
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        userMenu.classList.add('hidden');
                    }
                });
            }

            const mobileToggle = document.getElementById('admin-mobile-toggle');
            const aside = document.querySelector('aside');
            if (mobileToggle && aside) {
                mobileToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    aside.classList.toggle('hidden');
                    aside.classList.toggle('flex');
                });
            }

            const successFlash = document.getElementById('success-flash');
            if (successFlash) {
                const modal = document.getElementById('success-modal');
                const msg = document.getElementById('success-modal-message');
                const close = document.getElementById('success-modal-close');
                msg.textContent = successFlash.dataset.message || 'Data berhasil disimpan!';
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                const hide = () => { modal.classList.add('hidden'); modal.classList.remove('flex'); };
                close.addEventListener('click', hide);
                modal.querySelector('.absolute').addEventListener('click', hide);
            }

            let deleteForm = null;
            document.addEventListener('submit', function(e) {
                const form = e.target;
                const hasDeleteMethod = form.querySelector('input[name="_method"][value="DELETE"]');
                const hasDeleteMessage = form.hasAttribute('data-delete-message');
                const hasConfirmOnsubmit = form.getAttribute('onsubmit') && form.getAttribute('onsubmit').includes('confirm');

                if (hasDeleteMethod || hasDeleteMessage || hasConfirmOnsubmit) {
                    e.preventDefault();
                    deleteForm = form;
                    const msg = form.getAttribute('data-delete-message');
                    document.getElementById('delete-modal-message').textContent = msg || 'Yakin ingin menghapus data ini?';
                    const modal = document.getElementById('delete-modal');
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                }
            });

            document.getElementById('delete-modal-cancel').addEventListener('click', function() {
                const modal = document.getElementById('delete-modal');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                deleteForm = null;
            });
            document.getElementById('delete-modal-confirm').addEventListener('click', function() {
                if (deleteForm) {
                    HTMLFormElement.prototype.submit.call(deleteForm);
                }
            });
            document.getElementById('delete-modal').querySelector('.absolute').addEventListener('click', function() {
                document.getElementById('delete-modal').classList.add('hidden');
                document.getElementById('delete-modal').classList.remove('flex');
                deleteForm = null;
            });

            // Logout Confirmation Modal Logic
            const logoutModal = document.getElementById('logout-modal');
            const logoutCancelBtn = document.getElementById('logout-modal-cancel');
            const logoutConfirmBtn = document.getElementById('logout-modal-confirm');
            const logoutTriggers = document.querySelectorAll('.btn-logout-trigger');
            let activeLogoutForm = null;

            logoutTriggers.forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    activeLogoutForm = btn.closest('form');
                    if (logoutModal) {
                        logoutModal.classList.remove('hidden');
                        logoutModal.classList.add('flex');
                    }
                    if (userMenu) {
                        userMenu.classList.add('hidden');
                    }
                });
            });

            function closeLogoutModal() {
                if (logoutModal) {
                    logoutModal.classList.add('hidden');
                    logoutModal.classList.remove('flex');
                }
                activeLogoutForm = null;
            }

            if (logoutCancelBtn) {
                logoutCancelBtn.addEventListener('click', closeLogoutModal);
            }
            if (logoutModal) {
                logoutModal.querySelector('.absolute').addEventListener('click', closeLogoutModal);
            }
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && logoutModal && !logoutModal.classList.contains('hidden')) {
                    closeLogoutModal();
                }
            });

            if (logoutConfirmBtn) {
                logoutConfirmBtn.addEventListener('click', function() {
                    if (activeLogoutForm) {
                        activeLogoutForm.submit();
                    } else {
                        const fallback = document.getElementById('logout-form-sidebar') || document.getElementById('logout-form-dropdown');
                        if (fallback) fallback.submit();
                    }
                });
            }
        })();
    </script>
    @stack('scripts')
</body>
</html>
