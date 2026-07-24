<?php
include "connect.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM pendaftarans WHERE id='$id'");
$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>

<h2>Edit Data</h2>

<form method="post" action="update.php">

<input type="hidden" name="id" value="<?php echo $d['id']; ?>">

Nama:
<input type="text" name="nama"
value="<?php echo $d['nama']; ?>">
<br><br>

Tempat Lahir:
<input type="text" name="tempat_lahir"
value="<?php echo $d['tempat_lahir']; ?>">
<br><br>

Tanggal Lahir:
<input type="date" name="tanggal_lahir"
value="<?php echo $d['tanggal_lahir']; ?>">
<br><br>

Jenis Kelamin:
<input type="radio" name="jk" value="Laki-laki"
<?php if($d['jk']=="Laki-laki") echo "checked"; ?>>
Laki-laki
<input type="radio" name="jk" value="Perempuan"
<?php if($d['jk']=="Perempuan") echo "checked"; ?>>
Perempuan
<br><br>

Alamat:
<input type="text" name="alamat"
value="<?php echo $d['alamat']; ?>">
<br><br>

Sekolah Asal:
<input type="radio" name="sekolah_asal" value="SMA"
<?php if($d['sekolah_asal']=="SMA") echo "checked"; ?>>
SMA
<input type="radio" name="sekolah_asal" value="MA"
<?php if($d['sekolah_asal']=="MA") echo "checked"; ?>>
MA
<input type="radio" name="sekolah_asal" value="SMK"
<?php if($d['sekolah_asal']=="SMK") echo "checked"; ?>>
SMK
<br><br>

Nama sekolah:
<input type="text" name="nama_sekolah"
value="<?php echo $d['nama_sekolah']; ?>">
<br><br>
Nilai UAN :
<br><br>
Matematika:
<input type="text" name="matematika"
value="<?php echo $d['matematika']; ?>">
<br>
Bahasa Inggris:
<input type="text" name="inggris"
value="<?php echo $d['inggris']; ?>">
<br>
Bahasa Indonesia:
<input type="text" name="indonesia"
value="<?php echo $d['indonesia']; ?>">
<br><br>

Pilihan 1:
<select name="pilihan1">
    <option value="TEKNIK INFORMATIKA"
    <?php if($d['pilihan1']=="TEKNIK INFORMATIKA") echo "selected"; ?>>
    TEKNIK INFORMATIKA
    </option>

    <option value="SISTEM INFORMASI"
    <?php if($d['pilihan1']=="SISTEM INFORMASI") echo "selected"; ?>>
    SISTEM INFORMASI
    </option>
</select>
<br><br>
Pilihan 2:
<select name="pilihan2">
    <option value="TEKNIK INFORMATIKA"
    <?php if($d['pilihan2']=="TEKNIK INFORMATIKA") echo "selected"; ?>>
    TEKNIK INFORMATIKA
    </option>

    <option value="SISTEM INFORMASI"
    <?php if($d['pilihan2']=="SISTEM INFORMASI") echo "selected"; ?>>
    SISTEM INFORMASI
    </option>
</select>
<br><br>

Alasan Masuk UNiROW:
<textarea name="alasan"><?php echo $d['alasan']; ?></textarea>
<br><br>

<input type="submit" value="Update">

</form>

</body>
</html>