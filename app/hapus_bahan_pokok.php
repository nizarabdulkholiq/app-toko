<?php
include 'koneksi.php';
$id_sembako = $_GET['id_sembako'];
mysqli_query($koneksi, "DELETE FROM bahan_pokok WHERE id_sembako='$id_sembako'");
header("location:bahan_pokok.php");

?>