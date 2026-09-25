@extends('admin.layout')

@section('title', 'Kelola Berita & Informasi')
@section('header_title', 'Berita, Artikel & Informasi')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
        <div>
            <h2 class="text-xl font-black text-gray-900">Daftar Berita & Pengumuman Sekolah</h2>
            <p class="text-xs text-gray-500 mt-1">Publikasi kabar terbaru seputar kegiatan siswa, prestasi, dan informasi akademik.</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="px-5 py-3 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-2xl text-xs uppercase tracking-wider shadow-md transition flex items-center gap-2 shrink-0">
            <i class="ri-add-circle-line text-lg"></i> Tulis Berita Baru
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 border-b border-gray-200 text-xs font-bold text-gray-500 uppercase tracking-wider">
                    <tr>
                        <th class="py-4 px-6">Foto</th>
                        <th class="py-4 px-6">Judul Berita</th>
                        <th class="py-4 px-6">Kategori</th>
                        <th class="py-4 px-6">Penulis & Tanggal</th>
                        <th class="py-4 px-6 text-center">Status</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($news as $n)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-4 px-6">
                                <div class="w-20 h-14 rounded-xl overflow-hidden bg-gray-100 border border-gray-200 shadow-sm">
                                    <img src="{{ asset($n->image_url ?: '/assets/images/IMG_5026-1-819x1024.png') }}" alt="{{ $n->title }}" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <td class="py-4 px-6 max-w-md">
                                <h4 class="font-bold text-gray-900 text-sm leading-snug line-clamp-1">{{ $n->title }}</h4>
                                <p class="text-xs text-gray-500 line-clamp-1 mt-0.5">{{ Str::limit(strip_tags($n->content), 80) }}</p>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-blue-50 text-wikrama-blue rounded-full text-xs font-bold">
                                    {{ $n->category ?? 'Umum' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-500">
                                <div>{{ $n->author ?? 'Humas Wikrama' }}</div>
                                <div class="text-[11px] text-gray-400">{{ $n->published_at ? \Carbon\Carbon::parse($n->published_at)->format('d M Y') : $n->created_at->format('d M Y') }}</div>
                            </td>
                            <td class="py-4 px-6 text-center">
                                @if($n->is_published)
                                    <span class="px-2.5 py-0.5 bg-emerald-100 text-emerald-700 rounded-full text-xs font-bold">Terbit</span>
                                @else
                                    <span class="px-2.5 py-0.5 bg-gray-100 text-gray-500 rounded-full text-xs font-bold">Draft</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('news.detail', $n->slug ?: $n->id) }}" target="_blank" class="p-2 bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white rounded-xl transition text-xs font-bold" title="Lihat di Web">
                                        <i class="ri-external-link-line text-base"></i>
                                    </a>
                                    <a href="{{ route('admin.news.edit', $n->id) }}" class="p-2 bg-blue-50 text-wikrama-blue hover:bg-wikrama-blue hover:text-white rounded-xl transition text-xs font-bold" title="Edit">
                                        <i class="ri-edit-line text-base"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $n->id) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-xl transition text-xs font-bold" title="Hapus">
                                            <i class="ri-delete-bin-line text-base"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-400">Belum ada berita.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($news->hasPages())
            <div class="p-4 border-t border-gray-100">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

