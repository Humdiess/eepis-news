@extends('layouts.news')
@section('title', 'Kategori: ' . $category->name . ' - EEPIS News')

@section('content')

{{-- ========== CATEGORY HERO ========== --}}
<section class="relative overflow-hidden bg-pens-navy">
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
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white mb-4">{{ $category->name }}</h1>
        <div class="mt-8 flex items-center justify-center gap-6 text-sm text-gray-400">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-pens-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/></svg>
                <span>{{ $posts->total() }} Artikel</span>
            </div>
        </div>
    </div>
</section>

{{-- ========== FEATURED ARTICLE ========== --}}
@if($featured)
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <a href="{{ route('news.show', $featured->slug) }}" class="group grid grid-cols-1 lg:grid-cols-2 gap-8 bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 news-card-hover">
        <div class="relative overflow-hidden aspect-[16/10] lg:aspect-auto lg:min-h-[380px]">
            @if($featured->thumbnail)
                <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt="{{ $featured->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            @else
                <div class="absolute inset-0 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
            @endif
            <div class="absolute top-4 left-4">
                <span class="category-badge bg-pens-cyan text-white shadow-lg">Featured</span>
            </div>
        </div>
        <div class="flex flex-col justify-center p-6 lg:p-10 lg:pr-12">
            <div class="flex items-center gap-3 text-xs text-gray-400 mb-4">
                <span class="text-pens-cyan font-semibold uppercase tracking-wider">{{ $category->name }}</span>
                <span>&bull;</span>
                <span>{{ $featured->created_at->format('d F Y') }}</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-pens-navy leading-tight mb-4 group-hover:text-pens-cyan transition-colors">
                {{ $featured->title }}
            </h2>
            <p class="text-gray-500 leading-relaxed mb-6 line-clamp-3">
                {{ Str::limit(strip_tags($featured->content), 200) }}
            </p>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-pens-cyan to-pens-blue flex items-center justify-center text-white text-xs font-bold">{{ strtoupper(substr($featured->user->name ?? 'R', 0, 1)) }}</div>
                <span class="text-sm text-gray-500">{{ $featured->user->name ?? 'Redaksi' }}</span>
            </div>
        </div>
    </a>
</section>
@endif

{{-- ========== NEWS GRID ========== --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $news)
            @if($featured && $news->id === $featured->id) @continue @endif
            <a href="{{ route('news.show', $news->slug) }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 news-card-hover block">
                <div class="relative overflow-hidden aspect-[16/10]">
                    @if($news->thumbnail)
                        <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-xs text-gray-400 mb-3">
                        <span class="text-pens-cyan font-semibold">{{ $category->name }}</span>
                        <span>&bull;</span>
                        <span>{{ $news->created_at->format('d M Y') }}</span>
                    </div>
                    <h3 class="font-bold text-pens-navy leading-snug mb-2 group-hover:text-pens-cyan transition-colors line-clamp-2">{{ $news->title }}</h3>
                    <p class="text-sm text-gray-500 leading-relaxed line-clamp-2 mb-4">{{ Str::limit(strip_tags($news->content), 120) }}</p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-gradient-to-br from-pens-cyan to-pens-blue"></div>
                            <span class="text-xs text-gray-400">{{ $news->user->name ?? 'Redaksi' }}</span>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    {{-- Pagination --}}
    @if($posts->hasPages())
    <div class="mt-14">
        {{ $posts->links() }}
    </div>
    @endif
</section>

{{-- ========== ALL CATEGORIES ========== --}}
<section class="bg-white py-16 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-10">
            <div class="w-1.5 h-8 bg-gradient-to-b from-pens-cyan to-pens-blue rounded-full"></div>
            <h2 class="text-2xl font-bold text-pens-navy">Jelajahi Kategori Lain</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($allCategories as $cat)
            <a href="{{ route('news.category', $cat->slug) }}" class="group relative bg-pens-gray rounded-2xl p-6 border border-gray-100 hover:border-transparent hover:shadow-xl transition-all duration-300 overflow-hidden {{ $cat->id === $category->id ? 'ring-2 ring-pens-cyan' : '' }}">
                <div class="absolute inset-0 bg-gradient-to-br from-pens-cyan to-pens-blue opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-2xl"></div>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-white/10 group-hover:bg-white/20 rounded-xl flex items-center justify-center mb-4 transition-colors border border-gray-200 group-hover:border-white/20">
                        <svg class="w-6 h-6 text-gray-500 group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/><path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"/></svg>
                    </div>
                    <h3 class="font-bold text-pens-navy group-hover:text-white transition-colors mb-1">{{ $cat->name }}</h3>
                    <p class="text-sm text-gray-400 group-hover:text-white/70 transition-colors">{{ $cat->posts_count }} artikel</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

@endsection
