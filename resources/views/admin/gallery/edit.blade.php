@extends('admin.layout')

@section('title', 'Edit Foto Galeri')
@section('header_title', 'Edit Foto Galeri Media')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
            <div>
                <h2 class="text-lg font-bold text-gray-800">Edit Foto: {{ $gallery->title }}</h2>
                <p class="text-xs text-gray-500">Perbarui judul, kategori, atau file foto dokumentasi.</p>
            </div>
            <a href="{{ route('admin.gallery.index') }}" class="text-xs font-semibold text-gray-500 hover:text-gray-800 flex items-center gap-1">
                <i class="ri-arrow-left-line"></i> Kembali
            </a>
        </div>

        <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Judul Foto -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Judul Foto / Dokumentasi <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $gallery->title) }}" required
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kategori -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Kategori Foto <span class="text-red-500">*</span></label>
                        <select name="category" required class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                            <option value="Kegiatan Siswa" {{ old('category', $gallery->category) == 'Kegiatan Siswa' ? 'selected' : '' }}>Kegiatan Siswa</option>
                            <option value="Fasilitas" {{ old('category', $gallery->category) == 'Fasilitas' ? 'selected' : '' }}>Fasilitas & Lab</option>
                            <option value="Gedung" {{ old('category', $gallery->category) == 'Gedung' ? 'selected' : '' }}>Gedung & Kampus</option>
                            <option value="Budaya & Karakter" {{ old('category', $gallery->category) == 'Budaya & Karakter' ? 'selected' : '' }}>Budaya & Karakter</option>
                            <option value="Prestasi" {{ old('category', $gallery->category) == 'Prestasi' ? 'selected' : '' }}>Prestasi & Piagam</option>
                        </select>
                    </div>

                    <!-- Urutan -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Nomor Urutan</label>
                        <input type="number" name="order" value="{{ old('order', $gallery->order) }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                    </div>
                </div>

                <!-- Preview Foto Saat Ini & Upload File Baru -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Foto Saat Ini</label>
                    <div class="mb-3 w-48 h-32 rounded-xl bg-gray-100 overflow-hidden border border-gray-200">
                        <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
                    </div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Ganti File Foto</label>
                    <input type="file" name="image_file" accept="image/*"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-xl file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-wikrama-blue hover:file:bg-blue-100">
                    <p class="text-[11px] text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengubah foto.</p>
                </div>

                <!-- URL Foto Alternatif -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Atau URL Gambar</label>
                    <input type="text" name="image_url" value="{{ old('image_url', $gallery->image_url) }}"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                </div>

                <!-- Keterangan / Caption -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Keterangan / Caption</label>
                    <textarea name="caption" rows="3"
                              class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">{{ old('caption', $gallery->caption) }}</textarea>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.gallery.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold text-gray-600 hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-sm font-semibold shadow-sm transition">
                    Perbarui Foto
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

