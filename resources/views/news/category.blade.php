@extends('layouts.news')
@section('title', 'Kategori: ' . $category->name . ' - EEPIS News')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">

    {{-- Header --}}
    <header class="mb-8 sm:mb-10">
        <nav class="flex items-center gap-1.5 text-xs text-slate-400 mb-4">
            <a href="/" class="hover:text-slate-700 transition-colors">Beranda</a>
            <svg class="w-3 h-3 text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
            <span class="text-slate-600 font-medium">Kategori</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight mb-2">{{ $category->name }}</h1>
        <p class="text-sm text-slate-400">{{ $posts->total() }} artikel ditemukan</p>
    </header>

    {{-- Category Switcher --}}
    @if($allCategories->count() > 1)
    <div class="flex items-center gap-2 overflow-x-auto pb-6 mb-2 scrollbar-hide -mx-1 px-1">
        <a href="/" class="px-4 py-2 text-xs font-medium text-slate-500 bg-white rounded-full border border-slate-200 hover:border-slate-300 hover:text-slate-700 transition-all whitespace-nowrap flex-shrink-0">
            Semua
        </a>
        @foreach($allCategories as $cat)
        <a href="{{ route('news.category', $cat->slug) }}"
           class="px-4 py-2 text-xs font-medium rounded-full border whitespace-nowrap flex-shrink-0 transition-all
           {{ $cat->id === $category->id
               ? 'bg-slate-900 text-white border-slate-900'
               : 'text-slate-500 bg-white border-slate-200 hover:border-slate-300 hover:text-slate-700' }}">
            {{ $cat->name }}
        </a>
        @endforeach
    </div>
    @endif

    {{-- Featured --}}
    @if($featured)
    <section class="pb-8 sm:pb-10 mb-8 sm:mb-10 border-b border-slate-100">
        <a href="{{ route('news.show', $featured->slug) }}" class="group grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-center">
            <div class="lg:col-span-7 rounded-2xl overflow-hidden aspect-[16/9] bg-slate-100">
                @if($featured->thumbnail)
                    <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt="{{ $featured->title }}" class="w-full h-full object-cover img-zoom" loading="lazy">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                        <svg class="w-14 h-14 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                    </div>
                @endif
            </div>
            <div class="lg:col-span-5">
                <span class="text-sky-600 text-xs font-bold uppercase tracking-widest">{{ $category->name }}</span>
                <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-tight mt-2 mb-3 group-hover:text-sky-600 transition-colors">{{ $featured->title }}</h2>
                <p class="text-sm text-slate-500 leading-relaxed line-clamp-3 mb-4">{{ Str::limit(strip_tags($featured->content), 200) }}</p>
                <div class="flex items-center gap-2 text-xs text-slate-400">
                    <span class="font-medium text-slate-600">{{ $featured->user->name ?? 'Redaksi' }}</span>
                    <span>·</span>
                    <time>{{ $featured->created_at->diffForHumans() }}</time>
                </div>
            </div>
        </a>
    </section>
    @endif

    {{-- Grid --}}
    @if($posts->count() > ($featured ? 1 : 0))
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-7 gap-y-8">
        @foreach($posts as $news)
            @if($featured && $news->id === $featured->id) @continue @endif
            <article class="group">
                <a href="{{ route('news.show', $news->slug) }}" class="block">
                    <div class="rounded-xl overflow-hidden aspect-[3/2] mb-3.5 bg-slate-100">
                        @if($news->thumbnail)
                            <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="w-full h-full object-cover img-zoom" loading="lazy">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-slate-100 to-slate-50 flex items-center justify-center">
                                <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex items-center gap-2 text-[11px] mb-1.5">
                        <time class="text-slate-400">{{ $news->created_at->diffForHumans() }}</time>
                    </div>
                    <h3 class="font-bold text-slate-900 leading-snug group-hover:text-sky-600 transition-colors line-clamp-2 text-[15px] mb-1.5">{{ $news->title }}</h3>
                    <p class="text-sm text-slate-400 line-clamp-2 leading-relaxed">{{ Str::limit(strip_tags($news->content), 90) }}</p>
                </a>
            </article>
        @endforeach
    </div>
    @elseif(!$featured)
    <div class="py-20 text-center">
        <div class="w-14 h-14 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12H9.75m3 0H9.75m0 0v-3.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <p class="text-slate-500 text-sm font-medium mb-1">Belum ada artikel</p>
        <p class="text-slate-400 text-xs">Berita akan muncul setelah dipublikasikan</p>
    </div>
    @endif

    {{-- Pagination --}}
    @if($posts->hasPages())
    <div class="mt-12 pt-6 border-t border-slate-100">
        {{ $posts->links() }}
    </div>
    @endif
</div>

@endsection
