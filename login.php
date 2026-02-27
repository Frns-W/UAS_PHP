<?php
session_start();

// Jika sudah login lewat session atau cookie, langsung ke index
if (isset($_SESSION['ses_username']) || isset($_COOKIE['coo_username'])) {
    header('Location: index.php');
    exit;
}

$pesan = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // proses login
    include 'koneksi.php';

    // Mengambil value data input
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // cek username dan password di database
    $qry = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
    $result = mysqli_query($koneksi, $qry);

    if (mysqli_num_rows($result) > 0) {
        // login berhasil
        $pesan = "Login Berhasil";

        // session & cookie
        if (isset($_POST['check']) && $_POST['check'] === "yes") {
            setcookie("coo_username", $username, time() + 3600 * 24 * 30, "/");
        } else {
            $_SESSION['ses_username'] = $username;
        }

        header("Location: index.php");
        exit;
    } else {
        // login gagal
        $pesan = "Username atau kata sandi salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body style="background-color:  #000000">

    <div class="container">
        <div class="row my-5">
            <div class="col-8 m-auto">
                <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="card-header">
                        <b>LOGIN</b>
                    </div>
                    <?php if ($pesan !== "") : ?>
                        <div class="alert alert-primary" role="alert">
                            <?= $pesan ?>
                        </div>
                    <?php endif; ?>
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="check" value="yes" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <button type="submit" name="tombol" class="btn btn-primary">Submit</button>
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