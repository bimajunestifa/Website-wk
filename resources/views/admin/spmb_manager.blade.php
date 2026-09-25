@extends('admin.layout')

@section('title', 'Kelola Landing SPMB')
@section('header_title', 'Pusat Pengelolaan Landing Page SPMB')

@section('content')
<div class="space-y-10">
    <!-- Top Welcome Banner -->
    <div class="bg-gradient-to-r from-amber-600 via-orange-600 to-amber-700 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
        <div class="relative z-10 max-w-3xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-wider mb-3">
                <i class="ri-user-star-line text-yellow-300"></i> Halaman Pengendali Khusus SPMB / PPDB
            </span>
            <h2 class="text-3xl font-extrabold mb-2 font-heading leading-tight">Pusat Edit Landing SPMB</h2>
            <p class="text-amber-100 text-sm leading-relaxed mb-6">
                Seluruh elemen yang tampil di halaman pendaftaran siswa baru (<a href="{{ route('spmb') }}" target="_blank" class="underline font-bold text-white">/spmb</a>) dapat dikontrol secara terpusat di sini: mulai dari Banner Hero pendaftaran, Motto &amp; Afirmasi, Prestasi unggulan, Testimoni alumni, hingga Kotak Masuk pendaftar.
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('spmb') }}" target="_blank" class="px-5 py-2.5 bg-wikrama-dark hover:bg-black text-white font-black rounded-xl text-xs uppercase tracking-wider transition shadow-md flex items-center gap-2">
                    <i class="ri-external-link-line text-base text-yellow-400"></i> Pratinjau Landing SPMB
                </a>
                <a href="{{ route('admin.web_smk') }}" class="px-5 py-2.5 bg-white/20 hover:bg-white/30 text-white font-bold rounded-xl text-xs uppercase tracking-wider transition flex items-center gap-2">
                    <i class="ri-global-line text-base"></i> Pindah ke Edit Web Utama &rarr;
                </a>
            </div>
        </div>
    </div>

    <!-- 1. BANNER HERO & SLIDER SPMB -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
            <div>
                <h3 class="font-extrabold text-gray-900 text-lg flex items-center gap-2">
                    <i class="ri-slideshow-3-line text-amber-500"></i> 1. Banner Slider Hero SPMB (/spmb)
                </h3>
                <p class="text-xs text-gray-500 mt-1">Banner utama paling atas: latar foto, teks judul penerimaan siswa baru, gelombang pendaftaran, dan tombol aksi.</p>
            </div>
            <a href="{{ route('admin.sliders.index') }}" class="py-2.5 px-4 bg-amber-500 hover:bg-amber-600 text-white rounded-xl text-xs font-bold transition flex items-center gap-2 shrink-0">
                <i class="ri-edit-line"></i> Kelola Slider SPMB
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse($spmbSliders as $s)
                <div class="rounded-2xl border border-gray-200 overflow-hidden bg-gray-50 flex flex-col justify-between">
                    <div class="relative h-40 bg-gray-200 overflow-hidden">
                        @if($s->image_url)
                            <img src="{{ asset($s->image_url) }}" alt="{{ $s->title }}" class="w-full h-full object-cover">
                        @endif
                        <span class="absolute top-2 right-2 px-2 py-0.5 bg-black/60 text-white text-[10px] font-bold rounded">
                            Urutan #{{ $s->order }}
                        </span>
                    </div>
                    <div class="p-4">
                        <h5 class="font-bold text-xs text-gray-900 mb-1 line-clamp-1">{{ $s->title }}</h5>
                        <p class="text-[11px] text-gray-500 line-clamp-2">{{ $s->subtitle }}</p>
                    </div>
                    <div class="p-3 bg-white border-t border-gray-100 text-right">
                        <a href="{{ route('admin.sliders.edit', $s->id) }}" class="text-xs font-bold text-wikrama-blue hover:underline">
                            Edit Banner Ini &rarr;
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-8 text-center text-gray-400 text-xs">
                    Belum ada slider khusus tipe SPMB.
                </div>
            @endforelse
        </div>
    </div>

    <!-- 2. MOTTO, AFIRMASI & ATTITUDE WIKRAMA DI SPMB -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
            <div>
                <h3 class="font-extrabold text-gray-900 text-lg flex items-center gap-2">
                    <i class="ri-heart-line text-rose-500"></i> 2. Nilai Wikrama di SPMB (Motto, Afirmasi &amp; Attitude)
                </h3>
                <p class="text-xs text-gray-500 mt-1">Tiga nilai utama yang ditampilkan tepat di bawah banner pendaftaran SPMB.</p>
            </div>
            <a href="{{ route('admin.profile.index') }}" class="py-2.5 px-4 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold transition flex items-center gap-2 shrink-0">
                <i class="ri-edit-line"></i> Edit Nilai-Nilai Ini
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="p-5 rounded-2xl bg-blue-50/60 border border-blue-100">
                <span class="text-[10px] font-black text-blue-600 uppercase tracking-wider block mb-1">Motto Sekolah</span>
                <p class="font-bold text-gray-900 text-sm italic">
                    "{{ $profile->motto ?? 'Ilmu yang Amaliah, Amal yang Ilmiah, Akhlakul Karimah' }}"
                </p>
            </div>
            <div class="p-5 rounded-2xl bg-amber-50/60 border border-amber-100">
                <span class="text-[10px] font-black text-amber-700 uppercase tracking-wider block mb-1">Afirmasi Wikrama</span>
                <p class="font-bold text-gray-900 text-sm italic">
                    "{{ $profile->afirmasi ?? 'Padamu negeri - kami berjanji - lulus Wikrama siap membangun negeri' }}"
                </p>
            </div>
            <div class="p-5 rounded-2xl bg-emerald-50/60 border border-emerald-100">
                <span class="text-[10px] font-black text-emerald-700 uppercase tracking-wider block mb-1">Attitude Wikrama</span>
                <p class="font-bold text-gray-900 text-sm italic">
                    "{{ $profile->attitude ?? 'Aku ada lingkunganku bahagia' }}"
                </p>
            </div>
        </div>
    </div>

    <!-- 3. PRESTASI & TESTIMONI DI SPMB -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Prestasi Unggulan SPMB -->
        <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-4">
                    <div>
                        <h3 class="font-extrabold text-gray-900 text-base flex items-center gap-2">
                            <i class="ri-trophy-line text-yellow-500"></i> 3. Prestasi Siswa di SPMB
                        </h3>
                        <p class="text-xs text-gray-500">Tampil di seksi Prestasi &amp; Kejuaraan halaman /spmb.</p>
                    </div>
                    <a href="{{ route('admin.achievements.index') }}" class="text-xs font-bold text-wikrama-blue hover:underline">
                        Kelola Semua ({{ $achievements->count() }})
                    </a>
                </div>

                <div class="space-y-3 mb-6">
                    @forelse($achievements->take(4) as $ach)
                        <div class="p-3 bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3 overflow-hidden">
                                @if($ach->image_url)
                                    <img src="{{ asset($ach->image_url) }}" class="w-12 h-10 object-cover rounded-lg shrink-0">
                                @else
                                    <div class="w-12 h-10 rounded-lg bg-yellow-100 text-yellow-700 flex items-center justify-center text-sm font-bold shrink-0">
                                        <i class="ri-trophy-fill"></i>
                                    </div>
                                @endif
                                <div class="overflow-hidden">
                                    <h5 class="font-bold text-xs text-gray-900 truncate">{{ $ach->title }}</h5>
                                    <span class="text-[10px] text-gray-500">{{ $ach->rank ?? 'Juara' }} • {{ $ach->event_year }}</span>
                                </div>
                            </div>
                            <a href="{{ route('admin.achievements.edit', $ach->id) }}" class="p-1.5 text-xs text-blue-600 font-bold hover:bg-blue-50 rounded-lg">
                                Edit
                            </a>
                        </div>
                    @empty
                        <p class="text-xs text-gray-400 py-4 text-center">Belum ada prestasi.</p>
                    @endforelse
                </div>
            </div>

            <div class="flex items-center gap-2 pt-2">
                <a href="{{ route('admin.achievements.index') }}" class="flex-1 py-2.5 px-3 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition">
                    Kelola Prestasi SPMB
                </a>
                <a href="{{ route('admin.achievements.create') }}" class="py-2.5 px-3 bg-yellow-500 hover:bg-yellow-600 text-white rounded-xl text-xs font-bold transition">
                    + Tambah Prestasi
                </a>
            </div>
        </div>

        <!-- Testimoni Alumni SPMB -->
        <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-4">
                    <div>
                        <h3 class="font-extrabold text-gray-900 text-base flex items-center gap-2">
                            <i class="ri-chat-quote-line text-sky-500"></i> 4. Testimoni Alumni SPMB
                        </h3>
                        <p class="text-xs text-gray-500">Kutipan sukses alumni yang tampil di carousel SPMB.</p>
                    </div>
                    <a href="{{ route('admin.testimonials.index') }}" class="text-xs font-bold text-wikrama-blue hover:underline">
                        Kelola Semua ({{ $testimonials->count() }})
                    </a>
                </div>

                <div class="space-y-3 mb-6">
                    @forelse($testimonials->take(4) as $t)
                        <div class="p-3 bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3 overflow-hidden">
                                <div class="w-10 h-10 rounded-full border border-sky-200 overflow-hidden bg-white shrink-0 shadow-sm flex items-center justify-center">
                                    @if($t->photo_url)
                                        <img src="{{ asset($t->photo_url) }}" alt="{{ $t->name }}" class="w-full h-full object-cover">
                                    @else
                                        <span class="text-xs font-bold text-sky-700">{{ substr($t->name, 0, 1) }}</span>
                                    @endif
                                </div>
                                <div class="overflow-hidden">
                                    <h5 class="font-bold text-xs text-gray-900 truncate">{{ $t->name }} ({{ $t->graduation_year ?? 'Alumni' }})</h5>
                                    <p class="text-[11px] text-gray-500 line-clamp-1 italic">"{{ $t->quote }}"</p>
                                </div>
                            </div>
                            <a href="{{ route('admin.testimonials.edit', $t->id) }}" class="p-1.5 text-xs text-blue-600 font-bold hover:bg-blue-50 rounded-lg shrink-0">
                                Edit
                            </a>
                        </div>
                    @empty
                        <p class="text-xs text-gray-400 py-4 text-center">Belum ada testimoni.</p>
                    @endforelse
                </div>
            </div>

            <div class="flex items-center gap-2 pt-2">
                <a href="{{ route('admin.testimonials.index') }}" class="flex-1 py-2.5 px-3 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold text-center transition">
                    Kelola Testimoni Alumni
                </a>
                <a href="{{ route('admin.testimonials.create') }}" class="py-2.5 px-3 bg-sky-600 hover:bg-sky-700 text-white rounded-xl text-xs font-bold transition">
                    + Tambah Testimoni
                </a>
            </div>
        </div>
    </div>

    <!-- 4. TAUTAN PENDAFTARAN ONLINE & BROSUR -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
            <div>
                <h3 class="font-extrabold text-gray-900 text-lg flex items-center gap-2">
                    <i class="ri-links-line text-indigo-500"></i> 5. Tautan Pendaftaran Online &amp; Unduh Brosur
                </h3>
                <p class="text-xs text-gray-500 mt-1">Tautan tujuan tombol "Daftar Sekarang" dan tombol "Download Brosur" di landing SPMB.</p>
            </div>
            <a href="{{ route('admin.profile.index') }}" class="py-2.5 px-4 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-xs font-bold transition flex items-center gap-2 shrink-0">
                <i class="ri-edit-line"></i> Ubah Tautan Ini
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 rounded-2xl bg-gray-50 border border-gray-200">
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-1">Tautan Pendaftaran Online</span>
                <a href="{{ $profile->spmb_url ?? 'https://spmb.smkwikrama1garut.sch.id' }}" target="_blank" class="text-xs font-bold text-blue-600 hover:underline break-all">
                    {{ $profile->spmb_url ?? 'https://spmb.smkwikrama1garut.sch.id' }}
                </a>
            </div>
            <div class="p-4 rounded-2xl bg-gray-50 border border-gray-200">
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block mb-1">Tautan Download Brosur</span>
                <a href="{{ $profile->brochure_url ?? 'http://brosur.smkwikrama1garut.sch.id/' }}" target="_blank" class="text-xs font-bold text-blue-600 hover:underline break-all">
                    {{ $profile->brochure_url ?? 'http://brosur.smkwikrama1garut.sch.id/' }}
                </a>
            </div>
        </div>
    </div>

    <!-- 5. KOTAK MASUK PENDAFTARAN & PESAN SPMB -->
    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-gray-100 gap-3">
            <div>
                <h3 class="font-extrabold text-gray-900 text-lg flex items-center gap-2">
                    <i class="ri-mail-unread-line text-rose-500"></i> 6. Pendaftar &amp; Pesan Masuk SPMB Terbaru
                    @if($unreadMessagesCount > 0)
                        <span class="px-2 py-0.5 bg-red-500 text-white text-xs font-black rounded-full animate-pulse">
                            {{ $unreadMessagesCount }} Belum Dibaca
                        </span>
                    @endif
                </h3>
                <p class="text-xs text-gray-500 mt-1">Data calon siswa atau wali yang mengisi form konsultasi / pendaftaran di halaman SPMB.</p>
            </div>
            <a href="{{ route('admin.messages.index') }}" class="text-xs font-bold text-wikrama-blue hover:underline">
                Lihat Seluruh Pesan Masuk &rarr;
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-gray-200 text-gray-400 uppercase text-[10px] font-bold">
                        <th class="py-3 px-3">Nama Pendaftar</th>
                        <th class="py-3 px-3">No. WhatsApp / HP</th>
                        <th class="py-3 px-3">Email</th>
                        <th class="py-3 px-3">Isi Pesan</th>
                        <th class="py-3 px-3">Waktu Masuk</th>
                        <th class="py-3 px-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($spmbMessages as $msg)
                        <tr class="hover:bg-gray-50/80 transition {{ !$msg->is_read ? 'bg-blue-50/30 font-semibold' : '' }}">
                            <td class="py-3 px-3 font-bold text-gray-900">
                                {{ $msg->name }}
                                @if(!$msg->is_read)
                                    <span class="ml-1 px-1.5 py-0.5 bg-rose-500 text-white text-[9px] font-bold rounded">Baru</span>
                                @endif
                            </td>
                            <td class="py-3 px-3">
                                @if($msg->phone)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $msg->phone) }}" target="_blank" class="text-emerald-600 font-bold hover:underline flex items-center gap-1">
                                        <i class="ri-whatsapp-line"></i> {{ $msg->phone }}
                                    </a>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="py-3 px-3 text-gray-600">{{ $msg->email ?? '-' }}</td>
                            <td class="py-3 px-3 text-gray-600 max-w-xs truncate">{{ $msg->message }}</td>
                            <td class="py-3 px-3 text-gray-400 text-[11px] whitespace-nowrap">{{ $msg->created_at->diffForHumans() }}</td>
                            <td class="py-3 px-3 text-right">
                                <a href="{{ route('admin.messages.show', $msg->id) }}" class="text-blue-600 font-bold hover:underline">
                                    Buka Pesan
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-6 text-center text-gray-400">Belum ada pesan pendaftaran SPMB.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

