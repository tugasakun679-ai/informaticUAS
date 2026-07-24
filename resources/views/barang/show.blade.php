@extends('layouts.app')

@section('title', 'Detail Barang: ' . $barang->nama_barang . ' - Admin Panel')

@section('content')
<div class="animate-fade-in max-w-4xl mx-auto space-y-6">
    <!-- Header/Navigation -->
    <div class="flex items-center justify-between py-2">
        <div class="flex items-center gap-4">
            <a href="{{ route('uas.barang.index') }}" class="h-10 w-10 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white flex items-center justify-center transition-colors">
                <i class="fa-solid fa-arrow-left text-sm"></i>
            </a>
            <div>
                <h1 class="font-outfit font-extrabold text-2xl text-white tracking-tight">
                    Rincian Barang
                </h1>
                <p class="text-slate-400 text-xs mt-1">
                    Melihat spesifikasi lengkap dari item terpilih.
                </p>
            </div>
        </div>

        <div class="flex items-center gap-2.5">
            <!-- Edit -->
            <a href="{{ route('uas.barang.edit', $barang) }}" 
               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-900 bg-amber-400 hover:bg-amber-350 transition-colors">
                <i class="fa-solid fa-pen-to-square text-xs"></i> Edit
            </a>

            <!-- Delete -->
            <form action="{{ route('uas.barang.destroy', $barang) }}" method="POST" 
                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-300 hover:text-white bg-rose-950/40 hover:bg-rose-900/60 border border-rose-900/40 transition-colors">
                    <i class="fa-solid fa-trash-can text-xs"></i> Hapus
                </button>
            </form>
        </div>
    </div>

    <!-- Product Details Grid Card -->
    <div class="glass-card rounded-3xl overflow-hidden shadow-2xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6 sm:p-8">
            <!-- Image Panel -->
            <div class="bg-slate-950/40 rounded-2xl border border-slate-850 p-4 flex items-center justify-center aspect-square overflow-hidden max-h-[380px] md:max-h-none">
                @if($barang->gambar)
                    <img src="{{ asset('storage/' . $barang->gambar) }}" alt="{{ $barang->nama_barang }}" 
                         class="w-full h-full object-contain rounded-xl">
                @else
                    <div class="flex flex-col items-center justify-center text-slate-600">
                        <i class="fa-solid fa-image text-7xl mb-4"></i>
                        <span class="text-xs">Tidak ada gambar</span>
                    </div>
                @endif
            </div>

            <!-- Content Panel -->
            <div class="flex flex-col justify-between py-2 space-y-6">
                <!-- Info Section -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 rounded-lg bg-slate-900 border border-slate-800 text-sky-400 text-xs font-semibold">
                            {{ $barang->kategori }}
                        </span>
                        <span class="px-2.5 py-1 rounded-lg bg-slate-950 text-slate-500 font-mono text-[10px] tracking-wider uppercase">
                            {{ $barang->kode_barang }}
                        </span>
                    </div>

                    <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-white">
                        {{ $barang->nama_barang }}
                    </h2>

                    <!-- Price Card -->
                    <div class="p-4 rounded-2xl bg-gradient-to-r from-rose-500/10 to-red-600/5 border border-rose-500/10 inline-block w-full">
                        <span class="text-[10px] text-slate-500 font-bold uppercase tracking-wider block">Harga Produk</span>
                        <span class="text-3xl font-extrabold font-outfit text-rose-400">
                            Rp {{ number_format($barang->harga, 0, ',', '.') }}
                        </span>
                    </div>

                    <!-- Description -->
                    <div class="space-y-1.5 pt-2">
                        <span class="text-xs text-slate-550 font-bold uppercase tracking-wider block">Deskripsi</span>
                        <p class="text-slate-350 text-sm leading-relaxed whitespace-pre-line">
                            {{ $barang->deskripsi ?: 'Tidak ada deskripsi rinci untuk produk ini.' }}
                        </p>
                    </div>
                </div>

                <!-- Stats Section -->
                <div class="grid grid-cols-2 gap-4 pt-4 border-t border-slate-850">
                    <div class="p-4.5 rounded-2xl bg-slate-900/60 border border-slate-850">
                        <span class="text-[10px] text-slate-500 font-bold uppercase tracking-wider block mb-1">Status Stok</span>
                        @if($barang->stok > 10)
                            <span class="inline-flex items-center gap-1.5 text-xs text-emerald-400 font-bold bg-emerald-500/10 px-2 py-1 rounded-lg border border-emerald-500/20">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                Tersedia
                            </span>
                        @elseif($barang->stok > 0)
                            <span class="inline-flex items-center gap-1.5 text-xs text-amber-400 font-bold bg-amber-500/10 px-2 py-1 rounded-lg border border-amber-500/20">
                                Stok Menipis
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 text-xs text-rose-400 font-bold bg-rose-500/10 px-2 py-1 rounded-lg border border-rose-500/20">
                                Habis
                            </span>
                        @endif
                    </div>

                    <div class="p-4.5 rounded-2xl bg-slate-900/60 border border-slate-850">
                        <span class="text-[10px] text-slate-500 font-bold uppercase tracking-wider block mb-1">Jumlah Stok</span>
                        <span class="text-base font-extrabold font-outfit text-white">
                            {{ $barang->stok }} Pcs
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
