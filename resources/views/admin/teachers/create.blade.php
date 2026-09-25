@extends('admin.layout')

@section('title', 'Tambah Guru / Tenaga Pendidik')
@section('header_title', 'Tambah Guru / Tenaga Pendidik Baru')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
            <div>
                <h2 class="text-lg font-bold text-gray-800">Form Tambah Dewan Guru Baru</h2>
                <p class="text-xs text-gray-500">Masukkan identitas lengkap guru, jabatan, urutan, serta unggah foto resmi.</p>
            </div>
            <a href="{{ route('admin.teachers.index') }}" class="text-xs font-semibold text-gray-500 hover:text-gray-800 flex items-center gap-1">
                <i class="ri-arrow-left-line"></i> Kembali
            </a>
        </div>

        <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nama Lengkap & Gelar -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Nama Lengkap & Gelar <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Budi Santoso, S.Kom, M.T."
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                @error('name') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Jabatan / Amanah -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Jabatan / Amanah Tugas <span class="text-red-500">*</span></label>
                <input type="text" name="role" value="{{ old('role') }}" required placeholder="Contoh: Guru Produktif PPLG / Wakasek Humas"
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                @error('role') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Upload Foto Guru -->
            <div class="p-5 rounded-2xl bg-blue-50/50 border border-blue-100 space-y-4">
                <label class="block text-xs font-bold text-wikrama-blue uppercase">Foto Profil Guru / Tenaga Pendidik</label>
                
                <div class="flex flex-col sm:flex-row items-center gap-4">
                    <div class="w-24 h-28 rounded-2xl bg-white border-2 border-dashed border-blue-200 overflow-hidden flex items-center justify-center text-gray-400 text-xs text-center p-2 shrink-0 shadow-sm" id="preview-box">
                        <span id="preview-text"><i class="ri-image-add-line text-2xl block mb-1 text-blue-400"></i>Preview Foto</span>
                        <img id="image-preview" class="w-full h-full object-cover hidden">
                    </div>
                    <div class="flex-1 w-full space-y-2">
                        <input type="file" name="photo_file" id="photo_file" accept="image/*"
                               onchange="previewImage(this)"
                               class="w-full px-3 py-2 text-xs border border-gray-200 rounded-xl bg-white file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-wikrama-blue file:text-white hover:file:bg-wikrama-dark cursor-pointer">
                        <p class="text-[11px] text-gray-500">Format: JPG, PNG, WEBP. Maksimal ukuran file: 5 MB.</p>
                    </div>
                </div>

                <div class="pt-2 border-t border-blue-100">
                    <label class="block text-xs font-semibold text-gray-600 mb-1">Atau Gunakan URL Gambar Eksternal / Aset Lokal</label>
                    <input type="text" name="photo_url" value="{{ old('photo_url') }}" placeholder="/assets/images/contoh.png atau https://..."
                           class="w-full px-4 py-2 text-xs rounded-xl border border-gray-200 bg-white focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                </div>
            </div>

            <!-- Keterangan / Deskripsi Singkat -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Deskripsi / Peran Singkat</label>
                <textarea name="bio" rows="3" placeholder="Tuliskan sekilas tentang keahlian, tugas, atau pengalaman guru..."
                          class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">{{ old('bio') }}</textarea>
            </div>

            <!-- Urutan & Status Aktif -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Nomor Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                    <p class="text-[11px] text-gray-400 mt-1">Urutan kecil (misal 1, 2, 3) akan tampil paling awal.</p>
                </div>
                <div class="flex items-center sm:pt-6">
                    <label class="flex items-center gap-3 cursor-pointer select-none bg-gray-50 p-3 rounded-xl border border-gray-200 w-full hover:bg-gray-100 transition">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-5 h-5 text-wikrama-blue rounded border-gray-300">
                        <div>
                            <span class="text-xs font-bold text-gray-800 block">Status Aktif</span>
                            <span class="text-[11px] text-gray-500">Tampilkan foto dan profil guru ini di website</span>
                        </div>
                    </label>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.teachers.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-xs font-bold text-gray-600 hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold transition shadow-md flex items-center gap-2">
                    <i class="ri-save-line"></i> Simpan Data Guru
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const previewText = document.getElementById('preview-text');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            previewText.classList.add('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection

