@extends('admin.layout')

@section('title', 'Kelola Jurusan')
@section('header_title', 'Kompetensi Keahlian / Jurusan')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
        <div>
            <h2 class="text-xl font-black text-gray-900">Daftar Jurusan Unggulan</h2>
            <p class="text-xs text-gray-500 mt-1">Kelola data kompetensi keahlian, keunggulan, prospek kerja, serta aktifkan atau nonaktifkan jurusan yang sudah tidak dibuka.</p>
        </div>
        <a href="{{ route('admin.majors.create') }}" class="px-5 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-2xl text-xs uppercase tracking-wider shadow-md transition flex items-center gap-2 shrink-0">
            <i class="ri-add-circle-line text-lg"></i> Tambah Jurusan Baru
        </a>
    </div>

    <!-- Alert / Tips Menonaktifkan Jurusan -->
    <div class="bg-amber-50 border border-amber-200 rounded-2xl p-4 flex items-start gap-3">
        <i class="ri-information-line text-amber-600 text-xl shrink-0 mt-0.5"></i>
        <div class="text-xs text-amber-900">
            <span class="font-bold">Tips Penonaktifan Jurusan:</span>
            Jika ada jurusan yang sudah tidak dibuka pendaftarannya lagi, Anda tidak perlu menghapusnya. Cukup klik tombol status <span class="font-bold px-2 py-0.5 rounded bg-emerald-100 text-emerald-800">Aktif</span> pada tabel di bawah untuk mengubahnya menjadi <span class="font-bold px-2 py-0.5 rounded bg-gray-200 text-gray-700">Nonaktif</span>. Jurusan yang dinonaktifkan akan langsung disembunyikan dari halaman publik web sekolah & SPMB.
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase tracking-wider">
                    <tr>
                        <th class="py-4 px-6 w-28">Foto Jurusan</th>
                        <th class="py-4 px-6">Nama & Singkatan</th>
                        <th class="py-4 px-6">Keunggulan</th>
                        <th class="py-4 px-6">Prospek Karir</th>
                        <th class="py-4 px-6 text-center">Status Tayang</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($majors as $m)
                        <tr class="hover:bg-gray-50 transition {{ !$m->is_active ? 'bg-gray-50/70 opacity-75' : '' }}">
                            <td class="py-4 px-6">
                                <div class="w-24 h-16 rounded-xl overflow-hidden bg-gray-100 border border-gray-200 shadow-sm">
                                    <img src="{{ $m->image_url ?? '/assets/images/learning.png' }}" alt="{{ $m->name }}" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-xs font-black text-wikrama-blue bg-blue-50 px-2.5 py-0.5 rounded-full border border-blue-100">{{ $m->short_name }}</span>
                                <h4 class="font-extrabold text-gray-900 text-sm mt-1">{{ $m->name }}</h4>
                                <span class="text-[11px] text-gray-400">Urutan #{{ $m->order }}</span>
                            </td>
                            <td class="py-4 px-6 max-w-xs">
                                <div class="text-xs text-gray-600 line-clamp-2">{{ $m->description ?? '-' }}</div>
                            </td>
                            <td class="py-4 px-6 max-w-xs">
                                <div class="text-xs text-gray-600 line-clamp-2">{{ $m->career_prospects ?? '-' }}</div>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <form action="{{ route('admin.majors.toggle', $m->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" title="Klik untuk mengubah status aktif/nonaktif" class="cursor-pointer group">
                                        @if($m->is_active)
                                            <span class="px-3 py-1 text-xs font-bold rounded-full bg-emerald-100 text-emerald-800 border border-emerald-300 group-hover:bg-emerald-200 transition inline-flex items-center gap-1">
                                                <i class="ri-check-line font-bold"></i> Aktif (Tayang)
                                            </span>
                                        @else
                                            <span class="px-3 py-1 text-xs font-bold rounded-full bg-gray-200 text-gray-700 border border-gray-300 group-hover:bg-gray-300 transition inline-flex items-center gap-1">
                                                <i class="ri-eye-off-line"></i> Nonaktif (Tutup)
                                            </span>
                                        @endif
                                    </button>
                                </form>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.majors.edit', $m->id) }}" class="p-2 bg-blue-50 text-wikrama-blue hover:bg-wikrama-blue hover:text-white rounded-xl transition" title="Edit Jurusan">
                                        <i class="ri-edit-line text-base"></i>
                                    </a>
                                    <form action="{{ route('admin.majors.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Hapus jurusan ini secara permanen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-xl transition" title="Hapus Jurusan">
                                            <i class="ri-delete-bin-line text-base"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-400">Belum ada data jurusan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
