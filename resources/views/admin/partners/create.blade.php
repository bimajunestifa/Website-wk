@extends('admin.layout')

@section('title', 'Tambah Mitra Industri')
@section('header_title', 'Tambah Mitra / Perusahaan Baru')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <a href="{{ route('admin.partners.index') }}" class="text-xs font-bold text-gray-500 hover:text-wikrama-blue flex items-center gap-1">
        <i class="ri-arrow-left-line"></i> Kembali ke Daftar Mitra
    </a>

    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-8">
        <h2 class="text-xl font-black text-gray-900 mb-6">Formulir Tambah Mitra</h2>

        <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Perusahaan / Mitra <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: PT Telkom Indonesia" 
                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Website Mitra (Opsional)</label>
                <input type="text" name="website" value="{{ old('website') }}" placeholder="https://hotelinsitugarut.com atau www.mitra.com" 
                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
            </div>

            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4">
                <h3 class="font-bold text-sm text-gray-800 flex items-center gap-2">
                    <i class="ri-image-line text-wikrama-blue"></i> Logo Perusahaan
                </h3>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">URL Logo</label>
                    <input type="url" name="logo_url" value="{{ old('logo_url') }}" placeholder="https://..." 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white">
                </div>
                <div class="text-center text-xs font-bold text-gray-400">--- ATAU UNGGAH LOGO (PNG/SVG/JPG) ---</div>
                <div>
                    <input type="file" name="logo_file" accept="image/*" 
                           class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-wikrama-blue file:text-white hover:file:bg-wikrama-dark file:cursor-pointer transition">
                </div>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <a href="{{ route('admin.partners.index') }}" class="px-5 py-3 border border-gray-300 text-gray-700 font-bold rounded-xl text-xs uppercase tracking-wider hover:bg-gray-50 transition">Batal</a>
                <button type="submit" class="px-6 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-xl text-xs uppercase tracking-wider shadow-lg transition flex items-center gap-2">
                    <i class="ri-save-line text-base"></i> Simpan Mitra
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

