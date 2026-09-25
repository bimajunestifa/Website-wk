@extends('admin.layout')

@section('title', 'Edit Testimoni Alumni')
@section('header_title', 'Edit Testimoni Alumni')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
            <div>
                <h2 class="text-lg font-bold text-gray-800">Edit Testimoni: {{ $testimonial->name }}</h2>
                <p class="text-xs text-gray-500">Perbarui kutipan testimoni atau data kelulusan alumni.</p>
            </div>
            <a href="{{ route('admin.testimonials.index') }}" class="text-xs font-semibold text-gray-500 hover:text-gray-800 flex items-center gap-1">
                <i class="ri-arrow-left-line"></i> Kembali
            </a>
        </div>

        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Nama Alumni -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Nama Lengkap Alumni <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" required
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tahun Lulus -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Tahun Kelulusan</label>
                        <input type="text" name="graduation_year" value="{{ old('graduation_year', $testimonial->graduation_year) }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                    </div>

                    <!-- Jurusan -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Kompetensi Keahlian / Jurusan</label>
                        <input type="text" name="major" value="{{ old('major', $testimonial->major) }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                    </div>
                </div>

                <!-- Profesi / Pekerjaan -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Profesi / Pekerjaan Saat Ini</label>
                    <input type="text" name="company" value="{{ old('company', $testimonial->company) }}"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                </div>

                <!-- Kutipan Testimoni -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Kutipan Testimoni <span class="text-red-500">*</span></label>
                    <textarea name="quote" rows="4" required
                              class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">{{ old('quote', $testimonial->quote) }}</textarea>
                </div>

                <!-- Foto Alumni -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Foto Saat Ini</label>
                    @if($testimonial->photo_url)
                        <div class="mb-3 w-16 h-16 rounded-full overflow-hidden border border-gray-200 bg-gray-100">
                            <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                        </div>
                    @endif
                    <input type="file" name="photo_file" accept="image/*"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-xl file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-wikrama-blue hover:file:bg-blue-100">
                    <p class="text-[11px] text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengganti foto.</p>
                </div>

                <!-- URL Foto Alternatif -->
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Atau URL Foto</label>
                    <input type="text" name="photo_url" value="{{ old('photo_url', $testimonial->photo_url) }}"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                </div>

                <!-- Urutan & Status Aktif -->
                <div class="flex items-center gap-6">
                    <div class="w-32">
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Urutan</label>
                        <input type="number" name="order" value="{{ old('order', $testimonial->order) }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-wikrama-blue focus:outline-none">
                    </div>
                    <div class="pt-6">
                        <label class="flex items-center gap-2 cursor-pointer text-sm font-semibold text-gray-700">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }} class="w-4 h-4 text-wikrama-blue rounded border-gray-300">
                            <span>Status Aktif (Tampilkan di Web)</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.testimonials.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold text-gray-600 hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-wikrama-blue hover:bg-wikrama-dark text-white rounded-xl text-sm font-semibold shadow-sm transition">
                    Perbarui Testimoni
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

