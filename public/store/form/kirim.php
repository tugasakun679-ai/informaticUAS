<?php
include("connect.php");
// Ambil data dari form

$nama = $_POST['nama'];
$tempat = $_POST['tempat_lahir'];
$tgl = $_POST['tanggal_lahir'];
$jk = $_POST['jk'] ?? '-';
$alamat = $_POST['alamat'];
$sekolah = $_POST['sekolah'] ?? '-';
$sekolah_nama  = $_POST['sekolah_nama'];
$mtk = $_POST['mtk'];
$inggris = $_POST['inggris'];
$indo = $_POST['indo'];
$jurusan1 = $_POST['jurusan1'];
$jurusan2 = $_POST['jurusan2'];
$alasan = $_POST['alasan'];
$tanggal_daftar = date("d F Y"); // tanggal sekarang


$query = "INSERT INTO pendaftarans
(nama, tempat_lahir, tanggal_lahir, jk, alamat,
 sekolah_asal, nama_sekolah, matematika, inggris,
 indonesia, pilihan1, pilihan2, alasan, created_at, updated_at)

VALUES
('$nama','$tempat','$tgl','$jk','$alamat',
 '$sekolah','$sekolah_nama','$mtk','$inggris',
 '$indo','$jurusan1','$jurusan2','$alasan', NOW(), NOW())";

$simpan = mysqli_query($conn, $query);

if(!$simpan){
    die("Gagal menyimpan data: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pendaftaran</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            color: #334155;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }
        h2 {
            color: #166534;
            margin-top: 0;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 12px;
        }
        p {
            margin: 8px 0;
            font-size: 14px;
        }
        ul {
            margin: 6px 0 12px 20px;
            font-size: 14px;
        }
        .btn-group {
            margin-top: 24px;
            display: flex;
            gap: 12px;
        }
        .btn {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
        }
        .btn-primary { background: #0284c7; color: white; }
        .btn-secondary { background: #e2e8f0; color: #334155; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pendaftaran Berhasil Disimpan!</h2>
        <p><strong>Nama :</strong> <?php echo htmlspecialchars($nama); ?></p>
        <p><strong>Tempat Lahir :</strong> <?php echo htmlspecialchars($tempat); ?></p>
        <p><strong>Tanggal Lahir :</strong> <?php echo htmlspecialchars($tgl); ?></p>
        <p><strong>Jenis Kelamin :</strong> <?php echo htmlspecialchars($jk); ?></p>
        <p><strong>Alamat :</strong> <?php echo htmlspecialchars($alamat); ?></p>
        <p><strong>Sekolah Asal :</strong> <?php echo htmlspecialchars($sekolah); ?></p>
        <p><strong>Nama Sekolah :</strong> <?php echo htmlspecialchars($sekolah_nama); ?></p>
        <p><strong>Nilai UAN :</strong></p>
        <ul>
            <li>Matematika : <?php echo $mtk; ?></li>
            <li>Bahasa Inggris : <?php echo $inggris; ?></li>
            <li>Bahasa Indonesia : <?php echo $indo; ?></li>
        </ul>
        <p><strong>Jurusan Pilihan :</strong></p>
        <ul>
            <li>Pilihan 1 : <?php echo htmlspecialchars($jurusan1); ?></li>
            <li>Pilihan 2 : <?php echo htmlspecialchars($jurusan2); ?></li>
        </ul>
        <p><strong>Alasan :</strong> <?php echo htmlspecialchars($alasan); ?></p>
        <p><strong>Tanggal Daftar :</strong> <?php echo $tanggal_daftar; ?></p>

        <div class="btn-group">
            <a href="data.php" class="btn btn-primary">Lihat Tabel Data Pendaftaran &rarr;</a>
            <a href="form.php" class="btn btn-secondary">+ Tambah Data Lagi</a>
        </div>
    </div>
</body>
</html>