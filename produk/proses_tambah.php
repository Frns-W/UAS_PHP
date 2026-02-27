<?php
    #1. Meng-koneksikan PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil Value dari Form Tambah
    $id_kategori = $_POST['id_kategori'];
    $id_merk = $_POST['id_merk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $foto_produk = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];

    #3. Query Insert (proses tambah data)
    $query = "INSERT INTO produk (id_kategori,id_merk,nama_produk,harga,stok,foto_produk) 
    VALUES ('$id_kategori','$id_merk','$nama_produk','$harga','$stok','$foto_produk')";
    
    move_uploaded_file($tmp_foto, "../fotoproduk/" . $foto_produk);

    $tambah = mysqli_query($koneksi,$query);
    #4. Jika Berhasil triggernya apa? (optional)
    if($tambah){
        header("location:index.php");
    }else{
        echo "Data Gagal ditambah";
    }
?>