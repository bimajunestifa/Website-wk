@extends('admin.layout')

@section('title', 'Edit Banner Slider')
@section('header_title', 'Edit Banner Slider')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.sliders.index') }}" class="text-xs font-bold text-gray-500 hover:text-wikrama-blue flex items-center gap-1">
            <i class="ri-arrow-left-line"></i> Kembali ke Daftar Banner
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-8">
        <h2 class="text-xl font-black text-gray-900 mb-6">Formulir Edit Banner Hero Slider #{{ $slider->id }}</h2>

        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Penempatan Type -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Penempatan Halaman <span class="text-red-500">*</span></label>
                <select name="type" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                    <option value="home" {{ old('type', $slider->type ?? 'home') == 'home' ? 'selected' : '' }}>Beranda Utama Website (/)</option>
                    <option value="spmb" {{ old('type', $slider->type) == 'spmb' ? 'selected' : '' }}>Landing Page SPMB (/spmb)</option>
                </select>
            </div>

            <!-- Title -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Judul Utama Banner <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $slider->title) }}" required 
                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
            </div>

            <!-- Subtitle -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Keterangan / Sub-Judul</label>
                <textarea name="subtitle" rows="3" 
                          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">{{ old('subtitle', $slider->subtitle) }}</textarea>
            </div>

            <!-- Image Preview & Options -->
            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4">
                <h3 class="font-bold text-sm text-gray-800 flex items-center gap-2">
                    <i class="ri-image-edit-line text-wikrama-blue"></i> Gambar Banner Terpasang
                </h3>

                <!-- Current Image Preview -->
                <div class="flex flex-col sm:flex-row items-center gap-4 p-3 bg-white rounded-xl border border-gray-200">
                    <div class="w-40 h-24 rounded-lg overflow-hidden bg-gray-100 shrink-0 border border-gray-200">
                        <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}" class="w-full h-full object-cover">
                    </div>
                    <div class="text-xs text-gray-600 break-all">
                        <div class="font-bold text-gray-800 mb-1">URL / Jalur Gambar Saat Ini:</div>
                        <a href="{{ $slider->image_url }}" target="_blank" class="text-wikrama-blue hover:underline">{{ $slider->image_url }}</a>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Ubah Tautan Gambar</label>
                    <input type="text" name="image_url" value="{{ old('image_url', $slider->image_url) }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white">
                </div>

                <div class="text-center text-xs font-bold text-gray-400">--- ATAU GANTI DENGAN UNGGAH FILE BARU ---</div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Unggah File Foto Baru (JPG/PNG/WEBP maks 5MB)</label>
                    <input type="file" name="image_file" accept="image/*" 
                           class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-wikrama-blue file:text-white hover:file:bg-wikrama-dark file:cursor-pointer transition">
                    <p class="text-[11px] text-gray-400 mt-1">Kosongkan jika tidak ingin mengganti file gambar.</p>
                </div>
            </div>

            <!-- Button Config -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Teks Tombol (Opsional)</label>
                    <input type="text" name="button_text" value="{{ old('button_text', $slider->btn_text ?? $slider->button_text) }}" placeholder="Contoh: Selengkapnya" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Tautan Tombol (URL)</label>
                    <input type="text" name="button_link" value="{{ old('button_link', $slider->btn_url ?? $slider->button_link) }}" placeholder="Contoh: /spmb" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
            </div>

            <!-- Order & Active -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nomor Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $slider->order) }}" min="0" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>

                <div class="flex items-center h-full pt-6">
                    <label class="relative flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $slider->is_active) ? 'checked' : '' }} class="w-5 h-5 rounded text-wikrama-blue focus:ring-wikrama-blue border-gray-300">
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
                    <i class="ri-save-line text-base"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
