<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN DETAIL SEMBAKO | TOKO SEMBAKO</title>
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
      $tgl = date('d-m-Y');
      $username = $_SESSION['username'];
      $sql = mysqli_query($koneksi,"select * from customer where username='$username'");
      while($data = mysqli_fetch_array($sql)){
      ?>
      <h2><?php echo $data['nama']; ?></h2>
      <h3>Customer</h3>
      <a href="logout.php" class="btn-logout">Logout</a>
      <?php } ?>
  		<hr>
      <h3 style="color: green;">Tanggal : <?php echo $tgl; ?></h3>
  	</div>
  	<div class="isia">
  		<div class="header">
        <form method="POST">
          <?php
          $id_sembako = $_GET['id_sembako'];
          $data = mysqli_query($koneksi,"SELECT * FROM bahan_pokok WHERE id_sembako='$id_sembako'") ;
          while ($d = mysqli_fetch_array($data)) {
          ?>
        <table border="0" class="succes">
        <tr>
        <td><img src="produk/<?php echo $d['gambar']; ?>" style='width:320px; height:250px; padding:6px; float: left; margin: 5px;'></td>
        <td style="width: 100%;">
        <p style="float: left; margin-left: 100px; margin-top: 0px;"><b>Nama Sembako : </b><?php echo $d['nama_sembako'] ?></p>
        <p style="float: left; margin-left: 100px; margin-top: 0px; "><b>Harga : </b> <?php echo $d['harga'] ?></p>
        <p style="float: left; margin-left: 100px; margin-top: 0px;"><b>Beli : </b><input type="number" name="jumlah" value="1" style="width: 80px; "> <input type="submit" name="submit" value="Add To Cart" style="float: none;"></p>
        <input type="hidden" name="id_sembako" value="<?php echo $d['id_sembako']; ?>">
        <input type="hidden" name="nama_sembako" value="<?php echo $d['nama_sembako']; ?>">
        <input type="hidden" name="harga" value="<?php echo $d['harga']; ?>">
        </td>
        </tr>
        </table>
        <p><b>Deskripsi</b></p>
        <p><?php echo $d['deskripsi']; ?></p>
        </form>
        <?php } ?>
  <?php } ?>
  		</div>
  	</div>
  	<div class="footer" style="color: white;">&copyCopyright 2022</div>
<?php
if (isset($_POST['submit'])) {
  $id = $_POST['id_sembako'];
  $nama = $_POST['nama_sembako'];
  $harga = $_POST['harga'];
  $p=$_POST['jumlah'];
  $sql = mysqli_query($koneksi,"SELECT id_sembako FROM keranjang WHERE id_sembako='$id'");
  $h = mysqli_num_rows($sql);
  if($h == 0){
  $query = mysqli_query($koneksi,"INSERT INTO keranjang(id_sembako,nama_sembako,harga,jumlah,subtotal) VALUES ('$id','$nama','$harga','$p',$p*$harga)");
    if ($query) {
      echo "<script>alert('Berhasil Menambahkan')</script>";
      header('location:halaman_pelanggan.php');
    }
    else{
      echo "Error2";
    }
  }
  else{
    $update = mysqli_query($koneksi,"UPDATE keranjang SET jumlah=$p+jumlah,subtotal=$harga*jumlah WHERE id_sembako = '$id'");
    if ($update) {
      echo "<script>alert('Berhasil Menambahkan');
      document.location.href='halaman_pelanggan.php';</script>";
    }
    else{
      echo "Error1";
    }
  }
}
?>
</body>
</html>