<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<?php 
	include 'koneksi.php';
	$id = $_GET['id'];


   
   
   

   
    

    $query="DELETE from tbl_matrik where nik='$id'";
    $exequerry = mysqli_query($conn, $query);

    $query1="DELETE from tbl_warga where nik='$id'";
    $exequerry1 = mysqli_query($conn, $query1);
    if ($exequerry1) {
        $pesan = "hapus berhasil";
        echo "<script>alert('$pesan'); document.location= 'view-data-warga.php'</script>";

    } else {
        $pesan = "hapus gagal";
        echo "<script>alert('$pesan'); document.location= 'view-data-warga.php'</script>";
    }


?>

</html>