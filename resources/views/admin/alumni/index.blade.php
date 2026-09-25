@extends('admin.layout')

@section('title', 'Kelola Data Alumni')
@section('header_title', 'Kelola Data Alumni (Web Utama)')

@section('content')
<div class="space-y-6">
    <!-- Header Banner -->
    <div class="bg-gradient-to-r from-wikrama-dark via-wikrama-blue to-indigo-900 rounded-3xl p-6 md:p-8 text-white shadow-xl relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-wider mb-2">
                    <i class="ri-graduation-cap-line text-yellow-300"></i> Halaman Sumber Daya (/sumber-daya)
                </span>
                <h2 class="text-2xl md:text-3xl font-extrabold font-heading">Data Alumni SMK Wikrama 1 Garut</h2>
                <p class="text-blue-100 text-xs md:text-sm mt-1 max-w-2xl">
                    Kelola foto, nama, jurusan, perusahaan/tempat kerja, profesi, dan kutipan alumni sukses yang tampil pada carousel Sumber Daya Web Utama.
                </p>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <a href="{{ route('admin.alumni.create') }}" class="px-5 py-3 bg-yellow-400 hover:bg-yellow-300 text-wikrama-dark font-black rounded-xl text-xs uppercase tracking-wider transition shadow-lg flex items-center gap-2">
                    <i class="ri-user-add-line text-base"></i> + Tambah Alumni Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Stats & Search -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-wikrama-blue flex items-center justify-center text-xl font-bold">
                <i class="ri-graduation-cap-fill"></i>
            </div>
            <div>
                <span class="text-xs text-gray-500 font-medium">Total Alumni Terdata</span>
                <h4 class="text-xl font-black text-gray-900">{{ $totalAlumni }} Orang</h4>
            </div>
        </div>
        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
                <i class="ri-checkbox-circle-line"></i>
            </div>
            <div>
                <span class="text-xs text-gray-500 font-medium">Status Aktif (Tayang)</span>
                <h4 class="text-xl font-black text-emerald-600">{{ $activeAlumni }} Alumni</h4>
            </div>
        </div>
        <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between gap-3">
            <form action="{{ route('admin.alumni.index') }}" method="GET" class="w-full flex items-center gap-2">
                <div class="relative w-full">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama, profesi, perusahaan..." 
                           class="w-full pl-9 pr-3 py-2 text-xs rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-wikrama-blue">
                    <i class="ri-search-line absolute left-3 top-2.5 text-gray-400 text-xs"></i>
                </div>
                <button type="submit" class="px-3 py-2 bg-wikrama-blue text-white rounded-xl text-xs font-bold hover:bg-wikrama-dark transition shrink-0">
                    Cari
                </button>
            </form>
        </div>
    </div>

    <!-- Alumni Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-[11px] font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                        <th class="p-4 w-16 text-center">Urutan</th>
                        <th class="p-4">Foto & Nama Alumni</th>
                        <th class="p-4">Perusahaan & Profesi</th>
                        <th class="p-4">Jurusan & Tahun Lulus</th>
                        <th class="p-4">Kutipan / Pesan</th>
                        <th class="p-4 text-center">Status</th>
                        <th class="p-4 text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($alumnis as $alm)
                        <tr class="hover:bg-blue-50/40 transition">
                            <td class="p-4 text-center">
                                <span class="w-7 h-7 rounded-lg bg-gray-100 text-gray-600 font-bold text-xs inline-flex items-center justify-center">
                                    {{ $alm->order }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full bg-gray-100 overflow-hidden border-2 border-orange-400 shrink-0 shadow-sm">
                                        @if($alm->photo_url)
                                            <img src="{{ asset($alm->photo_url) }}" alt="{{ $alm->name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-wikrama-blue bg-blue-50 font-bold text-base">
                                                {{ substr($alm->name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-extrabold text-gray-900 text-sm leading-tight">{{ $alm->name }}</h4>
                                        <span class="text-[11px] text-gray-400">ID: #{{ $alm->id }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <div class="font-bold text-wikrama-blue text-xs">{{ $alm->company ?? '-' }}</div>
                                <span class="text-xs text-orange-600 font-semibold">{{ $alm->profession ?? '-' }}</span>
                            </td>
                            <td class="p-4">
                                <div class="text-xs text-gray-700 font-medium">{{ $alm->major ?? '-' }}</div>
                                <span class="text-[11px] text-gray-400 font-semibold">{{ $alm->graduation_year ? 'Lulusan ' . $alm->graduation_year : '-' }}</span>
                            </td>
                            <td class="p-4 max-w-xs">
                                <p class="text-xs text-gray-500 line-clamp-2 italic">
                                    {{ $alm->quote ? '“' . $alm->quote . '”' : '-' }}
                                </p>
                            </td>
                            <td class="p-4 text-center">
                                <button type="button" onclick="toggleStatus({{ $alm->id }})" id="status-btn-{{ $alm->id }}"
                                        class="px-2.5 py-1 rounded-full text-xs font-bold transition inline-flex items-center gap-1 {{ $alm->is_active ? 'bg-emerald-50 text-emerald-600 border border-emerald-200 hover:bg-emerald-100' : 'bg-gray-100 text-gray-500 border border-gray-200 hover:bg-gray-200' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $alm->is_active ? 'bg-emerald-500' : 'bg-gray-400' }}"></span>
                                    <span id="status-text-{{ $alm->id }}">{{ $alm->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                                </button>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center gap-1.5">
                                    <a href="{{ route('admin.alumni.edit', $alm->id) }}" 
                                       class="w-8 h-8 rounded-lg bg-blue-50 text-wikrama-blue hover:bg-wikrama-blue hover:text-white transition flex items-center justify-center text-xs font-bold" title="Edit Alumni">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form action="{{ route('admin.alumni.destroy', $alm->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data alumni ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition flex items-center justify-center text-xs font-bold" title="Hapus Alumni">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-gray-400 text-xs">
                                <i class="ri-inbox-line text-4xl mb-2 block text-gray-300"></i>
                                Belum ada data alumni yang tersimpan. Klik <strong>+ Tambah Alumni Baru</strong> untuk menambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($alumnis->hasPages())
            <div class="p-4 border-t border-gray-100">
                {{ $alumnis->links() }}
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
function toggleStatus(id) {
    fetch(`/admin/alumni/${id}/toggle`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            const btn = document.getElementById(`status-btn-${id}`);
            const text = document.getElementById(`status-text-${id}`);
            const dot = btn.querySelector('span:first-child');
            
            if (data.is_active) {
                btn.className = 'px-2.5 py-1 rounded-full text-xs font-bold transition inline-flex items-center gap-1 bg-emerald-50 text-emerald-600 border border-emerald-200 hover:bg-emerald-100';
                dot.className = 'w-1.5 h-1.5 rounded-full bg-emerald-500';
                text.innerText = 'Aktif';
            } else {
                btn.className = 'px-2.5 py-1 rounded-full text-xs font-bold transition inline-flex items-center gap-1 bg-gray-100 text-gray-500 border border-gray-200 hover:bg-gray-200';
                dot.className = 'w-1.5 h-1.5 rounded-full bg-gray-400';
                text.innerText = 'Nonaktif';
            }
        }
    })
    .catch(err => console.error('Error toggling status:', err));
}
</script>
@endpush
@endsection

