@extends('admin.layout')

@section('title', 'Tulis Berita Baru')
@section('header_title', 'Tulis Berita / Artikel Baru')

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
        <h2 class="text-xl font-black text-gray-900 mb-6">Formulir Publikasi Berita</h2>

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="newsForm">
            @csrf

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Judul Artikel / Berita <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Prestasi Siswa Wikrama Menjuarai Lomba IT Tingkat Provinsi" 
                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kategori</label>
                    <input type="text" name="category" value="{{ old('category', 'Berita') }}" placeholder="Berita, Prestasi, Pengumuman" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Penulis / Humas</label>
                    <input type="text" name="author" value="{{ old('author', 'Humas Wikrama') }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Tanggal Terbit</label>
                    <input type="date" name="published_at" value="{{ old('published_at', date('Y-m-d')) }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Ringkasan / Cuplikan Singkat</label>
                    <input type="text" name="excerpt" value="{{ old('excerpt') }}" placeholder="Cuplikan singkat yang tampil pada kartu berita..." 
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
                <textarea name="content" id="article_content_input" class="hidden" required>{{ old('content') }}</textarea>
                <div id="quill-editor" class="bg-white">
                    {!! old('content') !!}
                </div>
            </div>

            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4">
                <h3 class="font-bold text-sm text-gray-800 flex items-center gap-2">
                    <i class="ri-image-line text-wikrama-blue"></i> Gambar Cover Berita
                </h3>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">URL / Path Gambar Cover</label>
                    <input type="text" name="image_url" value="{{ old('image_url') }}" placeholder="https://... atau /assets/images/foto.jpg" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white">
                </div>
                <div class="text-center text-xs font-bold text-gray-400">--- ATAU UNGGAH DARI KOMPUTER ---</div>
                <div>
                    <input type="file" name="image_file" accept="image/*" 
                           class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-wikrama-blue file:text-white hover:file:bg-wikrama-dark file:cursor-pointer transition">
                </div>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }} 
                       class="w-5 h-5 text-wikrama-blue rounded border-gray-300 focus:ring-wikrama-blue">
                <label for="is_published" class="text-sm font-bold text-gray-800 cursor-pointer">
                    Publikasikan Berita Sekarang
                </label>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('admin.news.index') }}" class="px-5 py-3 border border-gray-300 text-gray-700 font-bold rounded-xl text-xs uppercase tracking-wider hover:bg-gray-50 transition">Batal</a>
                <button type="submit" class="px-6 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-xl text-xs uppercase tracking-wider shadow-lg transition flex items-center gap-2">
                    <i class="ri-send-plane-line text-base"></i> Simpan &amp; Terbitkan
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

        const form = document.getElementById('newsForm');
        form.addEventListener('submit', function() {
            document.getElementById('article_content_input').value = quill.root.innerHTML;
        });
    });
</script>
@endpush
