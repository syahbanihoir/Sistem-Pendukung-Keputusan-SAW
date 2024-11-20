<!DOCTYPE html>
<html>
<title>Lihat Data Warga</title>
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
                <li>
                    <button class="dropdown-btn">Kriteria
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="lihat_kriteria.php">Lihat Kriteria</a>
                        <a href="lihat_sub_kriteria.php">Lihat Sub-Kriteria</a>
                    </div>
                </li>



                <li>
                    <button class="dropdown-btn">Penilaian
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-container">
                        <a href="view-data-warga.php">lihat Data Warga</a>
                        <a href="normalisasi.php">Normalisasi</a>
                        <a href="evaluasi.php">Nilai Evaluasi</a>
                       
                    </div>
                    <li> <a href="perangkingan.php">Laporan</a></li>
                </li>





                <li><a onclick="logout()">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- -------------->



        <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        </script>

        <body>
            <article>
                <div class="card">
                    <p
                        style="font-size:18px; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">
                        Penilaian&nbsp;/&nbsp;Lihat Data Warga
                    </p>
                </div>
                <div class="card">
                    <h3 style="margin-bottom:25px; font-size: 15px; text-align: center;">
                        Data Alternatif & Nilai Kriteria Penilaian
                    </h3>


                    <form id="form" method="post" action="view-data-warga.php"
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
                    &nbsp;&nbsp;&nbsp;
                    <label for="tahun">Pilih Tahun :</label>
                    <select name="tahun" id="tahun">
                                
                                    <?php
                                    include('koneksi.php');
        
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

                    
                    <div style="overflow-x:auto; width:100%;">
                        <table id='example' class='display' width='100%' class="tabel-layout" border="1"
                            cellpadding="5">
                            <thead>
                                <tr class="k">
                                    <th>No.</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Tahun</th>
                                    <th>Jumlah Anggota Keluarga Dalam 1 Rumah</th>
                                    <th>Pendidikan Kepala Keluarga</th>
                                    <th>Jumlah Anggota Keluarga Masih Sekolah</th>
                                    <th>Pengeluarkan Satu Jiwa Dalam Keluarga Perbulan</th>
                                    <th>Penghasilan Satu Jiwa Dalam Keluarga Perbulan</th>
                                    <th>Status Kepemilikan Rumah</th>
                                    <th>Suber Air Bersih</th>
                                    <th>Transportasi</th>
                                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aksi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <?php
		//iclude file koneksi ke database
        error_reporting(0);
		$kecamatan = $_POST['kecamatan'];
        
$tahun = $_POST['tahun'];
		
		//query ke database dg SELECT table siswa diurutkan berdasarkan NIS paling besar
		
        if ($kecamatan != '' || $tahun !='') {
            $q = mysqli_query($conn,"SELECT *
            FROM tbl_warga, tbl_matrik
            WHERE tbl_matrik.nik = tbl_warga.nik
            AND kecamatan LIKE '$kecamatan' AND tahun LIKE '$tahun'
            order by tbl_matrik.nik asc");
           
        } else {
            $q = mysqli_query($conn,"SELECT *
            FROM tbl_warga, tbl_matrik
            WHERE tbl_matrik.nik = tbl_warga.nik
            order by tbl_matrik.nik asc");
        }


		//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
		if(mysqli_num_rows($q) == 0){	//ini artinya jika data hasil query di atas kosong
			
			//jika data kosong, maka akan menampilkan row kosong
			echo '<tr><td colspan="13">Tidak ada data!</td></tr>';
			
		}else{	//else ini artinya jika data hasil query ada (data diu database tidak kosong)
			
			//jika data tidak kosong, maka akan melakukan perulangan while
			$no = 1;	//membuat variabel $no untuk membuat nomor urut
			while($dt = mysqli_fetch_assoc($q)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
				$nik = $dt['nik'];
                $idmatrik = $dt['id_matrik'];

                $url = 'hapus-warga.php?id='.$nik;
				//menampilkan row dengan data di database
				echo '<tr>';
					echo '<td align="center">'.$no.'</td>';	//menampilkan nomor urut
                    echo '<td>'.$dt['nik'].'</td>';
					echo '<td>'.$dt['nama'].'</td>';
                    echo '<td>'.$dt['kecamatan'].'</td>';
                    echo '<td>'.$dt['kelurahan'].'</td>';
                    echo '<td align="center">'.$dt['tahun'].'</td>';
					echo '<td align="center">'.$dt['kriteria1_jml_anggota_keluarga'].'</td>';	//menampilkan data kelas dari database
					echo '<td align="center">'.$dt['kriteria2_pendidikan_kepala_keluarga'].'</td>';	//menampilkan data jurusan dari database
					echo '<td align="center">'.$dt['kriteria3_jml_anggotakeluarga_sekolah'].'</td>';
                    echo '<td align="center">'.$dt['kriteria4_pengeluaran_satu_jiwa'].'</td>';
                    echo '<td align="center">'.$dt['kriteria5_penghasilan_satu_jiwa'].'</td>';
                    echo '<td align="center">'.$dt['kriteria6_status_rumah'].'</td>';
                    echo '<td align="center">'.$dt['kriteria7_sumber_airbersih'].'</td>';
                    echo '<td align="center">'.$dt['kriteria8_transportasi'].'</td>';
					echo '<td><a class="btn"
                            href="edit-warga.php?id='.$dt['nik'].'"">Edit</a>
                            <a class="btn" 
                            href="' . $url .'"">Hapus</a>
					</td>';
				$no++;	//menambah jumlah nomor urut setiap row
				
			}
			
		}
		?>
                        </table>
                    </div>

                    <button class="btn-import" style="width: auto;"><a
                            href="input_data_warga.php?kecamatan=317406">
                            + Input Data Warga</a>
                    </button>
                </div>


            </article>

            <!-- -------------->
    </section>
    <footer>
        <p>Copyright &copy;2023</p>
    </footer>

    <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
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

</html>