<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        include("index.php");
    }
    else {
    ?>

<!DOCTYPE html>
<html>
<title>Lihat Kriteria</title>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="asset/style/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="chartjs/Chart.js"></script>
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
                        <a href="lihat_sub_kriteria.php">Lihat subkriteria</a>
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
                <li><a onclick="logout()">Logout</a></li>
            </ul>
        </nav>


        <article>
            <div class="card">
                <p
                    style="font-size:18px; margin:0; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">
                    Lihat Sub-Kriteria</p>
            </div>

            <div class="card1">

                <div class="kolom" style="margin-right: 18px;">
                    <p
                        style="font-size:14px; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">
                        jumlah anggota keluarga dalam 1 (satu) rumah (C1)</p>
                    <?php
    include_once "koneksi.php";

    $query = "SELECT * FROM nilai_kriteria where id_kriteria='C1'";
    $sql = mysqli_query($conn, $query);
    ?>
                    <table class="tabel-layout tab" border="1" cellpadding="5">
                        <tr class="k">
                            <th>NO</th>
                            <th>Sub Kriteria </th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($sql)) {
            $id_kriteria = $row['idnilai_kriteria'];
            $subkriteria = $row['subkriteria'];
            $nilai = $row['nilai'];
        ?>
                        <tr>
                            <td align="center"><?php echo $no++ ?></td>
                            <td align="center"><?php echo $subkriteria ?></td>
                            <td align="center"><?php echo $nilai ?></td>
                            <td align="center">
                                <a class="btn" href="edit_subkriteria.php?&id=<?=$id_kriteria?>">Edit</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table> <br />
                </div>


                <div class="kolom">
                    <p
                        style="font-size:14px; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">
                        Pendidikan kepala keluarga (C2)</p>

                    <?php
include_once "koneksi.php";

$query = "SELECT * FROM nilai_kriteria where id_kriteria='C2'";
$sql = mysqli_query($conn, $query);
?>
                    <table class="tabel-layout tab" border="1" cellpadding="5">
                        <tr class="k">
                            <th>NO</th>
                            <th>Sub Kriteria </th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
$no = 1;
while ($row = mysqli_fetch_assoc($sql)) {
   $id_kriteria = $row['idnilai_kriteria'];
   $subkriteria = $row['subkriteria'];
   $nilai = $row['nilai'];
?>
                        <tr>
                            <td align="center"><?php echo $no++ ?></td>
                            <td align="center"><?php echo $subkriteria ?></td>
                            <td align="center"><?php echo $nilai ?></td>
                            <td align="center">
                                <a class="btn" href="edit_subkriteria.php?&id=<?=$id_kriteria?>">Edit</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table> <br />
                </div>


                <div class="kolom" style="margin-right: 18px;">

                    <p
                        style="font-size:14px; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">
                        jumlah anggota keluarga masih sekolah (C3)</p>
                    <?php
include_once "koneksi.php";

$query = "SELECT * FROM nilai_kriteria where id_kriteria='C3'";
$sql = mysqli_query($conn, $query);
?>
                    <table class="tabel-layout tab" border="1" cellpadding="5">
                        <tr class="k">
                            <th>NO</th>
                            <th>Sub Kriteria </th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
$no = 1;
while ($row = mysqli_fetch_assoc($sql)) {
   $id_kriteria = $row['idnilai_kriteria'];
   $subkriteria = $row['subkriteria'];
   $nilai = $row['nilai'];
?>
                        <tr>
                            <td align="center"><?php echo $no++ ?></td>
                            <td align="center"><?php echo $subkriteria ?></td>
                            <td align="center"><?php echo $nilai ?></td>
                            <td align="center">
                                <a class="btn" href="edit_subkriteria.php?&id=<?=$id_kriteria?>">Edit</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table> <br />
                </div>


                <div class="kolom">

                    <p
                        style="font-size:14px; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">
                        pengeluaran satu jiwa dalam keluarga (C4)</p>
                    <?php
include_once "koneksi.php";

$query = "SELECT * FROM nilai_kriteria where id_kriteria='C4'";
$sql = mysqli_query($conn, $query);
?>
                    <table class="tabel-layout tab" border="1" cellpadding="5">
                        <tr class="k">
                            <th>NO</th>
                            <th>Sub Kriteria </th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
$no = 1;
while ($row = mysqli_fetch_assoc($sql)) {
   $id_kriteria = $row['idnilai_kriteria'];
   $subkriteria = $row['subkriteria'];
   $nilai = $row['nilai'];
?>
                        <tr>
                            <td align="center"><?php echo $no++ ?></td>
                            <td align="center"><?php echo $subkriteria ?></td>
                            <td align="center"><?php echo $nilai ?></td>
                            <td align="center">
                                <a class="btn" href="edit_subkriteria.php?&id=<?=$id_kriteria?>">Edit</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table> <br />
                </div>


                <div class="kolom" style="margin-right: 18px;">

                    <p
                        style="font-size:14px; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">
                        penghasilan satu jiwa dalam keluarga per bulan (C5)</p>
                    <?php
include_once "koneksi.php";

$query = "SELECT * FROM nilai_kriteria where id_kriteria='C5'";
$sql = mysqli_query($conn, $query);
?>
                    <table class="tabel-layout tab" border="1" cellpadding="5">
                        <tr class="k">
                            <th>NO</th>
                            <th>Sub Kriteria </th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
$no = 1;
while ($row = mysqli_fetch_assoc($sql)) {
   $id_kriteria = $row['idnilai_kriteria'];
   $subkriteria = $row['subkriteria'];
   $nilai = $row['nilai'];
?>
                        <tr>
                            <td align="center"><?php echo $no++ ?></td>
                            <td align="center"><?php echo $subkriteria ?></td>
                            <td align="center"><?php echo $nilai ?></td>
                            <td align="center">
                                <a class="btn" href="edit_subkriteria.php?&id=<?=$id_kriteria?>">Edit</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table> <br />
                </div>


                <div class="kolom">

                    <p
                        style="font-size:14px; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">
                        status kepemilikan rumah (C6)</p>
                    <?php
include_once "koneksi.php";

$query = "SELECT * FROM nilai_kriteria where id_kriteria='C6'";
$sql = mysqli_query($conn, $query);
?>
                    <table class="tabel-layout tab" border="1" cellpadding="5">
                        <tr class="k">
                            <th>NO</th>
                            <th>Sub Kriteria </th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
$no = 1;
while ($row = mysqli_fetch_assoc($sql)) {
   $id_kriteria = $row['idnilai_kriteria'];
   $subkriteria = $row['subkriteria'];
   $nilai = $row['nilai'];
?>
                        <tr>
                            <td align="center"><?php echo $no++ ?></td>
                            <td align="center"><?php echo $subkriteria ?></td>
                            <td align="center"><?php echo $nilai ?></td>
                            <td align="center">
                                <a class="btn" href="edit_subkriteria.php?&id=<?=$id_kriteria?>">Edit</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table> <br />
                </div>

                <div class="kolom" style="margin-right: 18px;">

                    <p
                        style="font-size:14px; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">

                        Sumber air bersih (C7)</p>
                    <?php
include_once "koneksi.php";

$query = "SELECT * FROM nilai_kriteria where id_kriteria='C7'";
$sql = mysqli_query($conn, $query);
?>
                    <table class="tabel-layout tab" border="1" cellpadding="5">
                        <tr class="k">
                            <th>NO</th>
                            <th>Sub Kriteria </th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
$no = 1;
while ($row = mysqli_fetch_assoc($sql)) {
   $id_kriteria = $row['idnilai_kriteria'];
   $subkriteria = $row['subkriteria'];
   $nilai = $row['nilai'];
?>
                        <tr>
                            <td align="center"><?php echo $no++ ?></td>
                            <td align="center"><?php echo $subkriteria ?></td>
                            <td align="center"><?php echo $nilai ?></td>
                            <td align="center">
                                <a class="btn" href="edit_subkriteria.php?&id=<?=$id_kriteria?>">Edit</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table> <br />
                </div>

                <div class="kolom">

                    <p
                        style="font-size:14px; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">
                        transportasi (C8)</p>
                    <?php
include_once "koneksi.php";

$query = "SELECT * FROM nilai_kriteria where id_kriteria='C8'";
$sql = mysqli_query($conn, $query);
?>
                    <table class="tabel-layout tab" border="1" cellpadding="5">
                        <tr class="k">
                            <th>NO</th>
                            <th>Sub Kriteria </th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
$no = 1;
while ($row = mysqli_fetch_assoc($sql)) {
   $id_kriteria = $row['idnilai_kriteria'];
   $subkriteria = $row['subkriteria'];
   $nilai = $row['nilai'];
?>
                        <tr>
                            <td align="center"><?php echo $no++ ?></td>
                            <td align="center"><?php echo $subkriteria ?></td>
                            <td align="center"><?php echo $nilai ?></td>
                            <td align="center">
                                <a class="btn" href="edit_subkriteria.php?&id=<?=$id_kriteria?>">Edit</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table> <br />
                </div>


            </div>
        </article>


</body>
<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}


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

</html>
<?php
}?>