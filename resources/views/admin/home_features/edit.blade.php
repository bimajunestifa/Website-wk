@extends('admin.layout')

@section('title', 'Edit Kartu: ' . $card->title)
@section('header_title', 'Edit Kartu Nilai Beranda: ' . $card->title)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.home-features.index') }}" class="text-sm font-bold text-gray-500 hover:text-wikrama-blue flex items-center gap-1.5 transition">
            <i class="bx bx-arrow-back text-lg"></i> Kembali ke Daftar 8 Kartu
        </a>
        <span class="px-3 py-1 bg-blue-50 text-wikrama-blue font-bold text-xs rounded-full uppercase">
            Seksi {{ ucfirst($card->section) }}
        </span>
    </div>

    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8">
        <div class="border-b border-gray-100 pb-5 mb-6">
            <h3 class="font-extrabold text-xl text-gray-900">Perbarui Data Kartu "{{ $card->title }}"</h3>
            <p class="text-xs text-gray-500 mt-1">Perubahan yang disimpan akan langsung tampil secara real-time pada halaman Beranda utama sekolah.</p>
        </div>

        <form action="{{ route('admin.home-features.update', $card->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Judul Kartu -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Judul Kartu <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" value="{{ old('title', $card->title) }}" required class="w-full text-sm rounded-xl border border-gray-300 p-3 focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                    <p class="text-[11px] text-gray-500 mt-1">Contoh: Lulusan, Pengelolaan, Guru, Budaya, LMS, Kurikulum, dll.</p>
                </div>

                <!-- Urutan Tampil -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        Nomor Urutan Tampil (Order)
                    </label>
                    <input type="number" name="order" value="{{ old('order', $card->order) }}" min="1" max="99" class="w-full text-sm rounded-xl border border-gray-300 p-3 focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                    <p class="text-[11px] text-gray-500 mt-1">Urutan 1 sampai 4 di dalam seksi.</p>
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                    Deskripsi Ringkas <span class="text-red-500">*</span>
                </label>
                <textarea name="description" rows="3" required class="w-full text-sm rounded-xl border border-gray-300 p-3 focus:ring-2 focus:ring-wikrama-blue focus:outline-none">{{ old('description', $card->description) }}</textarea>
                <p class="text-[11px] text-gray-500 mt-1">Penjelasan singkat mengenai keunggulan/karakter/budaya ini.</p>
            </div>

            <!-- Link URL (Opsional) -->
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                    Tautan Klik / Link URL (Opsional)
                </label>
                <input type="text" name="link_url" value="{{ old('link_url', $card->link_url) }}" placeholder="Contoh: /sumber-daya#tenaga-pengajar atau https://..." class="w-full text-sm rounded-xl border border-gray-300 p-3 focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                <p class="text-[11px] text-gray-500 mt-1">Bila diisi, pengunjung dapat mengklik kartu ini untuk diarahkan ke halaman tujuan.</p>
            </div>

            <!-- Upload Gambar -->
            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-3">
                    Foto / Gambar Kartu
                </label>
                <div class="flex flex-col sm:flex-row items-center gap-5">
                    @if($card->image_url)
                        <div class="relative w-40 h-28 rounded-xl overflow-hidden border border-gray-300 bg-gray-200 shrink-0 shadow-sm">
                            <img src="{{ $card->image_url }}" alt="{{ $card->title }}" class="w-full h-full object-cover">
                        </div>
                    @endif
                    <div class="flex-1 w-full">
                        <input type="file" name="image" accept="image/png,image/jpeg,image/webp,image/jpg" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-wikrama-blue file:text-white hover:file:bg-wikrama-dark file:cursor-pointer">
                        <p class="text-[11px] text-gray-500 mt-2">Format: JPG, PNG, atau WEBP. Maksimal 4MB. Biarkan kosong jika tidak ingin mengganti gambar saat ini.</p>
                    </div>
                </div>
            </div>

            <!-- Status Aktif -->
            <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl border border-gray-200">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $card->is_active) ? 'checked' : '' }} class="w-5 h-5 text-wikrama-blue rounded border-gray-300 focus:ring-wikrama-blue">
                <label for="is_active" class="text-sm font-bold text-gray-800 cursor-pointer">
                    Aktifkan Kartu ini di Halaman Beranda
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.home-features.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-bold text-sm transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl font-bold text-sm shadow-md transition flex items-center gap-2">
                    <i class="bx bx-save text-lg"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

