<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$email = $_POST['email'];
$no = $_POST['no_hp'];

$save = mysqli_query($koneksi, "INSERT INTO admin(username, password, nama, jk, email, no_hp) VALUES('$username','$password','$nama','$jk','$email','$no')");

if ($save) {
    echo "<script>alert('Daftar Berhasil!'); document.location.href = 'index.php';</script>";
} else {
    echo "Data Gagal Disimpan!";
}
?>