<x-dashboard-layout :role="'admin'" :pageTitle="'Kelola Kategori'" :title="'Kategori'">
<div x-data="{
    showForm: false, editMode: false, deleteModal: false, deleteTarget: '',
    form: { name: '', slug: '' },
    generateSlug() {
        this.form.slug = this.form.name.toLowerCase().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-').trim();
    },
    openCreate() { this.editMode = false; this.form = { name: '', slug: '' }; this.showForm = true; },
    openEdit(c) { this.editMode = true; this.form = { name: c.name, slug: c.slug }; this.showForm = true; }
}">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <x-dashboard.section-header title="Kelola Kategori" />
        <button @click="openCreate()" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-semibold text-sm rounded-xl hover:shadow-lg hover:bg-blue-700 transition-all hover:-translate-y-0.5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Kategori
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Category List --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50/50 border-b border-gray-100">
                                <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Kategori</th>
                                <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden sm:table-cell">Slug</th>
                                <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden md:table-cell">Jumlah Berita</th>
                                <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4 hidden lg:table-cell">Dibuat</th>
                                <th class="text-right text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @php
                                $categories = [
                                    ['name' => 'Akademik', 'slug' => 'akademik', 'posts' => 12, 'date' => '1 Jan 2025', 'color' => 'bg-blue-500'],
                                    ['name' => 'Teknologi', 'slug' => 'teknologi', 'posts' => 9, 'date' => '1 Jan 2025', 'color' => 'bg-violet-500'],
                                    ['name' => 'Kemahasiswaan', 'slug' => 'kemahasiswaan', 'posts' => 7, 'date' => '1 Jan 2025', 'color' => 'bg-emerald-500'],
                                    ['name' => 'Prestasi', 'slug' => 'prestasi', 'posts' => 8, 'date' => '1 Jan 2025', 'color' => 'bg-amber-500'],
                                    ['name' => 'Penelitian', 'slug' => 'penelitian', 'posts' => 5, 'date' => '15 Feb 2025', 'color' => 'bg-rose-500'],
                                    ['name' => 'Pengabdian', 'slug' => 'pengabdian', 'posts' => 3, 'date' => '15 Feb 2025', 'color' => 'bg-teal-500'],
                                    ['name' => 'Kegiatan', 'slug' => 'kegiatan', 'posts' => 4, 'date' => '20 Mar 2025', 'color' => 'bg-orange-500'],
                                    ['name' => 'Pengumuman', 'slug' => 'pengumuman', 'posts' => 6, 'date' => '20 Mar 2025', 'color' => 'bg-red-500'],
                                ];
                            @endphp

                            @foreach($categories as $cat)
                                <tr class="hover:bg-gray-50/50 transition-colors group">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-3 h-3 rounded-full {{ $cat['color'] }} flex-shrink-0"></div>
                                            <span class="text-sm font-semibold text-pens-navy">{{ $cat['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 hidden sm:table-cell">
                                        <code class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-md">{{ $cat['slug'] }}</code>
                                    </td>
                                    <td class="px-6 py-4 hidden md:table-cell">
                                        <span class="text-sm font-semibold text-pens-navy">{{ $cat['posts'] }}</span>
                                        <span class="text-xs text-gray-400">berita</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-400 hidden lg:table-cell whitespace-nowrap">{{ $cat['date'] }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-end gap-1">
                                            <button @click="openEdit({ name: '{{ $cat['name'] }}', slug: '{{ $cat['slug'] }}' })" class="p-2 text-gray-400 hover:text-pens-cyan hover:bg-pens-cyan/10 rounded-lg transition-all" title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            </button>
                                            <button @click="deleteModal = true; deleteTarget = '{{ $cat['name'] }}'" class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all" title="Hapus">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Add/Edit Form Card --}}
        <div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-24" x-show="showForm" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-sm font-bold text-pens-navy" x-text="editMode ? 'Edit Kategori' : 'Tambah Kategori'"></h3>
                    <button @click="showForm = false" class="text-gray-400 hover:text-gray-600 p-1 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Nama Kategori</label>
                        <input type="text" x-model="form.name" @input="generateSlug()" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan" placeholder="Nama kategori">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Slug</label>
                        <input type="text" x-model="form.slug" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan" placeholder="auto-generated">
                    </div>
                    <button @click="showForm = false" class="w-full px-4 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:shadow-lg hover:bg-blue-700 transition-all" x-text="editMode ? 'Simpan Perubahan' : 'Tambah Kategori'"></button>
                </div>
            </div>

            {{-- Placeholder when form is closed --}}
            <div x-show="!showForm" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="text-center py-8">
                    <div class="w-16 h-16 rounded-2xl bg-gray-100 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    </div>
                    <p class="text-sm text-gray-400 font-medium">Pilih kategori untuk diedit</p>
                    <p class="text-xs text-gray-300 mt-1">atau tambah kategori baru</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <x-dashboard.modal id="deleteModal" title="Hapus Kategori">
        <div class="text-center py-4">
            <div class="w-16 h-16 rounded-full bg-red-50 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
            </div>
            <h4 class="text-lg font-bold text-pens-navy mb-2">Yakin ingin menghapus?</h4>
            <p class="text-sm text-gray-500">Kategori "<span class="font-semibold" x-text="deleteTarget"></span>" dan semua berita terkait akan terpengaruh.</p>
        </div>
        <x-slot name="footer">
            <button @click="deleteModal = false" class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-colors">Batal</button>
            <button @click="deleteModal = false" class="px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-xl transition-colors">Ya, Hapus</button>
        </x-slot>
    </x-dashboard.modal>
</div>
</x-dashboard-layout>
