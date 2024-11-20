<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        include("index.php");
    }
    else {
    ?>
<!DOCTYPE html>
<html>
<title>Edit Data Warga</title>

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
                    Penilaian&nbsp;/
                    <a href="view-data-warga.php">Lihat Data Warga</a>&nbsp;/&nbsp;Edit</a>
                </p>
            </div>

            <div class="card">
                <h3 style="margin-bottom:25px; font-size: 15px; text-align: center;">
                    FORM EDIT WARGA
                </h3>
                <?php
include 'koneksi.php';


// menyimpan data kedalam variabel
$id = $_GET['id'];
$query = "SELECT * FROM tbl_warga, tbl_matrik WHERE tbl_matrik.nik=tbl_warga.nik and tbl_matrik.nik='$id' ";
$sql = mysqli_query($conn, $query);
if ($sql) {
$row = mysqli_fetch_array($sql);
$nama = $row['nama'];
}
?>
                <table border="0" style="width: 100%;" cellpadding="7">
                    <form action="" method="post" class="card2">


                    



                    <tr class="box">
                            <td style="width: 350px;">
                                <label class="input-warga box-tengah" class="input-warga box-tengah" for="kecamatan">
                                    <p class="frominp">Kecamatan</p><span>:</span>
                                </label>
                            </td>
                            <td>
                                <input style="padding-left: 5px;" class="box-form-tengah" id="nik"
                                    value="<?= $row['kecamatan']?>" type="text" name="kecamatan" placeholder="kecamatan" readonly/>
                            </td>
                        </tr>
                       

                        <tr class="box">
                            <td style="width: 350px;">
                                <label class="input-warga box-tengah" class="input-warga box-tengah" for="kelurahan">
                                    <p class="frominp">Kelurahan</p><span>:</span>
                                </label>
                            </td>
                            <td>
                                <input style="padding-left: 5px;" class="box-form-tengah" id="nik"
                                    value="<?= $row['kelurahan']?>" type="text" name="kelurahan" placeholder="kelurahan" readonly/>
                            </td>
                        </tr>
                       



                    
                    <tr class="box">
                            <td style="width: 350px;">
                                <label class="input-warga box-tengah" class="input-warga box-tengah" for="nik">
                                    <p class="frominp">Nik</p><span>:</span>
                                </label>
                            </td>
                            <td>
                                <input style="padding-left: 5px;" class="box-form-tengah" id="nik"
                                    value="<?= $row['nik']?>" type="text" name="nik" placeholder="Nik" readonly/>
                            </td>
                        </tr>
                        <tr class="box">
                            <td style="width: 350px;">
                                <label class="input-warga box-tengah" class="input-warga box-tengah" for="nama">
                                    <p class="frominp">Nama</p><span>:</span>
                                </label>
                            </td>
                            <td>
                                <input style="padding-left: 5px;" class="box-form-tengah" id="nama"
                                    value="<?= $row['nama']?>" type="text" name="nama" placeholder="nama" required/>
                            </td>
                        </tr>

                        <tr class="box">
                            <td style="width: 350px;">
                                <label class="input-warga box-tengah" class="input-warga box-tengah" for="tahun">
                                    <p class="frominp">Tahun warga terkena Demam berdarah</p><span>:</span>
                                </label>
                            </td>
                            <td>
                                <input style="padding-left: 5px;" class="box-form-tengah" id="tahun"
                                    value="<?= $row['tahun']?>" type="text" name="tahun" placeholder="tahun" required />
                            </td>
                        </tr>



                        <!-- <br /> -->
                        <tr class="box">
                            <td style="width: 350px;"><label class="input-warga box-tengah" for="nama">
                                    <p class="frominp">Jumlah Anggota Keluarga Dalam Satu Rumah</p><span>:</span>
                                </label></td>
                            <td>
                                <select class="box-form-tengah" name="kriteria1_jumlahkeluarga" required>

                                
                                    <option value="">Pilih</option>

                                    
                                    <?php
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM `nilai_kriteria` WHERE id_kriteria='C1'");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                                    <option value="<?=$data['nilai'];?>"><?php echo $data['subkriteria'];?></option>
                                    <?php
                }
                ?>
                                </select>
                            </td>
                        </tr>

                        <!-- <br> -->
                        <tr class="box">
                            <td style="width: 350px;"><label class="input-warga box-tengah" for="nama">
                                    <p class="frominp">Pendidikan Kepala Keluarga</p><span>:</span>
                                </label>
                            </td>
                            <td><select class="box-form-tengah" name="kriteria2_pendidikan_kepalakeluarga" required>
                                    <option value="">Pilih</option>
                                    <?php
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM `nilai_kriteria` WHERE id_kriteria='C2'");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                                    <option value="<?=$data['nilai'];?>"><?php echo $data['subkriteria'];?></option>
                                    <?php
                }
                ?>
                                </select>
                            </td>
                        </tr>

                        <!-- <br> -->
                        <tr class="box">
                            <td style="width: 350px;"><label class="input-warga box-tengah" for="nama">
                                    <p class="frominp">Jumlah Anggota Keluarga Masih Sekolah</p><span>:</span>
                                </label>
                            </td>
                            <td><select class="box-form-tengah" name="kriteria3_jmlh_sklh" required>
                                    <option value="">Pilih</option>
                                    <?php
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM `nilai_kriteria` WHERE id_kriteria='C3'");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                                    <option value="<?=$data['nilai'];?>"><?php echo $data['subkriteria'];?></option>
                                    <?php
                }
                ?>
                                </select>
                            </td>
                        </tr>

                        <tr class="box">
                            <td style="width: 350px;"><label class="input-warga box-tengah" for="nama">
                                    <p class="frominp">Pengeluaran Satu Jiwa Dalam Keluarga Perbulan</p><span>:</span>
                                </label>
                            </td>
                            <td><select class="box-form-tengah" name="kriteria4_pengeluaran" required>
                                    <option value="">Pilih</option>
                                    <?php
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM `nilai_kriteria` WHERE id_kriteria='C4'");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                                    <option value="<?=$data['nilai'];?>"><?php echo $data['subkriteria'];?></option>
                                    <?php
                }
                ?>
                                </select>
                            </td>
                        </tr>


                        <!-- <br> -->
                        <tr class="box">
                            <td style="width: 350px;">
                                <label class="input-warga box-tengah" for="nama">
                                    <p class="frominp">Penghasilan Satu Jiwa Dalam Keluarga Perbulan</p><span>:</span>
                                </label>
                            </td>
                            <td>
                                <select class="box-form-tengah" name="kriteria5_penghasilan" required>
                                    < <option value="">Pilih</option>
                                        <?php
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM `nilai_kriteria` WHERE id_kriteria='C5'");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                                        <option value="<?=$data['nilai'];?>"><?php echo $data['subkriteria'];?></option>
                                        <?php
                }
                ?>
                                </select>
                            </td>
                        </tr>

                        <!-- <br> -->
                        <tr class="box">
                            <td style="width: 350px;">
                                <label class="input-warga box-tengah" for="nama">
                                    <p class="frominp">Status Kepemilikan Rumah</p><span>:</span>
                                </label>
                            </td>
                            <td>
                                <select class="box-form-tengah" name="kriteria6_rumah" required>
                                    <option value="">Pilih</option>
                                    <?php
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM `nilai_kriteria` WHERE id_kriteria='C6'");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                                    <option value="<?=$data['nilai'];?>"><?php echo $data['subkriteria'];?></option>
                                    <?php
                }
                ?>
                                </select>
                            </td>
                        </tr>

                        <!-- <br> -->
                        <tr class="box">
                            <td style="width: 350px;">
                                <label class="input-warga box-tengah" for="nama">
                                    <p class="frominp">Sumber Air Bersih</p><span>:</span>
                                </label>
                            </td>
                            <td>
                                <select class="box-form-tengah" name="kriteria7_sumberair" required>
                                    <option value="">Pilih</option>
                                    <?php
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM `nilai_kriteria` WHERE id_kriteria='C7'");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                                    <option value="<?=$data['nilai'];?>"><?php echo $data['subkriteria'];?></option>
                                    <?php
                }
                ?>
                                </select>
                            </td>
                        </tr>

                        <tr class="box">
                            <td style="width: 350px;">
                                <label class="input-warga box-tengah" for="nama">
                                    <p class="frominp">Transportasi</p><span>:</span>
                                </label>
                            </td>
                            <td>
                                <select class="box-form-tengah" name="kriteria8_Transportasi" required>
                                    <option value="">Pilih</option>
                                    <?php
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($conn, "SELECT * FROM `nilai_kriteria` WHERE id_kriteria='C8'");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                                    <option value="<?=$data['nilai'];?>"><?php echo $data['subkriteria'];?></option>
                                    <?php
                }
                ?>
                                </select>
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
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $kelurahan = $_POST['kelurahan'];
    $kecamatan = $_POST['kecamatan'];
    $tahun = $_POST['tahun'];
    $kriteria1_jumlahkeluarga = $_POST['kriteria1_jumlahkeluarga'];
    $kriteria2_pendidikan_kepalakeluarga = $_POST['kriteria2_pendidikan_kepalakeluarga'];
    $kriteria3_jmlh_sklh = $_POST['kriteria3_jmlh_sklh'];
    $kriteria4_pengeluaran = $_POST['kriteria4_pengeluaran'];
    $kriteria5_penghasilan = $_POST['kriteria5_penghasilan'];
    $kriteria6_rumah = $_POST['kriteria6_rumah'];
    $kriteria7_sumberair = $_POST['kriteria7_sumberair'];
    $kriteria8_Transportasi = $_POST['kriteria8_Transportasi'];

    $update = mysqli_query($conn,"UPDATE tbl_matrik SET kriteria1_jml_anggota_keluarga='$kriteria1_jumlahkeluarga', kriteria2_pendidikan_kepala_keluarga='$kriteria2_pendidikan_kepalakeluarga'
    ,kriteria3_jml_anggotakeluarga_sekolah='$kriteria3_jmlh_sklh', kriteria4_pengeluaran_satu_jiwa = '  $kriteria4_pengeluaran', kriteria5_penghasilan_satu_jiwa= '$kriteria5_penghasilan',
    kriteria6_status_rumah = ' $kriteria6_rumah', kriteria7_sumber_airbersih= ' $kriteria7_sumberair', kriteria8_transportasi=' $kriteria8_Transportasi' WHERE nik='$nik'");

		$update1 = mysqli_query($conn,"UPDATE tbl_warga SET nama='$nama', kecamatan ='$kecamatan', kelurahan = '$kelurahan', tahun = '$tahun'  WHERE nik='$nik'") ;
		


      if ($update || $update1) {
        echo "<script>
              swal('Sukses!', 'Data Berhasil Diubah', 'success').then(function() {
                  window.location.href = 'view-data-warga.php'; //redirect ke halaman dashboard
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