<x-dashboard-layout :role="'admin'" :pageTitle="'Kelola Berita'" :title="'Kelola Berita'">
<div x-data="{ deleteModal: false, deleteTarget: '', deleteId: null }">

    <x-dashboard.flash-message />

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <x-dashboard.section-header title="Daftar Berita" />

        <a href="{{ route('dashboard.posts.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-semibold text-sm rounded-xl hover:shadow-lg hover:bg-blue-700 transition-all duration-300 hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tulis Berita
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 mb-6">
        <form method="GET" action="{{ route('dashboard.posts.index') }}" class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1">
                <div class="flex items-center gap-2 bg-gray-50 rounded-xl px-4 py-2.5 border border-gray-100">
                    <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul berita..." class="bg-transparent border-none text-sm text-gray-600 placeholder-gray-400 focus:ring-0 focus:outline-none w-full p-0">
                </div>
            </div>
            <select name="category" onchange="this.form.submit()" class="pl-4 pr-10 py-2.5 bg-gray-50 border border-gray-100 rounded-xl text-sm text-gray-600 focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </form>
    </div>

    {{-- Posts Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Berita</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Penulis</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden md:table-cell">Kategori</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden lg:table-cell">Tanggal</th>
                        <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($posts as $post)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    @if($post->thumbnail)
                                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="w-16 h-11 rounded-lg object-cover flex-shrink-0 hidden sm:block ring-1 ring-gray-100">
                                    @else
                                        <div class="w-16 h-11 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 flex-shrink-0 hidden sm:flex items-center justify-center ring-1 ring-gray-100">
                                            <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                    <div class="min-w-0">
                                        <p class="text-sm font-semibold text-pens-navy truncate max-w-xs group-hover:text-pens-cyan transition-colors">{{ $post->title }}</p>
                                        <p class="text-xs text-gray-400 sm:hidden mt-0.5">{{ $post->category->name ?? '-' }} • {{ $post->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-medium">
                                {{ $post->user->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4 hidden md:table-cell">
                                @if($post->category)
                                    <x-dashboard.badge :type="$post->category->name" variant="category" />
                                @else
                                    <span class="text-xs text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400 hidden lg:table-cell whitespace-nowrap">
                                {{ $post->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('posts.edit', $post) }}" class="p-2 text-gray-400 hover:text-pens-cyan hover:bg-pens-cyan/10 rounded-lg transition-all" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <button @click="deleteModal = true; deleteTarget = '{{ addslashes($post->title) }}'; deleteId = {{ $post->id }}" class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-10 h-10 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                    <p class="text-sm text-gray-400 font-medium">Belum ada berita</p>
                                    <p class="text-xs text-gray-300">Klik "Tulis Berita" untuk membuat berita baru</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($posts->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $posts->appends(request()->query())->links() }}
            </div>
        @endif

        {{-- Delete Modal --}}
        <x-dashboard.modal id="deleteModal" title="Hapus Berita">
            <div class="text-center py-4">
                <div class="w-16 h-16 rounded-full bg-red-50 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <h4 class="text-lg font-bold text-pens-navy mb-2">Yakin ingin menghapus?</h4>
                <p class="text-sm text-gray-500">Berita "<span class="font-semibold" x-text="deleteTarget"></span>" akan dihapus secara permanen.</p>
            </div>
            <x-slot name="footer">
                <button @click="deleteModal = false" class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">Batal</button>
                <form :action="'{{ url('posts') }}/' + deleteId" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-xl transition-colors">Ya, Hapus</button>
                </form>
            </x-slot>
        </x-dashboard.modal>
    </div>
</div>
</x-dashboard-layout>
