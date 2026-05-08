@extends('layouts.news')
@section('title', $post->title . ' - EEPIS News')

@section('content')

{{-- ========== HERO BANNER ========== --}}
<div class="relative h-[70vh] min-h-[500px] overflow-hidden">
    @if($post->thumbnail)
        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="absolute inset-0 w-full h-full object-cover">
    @else
        <div class="absolute inset-0 bg-gradient-to-br from-pens-navy to-pens-blue"></div>
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-pens-navy via-pens-navy/60 to-transparent"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-end pb-16 text-center">
        <div class="flex items-center justify-center gap-3 mb-6">
            @if($post->category)
                <a href="{{ route('news.category', $post->category->slug) }}" class="category-badge bg-pens-cyan text-white hover:bg-pens-blue transition-colors">{{ $post->category->name }}</a>
            @endif
        </div>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-extrabold text-white leading-tight mb-6">
            {{ $post->title }}
        </h1>
        <p class="text-gray-300 text-lg max-w-2xl mx-auto leading-relaxed">
            {{ Str::limit(strip_tags($post->content), 160) }}
        </p>
    </div>
</div>

{{-- ========== AUTHOR BAR ========== --}}
<div class="bg-white border-b border-gray-100 sticky top-16 z-40">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="w-11 h-11 rounded-full bg-gradient-to-br from-pens-cyan to-pens-blue flex items-center justify-center text-white text-sm font-bold shadow-lg shadow-pens-cyan/20">
                    {{ strtoupper(substr($post->user->name ?? 'R', 0, 1)) }}
                </div>
                <div>
                    <div class="text-sm font-bold text-pens-navy">{{ $post->user->name ?? 'Redaksi EEPIS' }}</div>
                    <div class="text-xs text-gray-400">{{ $post->created_at->format('d F Y') }}</div>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <button class="w-9 h-9 rounded-full bg-gray-50 hover:bg-pens-cyan hover:text-white text-gray-400 flex items-center justify-center transition-all duration-300 border border-gray-100 hover:border-pens-cyan">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </button>
                <button class="w-9 h-9 rounded-full bg-gray-50 hover:bg-pens-cyan hover:text-white text-gray-400 flex items-center justify-center transition-all duration-300 border border-gray-100 hover:border-pens-cyan">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/></svg>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- ========== ARTICLE CONTENT ========== --}}
<article class="bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed
            prose-headings:text-pens-navy prose-headings:font-extrabold
            prose-a:text-pens-cyan prose-a:no-underline hover:prose-a:underline
            prose-img:rounded-2xl prose-img:shadow-lg
            prose-blockquote:border-l-pens-cyan prose-blockquote:text-pens-navy prose-blockquote:font-semibold">
            {!! $post->content !!}
        </div>

        {{-- Video YouTube --}}
        @if($post->video)
        <div class="mt-10">
            <h3 class="text-xl font-bold text-pens-navy mb-4">Video Liputan</h3>
            @php
                preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]+)/', $post->video, $matches);
                $videoId = $matches[1] ?? null;
            @endphp
            @if($videoId)
                <div class="aspect-video rounded-2xl overflow-hidden shadow-lg">
                    <iframe src="https://www.youtube.com/embed/{{ $videoId }}" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
                </div>
            @else
                <a href="{{ $post->video }}" target="_blank" class="inline-flex items-center gap-2 text-pens-cyan hover:text-pens-blue font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    Tonton Video
                </a>
            @endif
        </div>
        @endif
    </div>
</article>

{{-- ========== RELATED NEWS ========== --}}
@if($related->count() > 0)
<section class="bg-pens-gray py-16 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-10">
            <div class="w-1.5 h-8 bg-gradient-to-b from-pens-cyan to-pens-blue rounded-full"></div>
            <h2 class="text-2xl font-bold text-pens-navy">Baca Juga</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($related as $item)
            <div class="card-container group relative flex flex-col h-full bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 news-card-hover">
                <a href="{{ route('news.show', $item->slug) }}" class="absolute inset-0 z-10" aria-label="Baca selengkapnya: {{ $item->title }}"></a>
                <div class="card-image relative overflow-hidden h-[200px] shrink-0">
                    @if($item->thumbnail)
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    @endif
                    @if($item->category)
                        <a href="{{ route('news.category', $item->category->slug) }}" class="category-badge bg-pens-blue text-white absolute top-3 left-3 hover:brightness-110 transition-all z-20">{{ $item->category->name }}</a>
                    @endif
                </div>
                <div class="card-info p-5 flex flex-col flex-grow">
                    <h3 class="font-bold text-sm text-pens-navy leading-snug mb-2 group-hover:text-pens-cyan transition-colors line-clamp-2">{{ $item->title }}</h3>
                    <p class="text-xs text-gray-400 line-clamp-2 mb-3">{{ Str::limit(strip_tags($item->content), 100) }}</p>
                    <span class="text-xs text-gray-400 mt-auto">{{ $item->created_at->format('d M Y') }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
