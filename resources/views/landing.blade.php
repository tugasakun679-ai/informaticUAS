<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal Tugas Kuliah Pemrograman Web - UTS & UAS">
    <title>Portal Tugas Pemrograman Web</title>
    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        .glass-card {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-card:hover {
            border-color: rgba(56, 189, 248, 0.3);
            box-shadow: 0 20px 40px -15px rgba(14, 165, 233, 0.15);
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col justify-between relative overflow-hidden font-sans">
    <!-- Subtle Background Ambient Glows -->
    <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-sky-500/10 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-indigo-500/10 rounded-full blur-[140px] pointer-events-none"></div>

    <!-- Main Wrapper -->
    <div class="container mx-auto px-4 py-12 sm:py-16 flex-grow flex flex-col justify-center items-center z-10 max-w-5xl">
        
        <!-- Top Badge & Header -->
        <div class="text-center space-y-4 max-w-2xl mb-12 sm:mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-900/90 text-sky-400 text-xs font-semibold border border-sky-500/20 shadow-inner">
                <span class="w-2 h-2 rounded-full bg-sky-400 animate-pulse"></span>
                Pemrograman Web — Portal Tugas Project
            </div>
            <h1 class="font-outfit font-extrabold text-4xl sm:text-6xl text-white tracking-tight leading-tight">
                Pilih Aplikasi <span class="bg-gradient-to-r from-sky-400 via-blue-400 to-indigo-400 bg-clip-text text-transparent">Project</span>
            </h1>
            <p class="text-slate-400 text-sm sm:text-base max-w-xl mx-auto leading-relaxed">
                Akses hasil tugas praktikum dan ujian akhir semester. Silakan pilih sistem yang ingin Anda buka di bawah ini.
            </p>
        </div>

        <!-- Project Choice Cards (UTS & UAS) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 w-full">
            
            <!-- UTS Project Card -->
            <div class="glass-card rounded-3xl p-8 flex flex-col justify-between transition-all duration-300 group hover:-translate-y-1">
                <div class="space-y-6">
                    <!-- Icon & Header -->
                    <div class="flex items-center justify-between">
                        <div class="w-14 h-14 rounded-2xl bg-amber-500/10 border border-amber-500/20 text-amber-400 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-laptop-code"></i>
                        </div>
                        <span class="px-3 py-1 rounded-full text-[11px] font-bold tracking-wide uppercase bg-amber-500/10 text-amber-300 border border-amber-500/20">
                            PHP Native
                        </span>
                    </div>

                    <!-- Title & Description -->
                    <div class="space-y-2">
                        <h2 class="font-outfit font-bold text-2xl text-white group-hover:text-amber-400 transition-colors">
                            Project UTS
                        </h2>
                        <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
                            Sistem Pendaftaran Siswa &amp; Katalog Sederhana. Menggunakan HTML frameset klasik dengan integrasi database MySQL.
                        </p>
                    </div>

                    <!-- Highlights List -->
                    <div class="pt-2 space-y-2 border-t border-slate-800/80">
                        <div class="flex items-center gap-2.5 text-xs text-slate-300">
                            <i class="fa-solid fa-check text-amber-400 text-[10px]"></i>
                            <span>Form &amp; Data Pendaftaran Siswa</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-slate-300">
                            <i class="fa-solid fa-check text-amber-400 text-[10px]"></i>
                            <span>List Catalog Fashion (UTS)</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-slate-300">
                            <i class="fa-solid fa-check text-amber-400 text-[10px]"></i>
                            <span>Layout Classic Frameset</span>
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="pt-8">
                    <a href="{{ asset('store/index.html') }}" class="flex items-center justify-center gap-2 w-full py-3.5 bg-slate-900 hover:bg-amber-500 hover:text-slate-950 text-amber-300 font-bold text-sm rounded-2xl border border-amber-500/30 hover:border-amber-400 transition-all duration-300 shadow-lg shadow-amber-500/5">
                        <span>Buka Project UTS</span>
                        <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <!-- UAS Project Card -->
            <div class="glass-card rounded-3xl p-8 flex flex-col justify-between transition-all duration-300 group hover:-translate-y-1">
                <div class="space-y-6">
                    <!-- Icon & Header -->
                    <div class="flex items-center justify-between">
                        <div class="w-14 h-14 rounded-2xl bg-sky-500/10 border border-sky-500/20 text-sky-400 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-store"></i>
                        </div>
                        <span class="px-3 py-1 rounded-full text-[11px] font-bold tracking-wide uppercase bg-sky-500/10 text-sky-300 border border-sky-500/20">
                            Laravel + Tailwind
                        </span>
                    </div>

                    <!-- Title & Description -->
                    <div class="space-y-2">
                        <h2 class="font-outfit font-bold text-2xl text-white group-hover:text-sky-400 transition-colors">
                            Project UAS (Informatics Store)
                        </h2>
                        <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
                            Platform E-Commerce &amp; Admin Panel modern dengan fitur katalog produk, form pemesanan barang, serta kelola inventoris.
                        </p>
                    </div>

                    <!-- Highlights List -->
                    <div class="pt-2 space-y-2 border-t border-slate-800/80">
                        <div class="flex items-center gap-2.5 text-xs text-slate-300">
                            <i class="fa-solid fa-check text-sky-400 text-[10px]"></i>
                            <span>Katalog Produk &amp; Pemesanan</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-slate-300">
                            <i class="fa-solid fa-check text-sky-400 text-[10px]"></i>
                            <span>Dashboard Admin &amp; CRUD Inventaris</span>
                        </div>
                        <div class="flex items-center gap-2.5 text-xs text-slate-300">
                            <i class="fa-solid fa-check text-sky-400 text-[10px]"></i>
                            <span>Manajemen Data Pendaftaran</span>
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="pt-8">
                    <a href="{{ route('uas.shop') }}" class="flex items-center justify-center gap-2 w-full py-3.5 bg-sky-500 hover:bg-sky-400 text-slate-950 font-bold text-sm rounded-2xl transition-all duration-300 shadow-lg shadow-sky-500/20 hover:shadow-sky-500/30">
                        <span>Buka Project UAS</span>
                        <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-6 text-xs text-slate-500 border-t border-slate-900 bg-slate-950/80 backdrop-blur-md z-10">
        <p>&copy; {{ date('Y') }} Informatics Store — Portal Tugas Pemrograman Web</p>
    </footer>
</body>
</html>

