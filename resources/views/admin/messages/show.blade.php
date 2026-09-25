@extends('admin.layout')

@section('title', 'Detail Pesan Masuk')
@section('header_title', 'Detail Pesan Masuk')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <a href="{{ route('admin.messages.index') }}" class="text-xs font-bold text-gray-500 hover:text-wikrama-blue flex items-center gap-1">
        <i class="ri-arrow-left-line"></i> Kembali ke Daftar Pesan
    </a>

    <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-8 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-gray-100">
            <div>
                <span class="text-xs font-bold text-wikrama-blue bg-blue-50 px-3 py-1 rounded-full uppercase tracking-wider">
                    {{ $message->subject ?? 'Pesan Masuk' }}
                </span>
                <h2 class="text-2xl font-black text-gray-900 mt-2">{{ $message->name }}</h2>
                <div class="text-xs text-gray-500 mt-1">Diterima pada {{ $message->created_at->format('d F Y, H:i') }} WIB</div>
            </div>

            @if($message->phone)
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $message->phone) }}?text=Halo%20{{ urlencode($message->name) }},%20kami%20dari%20SMK%20Wikrama%201%20Garut%20merespon%20pertanyaan%20Anda." 
                   target="_blank" 
                   class="px-4 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white font-bold rounded-xl text-xs uppercase tracking-wider shadow transition flex items-center gap-2">
                    <i class="ri-whatsapp-line text-lg"></i> Balas via WhatsApp
                </a>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 bg-gray-50 rounded-2xl border border-gray-100 text-sm">
            <div>
                <div class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Alamat Email:</div>
                <div class="font-bold text-gray-800">{{ $message->email }}</div>
            </div>
            <div>
                <div class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Nomor Telepon / WA:</div>
                <div class="font-bold text-gray-800">{{ $message->phone ?? '-' }}</div>
            </div>
        </div>

        <div>
            <div class="text-xs text-gray-400 font-semibold uppercase tracking-wider mb-2">Isi Pesan:</div>
            <div class="p-6 bg-white rounded-2xl border border-gray-200 text-gray-800 leading-relaxed text-sm whitespace-pre-line shadow-inner">
                {{ $message->message }}
            </div>
        </div>

        <div class="pt-4 flex items-center justify-between border-t border-gray-100">
            <a href="mailto:{{ $message->email }}?subject=Respon SMK Wikrama 1 Garut: {{ urlencode($message->subject ?? '') }}" class="px-5 py-2.5 bg-wikrama-blue hover:bg-wikrama-dark text-white font-bold rounded-xl text-xs uppercase tracking-wider shadow transition flex items-center gap-2">
                <i class="ri-mail-send-line text-base"></i> Balas via Email
            </a>

            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini secara permanen?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2.5 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-xl text-xs font-bold transition flex items-center gap-1.5">
                    <i class="ri-delete-bin-line text-base"></i> Hapus Pesan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

