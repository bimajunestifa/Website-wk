@extends('admin.layout')

@section('title', 'Tambah Prestasi')
@section('header_title', 'Tambah Prestasi Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
            <div>
                <h2 class="text-lg font-bold text-gray-800">Form Tambah Prestasi</h2>
                <p class="text-xs text-gray-500">Masukkan detail penghargaan atau kejuaraan yang diraih siswa maupun sekolah.</p>
            </div>
            <a href="{{ route('admin.achievements.index') }}" class="text-xs font-semibold text-gray-500 hover:text-gray-800 flex items-center gap-1">
                <i class="ri-arrow-left-line"></i> Kembali
            </a>
        </div>

        <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Judul Prestasi -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Judul Prestasi / Kejuaraan <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Juara 2 Lomba Pangan Jajan Sehat Tingkat Nasional"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                </div>

                <!-- Kategori / Tingkat -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Tingkat / Kategori <span class="text-red-500">*</span></label>
                    <select name="category" required class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                        <option value="Tingkat Nasional" {{ old('category') == 'Tingkat Nasional' ? 'selected' : '' }}>Tingkat Nasional</option>
                        <option value="Internasional" {{ old('category') == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                        <option value="Tingkat Provinsi" {{ old('category') == 'Tingkat Provinsi' ? 'selected' : '' }}>Tingkat Provinsi</option>
                        <option value="Tingkat Kabupaten/Kota" {{ old('category') == 'Tingkat Kabupaten/Kota' ? 'selected' : '' }}>Tingkat Kabupaten/Kota</option>
                        <option value="Standar Mutu Nasional" {{ old('category') == 'Standar Mutu Nasional' ? 'selected' : '' }}>Standar Mutu Nasional</option>
                    </select>
                </div>

                <!-- Peringkat / Medali -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Peringkat / Medali</label>
                    <input type="text" name="rank" value="{{ old('rank') }}" placeholder="Contoh: Juara 1, Juara 2, Medali Emas"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                </div>

                <!-- Tahun -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Tahun Kegiatan <span class="text-red-500">*</span></label>
                    <input type="text" name="event_year" value="{{ old('event_year', date('Y')) }}" required placeholder="2025"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                </div>

                <!-- Penerima / Siswa -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Penerima Penghargaan</label>
                    <input type="text" name="recipient_name" value="{{ old('recipient_name') }}" placeholder="Contoh: Tim Siswa PPLG / Nama Lengkap Siswa"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                </div>

                <!-- Upload Foto -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Upload Foto / Sertifikat</label>
                    <input type="file" name="image_file" accept="image/*"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-xl file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-wikrama-blue hover:file:bg-blue-100">
                    <p class="text-[11px] text-gray-400 mt-1">Maksimal 5MB (JPG, PNG, WebP)</p>
                </div>

                <!-- Atau URL Foto -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Atau URL Gambar</label>
                    <input type="text" name="image_url" value="{{ old('image_url') }}" placeholder="/assets/images/..."
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                </div>

                <!-- Urutan & Featured -->
                <div class="flex items-center gap-6">
                    <div class="w-32">
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Urutan</label>
                        <input type="number" name="order" value="{{ old('order', 0) }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                    </div>
                    <div class="pt-6">
                        <label class="flex items-center gap-2 cursor-pointer text-sm font-semibold text-gray-700">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', 1) ? 'checked' : '' }} class="w-4 h-4 text-wikrama-blue rounded border-gray-300">
                            <span>Tampilkan di Beranda (Featured)</span>
                        </label>
                    </div>
                </div>

                <!-- Deskripsi Lengkap -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Deskripsi Prestasi</label>
                    <textarea name="description" rows="4" placeholder="Ceritakan ringkasan keberhasilan dan kompetisi yang diikuti..."
                              class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.achievements.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold text-gray-600 hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-sm font-semibold shadow-sm transition">
                    Simpan Prestasi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

