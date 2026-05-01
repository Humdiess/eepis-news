<x-dashboard-layout :role="'admin'" :pageTitle="'Tulis Berita'" :title="'Tulis Berita'">
<div x-data="{
    title: '', slug: '', excerpt: '', category: '', status: 'published',
    thumbnailPreview: null,
    generateSlug() {
        this.slug = this.title.toLowerCase().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-').trim();
    },
    handleThumbnail(e) {
        const f = e.target.files[0];
        if (f) { const r = new FileReader(); r.onload = (ev) => { this.thumbnailPreview = ev.target.result; }; r.readAsDataURL(f); }
    },
    removeThumbnail() { this.thumbnailPreview = null; },
    formatText(cmd) { document.execCommand(cmd, false, null); }
}">
    {{-- Header --}}
    <div class="flex items-center gap-4 mb-6">
        <a href="/dashboard/posts" class="p-2 text-gray-400 hover:text-pens-navy hover:bg-gray-100 rounded-xl transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <x-dashboard.section-header title="Tulis Berita Baru" />
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Main --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Title & Slug --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-pens-navy mb-2">Judul Berita <span class="text-red-400">*</span></label>
                    <input type="text" x-model="title" @input="generateSlug()" placeholder="Masukkan judul berita..." class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan focus:bg-white transition-all">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-pens-navy mb-2">Slug</label>
                    <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl">
                        <span class="text-xs text-gray-400 flex-shrink-0">eepis.news/</span>
                        <input type="text" x-model="slug" class="bg-transparent border-none text-sm text-gray-600 focus:ring-0 w-full p-0" placeholder="auto-generated-slug">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-pens-navy mb-2">Ringkasan</label>
                    <textarea x-model="excerpt" rows="3" placeholder="Tulis ringkasan singkat berita..." class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan focus:bg-white transition-all resize-none"></textarea>
                    <p class="text-xs text-gray-400 mt-1">Maks. 160 karakter untuk SEO</p>
                </div>
            </div>

            {{-- Rich Text --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <label class="block text-sm font-semibold text-pens-navy mb-3">Konten Berita <span class="text-red-400">*</span></label>
                {{-- Toolbar --}}
                <div class="flex items-center gap-1 p-2 bg-gray-50 border border-gray-200 rounded-t-xl border-b-0 flex-wrap">
                    <button @click="formatText('bold')" type="button" class="p-2 text-gray-500 hover:text-pens-navy hover:bg-white rounded-lg transition-all" title="Bold">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M6 4h8a4 4 0 014 4 4 4 0 01-4 4H6zm0 8h9a4 4 0 014 4 4 4 0 01-4 4H6z"/></svg>
                    </button>
                    <button @click="formatText('italic')" type="button" class="p-2 text-gray-500 hover:text-pens-navy hover:bg-white rounded-lg transition-all" title="Italic">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="4" x2="10" y2="4"/><line x1="14" y1="20" x2="5" y2="20"/><line x1="15" y1="4" x2="9" y2="20"/></svg>
                    </button>
                    <button @click="formatText('underline')" type="button" class="p-2 text-gray-500 hover:text-pens-navy hover:bg-white rounded-lg transition-all" title="Underline">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 3v7a6 6 0 006 6 6 6 0 006-6V3"/><line x1="4" y1="21" x2="20" y2="21"/></svg>
                    </button>
                    <div class="w-px h-6 bg-gray-200 mx-1"></div>
                    <button @click="formatText('insertUnorderedList')" type="button" class="p-2 text-gray-500 hover:text-pens-navy hover:bg-white rounded-lg transition-all" title="Bullet List">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="9" y1="6" x2="20" y2="6"/><line x1="9" y1="12" x2="20" y2="12"/><line x1="9" y1="18" x2="20" y2="18"/><circle cx="5" cy="6" r="1.5" fill="currentColor"/><circle cx="5" cy="12" r="1.5" fill="currentColor"/><circle cx="5" cy="18" r="1.5" fill="currentColor"/></svg>
                    </button>
                    <button @click="formatText('insertOrderedList')" type="button" class="p-2 text-gray-500 hover:text-pens-navy hover:bg-white rounded-lg transition-all" title="Numbered List">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="10" y1="6" x2="21" y2="6"/><line x1="10" y1="12" x2="21" y2="12"/><line x1="10" y1="18" x2="21" y2="18"/></svg>
                    </button>
                    <div class="w-px h-6 bg-gray-200 mx-1"></div>
                    <select @change="document.execCommand('formatBlock', false, $event.target.value); $event.target.value = ''" class="px-2 py-1.5 text-xs bg-white border border-gray-200 rounded-lg text-gray-600 focus:ring-0">
                        <option value="">Heading</option>
                        <option value="h2">Heading 2</option>
                        <option value="h3">Heading 3</option>
                        <option value="p">Paragraph</option>
                    </select>
                </div>
                <div contenteditable="true" class="w-full min-h-[320px] px-4 py-4 bg-white border border-gray-200 rounded-b-xl text-sm text-gray-700 focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan outline-none" style="line-height:1.8;"></div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            {{-- Publish --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-sm font-bold text-pens-navy mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-pens-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Pengaturan
                </h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Status</label>
                        <select x-model="status" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan">
                            <option value="published">Published</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Kategori</label>
                        <select x-model="category" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan">
                            <option value="">Pilih kategori</option>
                            <option value="akademik">Akademik</option>
                            <option value="teknologi">Teknologi</option>
                            <option value="kemahasiswaan">Kemahasiswaan</option>
                            <option value="prestasi">Prestasi</option>
                            <option value="penelitian">Penelitian</option>
                            <option value="pengabdian">Pengabdian</option>
                            <option value="kegiatan">Kegiatan</option>
                            <option value="pengumuman">Pengumuman</option>
                        </select>
                    </div>
                </div>
                <div class="mt-6 pt-5 border-t border-gray-100">
                    <button class="w-full px-4 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:shadow-lg hover:bg-blue-700 transition-all hover:-translate-y-0.5">Simpan Berita</button>
                </div>
            </div>

            {{-- Thumbnail --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-sm font-bold text-pens-navy mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-pens-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Gambar Thumbnail
                </h3>
                <div class="relative">
                    <template x-if="thumbnailPreview">
                        <div class="relative rounded-xl overflow-hidden">
                            <img :src="thumbnailPreview" class="w-full h-48 object-cover rounded-xl">
                            <button @click="removeThumbnail()" class="absolute top-2 right-2 p-1.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors shadow-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    </template>
                    <template x-if="!thumbnailPreview">
                        <label class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-gray-200 rounded-xl cursor-pointer hover:border-pens-cyan hover:bg-pens-cyan/5 transition-all group">
                            <div class="w-12 h-12 rounded-xl bg-gray-100 group-hover:bg-pens-cyan/10 flex items-center justify-center mb-3 transition-colors">
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-pens-cyan transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                            </div>
                            <p class="text-sm text-gray-500 group-hover:text-pens-cyan font-medium">Klik untuk upload</p>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG maks. 2MB</p>
                            <input type="file" class="hidden" accept="image/*" @change="handleThumbnail($event)">
                        </label>
                    </template>
                </div>
            </div>

            {{-- SEO Preview --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-sm font-bold text-pens-navy mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-pens-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Preview SEO
                </h3>
                <div class="bg-gray-50 rounded-xl p-4">
                    <p class="text-blue-700 text-sm font-medium truncate" x-text="title || 'Judul berita akan muncul di sini'"></p>
                    <p class="text-green-700 text-xs mt-1 truncate">eepis.news/<span x-text="slug || 'slug-berita'"></span></p>
                    <p class="text-gray-500 text-xs mt-1 line-clamp-2" x-text="excerpt || 'Ringkasan berita akan muncul di sini...'"></p>
                </div>
            </div>
        </div>
    </div>
</div>
</x-dashboard-layout>
