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
      <h3>Admin</h3>
   
    
      <?php } ?>
      <hr>
      <h3 style="color: green">Tanggal : <?php echo $tgl ?></h3>
    </div>
    <div class="isi">
      
    <form method="POST" enctype="multipart/form-data">
    <h2 style="text-align: center;">Isi Comment dan Survey</h2><hr>
        ID 
      <input type="number" name="id" placeholder="Masukkan ID " required>
        Nama
      <input type="text" name="nama" placeholder="Masukkan Nama " required>
        Comment
      <textarea name="comment"></textarea>
        Gambar
      <input type="file" name="gambar" accept="image/*">
      <input type="submit" value="Tambah" name="submit">
      <a href="survey.php"><- Kembali</a>
    </div>
  <?php } ?>
    <div class="footer" style="color: white;">&copyCopyright 2022</div>

    <?php
    include 'koneksi.php';
    if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $comment = $_POST['comment'];
    $nama_gambar = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './produk/';

    move_uploaded_file($source, $folder.$nama_gambar);
    
    $save = mysqli_query($koneksi,"INSERT INTO survey(id,nama,comment,gambar) VALUES('$id','$nama','$comment','$nama_gambar')");

    if ($save) {
      echo "<script>alert('Berhasil Menambahkan Comment!'); document.location.href = 'survey.php';</script>";
    }
    else {
      echo "Data Gagal Disimpan!!";
    }
    }
    ?>
</body>
</html>