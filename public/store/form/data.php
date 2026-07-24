<?php
// Menggunakan file koneksi yang sama dengan simpan.php/proses.php
include("connect.php");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        ✓ Data pendaftaran baru berhasil ditambahkan dan tersimpan!
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

            // 1. Ambil dari Database MySQL (Mendukung variabel $conn atau $koneksi)
            $db_connection = $conn ?? $koneksi ?? null;

            if ($db_connection && $db_connection instanceof mysqli) {
                $query = "SELECT * FROM pendaftarans ORDER BY id DESC";
                $data = @mysqli_query($db_connection, $query);
                if ($data && $data instanceof mysqli_result && mysqli_num_rows($data) > 0) {
                    while($d = mysqli_fetch_assoc($data)){
                        $rows[] = $d;
                    }
                }
            }

            // 2. Ambil dari file JSON Backup jika belum ada di database
            $json_file = __DIR__ . '/pendaftarans_backup.json';
            if (file_exists($json_file)) {
                $json_content = file_get_contents($json_file);
                $json_data = json_decode($json_content, true) ?: [];
                
                foreach ($json_data as $j_item) {
                    $exists = false;
                    foreach ($rows as $r) {
                        // Cek apakah data sudah ada berdasarkan nama
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

            // 3. Tampilkan seluruh data
            if (count($rows) > 0) {
                foreach($rows as $d){
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><strong><?= htmlspecialchars($d['nama'] ?? '-'); ?></strong></td>
                    <td><?= htmlspecialchars($d['tempat_lahir'] ?? $d['tempat'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($d['tanggal_lahir'] ?? $d['tgl'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($d['jk'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($d['alamat'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($d['sekolah_asal'] ?? $d['sekolah'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($d['nama_sekolah'] ?? $d['sekolah_nama'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($d['matematika'] ?? $d['mtk'] ?? '0'); ?></td>
                    <td><?= htmlspecialchars($d['inggris'] ?? '0'); ?></td>
                    <td><?= htmlspecialchars($d['indonesia'] ?? $d['indo'] ?? '0'); ?></td>
                    <td><?= htmlspecialchars($d['pilihan1'] ?? $d['jurusan1'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($d['pilihan2'] ?? $d['jurusan2'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($d['alasan'] ?? '-'); ?></td>
                    <td style="white-space:nowrap;">
                        <a href="edit.php?id=<?= $d['id'] ?? 1; ?>" class="btn-action btn-edit" onclick="return confirm('Yakin ingin mengubah data ini?')">Edit</a>
                        <a href="hapus.php?id=<?= $d['id'] ?? 1; ?>" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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

<script>
// === PENANGANAN DATA DARI LOCALSTORAGE BROWSER ===
function getDataPendaftaran() {
    try {
        let d1 = JSON.parse(localStorage.getItem('dataPendaftaran')) || [];
        let d2 = JSON.parse(localStorage.getItem('uts_pendaftarans')) || [];
        let combined = [...d1, ...d2];
        let unique = [];
        let names = new Set();
        combined.forEach(item => {
            if (item && item.nama) {
                let key = item.nama.trim().toLowerCase();
                if (!names.has(key)) {
                    names.add(key);
                    unique.push(item);
                }
            }
        });
        return unique;
    } catch (e) {
        return [];
    }
}

document.addEventListener('DOMContentLoaded', function() {
    let localData = getDataPendaftaran();
    if (localData.length > 0) {
        const tbody = document.querySelector('table tbody');
        if (tbody) {
            const emptyRow = tbody.querySelector('td[colspan="15"]');
            if (emptyRow) {
                emptyRow.closest('tr').remove();
            }

            localData.forEach(function(item) {
                const existingNames = Array.from(tbody.querySelectorAll('tr td:nth-child(2)')).map(td => td.textContent.trim().toLowerCase());
                if (item.nama && !existingNames.includes(item.nama.trim().toLowerCase())) {
                    const tempat = item.tempatLahir || item.tempat_lahir || item.tempat || '-';
                    const tgl = item.tanggalLahir || item.tanggal_lahir || item.tgl || '-';
                    const tr = document.createElement('tr');
                    tr.style.backgroundColor = '#f0fdf4';
                    tr.innerHTML = `
                        <td>${tbody.children.length + 1}</td>
                        <td><strong>${escapeHtml(item.nama)}</strong> <span style="font-size:10px; background:#16a34a; color:#fff; padding:2px 6px; border-radius:4px; margin-left:4px;">Baru</span></td>
                        <td>${escapeHtml(tempat)}</td>
                        <td>${escapeHtml(tgl)}</td>
                        <td>${escapeHtml(item.jk || '-')}</td>
                        <td>${escapeHtml(item.alamat || '-')}</td>
                        <td>${escapeHtml(item.sekolah_asal || item.sekolah || '-')}</td>
                        <td>${escapeHtml(item.nama_sekolah || item.sekolah_nama || '-')}</td>
                        <td>${escapeHtml(item.matematika || item.mtk || '0')}</td>
                        <td>${escapeHtml(item.inggris || '0')}</td>
                        <td>${escapeHtml(item.indonesia || item.indo || '0')}</td>
                        <td>${escapeHtml(item.pilihan1 || item.jurusan1 || '-')}</td>
                        <td>${escapeHtml(item.pilihan2 || item.jurusan2 || '-')}</td>
                        <td>${escapeHtml(item.alasan || '-')}</td>
                        <td style="white-space:nowrap;">
                            <span class="btn-action btn-edit" style="cursor:pointer;" onclick="alert('Data tersimpan di browser')">Edit</span>
                            <span class="btn-action btn-delete" style="cursor:pointer;" onclick="hapusLocalRow(this, '${escapeHtml(item.nama)}')">Hapus</span>
                        </td>
                    `;
                    tbody.insertBefore(tr, tbody.firstChild);
                }
            });
        }
    }
});

function escapeHtml(text) {
    if (!text) return '-';
    return String(text).replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;");
}

function hapusLocalRow(btn, nama) {
    if (confirm('Yakin ingin menghapus data ini?')) {
        let d1 = JSON.parse(localStorage.getItem('dataPendaftaran') || '[]').filter(i => (i.nama || '').trim().toLowerCase() !== nama.trim().toLowerCase());
        let d2 = JSON.parse(localStorage.getItem('uts_pendaftarans') || '[]').filter(i => (i.nama || '').trim().toLowerCase() !== nama.trim().toLowerCase());
        localStorage.setItem('dataPendaftaran', JSON.stringify(d1));
        localStorage.setItem('uts_pendaftarans', JSON.stringify(d2));
        btn.closest('tr').remove();
    }
}
</script>
</body>
</html>