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
    <nav class="fixed top-0 left-0 right-0 z-50" style="background:#0F172A;" x-data="{ mobileOpen: false }">

        {{-- Desktop: 3-column layout --}}
        <div class="hidden md:block" style="border-bottom:1px solid rgba(255,255,255,0.08);">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex items-center gap-6" style="height:88px;">

                    {{-- LEFT: Logo --}}
                    <a href="/" class="flex items-center gap-2.5 shrink-0">
                        <img src="{{ asset('images/logo.png') }}" alt="EEPIS" style="width:60px;height:60px;object-fit:contain;">
                    </a>

                    {{-- CENTER: Search bar + category links --}}
                    <div class="flex-1 flex flex-col gap-2">
                        {{-- Search bar --}}
                        <form action="/search" method="GET">
                            <div style="position:relative;">
                                <svg style="position:absolute;left:14px;top:50%;transform:translateY(-50%);width:16px;height:16px;color:#94a3b8;pointer-events:none;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                                </svg>
                                <input type="text" name="q" placeholder="Cari berita, topik, atau kata kunci..."
                                    style="width:100%;height:38px;padding-left:42px;padding-right:16px;background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.12);border-radius:8px;font-size:13px;color:#fff;outline:none;transition:all 0.2s;"
                                    onfocus="this.style.background='rgba(255,255,255,0.11)';this.style.borderColor='rgba(14,165,233,0.5)'"
                                    onblur="this.style.background='rgba(255,255,255,0.07)';this.style.borderColor='rgba(255,255,255,0.12)'"
                                >
                            </div>
                        </form>
                        {{-- Category links --}}
                        <div style="display:flex;align-items:center;gap:0;overflow-x:auto;scrollbar-width:none;">
                            <a href="/" style="padding:0 12px;font-size:11px;font-weight:600;color:#38BDF8;text-transform:uppercase;letter-spacing:0.07em;white-space:nowrap;text-decoration:none;border-bottom:2px solid #0EA5E9;padding-bottom:2px;">Beranda</a>
                            <a href="/kategori" style="padding:0 12px;font-size:11px;font-weight:500;color:#94a3b8;text-transform:uppercase;letter-spacing:0.07em;white-space:nowrap;text-decoration:none;border-bottom:2px solid transparent;padding-bottom:2px;" onmouseover="this.style.color='#38BDF8'" onmouseout="this.style.color='#94a3b8'">Akademik</a>
                            <a href="/kategori" style="padding:0 12px;font-size:11px;font-weight:500;color:#94a3b8;text-transform:uppercase;letter-spacing:0.07em;white-space:nowrap;text-decoration:none;border-bottom:2px solid transparent;padding-bottom:2px;" onmouseover="this.style.color='#38BDF8'" onmouseout="this.style.color='#94a3b8'">Riset</a>
                            <a href="/kategori" style="padding:0 12px;font-size:11px;font-weight:500;color:#94a3b8;text-transform:uppercase;letter-spacing:0.07em;white-space:nowrap;text-decoration:none;border-bottom:2px solid transparent;padding-bottom:2px;" onmouseover="this.style.color='#38BDF8'" onmouseout="this.style.color='#94a3b8'">Prestasi</a>
                            <a href="/kategori" style="padding:0 12px;font-size:11px;font-weight:500;color:#94a3b8;text-transform:uppercase;letter-spacing:0.07em;white-space:nowrap;text-decoration:none;border-bottom:2px solid transparent;padding-bottom:2px;" onmouseover="this.style.color='#38BDF8'" onmouseout="this.style.color='#94a3b8'">Kegiatan</a>
                            <a href="/kategori" style="padding:0 12px;font-size:11px;font-weight:500;color:#94a3b8;text-transform:uppercase;letter-spacing:0.07em;white-space:nowrap;text-decoration:none;border-bottom:2px solid transparent;padding-bottom:2px;" onmouseover="this.style.color='#38BDF8'" onmouseout="this.style.color='#94a3b8'">Opini</a>
                            <a href="/kategori" style="padding:0 12px;font-size:11px;font-weight:500;color:#94a3b8;text-transform:uppercase;letter-spacing:0.07em;white-space:nowrap;text-decoration:none;border-bottom:2px solid transparent;padding-bottom:2px;" onmouseover="this.style.color='#38BDF8'" onmouseout="this.style.color='#94a3b8'">Pengumuman</a>
                            <a href="/kategori" style="padding:0 12px;font-size:11px;font-weight:500;color:#94a3b8;text-transform:uppercase;letter-spacing:0.07em;white-space:nowrap;text-decoration:none;border-bottom:2px solid transparent;padding-bottom:2px;" onmouseover="this.style.color='#38BDF8'" onmouseout="this.style.color='#94a3b8'">Beasiswa</a>
                            <a href="/kategori" style="padding:0 12px;font-size:11px;font-weight:500;color:#94a3b8;text-transform:uppercase;letter-spacing:0.07em;white-space:nowrap;text-decoration:none;border-bottom:2px solid transparent;padding-bottom:2px;" onmouseover="this.style.color='#38BDF8'" onmouseout="this.style.color='#94a3b8'">Alumni</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Mobile: simple top bar + hamburger --}}
        <div class="md:hidden flex items-center justify-between px-4" style="height:56px;border-bottom:1px solid rgba(255,255,255,0.08);">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="EEPIS" style="width:32px;height:32px;object-fit:contain;">
                <span style="font-size:15px;font-weight:700;color:#fff;">EEPIS<span style="font-weight:300;color:#38BDF8;"> News</span></span>
            </a>
            <div class="flex items-center gap-1">
                <a href="/search" style="display:flex;align-items:center;justify-content:center;width:36px;height:36px;color:#94a3b8;border-radius:8px;text-decoration:none;">
                    <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                </a>
                <button @click="mobileOpen = !mobileOpen" style="display:flex;align-items:center;justify-content:center;width:36px;height:36px;color:#94a3b8;background:none;border:none;cursor:pointer;border-radius:8px;">
                    <svg x-show="!mobileOpen" style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                    <svg x-show="mobileOpen" x-cloak style="width:20px;height:20px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        {{-- Mobile dropdown --}}
        <div x-show="mobileOpen" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1"
             class="md:hidden" style="background:#0F172A;border-top:1px solid rgba(255,255,255,0.08);">
            <div style="padding:12px 16px;display:flex;flex-direction:column;gap:12px;">
                <form action="/search" method="GET">
                    <div style="position:relative;">
                        <svg style="position:absolute;left:12px;top:50%;transform:translateY(-50%);width:16px;height:16px;color:#64748b;pointer-events:none;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                        <input type="text" name="q" placeholder="Cari berita..." style="width:100%;height:40px;padding-left:38px;padding-right:12px;background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.12);border-radius:8px;font-size:14px;color:#fff;outline:none;box-sizing:border-box;">
                    </div>
                </form>
                <div style="display:flex;flex-direction:column;border-top:1px solid rgba(255,255,255,0.06);">
                    <a href="/" style="padding:10px 8px;font-size:14px;font-weight:600;color:#fff;text-decoration:none;border-bottom:1px solid rgba(255,255,255,0.06);">Beranda</a>
                    <a href="/kategori" style="padding:10px 8px;font-size:14px;color:#94a3b8;text-decoration:none;border-bottom:1px solid rgba(255,255,255,0.06);">Akademik</a>
                    <a href="/kategori" style="padding:10px 8px;font-size:14px;color:#94a3b8;text-decoration:none;border-bottom:1px solid rgba(255,255,255,0.06);">Riset</a>
                    <a href="/kategori" style="padding:10px 8px;font-size:14px;color:#94a3b8;text-decoration:none;border-bottom:1px solid rgba(255,255,255,0.06);">Prestasi</a>
                    <a href="/kategori" style="padding:10px 8px;font-size:14px;color:#94a3b8;text-decoration:none;border-bottom:1px solid rgba(255,255,255,0.06);">Kegiatan</a>
                    <a href="/kategori" style="padding:10px 8px;font-size:14px;color:#94a3b8;text-decoration:none;border-bottom:1px solid rgba(255,255,255,0.06);">Opini</a>
                    <a href="/kategori" style="padding:10px 8px;font-size:14px;color:#94a3b8;text-decoration:none;border-bottom:1px solid rgba(255,255,255,0.06);">Pengumuman</a>
                    <a href="/kategori" style="padding:10px 8px;font-size:14px;color:#94a3b8;text-decoration:none;">Alumni</a>
                </div>
                <a href="#" style="display:flex;align-items:center;justify-content:center;height:42px;background:#0EA5E9;border-radius:8px;font-size:13px;font-weight:700;color:#fff;text-decoration:none;text-transform:uppercase;letter-spacing:0.05em;">
                    Permohonan Liputan
                </a>
            </div>
        </div>

    </nav>

    {{-- MAIN CONTENT — desktop offset 88px (navbar height), mobile 56px --}}
    <main class="md:pt-0">
        <div class="hidden md:block" style="height:88px;"></div>
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
                        <li><a href="/kategori" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Akademik</a></li>
                        <li><a href="/kategori" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Riset & Inovasi</a></li>
                        <li><a href="/kategori" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Prestasi Mahasiswa</a></li>
                        <li><a href="/kategori" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Kegiatan Kampus</a></li>
                        <li><a href="/kategori" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Opini & Artikel</a></li>
                        <li><a href="/kategori" class="text-sm text-gray-400 hover:text-pens-light transition-colors">Pengumuman</a></li>
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
