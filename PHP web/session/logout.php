<?php

session_start();

// digunakan untuk menghapus semua session
session_destroy();

// akan kembali ke halaman login
header('Location: /session/login.php');
exit();

?>