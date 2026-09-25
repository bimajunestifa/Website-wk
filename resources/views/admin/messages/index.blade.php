@extends('admin.layout')

@section('title', 'Pesan Masuk & Pendaftaran PPDB')
@section('header_title', 'Kotak Pesan Masuk (PPDB & Kontak)')

@section('content')
<div class="space-y-6">
    <div class="bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
        <h2 class="text-xl font-black text-gray-900">Pesan Masuk dari Pengunjung & Calon Siswa</h2>
        <p class="text-xs text-gray-500 mt-1">Daftar pertanyaan dan permohonan informasi seputar PPDB atau sekolah dari formulir online.</p>
    </div>

    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase tracking-wider">
                    <tr>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Nama Pengirim</th>
                        <th class="py-4 px-6">Kontak</th>
                        <th class="py-4 px-6">Subjek & Pesan</th>
                        <th class="py-4 px-6">Tanggal</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($messages as $msg)
                        <tr class="hover:bg-gray-50 transition {{ !$msg->is_read ? 'bg-blue-50/40 font-semibold' : '' }}">
                            <td class="py-4 px-6">
                                @if(!$msg->is_read)
                                    <span class="w-3 h-3 rounded-full bg-blue-600 inline-block" title="Belum Dibaca"></span>
                                @else
                                    <span class="w-3 h-3 rounded-full bg-gray-300 inline-block" title="Sudah Dibaca"></span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-gray-900">{{ $msg->name }}</td>
                            <td class="py-4 px-6 text-xs text-gray-600">
                                <div>{{ $msg->email }}</div>
                                <div class="text-emerald-600 font-bold mt-0.5">{{ $msg->phone ?? '-' }}</div>
                            </td>
                            <td class="py-4 px-6 max-w-sm">
                                <div class="text-xs font-bold text-wikrama-dark">{{ $msg->subject ?? 'Pesan Umum' }}</div>
                                <div class="text-xs text-gray-500 line-clamp-1 mt-0.5">{{ $msg->message }}</div>
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-400">
                                {{ $msg->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.messages.show', $msg->id) }}" class="px-3 py-1.5 bg-blue-50 text-wikrama-blue hover:bg-wikrama-blue hover:text-white rounded-xl transition text-xs font-bold">
                                        Buka Pesan
                                    </a>
                                    <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-xl transition text-xs font-bold" title="Hapus">
                                            <i class="ri-delete-bin-line text-base"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-400">Belum ada pesan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

