<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="EEPIS News - Portal berita resmi Politeknik Elektronika Negeri Surabaya. Informasi terkini seputar akademik, riset, prestasi, dan kehidupan kampus PENS.">
    <meta name="keywords" content="EEPIS, PENS, berita kampus, politeknik, elektronika, surabaya">

    <title>@yield('title', 'EEPIS News - Portal Berita Kampus PENS')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-pens-gray text-pens-navy">

    {{-- ========== NAVBAR ========== --}}
    <nav class="nav-glass fixed top-0 left-0 right-0 z-50 border-b border-white/5" x-data="{ mobileOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Logo --}}
                <a href="/" class="flex items-center gap-3 group">
                    <div class="w-9 h-9 bg-gradient-to-br from-pens-cyan to-pens-light rounded-lg flex items-center justify-center shadow-lg shadow-pens-cyan/20 group-hover:shadow-pens-cyan/40 transition-shadow duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-lg font-bold text-white tracking-tight">EEPIS</span>
                        <span class="text-lg font-light text-pens-light tracking-tight"> News</span>
                    </div>
                </a>

                {{-- Desktop Nav --}}
                <div class="hidden md:flex items-center gap-1">
                    <a href="/" class="px-4 py-2 text-sm font-medium text-white hover:text-pens-light transition-colors rounded-lg hover:bg-white/5">Beranda</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-gray-300 hover:text-pens-light transition-colors rounded-lg hover:bg-white/5">Akademik</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-gray-300 hover:text-pens-light transition-colors rounded-lg hover:bg-white/5">Riset</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-gray-300 hover:text-pens-light transition-colors rounded-lg hover:bg-white/5">Prestasi</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-gray-300 hover:text-pens-light transition-colors rounded-lg hover:bg-white/5">Kegiatan</a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-gray-300 hover:text-pens-light transition-colors rounded-lg hover:bg-white/5">Opini</a>
                </div>

                {{-- Search + Mobile Toggle --}}
                <div class="flex items-center gap-3">
                    <button class="p-2 text-gray-300 hover:text-pens-light transition-colors rounded-lg hover:bg-white/5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                        </svg>
                    </button>
                    <button @click="mobileOpen = !mobileOpen" class="md:hidden p-2 text-gray-300 hover:text-white transition-colors rounded-lg hover:bg-white/5">
                        <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileOpen" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="md:hidden border-t border-white/5">
            <div class="px-4 py-3 space-y-1">
                <a href="/" class="block px-4 py-2.5 text-sm font-medium text-white rounded-lg bg-white/5">Beranda</a>
                <a href="#" class="block px-4 py-2.5 text-sm font-medium text-gray-300 hover:text-white rounded-lg hover:bg-white/5 transition-colors">Akademik</a>
                <a href="#" class="block px-4 py-2.5 text-sm font-medium text-gray-300 hover:text-white rounded-lg hover:bg-white/5 transition-colors">Riset</a>
                <a href="#" class="block px-4 py-2.5 text-sm font-medium text-gray-300 hover:text-white rounded-lg hover:bg-white/5 transition-colors">Prestasi</a>
                <a href="#" class="block px-4 py-2.5 text-sm font-medium text-gray-300 hover:text-white rounded-lg hover:bg-white/5 transition-colors">Kegiatan</a>
                <a href="#" class="block px-4 py-2.5 text-sm font-medium text-gray-300 hover:text-white rounded-lg hover:bg-white/5 transition-colors">Opini</a>
            </div>
        </div>
    </nav>

    {{-- ========== MAIN CONTENT ========== --}}
    <main class="pt-16">
        @yield('content')
    </main>

    {{-- ========== FOOTER ========== --}}
    <footer class="bg-pens-navy text-gray-300">
        {{-- Main Footer --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                {{-- Brand --}}
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 bg-gradient-to-br from-pens-cyan to-pens-light rounded-lg flex items-center justify-center shadow-lg shadow-pens-cyan/20">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-lg font-bold text-white">EEPIS</span>
                            <span class="text-lg font-light text-pens-light"> News</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed mb-6">
                        Portal berita resmi Politeknik Elektronika Negeri Surabaya. Menyajikan informasi terkini seputar akademik, riset, dan kehidupan kampus.
                    </p>
                    <div class="flex items-center gap-3">
                        <a href="#" class="w-9 h-9 bg-white/5 hover:bg-pens-cyan/20 border border-white/10 rounded-lg flex items-center justify-center transition-all duration-300 hover:border-pens-cyan/30">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 bg-white/5 hover:bg-pens-cyan/20 border border-white/10 rounded-lg flex items-center justify-center transition-all duration-300 hover:border-pens-cyan/30">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 bg-white/5 hover:bg-pens-cyan/20 border border-white/10 rounded-lg flex items-center justify-center transition-all duration-300 hover:border-pens-cyan/30">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 bg-white/5 hover:bg-pens-cyan/20 border border-white/10 rounded-lg flex items-center justify-center transition-all duration-300 hover:border-pens-cyan/30">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Kategori --}}
                <div>
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-5">Kategori</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Akademik</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Riset & Inovasi</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Prestasi Mahasiswa</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Kegiatan Kampus</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Opini & Artikel</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Pengumuman</a></li>
                    </ul>
                </div>

                {{-- Tautan --}}
                <div>
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-5">Tautan</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Website PENS</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Sistem Akademik</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-pens-light transition-colors">E-Learning</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Perpustakaan</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Tracer Study</a></li>
                        <li><a href="#" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Kontak Kami</a></li>
                    </ul>
                </div>

                {{-- Kontak --}}
                <div>
                    <h4 class="text-sm font-semibold text-white uppercase tracking-wider mb-5">Kontak Redaksi</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-pens-cyan mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                            </svg>
                            <span class="text-sm text-gray-400">Jl. Raya ITS, Keputih, Sukolilo, Surabaya 60111</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-pens-cyan flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                            </svg>
                            <span class="text-sm text-gray-400">redaksi@eepis-news.ac.id</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-pens-cyan flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                            </svg>
                            <span class="text-sm text-gray-400">(031) 594-7280</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="border-t border-white/5">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-xs text-gray-500">&copy; {{ date('Y') }} EEPIS News — Politeknik Elektronika Negeri Surabaya. All rights reserved.</p>
                    <div class="flex items-center gap-6">
                        <a href="#" class="text-xs text-gray-500 hover:text-pens-light transition-colors">Kebijakan Privasi</a>
                        <a href="#" class="text-xs text-gray-500 hover:text-pens-light transition-colors">Syarat & Ketentuan</a>
                        <a href="#" class="text-xs text-gray-500 hover:text-pens-light transition-colors">Redaksi</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
