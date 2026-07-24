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

?>

<div class="hasil">

<table>

<tr>
    <td width="250"><b>Nama</b></td>
    <td width="10">:</td>
    <td><?php echo $nama; ?></td>
</tr>

<tr>
    <td><b>Tempat Lahir</b></td>
    <td>:</td>
    <td><?php echo $tempat; ?></td>
</tr>

<tr>
    <td><b>Tanggal Lahir</b></td>
    <td>:</td>
    <td>
        <?php
        echo $tgl."/".$bulan."/".$tahun;
        ?>
    </td>
</tr>

<tr>
    <td><b>Jenis Kelamin</b></td>
    <td>:</td>
    <td><?php echo $jk; ?></td>
</tr>

<tr>
    <td><b>Alamat</b></td>
    <td>:</td>
    <td><?php echo $alamat; ?></td>
</tr>

<tr>
    <td><b>Sekolah Asal</b></td>
    <td>:</td>
    <td><?php echo $sekolah; ?></td>
</tr>

<tr>
    <td valign="top"><b>Nilai UAN :</b></td>

    <td colspan="2">

        <table style="margin-left:-120px;">

            <tr>
                <td width="170">Matematika</td>
                <td width="10">:</td>
                <td><?php echo $mtk; ?></td>
            </tr>

            <tr>
                <td>Bahasa Inggris</td>
                <td>:</td>
                <td><?php echo $inggris; ?></td>
            </tr>

            <tr>
                <td>Bahasa Indonesia</td>
                <td>:</td>
                <td><?php echo $indo; ?></td>
            </tr>

        </table>

    </td>
</tr>

<tr>
    <td valign="top"><b>Jurusan Yang Dipilih :</b></td>

    <td colspan="2">

        <table style="margin-left:-120px;">

            <tr>
                <td width="170">• Pilihan 1</td>
                <td width="10">:</td>
                <td><?php echo $pil1; ?></td>
            </tr>

            <tr>
                <td>• Pilihan 2</td>
                <td>:</td>
                <td><?php echo $pil2; ?></td>
            </tr>

        </table>

    </td>
</tr>

<tr>
    <td valign="top"><b>Alasan Masuk UNIROW</b></td>
    <td>:</td>
    <td><?php echo $alasan; ?></td>
</tr>

</table>

<hr>

<h2>
TANGGAL DAFTAR :
<?php echo date("d F Y"); ?>
</h2>

</div>

<?php
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

</body>
</html>