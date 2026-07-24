<?php
include("connect.php");

$nama = $_POST['nama'] ?? '';
$tempat = $_POST['tempat_lahir'] ?? $_POST['tempat'] ?? '';
$tgl = $_POST['tanggal_lahir'] ?? $_POST['tgl'] ?? '';
$jk = $_POST['jk'] ?? '-';
$alamat = $_POST['alamat'] ?? '';
$sekolah = $_POST['sekolah'] ?? '-';
$sekolah_nama  = $_POST['sekolah_nama'] ?? $_POST['nama_sekolah'] ?? '';
$mtk = $_POST['mtk'] ?? 0;
$inggris = $_POST['inggris'] ?? 0;
$indo = $_POST['indo'] ?? 0;
$jurusan1 = $_POST['jurusan1'] ?? $_POST['pil1'] ?? '';
$jurusan2 = $_POST['jurusan2'] ?? $_POST['pil2'] ?? '';
$alasan = $_POST['alasan'] ?? '';

if(!empty($nama)){
    if (isset($conn) && $conn instanceof mysqli) {
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

    $json_file = __DIR__ . '/pendaftarans_backup.json';
    $existing = [];
    if(file_exists($json_file)){
        $existing = json_decode(file_get_contents($json_file), true) ?: [];
    }
    $new_item = [
        "id" => count($existing) + 1,
        "nama" => $nama,
        "tempat_lahir" => $tempat,
        "tanggal_lahir" => $tgl,
        "jk" => $jk,
        "alamat" => $alamat,
        "sekolah_asal" => $sekolah,
        "nama_sekolah" => $sekolah_nama,
        "matematika" => $mtk,
        "inggris" => $inggris,
        "indonesia" => $indo,
        "pilihan1" => $jurusan1,
        "pilihan2" => $jurusan2,
        "alasan" => $alasan
    ];
    array_unshift($existing, $new_item);
    file_put_contents($json_file, json_encode($existing, JSON_PRETTY_PRINT));
}

header("Location: data.php?msg=success");
exit;
?>