@extends('layouts.app')

@section('title', 'Kelola Barang - Admin Panel')

@section('content')
<div class="animate-fade-in space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-2">
        <div>
            <h1 class="font-outfit font-extrabold text-2xl text-white tracking-tight">
                Daftar Barang
            </h1>
            <p class="text-slate-400 text-xs mt-1">
                Kelola data barang inventaris toko termasuk kode, kategori, stok, harga, dan gambar.
            </p>
        </div>
        
        <a href="{{ route('uas.barang.create') }}" class="glow-btn inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-slate-900 bg-gradient-to-r from-sky-400 to-blue-500 shadow-md shadow-sky-500/10">
            <i class="fa-solid fa-plus text-xs"></i> Tambah Barang
        </a>
    </div>

    <!-- Table Card -->
    <div class="glass-card rounded-3xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <!-- Table Head -->
                <thead>
                    <tr class="text-xs text-slate-400 font-bold uppercase border-b border-slate-800 bg-slate-950/20">
                        <th class="px-6 py-4.5 w-24 text-center">Gambar</th>
                        <th class="px-6 py-4.5">Kode</th>
                        <th class="px-6 py-4.5">Nama Barang</th>
                        <th class="px-6 py-4.5">Kategori</th>
                        <th class="px-6 py-4.5 text-center">Stok</th>
                        <th class="px-6 py-4.5 text-right">Harga</th>
                        <th class="px-6 py-4.5 text-center w-40">Aksi</th>
                    </tr>
                </thead>
                
                <!-- Table Body -->
                <tbody class="divide-y divide-slate-800/50">
                    @if($barangs->count() > 0)
                        @foreach($barangs as $barang)
                            <tr class="hover:bg-slate-900/15 transition-colors">
                                <!-- Image -->
                                <td class="px-6 py-4 flex justify-center">
                                    <div class="h-12 w-12 rounded-xl bg-slate-900 border border-slate-800 overflow-hidden flex items-center justify-center">
                                        @if($barang->gambar)
                                            <img src="{{ asset('storage/' . $barang->gambar) }}" alt="" class="h-full w-full object-cover">
                                        @else
                                            <i class="fa-solid fa-image text-slate-700 text-lg"></i>
                                        @endif
                                    </div>
                                </td>

                                <!-- Code -->
                                <td class="px-6 py-4 font-mono text-xs font-semibold text-slate-400">
                                    {{ $barang->kode_barang }}
                                </td>

                                <!-- Name -->
                                <td class="px-6 py-4 font-semibold text-white">
                                    {{ $barang->nama_barang }}
                                </td>

                                <!-- Category -->
                                <td class="px-6 py-4 text-slate-300">
                                    <span class="inline-block px-2.5 py-1 rounded-lg bg-slate-900 text-slate-400 border border-slate-800/80 text-xs">
                                        {{ $barang->kategori }}
                                    </span>
                                </td>

                                <!-- Stock -->
                                <td class="px-6 py-4 text-center">
                                    @if($barang->stok > 10)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg text-xs font-bold text-emerald-400 bg-emerald-500/10 border border-emerald-500/20">
                                            {{ $barang->stok }} Pcs
                                        </span>
                                    @elseif($barang->stok > 0)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg text-xs font-bold text-amber-400 bg-amber-500/10 border border-amber-500/20">
                                            {{ $barang->stok }} Pcs (Menipis)
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg text-xs font-bold text-rose-400 bg-rose-500/10 border border-rose-500/20">
                                            Habis
                                        </span>
                                    @endif
                                </td>

                                <!-- Price -->
                                <td class="px-6 py-4 text-right font-extrabold font-outfit text-slate-200">
                                    Rp {{ number_format($barang->harga, 0, ',', '.') }}
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <!-- View Details -->
                                        <a href="{{ route('uas.barang.show', $barang) }}" title="Detail" 
                                           class="h-8 w-8 rounded-lg bg-slate-900 border border-slate-850 hover:border-sky-500/40 text-slate-400 hover:text-sky-400 flex items-center justify-center transition-colors">
                                            <i class="fa-solid fa-eye text-xs"></i>
                                        </a>
                                        
                                        <!-- Edit -->
                                        <a href="{{ route('uas.barang.edit', $barang) }}" title="Edit" 
                                           class="h-8 w-8 rounded-lg bg-slate-900 border border-slate-850 hover:border-amber-500/40 text-slate-400 hover:text-amber-400 flex items-center justify-center transition-colors">
                                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                                        </a>

                                        <!-- Delete -->
                                        <form action="{{ route('uas.barang.destroy', $barang) }}" method="POST" 
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus" 
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
                            <td colspan="7" class="px-6 py-12 text-center text-slate-500 text-xs">
                                <i class="fa-solid fa-box-open text-4xl mb-3 block text-slate-650"></i>
                                Tidak ada data barang yang tersedia. Klik <b>Tambah Barang</b> untuk menambah data baru.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
