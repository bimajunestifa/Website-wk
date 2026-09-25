@extends('admin.layout')

@section('title', 'Kelola Dewan Guru & Tenaga Pendidik')
@section('header_title', 'Kelola Dewan Guru & Tenaga Pendidik')

@section('content')
<div class="space-y-6">
    <!-- Header Banner -->
    <div class="bg-gradient-to-r from-wikrama-dark via-wikrama-blue to-blue-900 rounded-3xl p-6 md:p-8 text-white shadow-xl relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-wider mb-2">
                    <i class="ri-user-star-line text-yellow-300"></i> Sumber Daya Manusia Sekolah
                </span>
                <h2 class="text-2xl md:text-3xl font-extrabold font-heading">Dewan Guru & Tenaga Pendidik</h2>
                <p class="text-blue-100 text-xs md:text-sm mt-1 max-w-2xl">
                    Kelola foto profil, nama lengkap, gelar, jabatan, dan urutan tampilan dewan guru dan tenaga kependidikan yang tampil pada halaman Sumber Daya Sekolah.
                </p>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <a href="{{ route('admin.teachers.create') }}" class="px-5 py-3 bg-yellow-400 hover:bg-yellow-300 text-wikrama-dark font-black rounded-xl text-xs uppercase tracking-wider transition shadow-lg flex items-center gap-2">
                    <i class="ri-user-add-line text-base"></i> + Tambah Guru Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Stats & Search -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-wikrama-blue flex items-center justify-center text-xl font-bold">
                <i class="ri-team-line"></i>
            </div>
            <div>
                <span class="text-xs text-gray-500 font-medium">Total Tenaga Pendidik</span>
                <h4 class="text-xl font-black text-gray-900">{{ $totalTeachers }} Orang</h4>
            </div>
        </div>
        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
                <i class="ri-checkbox-circle-line"></i>
            </div>
            <div>
                <span class="text-xs text-gray-500 font-medium">Status Aktif (Tayang)</span>
                <h4 class="text-xl font-black text-emerald-600">{{ $activeTeachers }} Guru</h4>
            </div>
        </div>
        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between gap-3">
            <form action="{{ route('admin.teachers.index') }}" method="GET" class="w-full flex items-center gap-2">
                <div class="relative w-full">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama / jabatan guru..." 
                           class="w-full pl-9 pr-3 py-2 text-xs rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-wikrama-blue">
                    <i class="ri-search-line absolute left-3 top-2.5 text-gray-400 text-xs"></i>
                </div>
                <button type="submit" class="px-3 py-2 bg-wikrama-blue text-white rounded-xl text-xs font-bold hover:bg-wikrama-dark transition shrink-0">
                    Cari
                </button>
            </form>
        </div>
    </div>

    <!-- Teachers Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-[11px] font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                        <th class="p-4 w-16 text-center">Urutan</th>
                        <th class="p-4">Foto & Nama Guru</th>
                        <th class="p-4">Jabatan / Amanah</th>
                        <th class="p-4">Keterangan Singkat</th>
                        <th class="p-4 text-center">Status</th>
                        <th class="p-4 text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($teachers as $teacher)
                        <tr class="hover:bg-blue-50/40 transition">
                            <td class="p-4 text-center">
                                <span class="w-7 h-7 rounded-lg bg-gray-100 text-gray-600 font-bold text-xs inline-flex items-center justify-center">
                                    {{ $teacher->order }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-14 rounded-xl bg-gray-100 overflow-hidden border border-gray-200 shrink-0 shadow-sm">
                                        @if($teacher->photo_url)
                                            <img src="{{ asset($teacher->photo_url) }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-wikrama-blue bg-blue-50 font-bold text-base">
                                                {{ substr($teacher->name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-extrabold text-gray-900 text-sm leading-tight">{{ $teacher->name }}</h4>
                                        <span class="text-[11px] text-gray-400">ID: #{{ $teacher->id }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-lg text-xs font-bold bg-blue-50 text-wikrama-blue border border-blue-100 inline-block">
                                    {{ $teacher->role }}
                                </span>
                            </td>
                            <td class="p-4 text-xs text-gray-600 max-w-xs">
                                <p class="line-clamp-2">{{ $teacher->bio ?? '-' }}</p>
                            </td>
                            <td class="p-4 text-center">
                                <form action="{{ route('admin.teachers.toggle', $teacher->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" title="Klik untuk mengubah status aktif" class="cursor-pointer">
                                        @if($teacher->is_active)
                                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100 transition inline-flex items-center gap-1">
                                                <i class="ri-check-line"></i> Aktif
                                            </span>
                                        @else
                                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-500 border border-gray-200 hover:bg-gray-200 transition inline-flex items-center gap-1">
                                                <i class="ri-close-line"></i> Nonaktif
                                            </span>
                                        @endif
                                    </button>
                                </form>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.teachers.edit', $teacher) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit Guru">
                                        <i class="ri-edit-line text-lg"></i>
                                    </a>
                                    <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data guru ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition" title="Hapus Guru">
                                            <i class="ri-delete-bin-line text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-12 text-center text-gray-400 text-sm">
                                <i class="ri-user-star-line text-5xl mb-3 block text-gray-300"></i>
                                Belum ada data guru / pendidik. Klik tombol <strong>+ Tambah Guru Baru</strong> di atas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($teachers->hasPages())
            <div class="p-4 border-t border-gray-100">
                {{ $teachers->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

