@extends('layouts.news')
@section('title', 'EEPIS News - Portal Berita Kampus PENS')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- ========== HEADLINE ========== --}}
    @if($hero)
    <section class="py-8 sm:py-10 border-b border-slate-100">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-10">
            {{-- Main featured --}}
            <div class="lg:col-span-7">
                <a href="{{ route('news.show', $hero->slug) }}" class="group block">
                    <div class="rounded-2xl overflow-hidden aspect-[16/9] mb-5 bg-slate-100">
                        @if($hero->thumbnail)
                            <img src="{{ asset('storage/' . $hero->thumbnail) }}" alt="{{ $hero->title }}" class="w-full h-full object-cover img-zoom">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center">
                                <svg class="w-16 h-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                            </div>
                        @endif
                    </div>
                    @if($hero->category)
                        <span class="inline-block text-sky-600 text-xs font-bold uppercase tracking-widest mb-2">{{ $hero->category->name }}</span>
                    @endif
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight mb-3 group-hover:text-sky-600 transition-colors">{{ $hero->title }}</h2>
                    <p class="text-slate-500 leading-relaxed line-clamp-2 mb-4">{{ Str::limit(strip_tags($hero->content), 180) }}</p>
                    <div class="flex items-center gap-2 text-xs text-slate-400">
                        <span class="font-medium text-slate-600">{{ $hero->user->name ?? 'Redaksi' }}</span>
                        <span>·</span>
                        <time>{{ $hero->created_at->diffForHumans() }}</time>
                    </div>
                </a>
            </div>

            {{-- Side stories --}}
            <div class="lg:col-span-5 flex flex-col divide-y divide-slate-100">
                @foreach($latestNews->take(3) as $news)
                <a href="{{ route('news.show', $news->slug) }}" class="group flex gap-4 py-4 first:pt-0 last:pb-0">
                    <div class="w-28 h-20 sm:w-32 sm:h-24 rounded-xl overflow-hidden bg-slate-100 flex-shrink-0">
                        @if($news->thumbnail)
                            <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="w-full h-full object-cover img-zoom" loading="lazy">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-slate-100 to-slate-50 flex items-center justify-center">
                                <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0 flex flex-col justify-center">
                        @if($news->category)
                            <span class="text-sky-600 text-[11px] font-bold uppercase tracking-widest mb-1">{{ $news->category->name }}</span>
                        @endif
                        <h3 class="font-bold text-slate-900 leading-snug group-hover:text-sky-600 transition-colors line-clamp-2 text-sm sm:text-[15px]">{{ $news->title }}</h3>
                        <time class="text-[11px] text-slate-400 mt-1.5">{{ $news->created_at->diffForHumans() }}</time>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ========== LATEST GRID ========== --}}
    @if($latestNews->count() > 3 || $popular->count() > 0)
    <section class="py-8 sm:py-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
            {{-- Articles --}}
            <div class="lg:col-span-2">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-6 flex items-center gap-2">
                    <span class="w-5 h-[2px] bg-sky-500"></span>
                    Terbaru
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-7 gap-y-8">
                    @foreach($latestNews->skip(3)->merge($popular)->take(6) as $news)
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
                            @if($news->category)
                                <span class="text-sky-600 text-[11px] font-bold uppercase tracking-widest">{{ $news->category->name }}</span>
                            @endif
                            <h3 class="font-bold text-slate-900 leading-snug mt-1 mb-1.5 group-hover:text-sky-600 transition-colors line-clamp-2 text-[15px]">{{ $news->title }}</h3>
                            <p class="text-sm text-slate-400 line-clamp-2 leading-relaxed">{{ Str::limit(strip_tags($news->content), 90) }}</p>
                        </a>
                    </article>
                    @endforeach
                </div>
            </div>

            {{-- Sidebar --}}
            <aside class="space-y-8">
                {{-- Trending --}}
                @if($trending->count() > 0)
                <div>
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-5 flex items-center gap-2">
                        <span class="w-5 h-[2px] bg-sky-500"></span>
                        Populer
                    </h3>
                    <div class="divide-y divide-slate-100">
                        @foreach($trending->take(5) as $i => $item)
                        <a href="{{ route('news.show', $item->slug) }}" class="group flex gap-4 py-3.5 first:pt-0">
                            <span class="text-2xl font-black text-slate-200 group-hover:text-sky-300 transition-colors w-7 flex-shrink-0 leading-none mt-0.5">{{ $i + 1 }}</span>
                            <div class="min-w-0">
                                <h4 class="text-sm font-semibold text-slate-800 group-hover:text-sky-600 transition-colors leading-snug line-clamp-2">{{ $item->title }}</h4>
                                <time class="text-[11px] text-slate-400 mt-1 block">{{ $item->created_at->diffForHumans() }}</time>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Kategori --}}
                @if($categories->count() > 0)
                <div class="bg-slate-50 rounded-2xl p-5">
                    <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                        <span class="w-5 h-[2px] bg-sky-500"></span>
                        Kategori
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($categories as $cat)
                        <a href="{{ route('news.category', $cat->slug) }}" class="px-3 py-1.5 text-xs font-medium text-slate-600 bg-white rounded-lg border border-slate-200 hover:border-sky-300 hover:text-sky-600 transition-all">
                            {{ $cat->name }}
                            <span class="text-slate-300 ml-1">{{ $cat->posts_count }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </aside>
        </div>
    </section>
    @endif

    {{-- ========== EDITOR PICKS ========== --}}
    @if($editorPicks->count() > 0)
    <section class="py-8 sm:py-10 border-t border-slate-100">
        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-7 flex items-center gap-2">
            <span class="w-5 h-[2px] bg-sky-500"></span>
            Pilihan Redaksi
        </h3>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-5 sm:gap-6">
            @foreach($editorPicks as $pick)
            <a href="{{ route('news.show', $pick->slug) }}" class="group block">
                <div class="rounded-xl overflow-hidden aspect-[4/3] mb-3 bg-slate-100">
                    @if($pick->thumbnail)
                        <img src="{{ asset('storage/' . $pick->thumbnail) }}" alt="{{ $pick->title }}" class="w-full h-full object-cover img-zoom" loading="lazy">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-slate-100 to-slate-50 flex items-center justify-center">
                            <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                    @endif
                </div>
                @if($pick->category)
                    <span class="text-sky-600 text-[10px] font-bold uppercase tracking-widest">{{ $pick->category->name }}</span>
                @endif
                <h4 class="font-bold text-slate-900 text-sm leading-snug mt-1 group-hover:text-sky-600 transition-colors line-clamp-2">{{ $pick->title }}</h4>
            </a>
            @endforeach
        </div>
    </section>
    @endif

</div>
@endsection
