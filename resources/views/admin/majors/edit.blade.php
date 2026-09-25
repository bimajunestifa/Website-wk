@extends('admin.layout')

@section('title', 'Edit Jurusan')
@section('header_title', 'Edit Jurusan / Keahlian')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <a href="{{ route('admin.majors.index') }}" class="text-xs font-bold text-gray-500 hover:text-wikrama-blue flex items-center gap-1">
        <i class="ri-arrow-left-line"></i> Kembali ke Daftar Jurusan
    </a>

    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-gray-100 gap-4 mb-6">
            <div>
                <h2 class="text-xl font-black text-gray-900">Edit Jurusan: {{ $major->name }}</h2>
                <p class="text-xs text-gray-500">Perbarui deskripsi, prospek kerja, foto dokumentasi, dan status keaktifan jurusan.</p>
            </div>
            @if($major->is_active)
                <span class="px-3 py-1 text-xs font-bold rounded-full bg-emerald-100 text-emerald-800 border border-emerald-300 self-start sm:self-auto">
                    <i class="ri-check-line font-bold"></i> Status: Aktif
                </span>
            @else
                <span class="px-3 py-1 text-xs font-bold rounded-full bg-gray-200 text-gray-700 border border-gray-300 self-start sm:self-auto">
                    <i class="ri-eye-off-line"></i> Status: Nonaktif (Disembunyikan)
                </span>
            @endif
        </div>

        <form action="{{ route('admin.majors.update', $major->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Jurusan <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $major->name) }}" required 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Singkatan <span class="text-red-500">*</span></label>
                    <input type="text" name="short_name" value="{{ old('short_name', $major->short_name) }}" required 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Deskripsi Jurusan <span class="text-red-500">*</span></label>
                <textarea name="description" rows="4" required 
                          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">{{ old('description', $major->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Keunggulan & Fasilitas Jurusan</label>
                    <textarea name="advantages" rows="3" placeholder="Contoh: Sertifikasi BNSP, Mikrotik Academy..." 
                              class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">{{ old('advantages', $major->advantages) }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Prospek Karir & Peluang Kerja</label>
                    <textarea name="career_prospects" rows="3" placeholder="Contoh: Web Developer, Mobile App Engineer..." 
                              class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">{{ old('career_prospects', $major->career_prospects) }}</textarea>
                </div>
            </div>

            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4">
                <h3 class="font-bold text-sm text-gray-800 flex items-center gap-2">
                    <i class="ri-image-line text-wikrama-blue"></i> Foto Dokumentasi Jurusan
                </h3>

                @if($major->image_url)
                    <div class="flex items-center gap-4 p-3 bg-white rounded-xl border border-gray-200">
                        <img src="{{ $major->image_url }}" alt="{{ $major->name }}" class="w-32 h-20 object-cover rounded-lg">
                        <div class="text-xs text-gray-500 break-all">{{ $major->image_url }}</div>
                    </div>
                @endif

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Ubah URL Foto Langsung</label>
                    <input type="text" name="image_url" value="{{ old('image_url', $major->image_url) }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white">
                </div>
                <div class="text-center text-xs font-bold text-gray-400">--- ATAU GANTI DENGAN UNGGAH FILE BARU ---</div>
                <div>
                    <input type="file" name="image_file" accept="image/*" 
                           class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-wikrama-blue file:text-white hover:file:bg-wikrama-dark file:cursor-pointer transition">
                </div>
            </div>

            <!-- Urutan & Status Aktif (Penonaktifan Jurusan) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-5 rounded-2xl bg-amber-50/60 border border-amber-200">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nomor Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $major->order) }}"
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white focus:ring-2 focus:ring-wikrama-blue outline-none text-sm transition">
                    <p class="text-[11px] text-gray-500 mt-1">Urutan posisi kartu di halaman web.</p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Status Penayangan Jurusan</label>
                    <label class="flex items-center gap-3 cursor-pointer select-none bg-white p-3 rounded-xl border border-gray-300 hover:bg-gray-50 transition">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $major->is_active) ? 'checked' : '' }} class="w-5 h-5 text-wikrama-blue rounded border-gray-300">
                        <div>
                            <span class="text-xs font-bold text-gray-800 block">Status Aktif (Tampilkan di Website)</span>
                            <span class="text-[11px] text-gray-500">Hilangkan centang jika jurusan ini sudah tidak dibuka lagi.</span>
                        </div>
                    </label>
                </div>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('admin.majors.index') }}" class="px-5 py-3 border border-gray-300 text-gray-700 font-bold rounded-xl text-xs uppercase tracking-wider hover:bg-gray-50 transition">Batal</a>
                <button type="submit" class="px-6 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-xl text-xs uppercase tracking-wider shadow-lg transition flex items-center gap-2">
                    <i class="ri-check-line text-base"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
