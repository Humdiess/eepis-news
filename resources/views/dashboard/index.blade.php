<x-dashboard-layout :role="'admin'" :pageTitle="'Dashboard'" :title="'Dashboard'">

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-8">
        <x-dashboard.stat-card
            title="Total Berita"
            :value="$totalPosts"
            icon="document"
            color="cyan"
        />
        <x-dashboard.stat-card
            title="Total Kategori"
            :value="$totalCategories"
            icon="check"
            color="green"
        />
    </div>

    {{-- Recent Posts --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
        <div class="p-6 pb-0">
            <x-dashboard.section-header title="Berita Terbaru" :action="true" actionUrl="/dashboard/posts" actionLabel="Lihat Semua" />
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-3">Berita</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-3 hidden sm:table-cell">Kategori</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-3 hidden md:table-cell">Penulis</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-3 hidden lg:table-cell">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($recentPosts as $post)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($post->thumbnail)
                                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="w-14 h-10 rounded-lg object-cover flex-shrink-0 hidden sm:block ring-1 ring-gray-100">
                                    @else
                                        <div class="w-14 h-10 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 flex-shrink-0 hidden sm:flex items-center justify-center ring-1 ring-gray-100">
                                            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                    <div class="min-w-0">
                                        <p class="text-sm font-semibold text-pens-navy truncate max-w-xs">{{ $post->title }}</p>
                                        <p class="text-xs text-gray-400 sm:hidden mt-0.5">{{ $post->category->name ?? '-' }} • {{ $post->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 hidden sm:table-cell">
                                @if($post->category)
                                    <x-dashboard.badge :type="$post->category->name" variant="category" />
                                @else
                                    <span class="text-xs text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 hidden md:table-cell text-sm text-gray-600 font-medium">
                                {{ $post->user->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400 hidden lg:table-cell">
                                {{ $post->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center">
                                <p class="text-sm text-gray-400">Belum ada berita</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-dashboard-layout>
