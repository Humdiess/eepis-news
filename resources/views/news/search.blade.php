@extends('layouts.news')
@section('title', $q ? 'Hasil: ' . $q . ' - EEPIS News' : 'Cari Berita - EEPIS News')

@section('content')

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

    {{-- Search Header --}}
    <div class="mb-8">
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-6">
            @if($q)
                Hasil pencarian
            @else
                Cari Berita
            @endif
        </h1>
        <form action="{{ route('news.search') }}" method="GET" class="relative">
            <svg class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
            <input type="text" name="q" value="{{ $q }}" placeholder="Ketik kata kunci..." class="w-full pl-12 pr-28 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-sky-200 focus:border-sky-300 focus:bg-white transition-all" autofocus>
            <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 px-5 py-2 bg-slate-900 text-white text-xs font-bold rounded-lg hover:bg-sky-600 transition-colors">Cari</button>
        </form>
    </div>

    @if($q)
        {{-- Result count --}}
        <p class="text-sm text-slate-500 mb-6 pb-5 border-b border-slate-100">
            Menampilkan <strong class="text-slate-800">{{ $results instanceof \Illuminate\Pagination\LengthAwarePaginator ? $results->total() : $results->count() }}</strong> hasil untuk "<strong class="text-slate-800">{{ $q }}</strong>"
        </p>

        {{-- Results --}}
        <div class="divide-y divide-slate-100">
            @forelse($results as $item)
            <article class="py-5">
                <a href="{{ route('news.show', $item->slug) }}" class="group flex gap-5">
                    <div class="hidden sm:block w-44 h-28 rounded-xl overflow-hidden bg-slate-100 flex-shrink-0">
                        @if($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover img-zoom" loading="lazy">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-slate-100 to-slate-50 flex items-center justify-center">
                                <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 text-[11px] mb-1.5">
                            @if($item->category)
                                <span class="text-sky-600 font-bold uppercase tracking-widest">{{ $item->category->name }}</span>
                                <span class="text-slate-200">·</span>
                            @endif
                            <time class="text-slate-400">{{ $item->created_at->diffForHumans() }}</time>
                        </div>
                        <h3 class="font-bold text-slate-900 group-hover:text-sky-600 transition-colors leading-snug mb-1.5 line-clamp-2 text-[15px]">{{ $item->title }}</h3>
                        <p class="text-sm text-slate-500 leading-relaxed line-clamp-2 hidden sm:block">{{ Str::limit(strip_tags($item->content), 140) }}</p>
                    </div>
                </a>
            </article>
            @empty
            <div class="py-20 text-center">
                <div class="w-14 h-14 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
                </div>
                <p class="text-slate-500 text-sm font-medium mb-1">Tidak ada hasil</p>
                <p class="text-slate-400 text-xs">Coba gunakan kata kunci yang berbeda</p>
            </div>
            @endforelse
        </div>

        @if($results instanceof \Illuminate\Pagination\LengthAwarePaginator && $results->hasPages())
        <div class="mt-8 pt-6 border-t border-slate-100">
            {{ $results->appends(['q' => $q])->links() }}
        </div>
        @endif
    @else
        <div class="py-20 text-center">
            <div class="w-14 h-14 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
            </div>
            <p class="text-slate-500 text-sm">Ketik kata kunci untuk mencari berita</p>
        </div>
    @endif
</div>

@endsection
