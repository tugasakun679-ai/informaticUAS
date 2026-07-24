@extends('layouts.app')

@section('title', 'Kelola Pendaftaran - Admin Panel')

@section('content')
<div class="animate-fade-in space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-2">
        <div>
            <h1 class="font-outfit font-extrabold text-2xl text-white tracking-tight">
                Data Pendaftaran Mahasiswa Baru
            </h1>
            <p class="text-slate-400 text-xs mt-1">
                Kelola data formulir pendaftaran calon mahasiswa baru yang masuk ke sistem.
            </p>
        </div>
        
        <a href="{{ route('uas.daftar.create') }}" target="_blank" class="glow-btn inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-slate-900 bg-gradient-to-r from-sky-400 to-blue-500 shadow-md shadow-sky-500/10">
            <i class="fa-solid fa-file-signature text-xs"></i> Form Pendaftaran Baru
        </a>
    </div>

    <!-- Table Card -->
    <div class="glass-card rounded-3xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <!-- Table Head -->
                <thead>
                    <tr class="text-xs text-slate-400 font-bold uppercase border-b border-slate-800 bg-slate-950/20">
                        <th class="px-5 py-4 w-12 text-center">No</th>
                        <th class="px-5 py-4">Nama Lengkap</th>
                        <th class="px-5 py-4">Lahir / JK</th>
                        <th class="px-5 py-4">Asal Sekolah</th>
                        <th class="px-5 py-4 text-center">Rata-Rata UAN</th>
                        <th class="px-5 py-4">Jurusan Pilihan</th>
                        <th class="px-5 py-4 text-center w-28">Aksi</th>
                    </tr>
                </thead>
                
                <!-- Table Body -->
                <tbody class="divide-y divide-slate-800/50">
                    @if($pendaftarans->count() > 0)
                        @foreach($pendaftarans as $index => $pendaftaran)
                            @php
                                $avg_uan = ($pendaftaran->matematika + $pendaftaran->inggris + $pendaftaran->indonesia) / 3;
                            @endphp
                            <tr class="hover:bg-slate-900/15 transition-colors">
                                <!-- No -->
                                <td class="px-5 py-4.5 text-center text-slate-500 font-mono text-xs">
                                    {{ $index + 1 }}
                                </td>

                                <!-- Name -->
                                <td class="px-5 py-4.5 font-semibold text-white">
                                    {{ $pendaftaran->nama }}
                                    <span class="block text-[10px] text-slate-500 font-normal">Daftar: {{ $pendaftaran->created_at->format('d/m/Y H:i') }}</span>
                                </td>

                                <!-- TTL / JK -->
                                <td class="px-5 py-4.5 text-xs text-slate-300">
                                    {{ $pendaftaran->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d/m/Y') }}
                                    <span class="block text-[10px] text-slate-500 mt-0.5 font-medium">{{ $pendaftaran->jk }}</span>
                                </td>

                                <!-- Sekolah -->
                                <td class="px-5 py-4.5 text-slate-300 text-xs">
                                    {{ $pendaftaran->nama_sekolah }}
                                    <span class="block text-[10px] text-slate-500 mt-0.5 font-bold uppercase">{{ $pendaftaran->sekolah_asal }}</span>
                                </td>

                                <!-- UAN Avg -->
                                <td class="px-5 py-4.5 text-center">
                                    <div class="text-sm font-extrabold text-sky-400 font-outfit" title="Matematika: {{ $pendaftaran->matematika }}, Inggris: {{ $pendaftaran->inggris }}, Indonesia: {{ $pendaftaran->indonesia }}">
                                        {{ number_format($avg_uan, 2) }}
                                    </div>
                                    <span class="text-[9px] text-slate-500 block mt-0.5">UAN Average</span>
                                </td>

                                <!-- Program Pilihan -->
                                <td class="px-5 py-4.5 text-xs space-y-0.5">
                                    <div class="text-slate-200"><span class="text-[10px] text-sky-400 font-bold mr-0.5">1:</span> {{ Str::limit($pendaftaran->pilihan1, 20) }}</div>
                                    <div class="text-slate-450"><span class="text-[10px] text-slate-500 font-semibold mr-0.5">2:</span> {{ Str::limit($pendaftaran->pilihan2, 20) }}</div>
                                </td>

                                <!-- Actions -->
                                <td class="px-5 py-4.5 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <!-- Edit -->
                                        <a href="{{ route('uas.pendaftaran.edit', $pendaftaran) }}" title="Edit Data" 
                                           class="h-8 w-8 rounded-lg bg-slate-900 border border-slate-850 hover:border-amber-500/40 text-slate-400 hover:text-amber-400 flex items-center justify-center transition-colors">
                                            <i class="fa-solid fa-user-pen text-xs"></i>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('uas.pendaftaran.destroy', $pendaftaran) }}" method="POST" 
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pendaftaran ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus Data" 
                                                    class="h-8 w-8 rounded-lg bg-slate-900 border border-slate-850 hover:border-rose-500/40 text-slate-400 hover:text-rose-400 flex items-center justify-center transition-colors">
                                                <i class="fa-solid fa-trash-can text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="px-5 py-12 text-center text-slate-500 text-xs">
                                <i class="fa-solid fa-id-card text-4xl mb-3 block text-slate-650"></i>
                                Belum ada data pendaftaran mahasiswa baru yang masuk ke sistem.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
