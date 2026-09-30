@extends('admin.layout')

@section('title', 'Edit Sekolah Teladan')
@section('header_title', 'Edit Sekolah Teladan / Partner')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800">Edit Detail: {{ $teladan->title }}</h3>
            <a href="{{ route('admin.teladan.index') }}" class="text-sm font-semibold text-gray-500 hover:text-wikrama-blue transition">
                <i class="bx bx-arrow-back align-middle mr-1"></i> Kembali
            </a>
        </div>

        <form action="{{ route('admin.teladan.update', $teladan->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
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
                    <div class="flex items-center gap-6">
                        @if($teladan->image_url)
                        <div class="w-24 h-24 rounded-2xl border border-gray-200 overflow-hidden bg-gray-50 flex items-center justify-center p-2 shrink-0">
                            <img src="{{ $teladan->image_url }}" alt="Logo" class="max-h-full max-w-full object-contain">
                        </div>
                        @endif
                        <div class="flex-1">
                            <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-wikrama-blue hover:file:bg-blue-100 transition outline-none">
                            <p class="text-xs text-gray-400 mt-2">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Judul</label>
                        <input type="text" name="title" value="{{ old('title', $teladan->title) }}" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-wikrama-blue/20 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Deskripsi Singkat</label>
                        <textarea name="description" rows="2" required class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-wikrama-blue/20 outline-none">{{ old('description', $teladan->description) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1.5">Urutan (Opsional)</label>
                        <input type="number" name="order" value="{{ old('order', $teladan->order) }}" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-wikrama-blue/20 outline-none">
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-5 border-t border-gray-100">
                <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-xl text-sm shadow-md transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

