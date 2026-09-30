@extends('admin.layout')

@section('title', 'Sekolah Teladan Nasional')
@section('header_title', 'Sekolah Teladan Nasional')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
        <div>
            <h2 class="text-xl font-black text-gray-900">Kelola Sekolah Teladan Nasional</h2>
            <p class="text-xs text-gray-500 mt-1">Logo sertifikasi, akreditasi, dan partner teladan (misal: Juara 2 Nasional, Mikrotik Academy, dll).</p>
        </div>
        <a href="{{ route('admin.teladan.create') }}" class="px-5 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-2xl text-xs uppercase tracking-wider shadow-md transition flex items-center gap-2 shrink-0">
            <i class="bx bx-plus-circle text-lg"></i> Tambah Data
        </a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @forelse($teladans as $t)
            <div class="bg-white rounded-2xl border border-gray-200 p-4 shadow-sm hover:shadow-md transition flex flex-col justify-between items-center text-center group">
                <div class="w-full h-24 flex items-center justify-center p-2 bg-gray-50 rounded-xl mb-3 border border-gray-100">
                    <img src="{{ $t->image_url }}" alt="{{ $t->title }}" class="max-h-full max-w-full object-contain filter group-hover:scale-105 transition">
                </div>
                <div class="w-full">
                    <h4 class="font-bold text-xs text-gray-800 line-clamp-1 mb-1">{{ $t->title }}</h4>
                    <p class="text-[10px] text-gray-500 line-clamp-2 mb-2">{{ $t->description }}</p>
                    <div class="flex items-center justify-center gap-1 border-t border-gray-100 pt-2">
                        <a href="{{ route('admin.teladan.edit', $t->id) }}" class="p-1.5 bg-blue-50 text-wikrama-blue hover:bg-wikrama-blue hover:text-white rounded-lg transition" title="Edit">
                            <i class="bx bx-edit text-sm"></i>
                        </a>
                        <form action="{{ route('admin.teladan.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-lg transition" title="Hapus">
                                <i class="bx bx-trash text-sm"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-5 py-8 text-center text-gray-400 bg-white rounded-2xl border border-gray-200">
                Belum ada data sekolah teladan.
            </div>
        @endforelse
    </div>
</div>
@endsection
