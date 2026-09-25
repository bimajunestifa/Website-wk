@extends('admin.layout')

@section('title', 'Edit Berita')
@section('header_title', 'Edit Berita / Artikel')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
<style>
    .ql-toolbar.ql-snow {
        border-top-left-radius: 14px;
        border-top-right-radius: 14px;
        border-color: #E2E8F0;
        background: #F8FAFC;
        padding: 12px 14px;
    }
    .ql-container.ql-snow {
        border-bottom-left-radius: 14px;
        border-bottom-right-radius: 14px;
        border-color: #E2E8F0;
        min-height: 320px;
        font-family: inherit;
        font-size: 0.95rem;
    }
    .ql-editor {
        min-height: 320px;
        line-height: 1.8;
        color: #334155;
    }
    .ql-editor p {
        margin-bottom: 0.85rem;
    }
    .ql-editor h2, .ql-editor h3 {
        color: #1F3984;
        font-weight: 800;
        margin-top: 1rem;
        margin-bottom: 0.5rem;
    }
</style>
@endpush

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <a href="{{ route('admin.news.index') }}" class="text-xs font-bold text-gray-500 hover:text-wikrama-blue flex items-center gap-1">
        <i class="ri-arrow-left-line"></i> Kembali ke Daftar Berita
    </a>

    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3 mb-6">
            <div>
                <h2 class="text-xl font-black text-gray-900">Edit Berita</h2>
                <p class="text-xs text-gray-500 mt-1 line-clamp-1">{{ $news->title }}</p>
            </div>
            <a href="{{ route('news.detail', $news->slug ?: $news->id) }}" target="_blank" class="px-4 py-2 bg-emerald-50 text-emerald-700 hover:bg-emerald-600 hover:text-white rounded-xl text-xs font-bold transition flex items-center gap-1.5 shrink-0">
                <i class="ri-external-link-line"></i> Lihat Live di Web
            </a>
        </div>

        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="editNewsForm">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Judul Artikel / Berita <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $news->title) }}" required 
                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kategori</label>
                    <input type="text" name="category" value="{{ old('category', $news->category) }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Penulis / Humas</label>
                    <input type="text" name="author" value="{{ old('author', $news->author) }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Tanggal Terbit</label>
                    <input type="date" name="published_at" value="{{ old('published_at', $news->published_at ? \Carbon\Carbon::parse($news->published_at)->format('Y-m-d') : date('Y-m-d')) }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Ringkasan / Cuplikan Singkat</label>
                    <input type="text" name="excerpt" value="{{ old('excerpt', $news->excerpt) }}" placeholder="Cuplikan singkat yang tampil pada kartu berita..." 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
            </div>

            <!-- Rich Text Editor (Quill) untuk Tulisan Rapi & Estetik -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                        Isi Konten Berita <span class="text-red-500">*</span>
                    </label>
                    <span class="text-[11px] text-gray-500">Gunakan toolbar untuk sub-judul, teks tebal, &amp; poin list</span>
                </div>
                <textarea name="content" id="article_content_input" class="hidden" required>{{ old('content', $news->content) }}</textarea>
                <div id="quill-editor" class="bg-white">
                    {!! old('content', $news->formatted_content ?: $news->content) !!}
                </div>
            </div>

            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4">
                <h3 class="font-bold text-sm text-gray-800 flex items-center gap-2">
                    <i class="ri-image-line text-wikrama-blue"></i> Gambar Cover Berita
                </h3>

                @if($news->image_url)
                    <div class="flex items-center gap-4 p-3 bg-white rounded-xl border border-gray-200">
                        <img src="{{ asset($news->image_url) }}" alt="{{ $news->title }}" class="w-32 h-20 object-cover rounded-lg">
                        <div class="text-xs text-gray-500 break-all">{{ $news->image_url }}</div>
                    </div>
                @endif

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Ubah URL / Path Cover</label>
                    <input type="text" name="image_url" value="{{ old('image_url', $news->image_url) }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white">
                </div>
                <div class="text-center text-xs font-bold text-gray-400">--- ATAU GANTI DENGAN UNGGAH FILE BARU ---</div>
                <div>
                    <input type="file" name="image_file" accept="image/*" 
                           class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-wikrama-blue file:text-white hover:file:bg-wikrama-dark file:cursor-pointer transition">
                </div>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $news->is_published) ? 'checked' : '' }} 
                       class="w-5 h-5 text-wikrama-blue rounded border-gray-300 focus:ring-wikrama-blue">
                <label for="is_published" class="text-sm font-bold text-gray-800 cursor-pointer">
                    Publikasikan Berita
                </label>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('admin.news.index') }}" class="px-5 py-3 border border-gray-300 text-gray-700 font-bold rounded-xl text-xs uppercase tracking-wider hover:bg-gray-50 transition">Batal</a>
                <button type="submit" class="px-6 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-xl text-xs uppercase tracking-wider shadow-lg transition flex items-center gap-2">
                    <i class="ri-check-line text-base"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const quill = new Quill('#quill-editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [2, 3, 4, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['blockquote'],
                    [{ 'align': [] }],
                    ['link', 'clean']
                ]
            },
            placeholder: 'Tuliskan isi berita di sini... Buat paragraf, sub-judul, atau daftar poin kegiatan agar rapi dan estetik.'
        });

        const form = document.getElementById('editNewsForm');
        form.addEventListener('submit', function() {
            document.getElementById('article_content_input').value = quill.root.innerHTML;
        });
    });
</script>
@endpush
