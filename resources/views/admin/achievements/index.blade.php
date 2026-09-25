@extends('admin.layout')

@section('title', 'Kelola Prestasi')
@section('header_title', 'Kelola Prestasi Sekolah & Siswa')

@section('content')
<div class="space-y-6">
    <!-- Header Action -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <div>
            <h2 class="text-lg font-bold text-gray-800">Daftar Prestasi & Penghargaan</h2>
            <p class="text-xs text-gray-500">Kelola kejuaraan tingkat nasional, internasional, provinsi, dan sertifikasi keunggulan sekolah.</p>
        </div>
        <a href="{{ route('admin.achievements.create') }}" class="px-5 py-2.5 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-sm font-semibold flex items-center gap-2 shadow-sm transition">
            <i class="ri-add-line text-lg"></i> Tambah Prestasi
        </a>
    </div>

    <!-- Achievements Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-[11px] font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                        <th class="p-4">Foto / Trophy</th>
                        <th class="p-4">Judul Prestasi</th>
                        <th class="p-4">Tingkat / Kategori</th>
                        <th class="p-4">Peringkat & Tahun</th>
                        <th class="p-4">Penerima</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($achievements as $ach)
                        <tr class="hover:bg-gray-50/80 transition">
                            <td class="p-4">
                                <div class="w-16 h-12 rounded-lg bg-gray-100 overflow-hidden border border-gray-200 shrink-0 flex items-center justify-center">
                                    @if($ach->image_url)
                                        <img src="{{ $ach->image_url }}" alt="{{ $ach->title }}" class="w-full h-full object-cover">
                                    @else
                                        <i class="ri-trophy-line text-yellow-500 text-2xl"></i>
                                    @endif
                                </div>
                            </td>
                            <td class="p-4">
                                <div class="font-bold text-gray-800">{{ $ach->title }}</div>
                                <div class="text-xs text-gray-500 line-clamp-1">{{ $ach->description ?? '-' }}</div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-blue-50 text-blue-700 border border-blue-100">
                                    {{ $ach->category }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="font-bold text-amber-600">{{ $ach->rank ?? '-' }}</div>
                                <div class="text-xs text-gray-400">Tahun {{ $ach->event_year }}</div>
                            </td>
                            <td class="p-4 text-gray-700">
                                {{ $ach->recipient_name ?? '-' }}
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.achievements.edit', $ach) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                        <i class="ri-edit-line text-lg"></i>
                                    </a>
                                    <form action="{{ route('admin.achievements.destroy', $ach) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus prestasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                            <i class="ri-delete-bin-line text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-400 text-sm">
                                <i class="ri-trophy-line text-4xl mb-2 block text-gray-300"></i>
                                Belum ada data prestasi. Klik tombol "Tambah Prestasi" di atas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

