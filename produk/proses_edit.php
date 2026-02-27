<?php
    #1. Meng-koneksikan PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil nilai form edit produk
    $id_produk = $_POST['id_produk'];
    $id_kategori = $_POST['id_kategori'];
    $id_merk = $_POST['id_merk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $foto_produk = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];

    #3. Menyusun query update
    if(!empty($foto_produk)){
        move_uploaded_file($tmp_foto, "../fotoproduk/" . $foto_produk);
        $query = "UPDATE produk SET id_kategori='$id_kategori', id_merk='$id_merk', nama_produk='$nama_produk', harga='$harga', stok='$stok', foto_produk='$foto_produk' WHERE id_produk='$id_produk'";
    } else {
        $query = "UPDATE produk SET id_kategori='$id_kategori', id_merk='$id_merk', nama_produk='$nama_produk', harga='$harga', stok='$stok' WHERE id_produk='$id_produk'";
    }

    $update = mysqli_query($koneksi,$query);

    if($update){
        header("location:index.php");
    }else{
        echo "Data Gagal diedit";
    }
?>