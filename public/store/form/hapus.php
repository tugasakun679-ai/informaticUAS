<?php
include "connect.php";

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM pendaftarans WHERE id='$id'");

header("Location:data.php");
exit;
?>