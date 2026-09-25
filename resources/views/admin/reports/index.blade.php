@extends('admin.layout')

@section('title', 'Kelola Rapor Pendidikan')
@section('header_title', 'Rapor Pendidikan SMK Wikrama 1 Garut')

@section('content')
<div class="space-y-6 max-w-5xl">
    <div class="bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
        <h2 class="text-xl font-black text-gray-900">Indikator Mutu & Rapor Pendidikan Kemdikbud</h2>
        <p class="text-xs text-gray-500 mt-1">Ubah skor capaian, status predikat (Baik, Sangat Baik), dan catatan deskripsi yang ditampilkan pada halaman beranda dan sumber daya.</p>
    </div>

    <div class="grid grid-cols-1 gap-6">
        @forelse($reports as $rep)
            <div class="bg-white p-6 rounded-3xl border border-gray-200 shadow-sm">
                <form action="{{ route('admin.reports.update', $rep->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-4 mb-4 border-b border-gray-100">
                        <div class="flex-1 mr-4">
                            <span class="text-xs font-bold text-wikrama-blue bg-blue-50 px-3 py-1 rounded-full uppercase tracking-wider">Indikator #{{ $rep->id }}</span>
                            <div class="mt-2">
                                <label class="block text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Nama Indikator / Judul Capaian</label>
                                <input type="text" name="indicator_name" value="{{ old('indicator_name', $rep->indicator_name) }}" required
                                       class="w-full text-base font-bold text-gray-900 px-3 py-1.5 rounded-lg border border-gray-200 focus:border-wikrama-blue focus:ring-1 focus:ring-wikrama-blue outline-none bg-white">
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-gray-400">Tahun: {{ $rep->year ?? date('Y') }}</span>
                            <button type="submit" class="px-5 py-2.5 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-xl text-xs uppercase tracking-wider shadow transition flex items-center gap-1.5">
                                <i class="ri-check-line text-base"></i> Simpan
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Skor Capaian (Contoh: 85.50)</label>
                            <input type="number" step="0.01" name="score" value="{{ old('score', $rep->score) }}" required 
                                   class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue text-sm outline-none transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Predikat Status</label>
                            <select name="status" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue text-sm outline-none transition bg-white">
                                <option value="Baik" {{ $rep->status == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Sangat Baik" {{ $rep->status == 'Sangat Baik' ? 'selected' : '' }}>Sangat Baik</option>
                                <option value="Sedang" {{ $rep->status == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                <option value="Kurang" {{ $rep->status == 'Kurang' ? 'selected' : '' }}>Kurang</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Tahun Rapor</label>
                            <input type="text" name="year" value="{{ old('year', $rep->year ?? date('Y')) }}" 
                                   class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue text-sm outline-none transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Catatan Deskripsi Indikator</label>
                        <textarea name="notes" rows="2" 
                                  class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-wikrama-blue text-sm outline-none transition">{{ old('notes', $rep->notes) }}</textarea>
                    </div>
                </form>
            </div>
        @empty
            <div class="py-12 text-center text-gray-400 bg-white rounded-3xl border border-gray-200">
                Belum ada data rapor pendidikan.
            </div>
        @endforelse
    </div>
</div>
@endsection

