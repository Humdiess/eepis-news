<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="EEPIS News - Portal berita resmi Politeknik Elektronika Negeri Surabaya.">

    <title>@yield('title', 'EEPIS News - Portal Berita Kampus PENS')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .nav-link { position: relative; }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #0EA5E9;
            transition: width 0.25s ease;
        }
        .nav-link:hover::after { width: 100%; }
        .news-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .news-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        }
        .img-zoom { transition: transform 0.5s ease; }
        .group:hover .img-zoom { transform: scale(1.04); }
    </style>
</head>
<body class="font-sans antialiased bg-white text-slate-800">

    {{-- ========== NAVBAR ========== --}}
    <nav x-data="{ mobileOpen: false }" class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-100">

        {{-- Top Bar (Desktop) --}}
        <div class="hidden lg:block border-b border-slate-50">
            <div class="max-w-7xl mx-auto px-6 flex items-center justify-between h-10">
                <div class="flex items-center gap-4 text-xs text-slate-400">
                    <span>{{ now()->translatedFormat('l, d F Y') }}</span>
                </div>
                <div class="flex items-center gap-4">
                    <form action="{{ route('news.search') }}" method="GET" class="relative">
                        <input type="text" name="q" placeholder="Cari berita..." class="w-48 pl-8 pr-3 py-1.5 text-xs bg-slate-50 border-0 rounded-lg text-slate-600 placeholder-slate-400 focus:ring-1 focus:ring-sky-200 focus:bg-white transition-all">
                        <svg class="w-3.5 h-3.5 absolute left-2.5 top-2 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                    </form>
                </div>
            </div>
        </div>

        {{-- Main Nav --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-14 lg:h-16">
                {{-- Logo --}}
                <a href="/" class="flex items-center gap-2.5 shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="EEPIS" class="w-9 h-9 lg:w-10 lg:h-10 object-contain">
                    <div class="leading-none">
                        <span class="text-lg font-extrabold text-slate-900 tracking-tight">EEPIS</span>
                        <span class="text-lg font-light text-sky-500">News</span>
                    </div>
                </a>

                {{-- Desktop Categories --}}
                <div class="hidden lg:flex items-center gap-1">
                    <a href="/" class="nav-link px-3 py-2 text-[13px] font-semibold text-slate-900 rounded-lg hover:bg-slate-50 transition-colors">Beranda</a>
                    @foreach($navCategories as $cat)
                    <a href="{{ route('news.category', $cat->slug) }}" class="nav-link px-3 py-2 text-[13px] font-medium text-slate-500 rounded-lg hover:text-slate-900 hover:bg-slate-50 transition-colors">{{ $cat->name }}</a>
                    @endforeach
                </div>

                {{-- Mobile buttons --}}
                <div class="flex lg:hidden items-center gap-1">
                    <a href="{{ route('news.search') }}" class="p-2 text-slate-400 hover:text-slate-600 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                    </a>
                    <button @click="mobileOpen = !mobileOpen" class="p-2 text-slate-400 hover:text-slate-600 rounded-lg">
                        <svg x-show="!mobileOpen" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                        <svg x-show="mobileOpen" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileOpen" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0 -translate-y-1"
             class="lg:hidden border-t border-slate-100 bg-white">
            <div class="max-w-7xl mx-auto px-4 py-4 space-y-1">
                <a href="/" class="block px-3 py-2.5 text-sm font-semibold text-slate-900 rounded-lg hover:bg-slate-50">Beranda</a>
                @foreach($navCategories as $cat)
                <a href="{{ route('news.category', $cat->slug) }}" class="block px-3 py-2.5 text-sm text-slate-500 rounded-lg hover:bg-slate-50 hover:text-slate-900">{{ $cat->name }}</a>
                @endforeach
                <div class="pt-3 mt-3 border-t border-slate-100">
                    <form action="{{ route('news.search') }}" method="GET">
                        <input type="text" name="q" placeholder="Cari berita..." class="w-full px-4 py-2.5 text-sm bg-slate-50 border-0 rounded-xl text-slate-600 placeholder-slate-400 focus:ring-2 focus:ring-sky-200">
                    </form>
                </div>
            </div>
        </div>
    </nav>

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- ========== FOOTER ========== --}}
    <footer class="bg-slate-900 text-slate-400">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                {{-- Brand --}}
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-lg font-extrabold text-white">EEPIS</span>
                        <span class="text-lg font-light text-sky-400">News</span>
                    </div>
                    <p class="text-sm leading-relaxed mb-5">Portal berita resmi Politeknik Elektronika Negeri Surabaya. Menyajikan informasi terkini seputar akademik, riset, dan kehidupan kampus.</p>
                    <div class="flex items-center gap-2">
                        <a href="#" class="w-8 h-8 bg-white/5 hover:bg-sky-500/20 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/5 hover:bg-sky-500/20 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/5 hover:bg-sky-500/20 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Kategori --}}
                <div>
                    <h4 class="text-xs font-semibold text-white uppercase tracking-widest mb-4">Kategori</h4>
                    <ul class="space-y-2.5">
                        @foreach($navCategories as $cat)
                        <li><a href="{{ route('news.category', $cat->slug) }}" class="text-sm hover:text-sky-400 transition-colors">{{ $cat->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                {{-- Tautan --}}
                <div>
                    <h4 class="text-xs font-semibold text-white uppercase tracking-widest mb-4">Tautan</h4>
                    <ul class="space-y-2.5">
                        <li><a href="#" class="text-sm hover:text-sky-400 transition-colors">Website PENS</a></li>
                        <li><a href="#" class="text-sm hover:text-sky-400 transition-colors">Sistem Akademik</a></li>
                        <li><a href="#" class="text-sm hover:text-sky-400 transition-colors">E-Learning</a></li>
                        <li><a href="#" class="text-sm hover:text-sky-400 transition-colors">Perpustakaan</a></li>
                    </ul>
                </div>

                {{-- Kontak --}}
                <div>
                    <h4 class="text-xs font-semibold text-white uppercase tracking-widest mb-4">Kontak Redaksi</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start gap-2.5">
                            <svg class="w-4 h-4 text-sky-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                            <span>Jl. Raya ITS, Keputih, Sukolilo, Surabaya 60111</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-sky-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                            <span>redaksi@eepis-news.ac.id</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="border-t border-white/5">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-xs text-slate-500">&copy; {{ date('Y') }} EEPIS News — Politeknik Elektronika Negeri Surabaya</p>
                <div class="flex items-center gap-5">
                    <a href="#" class="text-xs text-slate-500 hover:text-sky-400 transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="text-xs text-slate-500 hover:text-sky-400 transition-colors">Redaksi</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
