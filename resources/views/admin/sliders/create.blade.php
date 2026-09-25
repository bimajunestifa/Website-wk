@extends('admin.layout')

@section('title', 'Tambah Banner Slider')
@section('header_title', 'Tambah Banner Slider Baru')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.sliders.index') }}" class="text-xs font-bold text-gray-500 hover:text-wikrama-blue flex items-center gap-1">
            <i class="ri-arrow-left-line"></i> Kembali ke Daftar Banner
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-8">
        <h2 class="text-xl font-black text-gray-900 mb-6">Formulir Tambah Banner Hero Slider</h2>

        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Penempatan Type -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Penempatan Halaman <span class="text-red-500">*</span></label>
                <select name="type" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                    <option value="home" {{ old('type') == 'home' ? 'selected' : '' }}>Beranda Utama Website (/)</option>
                    <option value="spmb" {{ old('type') == 'spmb' ? 'selected' : '' }}>Landing Page SPMB (/spmb)</option>
                </select>
            </div>

            <!-- Title -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Judul Utama Banner <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: PPDB 2025/2026 Telah Dibuka!" 
                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
            </div>

            <!-- Subtitle -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Keterangan / Sub-Judul</label>
                <textarea name="subtitle" rows="3" placeholder="Tuliskan deskripsi singkat banner..." 
                          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">{{ old('subtitle') }}</textarea>
            </div>

            <!-- Image Options -->
            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4">
                <h3 class="font-bold text-sm text-gray-800 flex items-center gap-2">
                    <i class="ri-image-add-line text-wikrama-blue"></i> Sumber Gambar Banner
                </h3>
                <p class="text-xs text-gray-500">Anda dapat mengisi tautan langsung URL gambar resmi atau mengunggah file foto dari komputer.</p>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">URL Gambar (Opsional jika upload file)</label>
                    <input type="text" name="image_url" value="{{ old('image_url') }}" placeholder="/assets/images/... atau URL eksternal" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white">
                </div>

                <div class="text-center text-xs font-bold text-gray-400">--- ATAU UNGGAH FILE ---</div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Unggah File Foto (JPG/PNG/WEBP maks 5MB)</label>
                    <input type="file" name="image_file" accept="image/*" 
                           class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-wikrama-blue file:text-white hover:file:bg-wikrama-dark file:cursor-pointer transition">
                </div>
            </div>

            <!-- Button Config -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Teks Tombol (Opsional)</label>
                    <input type="text" name="button_text" value="{{ old('button_text', 'Daftar Sekarang') }}" placeholder="Contoh: Selengkapnya" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Tautan Tombol (URL)</label>
                    <input type="text" name="button_link" value="{{ old('button_link', '/spmb') }}" placeholder="Contoh: /spmb atau #kontak" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
            </div>

            <!-- Order & Active -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nomor Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', 1) }}" min="0" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                    <p class="text-[11px] text-gray-400 mt-1">Nilai lebih kecil akan tampil lebih awal di urutan carousel slider.</p>
                </div>

                <div class="flex items-center h-full pt-6">
                    <label class="relative flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-5 h-5 rounded text-wikrama-blue focus:ring-wikrama-blue border-gray-300">
                        <span class="text-sm font-bold text-gray-800">Aktifkan dan Tampilkan Banner</span>
                    </label>
                </div>
            </div>

            <!-- Actions -->
            <div class="pt-6 border-t border-gray-200 flex items-center justify-end gap-3">
                <a href="{{ route('admin.sliders.index') }}" class="px-6 py-3 rounded-xl border border-gray-300 text-gray-700 text-xs font-bold hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-7 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-md transition flex items-center gap-2">
                    <i class="ri-save-line text-base"></i> Simpan Banner
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
