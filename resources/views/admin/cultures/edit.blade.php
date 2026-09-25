@extends('admin.layout')

@section('title', 'Edit Budaya / Kegiatan Akhlak')
@section('header_title', 'Edit Konten & Foto Budaya')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <a href="{{ route('admin.cultures.index') }}" class="text-xs font-bold text-gray-500 hover:text-wikrama-blue flex items-center gap-1">
        <i class="ri-arrow-left-line"></i> Kembali ke Daftar Budaya & Kegiatan
    </a>

    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-8">
        <div class="border-b border-gray-100 pb-5 mb-6">
            <span class="px-3 py-1 text-xs font-black rounded-full {{ $culture->category === 'akhlak_activity' ? 'bg-orange-100 text-orange-700' : 'bg-blue-100 text-wikrama-blue' }}">
                {{ $culture->category === 'akhlak_activity' ? 'Kegiatan Pengembangan Akhlak Mulia' : 'Budaya & Karakter Sekolah' }}
            </span>
            <h2 class="text-2xl font-black text-gray-900 mt-2">Edit: {{ $culture->title }}</h2>
            <p class="text-xs text-gray-500 mt-1">Ubah kata-kata judul, subjudul, deskripsi, urutan, serta unggah foto dokumentasi kegiatan.</p>
        </div>

        <form action="{{ route('admin.cultures.update', $culture->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Kategori -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kelompok Bagian Halaman <span class="text-red-500">*</span></label>
                <select name="category" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white font-semibold">
                    <option value="akhlak_activity" {{ old('category', $culture->category) === 'akhlak_activity' ? 'selected' : '' }}>
                        Kegiatan Pengembangan Akhlak Mulia (8 Kotak Foto di Halaman Budaya)
                    </option>
                    <option value="budaya" {{ old('category', $culture->category) === 'budaya' ? 'selected' : '' }}>
                        Budaya &amp; Karakter Utama Sekolah (7 Habits, Matrikulasi, Moving Class, dll.)
                    </option>
                </select>
            </div>

            <!-- Judul & Subjudul -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Judul Kegiatan / Budaya <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $culture->title) }}" required placeholder="Contoh: Menghafal Al Qur'an" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Subjudul / Singkatan (Opsional)</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $culture->subtitle) }}" placeholder="Contoh: TAHFIDZ, TAHSIN, MUBALLIGHIN" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
            </div>

            <!-- Deskripsi & Urutan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Deskripsi / Penjelasan Lengkap</label>
                    <textarea name="description" rows="3" placeholder="Tuliskan keterangan detail mengenai kegiatan ini..." 
                              class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">{{ old('description', $culture->description) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nomor Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $culture->order) }}" min="0" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                    <p class="text-[11px] text-gray-400 mt-1">1 untuk urutan paling awal, 2 berikutnya, dst.</p>
                </div>
            </div>

            <!-- Upload Foto Dokumentasi Kegiatan -->
            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="font-black text-sm text-gray-800 flex items-center gap-2">
                        <i class="ri-image-line text-wikrama-blue text-base"></i> Foto Dokumentasi Kegiatan
                    </h3>
                    @if($culture->image_url)
                        <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full">Foto Sudah Ada</span>
                    @else
                        <span class="text-xs font-bold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full">Masih Kotak Kosong</span>
                    @endif
                </div>

                @if($culture->image_url)
                    <div class="flex items-center gap-4 p-4 bg-white rounded-xl border border-gray-200">
                        <img src="{{ asset($culture->image_url) }}" alt="{{ $culture->title }}" class="w-36 h-24 object-cover rounded-lg border border-gray-100 shadow-sm shrink-0">
                        <div class="space-y-1 overflow-hidden">
                            <span class="text-xs font-bold text-gray-800">Foto Saat Ini:</span>
                            <div class="text-[11px] text-gray-500 truncate">{{ $culture->image_url }}</div>
                            <span class="text-[10px] text-gray-400 italic">Pilih file baru di bawah jika ingin mengganti foto ini.</span>
                        </div>
                    </div>
                @endif

                <div class="p-4 bg-white rounded-xl border-2 border-dashed border-gray-300 hover:border-wikrama-blue transition text-center space-y-2">
                    <i class="ri-upload-cloud-2-line text-3xl text-wikrama-blue"></i>
                    <div class="text-xs font-bold text-gray-700">Unggah Foto Baru dari Komputer / HP</div>
                    <p class="text-[11px] text-gray-400">Format JPG, PNG, WEBP. Maksimal 5MB.</p>
                    <input type="file" name="image_file" accept="image/*" 
                           class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-wikrama-blue file:text-white hover:file:bg-wikrama-dark file:cursor-pointer transition">
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-1">Atau Gunakan Tautan / URL Gambar Luar</label>
                    <input type="text" name="image_url" value="{{ old('image_url', $culture->image_url) }}" placeholder="https://..." 
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue outline-none text-xs transition bg-white">
                </div>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('admin.cultures.index') }}" class="px-6 py-3 border border-gray-300 text-gray-700 font-bold rounded-xl text-xs uppercase tracking-wider hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-black rounded-xl text-xs uppercase tracking-wider shadow-lg transition flex items-center gap-2">
                    <i class="ri-check-line text-base"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
