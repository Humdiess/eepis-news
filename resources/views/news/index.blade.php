@extends('layouts.news')
@section('title', 'EEPIS News - Portal Berita Kampus PENS')

@section('content')

{{-- ========== HERO SECTION ========== --}}
@if($hero)
<section class="relative h-[85vh] min-h-[600px] overflow-hidden">
    @if($hero->thumbnail)
        <img src="{{ asset('storage/' . $hero->thumbnail) }}" alt="{{ $hero->title }}" class="absolute inset-0 w-full h-full object-cover">
    @else
        <img src="https://images.unsplash.com/photo-1562774053-701939374585?w=1600&q=80" alt="Kampus PENS" class="absolute inset-0 w-full h-full object-cover">
    @endif
    <div class="gradient-overlay absolute inset-0"></div>
    <div class="absolute inset-0 bg-pens-blue/20"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-end pb-16">
        <div class="max-w-3xl">
            @if($hero->category)
                <a href="{{ route('news.category', $hero->category->slug) }}" class="category-badge bg-pens-cyan text-white mb-4 hover:bg-pens-blue transition-colors inline-block">{{ $hero->category->name }}</a>
            @endif
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-4">
                <a href="{{ route('news.show', $hero->slug) }}" class="hover:text-pens-light transition-colors">{{ $hero->title }}</a>
            </h1>
            <p class="text-gray-300 text-base sm:text-lg leading-relaxed mb-6 line-clamp-3">
                {{ Str::limit(strip_tags($hero->content), 200) }}
            </p>
            <div class="flex items-center gap-4 text-sm text-gray-400">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-pens-cyan to-pens-light flex items-center justify-center text-white text-xs font-bold">{{ strtoupper(substr($hero->user->name ?? 'R', 0, 1)) }}</div>
                    <span>{{ $hero->user->name ?? 'Redaksi' }}</span>
                </div>
                <span>&bull;</span>
                <span>{{ $hero->created_at->format('d F Y') }}</span>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ========== BERITA TERBARU + SIDEBAR ========== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    {{-- Section Header --}}
    <div class="flex items-center justify-between mb-10">
        <div class="flex items-center gap-3">
            <div class="w-1.5 h-8 bg-gradient-to-b from-pens-cyan to-pens-blue rounded-full"></div>
            <h2 class="text-2xl font-bold text-pens-navy">Berita Terbaru</h2>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        {{-- Main News Grid --}}
        <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach($latestNews as $news)
            <article class="group relative bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 news-card-hover">
                <a href="{{ route('news.show', $news->slug) }}" class="absolute inset-0 z-10"><span class="sr-only">Baca {{ $news->title }}</span></a>
                <div class="relative overflow-hidden aspect-[16/10]">
                    @if($news->thumbnail)
                        <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    @endif
                    @if($news->category)
                        <span class="category-badge bg-pens-blue text-white absolute top-3 left-3 z-20">{{ $news->category->name }}</span>
                    @endif
                </div>
                <div class="p-5 relative">
                    <h3 class="font-bold text-pens-navy leading-snug mb-2 group-hover:text-pens-cyan transition-colors line-clamp-2">{{ $news->title }}</h3>
                    <p class="text-sm text-gray-500 leading-relaxed mb-4 line-clamp-2">{{ Str::limit(strip_tags($news->content), 120) }}</p>
                    <div class="flex items-center justify-between text-xs text-gray-400">
                        <span>{{ $news->user->name ?? 'Redaksi' }}</span>
                        <span>{{ $news->created_at->format('d M Y') }}</span>
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
                    <h3 class="font-bold text-pens-navy">Trending</h3>
                </div>
                <div class="space-y-4">
                    @foreach($trending as $index => $item)
                    <a href="{{ route('news.show', $item->slug) }}" class="flex items-start gap-3 group/item">
                        <span class="text-2xl font-extrabold text-gray-100 group-hover/item:text-pens-light transition-colors leading-none">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold text-pens-navy group-hover/item:text-pens-cyan transition-colors line-clamp-2">{{ $item->title }}</h4>
                            <span class="text-xs text-gray-400">{{ $item->created_at->diffForHumans() }}</span>
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
                    @foreach($categories as $cat)
                    <a href="{{ route('news.category', $cat->slug) }}" class="px-3 py-1.5 text-xs font-medium text-gray-600 bg-gray-50 hover:bg-pens-cyan hover:text-white rounded-full border border-gray-200 hover:border-pens-cyan transition-all duration-300">{{ $cat->name }}</a>
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
@if($popular->count() > 0)
<section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-10">
            <div class="flex items-center gap-3">
                <div class="w-1.5 h-8 bg-gradient-to-b from-pens-cyan to-pens-blue rounded-full"></div>
                <h2 class="text-2xl font-bold text-pens-navy">Berita Lainnya</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Featured Popular --}}
            @if($popular->first())
            @php $first = $popular->first(); @endphp
            <div class="group md:col-span-1 md:row-span-2 relative rounded-2xl overflow-hidden min-h-[400px] flex">
                <a href="{{ route('news.show', $first->slug) }}" class="absolute inset-0 z-10"><span class="sr-only">Baca {{ $first->title }}</span></a>
                @if($first->thumbnail)
                    <img src="{{ asset('storage/' . $first->thumbnail) }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    <div class="absolute inset-0 bg-gradient-to-br from-pens-navy to-pens-blue"></div>
                @endif
                <div class="gradient-overlay absolute inset-0"></div>
                <div class="relative h-full flex flex-col justify-end p-6 w-full">
                    @if($first->category)
                        <a href="{{ route('news.category', $first->category->slug) }}" class="category-badge bg-pens-blue text-white mb-3 w-fit hover:brightness-110 transition-all relative z-20">{{ $first->category->name }}</a>
                    @endif
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-pens-light transition-colors">{{ $first->title }}</h3>
                    <p class="text-sm text-gray-300 line-clamp-2 mb-3">{{ Str::limit(strip_tags($first->content), 120) }}</p>
                    <div class="flex items-center gap-3 text-xs text-gray-400">
                        <span>{{ $first->user->name ?? 'Redaksi' }}</span>
                        <span>&bull;</span>
                        <span>{{ $first->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
            @endif

            {{-- Other Popular --}}
            @foreach($popular->skip(1) as $news)
            <article class="group relative bg-pens-gray rounded-2xl overflow-hidden border border-gray-100 news-card-hover flex flex-col sm:flex-row md:flex-col">
                <a href="{{ route('news.show', $news->slug) }}" class="absolute inset-0 z-10"><span class="sr-only">Baca {{ $news->title }}</span></a>
                <div class="relative overflow-hidden aspect-[16/10] sm:w-48 sm:aspect-auto md:w-full md:aspect-[16/10] flex-shrink-0">
                    @if($news->thumbnail)
                        <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center min-h-[160px]">
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    @endif
                    @if($news->category)
                        <a href="{{ route('news.category', $news->category->slug) }}" class="category-badge bg-pens-blue text-white absolute top-3 left-3 hover:brightness-110 transition-all z-20">{{ $news->category->name }}</a>
                    @endif
                </div>
                <div class="p-5 flex flex-col justify-center relative">
                    <h3 class="font-bold text-pens-navy leading-snug mb-2 group-hover:text-pens-cyan transition-colors line-clamp-2">{{ $news->title }}</h3>
                    <p class="text-sm text-gray-500 leading-relaxed mb-3 line-clamp-2">{{ Str::limit(strip_tags($news->content), 100) }}</p>
                    <div class="flex items-center gap-3 text-xs text-gray-400">
                        <span>{{ $news->user->name ?? 'Redaksi' }}</span>
                        <span>&bull;</span>
                        <span>{{ $news->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ========== PILIHAN REDAKSI ========== --}}
@if($editorPicks->count() > 0)
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="flex items-center gap-3 mb-10">
        <div class="w-1.5 h-8 bg-gradient-to-b from-pens-cyan to-pens-blue rounded-full"></div>
        <h2 class="text-2xl font-bold text-pens-navy">Pilihan Redaksi</h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($editorPicks as $pick)
        <a href="{{ route('news.show', $pick->slug) }}" class="group">
            <div class="relative rounded-2xl overflow-hidden aspect-[4/3] mb-4">
                @if($pick->thumbnail)
                    <img src="{{ asset('storage/' . $pick->thumbnail) }}" alt="{{ $pick->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                @endif
                <div class="absolute inset-0 bg-pens-navy/0 group-hover:bg-pens-navy/20 transition-colors duration-300"></div>
            </div>
            @if($pick->category)
                <span class="text-xs font-semibold text-pens-cyan uppercase tracking-wider">{{ $pick->category->name }}</span>
            @endif
            <h3 class="font-bold text-pens-navy mt-1 mb-2 group-hover:text-pens-cyan transition-colors line-clamp-2">{{ $pick->title }}</h3>
            <div class="flex items-center gap-2 text-xs text-gray-400">
                <span>{{ $pick->user->name ?? 'Redaksi' }}</span>
                <span>&bull;</span>
                <span>{{ $pick->created_at->format('d M Y') }}</span>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endif

@endsection
