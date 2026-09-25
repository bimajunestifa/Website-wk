@extends('admin.layout')

@section('title', 'Edit Data Alumni')
@section('header_title', 'Edit Alumni: ' . $alumni->name)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-wikrama-dark via-wikrama-blue to-indigo-900 rounded-3xl p-6 text-white shadow-xl flex items-center justify-between">
        <div>
            <a href="{{ route('admin.alumni.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-yellow-300 hover:text-yellow-200 transition mb-2">
                <i class="ri-arrow-left-line"></i> Kembali ke Daftar Alumni
            </a>
            <h2 class="text-2xl font-black font-heading">Edit Profil Alumni</h2>
            <p class="text-blue-100 text-xs mt-1">Perbarui data atau ganti foto profil alumni {{ $alumni->name }}.</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-gray-100">
        <form action="{{ route('admin.alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Lengkap -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Nama Lengkap Alumni <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name', $alumni->name) }}" required
                           class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-wikrama-blue text-sm font-semibold @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Perusahaan / Tempat Bekerja -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Perusahaan / Tempat Usaha
                    </label>
                    <input type="text" name="company" value="{{ old('company', $alumni->company) }}" placeholder="Contoh: PT Dermaga Rezeki Indonesia"
                           class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-wikrama-blue text-sm @error('company') border-red-500 @enderror">
                    @error('company')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Profesi / Jabatan -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Profesi / Jabatan
                    </label>
                    <input type="text" name="profession" value="{{ old('profession', $alumni->profession) }}" placeholder="Contoh: Owner / Software Engineer"
                           class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-wikrama-blue text-sm @error('profession') border-red-500 @enderror">
                    @error('profession')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jurusan -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Jurusan / Kompetensi Keahlian
                    </label>
                    <input type="text" name="major" list="major-list" value="{{ old('major', $alumni->major) }}" placeholder="Pilih atau ketik jurusan..."
                           class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-wikrama-blue text-sm @error('major') border-red-500 @enderror">
                    <datalist id="major-list">
                        @foreach($majors as $m)
                            <option value="{{ $m->name }}"></option>
                        @endforeach
                        <option value="Pengembangan Perangkat Lunak & Gim"></option>
                        <option value="Teknik Jaringan Komputer & Telekomunikasi"></option>
                        <option value="Desain Komunikasi Visual"></option>
                        <option value="Pemasaran (Bisnis Digital)"></option>
                        <option value="Manajemen Perkantoran & Layanan Bisnis"></option>
                        <option value="Perhotelan"></option>
                        <option value="Kuliner"></option>
                    </datalist>
                    @error('major')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tahun Kelulusan -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Tahun Kelulusan / Angkatan
                    </label>
                    <input type="text" name="graduation_year" value="{{ old('graduation_year', $alumni->graduation_year) }}" placeholder="Contoh: 2021"
                           class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-wikrama-blue text-sm @error('graduation_year') border-red-500 @enderror">
                    @error('graduation_year')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Foto Alumni -->
                <div class="md:col-span-2 space-y-3">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider">
                        Foto Profil Alumni
                    </label>
                    <div class="flex flex-col sm:flex-row items-center gap-6 p-4 rounded-2xl border-2 border-dashed border-gray-200 bg-gray-50/50">
                        <div class="w-24 h-24 rounded-full bg-white shadow-sm border-2 border-orange-400 overflow-hidden shrink-0 flex items-center justify-center" id="photo-preview-container">
                            @if($alumni->photo_url)
                                <img id="photo-preview" src="{{ asset($alumni->photo_url) }}" alt="{{ $alumni->name }}" class="w-full h-full object-cover">
                                <i class="ri-user-line text-3xl text-gray-300 hidden" id="photo-placeholder"></i>
                            @else
                                <i class="ri-user-line text-3xl text-gray-300" id="photo-placeholder"></i>
                                <img id="photo-preview" src="#" alt="Preview" class="w-full h-full object-cover hidden">
                            @endif
                        </div>
                        <div class="space-y-2 w-full">
                            <input type="file" name="photo_file" id="photo_file" accept="image/*"
                                   class="text-xs text-gray-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-wikrama-blue file:text-white hover:file:bg-wikrama-dark cursor-pointer">
                            <p class="text-[11px] text-gray-400">Pilih file baru untuk mengganti foto saat ini (JPG, PNG, WEBP max 5MB).</p>
                            
                            <div class="pt-2">
                                <label class="text-[11px] font-semibold text-gray-500 block mb-1">Atau Ubah Jalur/URL Foto:</label>
                                <input type="text" name="photo_url" value="{{ old('photo_url', $alumni->photo_url) }}" placeholder="Contoh: /assets/images/ujang.png"
                                       class="w-full px-3 py-2 text-xs rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-wikrama-blue">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kutipan / Pesan Alumni -->
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Kutipan / Testimoni / Pesan untuk Adik Tingkat
                    </label>
                    <textarea name="quote" rows="3" placeholder="Tuliskan pengalaman atau pesan inspiratif dari alumni..."
                              class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-wikrama-blue text-sm @error('quote') border-red-500 @enderror">{{ old('quote', $alumni->quote) }}</textarea>
                    @error('quote')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Urutan & Status -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Nomor Urutan Tampilan
                    </label>
                    <input type="number" name="order" value="{{ old('order', $alumni->order) }}" min="1"
                           class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-wikrama-blue text-sm font-bold">
                    <p class="text-[11px] text-gray-400 mt-1">Angka lebih kecil tampil lebih awal pada carousel.</p>
                </div>

                <div class="flex items-center pt-6">
                    <label class="relative flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $alumni->is_active) ? 'checked' : '' }}
                               class="w-5 h-5 rounded-lg text-wikrama-blue border-gray-300 focus:ring-wikrama-blue">
                        <span class="text-xs font-bold text-gray-800">Tayangkan di Halaman Web Sumber Daya</span>
                    </label>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-100">
                <a href="{{ route('admin.alumni.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-gray-600 font-bold text-xs uppercase tracking-wider hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-wikrama-blue hover:bg-wikrama-dark text-white font-black rounded-xl text-xs uppercase tracking-wider transition shadow-md flex items-center gap-2">
                    <i class="ri-save-line text-sm"></i> Perbarui Data Alumni
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('photo_file').onchange = function (evt) {
    var [file] = this.files;
    if (file) {
        var preview = document.getElementById('photo-preview');
        var placeholder = document.getElementById('photo-placeholder');
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
        if (placeholder) placeholder.classList.add('hidden');
    }
};
</script>
@endpush
@endsection

