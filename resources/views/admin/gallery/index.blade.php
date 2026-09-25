@extends('admin.layout')

@section('title', 'Kelola Galeri & Foto')
@section('header_title', 'Kelola Galeri Foto & Media')

@section('content')
<div class="space-y-6">
    <!-- Header Action -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <div>
            <h2 class="text-lg font-bold text-gray-800">Galeri Foto & Dokumentasi</h2>
            <p class="text-xs text-gray-500">Kelola dokumentasi visual kegiatan belajar, gedung, sarana prasarana, dan fasilitas sekolah.</p>
        </div>
        <a href="{{ route('admin.gallery.create') }}" class="px-5 py-2.5 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-sm font-semibold flex items-center gap-2 shadow-sm transition">
            <i class="ri-upload-cloud-line text-lg"></i> Upload Foto Baru
        </a>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($galleries as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col group hover:shadow-md transition">
                <div class="h-48 bg-gray-100 relative overflow-hidden">
                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 left-3 px-2.5 py-1 bg-black/60 backdrop-blur-md text-white text-[11px] font-bold rounded-lg">
                        {{ $item->category }}
                    </span>
                </div>
                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-gray-800 text-sm mb-1 line-clamp-1">{{ $item->title }}</h3>
                        <p class="text-xs text-gray-500 line-clamp-2 mb-3">{{ $item->caption ?? 'Tanpa keterangan' }}</p>
                    </div>
                    <div class="pt-3 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-[11px] text-gray-400 font-semibold">Urutan: {{ $item->order }}</span>
                        <div class="flex items-center gap-1">
                            <a href="{{ route('admin.gallery.edit', $item) }}" class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                <i class="ri-edit-line text-base"></i>
                            </a>
                            <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                    <i class="ri-delete-bin-line text-base"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-2xl p-12 text-center text-gray-400">
                <i class="ri-image-line text-5xl mb-2 block text-gray-300"></i>
                Belum ada foto yang diunggah ke galeri. Klik tombol "Upload Foto Baru" di atas.
            </div>
        @endforelse
    </div>
</div>
@endsection

