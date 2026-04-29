@extends('layouts.news')
@section('title', 'Kategori: Akademik - EEPIS News')

@section('content')

{{-- ========== CATEGORY HERO ========== --}}
<section class="relative overflow-hidden bg-pens-navy">
    {{-- Decorative Elements --}}
    <div class="absolute inset-0">
        <div class="absolute top-20 -left-20 w-72 h-72 bg-pens-cyan/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-pens-blue/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] border border-white/5 rounded-full"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] border border-white/5 rounded-full"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28 text-center">
        <div class="flex items-center justify-center gap-2 text-sm text-gray-400 mb-6">
            <a href="/" class="hover:text-pens-light transition-colors">Beranda</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
            <span class="text-pens-light">Kategori</span>
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white mb-4">Akademik</h1>
        <p class="text-gray-400 text-lg max-w-xl mx-auto leading-relaxed">
            Berita seputar kurikulum, program studi, akreditasi, dan perkembangan akademik terbaru di PENS.
        </p>
        <div class="mt-8 flex items-center justify-center gap-6 text-sm text-gray-400">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-pens-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/></svg>
                <span>42 Artikel</span>
            </div>
            <div class="w-1 h-1 bg-gray-600 rounded-full"></div>
            <span>Terakhir diperbarui: 28 April 2026</span>
        </div>
    </div>
</section>

{{-- ========== FILTER BAR ========== --}}
<div class="bg-white border-b border-gray-100 sticky top-16 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-4 overflow-x-auto gap-4">
            {{-- Category Chips --}}
            <div class="flex items-center gap-2 flex-shrink-0">
                <a href="#" class="px-4 py-2 bg-pens-navy text-white text-xs font-semibold rounded-full transition-all">Semua</a>
                <a href="#" class="px-4 py-2 bg-gray-50 text-gray-600 text-xs font-medium rounded-full hover:bg-pens-navy hover:text-white transition-all border border-gray-100">Kurikulum</a>
                <a href="#" class="px-4 py-2 bg-gray-50 text-gray-600 text-xs font-medium rounded-full hover:bg-pens-navy hover:text-white transition-all border border-gray-100">Akreditasi</a>
                <a href="#" class="px-4 py-2 bg-gray-50 text-gray-600 text-xs font-medium rounded-full hover:bg-pens-navy hover:text-white transition-all border border-gray-100">Program Studi</a>
                <a href="#" class="px-4 py-2 bg-gray-50 text-gray-600 text-xs font-medium rounded-full hover:bg-pens-navy hover:text-white transition-all border border-gray-100">Beasiswa</a>
            </div>

            {{-- Sort --}}
            <div class="flex items-center gap-2 flex-shrink-0">
                <span class="text-xs text-gray-400 hidden sm:inline">Urutkan:</span>
                <select class="text-xs bg-gray-50 border border-gray-100 rounded-lg px-3 py-2 text-gray-600 focus:ring-2 focus:ring-pens-cyan focus:border-transparent outline-none">
                    <option>Terbaru</option>
                    <option>Terpopuler</option>
                    <option>Terlama</option>
                </select>
            </div>
        </div>
    </div>
</div>

{{-- ========== FEATURED ARTICLE ========== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <a href="/berita/detail" class="group grid grid-cols-1 lg:grid-cols-2 gap-8 bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 news-card-hover">
        <div class="relative overflow-hidden aspect-[16/10] lg:aspect-auto lg:min-h-[380px]">
            <img src="https://images.unsplash.com/photo-1562774053-701939374585?w=900&q=80" alt="Kampus PENS" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            <div class="absolute top-4 left-4">
                <span class="category-badge bg-pens-cyan text-white shadow-lg">Featured</span>
            </div>
        </div>
        <div class="flex flex-col justify-center p-6 lg:p-10 lg:pr-12">
            <div class="flex items-center gap-3 text-xs text-gray-400 mb-4">
                <span class="text-pens-cyan font-semibold uppercase tracking-wider">Akademik</span>
                <span>&bull;</span>
                <span>28 April 2026</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-pens-navy leading-tight mb-4 group-hover:text-pens-cyan transition-colors">
                PENS Raih Peringkat 1 Politeknik Terbaik Indonesia Versi Webometrics 2026
            </h2>
            <p class="text-gray-500 leading-relaxed mb-6 line-clamp-3">
                Politeknik Elektronika Negeri Surabaya kembali mengukir prestasi gemilang dengan meraih posisi teratas dalam pemeringkatan Webometrics untuk kategori politeknik se-Indonesia. Pencapaian ini merupakan bukti nyata komitmen PENS.
            </p>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-pens-cyan to-pens-blue flex items-center justify-center text-white text-xs font-bold">R</div>
                <span class="text-sm text-gray-500">Redaksi EEPIS</span>
                <span class="text-gray-300">&bull;</span>
                <span class="text-sm text-gray-400">5 min read</span>
            </div>
        </div>
    </a>
</section>

{{-- ========== NEWS GRID ========== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    @php
    $articles = [
        ['img' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=600&q=70', 'title' => 'Kurikulum Baru 2026: PENS Integrasikan AI dan Machine Learning di Seluruh Prodi', 'desc' => 'Langkah inovatif PENS dalam menjawab tantangan revolusi industri 5.0 dengan pembaruan kurikulum berbasis AI.', 'date' => '27 Apr 2026', 'author' => 'Ahmad Fauzi', 'read' => '4 min'],
        ['img' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=600&q=70', 'title' => 'Pendaftaran Mahasiswa Baru Jalur Mandiri 2026/2027 Resmi Dibuka', 'desc' => 'PENS membuka jalur penerimaan mandiri dengan kuota 500 mahasiswa baru di berbagai program studi.', 'date' => '25 Apr 2026', 'author' => 'Humas PENS', 'read' => '3 min'],
        ['img' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=600&q=70', 'title' => 'Wisuda Periode April 2026: 1.200 Lulusan Siap Berkontribusi untuk Bangsa', 'desc' => 'Prosesi wisuda berlangsung khidmat di Gedung Serbaguna dengan dihadiri Menteri Pendidikan.', 'date' => '22 Apr 2026', 'author' => 'Redaksi', 'read' => '3 min'],
        ['img' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=600&q=70', 'title' => 'Program Double Degree PENS-Kumamoto University Angkatan Ketiga Resmi Diluncurkan', 'desc' => 'Kerjasama akademik lintas negara yang membuka peluang luas bagi mahasiswa.', 'date' => '20 Apr 2026', 'author' => 'Bagian Kerjasama', 'read' => '5 min'],
        ['img' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=70', 'title' => 'Akreditasi Unggul: 8 Program Studi PENS Raih Peringkat Tertinggi BAN-PT', 'desc' => 'Akreditasi unggul ini menunjukkan komitmen PENS terhadap kualitas pendidikan vokasi.', 'date' => '18 Apr 2026', 'author' => 'Tim Akreditasi', 'read' => '4 min'],
        ['img' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&q=70', 'title' => 'Seminar Nasional Pendidikan Vokasi: Menyiapkan SDM Unggul di Era Digital', 'desc' => 'PENS menjadi tuan rumah seminar besar dengan menghadirkan praktisi dan akademisi ternama.', 'date' => '15 Apr 2026', 'author' => 'Panitia Semnas', 'read' => '6 min'],
    ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($articles as $news)
        <a href="/berita/detail" class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 news-card-hover block">
            <div class="relative overflow-hidden aspect-[16/10]">
                <img src="{{ $news['img'] }}" alt="{{ $news['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>
            <div class="p-6">
                <div class="flex items-center gap-2 text-xs text-gray-400 mb-3">
                    <span class="text-pens-cyan font-semibold">Akademik</span>
                    <span>&bull;</span>
                    <span>{{ $news['date'] }}</span>
                </div>
                <h3 class="font-bold text-pens-navy leading-snug mb-2 group-hover:text-pens-cyan transition-colors line-clamp-2">{{ $news['title'] }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed line-clamp-2 mb-4">{{ $news['desc'] }}</p>
                <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded-full bg-gray-200"></div>
                        <span class="text-xs text-gray-400">{{ $news['author'] }}</span>
                    </div>
                    <span class="text-xs text-gray-300">{{ $news['read'] }}</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-14 flex items-center justify-center gap-2">
        <button class="w-10 h-10 rounded-xl bg-gray-50 border border-gray-100 text-gray-400 flex items-center justify-center hover:bg-pens-navy hover:text-white hover:border-pens-navy transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
        </button>
        <button class="w-10 h-10 rounded-xl bg-pens-navy text-white text-sm font-bold flex items-center justify-center shadow-lg shadow-pens-navy/20">1</button>
        <button class="w-10 h-10 rounded-xl bg-gray-50 border border-gray-100 text-gray-500 text-sm font-medium flex items-center justify-center hover:bg-pens-navy hover:text-white hover:border-pens-navy transition-all">2</button>
        <button class="w-10 h-10 rounded-xl bg-gray-50 border border-gray-100 text-gray-500 text-sm font-medium flex items-center justify-center hover:bg-pens-navy hover:text-white hover:border-pens-navy transition-all">3</button>
        <span class="text-gray-300 px-1">...</span>
        <button class="w-10 h-10 rounded-xl bg-gray-50 border border-gray-100 text-gray-500 text-sm font-medium flex items-center justify-center hover:bg-pens-navy hover:text-white hover:border-pens-navy transition-all">8</button>
        <button class="w-10 h-10 rounded-xl bg-gray-50 border border-gray-100 text-gray-400 flex items-center justify-center hover:bg-pens-navy hover:text-white hover:border-pens-navy transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        </button>
    </div>
</section>

{{-- ========== ALL CATEGORIES ========== --}}
<section class="bg-white py-16 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-10">
            <div class="w-1.5 h-8 bg-gradient-to-b from-pens-cyan to-pens-blue rounded-full"></div>
            <h2 class="text-2xl font-bold text-pens-navy">Jelajahi Kategori Lain</h2>
        </div>

        @php
        $categories = [
            ['name' => 'Riset & Inovasi', 'count' => 38, 'icon' => 'M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5', 'color' => 'from-emerald-500 to-teal-600'],
            ['name' => 'Prestasi', 'count' => 25, 'icon' => 'M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M18.75 4.236c.982.143 1.954.317 2.916.52A6.003 6.003 0 0016.27 9.728M18.75 4.236V4.5c0 2.108-.966 3.99-2.48 5.228m0 0a6.003 6.003 0 01-5.54 0', 'color' => 'from-amber-500 to-orange-600'],
            ['name' => 'Kegiatan', 'count' => 56, 'icon' => 'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5', 'color' => 'from-violet-500 to-purple-600'],
            ['name' => 'Opini & Artikel', 'count' => 19, 'icon' => 'M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z', 'color' => 'from-rose-500 to-pink-600'],
        ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($categories as $cat)
            <a href="#" class="group relative bg-pens-gray rounded-2xl p-6 border border-gray-100 hover:border-transparent hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br {{ $cat['color'] }} opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-white/10 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-4 transition-colors border border-gray-200 group-hover:border-white/20">
                        <svg class="w-6 h-6 text-gray-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $cat['icon'] }}"/></svg>
                    </div>
                    <h3 class="font-bold text-pens-navy group-hover:text-white transition-colors mb-1">{{ $cat['name'] }}</h3>
                    <p class="text-sm text-gray-400 group-hover:text-white/70 transition-colors">{{ $cat['count'] }} artikel</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
