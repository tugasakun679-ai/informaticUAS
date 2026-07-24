<?php
include("connect.php");

$nama = $_POST['nama'] ?? '';
$tempat = $_POST['tempat_lahir'] ?? '';
$tgl = $_POST['tanggal_lahir'] ?? '';
$jk = $_POST['jk'] ?? '-';
$alamat = $_POST['alamat'] ?? '';
$sekolah = $_POST['sekolah'] ?? '-';
$sekolah_nama  = $_POST['sekolah_nama'] ?? '';
$mtk = $_POST['mtk'] ?? 0;
$inggris = $_POST['inggris'] ?? 0;
$indo = $_POST['indo'] ?? 0;
$jurusan1 = $_POST['jurusan1'] ?? '';
$jurusan2 = $_POST['jurusan2'] ?? '';
$alasan = $_POST['alasan'] ?? '';

if(!empty($nama)){
    $query = "INSERT INTO pendaftarans
    (nama, tempat_lahir, tanggal_lahir, jk, alamat,
     sekolah_asal, nama_sekolah, matematika, inggris,
     indonesia, pilihan1, pilihan2, alasan, created_at, updated_at)
    VALUES
    ('$nama','$tempat','$tgl','$jk','$alamat',
     '$sekolah','$sekolah_nama','$mtk','$inggris',
     '$indo','$jurusan1','$jurusan2','$alasan', NOW(), NOW())";

    @mysqli_query($conn, $query);
}

echo "<script>alert('✅ Data Pendaftaran Berhasil Disimpan & Terdaftar di Fitur Data!'); window.location.href='data.php?msg=success';</script>";
exit;
?>