<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        include("index.php");
    }
    else {
    ?>

<!DOCTYPE html>
<html>
<title>Normalisasi</title>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="asset/style/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="asset/style/jquery.dataTable.css">
    <script type="text/javascript" src="asset/js/jquery.min.js"></script>
    <script type="text/javascript" src="asset/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>

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
                    Penilaian&nbsp;/&nbsp;Normalisasi
                </p>
            </div>


            <div class="card">
                <h3 style="margin-bottom:25px; font-size: 15px; text-align: center;">
                    DATA NILAI NORMALISASI MATRIK
                </h3>
                <?php
//Gunakan Koneksi
	include("koneksi.php");
	// //Buat array bobot { C1 = 40%; C2 = 25%; C3 = 30%;}
	// $bobot = array(0.4, 0.25, 0.35);
    $crMax = mysqli_query($conn,"SELECT max(kriteria1_jml_anggota_keluarga) as maxK1, 
    min(kriteria2_pendidikan_kepala_keluarga) as maxK2,
    max(kriteria3_jml_anggotakeluarga_sekolah) as maxK3,  max(kriteria4_pengeluaran_satu_jiwa) as maxK4,
    min(kriteria5_penghasilan_satu_jiwa) as maxK5, min(kriteria6_status_rumah) as maxK6,min(kriteria7_sumber_airbersih) as maxK7,
    min(kriteria8_transportasi) as maxK8
    FROM tbl_matrik");
	$querry = mysqli_fetch_array($crMax);
//Lakukan Normalisasi dengan rumus pada langkah 2
	//Cari Max atau min dari tiap kolom Matrik
	// $crMax1 = mysqli_query($conn,"SELECT max(nilai) as max1 from nilai_kriteria where id_kriteria='C1'");
	// $maxk1 = mysqli_fetch_array($crMax1);

    // $crMax2 = mysqli_query($conn,"SELECT min(nilai) as min2 from nilai_kriteria where id_kriteria='C2'");
	// $mink2 = mysqli_fetch_array($crMax2);

    // $crMax3 = mysqli_query($conn,"SELECT max(nilai) as max3 from nilai_kriteria where id_kriteria='C3'");
	// $maxk3 = mysqli_fetch_array($crMax3);

    // $crMax4 = mysqli_query($conn,"SELECT max(nilai) as max4 from nilai_kriteria where id_kriteria='C4'");
	// $maxk4 = mysqli_fetch_array($crMax4);

    // $crMax5 = mysqli_query($conn,"SELECT min(nilai) as min5 from nilai_kriteria where id_kriteria='C5'");
	// $mink5 = mysqli_fetch_array($crMax5);

    // $crMax6 = mysqli_query($conn,"SELECT min(nilai) as min6 from nilai_kriteria where id_kriteria='C6'");
	// $mink6 = mysqli_fetch_array($crMax6);

    // $crMax7 = mysqli_query($conn,"SELECT min(nilai) as min7 from nilai_kriteria where id_kriteria='C7'");
	// $mink7 = mysqli_fetch_array($crMax7);

    // $crMax8 = mysqli_query($conn,"SELECT min(nilai) as min8 from nilai_kriteria where id_kriteria='C8'");
	// $mink8 = mysqli_fetch_array($crMax8);

    ?>

                <form id="form" method="post" action="normalisasi.php" style="display: inline; padding-bottom: 10px;">
                    <label for="kecamatan">Pilih Kecamatan :</label>
                    <select name="kecamatan" id="kecamatan">
                        <option value="Cilandak">Cilandak</option>
                        <option value="Jagakarsa">Jagakarsa</option>
                        <option value="Kebayoran Baru">Kebayoran Baru</option>
                        <option value="Kebayoran Lama">Kebayoran Lama</option>
                        <option value="Pancoran">Pancoran</option>
                        <option value="Mampang Prapatan">Mampang Prapatan</option>
                        <option value="Pasar Minggu">Pasar Minggu</option>
                        <option value="Pesanggrahan">Pesanggrahan</option>
                        <option value="Setia Budi">Setia Budi</option>
                        <option value="Tebet">Tebet</option>
                    </select>

                    &nbsp;&nbsp;&nbsp;
                    <label for="tahun">Pilih Tahun :</label>
                    <select name="tahun" id="tahun">

                        <?php
                //query menampilkan nama unit kerja ke dalam combobox
                $query    =mysqli_query($conn, "SELECT DISTINCT tahun FROM tbl_warga;");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                        <option value="<?=$data['tahun'];?>"><?php echo $data['tahun'];?></option>
                        <?php
                }
                ?>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn1" id="tombol" type="submit" name="input">Filter</button>
                </form>

                <?php


    
    // $q = "SELECT * FROM tbl_warga, tbl_matrik where tbl_matrik.nik=tbl_warga.nik";
    // $total = mysqli_query($conn, $q);
  
    
   
    ?>

                <table id='example' class='display' width='100%' class="tabel-layout" border="1" cellpadding="5">
                    <thead>
                        <tr class="k">
                            <th>No</th>
                            <th>ALternatif</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                            <th>C6</th>
                            <th>C7</th>
                            <th>C8</th>

                        </tr>
                    </thead>
                    <?php
                      error_reporting(0);
                      if (isset($_POST['input'])) {
                    $kecamatan = $_POST['kecamatan'];
                    $tahun = $_POST['tahun'];
                      }
                    
                    if ($kecamatan != '' || $tahun !='') {
                        $sql2   = mysqli_query($conn,"SELECT *
                        FROM tbl_warga, tbl_matrik
                        WHERE tbl_matrik.nik = tbl_warga.nik
                        AND kecamatan LIKE '$kecamatan' AND tahun LIKE '$tahun'");
                       
                    } else {
                        $sql2   = mysqli_query($conn,"SELECT * FROM tbl_warga, tbl_matrik where tbl_matrik.nik=tbl_warga.nik");
                    
                    }
        // $sql2 = mysqli_query($conn,"SELECT * FROM tbl_warga, tbl_matrik where tbl_matrik.nik=tbl_warga.nik");
	$no = 1;
	while ($dt2 = mysqli_fetch_array($sql2)) {
        echo "<tr class=k>
        <td align='center'>$no</td>
        <td>".($dt2['nama'])."</td>
        <td align='center'>".round($dt2['kriteria1_jml_anggota_keluarga']/$querry['maxK1'],2)."</td>
        <td align='center'>".round($querry['maxK2']/$dt2['kriteria2_pendidikan_kepala_keluarga'],2)."</td>
        <td align='center'>".round($dt2['kriteria3_jml_anggotakeluarga_sekolah']/$querry['maxK3'],2)."</td>
        <td align='center'>".round($dt2['kriteria4_pengeluaran_satu_jiwa']/$querry['maxK4'],2)."</td>
        <td align='center'>".round($querry['maxK5']/$dt2['kriteria5_penghasilan_satu_jiwa'],2)."</td>
        <td align='center'>".round($querry['maxK6']/$dt2['kriteria6_status_rumah'],2)."</td>
        <td align='center'>".round($querry['maxK7']/$dt2['kriteria7_sumber_airbersih'],2)."</td>
        <td align='center'>".round($querry['maxK8']/$dt2['kriteria8_transportasi'],2)."</td>
    </tr>";
	$no++;
	}
	echo "</table>";
?>
            </div>


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

    window.addEventListener('load', function() {
        var select = document.getElementsByName('kecamatan')[0];
        var selectedValue = localStorage.getItem('selectedValue');
        if (selectedValue) {
            for (var i = 0; i < select.options.length; i++) {
                if (select.options[i].value === selectedValue) {
                    select.options[i].selected = true;
                    break;
                }
            }
        }
        select.addEventListener('change', function() {
            localStorage.setItem('selectedValue', select.value);
        });
    });
    </script>



</body>
<?php
}?>