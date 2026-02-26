<?php
#1. Meng-koneksikan Ke Database
include_once("../koneksi.php");

#2.ID Hapus
$dihapus = $_GET['id'];

#3.menulis Query
$query = "DELETE FROM dosen WHERE id='$dihapus'";   

#4.Menjalankan Query
$hapus = mysqli_query($koneksi, $query);
unlink("../fotodosen/".$_GET['foto']);
#5.Kembali ke index.php
header("location:index.php")

?>