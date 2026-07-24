<!DOCTYPE html>
<html>
<head>
	
	<title>Form Pendaftaran</title>
</head>
<body>
	<h2>Form Pendaftaran</h2>
	<Form method="post" action="kirim.php">
		Nama : <input type="text" name="nama"><br><br>
		Tempat Lahir : <input type="text" name="tempat_lahir"><br><br>
		Tanggal lahir : <input type="date" name="tanggal_lahir"> <br><br>
		Jenis Kelamin :
        <input type="radio" name="jk" value="Laki-laki"> Laki-laki
        <input type="radio" name="jk" value="Perempuan"> Perempuan
        <br><br>
        Alamat : <input type="text" name="alamat"><br><br>
        Sekolah Asal :
        <input type="radio" name="sekolah" value="SMA"> SMA
        <input type="radio" name="sekolah" value="MA"> MA
        <input type="radio" name="sekolah" value="SMK"> SMK
        <br><br>
        Nama Sekolah : <input type="text" name="sekolah_nama"><br><br>
        Nilai UAN :
        Matematika: <input type="text" name="mtk"><br><br>
        Bahasa Inggris: <input type="text" name="inggris"><br><br>
        Bahasa Indonesia: <input type="text" name="indo"><br><br>
        Jurusan yang dipilih :
        Pilihan 1: <select name="jurusan1">
            <option>TEKNIK INFORMATIKA</option>
            <option>SISTEM INFORMASI</option>
        </select> <br><br>
        Pilihan 2: <select name="jurusan2">
            <option>TEKNIK INFORMATIKA</option>
            <option>SISTEM INFORMASI</option>
        </select>
        <br><br>
        Alasan Masuk UNiROW: <textarea name="alasan"></textarea><br><br>
        <input type="checkbox" name="setuju"> Saya menyatakan data benar<br><br>
        <input type="submit" value="Daftar">

    </form>
  </body>
</html>