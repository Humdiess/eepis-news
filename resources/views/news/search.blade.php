@extends('layouts.news')
@section('title', 'Hasil Pencarian - EEPIS News')

@section('content')

{{-- ========== SEARCH HERO ========== --}}
<section class="bg-pens-navy relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-10 left-1/4 w-72 h-72 bg-pens-cyan/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-pens-blue/10 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 text-center">
        {{-- Breadcrumb --}}
        <div class="flex items-center justify-center gap-2 text-sm text-gray-400 mb-8">
            <a href="/" class="hover:text-pens-light transition-colors">Beranda</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
            <span class="text-pens-light">Pencarian</span>
        </div>

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-8">
            @if(request('q'))
                Hasil untuk "<span class="text-pens-light">{{ request('q') }}</span>"
            @else
                Cari Berita
            @endif
        </h1>

        {{-- Search Box --}}
        <form action="/search" method="GET" class="max-w-2xl mx-auto relative">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Ketik judul berita, topik, atau kata kunci..." class="w-full pl-14 pr-32 py-5 bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl text-white placeholder-gray-400 text-base focus:outline-none focus:ring-2 focus:ring-pens-cyan focus:bg-white/15 transition-all" autofocus>
            <svg class="w-6 h-6 absolute left-5 top-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
            <button type="submit" class="absolute right-3 top-3 px-6 py-2.5 bg-gradient-to-r from-pens-cyan to-pens-light text-white text-sm font-bold rounded-xl hover:shadow-lg hover:shadow-pens-cyan/30 transition-all duration-300">Cari</button>
        </form>

        {{-- Quick Tags --}}
        <div class="mt-8 flex flex-wrap items-center justify-center gap-2">
            <span class="text-xs text-gray-500 mr-1">Populer:</span>
            @foreach(['Webometrics', 'Pendaftaran', 'Robotika', 'Wisuda', 'Beasiswa', 'IoT'] as $tag)
            <a href="/search?q={{ $tag }}" class="px-3 py-1.5 bg-white/5 border border-white/10 rounded-full text-xs text-gray-400 hover:bg-pens-cyan hover:text-white hover:border-pens-cyan transition-all duration-300">{{ $tag }}</a>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== RESULTS ========== --}}
@if(request('q'))
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">

    {{-- Results Info --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-10 pb-6 border-b border-gray-100">
        <p class="text-sm text-gray-500">Ditemukan <strong class="text-pens-navy">12</strong> berita untuk "<strong class="text-pens-navy">{{ request('q') }}</strong>"</p>
        <div class="flex items-center gap-2">
            <span class="text-xs text-gray-400">Urutkan:</span>
            <select class="text-xs font-bold text-pens-navy bg-transparent border-none focus:ring-0 cursor-pointer">
                <option>Relevansi</option>
                <option>Terbaru</option>
                <option>Terpopuler</option>
            </select>
        </div>
    </div>

    {{-- Result Items --}}
    @php
    $results = [
        ['img' => 'https://images.unsplash.com/photo-1562774053-701939374585?w=600&q=70', 'cat' => 'Akademik', 'color' => 'text-pens-cyan', 'title' => 'PENS Raih Peringkat 1 Politeknik Terbaik Indonesia Versi Webometrics 2026', 'desc' => 'Politeknik Elektronika Negeri Surabaya kembali mengukir prestasi gemilang dengan meraih posisi teratas dalam pemeringkatan Webometrics untuk kategori politeknik se-Indonesia.', 'author' => 'Redaksi EEPIS', 'date' => '28 Apr 2026', 'read' => '5 min'],
        ['img' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?w=600&q=70', 'cat' => 'Riset', 'color' => 'text-emerald-500', 'title' => 'Mahasiswa PENS Kembangkan Robot Pendeteksi Bencana Berbasis AI', 'desc' => 'Inovasi terbaru dari laboratorium robotika PENS yang dirancang untuk membantu tim SAR dalam penanganan bencana alam menggunakan kecerdasan buatan.', 'author' => 'Ahmad Fauzi', 'date' => '27 Apr 2026', 'read' => '4 min'],
        ['img' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=600&q=70', 'cat' => 'Riset', 'color' => 'text-emerald-500', 'title' => 'Dosen PENS Raih Hibah Penelitian Internasional untuk Proyek Smart City', 'desc' => 'Kolaborasi riset tingkat ASEAN untuk solusi perkotaan masa depan yang berkelanjutan dan berbasis teknologi Internet of Things.', 'author' => 'Humas PENS', 'date' => '26 Apr 2026', 'read' => '3 min'],
        ['img' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=600&q=70', 'cat' => 'Akademik', 'color' => 'text-pens-cyan', 'title' => 'Pendaftaran Mahasiswa Baru Jalur Mandiri 2026/2027 Resmi Dibuka', 'desc' => 'Kesempatan bergabung dengan kampus pejuang untuk calon mahasiswa baru dari seluruh Indonesia dengan kuota 500 mahasiswa.', 'author' => 'Bagian Akademik', 'date' => '25 Apr 2026', 'read' => '3 min'],
        ['img' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=600&q=70', 'cat' => 'Kegiatan', 'color' => 'text-amber-500', 'title' => 'Wisuda Periode April 2026: 1.200 Lulusan Siap Berkontribusi untuk Bangsa', 'desc' => 'Prosesi wisuda berlangsung khidmat di Gedung Serbaguna dengan dihadiri Menteri Pendidikan dan berbagai pejabat daerah.', 'author' => 'Redaksi', 'date' => '22 Apr 2026', 'read' => '4 min'],
        ['img' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=600&q=70', 'cat' => 'Prestasi', 'color' => 'text-rose-500', 'title' => 'Delegasi PENS Sabet 3 Medali Emas di Ajang ASEAN Engineering Olympics', 'desc' => 'Tiga tim mahasiswa PENS meraih medali emas pada kompetisi teknik bergengsi tingkat Asia Tenggara yang diselenggarakan di Singapura.', 'author' => 'Tim Prestasi', 'date' => '20 Apr 2026', 'read' => '5 min'],
    ];
    @endphp

    <div class="space-y-0 divide-y divide-gray-100">
        @foreach($results as $item)
        <a href="/berita/detail" class="group flex flex-col sm:flex-row gap-6 py-8 first:pt-0">
            {{-- Thumbnail --}}
            <div class="w-full sm:w-72 h-48 sm:h-44 flex-shrink-0 rounded-2xl overflow-hidden">
                <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            {{-- Content --}}
            <div class="flex-1 flex flex-col justify-center">
                <div class="flex items-center gap-3 text-xs mb-3">
                    <span class="{{ $item['color'] }} font-bold uppercase tracking-wider">{{ $item['cat'] }}</span>
                    <span class="text-gray-300">&bull;</span>
                    <span class="text-gray-400">{{ $item['date'] }}</span>
                </div>
                <h3 class="text-xl font-bold text-pens-navy group-hover:text-pens-cyan transition-colors leading-snug mb-2 line-clamp-2">{{ $item['title'] }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed line-clamp-2 mb-4">{{ $item['desc'] }}</p>
                <div class="flex items-center gap-3 text-xs text-gray-400">
                    <div class="flex items-center gap-2">
                        <div class="w-5 h-5 rounded-full bg-gradient-to-br from-pens-cyan to-pens-blue"></div>
                        <span>{{ $item['author'] }}</span>
                    </div>
                    <span class="text-gray-200">&bull;</span>
                    <span>{{ $item['read'] }} read</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    {{-- Load More --}}
    <div class="mt-12 text-center">
        <button class="px-10 py-4 border-2 border-gray-200 text-pens-navy font-bold rounded-2xl hover:bg-pens-navy hover:text-white hover:border-pens-navy transition-all duration-300">
            Muat Lebih Banyak
        </button>
    </div>
</section>
@endif

@endsection
