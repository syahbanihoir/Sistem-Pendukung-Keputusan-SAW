<?php
error_reporting(0);
    session_start();
    if(isset($_SESSION['login'])) {
        include("dashboard.php");
    }
    else {
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="asset/style/style_login1.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <form class="card1" method="post" ">
        <h2 style=" text-align:center;">Login </h2>
        <br><br>
        <input type="text" id="nama" name="nama" placeholder="Nama User" required oninvalid="
                            this.setCustomValidity('Isi Username!')" oninput="this.setCustomValidity('')"
            autocomplete="off"><br><br>
        <input type="password" id="password" name="password" placeholder="Password" required oninvalid="
                            this.setCustomValidity('Isi Password!')" oninput="this.setCustomValidity('')"><br><br>
        <input type="submit" value="Masuk" name="masuk">
    </form>
    <script src="assets/styles/script.js"></script>
</body>

</html>
<?php

session_start();
include("koneksi.php");
if(isset($_POST['masuk'])){

$nama_pengguna = $_POST['nama'];
$password_pengguna = $_POST['password'];
$_SESSION['user'] = $nama_pengguna;
$sql = "SELECT * FROM user WHERE username='$nama_pengguna' AND katasandi='$password_pengguna'";
$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result) == 1){
  $_SESSION['nama_pengguna'] = $nama_pengguna;
  $_SESSION['login']=1;
   echo "<script>
              swal('Login Sukses!', 'Anda berhasil login', 'success').then(function() {
                  window.location.href = 'dashboard.php'; //redirect ke halaman dashboard
              });
          </script>";
 
}
else{
    echo "<script>
    swal('Gagal', 'Password Atau Username Salah', 'error');
  </script>";
}

}
}
?>