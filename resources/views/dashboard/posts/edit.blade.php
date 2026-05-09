<x-dashboard-layout :role="'admin'" :pageTitle="'Edit Berita'" :title="'Edit Berita'">
<div x-data="{
    title: '{{ addslashes($post->title) }}',
    slug: '{{ $post->slug }}',
    video: '{{ $post->video }}',
    thumbnailPreview: {{ $post->thumbnail ? "'" . asset('storage/' . $post->thumbnail) . "'" : 'null' }},
    generateSlug() {
        this.slug = this.title.toLowerCase().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-').trim();
    },
    handleThumbnail(e) {
        const f = e.target.files[0];
        if (f) { const r = new FileReader(); r.onload = (ev) => { this.thumbnailPreview = ev.target.result; }; r.readAsDataURL(f); }
    },
    removeThumbnail() { this.thumbnailPreview = null; this.$refs.thumbnailInput.value = ''; },
    submitForm() {
        document.getElementById('post-form').submit();
    }
}">

    <x-dashboard.flash-message />

    {{-- Header --}}
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('dashboard.posts.index') }}" class="p-2 text-gray-400 hover:text-pens-navy hover:bg-gray-100 rounded-xl transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <x-dashboard.section-header title="Edit Berita" />
    </div>

    <form id="post-form" action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Main --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Title & Slug --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-pens-navy mb-2">Judul Berita <span class="text-red-400">*</span></label>
                        <input type="text" name="title" x-model="title" @input="generateSlug()" placeholder="Masukkan judul berita..." class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan focus:bg-white transition-all">
                        @error('title')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-pens-navy mb-2">Slug</label>
                        <div class="flex items-center gap-2 px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl">
                            <span class="text-xs text-gray-400 flex-shrink-0">eepis.news/</span>
                            <input type="text" x-model="slug" readonly class="bg-transparent border-none text-sm text-gray-600 focus:ring-0 w-full p-0" placeholder="auto-generated-slug">
                        </div>
                    </div>
                </div>

                {{-- CKEditor Rich Text --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <label class="block text-sm font-semibold text-pens-navy mb-3">Konten Berita <span class="text-red-400">*</span></label>
                    <textarea name="content" id="editor">{!! $post->content !!}</textarea>
                    @error('content')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                {{-- Pengaturan --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-sm font-bold text-pens-navy mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-pens-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Pengaturan
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Kategori <span class="text-red-400">*</span></label>
                            <select name="category_id" class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan">
                                <option value="">Pilih kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Video YouTube (Opsional)</label>
                            <input type="url" name="video" x-model="video" placeholder="https://youtube.com/watch?v=..." class="w-full px-3 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-pens-cyan/30 focus:border-pens-cyan">
                            @error('video')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6 pt-5 border-t border-gray-100">
                        <button type="submit" class="w-full px-4 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-xl hover:shadow-lg hover:bg-blue-700 transition-all hover:-translate-y-0.5">Simpan Perubahan</button>
                    </div>
                </div>

                {{-- Thumbnail --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="text-sm font-bold text-pens-navy mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 text-pens-cyan" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Gambar Thumbnail
                    </h3>
                    <div class="relative">
                        <input type="file" name="thumbnail" x-ref="thumbnailInput" class="hidden" accept="image/*" @change="handleThumbnail($event)">
                        <div x-show="thumbnailPreview" class="relative rounded-xl overflow-hidden">
                            <img :src="thumbnailPreview" class="w-full h-48 object-cover rounded-xl">
                            <button type="button" @click="removeThumbnail()" class="absolute top-2 right-2 p-1.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors shadow-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div x-show="!thumbnailPreview" @click="$refs.thumbnailInput.click()" class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-gray-200 rounded-xl cursor-pointer hover:border-pens-cyan hover:bg-pens-cyan/5 transition-all group">
                            <div class="w-12 h-12 rounded-xl bg-gray-100 group-hover:bg-pens-cyan/10 flex items-center justify-center mb-3 transition-colors">
                                <svg class="w-6 h-6 text-gray-400 group-hover:text-pens-cyan transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                            </div>
                            <p class="text-sm text-gray-500 group-hover:text-pens-cyan font-medium">Klik untuk ganti thumbnail</p>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG, WebP maks. 2MB</p>
                        </div>
                    </div>
                    @error('thumbnail')
                        <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror
                    @if($post->thumbnail)
                        <p class="text-xs text-gray-400 mt-2">Kosongkan jika tidak ingin mengganti thumbnail.</p>
                    @endif
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
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('styles')
<style>
    .ck-editor__editable {
        min-height: 400px !important;
        font-family: 'Outfit', sans-serif !important;
        font-size: 15px !important;
        line-height: 1.8 !important;
        color: #374151 !important;
    }
    .ck-editor__editable:focus {
        border-color: #0EA5E9 !important;
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.15) !important;
    }
    .ck.ck-editor__main > .ck-editor__editable {
        border-radius: 0 0 12px 12px !important;
    }
    .ck.ck-toolbar {
        border-radius: 12px 12px 0 0 !important;
        background: #f9fafb !important;
        border-color: #e5e7eb !important;
    }
    .ck.ck-editor {
        border-radius: 12px !important;
    }
    .ck.ck-editor__editable_inline {
        border-color: #e5e7eb !important;
    }
    .ck-content h2 { font-size: 1.5em; font-weight: 700; margin-top: 1.5em; margin-bottom: 0.5em; }
    .ck-content h3 { font-size: 1.25em; font-weight: 600; margin-top: 1.25em; margin-bottom: 0.5em; }
    .ck-content blockquote {
        border-left: 3px solid #0EA5E9;
        padding-left: 1rem;
        color: #6b7280;
        font-style: italic;
    }
    .ck-content img { border-radius: 12px; margin: 1em 0; }
    .ck-content figure.image { margin: 1.5em 0; }
    .ck-content figure.image figcaption { font-size: 0.85em; color: #9ca3af; text-align: center; margin-top: 0.5em; }
    .ck-content ol, .ck-content ul {
        padding-left: 2em !important;
    }
    .ck-content ol { list-style-type: decimal !important; }
    .ck-content ul { list-style-type: disc !important; }
    .ck-content li { padding-left: 0.25em; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>
<script>
    CKEDITOR.ClassicEditor.create(document.getElementById('editor'), {
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'fontSize', 'fontColor', '|',
                'alignment', '|',
                'bulletedList', 'numberedList', '|',
                'outdent', 'indent', '|',
                'blockQuote', 'insertTable', 'horizontalLine', '|',
                'link', 'uploadImage', 'mediaEmbed', '|',
                'undo', 'redo', '|',
                'removeFormat', 'sourceEditing'
            ],
            shouldNotGroupWhenFull: false
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
            ]
        },
        image: {
            toolbar: [
                'imageTextAlternative', 'toggleImageCaption',
                'imageStyle:inline', 'imageStyle:block', 'imageStyle:side',
                '|', 'linkImage'
            ],
            upload: {
                types: ['jpeg', 'png', 'gif', 'webp']
            }
        },
        table: {
            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
        },
        mediaEmbed: {
            previewsInData: true
        },
        simpleUpload: {
            uploadUrl: '{{ route("upload.image") }}',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        placeholder: 'Mulai menulis berita Anda di sini...',
        language: 'id',
        removePlugins: [
            'AIAssistant', 'CKBox', 'CKFinder', 'EasyImage',
            'RealTimeCollaborativeComments', 'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory', 'PresenceList', 'Comments', 'TrackChanges',
            'TrackChangesData', 'RevisionHistory', 'Pagination', 'WProofreader',
            'MathType', 'SlashCommand', 'Template', 'DocumentOutline', 'FormatPainter',
            'TableOfContents', 'PasteFromOfficeEnhanced', 'CaseChange',
            'MultiLevelList', 'ExportPdf', 'ExportWord', 'ImportWord',
        ],
    })
    .catch(error => {
        console.error('CKEditor init error:', error);
    });
</script>
@endpush
</x-dashboard-layout>
