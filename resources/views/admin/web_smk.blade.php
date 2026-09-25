@extends('admin.layout')

@section('title', 'Kelola Web Utama SMK')
@section('header_title', 'Pusat Pengelolaan Website Utama SMK')

@section('content')
<div class="space-y-10">
    <!-- Top Welcome Banner -->
    <div class="bg-gradient-to-r from-wikrama-dark via-wikrama-blue to-blue-900 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
        <div class="relative z-10 max-w-3xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-wider mb-3">
                <i class="ri-global-line text-cyan-300"></i> Halaman Pengendali Web Utama SMK Wikrama 1 Garut
            </span>
            <h2 class="text-3xl font-extrabold mb-2 font-heading leading-tight">Pusat Edit Web Utama SMK</h2>
            <p class="text-blue-100 text-sm leading-relaxed mb-6">
                Seluruh konten yang tayang di website resmi sekolah dapat dikontrol dari halaman ini. Klik tombol <strong class="text-white">"Edit Konten"</strong> pada masing-masing seksi untuk memperbarui teks, foto, maupun data sekolah secara langsung.
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('home') }}" target="_blank" class="px-5 py-2.5 bg-yellow-400 hover:bg-yellow-300 text-wikrama-dark font-black rounded-xl text-xs uppercase tracking-wider transition shadow-md flex items-center gap-2">
                    <i class="ri-external-link-line text-base"></i> Pratinjau Web Utama
                </a>
                <a href="{{ route('admin.spmb_manager') }}" class="px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white font-bold rounded-xl text-xs uppercase tracking-wider transition flex items-center gap-2">
                    <i class="ri-user-star-line text-base text-yellow-300"></i> Pindah ke Edit SPMB &rarr;
                </a>
            </div>
        </div>
    </div>

    <!-- 1. HALAMAN BERANDA (HOME /) -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-blue-50 text-wikrama-blue flex items-center justify-center text-xl font-bold">
                    <i class="ri-home-4-line"></i>
                </div>
                <div>
                    <h3 class="font-extrabold text-gray-900 text-lg">1. Halaman Beranda (Home - /)</h3>
                    <p class="text-xs text-gray-500">Banner Slider Hero, Sambutan Kepsek, Visi Misi, Rapor Mutu, Prestasi, dan Mitra.</p>
                </div>
            </div>
            <a href="{{ route('home') }}" target="_blank" class="text-xs font-bold text-wikrama-blue hover:underline flex items-center gap-1">
                Buka Beranda Live <i class="ri-arrow-right-up-line"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <!-- Hero Slider -->
            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200/80 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center text-base">
                            <i class="ri-slideshow-3-line"></i>
                        </span>
                        <span class="text-xs font-bold text-gray-500">{{ $homeSliders->count() }} Slider Aktif</span>
                    </div>
                    <h4 class="font-black text-gray-900 text-sm mb-1">Banner Hero Slider Beranda</h4>
                    <p class="text-xs text-gray-500 mb-4">Gambar latar depan, teks judul besar, dan tombol pendaftaran beranda.</p>
                </div>
                <a href="{{ route('admin.sliders.index') }}" class="w-full py-2.5 px-4 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition flex items-center justify-center gap-2">
                    <i class="ri-edit-line"></i> Kelola Slider Hero
                </a>
            </div>

            <!-- Logo Sekolah & Profil Utama -->
            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200/80 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <div class="w-8 h-8 rounded-xl bg-white border border-gray-200 p-0.5 flex items-center justify-center shadow-xs">
                            <img src="{{ asset(ltrim($profile->logo ?? '/assets/images/wikrama-logo-1.png', '/')) }}" alt="Logo Wikrama" class="w-full h-full object-contain" onerror="this.onerror=null; this.src='/assets/images/wikrama-logo-1.png';">
                        </div>
                        <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">Branding &amp; Profil</span>
                    </div>
                    <h4 class="font-black text-gray-900 text-sm mb-1">Logo Resmi &amp; Profil Sekolah</h4>
                    <p class="text-xs text-gray-500 mb-4">
                        Ganti logo sekolah Wikrama, nama instansi, sambutan &amp; foto kepala sekolah, serta kontak resmi.
                    </p>
                </div>
                <a href="{{ route('admin.profile.index') }}" class="w-full py-2.5 px-4 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition flex items-center justify-center gap-2">
                    <i class="ri-image-edit-line"></i> Ganti Logo &amp; Edit Profil
                </a>
            </div>

            <!-- Visi & Misi -->
            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200/80 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-base">
                            <i class="ri-compass-3-line"></i>
                        </span>
                        <span class="text-xs font-bold text-gray-500">Filosofi &amp; Visi</span>
                    </div>
                    <h4 class="font-black text-gray-900 text-sm mb-1">Visi, Misi &amp; Nilai Wikrama</h4>
                    <p class="text-xs text-gray-500 mb-4">Motto, butir-butir misi, dan nilai karakter sekolah.</p>
                </div>
                <a href="{{ route('admin.profile.index') }}" class="w-full py-2.5 px-4 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition flex items-center justify-center gap-2">
                    <i class="ri-edit-line"></i> Edit Visi &amp; Misi
                </a>
            </div>

            <!-- 12 Kartu Karakter, Budaya & Pembelajar Beranda -->
            <div class="p-5 rounded-2xl bg-indigo-50/60 border border-indigo-200/80 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center text-base">
                            <i class="ri-stack-line"></i>
                        </span>
                        <span class="text-xs font-bold text-indigo-700 bg-indigo-100 px-2 py-0.5 rounded-full">12 Kartu &amp; 3 Seksi</span>
                    </div>
                    <h4 class="font-black text-gray-900 text-sm mb-1">12 Kartu Karakter, Budaya &amp; Pembelajar</h4>
                    <p class="text-xs text-gray-500 mb-4">Lulusan, Budaya Kerja, Moving Class, Matrikulasi, Sistem Belajar Bertiga &amp; Tagline tombol CTA.</p>
                </div>
                <a href="{{ route('admin.home-features.index') }}" class="w-full py-2.5 px-4 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition flex items-center justify-center gap-2">
                    <i class="ri-edit-line"></i> Kelola 12 Kartu &amp; Header
                </a>
            </div>

            <!-- Rapor Pendidikan -->
            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200/80 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center text-base">
                            <i class="ri-bar-chart-box-line"></i>
                        </span>
                        <span class="text-xs font-bold text-teal-700 bg-teal-50 px-2 py-0.5 rounded-full">{{ $reports->count() }} Indikator</span>
                    </div>
                    <h4 class="font-black text-gray-900 text-sm mb-1">Rapor Mutu Kemdikbud</h4>
                    <p class="text-xs text-gray-500 mb-4">Persentase capaian literasi, numerasi, karakter, dan penyerapan lulusan.</p>
                </div>
                <a href="{{ route('admin.reports.index') }}" class="w-full py-2.5 px-4 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition flex items-center justify-center gap-2">
                    <i class="ri-edit-line"></i> Kelola Nilai Rapor
                </a>
            </div>

            <!-- Prestasi Sekolah & Siswa -->
            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200/80 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-xl bg-yellow-100 text-yellow-600 flex items-center justify-center text-base">
                            <i class="ri-trophy-line"></i>
                        </span>
                        <span class="text-xs font-bold text-yellow-700 bg-yellow-50 px-2 py-0.5 rounded-full">{{ $achievements->count() }} Prestasi</span>
                    </div>
                    <h4 class="font-black text-gray-900 text-sm mb-1">Prestasi Siswa &amp; Sekolah</h4>
                    <p class="text-xs text-gray-500 mb-4">Piala kejuaraan, medali LKS, sains, dan beasiswa internasional.</p>
                </div>
                <a href="{{ route('admin.achievements.index') }}" class="w-full py-2.5 px-4 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition flex items-center justify-center gap-2">
                    <i class="ri-edit-line"></i> Kelola Prestasi Siswa
                </a>
            </div>

            <!-- Mitra Industri -->
            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200/80 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-xl bg-green-100 text-green-600 flex items-center justify-center text-base">
                            <i class="ri-hand-heart-line"></i>
                        </span>
                        <span class="text-xs font-bold text-green-700 bg-green-50 px-2 py-0.5 rounded-full">{{ $partners->count() }} Mitra</span>
                    </div>
                    <h4 class="font-black text-gray-900 text-sm mb-1">Mitra Industri &amp; Kerjasama</h4>
                    <p class="text-xs text-gray-500 mb-4">Logo dan daftar perusahaan mitra DUDI untuk magang dan kerja.</p>
                </div>
                <a href="{{ route('admin.partners.index') }}" class="w-full py-2.5 px-4 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition flex items-center justify-center gap-2">
                    <i class="ri-edit-line"></i> Kelola Logo Mitra
                </a>
            </div>

            <!-- Artikel & Berita Terbaru di Beranda -->
            <div class="p-5 rounded-2xl bg-purple-50/60 border border-purple-200/80 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center text-base">
                            <i class="ri-newspaper-line"></i>
                        </span>
                        <span class="text-xs font-bold text-purple-700 bg-purple-100 px-2 py-0.5 rounded-full">{{ $latestNews->count() }} Berita</span>
                    </div>
                    <h4 class="font-black text-gray-900 text-sm mb-1">Artikel &amp; Berita Terbaru Beranda</h4>
                    <p class="text-xs text-gray-500 mb-4">Slider kartu artikel berita terbaru di beranda. Tambah atau edit berita untuk mengubahnya secara live.</p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.news.index') }}" class="flex-1 py-2.5 px-3 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition flex items-center justify-center gap-1">
                        <i class="ri-edit-line"></i> Edit Berita
                    </a>
                    <a href="{{ route('admin.news.create') }}" class="py-2.5 px-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold text-center transition flex items-center justify-center gap-1">
                        <i class="ri-add-line"></i> Tambah
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. HALAMAN KOMPETENSI KEAHLIAN (/kompetensi-keahlian) -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-orange-50 text-orange-600 flex items-center justify-center text-xl font-bold">
                    <i class="ri-book-read-line"></i>
                </div>
                <div>
                    <h3 class="font-extrabold text-gray-900 text-lg">2. Halaman Kompetensi Keahlian (/kompetensi-keahlian)</h3>
                    <p class="text-xs text-gray-500">Program kejuruan PPLG, TJKT, DKV, MPLB, BDP lengkap dengan peluang karir dan foto lab. Jurusan bisa diaktifkan/dinonaktifkan jika sudah ditutup.</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('majors') }}" target="_blank" class="text-xs font-bold text-wikrama-blue hover:underline">
                    Lihat Halaman Live <i class="ri-arrow-right-up-line"></i>
                </a>
                <a href="{{ route('admin.majors.create') }}" class="py-2 px-3 bg-orange-500 hover:bg-orange-600 text-white rounded-xl text-xs font-bold transition flex items-center gap-1">
                    <i class="ri-add-line"></i> Tambah Jurusan
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            @forelse($majors as $m)
                <div class="p-4 rounded-2xl border flex flex-col justify-between transition {{ $m->is_active ? 'bg-gray-50 border-gray-200' : 'bg-red-50/50 border-red-200 opacity-80' }}">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="w-9 h-9 rounded-xl bg-blue-100 text-wikrama-blue flex items-center justify-center text-xs font-bold">
                                {{ $m->short_name ?? substr($m->name, 0, 3) }}
                            </div>
                            <form action="{{ route('admin.majors.toggle', $m->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" title="Klik untuk ubah status aktif/nonaktif">
                                    @if($m->is_active)
                                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200 hover:bg-emerald-200 transition cursor-pointer">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-red-100 text-red-700 border border-red-200 hover:bg-red-200 transition cursor-pointer">
                                            Nonaktif
                                        </span>
                                    @endif
                                </button>
                            </form>
                        </div>
                        <h5 class="font-bold text-xs text-gray-900 mb-1 line-clamp-2">{{ $m->name }}</h5>
                        <span class="text-[10px] text-gray-400">Urutan #{{ $m->order }}</span>
                    </div>
                    <div class="mt-3 flex items-center gap-1.5">
                        <a href="{{ route('admin.majors.edit', $m->id) }}" class="flex-1 py-1.5 px-2 bg-white hover:bg-blue-50 text-wikrama-blue border border-gray-200 rounded-xl text-xs font-bold text-center transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.majors.toggle', $m->id) }}" method="POST" class="shrink-0">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="p-1.5 rounded-xl border {{ $m->is_active ? 'bg-amber-50 text-amber-700 border-amber-200 hover:bg-amber-100' : 'bg-emerald-50 text-emerald-700 border-emerald-200 hover:bg-emerald-100' }} text-xs font-bold" title="{{ $m->is_active ? 'Nonaktifkan Jurusan Ini' : 'Aktifkan Jurusan Ini' }}">
                                <i class="{{ $m->is_active ? 'ri-eye-off-line' : 'ri-eye-line' }}"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-6 text-center text-gray-400 text-xs">Belum ada jurusan.</div>
            @endforelse
        </div>
    </div>

    <!-- 3. HALAMAN BUDAYA SEKOLAH (/budaya) -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center text-xl font-bold">
                    <i class="ri-heart-pulse-line"></i>
                </div>
                <div>
                    <h3 class="font-extrabold text-gray-900 text-lg">3. Halaman Budaya Sekolah (/budaya)</h3>
                    <p class="text-xs text-gray-500">8 Kegiatan Pengembangan Akhlak Mulia (kotak foto kosong) dan 5 Nilai Budaya Utama.</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('culture') }}" target="_blank" class="text-xs font-bold text-wikrama-blue hover:underline">
                    Lihat Halaman Live <i class="ri-arrow-right-up-line"></i>
                </a>
                <a href="{{ route('admin.cultures.index') }}" class="py-2 px-3 bg-rose-500 hover:bg-rose-600 text-white rounded-xl text-xs font-bold transition flex items-center gap-1">
                    <i class="ri-edit-line"></i> Buka Editor Budaya &amp; Foto Akhlak
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <!-- 8 Kegiatan Akhlak -->
            <div class="p-5 rounded-2xl bg-orange-50/50 border border-orange-200">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="font-black text-gray-900 text-sm">8 Kegiatan Pengembangan Akhlak Mulia</h4>
                    <span class="text-xs font-bold text-orange-700 bg-orange-100 px-2 py-0.5 rounded-full">{{ $akhlakActivities->count() }} Kegiatan</span>
                </div>
                <p class="text-xs text-gray-600 mb-4">Tempat mengunggah foto pada 8 kotak kegiatan dan mengganti judul/kata-katanya.</p>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 mb-4">
                    @foreach($akhlakActivities->take(4) as $act)
                        <div class="p-2 bg-white rounded-xl border border-orange-100 text-center">
                            @if($act->image_url)
                                <div class="w-full h-12 rounded-lg bg-gray-100 overflow-hidden mb-1">
                                    <img src="{{ asset($act->image_url) }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="w-full h-12 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400 text-xs mb-1">
                                    <i class="ri-image-line"></i>
                                </div>
                            @endif
                            <div class="text-[10px] font-bold text-gray-800 truncate">{{ $act->title }}</div>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('admin.cultures.index') }}" class="block text-center py-2 px-3 bg-orange-600 hover:bg-orange-700 text-white rounded-xl text-xs font-bold transition">
                    Kelola 8 Foto &amp; Teks Kegiatan Akhlak &rarr;
                </a>
            </div>

            <!-- 5 Budaya Pembiasaan -->
            <div class="p-5 rounded-2xl bg-blue-50/50 border border-blue-200">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="font-black text-gray-900 text-sm">Budaya &amp; Karakter Utama Wikrama</h4>
                    <span class="text-xs font-bold text-blue-700 bg-blue-100 px-2 py-0.5 rounded-full">{{ $cultures->count() }} Budaya</span>
                </div>
                <p class="text-xs text-gray-600 mb-4">7 Kebiasaan Efektif, Matrikulasi, Moving Class, dan Shalat Berjamaah.</p>
                <div class="space-y-1.5 mb-4">
                    @foreach($cultures->take(3) as $c)
                        <div class="p-2 bg-white rounded-xl border border-blue-100 flex items-center justify-between text-xs">
                            <span class="font-bold text-gray-800">{{ $c->title }}</span>
                            <a href="{{ route('admin.cultures.edit', $c->id) }}" class="text-blue-600 font-bold hover:underline">Edit</a>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('admin.cultures.index') }}" class="block text-center py-2 px-3 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold transition">
                    Kelola Nilai Budaya Utama &rarr;
                </a>
            </div>
        </div>
    </div>

    <!-- 4. HALAMAN SUMBER DAYA & FASILITAS (/sumber-daya) -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-cyan-50 text-cyan-600 flex items-center justify-center text-xl font-bold">
                    <i class="ri-community-line"></i>
                </div>
                <div>
                    <h3 class="font-extrabold text-gray-900 text-lg">4. Halaman Sumber Daya &amp; Fasilitas (/sumber-daya)</h3>
                    <p class="text-xs text-gray-500">Sarana prasarana sekolah, laboratorium kejuruan, dan galeri media.</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('resources') }}" target="_blank" class="text-xs font-bold text-wikrama-blue hover:underline">
                    Lihat Halaman Live <i class="ri-arrow-right-up-line"></i>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            <!-- 1. Fasilitas -->
            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-xl bg-cyan-100 text-cyan-700 flex items-center justify-center">
                            <i class="ri-building-4-line"></i>
                        </span>
                        <span class="text-xs font-bold text-gray-500">{{ $facilities->count() }} Fasilitas</span>
                    </div>
                    <h4 class="font-black text-gray-900 text-sm mb-1">Fasilitas &amp; Sarana Prasarana</h4>
                    <p class="text-xs text-gray-500 mb-4">Ruang lab komputer, perhotelan, kelas, dan sarana belajar.</p>
                </div>
                <a href="{{ route('admin.facilities.index') }}" class="w-full py-2.5 px-3 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition">
                    Kelola Fasilitas
                </a>
            </div>

            <!-- 2. Dewan Guru & Tenaga Pendidik -->
            <div class="p-5 rounded-2xl bg-yellow-50/60 border border-yellow-200 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-xl bg-yellow-100 text-yellow-800 flex items-center justify-center font-bold">
                            <i class="ri-user-star-line text-lg"></i>
                        </span>
                        <span class="text-xs font-bold text-yellow-800 bg-yellow-100 px-2 py-0.5 rounded-full">{{ $teachers->count() }} Guru</span>
                    </div>
                    <h4 class="font-black text-gray-900 text-sm mb-1">Foto Dewan Guru &amp; Pendidik</h4>
                    <p class="text-xs text-gray-500 mb-3">Tampil di seksi Tenaga Pengajar (/sumber-daya). Ubah foto, nama, gelar, dan jabatan.</p>
                    
                    <!-- Avatar Preview -->
                    <div class="flex items-center -space-x-2 mb-4 overflow-hidden py-1">
                        @foreach($teachers->take(5) as $gt)
                            <div class="w-8 h-8 rounded-full border-2 border-white overflow-hidden bg-gray-200 shrink-0 shadow-sm" title="{{ $gt->name }}">
                                @if($gt->photo_url)
                                    <img src="{{ asset($gt->photo_url) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-blue-100 text-wikrama-blue flex items-center justify-center text-[10px] font-bold">
                                        {{ substr($gt->name, 0, 1) }}
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.teachers.index') }}" class="flex-1 py-2.5 px-2 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition">
                        Kelola Foto Guru
                    </a>
                    <a href="{{ route('admin.teachers.create') }}" class="py-2.5 px-2.5 bg-yellow-500 hover:bg-yellow-600 text-white rounded-xl text-xs font-bold transition">
                        + Tambah
                    </a>
                </div>
            </div>

            <!-- 3. Foto & Data Alumni (Sumber Daya) -->
            <div class="p-5 rounded-2xl bg-purple-50/60 border border-purple-200 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center font-bold">
                            <i class="ri-graduation-cap-line text-lg"></i>
                        </span>
                        <span class="text-xs font-bold text-purple-800 bg-purple-100 px-2 py-0.5 rounded-full">{{ $alumnis->count() }} Alumni</span>
                    </div>
                    <h4 class="font-black text-gray-900 text-sm mb-1">Data &amp; Foto Alumni</h4>
                    <p class="text-xs text-gray-500 mb-3">Tampil di seksi Alumni (/sumber-daya). Ubah nama, foto, perusahaan, profesi, dan kutipan.</p>

                    <!-- Avatar Preview -->
                    <div class="flex items-center -space-x-2 mb-4 overflow-hidden py-1">
                        @foreach($alumnis->take(6) as $alm)
                            <div class="w-8 h-8 rounded-full border-2 border-white overflow-hidden bg-gray-200 shrink-0 shadow-sm" title="{{ $alm->name }} - {{ $alm->profession }}">
                                @if($alm->photo_url)
                                    <img src="{{ asset($alm->photo_url) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-purple-100 text-purple-700 flex items-center justify-center text-[10px] font-bold">
                                        {{ substr($alm->name, 0, 1) }}
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.alumni.index') }}" class="flex-1 py-2.5 px-2 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition">
                        Kelola Data Alumni
                    </a>
                    <a href="{{ route('admin.alumni.create') }}" class="py-2.5 px-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-xs font-bold transition">
                        + Tambah
                    </a>
                </div>
            </div>

            <!-- 4. Galeri Media -->
            <div class="p-5 rounded-2xl bg-gray-50 border border-gray-200 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center">
                            <i class="ri-image-line"></i>
                        </span>
                        <span class="text-xs font-bold text-gray-500">{{ $galleries->count() }} Media</span>
                    </div>
                    <h4 class="font-black text-gray-900 text-sm mb-1">Galeri Foto &amp; Media</h4>
                    <p class="text-xs text-gray-500 mb-4">Dokumentasi kegiatan siswa, event sekolah, dan lingkungan kampus.</p>
                </div>
                <a href="{{ route('admin.gallery.index') }}" class="w-full py-2.5 px-3 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition">
                    Kelola Galeri Foto
                </a>
            </div>
        </div>
    </div>

    <!-- 5. HALAMAN TENTANG KAMI & BERITA (/tentang-kami & /berita) -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Tentang Kami -->
        <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl font-bold">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <div>
                            <h3 class="font-extrabold text-gray-900 text-base">5. Tentang Kami (/tentang-kami)</h3>
                            <p class="text-xs text-gray-500">Kontak, Alamat, &amp; Google Maps.</p>
                        </div>
                    </div>
                    <a href="{{ route('about') }}" target="_blank" class="text-xs font-bold text-wikrama-blue hover:underline">
                        Lihat Web <i class="ri-arrow-right-up-line"></i>
                    </a>
                </div>
                <div class="space-y-2 text-xs text-gray-600 mb-6">
                    <p><i class="ri-phone-line text-wikrama-blue mr-1"></i> <strong>Telepon:</strong> {{ $profile->phone ?? '0813-2331-4430' }}</p>
                    <p><i class="ri-whatsapp-line text-emerald-600 mr-1"></i> <strong>WhatsApp:</strong> {{ $profile->whatsapp ?? '6281323314430' }}</p>
                    <p><i class="ri-mail-line text-amber-600 mr-1"></i> <strong>Email:</strong> {{ $profile->email ?? 'info@smkwikrama1garut.sch.id' }}</p>
                    <p><i class="ri-map-pin-user-line text-rose-600 mr-1"></i> <strong>Alamat:</strong> {{ Str::limit($profile->address ?? 'Tarogong Kaler, Garut', 70) }}</p>
                </div>
            </div>
            <a href="{{ route('admin.profile.index') }}" class="w-full py-2.5 px-4 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition">
                Edit Kontak, Alamat &amp; Peta Google Maps
            </a>
        </div>

        <!-- Berita & Informasi -->
        <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl font-bold">
                            <i class="ri-newspaper-line"></i>
                        </div>
                        <div>
                            <h3 class="font-extrabold text-gray-900 text-base">6. Berita &amp; Informasi (/berita)</h3>
                            <p class="text-xs text-gray-500">Artikel &amp; Dokumentasi Kegiatan.</p>
                        </div>
                    </div>
                    <a href="{{ route('news') }}" target="_blank" class="text-xs font-bold text-wikrama-blue hover:underline">
                        Lihat Web <i class="ri-arrow-right-up-line"></i>
                    </a>
                </div>
                <div class="space-y-2 mb-6">
                    @foreach($latestNews->take(3) as $nw)
                        <div class="p-2 bg-gray-50 rounded-xl flex items-center justify-between text-xs">
                            <span class="font-bold text-gray-800 truncate mr-2">{{ $nw->title }}</span>
                            <a href="{{ route('admin.news.edit', $nw->id) }}" class="text-blue-600 font-bold hover:underline shrink-0">Edit</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.news.index') }}" class="flex-1 py-2.5 px-3 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition">
                    Kelola Semua Berita
                </a>
                <a href="{{ route('admin.news.create') }}" class="py-2.5 px-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold text-center transition">
                    + Tulis Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

