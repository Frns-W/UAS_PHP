<?php
    #1. Meng-koneksikan PHP ke MySQL
    include("../koneksi.php");

    #2. Mengambil Value dari Form Tambah
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $jns_kelamin = $_POST['jns_kelamin'];
    $jurusans_id = $_POST['jurusans_id'];
    $gelombang = $_POST['gelombang'];

    #3. Query Insert (proses tambah data)
    $query = "UPDATE biodata SET nama ='$nama', nisn='$nisn', tempat_lahir='$tempat_lahir', 
    tgl_lahir='$tgl_lahir', alamat='$alamat', email='$email', jns_kelamin='$jns_kelamin', jurusans_id='$jurusans_id', gelombang_id='$gelombang'    
    WHERE id='$id'";

    $tambah = mysqli_query($koneksi,$query);

    #4. Jika Berhasil triggernya apa? (optional)
    if($tambah){
        header("location:index.php");
    }else{
        echo "Data Gagal diedit";
    }
?>