<x-dashboard-layout :role="'admin'" :pageTitle="'Kelola Berita'" :title="'Kelola Berita'">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <x-dashboard.section-header title="Daftar Berita" />

        <a href="/dashboard/posts/create" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-semibold text-sm rounded-xl hover:shadow-lg hover:bg-blue-700 transition-all duration-300 hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tulis Berita
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 mb-6" x-data="{ status: 'all', category: 'all' }">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1">
                <div class="flex items-center gap-2 bg-gray-50 rounded-xl px-4 py-2.5 border border-gray-100">
                    <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" placeholder="Cari judul berita..." class="bg-transparent border-none text-sm text-gray-600 placeholder-gray-400 focus:ring-0 focus:outline-none w-full p-0">
                </div>
            </div>
            <select x-model="category" class="pl-4 pr-10 py-2.5 bg-gray-50 border border-gray-100 rounded-xl text-sm text-gray-600 focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan">
                <option value="all">Semua Kategori</option>
                <option value="akademik">Akademik</option>
                <option value="teknologi">Teknologi</option>
                <option value="kemahasiswaan">Kemahasiswaan</option>
                <option value="prestasi">Prestasi</option>
                <option value="penelitian">Penelitian</option>
                <option value="pengumuman">Pengumuman</option>
            </select>
        </div>
    </div>

    {{-- Posts Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden" x-data="{ deleteModal: false, deleteTarget: '' }">
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
                    @php
                        $posts = [
                            ['title' => 'PENS Raih Akreditasi Unggul dari BAN-PT', 'slug' => 'pens-raih-akreditasi-unggul', 'category' => 'Akademik', 'status' => 'published', 'date' => '30 Apr 2026', 'author' => 'Ahmad Fauzi', 'thumb' => 'https://picsum.photos/seed/post1/80/56'],
                            ['title' => 'Workshop IoT Bersama Mahasiswa Teknik Elektronika', 'slug' => 'workshop-iot-mahasiswa', 'category' => 'Teknologi', 'status' => 'published', 'date' => '29 Apr 2026', 'author' => 'Ahmad Fauzi', 'thumb' => 'https://picsum.photos/seed/post2/80/56'],
                            ['title' => 'Tim Robotik PENS Juara 1 Kontes Robot Indonesia', 'slug' => 'tim-robotik-juara-kri', 'category' => 'Prestasi', 'status' => 'published', 'date' => '28 Apr 2026', 'author' => 'Siti Nurhaliza', 'thumb' => 'https://picsum.photos/seed/post3/80/56'],
                            ['title' => 'Dosen PENS Publikasi Jurnal di IEEE Access', 'slug' => 'dosen-publikasi-ieee', 'category' => 'Penelitian', 'status' => 'published', 'date' => '27 Apr 2026', 'author' => 'Budi Santoso', 'thumb' => 'https://picsum.photos/seed/post5/80/56'],
                            ['title' => 'Seminar Nasional Teknologi Informasi 2026', 'slug' => 'seminar-nasional-ti', 'category' => 'Kegiatan', 'status' => 'published', 'date' => '26 Apr 2026', 'author' => 'Ahmad Fauzi', 'thumb' => 'https://picsum.photos/seed/post6/80/56'],
                            ['title' => 'Kerjasama PENS dengan Industri Jepang', 'slug' => 'kerjasama-industri-jepang', 'category' => 'Akademik', 'status' => 'archived', 'date' => '25 Apr 2026', 'author' => 'Siti Nurhaliza', 'thumb' => 'https://picsum.photos/seed/post7/80/56'],
                            ['title' => 'Program Pertukaran Mahasiswa ke Korea Selatan', 'slug' => 'pertukaran-mahasiswa-korea', 'category' => 'Kemahasiswaan', 'status' => 'published', 'date' => '23 Apr 2026', 'author' => 'Ahmad Fauzi', 'thumb' => 'https://picsum.photos/seed/post9/80/56'],
                            ['title' => 'Pengabdian Masyarakat: Pelatihan Digital di Desa', 'slug' => 'pengabdian-pelatihan-digital', 'category' => 'Pengabdian', 'status' => 'published', 'date' => '22 Apr 2026', 'author' => 'Siti Nurhaliza', 'thumb' => 'https://picsum.photos/seed/post10/80/56'],
                        ];
                    @endphp

                    @foreach($posts as $post)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <img src="{{ $post['thumb'] }}" alt="" class="w-16 h-11 rounded-lg object-cover flex-shrink-0 hidden sm:block ring-1 ring-gray-100">
                                    <div class="min-w-0">
                                        <p class="text-sm font-semibold text-pens-navy truncate max-w-xs group-hover:text-pens-cyan transition-colors">{{ $post['title'] }}</p>
                                        <p class="text-xs text-gray-400 sm:hidden mt-0.5">{{ $post['category'] }} • {{ $post['date'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 font-medium">
                                {{ $post['author'] }}
                            </td>
                            <td class="px-6 py-4 hidden md:table-cell">
                                <x-dashboard.badge :type="$post['category']" variant="category" />
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-400 hidden lg:table-cell whitespace-nowrap">
                                {{ $post['date'] }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="/dashboard/posts/create" class="p-2 text-gray-400 hover:text-pens-cyan hover:bg-pens-cyan/10 rounded-lg transition-all" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <button @click="deleteModal = true; deleteTarget = '{{ $post['title'] }}'" class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="px-6 py-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-sm text-gray-400">Menampilkan <span class="font-semibold text-gray-700">1-8</span> dari <span class="font-semibold text-gray-700">32</span> berita</p>
            <div class="flex items-center gap-1">
                <button class="px-3 py-1.5 text-sm text-gray-400 bg-gray-50 rounded-lg cursor-not-allowed" disabled>Prev</button>
                <button class="px-3 py-1.5 text-sm text-white bg-pens-cyan rounded-lg font-semibold">1</button>
                <button class="px-3 py-1.5 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">2</button>
                <button class="px-3 py-1.5 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">3</button>
                <span class="px-2 text-gray-400">...</span>
                <button class="px-3 py-1.5 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">5</button>
                <button class="px-3 py-1.5 text-sm text-gray-600 hover:bg-gray-50 rounded-lg">Next</button>
            </div>
        </div>

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
                <button @click="deleteModal = false" class="px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-xl transition-colors">Ya, Hapus</button>
            </x-slot>
        </x-dashboard.modal>
    </div>

</x-dashboard-layout>
