@extends('layouts.news')
@section('title', $post->title . ' - EEPIS News')

@section('content')

{{-- ========== ARTICLE ========== --}}
<article class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- Header --}}
    <header class="pt-8 sm:pt-12 pb-6">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-1.5 text-xs text-slate-400 mb-6">
            <a href="/" class="hover:text-slate-700 transition-colors">Beranda</a>
            @if($post->category)
                <svg class="w-3 h-3 text-slate-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                <a href="{{ route('news.category', $post->category->slug) }}" class="text-sky-600 font-semibold uppercase tracking-wider hover:text-sky-700 transition-colors">{{ $post->category->name }}</a>
            @endif
        </nav>

        {{-- Title --}}
        <h1 class="text-3xl sm:text-4xl lg:text-[2.75rem] font-extrabold text-slate-900 leading-[1.15] tracking-tight mb-6">
            {{ $post->title }}
        </h1>

        {{-- Author bar --}}
        <div class="flex items-center gap-3 pb-6 border-b border-slate-100">
            <div class="w-10 h-10 rounded-full bg-sky-50 text-sky-600 flex items-center justify-center text-sm font-bold">
                {{ strtoupper(substr($post->user->name ?? 'R', 0, 1)) }}
            </div>
            <div>
                <div class="text-sm font-semibold text-slate-800">{{ $post->user->name ?? 'Redaksi EEPIS' }}</div>
                <div class="text-xs text-slate-400">{{ $post->created_at->translatedFormat('d F Y') }} · {{ ceil(str_word_count(strip_tags($post->content)) / 200) }} menit baca</div>
            </div>
        </div>
    </header>

    {{-- Thumbnail --}}
    @if($post->thumbnail)
    <figure class="mb-8">
        <div class="rounded-2xl overflow-hidden">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full">
        </div>
    </figure>
    @endif

    {{-- Content --}}
    <div class="prose prose-slate prose-lg max-w-none
        prose-headings:font-extrabold prose-headings:tracking-tight
        prose-h2:text-2xl prose-h2:mt-10 prose-h2:mb-4
        prose-h3:text-xl prose-h3:mt-8 prose-h3:mb-3
        prose-p:leading-[1.9] prose-p:text-slate-600
        prose-a:text-sky-600 prose-a:no-underline hover:prose-a:underline prose-a:font-medium
        prose-img:rounded-2xl
        prose-blockquote:border-l-[3px] prose-blockquote:border-sky-400 prose-blockquote:bg-sky-50/50 prose-blockquote:rounded-r-xl prose-blockquote:py-3 prose-blockquote:px-5 prose-blockquote:text-slate-600 prose-blockquote:not-italic prose-blockquote:font-normal
        prose-strong:text-slate-800 prose-strong:font-semibold
        prose-li:text-slate-600">
        {!! $post->content !!}
    </div>

    {{-- Video --}}
    @if($post->video)
    <div class="mt-10 pt-8 border-t border-slate-100">
        <h3 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814z"/><path fill="#fff" d="M9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
            Video Liputan
        </h3>
        @php
            preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]+)/', $post->video, $matches);
            $videoId = $matches[1] ?? null;
        @endphp
        @if($videoId)
            <div class="aspect-video rounded-2xl overflow-hidden bg-slate-100">
                <iframe src="https://www.youtube.com/embed/{{ $videoId }}" class="w-full h-full" frameborder="0" allowfullscreen loading="lazy"></iframe>
            </div>
        @else
            <a href="{{ $post->video }}" target="_blank" class="inline-flex items-center gap-2 text-sm text-sky-600 hover:text-sky-700 font-medium transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                Tonton Video
            </a>
        @endif
    </div>
    @endif

    {{-- Share --}}
    <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-between">
        <div class="flex items-center gap-2">
            @if($post->category)
            <a href="{{ route('news.category', $post->category->slug) }}" class="px-3 py-1 text-xs font-medium text-slate-500 bg-slate-50 rounded-lg border border-slate-100 hover:border-sky-200 hover:text-sky-600 transition-all">{{ $post->category->name }}</a>
            @endif
        </div>
        <button onclick="navigator.share?.({title: '{{ addslashes($post->title) }}', url: window.location.href}).catch(()=>{})" class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-400 hover:text-sky-600 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z"/></svg>
            Bagikan
        </button>
    </div>
</article>

{{-- ========== RELATED ========== --}}
@if($related->count() > 0)
<section class="border-t border-slate-100 mt-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12">
        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-7 flex items-center gap-2">
            <span class="w-5 h-[2px] bg-sky-500"></span>
            Baca Juga
        </h3>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6">
            @foreach($related as $item)
            <a href="{{ route('news.show', $item->slug) }}" class="group block">
                <div class="rounded-xl overflow-hidden aspect-[3/2] mb-3 bg-slate-100">
                    @if($item->thumbnail)
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover img-zoom" loading="lazy">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-slate-100 to-slate-50 flex items-center justify-center">
                            <svg class="w-7 h-7 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                        </div>
                    @endif
                </div>
                @if($item->category)
                    <span class="text-sky-600 text-[10px] font-bold uppercase tracking-widest">{{ $item->category->name }}</span>
                @endif
                <h4 class="font-bold text-slate-900 text-sm leading-snug mt-1 group-hover:text-sky-600 transition-colors line-clamp-2">{{ $item->title }}</h4>
                <time class="text-[11px] text-slate-400 mt-1 block">{{ $item->created_at->diffForHumans() }}</time>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
