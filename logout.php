<?php 
session_start();
session_destroy();
// hapus cookie jika ada
setcookie("coo_username", "", time() - 3600, "/");
header("Location: login.php");
exit;
?>