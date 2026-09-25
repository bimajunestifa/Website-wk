@extends('admin.layout')

@section('title', 'Kelola Kartu Nilai & Karakter Beranda')
@section('header_title', 'Kelola Kartu Nilai & Karakter Beranda (12 Kartu)')

@section('content')
<div class="space-y-8">
    <!-- Header Banner -->
    <div class="bg-gradient-to-r from-wikrama-dark via-wikrama-blue to-blue-900 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
        <div class="relative z-10 max-w-3xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-wider mb-3">
                <i class="bx bx-star text-warning"></i> Pusat Nilai Unggulan, Budaya &amp; Karakter Beranda
            </span>
            <h2 class="text-3xl font-extrabold mb-2 font-heading leading-tight">Pengelolaan 12 Kartu Karakter, Budaya &amp; Pembelajar Beranda</h2>
            <p class="text-blue-100 text-sm leading-relaxed mb-6">
                Halaman ini mengontrol 3 blok seksi nilai sekolah di Beranda website resmi: 
                <strong class="text-white">1. Pendidikan Karakter</strong>, 
                <strong class="text-white">2. Budaya Sekolah</strong>, dan 
                <strong class="text-white">3. Masyarakat Pembelajar</strong>. Anda dapat mengubah foto, judul, deskripsi, link, serta teks tagline dan judul masing-masing seksi.
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('home') }}" target="_blank" class="px-5 py-2.5 bg-yellow-400 hover:bg-yellow-300 text-wikrama-dark font-black rounded-xl text-xs uppercase tracking-wider transition shadow-md flex items-center gap-2">
                    <i class="bx bx-link-external text-base"></i> Pratinjau di Beranda Live
                </a>
                <a href="{{ route('admin.web_smk') }}" class="px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white font-bold rounded-xl text-xs uppercase tracking-wider transition flex items-center gap-2">
                    <i class="bx bx-arrow-back text-base"></i> Kembali ke Pusat Web SMK
                </a>
            </div>
        </div>
    </div>

    <!-- FORM: EDIT JUDUL & TAGLINE 3 SEKSI -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8">
        <div class="flex items-center gap-3 pb-4 mb-6 border-b border-gray-100">
            <div class="w-10 h-10 rounded-2xl bg-purple-50 text-wikrama-blue flex items-center justify-center text-xl font-bold">
                <i class="bx bx-heading"></i>
            </div>
            <div>
                <h3 class="font-extrabold text-gray-900 text-lg">Judul Tagline &amp; Tombol Ketiga Seksi Beranda</h3>
                <p class="text-xs text-gray-500">Sesuaikan teks judul besar dan tombol ajakan bertindak (Call to Action) di beranda.</p>
            </div>
        </div>

        <form action="{{ route('admin.home-features.headers') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Seksi 1: Karakter -->
                <div class="p-5 rounded-2xl bg-blue-50/50 border border-blue-100 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-sm font-bold text-wikrama-blue">
                            <span class="w-6 h-6 rounded-full bg-wikrama-blue text-white flex items-center justify-center text-xs">1</span>
                            <span>Seksi Karakter (Blok 1)</span>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                                Judul Tagline Seksi 1
                            </label>
                            <textarea name="character_section_title" rows="2" class="w-full text-sm rounded-xl border border-gray-300 p-3 focus:ring-2 focus:ring-wikrama-blue focus:outline-none" placeholder="Tiada pendidikan bermutu, tanpa pendidikan karakter">{{ old('character_section_title', $profile->character_section_title ?? "Tiada pendidikan bermutu,\ntanpa pendidikan karakter") }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 gap-3">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Teks Tombol</label>
                                <input type="text" name="character_section_btn_text" value="{{ old('character_section_btn_text', $profile->character_section_btn_text ?? 'Daftar Sekarang') }}" class="w-full text-sm rounded-xl border border-gray-300 p-2.5 focus:ring-2 focus:ring-wikrama-blue outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Link URL Tombol</label>
                                <input type="text" name="character_section_btn_url" value="{{ old('character_section_btn_url', $profile->character_section_btn_url ?? '/spmb') }}" class="w-full text-sm rounded-xl border border-gray-300 p-2.5 focus:ring-2 focus:ring-wikrama-blue outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seksi 2: Budaya Sekolah -->
                <div class="p-5 rounded-2xl bg-amber-50/50 border border-amber-100 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-sm font-bold text-amber-700">
                            <span class="w-6 h-6 rounded-full bg-amber-600 text-white flex items-center justify-center text-xs">2</span>
                            <span>Seksi Budaya Sekolah (Blok 2)</span>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                                Judul Tagline Seksi 2
                            </label>
                            <textarea name="culture_section_title" rows="2" class="w-full text-sm rounded-xl border border-gray-300 p-3 focus:ring-2 focus:ring-wikrama-blue focus:outline-none" placeholder="Tiada pendidikan karakter, tanpa budaya sekolah">{{ old('culture_section_title', $profile->culture_section_title ?? 'Tiada pendidikan karakter, tanpa budaya sekolah') }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 gap-3">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Teks Tombol</label>
                                <input type="text" name="culture_section_btn_text" value="{{ old('culture_section_btn_text', $profile->culture_section_btn_text ?? 'Pelajari Lebih Lanjut ->') }}" class="w-full text-sm rounded-xl border border-gray-300 p-2.5 focus:ring-2 focus:ring-wikrama-blue outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Link URL Tombol</label>
                                <input type="text" name="culture_section_btn_url" value="{{ old('culture_section_btn_url', $profile->culture_section_btn_url ?? '/spmb') }}" class="w-full text-sm rounded-xl border border-gray-300 p-2.5 focus:ring-2 focus:ring-wikrama-blue outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seksi 3: Masyarakat Pembelajar -->
                <div class="p-5 rounded-2xl bg-emerald-50/50 border border-emerald-100 space-y-4 flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-sm font-bold text-emerald-700">
                            <span class="w-6 h-6 rounded-full bg-emerald-600 text-white flex items-center justify-center text-xs">3</span>
                            <span>Seksi Masyarakat Pembelajar (Blok 3)</span>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Sub-judul Kecil Atas</label>
                            <input type="text" name="learning_section_subtitle" value="{{ old('learning_section_subtitle', $profile->learning_section_subtitle ?? 'SMK Wikrama 1 Garut') }}" class="w-full text-sm rounded-xl border border-gray-300 p-2.5 focus:ring-2 focus:ring-wikrama-blue outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                                Judul Tagline Seksi 3
                            </label>
                            <textarea name="learning_section_title" rows="3" class="w-full text-sm rounded-xl border border-gray-300 p-3 focus:ring-2 focus:ring-wikrama-blue focus:outline-none" placeholder="Tiada masyarakat pembelajar sekolah, tanpa pemimpin perubahan sekolah...">{{ old('learning_section_title', $profile->learning_section_title ?? 'Tiada masyarakat pembelajar sekolah, tanpa pemimpin perubaban sekolah, dan tanpa kesungguhan warga sekolah') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="px-6 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl font-bold text-sm shadow-md transition flex items-center gap-2">
                    <i class="bx bx-save text-lg"></i> Simpan Semua Judul &amp; Tombol Seksi
                </button>
            </div>
        </form>
    </div>

    <!-- SEKSI 1: 4 KARTU KARAKTER -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-blue-50 text-wikrama-blue flex items-center justify-center text-xl font-bold">
                    <i class="bx bx-user-check"></i>
                </div>
                <div>
                    <h3 class="font-extrabold text-gray-900 text-lg">Seksi 1: 4 Kartu Pendidikan Karakter</h3>
                    <p class="text-xs text-gray-500">Lulusan, Pengelolaan, Guru, dan Budaya yang tayang berdampingan dengan tagline karakter.</p>
                </div>
            </div>
            <span class="text-xs font-bold text-wikrama-blue bg-blue-50 px-3 py-1 rounded-full">
                {{ $karakterCards->count() }} Kartu Terdaftar
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($karakterCards as $card)
            <div class="bg-gray-50 rounded-2xl border border-gray-200/80 overflow-hidden flex flex-col justify-between hover:shadow-lg transition">
                <div>
                    <!-- Image Preview -->
                    <div class="relative h-44 bg-gray-200 overflow-hidden group">
                        <img src="{{ asset(ltrim($card->image_url, '/')) }}" alt="{{ $card->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute top-2 left-2 flex gap-1">
                            <span class="px-2 py-0.5 bg-black/60 backdrop-blur-sm text-white rounded-md text-[10px] font-bold">
                                Urutan #{{ $card->order }}
                            </span>
                        </div>
                        <div class="absolute top-2 right-2">
                            @if($card->is_active)
                                <span class="px-2 py-0.5 bg-emerald-500 text-white rounded-md text-[10px] font-bold shadow">
                                    Aktif
                                </span>
                            @else
                                <span class="px-2 py-0.5 bg-gray-500 text-white rounded-md text-[10px] font-bold shadow">
                                    Nonaktif
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <h4 class="font-black text-gray-900 text-base mb-2 flex items-center justify-between">
                            <span>{{ $card->title }}</span>
                        </h4>
                        <p class="text-xs text-gray-600 leading-relaxed mb-4">
                            {{ $card->description }}
                        </p>
                        @if($card->link_url)
                            <div class="text-[11px] text-wikrama-blue font-medium bg-blue-50 p-2 rounded-lg truncate mb-2">
                                <i class="bx bx-link"></i> {{ $card->link_url }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Actions -->
                <div class="p-4 bg-white border-t border-gray-100 flex items-center justify-between gap-2">
                    <form action="{{ route('admin.home-features.toggle', $card->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="px-2.5 py-1.5 rounded-lg text-xs font-bold transition {{ $card->is_active ? 'bg-amber-50 text-amber-600 hover:bg-amber-100' : 'bg-emerald-50 text-emerald-600 hover:bg-emerald-100' }}">
                            {{ $card->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>
                    </form>
                    <a href="{{ route('admin.home-features.edit', $card->id) }}" class="px-3 py-1.5 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-lg text-xs font-bold flex items-center gap-1.5 transition">
                        <i class="bx bx-edit"></i> Edit Kartu
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- SEKSI 2: 4 KARTU BUDAYA SEKOLAH -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl font-bold">
                    <i class="bx bx-heart"></i>
                </div>
                <div>
                    <h3 class="font-extrabold text-gray-900 text-lg">Seksi 2: 4 Kartu Budaya Sekolah</h3>
                    <p class="text-xs text-gray-500">Suasana, LMS, Kurikulum, dan Teaching Factory yang tayang berdampingan dengan tagline budaya.</p>
                </div>
            </div>
            <span class="text-xs font-bold text-amber-700 bg-amber-50 px-3 py-1 rounded-full">
                {{ $budayaCards->count() }} Kartu Terdaftar
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($budayaCards as $card)
            <div class="bg-gray-50 rounded-2xl border border-gray-200/80 overflow-hidden flex flex-col justify-between hover:shadow-lg transition">
                <div>
                    <!-- Image Preview -->
                    <div class="relative h-44 bg-gray-200 overflow-hidden group">
                        <img src="{{ asset(ltrim($card->image_url, '/')) }}" alt="{{ $card->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute top-2 left-2 flex gap-1">
                            <span class="px-2 py-0.5 bg-black/60 backdrop-blur-sm text-white rounded-md text-[10px] font-bold">
                                Urutan #{{ $card->order }}
                            </span>
                        </div>
                        <div class="absolute top-2 right-2">
                            @if($card->is_active)
                                <span class="px-2 py-0.5 bg-emerald-500 text-white rounded-md text-[10px] font-bold shadow">
                                    Aktif
                                </span>
                            @else
                                <span class="px-2 py-0.5 bg-gray-500 text-white rounded-md text-[10px] font-bold shadow">
                                    Nonaktif
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <h4 class="font-black text-gray-900 text-base mb-2 flex items-center justify-between">
                            <span>{{ $card->title }}</span>
                        </h4>
                        <p class="text-xs text-gray-600 leading-relaxed mb-4">
                            {{ $card->description }}
                        </p>
                        @if($card->link_url)
                            <div class="text-[11px] text-wikrama-blue font-medium bg-blue-50 p-2 rounded-lg truncate mb-2">
                                <i class="bx bx-link"></i> {{ $card->link_url }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Actions -->
                <div class="p-4 bg-white border-t border-gray-100 flex items-center justify-between gap-2">
                    <form action="{{ route('admin.home-features.toggle', $card->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="px-2.5 py-1.5 rounded-lg text-xs font-bold transition {{ $card->is_active ? 'bg-amber-50 text-amber-600 hover:bg-amber-100' : 'bg-emerald-50 text-emerald-600 hover:bg-emerald-100' }}">
                            {{ $card->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>
                    </form>
                    <a href="{{ route('admin.home-features.edit', $card->id) }}" class="px-3 py-1.5 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-lg text-xs font-bold flex items-center gap-1.5 transition">
                        <i class="bx bx-edit"></i> Edit Kartu
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- SEKSI 3: 4 KARTU MASYARAKAT PEMBELAJAR SEKOLAH -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
                    <i class="bx bx-group"></i>
                </div>
                <div>
                    <h3 class="font-extrabold text-gray-900 text-lg">Seksi 3: 4 Kartu Masyarakat Pembelajar Sekolah</h3>
                    <p class="text-xs text-gray-500">Program Matrikulasi, Lulusan, Moving Class, dan Sistem Belajar Bertiga yang tayang di beranda.</p>
                </div>
            </div>
            <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full">
                {{ $pembelajarCards->count() }} Kartu Terdaftar
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($pembelajarCards as $card)
            <div class="bg-gray-50 rounded-2xl border border-gray-200/80 overflow-hidden flex flex-col justify-between hover:shadow-lg transition">
                <div>
                    <!-- Image Preview -->
                    <div class="relative h-44 bg-gray-200 overflow-hidden group">
                        <img src="{{ asset(ltrim($card->image_url, '/')) }}" alt="{{ $card->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute top-2 left-2 flex gap-1">
                            <span class="px-2 py-0.5 bg-black/60 backdrop-blur-sm text-white rounded-md text-[10px] font-bold">
                                Urutan #{{ $card->order }}
                            </span>
                        </div>
                        <div class="absolute top-2 right-2">
                            @if($card->is_active)
                                <span class="px-2 py-0.5 bg-emerald-500 text-white rounded-md text-[10px] font-bold shadow">
                                    Aktif
                                </span>
                            @else
                                <span class="px-2 py-0.5 bg-gray-500 text-white rounded-md text-[10px] font-bold shadow">
                                    Nonaktif
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5">
                        <h4 class="font-black text-gray-900 text-base mb-2 flex items-center justify-between">
                            <span>{{ $card->title }}</span>
                        </h4>
                        <p class="text-xs text-gray-600 leading-relaxed mb-4">
                            {{ $card->description }}
                        </p>
                        @if($card->link_url)
                            <div class="text-[11px] text-wikrama-blue font-medium bg-blue-50 p-2 rounded-lg truncate mb-2">
                                <i class="bx bx-link"></i> {{ $card->link_url }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Actions -->
                <div class="p-4 bg-white border-t border-gray-100 flex items-center justify-between gap-2">
                    <form action="{{ route('admin.home-features.toggle', $card->id) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="px-2.5 py-1.5 rounded-lg text-xs font-bold transition {{ $card->is_active ? 'bg-amber-50 text-amber-600 hover:bg-amber-100' : 'bg-emerald-50 text-emerald-600 hover:bg-emerald-100' }}">
                            {{ $card->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>
                    </form>
                    <a href="{{ route('admin.home-features.edit', $card->id) }}" class="px-3 py-1.5 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-lg text-xs font-bold flex items-center gap-1.5 transition">
                        <i class="bx bx-edit"></i> Edit Kartu
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
