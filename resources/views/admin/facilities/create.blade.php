@extends('admin.layout')

@section('title', 'Tambah Fasilitas')
@section('header_title', 'Tambah Fasilitas / Sarana Baru')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <a href="{{ route('admin.facilities.index') }}" class="text-xs font-bold text-gray-500 hover:text-wikrama-blue flex items-center gap-1">
        <i class="ri-arrow-left-line"></i> Kembali ke Daftar Fasilitas
    </a>

    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-8">
        <h2 class="text-xl font-black text-gray-900 mb-6">Formulir Tambah Fasilitas</h2>

        <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Fasilitas <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Laboratorium Komputer Modern" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kategori</label>
                    <input type="text" name="category" value="{{ old('category', 'Laboratorium & Praktik') }}" placeholder="Laboratorium, Olahraga, dll" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Deskripsi Fasilitas</label>
                <textarea name="description" rows="4" placeholder="Jelaskan spesifikasi dan kegunaan fasilitas ini..." 
                          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">{{ old('description') }}</textarea>
            </div>

            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4">
                <h3 class="font-bold text-sm text-gray-800 flex items-center gap-2">
                    <i class="ri-image-line text-wikrama-blue"></i> Foto Fasilitas
                </h3>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">URL Foto (Official atau Web Image)</label>
                    <input type="url" name="image_url" value="{{ old('image_url') }}" placeholder="https://smkwikrama1garut.sch.id/wp-content/uploads/..." 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white">
                </div>
                <div class="text-center text-xs font-bold text-gray-400">--- ATAU UNGGAH DARI KOMPUTER ---</div>
                <div>
                    <input type="file" name="image_file" accept="image/*" 
                           class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-wikrama-blue file:text-white hover:file:bg-wikrama-dark file:cursor-pointer transition">
                </div>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('admin.facilities.index') }}" class="px-5 py-3 border border-gray-300 text-gray-700 font-bold rounded-xl text-xs uppercase tracking-wider hover:bg-gray-50 transition">Batal</a>
                <button type="submit" class="px-6 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-xl text-xs uppercase tracking-wider shadow-lg transition flex items-center gap-2">
                    <i class="ri-save-line text-base"></i> Simpan Fasilitas
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

