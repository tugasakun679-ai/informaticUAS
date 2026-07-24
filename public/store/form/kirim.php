<?php
include("connect.php");

// 1. Ambil data dari form
$nama          = trim($_POST['nama'] ?? '');
$tempat        = trim($_POST['tempat_lahir'] ?? $_POST['tempat'] ?? '');
$tgl           = trim($_POST['tanggal_lahir'] ?? $_POST['tgl'] ?? '');
$jk            = trim($_POST['jk'] ?? '-');
$alamat        = trim($_POST['alamat'] ?? '');
$sekolah       = trim($_POST['sekolah'] ?? '-');
$sekolah_nama  = trim($_POST['sekolah_nama'] ?? $_POST['nama_sekolah'] ?? '');
$mtk           = (float)($_POST['mtk'] ?? 0);
$inggris       = (float)($_POST['inggris'] ?? 0);
$indo          = (float)($_POST['indo'] ?? 0);
$jurusan1      = trim($_POST['jurusan1'] ?? $_POST['pil1'] ?? '');
$jurusan2      = trim($_POST['jurusan2'] ?? $_POST['pil2'] ?? '');
$alasan        = trim($_POST['alasan'] ?? '');

if (empty($nama)) {
    header("Location: data.php");
    exit;
}

$new_id = time();

// 2. Escape data khusus untuk query MySQL (jika terhubung)
if ($conn && $conn instanceof mysqli) {
    $nama_db         = mysqli_real_escape_string($conn, $nama);
    $tempat_db       = mysqli_real_escape_string($conn, $tempat);
    $tgl_db          = mysqli_real_escape_string($conn, $tgl);
    $jk_db           = mysqli_real_escape_string($conn, $jk);
    $alamat_db       = mysqli_real_escape_string($conn, $alamat);
    $sekolah_db      = mysqli_real_escape_string($conn, $sekolah);
    $sekolah_nama_db = mysqli_real_escape_string($conn, $sekolah_nama);
    $jurusan1_db     = mysqli_real_escape_string($conn, $jurusan1);
    $jurusan2_db     = mysqli_real_escape_string($conn, $jurusan2);
    $alasan_db       = mysqli_real_escape_string($conn, $alasan);

    $query = "INSERT INTO pendaftarans
    (
        nama, tempat_lahir, tanggal_lahir, jk, alamat,
        sekolah_asal, nama_sekolah, matematika, inggris, indonesia,
        pilihan1, pilihan2, alasan, created_at, updated_at
    )
    VALUES
    (
        '$nama_db', '$tempat_db', '$tgl_db', '$jk_db', '$alamat_db',
        '$sekolah_db', '$sekolah_nama_db', $mtk, $inggris, $indo,
        '$jurusan1_db', '$jurusan2_db', '$alasan_db', NOW(), NOW()
    )";

    if (@mysqli_query($conn, $query)) {
        $inserted_id = mysqli_insert_id($conn);
        if ($inserted_id) {
            $new_id = $inserted_id;
        }
    }
}

// 3. Backup ke JSON
$json_file = __DIR__ . '/pendaftarans_backup.json';
$data = [];

if (file_exists($json_file)) {
    $file_content = @file_get_contents($json_file);
    $decoded_data = json_decode($file_content, true);
    if (is_array($decoded_data)) {
        $data = $decoded_data;
    }
}

// Masukkan data variabel ASLI ke file JSON
array_unshift($data, [
    "id"            => $new_id,
    "nama"          => $nama,
    "tempat_lahir"  => $tempat,
    "tanggal_lahir" => $tgl,
    "jk"            => $jk,
    "alamat"        => $alamat,
    "sekolah_asal"  => $sekolah,
    "nama_sekolah"  => $sekolah_nama,
    "matematika"    => $mtk,
    "inggris"       => $inggris,
    "indonesia"     => $indo,
    "pilihan1"      => $jurusan1,
    "pilihan2"      => $jurusan2,
    "alasan"        => $alasan
]);

@file_put_contents($json_file, json_encode($data, JSON_PRETTY_PRINT), LOCK_EX);

// 4. Redirect otomatis ke halaman data pendaftaran
header("Location: data.php?msg=success");
exit;
?>