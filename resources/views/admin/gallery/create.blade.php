@extends('admin.layout')

@section('title', 'Upload Foto Galeri')
@section('header_title', 'Upload Foto Galeri Baru')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
            <div>
                <h2 class="text-lg font-bold text-gray-800">Upload Foto Media</h2>
                <p class="text-xs text-gray-500">Tambahkan dokumentasi foto kegiatan, fasilitas, atau suasana kampus SMK Wikrama 1 Garut.</p>
            </div>
            <a href="{{ route('admin.gallery.index') }}" class="text-xs font-semibold text-gray-500 hover:text-gray-800 flex items-center gap-1">
                <i class="ri-arrow-left-line"></i> Kembali
            </a>
        </div>

        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="space-y-6">
                <!-- Judul Foto -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Judul Foto / Dokumentasi <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Praktik Laboratorium Jaringan Komputer"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kategori -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Kategori Foto <span class="text-red-500">*</span></label>
                        <select name="category" required class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                            <option value="Kegiatan Siswa" {{ old('category') == 'Kegiatan Siswa' ? 'selected' : '' }}>Kegiatan Siswa</option>
                            <option value="Fasilitas" {{ old('category') == 'Fasilitas' ? 'selected' : '' }}>Fasilitas & Lab</option>
                            <option value="Gedung" {{ old('category') == 'Gedung' ? 'selected' : '' }}>Gedung & Kampus</option>
                            <option value="Budaya & Karakter" {{ old('category') == 'Budaya & Karakter' ? 'selected' : '' }}>Budaya & Karakter</option>
                            <option value="Prestasi" {{ old('category') == 'Prestasi' ? 'selected' : '' }}>Prestasi & Piagam</option>
                        </select>
                    </div>

                    <!-- Urutan -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Nomor Urutan</label>
                        <input type="number" name="order" value="{{ old('order', 0) }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                    </div>
                </div>

                <!-- Upload File Foto -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Unggah File Foto</label>
                    <input type="file" name="image_file" accept="image/*"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-xl file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-wikrama-blue hover:file:bg-blue-100">
                    <p class="text-[11px] text-gray-400 mt-1">Format: JPG, JPEG, PNG, WebP (Maksimal 5MB)</p>
                </div>

                <!-- URL Foto Alternatif -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Atau URL Gambar Lokal/Eksternal</label>
                    <input type="text" name="image_url" value="{{ old('image_url') }}" placeholder="/assets/images/..."
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                </div>

                <!-- Keterangan / Caption -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Keterangan / Caption</label>
                    <textarea name="caption" rows="3" placeholder="Tuliskan keterangan singkat mengenai foto ini..."
                              class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">{{ old('caption') }}</textarea>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.gallery.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold text-gray-600 hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-sm font-semibold shadow-sm transition">
                    Simpan Foto
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

