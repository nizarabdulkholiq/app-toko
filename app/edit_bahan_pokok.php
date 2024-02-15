<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN EDIT SEMBAKO | TOKO SEMBAKO</title>
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
      <form method="POST">
          <h2>Edit Daftar Sembako</h2>

          <?php
          include 'koneksi.php';
          $id_sembako = $_GET['id_sembako'];
          $data = mysqli_query($koneksi, "select * from bahan_pokok where id_sembako='$id_sembako'");
          while ($d = mysqli_fetch_array($data)) {
          ?>

            ID Masakan 
            <input type="number" name="id_sembako" placeholder="Masukan ID Sembako" value="<?php echo $d['id_sembako']; ?>" required>
            Nama Sembako
            <input type="text" name="nama_sembako" placeholder="Masukan Nama Sembako" value="<?php echo $d['nama_sembako']; ?>" required>
            Harga 
            <input type="number" name="harga" placeholder="Masukan Harga" value="<?php echo $d['harga']; ?>" required>
            Deskripsi
            <textarea name="deskripsi"><?php echo $d['deskripsi']; ?></textarea>
            <input type="submit" value="Edit" name="submit"> 
            <a href="bahan_pokok.php"><- Kembali</a>
            <?php } ?>
      </form>
  	</div>
  	<div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
            
    <?php
    include 'koneksi.php';
    if (isset($_POST['submit'])) {
        $id_sembako = $_POST['id_sembako'];
        $nama_sembako = $_POST['nama_sembako'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];

        $save = mysqli_query($koneksi, "update bahan_pokok set id_sembako='$id_sembako',nama_sembako='$nama_sembako',harga='$harga',deskripsi='$deskripsi' where id_sembako='$id_sembako'");

        if ($save) {
            echo "<script>alert('Berhasil Menambahkan!'); document.location.href = 'bahan_pokok.php';</script>";
        } else {
            echo "Data Gagal Disimpan!";
        }
    }
    ?>
</body>
</html>