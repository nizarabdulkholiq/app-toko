<?php 
include 'koneksi.php';
$id_sembako = $_GET['id_sembako'];
mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_sembako='$id_sembako'");
header('location:keranjang.php');
?>