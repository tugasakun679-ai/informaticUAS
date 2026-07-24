<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS - Belum Tersedia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            min-height: 100vh;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-blue-900 border-b-4 border-blue-500 py-4 shadow-md">
        <div class="max-w-5xl mx-auto px-4 flex items-center justify-between">
            <h1 class="text-xl font-bold text-white tracking-tight">PORTAL TUGAS KULIAH</h1>
            <a href="{{ route('landing') }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-blue-700 hover:bg-blue-600 text-white text-sm font-semibold rounded border border-blue-500 transition-colors">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Portal
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center px-4 py-16">
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-12 max-w-lg w-full text-center space-y-6">
            <!-- Icon -->
            <div class="h-20 w-20 bg-amber-50 text-amber-500 rounded-full flex items-center justify-center text-4xl mx-auto border-2 border-amber-200">
                <i class="fa-solid fa-helmet-safety"></i>
            </div>

            <!-- Title -->
            <div class="space-y-2">
                <span class="px-3 py-1 rounded bg-amber-100 text-amber-800 text-xs font-bold uppercase tracking-wider inline-block">Pilihan 2</span>
                <h2 class="text-2xl font-bold text-gray-800">Ujian Akhir Semester (UAS)</h2>
                <p class="text-gray-500 text-sm leading-relaxed">
                    Halaman ini masih dalam tahap pengembangan.<br>
                    Konten proyek UAS belum tersedia saat ini.
                </p>
            </div>

            <!-- Info Box -->
            <div class="bg-gray-50 border border-dashed border-gray-300 rounded-lg p-5 text-sm text-gray-500 space-y-2">
                <div class="flex items-center justify-center gap-2 text-amber-600 font-semibold">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Dalam Pengerjaan
                </div>
                <p class="text-xs text-gray-400">
                    Silakan kembali ke halaman utama dan pilih <strong>UTS</strong> untuk melihat proyek yang sudah selesai dikerjakan.
                </p>
            </div>

            <!-- Back Button -->
            <a href="{{ route('landing') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md shadow transition-colors">
                <i class="fa-solid fa-house"></i> Kembali ke Halaman Utama
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-400 py-5 border-t border-gray-700 mt-auto">
        <div class="max-w-5xl mx-auto px-4 text-center text-xs">
            <p>&copy; {{ date('Y') }} Universitas Ronggolawe. Tugas Akhir Pemrograman Web Semester 4.</p>
        </div>
    </footer>

</body>
</html>
