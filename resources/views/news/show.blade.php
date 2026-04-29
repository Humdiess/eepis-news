@extends('layouts.news')
@section('title', 'PENS Raih Peringkat 1 Politeknik Terbaik Indonesia - EEPIS News')

@section('content')

{{-- ========== HERO BANNER ========== --}}
<div class="relative h-[70vh] min-h-[500px] overflow-hidden">
    <img src="https://images.unsplash.com/photo-1562774053-701939374585?w=1600&q=80" alt="Kampus PENS" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-t from-pens-navy via-pens-navy/60 to-transparent"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-end pb-16 text-center">
        <div class="flex items-center justify-center gap-3 mb-6">
            <a href="/kategori" class="category-badge bg-pens-cyan text-white hover:bg-pens-blue transition-colors">Akademik</a>
            <span class="text-gray-400 text-sm">&bull;</span>
            <span class="text-gray-300 text-sm">5 min read</span>
        </div>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-extrabold text-white leading-tight mb-6">
            PENS Raih Peringkat 1 Politeknik Terbaik Indonesia Versi Webometrics 2026
        </h1>
        <p class="text-gray-300 text-lg max-w-2xl mx-auto leading-relaxed">
            Politeknik Elektronika Negeri Surabaya kembali mengukir prestasi gemilang di kancah pendidikan tinggi nasional.
        </p>
    </div>
</div>

{{-- ========== AUTHOR BAR ========== --}}
<div class="bg-white border-b border-gray-100 sticky top-16 z-40">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="w-11 h-11 rounded-full bg-gradient-to-br from-pens-cyan to-pens-blue flex items-center justify-center text-white text-sm font-bold shadow-lg shadow-pens-cyan/20">
                    R
                </div>
                <div>
                    <div class="text-sm font-bold text-pens-navy">Redaksi EEPIS</div>
                    <div class="text-xs text-gray-400">28 April 2026</div>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <button class="w-9 h-9 rounded-full bg-gray-50 hover:bg-pens-cyan hover:text-white text-gray-400 flex items-center justify-center transition-all duration-300 border border-gray-100 hover:border-pens-cyan">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </button>
                <button class="w-9 h-9 rounded-full bg-gray-50 hover:bg-pens-cyan hover:text-white text-gray-400 flex items-center justify-center transition-all duration-300 border border-gray-100 hover:border-pens-cyan">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                </button>
                <button class="w-9 h-9 rounded-full bg-gray-50 hover:bg-pens-cyan hover:text-white text-gray-400 flex items-center justify-center transition-all duration-300 border border-gray-100 hover:border-pens-cyan">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/></svg>
                </button>
                <button class="w-9 h-9 rounded-full bg-gray-50 hover:bg-pens-cyan hover:text-white text-gray-400 flex items-center justify-center transition-all duration-300 border border-gray-100 hover:border-pens-cyan">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z"/></svg>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- ========== ARTICLE CONTENT ========== --}}
<article class="bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">

        {{-- Lead Paragraph --}}
        <p class="text-xl sm:text-2xl font-medium text-pens-navy leading-relaxed mb-10">
            <span class="text-6xl font-black float-left mr-4 mt-1 leading-none bg-gradient-to-b from-pens-cyan to-pens-blue bg-clip-text text-transparent">S</span>urabaya — Politeknik Elektronika Negeri Surabaya kembali mengukir sejarah di kancah pendidikan nasional. Dalam rilis terbaru lembaga pemeringkatan internasional Webometrics edisi Juli 2026, PENS berhasil mempertahankan posisinya sebagai politeknik terbaik nomor satu di Indonesia.
        </p>

        <div class="space-y-6 text-gray-600 text-lg leading-relaxed">
            <p>
                Prestasi ini bukan sekadar angka, melainkan refleksi dari dedikasi seluruh sivitas akademika dalam meningkatkan kualitas riset, publikasi ilmiah, dan keterbukaan informasi. Webometrics menggunakan empat indikator utama: <em class="text-pens-navy font-medium">Presence</em>, <em class="text-pens-navy font-medium">Visibility</em>, <em class="text-pens-navy font-medium">Transparency</em>, dan <em class="text-pens-navy font-medium">Excellence</em>.
            </p>

            <p>
                Dalam kategori <em>Visibility</em>, PENS menunjukkan lonjakan signifikan berkat banyaknya kolaborasi riset internasional dan proyek inovasi mahasiswa yang diunggah ke platform publik. Hal ini sejalan dengan visi PENS untuk menjadi pusat unggulan teknologi elektronika yang diakui dunia.
            </p>
        </div>

        {{-- Pull Quote --}}
        <blockquote class="my-14 relative">
            <div class="absolute -left-4 sm:-left-8 top-0 bottom-0 w-1 bg-gradient-to-b from-pens-cyan to-pens-blue rounded-full"></div>
            <div class="pl-6 sm:pl-10">
                <svg class="w-10 h-10 text-pens-light/30 mb-4" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                <p class="text-xl sm:text-2xl font-semibold text-pens-navy italic leading-relaxed mb-4">
                    Kami sangat bersyukur atas pencapaian ini. Ini adalah bukti nyata bahwa meskipun kita adalah institusi pendidikan vokasi, kualitas riset dan kehadiran digital kita mampu bersaing dengan universitas-universitas ternama lainnya.
                </p>
                <cite class="not-italic text-sm font-bold text-pens-cyan">— Prof. Aliridho Barakbah, S.Kom., Ph.D.</cite>
                <span class="text-sm text-gray-400 block">Direktur Politeknik Elektronika Negeri Surabaya</span>
            </div>
        </blockquote>

        <div class="space-y-6 text-gray-600 text-lg leading-relaxed">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-pens-navy mt-12 mb-6">Inovasi dan Kolaborasi Global</h2>

            <p>
                Salah satu faktor pendukung kuat adalah implementasi kurikulum berbasis proyek <em>(Project-Based Learning)</em> yang mewajibkan mahasiswa untuk menghasilkan produk nyata yang bermanfaat bagi masyarakat. Produk-produk ini kemudian didokumentasikan dengan baik secara digital, yang secara langsung berdampak pada indeks pemeringkatan.
            </p>
        </div>

        {{-- Image Grid --}}
        <div class="my-14 grid grid-cols-2 gap-4">
            <figure class="col-span-2 sm:col-span-1">
                <img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?w=600&q=80" class="rounded-2xl w-full h-64 object-cover shadow-lg" alt="Lab PENS">
                <figcaption class="text-xs text-gray-400 mt-2 text-center italic">Lab Robotika PENS</figcaption>
            </figure>
            <figure class="col-span-2 sm:col-span-1">
                <img src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=600&q=80" class="rounded-2xl w-full h-64 object-cover shadow-lg" alt="Riset PENS">
                <figcaption class="text-xs text-gray-400 mt-2 text-center italic">Penelitian IoT</figcaption>
            </figure>
        </div>

        <div class="space-y-6 text-gray-600 text-lg leading-relaxed">
            <p>
                Selain itu, PENS juga terus memperluas jaringan kerjasama dengan industri global. Beberapa waktu lalu, PENS meresmikan laboratorium 5G pertama di tingkat politeknik bekerjasama dengan perusahaan teknologi terkemuka dari Jepang dan Korea Selatan.
            </p>

            {{-- Stats Box --}}
            <div class="grid grid-cols-3 gap-4 my-14">
                <div class="bg-gradient-to-br from-pens-navy to-pens-blue rounded-2xl p-6 text-center text-white">
                    <div class="text-3xl sm:text-4xl font-black mb-1">#1</div>
                    <div class="text-xs text-blue-200 uppercase tracking-wider">Politeknik RI</div>
                </div>
                <div class="bg-gradient-to-br from-pens-cyan to-pens-light rounded-2xl p-6 text-center text-white">
                    <div class="text-3xl sm:text-4xl font-black mb-1">50+</div>
                    <div class="text-xs text-cyan-100 uppercase tracking-wider">Mitra Global</div>
                </div>
                <div class="bg-gradient-to-br from-slate-700 to-slate-900 rounded-2xl p-6 text-center text-white">
                    <div class="text-3xl sm:text-4xl font-black mb-1">200+</div>
                    <div class="text-xs text-slate-300 uppercase tracking-wider">Riset / Tahun</div>
                </div>
            </div>

            <h2 class="text-2xl sm:text-3xl font-extrabold text-pens-navy mt-12 mb-6">Dampak bagi Pendidikan Vokasi</h2>

            <p>
                Dengan pencapaian ini, PENS berharap dapat terus memotivasi institusi pendidikan vokasi lainnya di Indonesia untuk terus berinovasi dan tidak ragu untuk bersaing di level internasional. Tantangan ke depan adalah mempertahankan konsistensi dan terus meningkatkan relevansi pendidikan dengan kebutuhan industri masa depan.
            </p>

            <p>
                Pemerintah melalui Kemendikbudristek juga memberikan apresiasi tinggi atas prestasi ini. Dirjen Pendidikan Vokasi menyatakan bahwa keberhasilan PENS menjadi bukti bahwa lulusan vokasi tidak kalah saing dengan lulusan universitas, bahkan di tingkat internasional.
            </p>
        </div>

        {{-- Tags --}}
        <div class="mt-14 pt-8 border-t border-gray-100">
            <div class="flex flex-wrap items-center gap-2">
                <span class="text-sm font-bold text-pens-navy mr-1">Tags</span>
                <a href="#" class="px-4 py-1.5 bg-gray-50 hover:bg-pens-navy hover:text-white rounded-full text-xs font-medium text-gray-500 transition-all duration-300 border border-gray-100 hover:border-pens-navy">#PENS</a>
                <a href="#" class="px-4 py-1.5 bg-gray-50 hover:bg-pens-navy hover:text-white rounded-full text-xs font-medium text-gray-500 transition-all duration-300 border border-gray-100 hover:border-pens-navy">#Webometrics</a>
                <a href="#" class="px-4 py-1.5 bg-gray-50 hover:bg-pens-navy hover:text-white rounded-full text-xs font-medium text-gray-500 transition-all duration-300 border border-gray-100 hover:border-pens-navy">#VokasiJuara</a>
                <a href="#" class="px-4 py-1.5 bg-gray-50 hover:bg-pens-navy hover:text-white rounded-full text-xs font-medium text-gray-500 transition-all duration-300 border border-gray-100 hover:border-pens-navy">#PoliteknikTerbaik</a>
            </div>
        </div>
    </div>
</article>

{{-- ========== RELATED NEWS ========== --}}
<section class="bg-pens-gray py-16 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-10">
            <div class="w-1.5 h-8 bg-gradient-to-b from-pens-cyan to-pens-blue rounded-full"></div>
            <h2 class="text-2xl font-bold text-pens-navy">Baca Juga</h2>
        </div>

        @php
        $related = [
            ['img' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=600&q=70', 'cat' => 'Riset', 'color' => 'bg-emerald-600', 'title' => 'Dosen PENS Raih Hibah Penelitian Internasional untuk Proyek Smart City', 'desc' => 'Dr. Budi Setiawan mendapatkan pendanaan dari ASEAN Research Fund.', 'date' => '26 Apr 2026'],
            ['img' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&q=70', 'cat' => 'Kegiatan', 'color' => 'bg-amber-500', 'title' => 'PENS Tech Festival 2026 Hadirkan 50+ Startup dan 200 Inovasi Mahasiswa', 'desc' => 'Festival teknologi tahunan PENS kembali digelar dengan skala lebih besar.', 'date' => '25 Apr 2026'],
            ['img' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=600&q=70', 'cat' => 'Prestasi', 'color' => 'bg-rose-500', 'title' => 'Delegasi PENS Sabet 3 Medali Emas di Ajang ASEAN Engineering Olympics', 'desc' => 'Tiga tim mahasiswa PENS meraih medali emas pada kompetisi teknik bergengsi.', 'date' => '24 Apr 2026'],
            ['img' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&q=70', 'cat' => 'Alumni', 'color' => 'bg-violet-600', 'title' => 'Alumni PENS di Silicon Valley: Kisah Sukses Anak Bangsa di Perusahaan Top Dunia', 'desc' => 'Dari Surabaya ke lembah silikon, kisah inspiratif alumni PENS.', 'date' => '23 Apr 2026'],
        ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($related as $item)
            <a href="/berita/detail" class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 news-card-hover block">
                <div class="relative overflow-hidden aspect-[16/10]">
                    <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <a href="/kategori" class="category-badge {{ $item['color'] }} text-white absolute top-3 left-3 hover:brightness-110 transition-all">{{ $item['cat'] }}</a>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-sm text-pens-navy leading-snug mb-2 group-hover:text-pens-cyan transition-colors line-clamp-2">{{ $item['title'] }}</h3>
                    <p class="text-xs text-gray-400 line-clamp-2 mb-3">{{ $item['desc'] }}</p>
                    <span class="text-xs text-gray-400">{{ $item['date'] }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
