<?php
include 'koneksi.php';
session_start();
session_destroy();
header("location:index.php");
mysqli_query($koneksi, "DELETE FROM keranjang");
?> 