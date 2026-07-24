@extends('layouts.app')

@section('title', 'Pendaftaran Berhasil - Informatics Store')

@section('content')
<div class="animate-fade-in max-w-3xl mx-auto space-y-8">
    <!-- Success Banner -->
    <div class="text-center space-y-4">
        <div class="h-16 w-16 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full flex items-center justify-center mx-auto text-3xl">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <h1 class="font-outfit font-extrabold text-3xl text-white tracking-tight">
            Pendaftaran Berhasil Disimpan!
        </h1>
        <p class="text-slate-450 text-sm max-w-md mx-auto">
            Terima kasih telah melakukan pendaftaran. Data Anda telah terekam di sistem basis data kami dengan rincian berikut:
        </p>
    </div>

    <!-- Details Card -->
    <div class="glass-card rounded-3xl overflow-hidden shadow-2xl">
        <div class="px-6 py-4 bg-gradient-to-r from-sky-500/10 to-indigo-600/10 border-b border-slate-800/80 flex items-center justify-between">
            <span class="text-xs text-sky-400 font-bold uppercase tracking-wider">Tanda Bukti Pendaftaran</span>
            <span class="text-xs text-slate-500 font-medium font-mono">REG-ID: #{{ str_pad($pendaftaran->id, 5, '0', STR_PAD_LEFT) }}</span>
        </div>

        <div class="p-6 sm:p-8 space-y-6">
            <!-- Details List -->
            <div class="space-y-4 divide-y divide-slate-800/60 text-sm">
                <!-- Nama -->
                <div class="grid grid-cols-3 py-3 items-start">
                    <span class="text-slate-500 font-semibold uppercase text-xs tracking-wider">Nama Lengkap</span>
                    <span class="col-span-2 text-white font-bold text-base">{{ $pendaftaran->nama }}</span>
                </div>

                <!-- TTL -->
                <div class="grid grid-cols-3 py-3 items-start">
                    <span class="text-slate-500 font-semibold uppercase text-xs tracking-wider">Tempat, Tgl Lahir</span>
                    <span class="col-span-2 text-slate-200">
                        {{ $pendaftaran->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->translatedFormat('d F Y') }}
                    </span>
                </div>

                <!-- Jenis Kelamin -->
                <div class="grid grid-cols-3 py-3 items-start">
                    <span class="text-slate-500 font-semibold uppercase text-xs tracking-wider">Jenis Kelamin</span>
                    <span class="col-span-2 text-slate-200">{{ $pendaftaran->jk }}</span>
                </div>

                <!-- Alamat -->
                <div class="grid grid-cols-3 py-3 items-start">
                    <span class="text-slate-500 font-semibold uppercase text-xs tracking-wider">Alamat</span>
                    <span class="col-span-2 text-slate-200 leading-relaxed">{{ $pendaftaran->alamat }}</span>
                </div>

                <!-- Sekolah Asal -->
                <div class="grid grid-cols-3 py-3 items-start">
                    <span class="text-slate-500 font-semibold uppercase text-xs tracking-wider">Asal Sekolah</span>
                    <span class="col-span-2 text-slate-200 font-medium">
                        [{{ $pendaftaran->sekolah_asal }}] {{ $pendaftaran->nama_sekolah }}
                    </span>
                </div>

                <!-- Nilai UAN -->
                <div class="grid grid-cols-3 py-4 items-start">
                    <span class="text-slate-500 font-semibold uppercase text-xs tracking-wider">Nilai UAN</span>
                    <div class="col-span-2 grid grid-cols-3 gap-4">
                        <div class="p-3 bg-slate-900/60 border border-slate-800 rounded-xl text-center">
                            <div class="text-[10px] text-slate-500 font-bold uppercase tracking-wider">MTK</div>
                            <div class="text-base font-extrabold text-sky-400 font-outfit mt-1">{{ number_format($pendaftaran->matematika, 2) }}</div>
                        </div>
                        <div class="p-3 bg-slate-900/60 border border-slate-800 rounded-xl text-center">
                            <div class="text-[10px] text-slate-500 font-bold uppercase tracking-wider">B. Inggris</div>
                            <div class="text-base font-extrabold text-sky-400 font-outfit mt-1">{{ number_format($pendaftaran->inggris, 2) }}</div>
                        </div>
                        <div class="p-3 bg-slate-900/60 border border-slate-800 rounded-xl text-center">
                            <div class="text-[10px] text-slate-500 font-bold uppercase tracking-wider">B. Indo</div>
                            <div class="text-base font-extrabold text-sky-400 font-outfit mt-1">{{ number_format($pendaftaran->indonesia, 2) }}</div>
                        </div>
                    </div>
                </div>

                <!-- Jurusan Pilihan -->
                <div class="grid grid-cols-3 py-3 items-start">
                    <span class="text-slate-500 font-semibold uppercase text-xs tracking-wider">Jurusan Pilihan</span>
                    <div class="col-span-2 space-y-1">
                        <div class="text-sm text-slate-200"><span class="text-xs text-sky-400 font-bold mr-1">Pilihan 1:</span> {{ $pendaftaran->pilihan1 }}</div>
                        <div class="text-sm text-slate-350"><span class="text-xs text-slate-500 font-semibold mr-1">Pilihan 2:</span> {{ $pendaftaran->pilihan2 }}</div>
                    </div>
                </div>

                <!-- Alasan -->
                <div class="grid grid-cols-3 py-3 items-start">
                    <span class="text-slate-500 font-semibold uppercase text-xs tracking-wider">Alasan Pilihan</span>
                    <span class="col-span-2 text-slate-300 italic leading-relaxed">"{{ $pendaftaran->alasan }}"</span>
                </div>
            </div>

            <!-- Footer of card -->
            <div class="pt-6 border-t border-slate-805 text-center space-y-1">
                <span class="text-[10px] text-slate-550 font-bold uppercase tracking-wider">Tanggal Daftar</span>
                <h3 class="text-sm font-bold text-white font-outfit uppercase">
                    {{ $pendaftaran->created_at->translatedFormat('d F Y H:i') }} WIB
                </h3>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-2">
        <a href="{{ route('uas.daftar.create') }}" class="w-full sm:w-auto text-center px-6 py-3 rounded-xl border border-slate-700 text-slate-350 hover:text-white hover:bg-slate-800 transition-all font-semibold text-sm">
            <i class="fa-solid fa-rotate-left mr-1.5"></i> Isi Form Baru
        </a>
        <a href="{{ route('uas.dashboard') }}" class="w-full sm:w-auto text-center px-8 py-3 rounded-xl text-slate-900 bg-sky-400 hover:bg-sky-350 font-bold text-sm transition-all shadow-lg shadow-sky-500/10">
            <i class="fa-solid fa-home mr-1.5"></i> Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
