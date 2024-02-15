<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN DATA TRANSAKSI | TOKO SEMBAKO</title>
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
      <a href="transaksi.php">Transaksi</a>
      <a href="bahan_pokok.php">Sembako</a>
      <a href="pengguna.php">Data Pelanggan</a>
    </div>
    <div class="profile">
    <center>
      <img src="images/account.png">
      <?php
      $username = $_SESSION['username'];
      $tgl = date("d-m-Y");
      $sql = mysqli_query($koneksi,"select * from admin where username='$username'");
      while($data = mysqli_fetch_array($sql)){
      ?>
      <h2><?php echo $data['nama']; ?></h2>
      <h3>Admin</h3>
      <a href="edit_pengguna.php?username=<?php echo $data['username']; ?>" class="btn-edit">Edit</a>
      <a href="logout.php" class="btn-logout">Logout</a>
    <?php } ?>
      <hr>
      <h3 style="color: green">Tanggal : <?php echo $tgl; ?></h3>
    </div>
    <div class="isi">
    <?php
    $id = $_GET['id_beli'];
    $data = mysqli_query($koneksi,"SELECT * FROM laporan WHERE id_beli = '$id'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
    <table class="succes" border="0">
    <tr>
      <td style="text-align: left;">
      <h4 style="color: grey;">Id Pembelian</h4>
      <h2><?php echo $d['id_beli'] ?></h2>
      <h4 style="color: grey;">Tanggal Pembelian</h4>
      <h2><?php echo $d['tgl_beli'] ?></h2>
      <h4 style="color: grey;">Nama Pembeli</h4>
      <h2><?php echo $d['nama'] ?></h2>
    </td>
    <td style="text-align: left;">
      <h4 style="color: grey;">Alamat Pembeli</h4>
      <h2><?php echo $d['alamat'] ?></h2>
      <h4 style="color: grey;">Total Bayar</h4>
      <h2><?php echo $d['total_pesanan'] ?></h2>
    </td>
    </tr>
    </table>
    <?php } ?>
      <center>
      <table class="record">
        <tr>
          <th>No</th>
          <th>Nama Sembako</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
        </tr>
        <?php 
        $no=1;
        $id = $_GET['id_beli'];
        $data = mysqli_query($koneksi,"SELECT * FROM pesanan RIGHT JOIN bahan_pokok ON pesanan.id_sembako = bahan_pokok.id_sembako WHERE id_beli = '$id'") ;
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $d['nama_sembako']; ?></td>
          <td><?php echo $d['harga']; ?></td>
          <td><?php echo $d['jumlah']; ?></td>
          <td><?php echo $d['subtotal'] ?></td>
        </tr>
      <?php } ?>
      </table>
      </center> 
      <br>
    </div>
    <div class="footer" style="color: white;">&copyCopyright 2022</div>
  <?php } ?>
    
</body>
</html>