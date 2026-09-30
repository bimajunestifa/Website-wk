@extends('admin.layout')

@section('title', 'Tambah Sekolah Teladan')
@section('header_title', 'Tambah Sekolah Teladan / Partner')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800">Detail Sekolah Teladan</h3>
            <a href="{{ route('admin.teladan.index') }}" class="text-sm font-semibold text-gray-500 hover:text-wikrama-blue transition">
                <i class="bx bx-arrow-back align-middle mr-1"></i> Kembali
            </a>
        </div>

        <form action="{{ route('admin.teladan.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 rounded-2xl text-sm">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="space-y-6">
                <!-- Foto/Logo -->
                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-2">Logo / Gambar</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-2xl hover:border-wikrama-blue transition group relative bg-gray-50">
                        <div class="space-y-2 text-center relative z-10">
                            <div class="w-16 h-16 mx-auto bg-white rounded-full flex items-center justify-center shadow-sm border border-gray-100 group-hover:scale-110 transition-transform">
                                <i class="bx bx-image-add text-2xl text-gray-400 group-hover:text-wikrama-blue"></i>
                            </div>
                            <div class="text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-wikrama-blue hover:text-wikrama-dark focus-within:outline-none">
                                    <span>Upload gambar</span>
                                    <input id="image" name="image" type="file" class="sr-only" accept="image/*" required>
                                </label>
                                <p class="pl-1 inline">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, WEBP up to 4MB</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Judul (Contoh: Juara 2 Nasional)</label>
                        <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-wikrama-blue/20 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Deskripsi Singkat</label>
                        <textarea name="description" rows="2" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-wikrama-blue/20 outline-none" placeholder="Contoh: Pangan Jajan Anak Sehat...">{{ old('description') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Urutan (Opsional)</label>
                        <input type="number" name="order" value="{{ old('order', 0) }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-wikrama-blue/20 outline-none">
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-5 border-t border-gray-100">
                <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-xl text-sm shadow-md transition">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

