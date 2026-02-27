<?php
    #1. Meng-koneksikan PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil Value dari Form Tambah
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nm_kategori'];

    #3. Query Insert (proses tambah data)
    $query = "INSERT INTO kategori (id_kategori, nm_kategori) 
    VALUES ('$id_kategori', '$nama_kategori')";

    $tambah = mysqli_query($koneksi,$query);

    #4. Jika Berhasil triggernya apa? (optional)
    if($tambah){
        header("location:index.php");
    }else{
        echo "Data Gagal ditambah";
    }
?>