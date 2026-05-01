@props([
    'title' => 'Dashboard',
    'userName' => 'Ahmad Fauzi',
    'userRole' => 'Admin',
    'userAvatar' => null,
])

<header class="sticky top-0 z-30 bg-white/80 backdrop-blur-lg border-b border-gray-100">
    <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
        {{-- Left: hamburger + title --}}
        <div class="flex items-center gap-4">
            <button
                @click="sidebarOpen = !sidebarOpen"
                class="lg:hidden text-gray-500 hover:text-pens-navy transition-colors p-2 -ml-2 rounded-lg hover:bg-gray-100"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <div>
                <h1 class="text-lg font-bold text-pens-navy">{{ $title }}</h1>
                <p class="text-xs text-gray-400 hidden sm:block">{{ now()->translatedFormat('l, d F Y') }}</p>
            </div>
        </div>

        {{-- Right: search + notifications + profile --}}
        <div class="flex items-center gap-3">
            {{-- Search (decorative) --}}
            <div class="hidden md:flex items-center gap-2 bg-gray-50 rounded-xl px-4 py-2 border border-gray-100 w-64">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" placeholder="Cari..." class="bg-transparent border-none text-sm text-gray-600 placeholder-gray-400 focus:ring-0 focus:outline-none w-full p-0">
            </div>

            {{-- Notifications --}}
            <button class="relative p-2 text-gray-400 hover:text-pens-navy hover:bg-gray-100 rounded-xl transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
            </button>

            {{-- Profile dropdown --}}
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="flex items-center gap-3 pl-3 pr-2 py-1.5 rounded-xl hover:bg-gray-50 transition-colors">
                    <div class="hidden sm:block text-right">
                        <p class="text-sm font-semibold text-pens-navy">{{ $userName }}</p>
                        <p class="text-xs text-gray-400">{{ $userRole }}</p>
                    </div>
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-pens-cyan to-pens-blue flex items-center justify-center text-white font-bold text-sm shadow-md">
                        {{ strtoupper(substr($userName, 0, 1)) }}
                    </div>
                    <svg class="w-4 h-4 text-gray-400 transition-transform" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                {{-- Dropdown --}}
                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-50"
                >
                    <div class="px-4 py-3 border-b border-gray-100">
                        <p class="text-sm font-semibold text-pens-navy">{{ $userName }}</p>
                        <p class="text-xs text-gray-400">{{ $userRole === 'Admin' ? 'Administrator' : 'Penulis' }}</p>
                    </div>
                    <a href="/dashboard/profile" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-600 hover:bg-gray-50 hover:text-pens-navy transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Profil Saya
                    </a>
                    <a href="/" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-600 hover:bg-gray-50 hover:text-pens-navy transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Lihat Website
                    </a>
                    <div class="border-t border-gray-100 mt-1 pt-1">
                        <a href="/logout" class="flex items-center gap-2 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Keluar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
