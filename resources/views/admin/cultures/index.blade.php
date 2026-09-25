@extends('admin.layout')

@section('title', 'Kelola Budaya & Kegiatan Akhlak')
@section('header_title', 'Budaya & Kegiatan Akhlak Sekolah')

@section('content')
<div class="space-y-10">
    <!-- Header Banner -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gradient-to-r from-wikrama-dark via-wikrama-blue to-blue-900 p-8 rounded-3xl text-white shadow-lg relative overflow-hidden">
        <div class="relative z-10 max-w-2xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-wider mb-2">
                <i class="ri-heart-pulse-line text-yellow-300"></i> Konten Halaman /budaya
            </span>
            <h2 class="text-2xl font-black mb-1">Pengelolaan Budaya & Foto Kegiatan</h2>
            <p class="text-xs text-blue-100 leading-relaxed">
                Di sini Anda dapat mengunggah foto kegiatan pada 8 kotak kosong di halaman Budaya, mengubah kata-kata/judul kegiatan, serta mengelola budaya pembiasaan utama Wikrama.
            </p>
        </div>
        <div class="relative z-10 flex flex-wrap gap-2 shrink-0">
            <a href="{{ route('admin.cultures.create', ['category' => 'akhlak_activity']) }}" class="px-5 py-3 bg-yellow-400 hover:bg-yellow-300 text-wikrama-dark font-black rounded-2xl text-xs uppercase tracking-wider shadow-md transition flex items-center gap-2">
                <i class="ri-add-circle-line text-base"></i> Tambah Kegiatan Akhlak
            </a>
            <a href="{{ route('culture') }}" target="_blank" class="px-4 py-3 bg-white/10 hover:bg-white/20 text-white font-bold rounded-2xl text-xs uppercase tracking-wider transition flex items-center gap-2">
                <i class="ri-external-link-line"></i> Lihat Halaman Budaya
            </a>
        </div>
    </div>

    <!-- SEKSI 1: Kegiatan Pengembangan Akhlak Mulia (8 Kotak Foto yang Difoto User) -->
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-gray-200 pb-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-orange-500"></span>
                    <h3 class="text-xl font-black text-gray-900">Kegiatan Pengembangan Akhlak Mulia</h3>
                    <span class="px-2.5 py-0.5 bg-orange-100 text-orange-700 text-xs font-black rounded-full">
                        {{ $akhlakActivities->count() }} Kegiatan
                    </span>
                </div>
                <p class="text-xs text-gray-500 mt-1">
                    Ini adalah 8 kartu kegiatan di halaman <span class="font-semibold text-wikrama-blue">/budaya</span>. Klik <strong>Edit Foto & Kata</strong> pada tiap kartu untuk mengunggah foto baru atau mengubah judul teksnya.
                </p>
            </div>
            <a href="{{ route('admin.cultures.create', ['category' => 'akhlak_activity']) }}" class="text-xs font-bold text-wikrama-blue hover:underline flex items-center gap-1">
                + Tambah Kegiatan Baru
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($akhlakActivities as $act)
                <div class="bg-white rounded-3xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Foto Preview -->
                        <div class="relative h-44 bg-gray-100 overflow-hidden">
                            @if($act->image_url)
                                <img src="{{ asset($act->image_url) }}" alt="{{ $act->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <span class="absolute top-3 right-3 px-2 py-1 bg-emerald-600/90 text-white text-[10px] font-bold rounded-lg backdrop-blur-sm flex items-center gap-1 shadow">
                                    <i class="ri-check-line"></i> Foto Terpasang
                                </span>
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center p-4 bg-gray-50 text-gray-400 border-b border-gray-100">
                                    <i class="ri-image-add-line text-4xl mb-1 text-gray-300"></i>
                                    <span class="text-[11px] font-bold text-gray-400">Belum Ada Foto</span>
                                    <span class="text-[9px] text-gray-400 text-center">Menampilkan placeholder</span>
                                </div>
                                <span class="absolute top-3 right-3 px-2 py-1 bg-amber-500/90 text-white text-[10px] font-bold rounded-lg backdrop-blur-sm flex items-center gap-1 shadow">
                                    <i class="ri-alert-line"></i> Kotak Kosong
                                </span>
                            @endif

                            <span class="absolute bottom-3 left-3 px-2 py-0.5 bg-black/60 text-white text-[10px] font-bold rounded-md backdrop-blur-sm">
                                Urutan: #{{ $act->order }}
                            </span>
                        </div>

                        <!-- Konten Teks -->
                        <div class="p-5">
                            <h4 class="font-black text-gray-900 text-base leading-snug mb-1 uppercase">
                                {{ $act->title }}
                            </h4>
                            @if($act->subtitle)
                                <span class="inline-block text-xs font-extrabold text-orange-600 bg-orange-50 px-2 py-0.5 rounded-md mb-2">
                                    ({{ $act->subtitle }})
                                </span>
                            @endif
                            @if($act->description)
                                <p class="text-xs text-gray-500 line-clamp-2 mt-2 leading-relaxed">
                                    {{ $act->description }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="p-4 bg-gray-50/80 border-t border-gray-100 flex items-center justify-between gap-2">
                        <a href="{{ route('admin.cultures.edit', $act->id) }}" class="flex-1 py-2 px-3 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition flex items-center justify-center gap-1.5 shadow-sm">
                            <i class="ri-edit-line"></i> Edit Foto & Kata
                        </a>
                        <form action="{{ route('admin.cultures.destroy', $act->id) }}" method="POST" onsubmit="return confirm('Hapus kegiatan akhlak ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-xl transition" title="Hapus Kegiatan">
                                <i class="ri-delete-bin-line text-base"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center text-gray-400 bg-white rounded-3xl border border-gray-200">
                    <i class="ri-inbox-line text-4xl mb-2 block"></i>
                    Belum ada kegiatan akhlak mulia. Klik <strong>Tambah Kegiatan Akhlak</strong> di atas.
                </div>
            @endforelse
        </div>
    </div>

    <!-- SEKSI 2: Budaya & Pembiasaan Utama Sekolah -->
    <div class="space-y-6 pt-6 border-t border-gray-200">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-gray-200 pb-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-wikrama-blue"></span>
                    <h3 class="text-xl font-black text-gray-900">Budaya & Nilai Pembiasaan Utama Wikrama</h3>
                    <span class="px-2.5 py-0.5 bg-blue-100 text-wikrama-blue text-xs font-black rounded-full">
                        {{ $cultures->count() }} Budaya
                    </span>
                </div>
                <p class="text-xs text-gray-500 mt-1">
                    Nilai-nilai khas seperti 7 Kebiasaan Efektif, Matrikulasi, Moving Class, dan Shalat Berjamaah.
                </p>
            </div>
            <a href="{{ route('admin.cultures.create', ['category' => 'budaya']) }}" class="text-xs font-bold text-wikrama-blue hover:underline flex items-center gap-1">
                + Tambah Budaya Baru
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($cultures as $c)
                <div class="bg-white rounded-3xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-md transition flex flex-col justify-between">
                    <div>
                        @if($c->image_url)
                            <div class="h-44 bg-gray-100 overflow-hidden">
                                <img src="{{ asset($c->image_url) }}" alt="{{ $c->title }}" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <div class="p-6">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-wikrama-blue flex items-center justify-center text-xl mb-3">
                                <i class="{{ $c->icon ?? 'ri-heart-pulse-line' }}"></i>
                            </div>
                            <h4 class="font-extrabold text-gray-900 text-lg mb-2">{{ $c->title }}</h4>
                            <p class="text-xs text-gray-600 line-clamp-3 leading-relaxed">{{ $c->description }}</p>
                        </div>
                    </div>

                    <div class="p-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                        <span class="text-xs text-gray-400">Urutan: #{{ $c->order }}</span>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.cultures.edit', $c->id) }}" class="p-2 bg-blue-50 text-wikrama-blue hover:bg-wikrama-blue hover:text-white rounded-xl transition text-xs font-bold" title="Edit">
                                <i class="ri-edit-line text-base"></i>
                            </a>
                            <form action="{{ route('admin.cultures.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Hapus budaya ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-xl transition text-xs font-bold" title="Hapus">
                                    <i class="ri-delete-bin-line text-base"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 py-12 text-center text-gray-400 bg-white rounded-3xl border border-gray-200">
                    Belum ada data budaya sekolah.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
