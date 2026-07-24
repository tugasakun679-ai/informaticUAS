<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftaran - UTS</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            color: #334155;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: #ffffff;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
        }
        h2 {
            margin-top: 0;
            color: #1e293b;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 12px;
        }
        .btn-add {
            display: inline-block;
            background-color: #0284c7;
            color: #ffffff;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 16px;
        }
        .btn-add:hover {
            background-color: #0369a1;
        }
        .table-responsive {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }
        th, td {
            padding: 10px 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 700;
            white-space: nowrap;
        }
        tr:hover {
            background-color: #f8fafc;
        }
        .badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
        }
        .btn-action {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }
        .btn-edit {
            background-color: #e0f2fe;
            color: #0369a1;
        }
        .btn-delete {
            background-color: #fee2e2;
            color: #b91c1c;
        }
        .btn-edit:hover { background-color: #bae6fd; }
        .btn-delete:hover { background-color: #fca5a5; }
    </style>
</head>
<body>

<div class="container">
    <?php if(isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
    <div style="background-color:#dcfce7; border:2px solid #22c55e; color:#15803d; padding:14px; border-radius:8px; margin-bottom:16px; font-weight:bold; text-align:center;">
        ✓ Data pendaftaran baru berhasil ditambahkan dan tersimpan di tabel bawah ini!
    </div>
    <?php endif; ?>

    <h2>Data Pendaftaran Siswa (UTS)</h2>
    
    <a href="form.php" class="btn-add">+ Tambah Pendaftaran Baru</a>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tgl Lahir</th>
                    <th>L/P</th>
                    <th>Alamat</th>
                    <th>Asal</th>
                    <th>Nama Sekolah</th>
                    <th>MTK</th>
                    <th>ING</th>
                    <th>IND</th>
                    <th>Pilihan 1</th>
                    <th>Pilihan 2</th>
                    <th>Alasan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            $rows = [];

            // 1. Fetch from MySQL if connected
            $data = @mysqli_query($koneksi, "SELECT * FROM pendaftarans ORDER BY id DESC");
            if ($data && mysqli_num_rows($data) > 0) {
                while($d = mysqli_fetch_assoc($data)){
                    $rows[] = $d;
                }
            }

            // 2. Read from JSON backup file as fallback/merge
            $json_file = __DIR__ . '/pendaftarans_backup.json';
            if (file_exists($json_file)) {
                $json_data = json_decode(file_get_contents($json_file), true) ?: [];
                foreach ($json_data as $j_item) {
                    $exists = false;
                    foreach ($rows as $r) {
                        if (strtolower(trim($r['nama'] ?? '')) === strtolower(trim($j_item['nama'] ?? ''))) {
                            $exists = true;
                            break;
                        }
                    }
                    if (!$exists) {
                        $rows[] = $j_item;
                    }
                }
            }

            if (count($rows) > 0) {
                foreach($rows as $d){
            ?>
                <tr>
                    <td><?=$no++; ?></td>
                    <td><strong><?=htmlspecialchars($d['nama'] ?? '-'); ?></strong></td>
                    <td><?=htmlspecialchars($d['tempat_lahir'] ?? '-'); ?></td>
                    <td><?=htmlspecialchars($d['tanggal_lahir'] ?? '-'); ?></td>
                    <td><?=htmlspecialchars($d['jk'] ?? '-'); ?></td>
                    <td><?=htmlspecialchars($d['alamat'] ?? '-'); ?></td>
                    <td><?=htmlspecialchars($d['sekolah_asal'] ?? '-'); ?></td>
                    <td><?=htmlspecialchars($d['nama_sekolah'] ?? '-'); ?></td>
                    <td><?=htmlspecialchars($d['matematika'] ?? $d['mtk'] ?? '0'); ?></td>
                    <td><?=htmlspecialchars($d['inggris'] ?? '0'); ?></td>
                    <td><?=htmlspecialchars($d['indonesia'] ?? $d['indo'] ?? '0'); ?></td>
                    <td><?=htmlspecialchars($d['pilihan1'] ?? '-'); ?></td>
                    <td><?=htmlspecialchars($d['pilihan2'] ?? '-'); ?></td>
                    <td><?=htmlspecialchars($d['alasan'] ?? '-'); ?></td>
                    <td style="white-space:nowrap;">
                        <a href="edit.php?id=<?php echo $d['id'] ?? 1; ?>" class="btn-action btn-edit" onclick="return confirm('Yakin ingin mengubah data ini?')">Edit</a>
                        <a href="hapus.php?id=<?php echo $d['id'] ?? 1; ?>" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php 
                } 
            } else {
            ?>
                <tr>
                    <td colspan="15" style="text-align: center; color: #64748b; padding: 24px;">
                        Belum ada data pendaftaran tersimpan. Silakan klik <strong>+ Tambah Pendaftaran Baru</strong> di atas untuk menambah data.
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>