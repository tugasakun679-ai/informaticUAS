@extends('layouts.app')

@section('title', 'Katalog Fashion - Informatics Store')

@section('content')
<div class="animate-fade-in space-y-8">
    <!-- Hero / Title -->
    <div class="text-center py-6">
        <h1 class="font-outfit font-extrabold text-4xl sm:text-5xl text-white tracking-tight">
            Koleksi Fashion Terbaru
        </h1>
        <p class="mt-3 text-slate-400 max-w-xl mx-auto text-sm sm:text-base">
            Dapatkan pakaian berkualitas dengan desain terupdate khusus untuk mahasiswa informatika.
        </p>
    </div>

    <!-- Search & Filters Bar -->
    <div class="glass-card p-4 sm:p-6 rounded-2xl flex flex-col md:flex-row gap-4 items-center justify-between">
        <!-- Search form -->
        <form action="{{ route('uas.shop') }}" method="GET" class="w-full md:w-96 flex gap-2">
            <div class="relative flex-grow">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari barang atau kategori..." 
                       class="w-full pl-10 pr-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm">
                @if(request('q') || request('kategori'))
                    <a href="{{ route('uas.shop') }}" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-500 hover:text-slate-300">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </a>
                @endif
            </div>
            <button type="submit" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-750 text-slate-300 font-medium text-sm border border-slate-700 transition-colors">
                Cari
            </button>
        </form>

        <!-- Category Pills -->
        <div class="flex flex-wrap gap-2 w-full md:w-auto">
            <a href="{{ route('uas.shop', array_merge(request()->except('kategori'), [])) }}" 
               class="px-4 py-2 rounded-xl text-xs font-semibold border transition-all {{ !request('kategori') ? 'bg-sky-500/15 border-sky-500/35 text-sky-400' : 'bg-slate-900/60 border-slate-800 text-slate-400 hover:border-slate-700 hover:text-slate-300' }}">
                Semua
            </a>
            @foreach($categories as $category)
                <a href="{{ route('uas.shop', array_merge(request()->except('kategori'), ['kategori' => $category])) }}" 
                   class="px-4 py-2 rounded-xl text-xs font-semibold border transition-all {{ request('kategori') == $category ? 'bg-sky-500/15 border-sky-500/35 text-sky-400' : 'bg-slate-900/60 border-slate-800 text-slate-400 hover:border-slate-700 hover:text-slate-300' }}">
                    {{ $category }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Product Grid -->
    @if($barangs->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($barangs as $barang)
                <div class="glass-card rounded-3xl overflow-hidden flex flex-col h-full group">
                    <!-- Image -->
                    <div class="relative aspect-square w-full bg-slate-950/40 overflow-hidden border-b border-slate-850">
                        @if($barang->gambar)
                            <img src="{{ asset('storage/' . $barang->gambar) }}" 
                                 onerror="this.onerror=null;this.src='{{ asset('store/gambar/' . basename($barang->gambar)) }}';" 
                                 alt="{{ $barang->nama_barang }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-600 bg-slate-900/50">
                                <i class="fa-solid fa-image text-5xl mb-2"></i>
                                <span class="text-xs">Tidak ada gambar</span>
                            </div>
                        @endif
                        
                        <!-- Category Badge -->
                        <span class="absolute top-4 left-4 px-3 py-1.5 rounded-xl bg-slate-900/90 text-sky-400 text-xs font-semibold border border-slate-750 backdrop-blur-md">
                            {{ $barang->kategori }}
                        </span>
                        
                        <!-- Code Badge -->
                        <span class="absolute top-4 right-4 px-2.5 py-1 rounded-lg bg-slate-950/80 text-slate-400 text-[10px] tracking-wider font-mono">
                            {{ $barang->kode_barang }}
                        </span>
                    </div>

                    <!-- Details -->
                    <div class="p-6 flex flex-col flex-grow space-y-4">
                        <div class="space-y-1.5">
                            <h3 class="font-outfit font-bold text-lg text-white group-hover:text-sky-400 transition-colors">
                                {{ $barang->nama_barang }}
                            </h3>
                            <p class="text-slate-450 text-xs line-clamp-2 leading-relaxed">
                                {{ $barang->deskripsi ?: 'Tidak ada deskripsi untuk barang ini.' }}
                            </p>
                        </div>

                        <!-- Price and Stock -->
                        <div class="mt-auto pt-4 border-t border-slate-800/80 flex items-center justify-between mb-3">
                            <div class="space-y-0.5">
                                <span class="text-[10px] text-slate-500 font-semibold uppercase tracking-wider">Harga</span>
                                <div class="text-lg font-extrabold text-rose-400 font-outfit">
                                    Rp {{ number_format($barang->harga, 0, ',', '.') }}
                                </div>
                            </div>
                            
                            <div class="text-right space-y-1">
                                <span class="text-[10px] text-slate-500 font-semibold uppercase tracking-wider block">Stok</span>
                                @if($barang->stok > 0)
                                    <span class="inline-flex items-center gap-1.5 text-xs text-emerald-400 font-bold bg-emerald-500/10 px-2.5 py-1 rounded-lg border border-emerald-500/20">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                        {{ $barang->stok }} Pcs
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 text-xs text-rose-400 font-bold bg-rose-500/10 px-2.5 py-1 rounded-lg border border-rose-500/20">
                                        Habis
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        @if($barang->stok > 0)
                        <a href="{{ route('uas.pesan.create', ['barang' => $barang->id]) }}" class="block w-full py-2.5 text-center bg-sky-500 hover:bg-sky-600 text-white text-sm font-bold rounded-xl transition-colors mt-2">
                            <i class="fa-solid fa-cart-shopping mr-1.5"></i> Pesan Sekarang
                        </a>
                        @else
                        <button disabled class="block w-full py-2.5 text-center bg-slate-800 text-slate-500 text-sm font-bold rounded-xl cursor-not-allowed mt-2">
                            Stok Habis
                        </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="glass-panel p-16 rounded-3xl text-center max-w-xl mx-auto space-y-4 border border-slate-800">
            <div class="h-16 w-16 rounded-2xl bg-slate-900 flex items-center justify-center mx-auto border border-slate-800 text-slate-500 text-2xl">
                <i class="fa-solid fa-box-open"></i>
            </div>
            <div class="space-y-1">
                <h3 class="font-outfit font-bold text-lg text-white">Tidak ada barang</h3>
                <p class="text-slate-400 text-sm">
                    Barang yang Anda cari tidak ditemukan. Coba gunakan kata kunci lain atau hapus filter.
                </p>
            </div>
            <div>
                <a href="{{ route('uas.shop') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-300 bg-slate-800 border border-slate-700 hover:bg-slate-700/80 transition-all">
                    Reset Pencarian
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
