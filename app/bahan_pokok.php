<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN DAFTAR SEMBAKO | TOKO SEMBAKO</title>
    <link rel="stylesheet" href="admin.css">
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
	<a href="halaman_admin.php"><img style="padding-left: 28%; height: 350px; width: 610px;" src="images/sembako.jpg"></a> 
	<div class="navigasi">
  		<a href="halaman_admin.php">Home</a>
  		<a href="transaksi.php">Transaksi</a>
  		<a href="bahan_pokok.php">Sembako</a>
  		<a href="pengguna.php">Data Pelanggan</a>
  	</div>
  	<div class="profile">
  	<center>
  		<img src="images/account.png">
      <?php
      $tgl = date("d-m-Y");
      $username = $_SESSION['username'];
      $sql = mysqli_query($koneksi,"select * from admin where username='$username'");
      while($data = mysqli_fetch_array($sql)){
      ?>
      <h2><?php echo $data['nama']; ?></h2>
      <h3>Admin</h3>
     
      <a href="logout.php" class="btn-logout">Logout</a>
      <?php } ?>
  		<hr>
      <h3 style="color: green">Tanggal : <?php echo $tgl ?></h3>
  	</div>
  	<div class="isi">
      <h2 align="center">Daftar Sembako</h2>
      <h5><a href="tambah_bahan_pokok.php">+Tambah Daftar Sembako</a></h5>
        <?php 
        $no=1;
        $data = mysqli_query($koneksi,'SELECT * FROM bahan_pokok') ;
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <div class="box-produk">
          <center>
          <img src="produk/<?php echo $d['gambar']; ?>" style='width:220px; height:150px; padding:6px;'>
          <p style="color: red;"><?php echo $d['harga']; ?></p>
          <p><?php echo $d['nama_sembako']; ?><br></p>
          <a class="btn-edit" href="edit_bahan_pokok.php?id_sembako=<?php echo $d['id_sembako']; ?>">Edit</a>
          <a class="btn-logout" href="hapus_bahan_pokok.php?id_sembako=<?php echo $d['id_sembako']; ?>">Hapus</a>
          </center>
        </div>
      <?php } ?>
  	</div>
  	<div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
</body>
</html>