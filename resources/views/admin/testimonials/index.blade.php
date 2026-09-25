@extends('admin.layout')

@section('title', 'Kelola Testimoni Alumni')
@section('header_title', 'Kelola Testimoni Alumni & Siswa')

@section('content')
<div class="space-y-6">
    <!-- Header Action -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <div>
            <h2 class="text-lg font-bold text-gray-800">Daftar Testimoni (Landing Page SPMB)</h2>
            <p class="text-xs text-gray-500">Khusus testimoni dan kutipan sukses pendaftar di Landing Page SPMB (<code>/spmb</code>). Untuk Data Alumni di Web Utama, kelola di menu <a href="{{ route('admin.alumni.index') }}" class="text-wikrama-blue font-bold hover:underline">Data Alumni (Web)</a>.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.alumni.index') }}" class="px-4 py-2 bg-purple-50 text-purple-700 hover:bg-purple-100 rounded-xl text-xs font-bold transition">
                <i class="ri-graduation-cap-line"></i> Ke Data Alumni Web
            </a>
            <a href="{{ route('admin.testimonials.create') }}" class="px-5 py-2.5 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-sm font-semibold flex items-center gap-2 shadow-sm transition">
                <i class="ri-add-line text-lg"></i> Tambah Testimoni SPMB
            </a>
        </div>
    </div>

    <!-- Testimonials Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-[11px] font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                        <th class="p-4">Alumni</th>
                        <th class="p-4">Angkatan & Jurusan</th>
                        <th class="p-4">Kutipan Testimoni</th>
                        <th class="p-4">Profesi / Instansi</th>
                        <th class="p-4 text-center">Status</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($testimonials as $t)
                        <tr class="hover:bg-gray-50/80 transition">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-wikrama-blue font-bold overflow-hidden border border-blue-200 shrink-0">
                                        @if($t->photo_url)
                                            <img src="{{ $t->photo_url }}" alt="{{ $t->name }}" class="w-full h-full object-cover">
                                        @else
                                            {{ substr($t->name, 0, 1) }}
                                        @endif
                                    </div>
                                    <span class="font-bold text-gray-800">{{ $t->name }}</span>
                                </div>
                            </td>
                            <td class="p-4">
                                <div class="font-semibold text-blue-700">Tahun {{ $t->graduation_year ?? '-' }}</div>
                                <div class="text-xs text-gray-500">{{ $t->major ?? '-' }}</div>
                            </td>
                            <td class="p-4">
                                <p class="text-xs text-gray-600 italic line-clamp-2 max-w-md">"{{ $t->quote }}"</p>
                            </td>
                            <td class="p-4 text-gray-700 text-xs">
                                {{ $t->company ?? '-' }}
                            </td>
                            <td class="p-4 text-center">
                                @if($t->is_active)
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100">Aktif</span>
                                @else
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-500">Nonaktif</span>
                                @endif
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.testimonials.edit', $t) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                        <i class="ri-edit-line text-lg"></i>
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
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
                                <i class="ri-chat-quote-line text-4xl mb-2 block text-gray-300"></i>
                                Belum ada testimoni alumni. Klik tombol "Tambah Testimoni" di atas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

