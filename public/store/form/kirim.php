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
<html>
<head>
    <title>Hasil Pendaftaran</title>
</head>
<body>
    <h2>Hasil Pendaftaran</h2>
    <p>Nama : <?php echo $nama; ?></p>
    <p>Tempat Lahir : <?php echo $tempat; ?></p>
    <p>Tanggal Lahir : <?php echo $tgl; ?></p>
    <p>Jenis Kelamin : <?php echo $jk; ?></p>
    <p>Alamat : <?php echo $alamat; ?></p>
    <p>Sekolah Asal : <?php echo $sekolah; ?></p>
    <p>Sekolah Nama : <?php echo $sekolah_nama; ?></p>
    <p>Nilai UAN :</p>
    <ul>
        <li>Matematika : <?php echo $mtk; ?></li>
        <li>Bahasa Inggris : <?php echo $inggris; ?></li>
        <li>Bahasa Indonesia : <?php echo $indo; ?></li>
    </ul>
    <p>Jurusan yang dipilih :</p>
    <ul>
        <li>Pilihan 1 : <?php echo $jurusan1; ?></li>
        <li>Pilihan 2 : <?php echo $jurusan2; ?></li>
    </ul>
    <p>Alasan Masuk UNiROW : <?php echo $alasan; ?></p>
    <p>TANGGAL DAFTAR : <?php echo $tanggal_daftar; ?></p>
</body>
</html>