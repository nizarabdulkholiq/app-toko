<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN TAMBAH DATA SEMBAKO | TOKO SEMBAKO</title>
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
  <a href="halaman_pelanggan.php"><img style="padding-left: 28%; height: 350px; width: 610px;" src="images/sembako.jpg"></a> 
  <div class="navigasi">
      <a href="halaman_admin.php">Home</a>
      <a href="transaksi.php"></a>
      <a href="bahan_pokok.php"></a>
      <a href="pengguna.php"></a>
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
      <a href="edit_pengguna.php?username=<?php echo $data['username']; ?>" class="btn-edit">Edit</a>
      <a href="logout.php" class="btn-logout">Logout</a>
      <?php } ?>
      <hr>
      <h3 style="color: green">Tanggal : <?php echo $tgl ?></h3>
    </div>
    <div class="isi">
      
    <form method="POST" enctype="multipart/form-data">
    <h2 style="text-align: center;">TAMBAH DATA SEMBAKO</h2><hr>

      ID Sembako
      <input type="number" name="id_sembako" placeholder="Masukkan ID Sembako" required>
      Nama Sembako
      <input type="text" name="nama_sembako" placeholder="Masukkan Nama Sembako" required>
      Harga
      <input type="number" name="harga" placeholder="Masukkan Harga" required>
      Deskripsi
      <textarea name="deskripsi"></textarea>
      Gambar
      <input type="file" name="gambar" accept="image/*">
      <input type="submit" value="Tambah" name="submit">
      <a href="bahan_pokok.php"><- Kembali</a>
    </div>
  <?php } ?>
    <div class="footer" style="color: white;">&copyCopyright 2022</div>

    <?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
    $id_sembako = $_POST['id_sembako'];
    $nama_sembako = $_POST['nama_sembako'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $nama_gambar = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './produk/';

    move_uploaded_file($source, $folder.$nama_gambar);
    
    $save = mysqli_query($koneksi,"INSERT INTO bahan_pokok(id_sembako,nama_sembako,harga,deskripsi,gambar) VALUES('$id_sembako','$nama_sembako','$harga','$deskripsi','$nama_gambar')");

    if ($save) {
      echo "<script>alert('Berhasil Menambahkan!'); document.location.href = 'bahan_pokok.php';</script>";
    }
    else {
      echo "Data Gagal Disimpan!!";
    }
    }
    ?>
</body>
</html>