@extends('admin.layout')

@section('title', 'Kelola Banner Slider')
@section('header_title', 'Kelola Banner Slider (Beranda & SPMB)')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
        <div>
            <h2 class="text-xl font-black text-gray-900">Daftar Banner Slider Hero</h2>
            <p class="text-xs text-gray-500 mt-1">Kelola banner carousel untuk Beranda Utama (`/`) maupun Landing Page SPMB (`/spmb`).</p>
        </div>
        <a href="{{ route('admin.sliders.create') }}" class="px-5 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-2xl text-xs uppercase tracking-wider shadow-md transition flex items-center gap-2 shrink-0">
            <i class="ri-add-circle-line text-lg"></i> Tambah Banner Baru
        </a>
    </div>

    <!-- Filter Tabs -->
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.sliders.index') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition {{ !request()->has('type') || request('type') == 'all' ? 'bg-wikrama-blue text-white shadow-sm' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-200' }}">
            Semua Banner ({{ \App\Models\Slider::count() }})
        </a>
        <a href="{{ route('admin.sliders.index', ['type' => 'home']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition {{ request('type') == 'home' ? 'bg-wikrama-blue text-white shadow-sm' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-200' }}">
            Beranda Utama ({{ \App\Models\Slider::where('type', 'home')->count() }})
        </a>
        <a href="{{ route('admin.sliders.index', ['type' => 'spmb']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition {{ request('type') == 'spmb' ? 'bg-wikrama-blue text-white shadow-sm' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-200' }}">
            Landing SPMB ({{ \App\Models\Slider::where('type', 'spmb')->count() }})
        </a>
    </div>

    <!-- Sliders List Table -->
    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase tracking-wider">
                    <tr>
                        <th class="py-4 px-6">Preview Foto</th>
                        <th class="py-4 px-6">Lokasi Halaman</th>
                        <th class="py-4 px-6">Judul & Keterangan</th>
                        <th class="py-4 px-6">Tombol Aksi</th>
                        <th class="py-4 px-6 text-center">Urutan</th>
                        <th class="py-4 px-6 text-center">Status</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($sliders as $slider)
                        <tr class="hover:bg-gray-50 transition">
                            <!-- Image Preview -->
                            <td class="py-4 px-6">
                                <div class="w-32 h-20 rounded-xl overflow-hidden bg-gray-100 border border-gray-200 shadow-sm relative group">
                                    <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}" class="w-full h-full object-cover">
                                    <a href="{{ $slider->image_url }}" target="_blank" class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition text-xs font-bold">
                                        <i class="ri-eye-line mr-1"></i> Lihat
                                    </a>
                                </div>
                            </td>

                            <!-- Type / Location -->
                            <td class="py-4 px-6">
                                @if(($slider->type ?? 'home') == 'spmb')
                                    <span class="px-2.5 py-1 text-xs font-bold rounded-lg bg-amber-50 text-amber-700 border border-amber-200">
                                        Landing SPMB
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 text-xs font-bold rounded-lg bg-blue-50 text-blue-700 border border-blue-200">
                                        Beranda Utama
                                    </span>
                                @endif
                            </td>

                            <!-- Title & Subtitle -->
                            <td class="py-4 px-6 max-w-sm">
                                <h4 class="font-extrabold text-gray-900 text-base leading-snug">{{ $slider->title }}</h4>
                                <p class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $slider->subtitle ?? 'Tidak ada sub-judul' }}</p>
                            </td>

                            <!-- Button Info -->
                            <td class="py-4 px-6">
                                @if($slider->btn_text || $slider->button_text)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-50 text-wikrama-blue rounded-lg text-xs font-bold border border-blue-100">
                                        <i class="ri-cursor-line"></i> {{ $slider->btn_text ?? $slider->button_text }}
                                    </span>
                                    <div class="text-[11px] text-gray-400 mt-1 truncate max-w-xs">{{ $slider->btn_url ?? $slider->button_link }}</div>
                                @else
                                    <span class="text-xs text-gray-400 italic">Tanpa Tombol</span>
                                @endif
                            </td>

                            <!-- Order -->
                            <td class="py-4 px-6 text-center font-bold text-gray-700">
                                #{{ $slider->order }}
                            </td>

                            <!-- Status -->
                            <td class="py-4 px-6 text-center">
                                @if($slider->is_active)
                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-500">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-xl transition" title="Edit Slider">
                                        <i class="ri-edit-line text-lg"></i>
                                    </a>
                                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus slider ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-xl transition" title="Hapus Slider">
                                            <i class="ri-delete-bin-line text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-gray-400">
                                <i class="ri-slideshow-3-line text-4xl mb-2 block text-gray-300"></i>
                                Belum ada banner slider yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
