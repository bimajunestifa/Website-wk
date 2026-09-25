@extends('admin.layout')

@section('title', 'Kelola Fasilitas & Sarpras')
@section('header_title', 'Fasilitas & Sarana Prasarana')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
        <div>
            <h2 class="text-xl font-black text-gray-900">Daftar Fasilitas & Sarpras Sekolah</h2>
            <p class="text-xs text-gray-500 mt-1">Kelola galeri dan sarana penunjang pembelajaran di SMK Wikrama 1 Garut.</p>
        </div>
        <a href="{{ route('admin.facilities.create') }}" class="px-5 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-2xl text-xs uppercase tracking-wider shadow-md transition flex items-center gap-2 shrink-0">
            <i class="ri-add-circle-line text-lg"></i> Tambah Fasilitas Baru
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($facilities as $f)
            <div class="bg-white rounded-3xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="h-44 bg-gray-100 overflow-hidden relative">
                        <img src="{{ $f->image_url }}" alt="{{ $f->name }}" class="w-full h-full object-cover">
                        <span class="absolute top-3 left-3 px-3 py-1 bg-wikrama-dark/80 backdrop-blur-sm text-white text-[11px] font-bold rounded-full">
                            {{ $f->category ?? 'Umum' }}
                        </span>
                    </div>
                    <div class="p-6">
                        <h4 class="font-extrabold text-gray-900 text-lg mb-2">{{ $f->name }}</h4>
                        <p class="text-xs text-gray-600 line-clamp-3 leading-relaxed">{{ $f->description ?? 'Fasilitas penunjang aktivitas siswa SMK Wikrama 1 Garut.' }}</p>
                    </div>
                </div>

                <div class="p-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                    <span class="text-xs text-gray-400">ID: #{{ $f->id }}</span>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.facilities.edit', $f->id) }}" class="p-2 bg-blue-50 text-wikrama-blue hover:bg-wikrama-blue hover:text-white rounded-xl transition text-xs font-bold" title="Edit Fasilitas">
                            <i class="ri-edit-line text-base"></i>
                        </a>
                        <form action="{{ route('admin.facilities.destroy', $f->id) }}" method="POST" onsubmit="return confirm('Hapus fasilitas ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-xl transition text-xs font-bold" title="Hapus Fasilitas">
                                <i class="ri-delete-bin-line text-base"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 py-12 text-center text-gray-400 bg-white rounded-3xl border border-gray-200">
                Belum ada data fasilitas.
            </div>
        @endforelse
    </div>
</div>
@endsection

