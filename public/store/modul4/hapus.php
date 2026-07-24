<?php
include "connect.php";

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM pendaftaran WHERE id='$id'");

header("Location:data.php");
exit;
?>