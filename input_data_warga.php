<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        include("index.php");
    }
    else {
    ?>

<!DOCTYPE html>
<html>
<title>Tambah Data Warga</title>

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
                <li><a onclick="logout()">Logout</a></li>
            </ul>
        </nav>
        <!-- -------------->

        <article>
            <div class="card">
                <p style="font-size:18px; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">
                    Penilaian&nbsp;/
                    <a href="view-data-warga.php">Lihat Data Warga</a>&nbsp;/&nbsp;Input Data Warga
                </p>
            </div>
            <?php
            include("koneksi.php");
            ?>

            <div class="card ">
                <h3 style="margin-bottom:25px; font-size: 15px; text-align: center; ">
                    INPUT DATA WARGA
                </h3>
                <?php
                error_reporting(0);
    ?>

<table border="0" style="width: 100%;" cellpadding="7">
                    <form action="" class="card2">

                        <tr class="box">
                            <td style="width: 350px;">
                                <label class="input-warga box-tengah " for="select_box">
                                    <p class="frominp">Kecamatan</p> <span>:</span>
                                </label>
                            </td>
                            <td>
                                <select class="box-form-tengah" required id="select_box" name="kecamatan"
                                    onchange="this.form.submit();">
                                    <option value="317406"
                                        <?php if($_GET['kecamatan'] == '317406') echo 'selected'; ?>>
                                        Cilandak
                                    </option>
                                    <option value="317409"
                                        <?php if($_GET['kecamatan'] == '317409') echo 'selected'; ?>>
                                        Jagakarsa</option>
                                    <option value="317407"
                                        <?php if($_GET['kecamatan'] == '317407') echo 'selected'; ?>>
                                        Kebayoran Baru</option>
                                    <option value="317405"
                                        <?php if($_GET['kecamatan'] == '317405') echo 'selected'; ?>>
                                        Kebayoran Lama</option>
                                    <option value="317403"
                                        <?php if($_GET['kecamatan'] == '317403') echo 'selected'; ?>>
                                        Kecamatan
                                        Mampang Pramatan</option>
                                    <option value="317408"
                                        <?php if($_GET['kecamatan'] == '317408') echo 'selected'; ?>>
                                        Kecamatan
                                        Pancoran
                                    </option>
                                    <option value="317404"
                                        <?php if($_GET['kecamatan'] == '317404') echo 'selected'; ?>>
                                        Kecamatan
                                        Pasar
                                        Minggu</option>
                                    <option value="317410"
                                        <?php if($_GET['kecamatan'] == '317410') echo 'selected'; ?>>
                                        Kecamatan
                                        Pesanggrahan</option>
                                    <option value="317402"
                                        <?php if($_GET['kecamatan'] == '317402') echo 'selected'; ?>>
                                        Kecamatan
                                        Setia
                                        Budi</option>
                                    <option value="317401"
                                        <?php if($_GET['kecamatan'] == '317401') echo 'selected'; ?>>Kecamatan
                                        Tebet
                                    </option>
                                </select>
                            </td>
                        </tr>

                    </form>

                    <?php           if($kecamatan==''){
                 $kecamatan     = $_GET['kecamatan'];
                
                 if($kecamatan =='317406'){
                    $namakecamatan = "Cilandak";
                 }else if($kecamatan =='317409'){
                    $namakecamatan = "Jagakarsa";
                 }else if($kecamatan =='317401'){
                    $namakecamatan = "Tebet";
                 }else if($kecamatan =='317402'){
                    $namakecamatan = "Setia Budi";
                 }else if($kecamatan =='317403'){
                    $namakecamatan = "Mampang Prapatan";
                 }else if($kecamatan =='317404'){
                    $namakecamatan = "Pasar Minggu";
                 }else if($kecamatan =='317405'){
                    $namakecamatan = "Kebayoran Lama";
                 }else if($kecamatan =='317407'){
                    $namakecamatan = "Kebayoran Baru";
                 }else if($kecamatan =='317408'){
                    $namakecamatan = "Pancoran";
                 }else if($kecamatan =='317410'){
                    $namakecamatan = "Pesanggrahan";
                 }
        }else{
            $kecamatan = '317406';
            $namakecamatan = "Cilandak";
        }?>



                    <!-- <br> -->
                    <form action="" method="post" class="card2">
                        <?php                
                       $kecamatan1 = $kecamatan;       
                    ?>

                        <tr class="box">
                            <td style="width: 350px;"><label class="input-warga box-tengah" for="form_select">
                                    <p class="frominp">Kelurahan</p><span>:</span>
                                </label></td>
                            <td><select class="box-form-tengah" id="form_select" name="kelurahan" required>
                                    <option value="">--pilih--</option>

                                    <?php
           
                $query = "SELECT * FROM `kelurahan` WHERE kdkecamatan= '$kecamatan1' ";
                

            
        
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($result)) {
				echo '<option value="'.$row['kelurahan'].'">'.$row['kelurahan']. ' </option>';
			}
			// Eksekusi query
			$result = mysqli_query($conn, $query);
			?>
                                </select>
                            </td>
                        </tr>









                    <tr class="box">
                            <td style="width: 350px;"><label class="input-warga box-tengah" for="nik">
                                    <p class="frominp">Nik</p><span>:</span>
                                </label></td>
                            <td>
                                <input style="padding-left: 5px;" class="box-form-tengah" id="nik" type="text"
                                    name="nik" placeholder="NIK" required
                                    oninvalid="this.setCustomValidity('Isi Nik !')"
                                    oninput="this.setCustomValidity('')" />
                            </td>
                        </tr>


                        <!-- <br> -->

                        <tr class="box">
                            <td style="width: 350px;"><label class="input-warga box-tengah" for="nama">
                                    <p class="frominp">Nama</p><span>:</span>
                                </label></td>
                            <td>
                                <input style="padding-left: 5px;" class="box-form-tengah" id="nama" type="text"
                                    name="nama" placeholder="Nama" required
                                    oninvalid="this.setCustomValidity('Isi Nama !')"
                                    oninput="this.setCustomValidity('')" />
                            </td>
                        </tr>

                        <tr class="box">
                            <td style="width: 350px;"><label class="input-warga box-tengah" for="tahun">
                                    <p class="frominp">Tahun Warga Terkena Demam Berdarah</p><span>:</span>
                                </label></td>
                            <td>
                                <input style="padding-left: 5px;" class="box-form-tengah" id="tahun" type="text"
                                    name="tahun" placeholder="tahun" required
                                    oninvalid="this.setCustomValidity('Isi tahun !')"
                                    oninput="this.setCustomValidity('')" />
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
                                <input class="submit btn2" type="submit" name="input" value="Simpan" />
                            </td>
                        </tr>

                        

                    </form>

                </table>
            </div>
            <?php   
        if (isset($_POST['input'])) {
            $kelurahan = $_POST['kelurahan'];
            $nik = $_POST['nik'];
            $tahun = $_POST['tahun'];
            $nama = $_POST['nama'];
            $kriteria1_jumlahkeluarga = $_POST['kriteria1_jumlahkeluarga'];
            $kriteria2_pendidikan_kepalakeluarga = $_POST['kriteria2_pendidikan_kepalakeluarga'];
            $kriteria3_jmlh_sklh = $_POST['kriteria3_jmlh_sklh'];
            $kriteria4_pengeluaran = $_POST['kriteria4_pengeluaran'];
            $kriteria5_penghasilan = $_POST['kriteria5_penghasilan'];
            $kriteria6_rumah = $_POST['kriteria6_rumah'];
            $kriteria7_sumberair = $_POST['kriteria7_sumberair'];
            $kriteria8_Transportasi = $_POST['kriteria8_Transportasi'];

            

            $query = "INSERT INTO `tbl_warga` VALUES ('$nik', '$nama','$namakecamatan', '$kelurahan', '$tahun')";
            $exequerry = mysqli_query($conn, $query);

            $query1 = "INSERT INTO tbl_matrik values ('', '$nik', '$kriteria1_jumlahkeluarga', ' $kriteria2_pendidikan_kepalakeluarga', ' $kriteria3_jmlh_sklh' , '$kriteria4_pengeluaran'
            , ' $kriteria5_penghasilan', ' $kriteria6_rumah', '$kriteria7_sumberair', '$kriteria8_Transportasi','0')";
            $exequerry1 = mysqli_query($conn, $query1);

            

            
            if ($query ) {
                echo "<script>
                swal('Sukses!', 'Data Berhasil Ditambah', 'success').then(function() {
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

        </article>
    </section>
    <footer>
        <p>Copyright &copy;2023</p>
    </footer>

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


</body>
<?php
}?>