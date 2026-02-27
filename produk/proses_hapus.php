<?php
#1. Meng-koneksikan Ke Database
include_once("../koneksi.php");

#2.ID Hapus
$dihapus = $_GET['id'];

#3. Ambil nama file foto dari database
$qry_ambil = "SELECT foto_produk FROM produk WHERE id_produk='$dihapus'";
$hasil = mysqli_query($koneksi, $qry_ambil);
$data = mysqli_fetch_array($hasil);
$foto = $data['foto_produk'];

#4. Hapus file foto dari folder
if(!empty($foto) && file_exists("../fotoproduk/".$foto)){
    unlink("../fotoproduk/".$foto);
}

#5. menulis Query hapus data
$query = "DELETE FROM produk WHERE id_produk='$dihapus'";   

#6. Menjalankan Query
$hapus = mysqli_query($koneksi, $query);

#7. Kembali ke index.php
if($hapus){
    header("location:index.php");
} else {
    echo "Gagal menghapus data";
}
?>