<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        include("index.php");
    }
    else {
    ?>

<!DOCTYPE html>
<html>

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
                <li><a href="perangkingan.php">Laporan</a></li>
                <li><a onclick="logout()">Logout</a></li>
            </ul>
        </nav>
        <!-- -------------->

        <article>
            <div class="card">
                <p style="font-size:18px; font-weight: bold; padding-left: 5px; margin-top: 10px; margin-bottom: 10px;">
                    Dashboard</p>
            </div>
            <div class="card">
           Selamat Datang, Administrator di Sistem Pendukung Keputusan Penerima Bantuan Demam Berdarah berbasis web Mengunakan Metode Simple Additive Weighting

                <!-- <div id="columnchart_values" style="width: 900px; height: 300px;"></div> -->
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
    </script>



</body>
<?php
}?>