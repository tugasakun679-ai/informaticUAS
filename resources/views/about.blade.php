@extends('layouts.app')

@section('title', 'About Me - Informatics Store')

@section('content')
<div class="animate-fade-in max-w-4xl mx-auto space-y-10">
    <!-- Hero / Header -->
    <div class="text-center space-y-4">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-sky-500/10 border border-sky-500/20 text-sky-400 text-xs font-semibold">
            <i class="fa-solid fa-graduation-cap"></i> Hima-Tif Unirow
        </div>
        <h1 class="font-outfit font-extrabold text-4xl sm:text-5xl text-white tracking-tight">
            Tentang Kami
        </h1>
        <p class="text-slate-400 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
            Mengenal lebih dekat Informatics Store, platform e-commerce dan manajemen stok yang dikembangkan oleh mahasiswa teknik informatika.
        </p>
    </div>

    <!-- Main Card -->
    <div class="glass-card rounded-3xl overflow-hidden p-8 sm:p-10 space-y-8">
        <!-- Brand Info -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center pb-8 border-b border-slate-800">
            <div class="md:col-span-1 flex justify-center">
                <div class="h-28 w-28 rounded-3xl bg-gradient-to-tr from-sky-500 via-blue-600 to-indigo-600 flex items-center justify-center shadow-xl shadow-sky-500/15">
                    <i class="fa-solid fa-laptop-code text-white text-5xl"></i>
                </div>
            </div>
            <div class="md:col-span-2 space-y-3 text-center md:text-left">
                <h2 class="font-outfit font-bold text-2xl text-white">Names Store.Com</h2>
                <p class="text-slate-350 text-sm leading-relaxed">
                    Informatic Store adalah toko online yang dibuat oleh mahasiswa Hima-Tif Unirow (Himpunan Mahasiswa Teknik Informatika Universitas Ronggolawe) yang bertujuan untuk memudahkan akses tampilan visual produk serta pengelolaan stok barang secara digital dan efisien.
                </p>
            </div>
        </div>

        <!-- Contact & Operations Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Details List -->
            <div class="space-y-4">
                <h3 class="font-outfit font-bold text-lg text-white flex items-center gap-2">
                    <i class="fa-solid fa-address-book text-sky-400"></i> Informasi Kontak
                </h3>
                
                <div class="space-y-3">
                    <div class="flex items-start gap-4 p-4.5 rounded-2xl bg-slate-900/60 border border-slate-800">
                        <div class="text-sky-400 mt-1"><i class="fa-solid fa-location-dot"></i></div>
                        <div>
                            <div class="text-xs text-slate-500 font-semibold uppercase">Alamat</div>
                            <div class="text-sm text-slate-300">Jl. Unirow No. 125, Jawa Timur</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4.5 rounded-2xl bg-slate-900/60 border border-slate-800">
                        <div class="text-sky-400 mt-1"><i class="fa-solid fa-phone"></i></div>
                        <div>
                            <div class="text-xs text-slate-500 font-semibold uppercase">Telepon</div>
                            <div class="text-sm text-slate-300">0857-8014-4365</div>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4.5 rounded-2xl bg-slate-900/60 border border-slate-800">
                        <div class="text-sky-400 mt-1"><i class="fa-solid fa-envelope"></i></div>
                        <div>
                            <div class="text-xs text-slate-500 font-semibold uppercase">Email</div>
                            <div class="text-sm text-slate-300">InformaticStore@gmail.com</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Operations / Hours -->
            <div class="space-y-4">
                <h3 class="font-outfit font-bold text-lg text-white flex items-center gap-2">
                    <i class="fa-solid fa-clock text-sky-400"></i> Jam Operasional
                </h3>

                <div class="p-6 rounded-3xl bg-gradient-to-br from-slate-900/70 to-slate-900/40 border border-slate-850 h-[calc(100%-2.25rem)] flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-slate-850">
                            <span class="text-sm text-slate-400 font-medium">Senin - Jumat</span>
                            <span class="text-sm text-sky-400 font-bold">08:00 - 17:00 WIB</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-slate-850">
                            <span class="text-sm text-slate-400 font-medium">Sabtu</span>
                            <span class="text-sm text-rose-500 font-semibold">Tutup</span>
                        </div>
                        <div class="flex justify-between items-center py-2">
                            <span class="text-sm text-slate-400 font-medium">Minggu & Hari Libur</span>
                            <span class="text-sm text-rose-500 font-semibold">Tutup</span>
                        </div>
                    </div>
                    
                    <div class="mt-6 p-4 rounded-2xl bg-sky-500/5 border border-sky-500/10 text-xs text-slate-400 leading-relaxed">
                        <i class="fa-solid fa-circle-info text-sky-400 mr-1 text-sm inline-block"></i> 
                        Silakan hubungi kami melalui email atau telepon selama jam kerja jika Anda memiliki pertanyaan atau kendala.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
