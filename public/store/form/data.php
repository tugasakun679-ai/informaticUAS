<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pendaftaran</title>
</head>
<body>

<h2>Data Pendaftaran</h2>

<table border="1" cellpadding="5">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Jenis Kelamin</th>
    <th>Alamat</th>
    <th>Asal Sekolah</th>
    <th>Nama Sekolah</th>
    <th>MATEMATIKA</th>
    <th>B.INGGRIS</th>
    <th>B.INDONESIA</th>
    <th>Pilihan 1</th>
    <th>Pilihan 2</th>
    <th>alasan>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
$data = mysqli_query($koneksi, "SELECT * FROM pendaftarans");

while($d = mysqli_fetch_assoc($data)){
?>

<tr>
    <td><?=$no++; ?></td>
    <td><?=$d['nama']; ?></td>
    <td><?=$d['tempat_lahir']; ?></td>
    <td><?=$d['tanggal_lahir']; ?></td>
    <td><?=$d['jk']; ?></td>
    <td><?=$d['alamat']; ?></td>
    <td><?=$d['sekolah_asal']; ?></td>
    <td><?=$d['nama_sekolah']; ?></td>
    <td><?=$d['matematika']; ?></td>
    <td><?=$d['inggris']; ?></td>
    <td><?=$d['indonesia']; ?></td>
    <td><?=$d['pilihan1']; ?></td>
    <td><?=$d['pilihan2']; ?></td>
    <td><?=$d['alasan']; ?></td>
    <td>
        <a href="edit.php?id=<?php echo $d['id']; ?>"
            onclick="return confirm('Yakin ingin mengubah data ini?')">
            Edit
        </a>
        
        <a href="hapus.php?id=<?php echo $d['id']; ?>"
           onclick="return confirm('Yakin ingin menghapus data ini?')">
           Hapus
        </a>
    </td>

</tr>


<?php } ?>

</table>

</body>
</html>