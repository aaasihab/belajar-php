<?php

if (isset($_GET['page'])) {
    $allowedPages = ['tambah', 'hapus']; // Tentukan halaman yang diizinkan

    $page = $_GET['page'];

    // Validasi input
    if (in_array($page, $allowedPages)) {
        // Bersihkan input jika diperlukan
        $cleanPage = htmlspecialchars($page);

        // Gunakan nilai yang sudah bersih
        header("Location: $cleanPage/index.php");
        exit();
    } else {
        // Halaman tidak valid, lakukan tindakan yang sesuai
        echo "<script>alert('Halaman tidak valid');history.go(-1)</script>";
    }
}

?>

<html>
    <head>
        <title>halaman</title>
    </head>
    <body>
        <h1>Halaman</h1>
        <a href="index.php?page=tambah">tambah</a>
        <a href="index.php?page=hapus">hapus</a>
    </body>
</html>