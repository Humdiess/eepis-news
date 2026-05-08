@extends('layouts.news')
@section('title', $q ? 'Hasil Pencarian: ' . $q . ' - EEPIS News' : 'Cari Berita - EEPIS News')

@section('content')

{{-- ========== SEARCH HERO ========== --}}
<section class="bg-pens-navy relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-10 left-1/4 w-72 h-72 bg-pens-cyan/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-pens-blue/10 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 text-center">
        <div class="flex items-center justify-center gap-2 text-sm text-gray-400 mb-8">
            <a href="/" class="hover:text-pens-light transition-colors">Beranda</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
            <span class="text-pens-light">Pencarian</span>
        </div>

        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-8">
            @if($q)
                Hasil untuk "<span class="text-pens-light">{{ $q }}</span>"
            @else
                Cari Berita
            @endif
        </h1>

        <form action="{{ route('news.search') }}" method="GET" class="max-w-2xl mx-auto relative">
            <input type="text" name="q" value="{{ $q }}" placeholder="Ketik judul berita, topik, atau kata kunci..." class="w-full pl-14 pr-32 py-5 bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl text-white placeholder-gray-400 text-base focus:outline-none focus:ring-2 focus:ring-pens-cyan focus:bg-white/15 transition-all" autofocus>
            <svg class="w-6 h-6 absolute left-5 top-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
            <button type="submit" class="absolute right-3 top-3 px-6 py-2.5 bg-gradient-to-r from-pens-cyan to-pens-light text-white text-sm font-bold rounded-xl hover:shadow-lg hover:shadow-pens-cyan/30 transition-all duration-300">Cari</button>
        </form>
    </div>
</section>

{{-- ========== RESULTS ========== --}}
@if($q)
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-10 pb-6 border-b border-gray-100">
        <p class="text-sm text-gray-500">Ditemukan <strong class="text-pens-navy">{{ $results instanceof \Illuminate\Pagination\LengthAwarePaginator ? $results->total() : $results->count() }}</strong> berita untuk "<strong class="text-pens-navy">{{ $q }}</strong>"</p>
    </div>

    <div class="space-y-0 divide-y divide-gray-100">
        @forelse($results as $item)
        <a href="{{ route('news.show', $item->slug) }}" class="group flex flex-col sm:flex-row gap-6 py-8 first:pt-0">
            <div class="w-full sm:w-72 h-48 sm:h-44 flex-shrink-0 rounded-2xl overflow-hidden">
                @if($item->thumbnail)
                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                @endif
            </div>
            <div class="flex-1 flex flex-col justify-center">
                <div class="flex items-center gap-3 text-xs mb-3">
                    @if($item->category)
                        <span class="text-pens-cyan font-bold uppercase tracking-wider">{{ $item->category->name }}</span>
                        <span class="text-gray-300">&bull;</span>
                    @endif
                    <span class="text-gray-400">{{ $item->created_at->format('d M Y') }}</span>
                </div>
                <h3 class="text-xl font-bold text-pens-navy group-hover:text-pens-cyan transition-colors leading-snug mb-2 line-clamp-2">{{ $item->title }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed line-clamp-2 mb-4">{{ Str::limit(strip_tags($item->content), 180) }}</p>
                <div class="flex items-center gap-3 text-xs text-gray-400">
                    <div class="flex items-center gap-2">
                        <div class="w-5 h-5 rounded-full bg-gradient-to-br from-pens-cyan to-pens-blue"></div>
                        <span>{{ $item->user->name ?? 'Redaksi' }}</span>
                    </div>
                </div>
            </div>
        </a>
        @empty
        <div class="py-16 text-center">
            <svg class="w-16 h-16 text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <p class="text-lg font-semibold text-pens-navy mb-2">Tidak ditemukan</p>
            <p class="text-sm text-gray-400">Coba gunakan kata kunci lain</p>
        </div>
        @endforelse
    </div>

    @if($results instanceof \Illuminate\Pagination\LengthAwarePaginator && $results->hasPages())
    <div class="mt-12">
        {{ $results->appends(['q' => $q])->links() }}
    </div>
    @endif
</section>
@endif

@endsection
