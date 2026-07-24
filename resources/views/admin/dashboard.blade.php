@extends('layouts.app')

@section('title', 'Admin Dashboard - Informatics Store')

@section('content')
<div class="animate-fade-in space-y-8">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 py-4">
        <div>
            <h1 class="font-outfit font-extrabold text-3xl text-white tracking-tight">
                Dashboard Admin
            </h1>
            <p class="text-slate-400 text-sm mt-1">
                Selamat datang kembali, Administrator. Berikut adalah ringkasan data sistem Anda hari ini.
            </p>
        </div>
        
        <div class="flex gap-3">
            <a href="{{ route('uas.barang.create') }}" class="glow-btn inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-slate-900 bg-gradient-to-r from-sky-400 to-blue-500 shadow-md shadow-sky-500/10">
                <i class="fa-solid fa-plus"></i> Tambah Barang
            </a>
            <a href="{{ route('uas.daftar.create') }}" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-300 hover:text-white bg-slate-800 hover:bg-slate-750 border border-slate-700 transition-colors">
                <i class="fa-solid fa-up-right-from-square"></i> Buka Form
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Stat: Total Jenis Barang -->
        <div class="glass-card p-6 rounded-3xl flex items-center justify-between">
            <div class="space-y-2">
                <span class="text-xs text-slate-450 font-bold uppercase tracking-wider">Total Jenis Barang</span>
                <div class="text-3xl font-extrabold font-outfit text-white">
                    {{ $total_barang }}
                </div>
                <a href="{{ route('uas.barang.index') }}" class="text-xs text-sky-400 font-medium hover:underline inline-block pt-1">
                    Kelola barang <i class="fa-solid fa-arrow-right text-[10px] ml-0.5"></i>
                </a>
            </div>
            <div class="h-12 w-12 rounded-2xl bg-sky-500/10 border border-sky-500/20 text-sky-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-box"></i>
            </div>
        </div>

        <!-- Stat: Total Pendaftaran -->
        <div class="glass-card p-6 rounded-3xl flex items-center justify-between">
            <div class="space-y-2">
                <span class="text-xs text-slate-450 font-bold uppercase tracking-wider">Pendaftaran</span>
                <div class="text-3xl font-extrabold font-outfit text-white">
                    {{ $total_pendaftaran }}
                </div>
                <a href="{{ route('uas.pendaftaran.index') }}" class="text-xs text-sky-400 font-medium hover:underline inline-block pt-1">
                    Lihat pendaftar <i class="fa-solid fa-arrow-right text-[10px] ml-0.5"></i>
                </a>
            </div>
            <div class="h-12 w-12 rounded-2xl bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-id-card"></i>
            </div>
        </div>

        <!-- Stat: Total Stok -->
        <div class="glass-card p-6 rounded-3xl flex items-center justify-between">
            <div class="space-y-2">
                <span class="text-xs text-slate-450 font-bold uppercase tracking-wider">Total Stok</span>
                <div class="text-3xl font-extrabold font-outfit text-white">
                    {{ number_format($total_stok) }}
                </div>
                <span class="text-[11px] text-slate-500 font-medium inline-block pt-2">
                    Item di gudang
                </span>
            </div>
            <div class="h-12 w-12 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-warehouse"></i>
            </div>
        </div>

        <!-- Stat: Avg Harga -->
        <div class="glass-card p-6 rounded-3xl flex items-center justify-between">
            <div class="space-y-2">
                <span class="text-xs text-slate-450 font-bold uppercase tracking-wider">Rata-rata Harga</span>
                <div class="text-xl font-extrabold font-outfit text-rose-400 mt-1">
                    Rp {{ number_format($avg_harga, 0, ',', '.') }}
                </div>
                <span class="text-[11px] text-slate-500 font-medium inline-block pt-2">
                    Nilai rata-rata barang
                </span>
            </div>
            <div class="h-12 w-12 rounded-2xl bg-rose-500/10 border border-rose-500/20 text-rose-400 flex items-center justify-center text-xl">
                <i class="fa-solid fa-tags"></i>
            </div>
        </div>
    </div>

    <!-- Recent Tables Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Goods -->
        <div class="glass-card rounded-3xl overflow-hidden flex flex-col">
            <div class="px-6 py-4.5 border-b border-slate-800/80 flex items-center justify-between">
                <h2 class="font-outfit font-bold text-lg text-white">
                    Barang Terbaru
                </h2>
                <a href="{{ route('uas.barang.index') }}" class="text-xs text-sky-400 hover:text-sky-350 font-semibold flex items-center gap-1">
                    Selengkapnya <i class="fa-solid fa-angle-right text-[10px]"></i>
                </a>
            </div>
            
            <div class="p-6 flex-grow">
                @if($recent_barangs->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead>
                                <tr class="text-xs text-slate-500 font-bold uppercase border-b border-slate-800 pb-3">
                                    <th class="pb-3 w-12">Foto</th>
                                    <th class="pb-3">Barang</th>
                                    <th class="pb-3">Kategori</th>
                                    <th class="pb-3 text-right">Harga</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/60">
                                @foreach($recent_barangs as $barang)
                                    <tr class="hover:bg-slate-900/20 transition-colors">
                                        <td class="py-3">
                                            <div class="h-9 w-9 rounded-lg bg-slate-900 border border-slate-800 overflow-hidden">
                                                @if($barang->gambar)
                                                    <img src="{{ asset('storage/' . $barang->gambar) }}" alt="" class="h-full w-full object-cover">
                                                @else
                                                    <div class="h-full w-full flex items-center justify-center text-slate-700 text-xs">
                                                        <i class="fa-solid fa-image"></i>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="py-3 font-semibold text-slate-200">
                                            {{ $barang->nama_barang }}
                                            <span class="block text-[10px] font-mono text-slate-500 font-normal">{{ $barang->kode_barang }}</span>
                                        </td>
                                        <td class="py-3 text-slate-400 text-xs">{{ $barang->kategori }}</td>
                                        <td class="py-3 text-right text-rose-400 font-bold font-outfit">
                                            Rp {{ number_format($barang->harga, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8 text-slate-550 text-xs">
                        <i class="fa-solid fa-box-open text-3xl mb-2 block"></i>
                        Belum ada data barang.
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Registrations -->
        <div class="glass-card rounded-3xl overflow-hidden flex flex-col">
            <div class="px-6 py-4.5 border-b border-slate-800/80 flex items-center justify-between">
                <h2 class="font-outfit font-bold text-lg text-white">
                    Pendaftaran Terbaru
                </h2>
                <a href="{{ route('uas.pendaftaran.index') }}" class="text-xs text-sky-400 hover:text-sky-350 font-semibold flex items-center gap-1">
                    Selengkapnya <i class="fa-solid fa-angle-right text-[10px]"></i>
                </a>
            </div>

            <div class="p-6 flex-grow">
                @if($recent_pendaftarans->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead>
                                <tr class="text-xs text-slate-500 font-bold uppercase border-b border-slate-800 pb-3">
                                    <th class="pb-3">Nama</th>
                                    <th class="pb-3">Pilihan 1</th>
                                    <th class="pb-3 text-right">Rata-Rata UAN</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/60">
                                @foreach($recent_pendaftarans as $pendaftaran)
                                    @php
                                        $avg_uan = ($pendaftaran->matematika + $pendaftaran->inggris + $pendaftaran->indonesia) / 3;
                                    @endphp
                                    <tr class="hover:bg-slate-900/20 transition-colors">
                                        <td class="py-3 font-semibold text-slate-200">
                                            {{ $pendaftaran->nama }}
                                            <span class="block text-[10px] text-slate-500 font-normal">{{ $pendaftaran->nama_school ?? $pendaftaran->nama_sekolah }}</span>
                                        </td>
                                        <td class="py-3 text-slate-400 text-xs">
                                            {{ Str::limit($pendaftaran->pilihan1, 18) }}
                                        </td>
                                        <td class="py-3 text-right font-extrabold text-sky-400 font-outfit">
                                            {{ number_format($avg_uan, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8 text-slate-550 text-xs">
                        <i class="fa-solid fa-id-card text-3xl mb-2 block"></i>
                        Belum ada pendaftaran baru.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
