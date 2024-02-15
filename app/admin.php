<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toko Sembako</title>
  <style type="text/css">
    body,
    html {
      background: linear-gradient(to right, #ff0004, #ffcfcf);
      font-family: arial;
    }

    .wrapperlogin {
      display: block;
      width: 480px;
      border-radius: 13px;
      height: 500px;
      margin: auto;
      background-color: white;
      margin-top: 50px;
    }

    .kontenlogin input[type=text],
    [type=password],
    [type=number] {
      border-radius: 13px;
      width: 360px;
      text-align: center;
      padding: 12px 20px;
      margin: 8px 35px;
      margin-bottom: 20px;
      border-style: box;
    }

    .kontenlogin input[type=submit] {
      background-color: #ff0004;
      color: white;
      width: 400px;
      border-color: #ffcfff;
      display: block;
      border-radius: 12px;
      padding: 12px 20px;
      margin: auto;
      margin-top: 10px;
      margin-bottom: 30px;
    }
  </style>
</head>

<body>
  <?php
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan']) {
      echo "<script>alert('Username dan password tidak sesuai!')</script>";
    }
  }
  ?>
  <div class="wrapperlogin">
    <div class="kontenlogin"><br><br><br>
      <h2 align="center" style="font-family: arial;">Silahkan Login Admin</h2><br>

      <hr><br><br>
      <form name="login" method="post" action="cek_login.php">
        <center>
          <input type="text" name="username" placeholder="Username" require autofocus autocomplete="off"><br>
          <input type="password" name="password" placeholder="Password" required><br>
          <input type="submit" name="submit" value="LOGIN">
        </center>
      </form>
      <a href="index.php" style="color: #6A6C6C; padding-left: 15px; text-decoration: none; font-size: 12px;">
        <- Kembali</a>
    </div>
  </div>
</body>

</html>