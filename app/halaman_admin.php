<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN ADMIN | TOKO SEMBAKO</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php include 'koneksi.php'; session_start(); ?>

    <?php
    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Anda Belum Login!'); document.location.href = 'index.php';</script>";
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
      <h3 style="color: green;">Tanggal : <?php echo $tgl ?></h3>
  	</div>

  	<div class="isi">
  		<div class="header">
  			<h4>Selamat Datang,Admin</h4>
        <hr>
        <p style="margin-top: 120px;">Tampilkan</p>
        <table style="margin-top: 30px;">
          <tr>
            <td style="background-color: black; border-radius: 40px;"><a style="color: white; " href="transaksi.php">Data Transaksi</a></td>
            <td style="background-color: #ded5e6; border-radius: 40px; "><a style="color: black;" href="bahan_pokok.php">Daftar Sembako</a></td>
            <td style="background-color: #f4f0f0; border-radius: 40px;"><a style="color: black;" href="pengguna.php">Data Pelanggan</a></td>
          </tr>
        </table>
  		</div>
  	</div>

  	<div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
  
</body>
</html>