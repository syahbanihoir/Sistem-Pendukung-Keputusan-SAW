<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        include("index.php");
    }
    else {
    ?>

<!DOCTYPE html>
<html>
<title>Perangkingan</title>
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
                    Laporan
                </p>
            </div>



            <div class="card">
                <h3 style="margin-bottom:25px; font-size: 15px; text-align: center;">
                    LAPORAN
                </h3>
                <?php
	//Gunakan Koneksi
	include("koneksi.php");

    $sql = "SELECT bobot FROM kriteria";
$result = mysqli_query($conn, $sql);

// Membuat array untuk menyimpan data nilai
$bobot = array();
while ($row = mysqli_fetch_assoc($result)) {
    $bobot[] = $row['bobot']/100;
    
}

$crMax = mysqli_query($conn,"SELECT max(kriteria1_jml_anggota_keluarga) as maxK1, 
    min(kriteria2_pendidikan_kepala_keluarga) as maxK2,
    max(kriteria3_jml_anggotakeluarga_sekolah) as maxK3,  max(kriteria4_pengeluaran_satu_jiwa) as maxK4,
    min(kriteria5_penghasilan_satu_jiwa) as maxK5, min(kriteria6_status_rumah) as maxK6,min(kriteria7_sumber_airbersih) as maxK7,
    min(kriteria8_transportasi) as maxK8
    FROM tbl_matrik");
	$q = mysqli_fetch_array($crMax);

    $totalnilai = mysqli_query($conn,"SELECT min(total_nilai) as terkecil, max(total_nilai) as terbesar FROM `tbl_matrik`;");
	$q1 = mysqli_fetch_array($totalnilai);

    $angka = [$q1['terkecil'],$q1['terbesar']];
    sort($angka);


    // Menghitung jumlah angka dalam array
$jumlahAngka = count($angka);

// Mencari angka tengah
if ($jumlahAngka % 2 == 1) {
    // Jumlah angka ganjil
    $indeksTengah = floor($jumlahAngka / 2);
    $angkaTengah = $angka[$indeksTengah];
} else {
    // Jumlah angka genap
    $indeksTengah1 = $jumlahAngka / 2 - 1;
    $indeksTengah2 = $jumlahAngka / 2;
    $angkaTengah = ($angka[$indeksTengah1] + $angka[$indeksTengah2]) / 2;
}

// Menampilkan angka tengah
// echo $angkaTengah;


	//Buat array bobot { C1 = 10%; C2 = 10%; C3 = 20%;}
	// $bobot = array(0.1, 0.1, 0.1, 0.2, 0.2 , 0.1, 0.1, 0.1);

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


<form id="form" method="post" action="perangkingan.php"
                    style="display: inline; padding-bottom: 10px;">
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
                    <button class="btn1" id="tombol" type="submit">Filter</button>
                </form>
                <table id='example' class='display' width='100%' class="tabel-layout" border="1" cellpadding="5">
                    <thead>
                        <tr class="k" align='center'>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Tahun</th>
                            <th>Rangking</th>
                            <th>Status</th>
                        </tr>
                    </thead>


                    <?php
                    error_reporting(0);

$kecamatan = $_POST['kecamatan'];
$tahun = $_POST['tahun'];

if ($kecamatan != '' || $tahun !='') {
    $sql3 = mysqli_query($conn,"SELECT *
    FROM tbl_warga, tbl_matrik
    WHERE tbl_matrik.nik = tbl_warga.nik
    AND kecamatan LIKE '$kecamatan' AND tahun LIKE '$tahun'
    ORDER BY tbl_matrik.total_nilai DESC;");
   
} else {
    $sql3 = mysqli_query($conn,"SELECT *
    FROM tbl_warga, tbl_matrik
    WHERE tbl_matrik.nik = tbl_warga.nik
    ORDER BY tbl_matrik.total_nilai DESC");
}



if($sql3){
    
    // $nilai = array();
    $no = 0;
while ($dt3 = mysqli_fetch_array($sql3)) {
 
    $no++;
    $rangking = round((($dt3['kriteria1_jml_anggota_keluarga']/$q['maxK1'])*$bobot[0])+
    (($q['maxK2']/$dt3['kriteria2_pendidikan_kepala_keluarga'])*$bobot[1])+
    (($dt3['kriteria3_jml_anggotakeluarga_sekolah']/$q['maxK3'])*$bobot[2])+
    (($dt3['kriteria4_pengeluaran_satu_jiwa']/$q['maxK4'])*$bobot[3])+
    (($q['maxK5']/$dt3['kriteria5_penghasilan_satu_jiwa'])*$bobot[4])+
    (($q['maxK6']/$dt3['kriteria6_status_rumah'])*$bobot[5])+
    (($q['maxK7']/$dt3['kriteria7_sumber_airbersih'])*$bobot[6])+
    (($q['maxK8']/$dt3['kriteria8_transportasi'])*$bobot[7])
    ,2);
    $status = $rangking;
        if ($status < $angkaTengah){
            $status = '<span style="color:red;"> Tidak Layak </span>';
        } else {
            $status = '<span style="color:green;"> Layak </span>';
        }
        
        // array_push($nilai, $rangking);
        echo "<tr>
        <td align='center'>$no</td>
        <td>".($dt3['nik'])."</td>
        <td>".($dt3['nama'])."</td>
        <td>".($dt3['kecamatan'])."</td>
        <td >".($dt3['kelurahan'])."</td>
        <td align='center'>".($dt3['tahun'])."</td>
        <td align='center'>$rangking</td>
        <td align='center'>$status</td>
    </tr>";
}}
    // $nilai = array($rangking);
    // print_r($nilai);
        

        


    // echo count($nilai);
    // $sorting = $nilai;
    // rsort($sorting);

    
    // foreach ($nilai as $key => $value) {
    //     foreach ($sorting as $key_sorting => $value_sorting) {
    //         if($value===$value_sorting)
    //         {
    //             $key=$key_sorting;
    //             break;
    //         }
            
    //     }
    
    //     echo $value_sorting .'- Rank:'.((int)$key+1).'<br>';
        
    // }


      
        ?>
                </table>
                <button class="btn-import" style="width: auto;"><a
                            href="cetak_perangkingan.php?&kecamatan=<?= $kecamatan ?>&tahun=<?= $tahun ?>">
                            Cetak</a>
                    </button>
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