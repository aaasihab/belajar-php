<?php

// sql injection -> sebuah teknik yang menyalahgunakan sebuah celah keamanan yang terjadi dalam lapisan basis data
// dilakukan dengan megirim input data dari user dengan perintah yang salah tapi kode tetap berjalan tanpa ada error

require_once "Koneksi.php";

$connection = getConnection2();

// kode akan sukses
// $username = "asihab@gmail.com'; #";
// $password = "1234";
// $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password';";

// quote -> akan menghapus kode tambahan ('; #) yang bukan karakter dan akan gagal
$username = $connection->quote("asihab@gmail.com'; #");
$password = $connection->quote("12345");
$sql = "SELECT * FROM admin WHERE username = $username AND password = $password";

$statement = $connection->query($sql);

$success = false;
$find_user = null;

foreach ($statement as $row){
    $success = true;
    $find_user = $row["username"];

}

if($success){
    echo "Login succes : $find_user" . PHP_EOL;
} else {
    echo "Gagal login";
}

$connection = null;