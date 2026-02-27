<?php 
include("../ceklogin.php");
include_once("../koneksi.php");
$idedit = $_GET['id'];
$qry = "SELECT * FROM produk WHERE id_produk='$idedit'";
$edit = mysqli_query($koneksi,$qry);
$data = mysqli_fetch_array($edit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body style="background-color:#d1e6d4">
    <?php include_once("../navbar.php"); ?>

    <div class="container">
        <div class="row my-5">
            <div class="col-8 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>FORM EDIT PRODUK</b>
                    </div>
                    <div class="card-body">
                        <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_produk" value="<?=$data['id_produk']?>">

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-control" name="id_kategori">
                                    <option value="">-Pilih Kategori-</option>
                                    <?php
                                    $qry_cat = "SELECT * FROM kategori";
                                    $data_cat = mysqli_query($koneksi, $qry_cat);
                                    foreach($data_cat as $cat) {
                                    ?>
                                    <option value="<?=$cat['id_kategori']?>" <?= $data['id_kategori']==$cat['id_kategori'] ? 'selected' : '' ?>><?=$cat['nm_kategori']?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Merk</label>
                                <select class="form-control" name="id_merk">
                                    <option value="">-Pilih Merk-</option>
                                    <?php
                                    $qry_merk = "SELECT * FROM merk";
                                    $data_merk = mysqli_query($koneksi, $qry_merk);
                                    foreach($data_merk as $merk) {
                                    ?>
                                    <option value="<?=$merk['id_merk']?>" <?= $data['id_merk']==$merk['id_merk'] ? 'selected' : '' ?>><?=$merk['nama_merk']?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input value="<?=$data['nama_produk']?>" name="nama_produk" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input value="<?=$data['harga']?>" name="harga" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input value="<?=$data['stok']?>" name="stok" type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input name="foto" type="file" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>