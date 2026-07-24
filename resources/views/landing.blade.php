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
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #0f172a;
            color: #f8fafc;
        }
        .container {
            max-width: 650px;
            margin: 0 auto;
            padding: 30px 16px 60px 16px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-top: 10px;
        }
        .badge {
            display: inline-block;
            background-color: #0284c7;
            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }
        h1 {
            font-size: 28px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 8px;
        }
        p.subtitle {
            font-size: 14px;
            color: #94a3b8;
        }
        .card-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .card {
            background-color: #1e293b;
            border: 2px solid #334155;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
        }
        .card-uts {
            border-left: 6px solid #f59e0b;
        }
        .card-uas {
            border-left: 6px solid #0284c7;
        }
        .card-title {
            font-size: 20px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 6px;
        }
        .card-desc {
            font-size: 13px;
            color: #cbd5e1;
            line-height: 1.5;
            margin-bottom: 16px;
        }
        .card-features {
            font-size: 12px;
            color: #94a3b8;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .card-features div {
            margin-bottom: 4px;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 16px 20px;
            text-align: center;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 800;
            text-decoration: none;
            cursor: pointer;
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }
        .btn-uts {
            background-color: #f59e0b;
            color: #0f172a;
        }
        .btn-uts:active, .btn-uts:hover {
            background-color: #d97706;
        }
        .btn-uas {
            background-color: #0284c7;
            color: #ffffff;
        }
        .btn-uas:active, .btn-uas:hover {
            background-color: #0369a1;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <span class="badge">Portal Mahasiswa</span>
            <h1>Pilih Aplikasi Project</h1>
            <p class="subtitle">Silakan ketuk tombol di bawah untuk membuka tugas UTS atau UAS</p>
        </div>

        <div class="card-list">
            <!-- UTS Option -->
            <div class="card card-uts">
                <div class="card-title">📌 Project UTS</div>
                <div class="card-desc">
                    Sistem Informasi Pendaftaran Siswa &amp; Katalog Sederhana.
                </div>
                <div class="card-features">
                    <div>✓ Form &amp; Data Pendaftaran Siswa (Database MySQL)</div>
                    <div>✓ List Catalog Fashion Sederhana</div>
                </div>
                <a href="/store/index.html" class="btn btn-uts">👉 BUKA PROJECT UTS</a>
            </div>

            <!-- UAS Option -->
            <div class="card card-uas">
                <div class="card-title">🛍️ Project UAS</div>
                <div class="card-desc">
                    Informatics Store: E-Commerce &amp; Admin Panel Pengelolaan Barang.
                </div>
                <div class="card-features">
                    <div>✓ Katalog Produk &amp; Form Pemesanan</div>
                    <div>✓ Dashboard Admin &amp; CRUD Inventaris Barang</div>
                    <div>✓ Kelola Pendaftaran &amp; Pesanan Masuk</div>
                </div>
                <a href="/uas" class="btn btn-uas">👉 BUKA PROJECT UAS</a>
            </div>
        </div>

        <div class="footer">
            &copy; <?php echo date('Y'); ?> Informatics Store — Portal Pemrograman Web
        </div>
    </div>
</body>
</html>



