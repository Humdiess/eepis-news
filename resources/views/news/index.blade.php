@extends('layouts.news')
@section('title', 'EEPIS News - Portal Berita Kampus PENS')

@section('content')

{{-- ========== HERO SECTION ========== --}}
<section class="relative h-[85vh] min-h-[600px] overflow-hidden">
    <img src="https://images.unsplash.com/photo-1562774053-701939374585?w=1600&q=80" alt="Kampus PENS" class="absolute inset-0 w-full h-full object-cover">
    <div class="gradient-overlay absolute inset-0"></div>
    <div class="absolute inset-0 bg-pens-blue/20"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-end pb-16">
        <div class="max-w-3xl">
            <a href="/kategori" class="category-badge bg-pens-cyan text-white mb-4 hover:bg-pens-blue transition-colors inline-block">Headline</a>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-4">
                PENS Raih Peringkat 1 Politeknik Terbaik Indonesia Versi Webometrics 2026
            </h1>
            <p class="text-gray-300 text-base sm:text-lg leading-relaxed mb-6 line-clamp-3">
                Politeknik Elektronika Negeri Surabaya kembali mengukir prestasi gemilang dengan meraih posisi teratas dalam pemeringkatan Webometrics untuk kategori politeknik se-Indonesia.
            </p>
            <div class="flex items-center gap-4 text-sm text-gray-400">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-pens-cyan to-pens-light flex items-center justify-center text-white text-xs font-bold">R</div>
                    <span>Redaksi EEPIS</span>
                </div>
                <span>&bull;</span>
                <span>28 April 2026</span>
                <span>&bull;</span>
                <span>5 min read</span>
            </div>
        </div>
    </div>

    {{-- Side mini cards --}}
    <div class="hidden lg:flex absolute right-8 bottom-16 z-10 flex-col gap-3 w-80">
        <div class="group relative rounded-xl overflow-hidden h-28 block">
            <a href="/berita/detail" class="absolute inset-0 z-10"><span class="sr-only">Baca selengkapnya</span></a>
            <img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?w=600&q=70" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="gradient-overlay-sm absolute inset-0"></div>
            <div class="relative h-full flex flex-col justify-end p-4">
                <a href="/kategori" class="text-xs text-pens-light font-semibold hover:text-white transition-colors relative z-20">Riset</a>
                <h3 class="text-sm font-semibold text-white line-clamp-2 relative z-0">Mahasiswa PENS Kembangkan Robot Pendeteksi Bencana Berbasis AI</h3>
            </div>
        </div>
        <div class="group relative rounded-xl overflow-hidden h-28 block">
            <a href="/berita/detail" class="absolute inset-0 z-10"><span class="sr-only">Baca selengkapnya</span></a>
            <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=600&q=70" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="gradient-overlay-sm absolute inset-0"></div>
            <div class="relative h-full flex flex-col justify-end p-4">
                <a href="/kategori" class="text-xs text-pens-light font-semibold hover:text-white transition-colors relative z-20">Prestasi</a>
                <h3 class="text-sm font-semibold text-white line-clamp-2 relative z-0">Tim PENS Juara Kompetisi IoT Nasional 2026</h3>
            </div>
        </div>
    </div>
</section>

{{-- ========== BERITA TERBARU + SIDEBAR ========== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    {{-- Section Header --}}
    <div class="flex items-center justify-between mb-10">
        <div class="flex items-center gap-3">
            <div class="w-1.5 h-8 bg-gradient-to-b from-pens-cyan to-pens-blue rounded-full"></div>
            <h2 class="text-2xl font-bold text-pens-navy">Berita Terbaru</h2>
        </div>
        <a href="#" class="text-sm font-medium text-pens-cyan hover:text-pens-blue transition-colors flex items-center gap-1">
            Lihat Semua
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        {{-- Main News Grid --}}
        <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
            @php
            $latestNews = [
                ['img' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=600&q=70', 'cat' => 'Akademik', 'color' => 'bg-pens-blue', 'title' => 'Kurikulum Baru 2026: PENS Integrasikan AI dan Machine Learning di Seluruh Program Studi', 'desc' => 'Langkah inovatif PENS dalam menjawab tantangan revolusi industri 5.0 dengan pembaruan kurikulum berbasis kecerdasan buatan.', 'date' => '27 Apr 2026', 'author' => 'Ahmad Fauzi'],
                ['img' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=600&q=70', 'cat' => 'Riset', 'color' => 'bg-emerald-600', 'title' => 'Dosen PENS Raih Hibah Penelitian Internasional untuk Proyek Smart City', 'desc' => 'Dr. Budi Setiawan mendapatkan pendanaan dari ASEAN Research Fund untuk mengembangkan solusi smart city.', 'date' => '26 Apr 2026', 'author' => 'Siti Rahma'],
                ['img' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&q=70', 'cat' => 'Kegiatan', 'color' => 'bg-amber-500', 'title' => 'PENS Tech Festival 2026 Hadirkan 50+ Startup dan 200 Inovasi Mahasiswa', 'desc' => 'Festival teknologi tahunan PENS kembali digelar dengan skala lebih besar, mengundang investor dan pelaku industri.', 'date' => '25 Apr 2026', 'author' => 'Dewi Kartika'],
                ['img' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=600&q=70', 'cat' => 'Prestasi', 'color' => 'bg-rose-500', 'title' => 'Delegasi PENS Sabet 3 Medali Emas di Ajang ASEAN Engineering Olympics', 'desc' => 'Tiga tim mahasiswa PENS berhasil meraih medali emas pada kompetisi teknik bergengsi tingkat ASEAN.', 'date' => '24 Apr 2026', 'author' => 'Rizky Pratama'],
            ];
            @endphp

            @foreach($latestNews as $news)
            <article class="group relative bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 news-card-hover">
                <a href="/berita/detail" class="absolute inset-0 z-10"><span class="sr-only">Baca {{ $news['title'] }}</span></a>
                <div class="relative overflow-hidden aspect-[16/10]">
                    <img src="{{ $news['img'] }}" alt="{{ $news['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <span class="category-badge {{ $news['color'] }} text-white absolute top-3 left-3 z-20">{{ $news['cat'] }}</span>
                </div>
                <div class="p-5 relative">
                    <h3 class="font-bold text-pens-navy leading-snug mb-2 group-hover:text-pens-cyan transition-colors line-clamp-2">{{ $news['title'] }}</h3>
                    <p class="text-sm text-gray-500 leading-relaxed mb-4 line-clamp-2">{{ $news['desc'] }}</p>
                    <div class="flex items-center justify-between text-xs text-gray-400">
                        <span>{{ $news['author'] }}</span>
                        <span>{{ $news['date'] }}</span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Sidebar --}}
        <aside class="space-y-8">
            {{-- Trending Topics --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center gap-2 mb-5">
                    <svg class="w-5 h-5 text-pens-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z"/></svg>
                    <h3 class="font-bold text-pens-navy">Trending Topic</h3>
                </div>
                <div class="space-y-4">
                    @php
                    $trending = [
                        ['num' => '01', 'title' => 'Penerimaan Mahasiswa Baru 2026/2027', 'count' => '2.4k views'],
                        ['num' => '02', 'title' => 'Wisuda Periode April 2026', 'count' => '1.8k views'],
                        ['num' => '03', 'title' => 'Kerjasama Industri dengan Samsung', 'count' => '1.5k views'],
                        ['num' => '04', 'title' => 'Beasiswa Unggulan Kemendikbud', 'count' => '1.2k views'],
                        ['num' => '05', 'title' => 'Workshop Cyber Security 2026', 'count' => '980 views'],
                    ];
                    @endphp
                    @foreach($trending as $item)
                    <a href="#" class="flex items-start gap-3 group/item">
                        <span class="text-2xl font-extrabold text-gray-100 group-hover/item:text-pens-light transition-colors leading-none">{{ $item['num'] }}</span>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold text-pens-navy group-hover/item:text-pens-cyan transition-colors line-clamp-2">{{ $item['title'] }}</h4>
                            <span class="text-xs text-gray-400">{{ $item['count'] }}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Kategori --}}
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center gap-2 mb-5">
                    <svg class="w-5 h-5 text-pens-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/><path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"/></svg>
                    <h3 class="font-bold text-pens-navy">Kategori</h3>
                </div>
                <div class="flex flex-wrap gap-2">
                    @php $categories = ['Akademik', 'Riset', 'Prestasi', 'Kegiatan', 'Opini', 'Pengumuman', 'Teknologi', 'Beasiswa', 'Alumni', 'Internasional']; @endphp
                    @foreach($categories as $cat)
                    <a href="/kategori" class="px-3 py-1.5 text-xs font-medium text-gray-600 bg-gray-50 hover:bg-pens-cyan hover:text-white rounded-full border border-gray-200 hover:border-pens-cyan transition-all duration-300">{{ $cat }}</a>
                    @endforeach
                </div>
            </div>

            {{-- Newsletter --}}
            <div class="bg-gradient-to-br from-pens-navy to-pens-blue rounded-2xl p-6 text-white">
                <h3 class="font-bold mb-2">Newsletter</h3>
                <p class="text-sm text-gray-300 mb-4">Dapatkan berita terbaru PENS langsung di inbox Anda.</p>
                <input type="email" placeholder="Email Anda..." class="w-full px-4 py-2.5 bg-white/10 border border-white/20 rounded-xl text-sm text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pens-cyan focus:border-transparent mb-3">
                <button class="w-full px-4 py-2.5 bg-pens-cyan hover:bg-pens-light text-white text-sm font-semibold rounded-xl transition-colors duration-300">Berlangganan</button>
            </div>
        </aside>
    </div>
</section>

{{-- ========== BERITA POPULER ========== --}}
<section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-10">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-8 bg-gradient-to-b from-pens-cyan to-pens-blue rounded-full"></div>
                <h2 class="text-2xl font-bold text-pens-navy">Berita Populer</h2>
            </div>
            <a href="#" class="text-sm font-medium text-pens-cyan hover:text-pens-blue transition-colors flex items-center gap-1">
                Lihat Semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
            </a>
        </div>

        @php
        $popular = [
            ['img' => 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800&q=70', 'cat' => 'Akademik', 'color' => 'bg-pens-blue', 'title' => 'Pendaftaran Mahasiswa Baru Jalur Mandiri Resmi Dibuka', 'desc' => 'PENS membuka jalur penerimaan mandiri untuk tahun akademik 2026/2027 dengan kuota 500 mahasiswa baru.', 'date' => '23 Apr 2026', 'author' => 'Humas PENS'],
            ['img' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=800&q=70', 'cat' => 'Kerjasama', 'color' => 'bg-violet-600', 'title' => 'PENS Jalin MoU dengan 5 Universitas Jepang untuk Program Exchange', 'desc' => 'Penandatanganan kerjasama bilateral yang membuka peluang pertukaran mahasiswa dan dosen.', 'date' => '22 Apr 2026', 'author' => 'Bagian Kerjasama'],
            ['img' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&q=70', 'cat' => 'Teknologi', 'color' => 'bg-emerald-600', 'title' => 'Laboratorium 5G Pertama di Politeknik Indonesia Diresmikan di PENS', 'desc' => 'Laboratorium canggih ini akan menjadi pusat riset dan pengembangan teknologi 5G untuk sivitas akademika.', 'date' => '21 Apr 2026', 'author' => 'Redaksi'],
        ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Featured Popular --}}
            <div class="group md:col-span-1 md:row-span-2 relative rounded-2xl overflow-hidden min-h-[400px] flex">
                <a href="/berita/detail" class="absolute inset-0 z-10"><span class="sr-only">Baca {{ $popular[0]['title'] }}</span></a>
                <img src="{{ $popular[0]['img'] }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="gradient-overlay absolute inset-0"></div>
                <div class="relative h-full flex flex-col justify-end p-6 w-full">
                    <a href="/kategori" class="category-badge {{ $popular[0]['color'] }} text-white mb-3 w-fit hover:brightness-110 transition-all relative z-20">{{ $popular[0]['cat'] }}</a>
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-pens-light transition-colors relative z-0">{{ $popular[0]['title'] }}</h3>
                    <p class="text-sm text-gray-300 line-clamp-2 mb-3 relative z-0">{{ $popular[0]['desc'] }}</p>
                    <div class="flex items-center gap-3 text-xs text-gray-400 relative z-0">
                        <span>{{ $popular[0]['author'] }}</span>
                        <span>&bull;</span>
                        <span>{{ $popular[0]['date'] }}</span>
                    </div>
                </div>
            </div>

            {{-- Other Popular --}}
            @foreach(array_slice($popular, 1) as $news)
            <article class="group relative bg-pens-gray rounded-2xl overflow-hidden border border-gray-100 news-card-hover flex flex-col sm:flex-row md:flex-col">
                <a href="/berita/detail" class="absolute inset-0 z-10"><span class="sr-only">Baca {{ $news['title'] }}</span></a>
                <div class="relative overflow-hidden aspect-[16/10] sm:w-48 sm:aspect-auto md:w-full md:aspect-[16/10] flex-shrink-0">
                    <img src="{{ $news['img'] }}" alt="{{ $news['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <a href="/kategori" class="category-badge {{ $news['color'] }} text-white absolute top-3 left-3 hover:brightness-110 transition-all z-20">{{ $news['cat'] }}</a>
                </div>
                <div class="p-5 flex flex-col justify-center relative">
                    <h3 class="font-bold text-pens-navy leading-snug mb-2 group-hover:text-pens-cyan transition-colors line-clamp-2">{{ $news['title'] }}</h3>
                    <p class="text-sm text-gray-500 leading-relaxed mb-3 line-clamp-2">{{ $news['desc'] }}</p>
                    <div class="flex items-center gap-3 text-xs text-gray-400">
                        <span>{{ $news['author'] }}</span>
                        <span>&bull;</span>
                        <span>{{ $news['date'] }}</span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== EDITOR'S PICK / PILIHAN REDAKSI ========== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex items-center gap-3 mb-10">
        <div class="w-1.5 h-8 bg-gradient-to-b from-pens-cyan to-pens-blue rounded-full"></div>
        <h2 class="text-2xl font-bold text-pens-navy">Pilihan Redaksi</h2>
    </div>

    @php
    $editorPicks = [
        ['img' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=600&q=70', 'cat' => 'Opini', 'title' => 'Masa Depan Pendidikan Vokasi di Era Digital', 'author' => 'Prof. Zainal Arifin', 'date' => '20 Apr 2026'],
        ['img' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&q=70', 'cat' => 'Alumni', 'title' => 'Alumni PENS di Silicon Valley: Kisah Sukses Anak Bangsa', 'author' => 'Redaksi', 'date' => '19 Apr 2026'],
        ['img' => 'https://images.unsplash.com/photo-1560439513-74b037a25d84?w=600&q=70', 'cat' => 'Riset', 'title' => 'Inovasi Energi Terbarukan: Solar Panel Efisiensi Tinggi Karya PENS', 'author' => 'Dr. Maya Sari', 'date' => '18 Apr 2026'],
        ['img' => 'https://images.unsplash.com/photo-1531545514256-b1400bc00f31?w=600&q=70', 'cat' => 'Kegiatan', 'title' => 'Dies Natalis ke-38: PENS Gelar Seminar Internasional IoT', 'author' => 'Humas PENS', 'date' => '17 Apr 2026'],
    ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($editorPicks as $pick)
        <a href="#" class="group">
            <div class="relative rounded-2xl overflow-hidden aspect-[4/3] mb-4">
                <img src="{{ $pick['img'] }}" alt="{{ $pick['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-pens-navy/0 group-hover:bg-pens-navy/20 transition-colors duration-300"></div>
            </div>
            <span class="text-xs font-semibold text-pens-cyan uppercase tracking-wider">{{ $pick['cat'] }}</span>
            <h3 class="font-bold text-pens-navy mt-1 mb-2 group-hover:text-pens-cyan transition-colors line-clamp-2">{{ $pick['title'] }}</h3>
            <div class="flex items-center gap-2 text-xs text-gray-400">
                <span>{{ $pick['author'] }}</span>
                <span>&bull;</span>
                <span>{{ $pick['date'] }}</span>
            </div>
        </a>
        @endforeach
    </div>
</section>

@endsection
