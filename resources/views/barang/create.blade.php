@extends('layouts.app')

@section('title', 'Tambah Barang Baru - Admin Panel')

@section('content')
<div class="animate-fade-in max-w-3xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center gap-4 py-2">
        <a href="{{ route('uas.barang.index') }}" class="h-10 w-10 rounded-xl bg-slate-900 border border-slate-800 text-slate-400 hover:text-white flex items-center justify-center transition-colors">
            <i class="fa-solid fa-arrow-left text-sm"></i>
        </a>
        <div>
            <h1 class="font-outfit font-extrabold text-2xl text-white tracking-tight">
                Tambah Barang Baru
            </h1>
            <p class="text-slate-400 text-xs mt-1">
                Masukkan rincian informasi produk baru di bawah ini.
            </p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="glass-card p-6 sm:p-8 rounded-3xl">
        <form action="{{ route('uas.barang.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Kode Barang -->
                <div class="space-y-1.5">
                    <label for="kode_barang" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Kode Barang</label>
                    <input type="text" name="kode_barang" id="kode_barang" value="{{ old('kode_barang') }}" required placeholder="Contoh: BRG-004"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('kode_barang') border-rose-500 @enderror">
                    @error('kode_barang')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Barang -->
                <div class="space-y-1.5">
                    <label for="nama_barang" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}" required placeholder="Contoh: Hoodie Hima-Tif"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('nama_barang') border-rose-500 @enderror">
                    @error('nama_barang')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kategori -->
                <div class="space-y-1.5">
                    <label for="kategori" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}" required placeholder="Contoh: Kaos, Celana, Jaket, Aksesoris"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('kategori') border-rose-500 @enderror">
                    @error('kategori')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Harga -->
                <div class="space-y-1.5">
                    <label for="harga" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Harga (Rupiah)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500 text-sm font-semibold">Rp</span>
                        <input type="number" name="harga" id="harga" value="{{ old('harga') }}" required placeholder="0" min="0"
                               class="w-full pl-10 pr-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('harga') border-rose-500 @enderror">
                    </div>
                    @error('harga')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stok -->
                <div class="space-y-1.5">
                    <label for="stok" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Jumlah Stok</label>
                    <input type="number" name="stok" id="stok" value="{{ old('stok', 0) }}" required min="0"
                           class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('stok') border-rose-500 @enderror">
                    @error('stok')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gambar (Upload) -->
                <div class="space-y-1.5">
                    <label for="gambar" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Gambar Produk</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*"
                           class="w-full px-4 py-2 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-400 text-xs focus:outline-none focus:border-sky-500 transition-colors file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-800 file:text-slate-300 hover:file:bg-slate-700 file:cursor-pointer @error('gambar') border-rose-500 @enderror">
                    <p class="text-[10px] text-slate-500 mt-0.5">Format: JPEG, PNG, JPG, WEBP. Maks 2MB.</p>
                    @error('gambar')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="sm:col-span-2 space-y-1.5">
                    <label for="deskripsi" class="text-xs text-slate-450 font-bold uppercase tracking-wider">Deskripsi Barang</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" placeholder="Tuliskan deskripsi lengkap mengenai bahan, ukuran, dan detail produk..."
                              class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700/80 rounded-xl text-slate-200 placeholder-slate-500 focus:outline-none focus:border-sky-500 transition-colors text-sm @error('deskripsi') border-rose-500 @enderror">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-800/80">
                <a href="{{ route('uas.barang.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-700 text-slate-400 hover:text-white hover:bg-slate-800 transition-all font-semibold text-sm">
                    Batal
                </a>
                <button type="submit" class="glow-btn px-6 py-2.5 rounded-xl text-slate-900 bg-gradient-to-r from-sky-400 to-blue-500 font-extrabold text-sm shadow-md shadow-sky-500/10">
                    Simpan Barang
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
