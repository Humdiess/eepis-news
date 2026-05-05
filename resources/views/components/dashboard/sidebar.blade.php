@props([
    'role' => 'admin',
])

@php
    $navigation = [
        [
            'label' => 'Dashboard',
            'route' => 'dashboard.index',
            'icon' => 'home',
            'roles' => ['admin', 'penulis'],
        ],
        [
            'label' => 'Kelola Berita',
            'route' => 'dashboard.posts.index',
            'icon' => 'document',
            'roles' => ['admin', 'penulis'],
        ],
        [
            'label' => 'Kategori',
            'route' => 'dashboard.categories.index',
            'icon' => 'tag',
            'roles' => ['admin'],
        ],
        [
            'label' => 'Pengguna',
            'route' => 'dashboard.users.index',
            'icon' => 'users',
            'roles' => ['admin'],
        ],
    ];
@endphp

{{-- Mobile Overlay --}}
<div
    x-show="sidebarOpen"
    x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-40 lg:hidden"
    @click="sidebarOpen = false"
></div>

{{-- Sidebar --}}
<aside
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 w-72 bg-white border-r border-gray-200 transform transition-transform duration-300 ease-in-out lg:translate-x-0 flex flex-col shadow-sm"
>
    {{-- Logo / Brand --}}
    <div class="flex items-center gap-3 px-6 h-20 border-b border-gray-100 flex-shrink-0">
        <div class="w-10 h-10 rounded-xl bg-pens-blue flex items-center justify-center shadow-sm">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
            </svg>
        </div>
        <div>
            <h1 class="text-gray-900 font-bold text-lg leading-tight">EEPIS News</h1>
            <p class="text-gray-500 text-xs font-medium">Portal Berita</p>
        </div>
        {{-- Mobile close --}}
        <button @click="sidebarOpen = false" class="lg:hidden ml-auto text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
        <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest px-3 mb-3">Menu Utama</p>

        @foreach($navigation as $item)
            @if(in_array($role, $item['roles']))
                @php
                    $isActive = request()->routeIs($item['route'] . '*') || (isset($active) && $active === $item['route']);
                    // Fallback for static: check URL path
                    $pathMap = [
                        'dashboard.index' => '/dashboard',
                        'dashboard.posts.index' => '/dashboard/posts',
                        'dashboard.categories.index' => '/dashboard/categories',
                        'dashboard.users.index' => '/dashboard/users',
                    ];
                    $currentPath = request()->path();
                    if (!$isActive && isset($pathMap[$item['route']])) {
                        $href = $pathMap[$item['route']];
                        $isActive = ('/' . $currentPath) === $href || (('/' . $currentPath) !== '/dashboard' && str_starts_with('/' . $currentPath, $href) && $href !== '/dashboard');
                        if ($href === '/dashboard' && '/' . $currentPath === '/dashboard') {
                            $isActive = true;
                        }
                    }
                @endphp

                <a
                    href="{{ $pathMap[$item['route']] ?? '#' }}"
                    class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors
                        {{ $isActive
                            ? 'bg-pens-blue/10 text-pens-blue'
                            : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'
                        }}"
                >
                    {{-- Icons --}}
                    @if($item['icon'] === 'home')
                        <svg class="w-5 h-5 {{ $isActive ? 'text-pens-blue' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    @elseif($item['icon'] === 'document')
                        <svg class="w-5 h-5 {{ $isActive ? 'text-pens-blue' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    @elseif($item['icon'] === 'tag')
                        <svg class="w-5 h-5 {{ $isActive ? 'text-pens-blue' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    @elseif($item['icon'] === 'users')
                        <svg class="w-5 h-5 {{ $isActive ? 'text-pens-blue' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    @endif

                    <span>{{ $item['label'] }}</span>
                </a>
            @endif
        @endforeach
    </nav>

    {{-- Bottom section --}}
    <div class="px-4 py-4 border-t border-gray-100 flex-shrink-0">
        <a href="/" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-colors">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>
            <span>Lihat Website</span>
        </a>
        <a href="/logout" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-red-600 hover:text-red-700 hover:bg-red-50 transition-colors mt-1">
            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            <span>Keluar</span>
        </a>
    </div>
</aside>
