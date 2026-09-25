@extends('admin.layout')

@section('title', 'Kelola Profil & Visi Misi')
@section('header_title', 'Profil Sekolah & Visi Misi')

@section('content')
<div class="space-y-8 max-w-5xl">
    <!-- Profil Sekolah Form -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-8">
        <div class="flex items-center justify-between pb-6 mb-6 border-b border-gray-100">
            <div>
                <h2 class="text-xl font-black text-gray-900">Identitas Sekolah & Kepala Sekolah</h2>
                <p class="text-xs text-gray-500 mt-1">Ubah nama resmi sekolah, filosofi, kontak, tautan pendaftaran, serta data kepala sekolah.</p>
            </div>
            <span class="px-3 py-1 bg-blue-50 text-wikrama-blue rounded-full text-xs font-bold">Profil Utama</span>
        </div>

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Sekolah <span class="text-red-500">*</span></label>
                    <input type="text" name="school_name" value="{{ old('school_name', $profile->school_name ?? 'SMK Wikrama 1 Garut') }}" required 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Tagline / Slogan</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $profile->tagline ?? '') }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
            </div>

            <!-- Logo Sekolah (Logo Wikrama) -->
            <div class="p-6 bg-purple-50/50 rounded-2xl border border-purple-100 space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="font-extrabold text-sm text-gray-900 flex items-center gap-2">
                        <i class="bx bx-image text-[#696cff] text-lg"></i> Logo Resmi Sekolah (Tampil di Sidebar Admin, Header &amp; Footer)
                    </h3>
                    <span class="text-xs font-bold text-[#696cff] bg-purple-100 px-2.5 py-0.5 rounded-full">Branding</span>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-6">
                    <div class="relative w-24 h-24 rounded-2xl bg-white border-2 border-purple-200 p-2 shadow-sm shrink-0 flex items-center justify-center">
                        <img src="{{ asset(ltrim($profile->logo ?? '/assets/images/wikrama-logo-1.png', '/')) }}" alt="Logo Wikrama" class="w-full h-full object-contain" onerror="this.onerror=null; this.src='/assets/images/wikrama-logo-1.png';">
                    </div>
                    <div class="flex-1 space-y-3 w-full">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Unggah Logo Baru</label>
                            <input type="file" name="logo_file" accept="image/png,image/jpeg,image/webp,image/svg+xml"
                                   class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#696cff] file:text-white hover:file:bg-indigo-700 file:cursor-pointer transition">
                            <p class="text-[11px] text-gray-500 mt-1">Format: PNG, WEBP, SVG, atau JPG transparan. Ukuran disarankan rasio 1:1 (persegi). Maksimal 4MB.</p>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Atau Gunakan Tautan / Path URL Logo</label>
                            <input type="text" name="logo" value="{{ old('logo', $profile->logo ?? '/assets/images/wikrama-logo-1.png') }}"
                                   placeholder="/assets/images/wikrama-logo-1.png"
                                   class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#696cff] outline-none text-xs transition bg-white">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nilai-Nilai Wikrama (Motto, Afirmasi, Attitude) -->
            <div class="p-6 bg-blue-50/50 rounded-2xl border border-blue-100 space-y-4">
                <h3 class="font-extrabold text-sm text-gray-900 flex items-center gap-2">
                    <i class="ri-heart-line text-wikrama-blue"></i> Motto, Afirmasi & Nilai Wikrama (Sesuai SPMB & Beranda)
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Motto</label>
                        <input type="text" name="motto" value="{{ old('motto', $profile->motto ?? 'Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Afirmasi</label>
                        <input type="text" name="afirmasi" value="{{ old('afirmasi', $profile->afirmasi ?? 'Padamu negeri - kami berjanji - lulus Wikrama siap membangun negeri') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Attitude</label>
                        <input type="text" name="attitude" value="{{ old('attitude', $profile->attitude ?? 'Aku ada lingkunganku bahagia') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white">
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Filosofi Pendidikan</label>
                <textarea name="philosophy" rows="3" 
                          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">{{ old('philosophy', $profile->philosophy ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Deskripsi Lengkap Sekolah</label>
                <textarea name="description" rows="4" 
                          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">{{ old('description', $profile->description ?? '') }}</textarea>
            </div>

            <!-- Principal Section -->
            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-200 space-y-4">
                <h3 class="font-extrabold text-sm text-gray-900 flex items-center gap-2">
                    <i class="ri-user-star-line text-wikrama-blue"></i> Data Kepala Sekolah
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Nama Kepala Sekolah</label>
                        <input type="text" name="principal_name" value="{{ old('principal_name', $profile->principal_name ?? 'Kunedi, S.Si.') }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Jabatan / Gelar</label>
                        <input type="text" name="principal_title" value="{{ old('principal_title', $profile->principal_title ?? 'Kepala SMK Wikrama 1 Garut') }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">URL Foto Kepala Sekolah</label>
                        <input type="url" name="principal_image" value="{{ old('principal_image', $profile->principal_image ?? '') }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Atau Unggah Foto Baru</label>
                        <input type="file" name="principal_image_file" accept="image/*" 
                               class="w-full text-xs text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-wikrama-blue file:text-white hover:file:bg-wikrama-dark file:cursor-pointer transition">
                    </div>
                </div>
            </div>

            <!-- Contact & Social Media Info -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">No. Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $profile->phone ?? '0813-2331-4430') }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">WhatsApp</label>
                    <input type="text" name="whatsapp" value="{{ old('whatsapp', $profile->whatsapp ?? '6281323314430') }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Email Resmi</label>
                    <input type="email" name="email" value="{{ old('email', $profile->email ?? 'info@smkwikrama1garut.sch.id') }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
                </div>
            </div>

            <!-- Pengaturan Banner PMB Beranda -->
            <div class="p-6 bg-amber-50/40 rounded-2xl border border-amber-200 space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="font-extrabold text-sm text-gray-900 flex items-center gap-2">
                        <i class="ri-megaphone-line text-amber-600 text-lg"></i> Banner Pengumuman PMB (Tampil di Beranda Website)
                    </h3>
                    <span class="text-xs font-bold text-amber-700 bg-amber-100 px-2.5 py-0.5 rounded-full">Beranda Utama</span>
                </div>
                <p class="text-xs text-gray-500">Sesuaikan poster, teks ajakan pendaftaran siswa baru, dan tombol pendaftaran yang muncul di halaman depan.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Judul Banner PMB</label>
                        <input type="text" name="pmb_banner_title" value="{{ old('pmb_banner_title', $profile->pmb_banner_title ?? 'PMB Gelombang 1 Resmi Dibuka !') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue outline-none text-sm transition bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Subjudul / Keterangan Gelombang</label>
                        <input type="text" name="pmb_banner_subtitle" value="{{ old('pmb_banner_subtitle', $profile->pmb_banner_subtitle ?? 'Pendaftaran Peserta Didik Baru (PPDB) SMK Wikrama 1 Garut') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue outline-none text-sm transition bg-white">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Isi Pesan / Narasi Pengumuman PMB</label>
                    <textarea name="pmb_banner_text" rows="3" placeholder="Ayo segera daftarkan dirimu dan bergabung bersama SMK Wikrama 1 Garut..."
                              class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue outline-none text-sm transition bg-white">{{ old('pmb_banner_text', $profile->pmb_banner_text ?? '') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Teks Tombol Aksi</label>
                        <input type="text" name="pmb_banner_btn_text" value="{{ old('pmb_banner_btn_text', $profile->pmb_banner_btn_text ?? 'Daftar sekarang') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue outline-none text-sm transition bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Tautan / Link Tombol</label>
                        <input type="text" name="pmb_banner_btn_url" value="{{ old('pmb_banner_btn_url', $profile->pmb_banner_btn_url ?? '/spmb') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue outline-none text-sm transition bg-white">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-6 pt-2">
                    <div class="w-32 h-20 rounded-xl bg-gray-100 border border-gray-300 overflow-hidden shrink-0 flex items-center justify-center">
                        <img src="{{ $profile->pmb_banner_image ?? '/assets/images/558651258_18389940643130368_6632104292343839978_n.jpg' }}" alt="Banner PMB" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 space-y-2 w-full">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Unggah Poster Banner PMB Baru</label>
                            <input type="file" name="pmb_banner_image_file" accept="image/*"
                                   class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-amber-600 file:text-white hover:file:bg-amber-700 file:cursor-pointer transition">
                        </div>
                        <div>
                            <input type="text" name="pmb_banner_image" value="{{ old('pmb_banner_image', $profile->pmb_banner_image ?? '') }}" placeholder="Atau masukkan path / URL gambar poster"
                                   class="w-full px-4 py-2 rounded-xl border border-gray-300 text-xs focus:ring-2 focus:ring-amber-500 outline-none bg-white">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Video Profil & Thumbnail Poster -->
            <div class="p-6 bg-gray-50 rounded-2xl border border-gray-200 space-y-4">
                <h3 class="font-extrabold text-sm text-gray-900 flex items-center gap-2">
                    <i class="ri-video-line text-wikrama-blue"></i> Video Profil Sekolah & Thumbnail (Beranda)
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Tautan Video YouTube</label>
                        <input type="url" name="video_url" value="{{ old('video_url', $profile->video_url ?? 'https://www.youtube.com/watch?v=XVoDV4ry3HA') }}" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue text-sm outline-none transition bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">URL Poster / Thumbnail Video</label>
                        <input type="text" name="video_thumbnail" value="{{ old('video_thumbnail', $profile->video_thumbnail ?? '') }}" placeholder="/assets/images/video-thumb.jpg"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue text-sm outline-none transition bg-white">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Atau Unggah Gambar Thumbnail Video Baru</label>
                    <input type="file" name="video_thumbnail_file" accept="image/*"
                           class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-wikrama-blue file:text-white hover:file:bg-wikrama-dark file:cursor-pointer transition">
                </div>
            </div>

            <!-- Akun Media Sosial Resmi Sekolah -->
            <div class="p-6 bg-blue-50/40 rounded-2xl border border-blue-200 space-y-4">
                <h3 class="font-extrabold text-sm text-gray-900 flex items-center gap-2">
                    <i class="ri-share-line text-wikrama-blue"></i> Akun Media Sosial Resmi (Tampil di Footer Semua Halaman)
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2"><i class="ri-facebook-box-fill text-blue-600 mr-1"></i> URL Facebook</label>
                        <input type="url" name="facebook_url" value="{{ old('facebook_url', $profile->facebook_url ?? 'https://www.facebook.com/smkwikrama1garut') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue text-sm outline-none transition bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2"><i class="ri-instagram-line text-pink-600 mr-1"></i> URL Instagram</label>
                        <input type="url" name="instagram_url" value="{{ old('instagram_url', $profile->instagram_url ?? 'https://www.instagram.com/smkwikrama1garut/') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue text-sm outline-none transition bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2"><i class="ri-twitter-x-line text-gray-800 mr-1"></i> URL Twitter / X</label>
                        <input type="url" name="twitter_url" value="{{ old('twitter_url', $profile->twitter_url ?? '') }}" placeholder="https://twitter.com/..."
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue text-sm outline-none transition bg-white">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2"><i class="ri-youtube-line text-red-600 mr-1"></i> URL Channel YouTube</label>
                        <input type="url" name="youtube_url" value="{{ old('youtube_url', $profile->youtube_url ?? 'https://www.youtube.com/@smkwikrama1garut') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue text-sm outline-none transition bg-white">
                    </div>
                </div>
            </div>

            <!-- Links: SPMB, Brosur, Maps -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Tautan Portal SPMB</label>
                    <input type="url" name="spmb_url" value="{{ old('spmb_url', $profile->spmb_url ?? 'https://spmb.smkwikrama1garut.sch.id') }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue text-sm outline-none transition">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Tautan Download Brosur</label>
                    <input type="url" name="brochure_url" value="{{ old('brochure_url', $profile->brochure_url ?? 'http://brosur.smkwikrama1garut.sch.id/') }}" 
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue text-sm outline-none transition">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Alamat Lengkap Sekolah</label>
                <textarea name="address" rows="2" 
                          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">{{ old('address', $profile->address ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">URL Google Maps Embed</label>
                <input type="text" name="maps_embed_url" value="{{ old('maps_embed_url', $profile->maps_embed_url ?? '') }}" 
                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
            </div>

            <div class="pt-4 flex justify-end">
                <button type="submit" class="px-6 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-xl text-xs uppercase tracking-wider shadow-lg transition flex items-center gap-2">
                    <i class="ri-save-line text-base"></i> Simpan Profil Sekolah
                </button>
            </div>
        </form>
    </div>

    <!-- Visi & Misi Form -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-8">
        <div class="flex items-center justify-between pb-6 mb-6 border-b border-gray-100">
            <div>
                <h2 class="text-xl font-black text-gray-900">Visi, Misi & Motto Sekolah</h2>
                <p class="text-xs text-gray-500 mt-1">Ubah visi, butir-butir misi (satu baris per poin), dan motto SMK Wikrama 1 Garut.</p>
            </div>
            <span class="px-3 py-1 bg-amber-50 text-wikrama-gold rounded-full text-xs font-bold">Visi & Misi</span>
        </div>

        <form action="{{ route('admin.profile.vision_mission') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Visi Sekolah <span class="text-red-500">*</span></label>
                <textarea name="vision" rows="4" required 
                          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">{{ old('vision', $visionMission->vision ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Misi Sekolah (Pisahkan setiap butir misi dengan Enter/Baris Baru)</label>
                @php
                    $missionText = is_array($visionMission->mission) ? implode("\n", $visionMission->mission) : ($visionMission->mission ?? '');
                @endphp
                <textarea name="mission_items" rows="6" placeholder="Mendidik anak bangsa...&#10;Menyelenggarakan pendidikan..." 
                          class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">{{ old('mission_items', $missionText) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Motto Sekolah <span class="text-red-500">*</span></label>
                <input type="text" name="motto" value="{{ old('motto', $visionMission->motto ?? 'Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah') }}" required 
                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue focus:border-wikrama-blue outline-none text-sm transition">
            </div>

            <div class="pt-4 flex justify-end">
                <button type="submit" class="px-6 py-3 bg-wikrama-gold hover:bg-amber-500 text-wikrama-dark font-black rounded-xl text-xs uppercase tracking-wider shadow-lg transition flex items-center gap-2">
                    <i class="ri-check-line text-base"></i> Simpan Visi, Misi & Motto
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

