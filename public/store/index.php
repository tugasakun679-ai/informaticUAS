<?php
include "koneksi.php";

error_reporting(E_ALL);
ini_set('display_errors',1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulir Pendaftaran Mahasiswa</title>

    <style>

        body{
            font-family: Times New Roman;
            background-color: #f2f2f2;
        }

        .container{
            width: 750px;
            margin: 20px auto;
            background: white;
            border: 1px solid black;
            padding: 20px;
        }

        table{
            width: 100%;
        }

        td{
            padding: 6px;
            vertical-align: top;
        }

        input[type=text],
        textarea,
        select{
            padding: 4px;
        }

        textarea{
            width: 300px;
            height: 90px;
        }

        .hasil{
            border: 1px solid gray;
            padding: 15px;
            margin-top: 20px;
        }

        h2{
            text-align: center;
        }

    </style>

</head>

<body>

<div class="container">

<?php

if(isset($_POST['daftar']))
{

    if(
        empty($_POST['nama']) ||
        empty($_POST['tempat']) ||
        empty($_POST['alamat']) ||
        empty($_POST['sekolah']) ||
        empty($_POST['mtk']) ||
        empty($_POST['inggris']) ||
        empty($_POST['indo']) ||
        empty($_POST['alasan']) ||
        !isset($_POST['jk'])
    )
    {
        echo "<h2 style='color:red; text-align:center;'>
        Koneksi Database Gagal
        </h2>";
    }
    else
    {

        if($koneksi)
        {
            echo "<h2 style='color:green; text-align:center;'>
            Koneksi Database Berhasil
            </h2>";
        }
        else
        {
            echo "<h2 style='color:red; text-align:center;'>
            Koneksi Database Gagal
            </h2>";
        }

        $nama      = $_POST['nama'];
        $tempat    = $_POST['tempat'];
        $tgl       = $_POST['tgl'];
        $bulan     = $_POST['bulan'];
        $tahun     = $_POST['tahun'];
        $jk        = $_POST['jk'];
        $alamat    = $_POST['alamat'];
        $sekolah   = $_POST['sekolah'];
        $mtk       = $_POST['mtk'];
        $inggris   = $_POST['inggris'];
        $indo      = $_POST['indo'];
        $pil1      = $_POST['pil1'];
        $pil2      = $_POST['pil2'];
        $alasan    = $_POST['alasan'];

        $tgl_lahir = $tahun . "-01-01";
        $insert_sql = "INSERT INTO pendaftarans (nama, tempat_lahir, tanggal_lahir, jk, alamat, sekolah_asal, nama_sekolah, matematika, inggris, indonesia, pilihan1, pilihan2, alasan, created_at, updated_at) VALUES ('$nama', '$tempat', '$tgl_lahir', '$jk', '$alamat', '$sekolah', '$sekolah', '$mtk', '$inggris', '$indo', '$pil1', '$pil2', '$alasan', NOW(), NOW())";
        @mysqli_query($koneksi, $insert_sql);

        $json_file = __DIR__ . '/form/pendaftarans_backup.json';
        $existing = [];
        if(file_exists($json_file)){
            $existing = json_decode(file_get_contents($json_file), true) ?: [];
        }
        $new_item = [
            "id" => count($existing) + 1,
            "nama" => $nama,
            "tempat_lahir" => $tempat,
            "tanggal_lahir" => $tgl_lahir,
            "jk" => $jk,
            "alamat" => $alamat,
            "sekolah_asal" => $sekolah,
            "nama_sekolah" => $sekolah,
            "matematika" => $mtk,
            "inggris" => $inggris,
            "indonesia" => $indo,
            "pilihan1" => $pil1,
            "pilihan2" => $pil2,
            "alasan" => $alasan
        ];
        array_unshift($existing, $new_item);
        file_put_contents($json_file, json_encode($existing, JSON_PRETTY_PRINT));

        header("Location: form/data.php?msg=success");
        exit;
    }
}
else
{
?>

<h2>FORMULIR PENDAFTARAN</h2>

<form method="POST">

<table>

<tr>
    <td width="220">Nama</td>
    <td width="10">:</td>
    <td>
        <input type="text" name="nama" size="40">
    </td>
</tr>

<tr>
    <td>Tempat Lahir</td>
    <td>:</td>
    <td>
        <input type="text" name="tempat" size="40">
    </td>
</tr>

<tr>
    <td>Tanggal Lahir</td>
    <td>:</td>

    <td>

        <select name="tgl">

            <?php
            for($i=1; $i<=31; $i++)
            {
                echo "<option>$i</option>";
            }
            ?>

        </select>

        <select name="bulan">

            <option>Januari</option>
            <option>Februari</option>
            <option>Maret</option>
            <option>April</option>
            <option>Mei</option>
            <option>Juni</option>
            <option>Juli</option>
            <option>Agustus</option>
            <option>September</option>
            <option>Oktober</option>
            <option>November</option>
            <option>Desember</option>

        </select>

        <select name="tahun">

            <?php
            for($i=1990; $i<=2025; $i++)
            {
                echo "<option>$i</option>";
            }
            ?>

        </select>

    </td>

</tr>

<tr>
    <td>Jenis Kelamin</td>
    <td>:</td>

    <td>
        <input type="radio" name="jk" value="Laki-laki">
        Laki-laki

        <input type="radio" name="jk" value="Perempuan">
        Perempuan
    </td>
</tr>

<tr>
    <td>Alamat</td>
    <td>:</td>

    <td>
        <textarea name="alamat"></textarea>
    </td>
</tr>

<tr>
    <td>Sekolah Asal</td>
    <td>:</td>

    <td>
        <input type="text" name="sekolah" size="40">
    </td>
</tr>

<tr>

    <td valign="top">Nilai UAN</td>
    <td valign="top">:</td>

    <td>

        <table>

            <tr>
                <td width="150">Matematika</td>
                <td width="10">:</td>
                <td>
                    <input type="text" name="mtk" size="10">
                </td>
            </tr>

            <tr>
                <td>Bahasa Inggris</td>
                <td>:</td>
                <td>
                    <input type="text" name="inggris" size="10">
                </td>
            </tr>

            <tr>
                <td>Bahasa Indonesia</td>
                <td>:</td>
                <td>
                    <input type="text" name="indo" size="10">
                </td>
            </tr>

        </table>

    </td>

</tr>

<tr>
    <td>Jurusan Pilihan 1</td>
    <td>:</td>

    <td>
        <select name="pil1">

            <option>TEKNIK INFORMATIKA</option>
            <option>SISTEM INFORMASI</option>
            <option>TEKNIK INDUSTRI</option>

        </select>
    </td>
</tr>

<tr>
    <td>Jurusan Pilihan 2</td>
    <td>:</td>

    <td>
        <select name="pil2">

            <option>TEKNIK INFORMATIKA</option>
            <option>SISTEM INFORMASI</option>
            <option>TEKNIK INDUSTRI</option>

        </select>
    </td>
</tr>

<tr>
    <td valign="top">Alasan Masuk UNIROW</td>
    <td valign="top">:</td>

    <td>
        <textarea name="alasan"></textarea>
    </td>
</tr>

<tr>
    <td colspan="3">

        <input type="checkbox">

        Dengan ini menyatakan bahwa data yang diberikan sesuai dengan sebenarnya

    </td>
</tr>

<tr>
    <td colspan="3" align="right">

        <input type="submit" name="daftar" value="Daftar">

        <input type="reset" value="Cancel">

    </td>
</tr>

</table>

</form>

<?php
}
?>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            const nama = form.querySelector('[name="nama"]')?.value || '';
            const tempat = form.querySelector('[name="tempat_lahir"]')?.value || form.querySelector('[name="tempat"]')?.value || '';
            const tgl = form.querySelector('[name="tanggal_lahir"]')?.value || form.querySelector('[name="tgl"]')?.value || '';
            const jk = form.querySelector('[name="jk"]:checked')?.value || 'Laki-laki';
            const alamat = form.querySelector('[name="alamat"]')?.value || '';
            const sekolah = form.querySelector('[name="sekolah"]:checked')?.value || form.querySelector('[name="sekolah"]')?.value || 'SMA';
            const nama_sekolah = form.querySelector('[name="sekolah_nama"]')?.value || form.querySelector('[name="nama_sekolah"]')?.value || '-';
            const mtk = form.querySelector('[name="mtk"]')?.value || '0';
            const inggris = form.querySelector('[name="inggris"]')?.value || '0';
            const indo = form.querySelector('[name="indo"]')?.value || '0';
            const pil1 = form.querySelector('[name="jurusan1"]')?.value || form.querySelector('[name="pil1"]')?.value || '-';
            const pil2 = form.querySelector('[name="jurusan2"]')?.value || form.querySelector('[name="pil2"]')?.value || '-';
            const alasan = form.querySelector('[name="alasan"]')?.value || '-';

            if (nama.trim() !== '') {
                const newItem = {
                    id: Date.now(),
                    nama: nama,
                    tempatLahir: tempat,
                    tanggalLahir: tgl,
                    tempat_lahir: tempat,
                    tanggal_lahir: tgl,
                    jk: jk,
                    alamat: alamat,
                    sekolah_asal: sekolah,
                    nama_sekolah: nama_sekolah,
                    matematika: mtk,
                    inggris: inggris,
                    indonesia: indo,
                    pilihan1: pil1,
                    pilihan2: pil2,
                    alasan: alasan
                };

                let dataPendaftaran = JSON.parse(localStorage.getItem('dataPendaftaran') || '[]');
                dataPendaftaran.unshift(newItem);
                localStorage.setItem('dataPendaftaran', JSON.stringify(dataPendaftaran));

                let utsData = JSON.parse(localStorage.getItem('uts_pendaftarans') || '[]');
                utsData.unshift(newItem);
                localStorage.setItem('uts_pendaftarans', JSON.stringify(utsData));
            }
        });
    }
});
</script>
</body>
</html>