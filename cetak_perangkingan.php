<!DOCTYPE html>
<html>
<head>
	<title>Cetak</title>
     
    <style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}

.garis {
    border-bottom: 2px solid black;
  }
</style>
</head>
<body>
 
	<center>


 <br>
 <td><img src="asset/image/logo_kota_adminis_jaksel.png" alt="Logo Kota Administrasi Jakarta Selatan"
                        width="13%"></td>
                <td>
		<h2>SELEKSI DATA WARGA PENERIMA BANTUAN DEMAM BERDARAH</h2>
		<h2>JAKARTA SELATAN</h2>
        <div class="garis"></div>

     <br>
	</center>


	<?php 
	include 'koneksi.php';
    error_reporting(0);
    $kecamatan = $_GET['kecamatan'];
    $tahun = $_GET['tahun'];



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
 
	<table border="1" style="width: 100%">
		<tr>
        <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Tahun</th>
                            <th>Rangking</th>
                            <th>Status</th>
		</tr>
		
        <?php
$no = 0;
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
// $sql3 = mysqli_query($conn,"SELECT * FROM tbl_warga, tbl_matrik where tbl_matrik.nik=tbl_warga.nik ORDER BY `tbl_matrik`.`total_nilai` DESC ");
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
        <td>".($dt3['kelurahan'])."</td>
        <td align='center'>".($dt3['tahun'])."</td>
        <td align='center'>$rangking</td>
        <td align='center'>$status</td>
    </tr>";
    }
    
        ?>
                </table>
                
 
	<script>
		window.print();
	</script>
 
</body>
</html>













