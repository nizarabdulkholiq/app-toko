<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHECKOUT SUCCES | TOKO SEMBAKO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'koneksi.php'; session_start(); ?>
  <?php 
  if(!isset($_SESSION['username'])){
    echo "<script>alert('Anda Belum Login!');
    document.location.href = 'index.php';</script>";
  }
  else{
  ?>
  <a href="halaman_pelanggan.php"><img style="padding-left: 28%; height: 350px; width: 610px;" src="images/sembako.jpg"></a>
  <div class="navigasi">
      <a href="halaman_pelanggan.php">Home</a>
      <a href="keranjang.php">Keranjang</a>
    </div>
    <div class="profile">
    <center>
      <img src="images/account.png">
      <?php
      $tgl = date("d-m-Y");
      $username = $_SESSION['username'];
      $sql = mysqli_query($koneksi,"select * from customer where username='$username'");
      while($data = mysqli_fetch_array($sql)){
      ?>
      <h2><?php echo $data['nama']; ?></h2>
      <h3>Customer</h3>
      
    <?php } ?>
      <hr>
      <h3 style="color: green">Tanggal : <?php echo $tgl; ?></h3>
    </div>
    <div class="isi">
    <?php 
    $no=1;
    $data = mysqli_query($koneksi,"SELECT * FROM laporan ORDER BY id DESC LIMIT 1") ;
    while ($d = mysqli_fetch_array($data)) {
    ?>
<div class="card" style="max-width: 540px;">
  <img src="" class="card-img-top" alt="">
  

  <div class="card mb-3" style="max-width: 540px;" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="images/bayar.jpeg" class="img-fluid rounded-start" style="max-width: 540px;" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <h5 class="card-title">Bayar Disini</h5>
        <p class="card-text">Setelah Bayar Silakan Klik Button di bawah</p>
        <button onclick="myFunction()">Sudah Bayar</button>

<script>
function myFunction() {
    alert("Driver Sedang menuju ke Tempat mu!");
    alert("Pesanan Akan sampai 30 Menit Lagi!");
    alert("Terima Kasih Telah Berbelanja");
    alert("Silakan Klik (OKE) untuk mengakhiri sesi bayar dan dilanjutkan pengisian survey dan kepuasan");
    window.open("http://localhost/sembako/survey.php");

}
</script>
    </div>
  </div>
</div>

</div>

  <?php } ?>
    </div>
    <div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
    
</body>
</html>