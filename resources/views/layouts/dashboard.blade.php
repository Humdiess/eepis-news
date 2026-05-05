<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Dashboard' }} — EEPIS News Admin</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="font-sans antialiased bg-pens-gray text-gray-700">

<div x-data="{ sidebarOpen: false }" class="min-h-screen">

    {{-- Sidebar --}}
    <x-dashboard.sidebar :role="$role ?? 'admin'" />

    {{-- Main Content --}}
    <div class="lg:ml-72 flex flex-col min-h-screen">

        {{-- Topbar --}}
        <x-dashboard.topbar
            :title="$pageTitle ?? 'Dashboard'"
            :userName="$userName ?? 'Ahmad Fauzi'"
            :userRole="($role ?? 'admin') === 'admin' ? 'Admin' : 'Penulis'"
        />

        {{-- Content --}}
        <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto">
            {{ $slot }}
        </main>

        {{-- Footer --}}
        <footer class="px-6 py-4 border-t border-gray-100 text-center">
            <p class="text-xs text-gray-400">
                &copy; {{ date('Y') }} EEPIS News — Politeknik Elektronika Negeri Surabaya
            </p>
        </footer>

    </div>
</div>

@stack('scripts')
</body>
</html>
