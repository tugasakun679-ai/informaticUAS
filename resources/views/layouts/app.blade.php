<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Informatics Store - Sistem Informasi Pengelolaan Barang (UAS)">
    <title>@yield('title', 'Informatics Store - UAS Pemrograman Web')</title>
    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Segoe UI', 'Tahoma', 'Geneva', 'Verdana', 'sans-serif'],
                        outfit: ['Segoe UI', 'Tahoma', 'Geneva', 'Verdana', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Standard Student Template Styles -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333333;
            min-height: 100vh;
        }
        
        /* Navy Blue header like a typical university portal */
        .glass-panel {
            background-color: #1e3a8a !important; /* Dark Blue */
            border-bottom: 4px solid #3b82f6 !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        /* Clean white boxy cards */
        .glass-card {
            background-color: #ffffff !important;
            border: 1px solid #d1d5db !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
            color: #1f2937 !important;
            border-radius: 8px !important;
            transform: none !important;
            transition: none !important;
        }
        
        .glass-card:hover {
            transform: none !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
            border-color: #9ca3af !important;
        }
        
        /* Standard Bootstrap blue buttons */
        .glow-btn {
            background-color: #007bff !important;
            color: #ffffff !important;
            border: 1px solid #007bff !important;
            border-radius: 6px !important;
            font-weight: 600 !important;
            box-shadow: none !important;
            text-shadow: none !important;
        }
        
        .glow-btn:hover {
            background-color: #0056b3 !important;
            border-color: #004085 !important;
            transform: none !important;
        }
        
        /* Headings */
        h1, h2, h3 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
            color: #1e3a8a !important;
            text-shadow: none !important;
            font-weight: 600 !important;
        }
        
        /* Custom labels and text styling */
        label {
            color: #4b5563 !important;
        }
    </style>
</head>
<body class="flex flex-col">

    <!-- Header Navigation -->
    <header class="sticky top-0 z-50 glass-panel">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('uas.dashboard') }}" class="flex items-center gap-2">
                        <div class="h-8 w-8 rounded bg-white text-blue-800 flex items-center justify-center font-bold border border-blue-200">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <span class="font-bold text-xl tracking-tight text-white uppercase">
                            INFORMATICS <span class="text-blue-200 font-normal">STORE</span>
                        </span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <nav class="hidden md:flex items-center gap-6">
                    <a href="{{ route('uas.dashboard') }}" class="text-sm font-semibold {{ Request::is('uas') ? 'text-white border-b-2 border-white' : 'text-blue-100 hover:text-white' }} py-1.5 transition-colors">
                        <i class="fa-solid fa-gauge mr-1"></i> Dashboard
                    </a>
                    <a href="{{ route('uas.barang.index') }}" class="text-sm font-semibold {{ Request::is('uas/barang*') ? 'text-white border-b-2 border-white' : 'text-blue-100 hover:text-white' }} py-1.5 transition-colors">
                        <i class="fa-solid fa-box mr-1"></i> Kelola Barang
                    </a>
                    <a href="{{ route('uas.pesanan.index') }}" class="text-sm font-semibold {{ Request::is('uas/pesanan*') ? 'text-white border-b-2 border-white' : 'text-blue-100 hover:text-white' }} py-1.5 transition-colors">
                        <i class="fa-solid fa-cart-arrow-down mr-1"></i> Pesanan Masuk
                    </a>
                    <a href="{{ route('uas.pendaftaran.index') }}" class="text-sm font-semibold {{ Request::is('uas/pendaftaran*') ? 'text-white border-b-2 border-white' : 'text-blue-100 hover:text-white' }} py-1.5 transition-colors">
                        <i class="fa-solid fa-id-card mr-1"></i> Kelola Pendaftaran
                    </a>
                    <a href="{{ route('uas.daftar.create') }}" class="text-sm font-semibold {{ Request::is('uas/daftar*') ? 'text-white border-b-2 border-white' : 'text-blue-100 hover:text-white' }} py-1.5 transition-colors">
                        <i class="fa-solid fa-file-edit mr-1"></i> Form Pendaftaran
                    </a>
                </nav>

                <!-- Navigation Buttons -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('landing') }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded bg-blue-700 hover:bg-blue-600 text-xs font-semibold text-white border border-blue-500 transition-colors">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Portal
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow py-8 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Toast / Success Messages -->
        @if(session('success'))
            <div class="mb-6 max-w-3xl mx-auto bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 max-w-3xl mx-auto bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Gagal!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-auto bg-gray-800 text-gray-400 py-6 border-t border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs">
            <p>&copy; {{ date('Y') }} Informatics Store. UAS Pemrograman Web Semester 4.</p>
            <div class="flex gap-4">
                <a href="{{ route('uas.dashboard') }}" class="hover:text-white">Dashboard</a>
                <a href="{{ route('uas.barang.index') }}" class="hover:text-white">Barang</a>
                <a href="{{ route('uas.pesanan.index') }}" class="hover:text-white">Pesanan Masuk</a>
                <a href="{{ route('uas.pendaftaran.index') }}" class="hover:text-white">Pendaftaran</a>
                <a href="{{ route('landing') }}" class="hover:text-white">Portal</a>
            </div>
        </div>
    </footer>

</body>
</html>
