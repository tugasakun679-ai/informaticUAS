@extends('layouts.app')

@section('title', 'Formulir Pemesanan - Informatics Store')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="text-center py-4">
        <h1 class="text-3xl font-bold">
            Formulir Pemesanan
        </h1>
        <p class="mt-2 text-gray-600 max-w-xl mx-auto text-sm">
            Silakan lengkapi data di bawah ini untuk memproses pesanan Anda.
        </p>
    </div>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-xl text-sm font-semibold">
            {{ session('error') }}
        </div>
    @endif

    <div class="glass-card p-6 sm:p-8">
        <form action="{{ route('uas.pesan.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Pemesan -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold">Nama Lengkap</label>
                    <input type="text" name="nama_pemesan" value="{{ old('nama_pemesan') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors"
                           placeholder="Masukkan nama lengkap Anda">
                    @error('nama_pemesan')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- No HP -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold">Nomor WhatsApp/HP</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors"
                           placeholder="Contoh: 081234567890">
                    @error('no_hp')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Alamat -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold">Alamat Pengiriman</label>
                <textarea name="alamat" rows="3" required
                          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors"
                          placeholder="Masukkan alamat lengkap Anda">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Pilih Barang -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold">Pilih Barang</label>
                    <select name="barang_id" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors bg-white">
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barangs as $b)
                            <option value="{{ $b->id }}" {{ (old('barang_id', $selectedBarang?->id) == $b->id) ? 'selected' : '' }}>
                                {{ $b->nama_barang }} (Stok: {{ $b->stok }} | Rp {{ number_format($b->harga, 0, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                    @error('barang_id')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Jumlah -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold">Jumlah Pesanan</label>
                    <input type="number" name="jumlah_pesanan" value="{{ old('jumlah_pesanan', 1) }}" min="1" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                    @error('jumlah_pesanan')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Catatan -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold">Catatan Tambahan (Opsional)</label>
                <textarea name="catatan" rows="2"
                          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors"
                          placeholder="Ukuran, warna spesifik, dll">{{ old('catatan') }}</textarea>
                @error('catatan')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="pt-4 flex items-center justify-between">
                <a href="{{ route('uas.shop') }}" class="px-6 py-2 rounded-md bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold text-sm transition-colors border border-gray-300">
                    Batal
                </a>
                <button type="submit" class="glow-btn px-8 py-2 rounded-md text-sm transition-colors flex items-center gap-2">
                    <i class="fa-solid fa-paper-plane"></i> Buat Pesanan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
