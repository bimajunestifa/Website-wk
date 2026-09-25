@extends('admin.layout')

@section('title', 'Dashboard')
@section('header_title', 'Pusat Kendali Pengelolaan Konten Website')

@section('content')
<div class="space-y-8">
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-wikrama-dark via-wikrama-blue to-blue-900 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-yellow-400/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10 max-w-3xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-wider mb-3">
                <i class="ri-shield-check-fill text-yellow-300"></i> Administrator Resmi • CMS SMK Wikrama 1 Garut
            </span>
            <h2 class="text-3xl font-extrabold mb-2 font-heading leading-tight">Panel Pengelolaan SMK Wikrama 1 Garut</h2>
            <p class="text-blue-100 text-sm leading-relaxed mb-6">
                Seluruh halaman website publik (Beranda, SPMB, Kompetensi Keahlian, Sumber Daya, Budaya, Tentang Kami, dan Berita) dapat diedit dan dikelola secara terstruktur melalui panel ini.
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.sliders.index') }}" class="px-5 py-2.5 bg-yellow-400 hover:bg-yellow-300 text-wikrama-dark font-black rounded-xl text-xs uppercase tracking-wider transition shadow-md flex items-center gap-2">
                    <i class="ri-slideshow-3-line text-base"></i> Kelola Slider Hero &amp; SPMB
                </a>
                <a href="{{ route('admin.profile.index') }}" class="px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white font-bold rounded-xl text-xs uppercase tracking-wider transition flex items-center gap-2">
                    <i class="ri-image-line text-base text-cyan-300"></i> Logo &amp; Profil Sekolah
                </a>
                <a href="{{ route('admin.messages.index') }}" class="px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white font-bold rounded-xl text-xs uppercase tracking-wider transition flex items-center gap-2">
                    <i class="ri-mail-unread-line text-base text-emerald-300"></i> Pesan Masuk PPDB
                    @if(($stats['messages_unread_count'] ?? 0) > 0)
                        <span class="bg-rose-500 text-white text-[10px] px-1.5 py-0.5 rounded-full">{{ $stats['messages_unread_count'] }}</span>
                    @endif
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Stats Grid (10 Modules) -->
    <div>
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                <i class="ri-dashboard-line text-wikrama-blue"></i> Ringkasan Data Konten Aktif
            </h3>
            <span class="text-xs text-gray-500 font-medium">10 Modul CMS Terintegrasi</span>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-10 gap-3">
            <!-- Sliders -->
            <a href="{{ route('admin.sliders.index') }}" class="bg-white p-3.5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-200 transition group text-center flex flex-col justify-between">
                <div class="w-9 h-9 mx-auto rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-lg mb-2 group-hover:scale-110 transition">
                    <i class="ri-slideshow-3-line"></i>
                </div>
                <div>
                    <div class="text-lg font-black text-gray-800">{{ $stats['sliders_count'] ?? 0 }}</div>
                    <div class="text-[11px] text-gray-500 font-medium">Banner Hero</div>
                </div>
            </a>

            <!-- Jurusan -->
            <a href="{{ route('admin.majors.index') }}" class="bg-white p-3.5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-200 transition group text-center flex flex-col justify-between">
                <div class="w-9 h-9 mx-auto rounded-xl bg-blue-50 text-wikrama-blue flex items-center justify-center text-lg mb-2 group-hover:scale-110 transition">
                    <i class="ri-book-read-line"></i>
                </div>
                <div>
                    <div class="text-lg font-black text-gray-800">{{ $stats['majors_count'] ?? 0 }}</div>
                    <div class="text-[11px] text-gray-500 font-medium">Jurusan</div>
                </div>
            </a>

            <!-- Rapor Pendidikan -->
            <a href="{{ route('admin.reports.index') }}" class="bg-white p-3.5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-200 transition group text-center flex flex-col justify-between">
                <div class="w-9 h-9 mx-auto rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-lg mb-2 group-hover:scale-110 transition">
                    <i class="ri-bar-chart-box-line"></i>
                </div>
                <div>
                    <div class="text-lg font-black text-gray-800">{{ $stats['reports_count'] ?? 0 }}</div>
                    <div class="text-[11px] text-gray-500 font-medium">Rapor Mutu</div>
                </div>
            </a>

            <!-- Prestasi -->
            <a href="{{ route('admin.achievements.index') }}" class="bg-white p-3.5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-200 transition group text-center flex flex-col justify-between">
                <div class="w-9 h-9 mx-auto rounded-xl bg-yellow-50 text-yellow-600 flex items-center justify-center text-lg mb-2 group-hover:scale-110 transition">
                    <i class="ri-trophy-line"></i>
                </div>
                <div>
                    <div class="text-lg font-black text-gray-800">{{ $stats['achievements_count'] ?? 0 }}</div>
                    <div class="text-[11px] text-gray-500 font-medium">Prestasi</div>
                </div>
            </a>

            <!-- Fasilitas -->
            <a href="{{ route('admin.facilities.index') }}" class="bg-white p-3.5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-200 transition group text-center flex flex-col justify-between">
                <div class="w-9 h-9 mx-auto rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-lg mb-2 group-hover:scale-110 transition">
                    <i class="ri-community-line"></i>
                </div>
                <div>
                    <div class="text-lg font-black text-gray-800">{{ $stats['facilities_count'] ?? 0 }}</div>
                    <div class="text-[11px] text-gray-500 font-medium">Fasilitas</div>
                </div>
            </a>

            <!-- Budaya -->
            <a href="{{ route('admin.cultures.index') }}" class="bg-white p-3.5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-200 transition group text-center flex flex-col justify-between">
                <div class="w-9 h-9 mx-auto rounded-xl bg-rose-50 text-rose-500 flex items-center justify-center text-lg mb-2 group-hover:scale-110 transition">
                    <i class="ri-heart-pulse-line"></i>
                </div>
                <div>
                    <div class="text-lg font-black text-gray-800">{{ $stats['cultures_count'] ?? 0 }}</div>
                    <div class="text-[11px] text-gray-500 font-medium">Budaya</div>
                </div>
            </a>

            <!-- Galeri -->
            <a href="{{ route('admin.gallery.index') }}" class="bg-white p-3.5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-200 transition group text-center flex flex-col justify-between">
                <div class="w-9 h-9 mx-auto rounded-xl bg-emerald-50 text-emerald-500 flex items-center justify-center text-lg mb-2 group-hover:scale-110 transition">
                    <i class="ri-image-line"></i>
                </div>
                <div>
                    <div class="text-lg font-black text-gray-800">{{ $stats['galleries_count'] ?? 0 }}</div>
                    <div class="text-[11px] text-gray-500 font-medium">Galeri Foto</div>
                </div>
            </a>

            <!-- Testimoni -->
            <a href="{{ route('admin.testimonials.index') }}" class="bg-white p-3.5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-200 transition group text-center flex flex-col justify-between">
                <div class="w-9 h-9 mx-auto rounded-xl bg-sky-50 text-sky-500 flex items-center justify-center text-lg mb-2 group-hover:scale-110 transition">
                    <i class="ri-chat-quote-line"></i>
                </div>
                <div>
                    <div class="text-lg font-black text-gray-800">{{ $stats['testimonials_count'] ?? 0 }}</div>
                    <div class="text-[11px] text-gray-500 font-medium">Testimoni</div>
                </div>
            </a>

            <!-- Berita -->
            <a href="{{ route('admin.news.index') }}" class="bg-white p-3.5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-200 transition group text-center flex flex-col justify-between">
                <div class="w-9 h-9 mx-auto rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-lg mb-2 group-hover:scale-110 transition">
                    <i class="ri-newspaper-line"></i>
                </div>
                <div>
                    <div class="text-lg font-black text-gray-800">{{ $stats['news_count'] ?? 0 }}</div>
                    <div class="text-[11px] text-gray-500 font-medium">Berita</div>
                </div>
            </a>

            <!-- Pesan PPDB -->
            <a href="{{ route('admin.messages.index') }}" class="bg-white p-3.5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-200 transition group text-center flex flex-col justify-between">
                <div class="w-9 h-9 mx-auto rounded-xl bg-red-50 text-red-600 flex items-center justify-center text-lg mb-2 group-hover:scale-110 transition">
                    <i class="ri-mail-unread-line"></i>
                </div>
                <div>
                    <div class="text-lg font-black text-gray-800">{{ $stats['messages_total_count'] ?? 0 }}</div>
                    <div class="text-[11px] text-gray-500 font-medium">Pesan Masuk</div>
                </div>
            </a>
        </div>
    </div>

    <!-- PETA STRUKTUR KELOLA KONTEN WEBSITE (7 HALAMAN RESMI) -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-sm">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 mb-6 border-b border-gray-100 gap-3">
            <div>
                <h3 class="text-xl font-black text-gray-900 flex items-center gap-2">
                    <i class="ri-layout-masonry-line text-wikrama-blue"></i>
                    Struktur Kelola Konten Berdasarkan Halaman Web
                </h3>
                <p class="text-xs text-gray-500 mt-1">
                    Setiap halaman web publik memiliki modul pengelola konten masing-masing. Klik tombol kelola untuk memperbarui konten langsung.
                </p>
            </div>
            <span class="px-3.5 py-1.5 bg-blue-50 text-wikrama-blue rounded-full text-xs font-bold shrink-0">
                7 Halaman Publik Terhubung
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- 1. Halaman Beranda -->
            <div class="p-5 rounded-2xl border border-gray-200 bg-gray-50/50 hover:bg-white hover:border-blue-300 hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-2.5 py-0.5 rounded-md text-[11px] font-bold bg-blue-100 text-wikrama-blue">Halaman Utama</span>
                        <a href="{{ route('home') }}" target="_blank" class="text-xs text-blue-600 hover:underline flex items-center gap-1 font-semibold">
                            Lihat Web <i class="ri-external-link-line"></i>
                        </a>
                    </div>
                    <h4 class="font-black text-gray-900 text-base mb-1">Beranda (Home)</h4>
                    <p class="text-xs text-gray-500 mb-4">Route: <code class="text-wikrama-blue font-bold">/</code></p>
                    <div class="space-y-1.5 text-xs text-gray-600 mb-4">
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Banner Slider Hero Utama</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Sambutan Kepala Sekolah &amp; Video Profil</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Rapor Mutu Pendidikan Kemdikbud</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Marquee Logo Mitra Industri</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Prestasi, Jurusan, Budaya &amp; Berita</div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 pt-3 border-t border-gray-200/80">
                    <a href="{{ route('admin.sliders.index', ['type' => 'home']) }}" class="px-3 py-1.5 bg-wikrama-blue text-white rounded-lg text-xs font-bold hover:bg-wikrama-dark transition">Edit Slider</a>
                    <a href="{{ route('admin.news.index') }}" class="px-3 py-1.5 bg-purple-600 text-white rounded-lg text-xs font-bold hover:bg-purple-700 transition">Edit Berita</a>
                    <a href="{{ route('admin.profile.index') }}" class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-xs font-bold hover:bg-gray-50 transition">Edit Profil</a>
                    <a href="{{ route('admin.reports.index') }}" class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-xs font-bold hover:bg-gray-50 transition">Rapor</a>
                </div>
            </div>

            <!-- 2. Halaman SPMB / PPDB -->
            <div class="p-5 rounded-2xl border border-gray-200 bg-gray-50/50 hover:bg-white hover:border-yellow-400 hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-2.5 py-0.5 rounded-md text-[11px] font-bold bg-amber-100 text-amber-800">Pendaftaran</span>
                        <a href="{{ route('spmb') }}" target="_blank" class="text-xs text-amber-700 hover:underline flex items-center gap-1 font-semibold">
                            Lihat SPMB <i class="ri-external-link-line"></i>
                        </a>
                    </div>
                    <h4 class="font-black text-gray-900 text-base mb-1">Landing Page SPMB / PPDB</h4>
                    <p class="text-xs text-gray-500 mb-4">Route: <code class="text-wikrama-blue font-bold">/spmb</code> &amp; <code class="text-wikrama-blue font-bold">/ppdb</code></p>
                    <div class="space-y-1.5 text-xs text-gray-600 mb-4">
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Banner Hero SPMB 2026/2027</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Kartu Motto, Afirmasi &amp; Attitude</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Kartu 4 Pilihan Jurusan Keahlian</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Testimoni Sukses Para Alumni</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Form Pendaftaran &amp; Pesan Masuk</div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 pt-3 border-t border-gray-200/80">
                    <a href="{{ route('admin.sliders.index', ['type' => 'spmb']) }}" class="px-3 py-1.5 bg-yellow-400 text-wikrama-dark rounded-lg text-xs font-bold hover:bg-yellow-300 transition">Slider SPMB</a>
                    <a href="{{ route('admin.testimonials.index') }}" class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-xs font-bold hover:bg-gray-50 transition">Testimoni</a>
                    <a href="{{ route('admin.messages.index') }}" class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-xs font-bold hover:bg-gray-50 transition">Pendaftar</a>
                </div>
            </div>

            <!-- 3. Halaman Kompetensi Keahlian -->
            <div class="p-5 rounded-2xl border border-gray-200 bg-gray-50/50 hover:bg-white hover:border-blue-300 hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-2.5 py-0.5 rounded-md text-[11px] font-bold bg-blue-100 text-wikrama-blue">Program Keahlian</span>
                        <a href="{{ route('majors') }}" target="_blank" class="text-xs text-blue-600 hover:underline flex items-center gap-1 font-semibold">
                            Lihat Jurusan <i class="ri-external-link-line"></i>
                        </a>
                    </div>
                    <h4 class="font-black text-gray-900 text-base mb-1">Kompetensi Keahlian</h4>
                    <p class="text-xs text-gray-500 mb-4">Route: <code class="text-wikrama-blue font-bold">/kompetensi-keahlian</code></p>
                    <div class="space-y-1.5 text-xs text-gray-600 mb-4">
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Profil 4 Jurusan Vokasi Resmi</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> PPLG, TJKT, DKV, MPLB &amp; Pariwisata</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Deskripsi, Keunggulan &amp; Prospek Karir</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Foto Dokumentasi &amp; Praktik Siswa</div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 pt-3 border-t border-gray-200/80">
                    <a href="{{ route('admin.majors.index') }}" class="px-4 py-1.5 bg-wikrama-blue text-white rounded-lg text-xs font-bold hover:bg-wikrama-dark transition flex items-center gap-1">
                        <i class="ri-edit-line"></i> Kelola Jurusan
                    </a>
                </div>
            </div>

            <!-- 4. Halaman Sumber Daya -->
            <div class="p-5 rounded-2xl border border-gray-200 bg-gray-50/50 hover:bg-white hover:border-purple-300 hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-2.5 py-0.5 rounded-md text-[11px] font-bold bg-purple-100 text-purple-800">Sarpras &amp; Guru</span>
                        <a href="{{ route('resources') }}" target="_blank" class="text-xs text-purple-700 hover:underline flex items-center gap-1 font-semibold">
                            Lihat Halaman <i class="ri-external-link-line"></i>
                        </a>
                    </div>
                    <h4 class="font-black text-gray-900 text-base mb-1">Sumber Daya Sekolah</h4>
                    <p class="text-xs text-gray-500 mb-4">Route: <code class="text-wikrama-blue font-bold">/sumber-daya</code></p>
                    <div class="space-y-1.5 text-xs text-gray-600 mb-4">
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Dewan Guru &amp; Tenaga Kependidikan</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Rekam Jejak Sukses Alumni Sekolah</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Sarana Prasarana &amp; Lab Komputer</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Galeri Fasilitas &amp; Ruang Belajar</div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 pt-3 border-t border-gray-200/80">
                    <a href="{{ route('admin.facilities.index') }}" class="px-3 py-1.5 bg-wikrama-blue text-white rounded-lg text-xs font-bold hover:bg-wikrama-dark transition">Fasilitas</a>
                    <a href="{{ route('admin.teachers.index') }}" class="px-3 py-1.5 bg-yellow-400 text-wikrama-dark rounded-lg text-xs font-black hover:bg-yellow-300 transition">Dewan Guru</a>
                    <a href="{{ route('admin.testimonials.index') }}" class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-xs font-bold hover:bg-gray-50 transition">Alumni</a>
                    <a href="{{ route('admin.gallery.index') }}" class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-xs font-bold hover:bg-gray-50 transition">Galeri</a>
                </div>
            </div>

            <!-- 5. Halaman Budaya -->
            <div class="p-5 rounded-2xl border border-gray-200 bg-gray-50/50 hover:bg-white hover:border-rose-300 hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-2.5 py-0.5 rounded-md text-[11px] font-bold bg-rose-100 text-rose-800">Karakter Siswa</span>
                        <a href="{{ route('culture') }}" target="_blank" class="text-xs text-rose-700 hover:underline flex items-center gap-1 font-semibold">
                            Lihat Budaya <i class="ri-external-link-line"></i>
                        </a>
                    </div>
                    <h4 class="font-black text-gray-900 text-base mb-1">Budaya Sekolah</h4>
                    <p class="text-xs text-gray-500 mb-4">Route: <code class="text-wikrama-blue font-bold">/budaya</code></p>
                    <div class="space-y-1.5 text-xs text-gray-600 mb-4">
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Nilai 7 Kebiasaan Siswa Efektif</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Pembiasaan Sikap 5R &amp; 5S</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Green School &amp; Budaya Ramah Lingkungan</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Pembinaan Akhlaq &amp; Shalat Berjamaah</div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 pt-3 border-t border-gray-200/80">
                    <a href="{{ route('admin.cultures.index') }}" class="px-4 py-1.5 bg-wikrama-blue text-white rounded-lg text-xs font-bold hover:bg-wikrama-dark transition flex items-center gap-1">
                        <i class="ri-edit-line"></i> Kelola Budaya Sekolah
                    </a>
                </div>
            </div>

            <!-- 6. Halaman Tentang Kami -->
            <div class="p-5 rounded-2xl border border-gray-200 bg-gray-50/50 hover:bg-white hover:border-emerald-300 hover:shadow-md transition flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-2.5 py-0.5 rounded-md text-[11px] font-bold bg-emerald-100 text-emerald-800">Kontak &amp; Lokasi</span>
                        <a href="{{ route('about') }}" target="_blank" class="text-xs text-emerald-700 hover:underline flex items-center gap-1 font-semibold">
                            Lihat Halaman <i class="ri-external-link-line"></i>
                        </a>
                    </div>
                    <h4 class="font-black text-gray-900 text-base mb-1">Tentang Kami &amp; Kontak</h4>
                    <p class="text-xs text-gray-500 mb-4">Route: <code class="text-wikrama-blue font-bold">/tentang-kami</code></p>
                    <div class="space-y-1.5 text-xs text-gray-600 mb-4">
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Nomor Telepon &amp; Tautan WhatsApp</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Alamat Email Resmi Sekolah</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Alamat Fisik Kampus Tarogong Kaler</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Titik Lokasi Peta (Google Maps Embed)</div>
                        <div class="flex items-center gap-2"><i class="ri-check-line text-emerald-500"></i> Form Pertanyaan &amp; Pesan Masuk</div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 pt-3 border-t border-gray-200/80">
                    <a href="{{ route('admin.profile.index') }}" class="px-3 py-1.5 bg-wikrama-blue text-white rounded-lg text-xs font-bold hover:bg-wikrama-dark transition">Edit Kontak &amp; Peta</a>
                    <a href="{{ route('admin.messages.index') }}" class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-xs font-bold hover:bg-gray-50 transition">Kotak Pesan</a>
                </div>
            </div>

            <!-- 7. Halaman Berita & Artikel -->
            <div class="p-5 rounded-2xl border border-gray-200 bg-gray-50/50 hover:bg-white hover:border-teal-300 hover:shadow-md transition flex flex-col justify-between md:col-span-2 lg:col-span-3">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-2.5 py-0.5 rounded-md text-[11px] font-bold bg-teal-100 text-teal-800">Publikasi Sekolah</span>
                            <span class="text-xs text-gray-500">Route: <code class="text-wikrama-blue font-bold">/berita</code> &amp; <code class="text-wikrama-blue font-bold">/berita/{slug}</code></span>
                        </div>
                        <h4 class="font-black text-gray-900 text-base mb-1">Berita, Artikel &amp; Informasi Kegiatan</h4>
                        <p class="text-xs text-gray-600 max-w-2xl">
                            Kelola publikasi kegiatan siswa, prestasi lomba, kunjungan studi tiru, pengumuman kelulusan, dan agenda sekolah. Artikel otomatis tampil di Beranda dan Halaman Berita.
                        </p>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <a href="{{ route('admin.news.create') }}" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition flex items-center gap-1.5 shadow-sm">
                            <i class="ri-add-line text-sm"></i> Tulis Berita
                        </a>
                        <a href="{{ route('admin.news.index') }}" class="px-4 py-2 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold transition flex items-center gap-1.5 shadow-sm">
                            <i class="ri-list-check"></i> Kelola Semua Berita
                        </a>
                        <a href="{{ route('news') }}" target="_blank" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-xs font-bold transition flex items-center gap-1">
                            Buka Berita <i class="ri-external-link-line"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Active Banner Sliders Snapshot -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-sm">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 mb-6 border-b border-gray-100 gap-2">
            <div>
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <i class="ri-slideshow-3-line text-amber-500"></i> Banner Slider Aktif (Beranda &amp; SPMB)
                </h3>
                <p class="text-xs text-gray-500 mt-0.5">Banner ini berputar otomatis pada halaman hero Beranda Utama &amp; Landing Page SPMB.</p>
            </div>
            <a href="{{ route('admin.sliders.index') }}" class="text-xs text-wikrama-blue font-bold hover:underline flex items-center gap-1">
                Kelola Semua Banner ({{ $stats['sliders_count'] ?? 0 }}) <i class="ri-arrow-right-line"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse(\App\Models\Slider::orderBy('order')->take(4)->get() as $s)
                <div class="border border-gray-200 rounded-2xl overflow-hidden shadow-sm group bg-white flex flex-col justify-between hover:border-blue-300 transition">
                    <div>
                        <div class="h-32 bg-gray-100 overflow-hidden relative">
                            <img src="{{ $s->image_url }}" alt="{{ $s->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            <div class="absolute top-2 left-2 bg-wikrama-dark/85 text-white text-[10px] px-2 py-0.5 rounded font-bold">
                                {{ strtoupper($s->type ?? 'home') }} • #{{ $s->order }}
                            </div>
                        </div>
                        <div class="p-3.5">
                            <h4 class="font-bold text-xs text-gray-900 line-clamp-1 mb-1">{{ $s->title }}</h4>
                            <p class="text-[11px] text-gray-500 line-clamp-2 leading-relaxed">{{ $s->subtitle ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="px-3.5 py-2.5 bg-gray-50 border-t border-gray-100 flex items-center justify-between text-xs">
                        <span class="text-[10px] font-semibold {{ $s->is_active ? 'text-emerald-600' : 'text-gray-400' }}">
                            {{ $s->is_active ? '● Aktif' : '○ Non-aktif' }}
                        </span>
                        <a href="{{ route('admin.sliders.edit', $s->id) }}" class="text-wikrama-blue font-bold hover:underline">Edit Banner</a>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-400 col-span-4 py-8 text-center">Belum ada banner slider.</p>
            @endforelse
        </div>
    </div>

    <!-- Latest Messages & News Snapshot -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Messages -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between pb-4 mb-4 border-b border-gray-100">
                    <h3 class="font-bold text-gray-900 text-base flex items-center gap-2">
                        <i class="ri-mail-unread-line text-rose-500"></i> Pesan Masuk Terbaru (PPDB &amp; Kontak)
                    </h3>
                    <a href="{{ route('admin.messages.index') }}" class="text-xs text-wikrama-blue font-bold hover:underline">
                        Lihat Semua ({{ $stats['messages_total_count'] ?? 0 }})
                    </a>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($latestMessages as $msg)
                        <div class="py-3 flex items-start justify-between gap-3">
                            <div>
                                <div class="font-bold text-xs text-gray-900">
                                    {{ $msg->name }}
                                    <span class="font-normal text-gray-400 text-[11px]">({{ $msg->phone ?? $msg->email }})</span>
                                </div>
                                <p class="text-xs text-gray-600 line-clamp-1 mt-0.5">{{ $msg->message }}</p>
                                <span class="text-[10px] text-gray-400">{{ $msg->created_at->diffForHumans() }}</span>
                            </div>
                            <a href="{{ route('admin.messages.show', $msg) }}" class="px-2.5 py-1 text-xs font-semibold rounded-lg bg-blue-50 text-wikrama-blue hover:bg-blue-100 transition shrink-0">
                                Baca
                            </a>
                        </div>
                    @empty
                        <p class="text-xs text-gray-400 py-6 text-center">Belum ada pesan masuk.</p>
                    @endforelse
                </div>
            </div>
            <div class="pt-4 border-t border-gray-100 text-right">
                <a href="{{ route('admin.messages.index') }}" class="text-xs font-bold text-wikrama-blue hover:underline">
                    Buka Kotak Masuk Lengkap &rarr;
                </a>
            </div>
        </div>

        <!-- Latest News -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between pb-4 mb-4 border-b border-gray-100">
                    <h3 class="font-bold text-gray-900 text-base flex items-center gap-2">
                        <i class="ri-newspaper-line text-teal-600"></i> Berita &amp; Informasi Terbaru
                    </h3>
                    <a href="{{ route('admin.news.index') }}" class="text-xs text-wikrama-blue font-bold hover:underline">
                        Semua Berita ({{ $stats['news_count'] ?? 0 }})
                    </a>
                </div>
                <div class="divide-y divide-gray-100">
                    @forelse($latestNews as $item)
                        <div class="py-3 flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-12 h-10 rounded-lg object-cover bg-gray-100 shrink-0">
                                <div>
                                    <h4 class="font-bold text-xs text-gray-900 line-clamp-1">{{ $item->title }}</h4>
                                    <span class="text-[10px] text-gray-400">{{ $item->published_at ? $item->published_at->format('d M Y') : 'Draft' }} • {{ $item->category }}</span>
                                </div>
                            </div>
                            <a href="{{ route('admin.news.edit', $item) }}" class="text-xs text-blue-600 font-bold hover:underline shrink-0">Edit</a>
                        </div>
                    @empty
                        <p class="text-xs text-gray-400 py-6 text-center">Belum ada berita.</p>
                    @endforelse
                </div>
            </div>
            <div class="pt-4 border-t border-gray-100 text-right">
                <a href="{{ route('admin.news.create') }}" class="text-xs font-bold text-emerald-600 hover:underline">
                    + Tulis Artikel Berita Baru
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
