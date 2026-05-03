<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Login' }} — EEPIS News</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-pens-gray text-gray-700">

<div class="min-h-screen flex">

    {{-- Left: Branding Panel --}}
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-pens-navy via-pens-blue to-pens-cyan relative overflow-hidden flex-col justify-between p-12">

        {{-- Decorative Pattern --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-72 h-72 bg-white/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-pens-cyan/30 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-pens-light/20 rounded-full blur-2xl"></div>
        </div>

        {{-- Logo & Brand --}}
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-white font-bold text-2xl leading-tight">EEPIS News</h1>
                    <p class="text-white/60 text-sm font-medium">Portal Berita Kampus</p>
                </div>
            </div>
        </div>

        {{-- Center Text --}}
        <div class="relative z-10 max-w-md">
            <h2 class="text-white text-4xl font-bold leading-tight mb-4">
                Kelola Berita Kampus dengan Mudah
            </h2>
            <p class="text-white/70 text-lg leading-relaxed">
                Platform manajemen berita resmi Politeknik Elektronika Negeri Surabaya. Tulis, edit, dan publikasikan berita kampus secara efisien.
            </p>
        </div>

        {{-- Bottom Info --}}
        <div class="relative z-10">
            <p class="text-white/40 text-sm">
                &copy; {{ date('Y') }} Politeknik Elektronika Negeri Surabaya
            </p>
        </div>
    </div>

    {{-- Right: Form Panel --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12">
        <div class="w-full max-w-md">

            {{-- Mobile Logo --}}
            <div class="lg:hidden flex items-center gap-3 mb-8 justify-center">
                <div class="w-10 h-10 rounded-xl bg-pens-blue flex items-center justify-center shadow-sm">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-pens-navy font-bold text-xl leading-tight">EEPIS News</h1>
                    <p class="text-gray-400 text-xs font-medium">Portal Berita Kampus</p>
                </div>
            </div>

            {{-- Auth Form Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                {{ $slot }}
            </div>

            {{-- Footer Link --}}
            <div class="text-center mt-6">
                <a href="/" class="text-sm text-gray-400 hover:text-pens-cyan transition-colors inline-flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>

</div>

</body>
</html>
