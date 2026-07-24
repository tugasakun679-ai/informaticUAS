<?php
include "koneksi.php";


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

        .notif{
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            margin-bottom: 15px;
            text-align: center;
            font-weight: bold;
        }

        h2{
            text-align: center;
        }

        .btn-kembali{
            display: inline-block;
            padding: 8px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>

<div class="container">

<?php

if (isset($_POST['daftar']))
{
    if (
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
        echo "<h2 style='color:red;'>Semua data wajib diisi!</h2>";
        echo "<center><a href='output.php' class='btn-kembali'>Kembali ke Form</a></center>";
    }
    else
    {
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
        $nama_sekolah = isset($_POST['nama_sekolah']) ? $_POST['nama_sekolah'] : '-';
        $bulan_indonesia = [
            'Januari' => '01', 'Februari' => '02', 'Maret' => '03',
            'April' => '04', 'Mei' => '05', 'Juni' => '06',
            'Juli' => '07', 'Agustus' => '08', 'September' => '09',
            'Oktober' => '10', 'November' => '11', 'Desember' => '12'
        ];
        $bulan_num = isset($bulan_indonesia[$bulan]) ? $bulan_indonesia[$bulan] : '01';
        $tgl_num = str_pad($tgl, 2, '0', STR_PAD_LEFT);
        $tanggal_lahir = $tahun . "-" . $bulan_num . "-" . $tgl_num;

$query = "INSERT INTO pendaftarans
(
nama,
tempat_lahir,
tanggal_lahir,
jk,
alamat,
sekolah_asal,
nama_sekolah,
matematika,
inggris,
indonesia,
pilihan1,
pilihan2,
alasan,
created_at,
updated_at
)
$simpan = @mysqli_query($koneksi,$query);

        // Also save to JSON backup
        $json_file = __DIR__ . '/form/pendaftarans_backup.json';
        $existing = [];
        if(file_exists($json_file)){
            $existing = json_decode(file_get_contents($json_file), true) ?: [];
        }
        $new_item = [
            "id" => count($existing) + 1,
            "nama" => $nama,
            "tempat_lahir" => $tempat,
            "tanggal_lahir" => $tanggal_lahir,
            "jk" => $jk,
            "alamat" => $alamat,
            "sekolah_asal" => $sekolah,
            "nama_sekolah" => $nama_sekolah,
            "matematika" => $mtk,
            "inggris" => $inggris,
            "indonesia" => $indo,
            "pilihan1" => $pil1,
            "pilihan2" => $pil2,
            "alasan" => $alasan
        ];
        array_unshift($existing, $new_item);
        file_put_contents($json_file, json_encode($existing, JSON_PRETTY_PRINT));

        echo "<script>alert('✅ Data Pendaftaran Berhasil Disimpan & Terdaftar di Fitur Data!'); window.location.href='form/data.php?msg=success';</script>";
        exit;
    }
}

        <h2>HASIL FORM PENDAFTARAN</h2>

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
                    <td><?php echo $tgl . "/" . $bulan . "/" . $tahun; ?></td>
                </tr>

                <tr>
                    <td><b>Jenis Kelamin</b></td>
                    <td>:</td>
                    <td><?php echo $jk; ?></td>
                </tr>

                <tr>
                    <td><b>Alamat</b></td>
                    <td>:</td>
                    <td><?php echo nl2br($alamat); ?></td>
                </tr>

                <tr>
                    <td><b>Sekolah Asal</b></td>
                    <td>:</td>
                    <td><?php echo $sekolah; ?></td>
                </tr>

                <tr>
                    <td><b>Nama Sekolah</b></td>
                    <td>:</td>
                    <td><?php echo $nama_sekolah; ?></td>
                </tr>

                <tr>
                    <td valign="top"><b>Nilai UAN</b></td>
                    <td valign="top">:</td>
                    <td>
                        Matematika : <?php echo $mtk; ?><br>
                        Bahasa Inggris : <?php echo $inggris; ?><br>
                        Bahasa Indonesia : <?php echo $indo; ?>
                    </td>
                </tr>

                <tr>
                    <td valign="top"><b>Jurusan Yang Dipilih</b></td>
                    <td valign="top">:</td>
                    <td>
                        Pilihan 1 : <?php echo $pil1; ?><br>
                        Pilihan 2 : <?php echo $pil2; ?>
                    </td>
                </tr>

                <tr>
                    <td valign="top"><b>Alasan Masuk UNIROW</b></td>
                    <td valign="top">:</td>
                    <td><?php echo nl2br($alasan); ?></td>
                </tr>

            </table>

            <hr>

            <h2>
                TANGGAL DAFTAR :
                <?php echo date("d F Y"); ?>
            </h2>

            <center>
                <a href="output.php" class="btn-kembali">Isi Form Lagi</a>
            </center>

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
            for ($i = 1; $i <= 31; $i++)
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
            for ($i = 1990; $i <= 2025; $i++)
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
        <input type="radio" name="jk" value="Laki-laki"> Laki-laki
        <input type="radio" name="jk" value="Perempuan"> Perempuan
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
    <td>Nama Sekolah</td>
    <td>:</td>
    <td>
        <input type="text" name="nama_sekolah" size="40">
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
                <td><input type="text" name="mtk" size="10"></td>
            </tr>
            <tr>
                <td>Bahasa Inggris</td>
                <td>:</td>
                <td><input type="text" name="inggris" size="10"></td>
            </tr>
            <tr>
                <td>Bahasa Indonesia</td>
                <td>:</td>
                <td><input type="text" name="indo" size="10"></td>
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
        <input type="checkbox" required>
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