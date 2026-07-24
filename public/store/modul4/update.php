<?php
include "connect.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$sekolah_asal = $_POST['sekolah_asal'];
$nama_sekolah = $_POST['nama_sekolah'];
$matematika = $_POST['matematika'];
$inggris = $_POST['inggris'];
$indonesia = $_POST['indonesia'];
$pilihan1 = $_POST['pilihan1'];
$pilihan2 = $_POST['pilihan2'];
$alasan = $_POST['alasan'];

mysqli_query($conn,"
UPDATE pendaftaran SET
nama='$nama',
tempat_lahir='$tempat_lahir',
tanggal_lahir='$tanggal_lahir',
jk='$jk',
alamat='$alamat',
sekolah_asal='$sekolah_asal',
nama_sekolah='$nama_sekolah',
matematika='$matematika',
inggris='$inggris',
indonesia='$indonesia',
pilihan1='$pilihan1',
pilihan2='$pilihan2',
alasan='$alasan'

WHERE id='$id'
");

header("Location:data.php");
exit;
?>