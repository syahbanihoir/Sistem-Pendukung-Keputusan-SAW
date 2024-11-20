<!DOCTYPE html>
<html>
<title>Lihat Kriteria</title>
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
                </li>
                <li> <a href="perangkingan.php">Laporan</a></li>
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


        <article>
            <div class="card">
                <p style="font-size:18px; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">
                    Lihat Kriteria</p>
            </div>

            <div class="card">

                <?php
    include_once "koneksi.php";

    $query = "SELECT * FROM kriteria";
    $sql = mysqli_query($conn, $query);
    ?>
                <table style="margin-top: 20px;" class="tabel-layout tab" border="1" cellpadding="5">
                    <tr class="k">
                        <th style="width: 40px;">NO.</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Sifat</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($sql)) {
            $id_kriteria = $row['id_kriteria'];
            $namakriteria = $row['namakriteria'];
            $bobot = $row['bobot'];
            $sifat = $row['sifat'];
         
        ?>
                    <tr>
                        <td align="center"><?php echo $no++ ?></td>
                        <td><?php echo $namakriteria ?></td>
                        <td align="center"><?php echo $bobot ?>%</td>
                        <td align="center"><?php echo $sifat ?></td>
                        <td align="center">
                            <a class="btn" href="edit_kriteria.php?&id=<?=$id_kriteria?>">Edit</a>

                        </td>
                    </tr>
                    <?php } 
                      $q = "SELECT *, sum(bobot) as jumlah_bobot FROM kriteria";
                      $sql = mysqli_query($conn, $q);

                    while ($row = mysqli_fetch_assoc($sql)) {
            $jumlahbobot = $row['jumlah_bobot'];
        ?>
                    <tr class="a">
                            <th class="nowarna"></th>
                            <th>Jumlah Bobot</th>
                            <td align="center"><?php echo $jumlahbobot ?>%</td>
                            <th class="nowarna"></th>
                            <th class="nowarna"></th>
                        </tr>
                    <?php } ?>

                   
                </table>
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
    </script>

</body>

</html>