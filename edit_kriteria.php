<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        include("index.php");
    }
    else {
    ?>
<!DOCTYPE html>
<html>
<title>Edit Kriteria</title>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="asset/style/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <header>
        <table>
            <tr>
                <td><img src="asset/image/logo_kota_adminis_jaksel.png" alt="Logo Kota Administrasi Jakarta Selatan"
                        class="featured-image"></td>
                <td>
                <h2>SISTEM PENDUKUNG KEPUTUSAN<br>PENERIMA BANTUAN DEMAM BERDARAH</h2>
                </td>
            </tr>
        </table>
    </header>

    <section>

        <!-- -------------->
        <nav>
            <ul>
            <li><a href="dashboard.php">Dashboard</a></li>

                <li style="margin-right:10px;">
                    <button class="dropdown-btn">Kriteria
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="lihat_kriteria.php">Lihat Kriteria</a>
                        <a href="lihat_sub_kriteria.php">Lihat Sub-Kriteria</a>
                    </div>
                </li>

                <li style="margin-right:10px;">
                    <button class="dropdown-btn">Penilaian
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="view-data-warga.php">Lihat Data Warga</a>
                        <a href="normalisasi.php">Normalisasi</a>
                        <a href="evaluasi.php">Nilai Evaluasi</a>
                        
                    </div>
                </li>
                <li> <a href="perangkingan.php">Laporan</a></li>
                <li><a onclick="logout()">Logout</a>
                </li>
            </ul>
        </nav>
        <!-- -------------->

        <article>
            <div class="card">
                <p style="font-size:18px; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">
                    Kriteria&nbsp;/
                    <a href="lihat_kriteria.php">Lihat Kriteria</a>&nbsp;/&nbsp;Edit</a>
                </p>
            </div>

            <div class="card">
                <h3 style="margin-bottom:25px; font-size: 15px; text-align: center;">
                    FORM EDIT BOBOT KRITERIA
                </h3>
                <?php
include 'koneksi.php';
// menyimpan data kedalam variabel

$id_kriteria = $_GET['id'];


$query = "SELECT * FROM `kriteria` where id_kriteria = '$id_kriteria'";
$sql = mysqli_query($conn, $query);
if ($sql) {
$row = mysqli_fetch_array($sql);
$namakriteria = $row['namakriteria'];
$bobot = $row['bobot'];
}

?>
                <table border="0" style="width: 100%;" cellpadding="7">
                    <form action="" method="post" class="card2">

                        <tr class="box">
                            <td style="width: 350px;">
                                <label class="input-warga box-tengah" for="namakriteria">
                                    <p class="frominp">Nama Kriteria</p><span>:</span>
                                </label>
                            </td>
                            <td>
                                <input class="box-form-tengah" id="namakriteria" type="text" name="namakriteria"
                                    value="<?= $row['namakriteria'] ?>" readonly />
                            </td>
                        </tr>

                        <tr class="box">
                            <td style="width: 350px;">
                                <label class="input-warga box-tengah" for="bobot">
                                    <p class="frominp">Bobot</p><span>:</span>
                                </label>
                            </td>
                            <td>
                                <input class="box-form-tengah" id="bobot" type="number" name="bobot"
                                    value="<?= $row['bobot'] ?>" />
                            </td>
                        </tr>



                        <tr class="box">
                            <td colspan="2">
                                <input class="submit btn2" type="submit" name="edit" value="Edit" />
                                <input type="hidden" name="update" value="<?= $id ?>">
                            </td>
                        </tr>

                    </form>
                </table>

                <?php 

   if(isset($_POST['update'])) {
    $namakriteria = $_POST['namakriteria'];
    $bobot = $_POST['bobot'];


		$update1 = mysqli_query($conn,"UPDATE kriteria SET namakriteria='$namakriteria', bobot=$bobot WHERE id_kriteria='$id_kriteria'") ;
		


      if ($update1) {
        echo "<script>
              swal('Sukses!', 'Data Berhasil Diubah', 'success').then(function() {
                  window.location.href = 'lihat_kriteria.php'; //redirect ke halaman dashboard
              });
          </script>";

    } else {
        echo "<script>
    swal('Gagal!', 'Data Gagal DIubah', 'error');
  </script>";
    }

   }
 
      ?>

            </div>
        </article>
    </section>
    <footer>
        <p>Copyright &copy;2023</p>
    </footer>

</body>

<script src="chartjs/dropdown.js"></script>

<script>
function logout() {
    Swal.fire({
        title: 'Logout',
        text: 'Apakah Anda Yakin Ingin logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, logout!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'logout.php';
        }
    })
}
</script>
<?php
    }?>