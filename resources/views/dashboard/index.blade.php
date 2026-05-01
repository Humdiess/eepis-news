<x-dashboard-layout :role="'admin'" :pageTitle="'Dashboard'" :title="'Dashboard'">

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-8">
        <x-dashboard.stat-card
            title="Total Berita"
            value="48"
            icon="document"
            color="cyan"
            :trend="12"
            trendLabel="dari bulan lalu"
        />
        <x-dashboard.stat-card
            title="Published"
            value="32"
            icon="check"
            color="green"
            :trend="8"
            trendLabel="dari bulan lalu"
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
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-3 hidden md:table-cell">Status</th>
                        <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-3 hidden lg:table-cell">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @php
                        $recentPosts = [
                            ['title' => 'PENS Raih Akreditasi Unggul dari BAN-PT', 'category' => 'Akademik', 'status' => 'published', 'date' => '30 Apr 2026', 'thumb' => 'https://picsum.photos/seed/pens1/80/56'],
                            ['title' => 'Workshop IoT Bersama Mahasiswa Teknik Elektronika', 'category' => 'Teknologi', 'status' => 'published', 'date' => '29 Apr 2026', 'thumb' => 'https://picsum.photos/seed/pens2/80/56'],
                            ['title' => 'Tim Robotik PENS Juara 1 Kontes Nasional', 'category' => 'Prestasi', 'status' => 'published', 'date' => '28 Apr 2026', 'thumb' => 'https://picsum.photos/seed/pens3/80/56'],
                            ['title' => 'Dosen PENS Publikasi Jurnal di IEEE Access', 'category' => 'Penelitian', 'status' => 'published', 'date' => '27 Apr 2026', 'thumb' => 'https://picsum.photos/seed/pens5/80/56'],
                        ];
                    @endphp

                    @foreach($recentPosts as $post)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $post['thumb'] }}" alt="" class="w-14 h-10 rounded-lg object-cover flex-shrink-0 hidden sm:block">
                                    <div class="min-w-0">
                                        <p class="text-sm font-semibold text-pens-navy truncate max-w-xs">{{ $post['title'] }}</p>
                                        <p class="text-xs text-gray-400 sm:hidden mt-0.5">{{ $post['category'] }} • {{ $post['date'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 hidden sm:table-cell">
                                <x-dashboard.badge :type="$post['category']" variant="category" />
                            </td>
                            <td class="px-6 py-4 hidden md:table-cell">
                                <x-dashboard.badge :type="$post['status']" variant="status" />
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400 hidden lg:table-cell">
                                {{ $post['date'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



</x-dashboard-layout>
