<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Tugas Pemrograman Web - UTS & UAS</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        html, body {
            min-height: 100vh;
            overflow-y: auto !important;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #0b0f19;
            color: #f1f5f9;
        }
        .wrapper {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px 60px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .badge {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 50px;
            background: rgba(14, 165, 233, 0.15);
            color: #38bdf8;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid rgba(56, 189, 248, 0.3);
            margin-bottom: 16px;
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
            line-height: 1.2;
        }
        p.subtitle {
            color: #94a3b8;
            font-size: 1rem;
            max-width: 500px;
            margin: 0 auto;
            line-height: 1.5;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            width: 100%;
        }
        .card {
            background: #151d2a;
            border: 1px solid #243044;
            border-radius: 20px;
            padding: 32px 28px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }
        .card:hover {
            border-color: #38bdf8;
            transform: translateY(-4px);
        }
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: bold;
        }
        .icon-uts {
            background: rgba(245, 158, 11, 0.15);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
        .icon-uas {
            background: rgba(14, 165, 233, 0.15);
            color: #38bdf8;
            border: 1px solid rgba(56, 189, 248, 0.3);
        }
        .tech-tag {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 4px 10px;
            border-radius: 6px;
        }
        .tag-uts { background: rgba(245, 158, 11, 0.15); color: #fbbf24; }
        .tag-uas { background: rgba(14, 165, 233, 0.15); color: #38bdf8; }
        
        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 8px;
        }
        .card-desc {
            color: #94a3b8;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .features {
            list-style: none;
            border-top: 1px solid #243044;
            padding-top: 16px;
            margin-bottom: 28px;
        }
        .features li {
            font-size: 13px;
            color: #cbd5e1;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .features li::before {
            content: "✓";
            font-weight: bold;
        }
        .features-uts li::before { color: #fbbf24; }
        .features-uas li::before { color: #38bdf8; }

        .btn {
            display: block;
            width: 100%;
            padding: 14px 20px;
            text-align: center;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s ease, opacity 0.2s ease;
        }
        .btn-uts {
            background: #f59e0b;
            color: #000000;
        }
        .btn-uts:hover {
            background: #d97706;
        }
        .btn-uas {
            background: #0284c7;
            color: #ffffff;
        }
        .btn-uas:hover {
            background: #0369a1;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="badge">Portal Pemrograman Web</div>
            <h1>Pilih Tugas Application</h1>
            <p class="subtitle">Silakan pilih sistem aplikasi di bawah ini untuk mengakses tugas UTS atau UAS.</p>
        </div>

        <div class="grid">
            <!-- UTS Card -->
            <div class="card">
                <div>
                    <div class="card-header">
                        <div class="card-icon icon-uts">UTS</div>
                        <span class="tech-tag tag-uts">PHP Native</span>
                    </div>
                    <div class="card-title">Tugas UTS</div>
                    <div class="card-desc">
                        Sistem Informasi Pendaftaran Siswa &amp; Katalog Sederhana. Dikembangkan dengan HTML Native dan PHP Native.
                    </div>
                    <ul class="features features-uts">
                        <li>Form &amp; Data Pendaftaran Siswa</li>
                        <li>Katalog Fashion Sederhana</li>
                        <li>Koneksi Database MySQL</li>
                    </ul>
                </div>
                <a href="/store/index.html" class="btn btn-uts">Buka Project UTS &rarr;</a>
            </div>

            <!-- UAS Card -->
            <div class="card">
                <div>
                    <div class="card-header">
                        <div class="card-icon icon-uas">UAS</div>
                        <span class="tech-tag tag-uas">Laravel Framework</span>
                    </div>
                    <div class="card-title">Tugas UAS (Store)</div>
                    <div class="card-desc">
                        Informatics Store: E-Commerce &amp; Admin Panel modern lengkap dengan katalog produk dan kelola barang.
                    </div>
                    <ul class="features features-uas">
                        <li>Katalog Produk &amp; Form Pemesanan</li>
                        <li>Dashboard Admin &amp; CRUD Inventaris</li>
                        <li>Manajemen Pendaftaran</li>
                    </ul>
                </div>
                <a href="/uas" class="btn btn-uas">Buka Project UAS &rarr;</a>
            </div>
        </div>

        <div class="footer">
            &copy; <?php echo date('Y'); ?> Informatics Store — Portal Pemrograman Web
        </div>
    </div>
</body>
</html>


