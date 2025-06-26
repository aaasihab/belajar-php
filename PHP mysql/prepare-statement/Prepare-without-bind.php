<?php

// prepare() -> cara lain mengatasi sql injection 
// cara ketiga :

require "Koneksi.php";

$connection = getConnection2();

$username = "ahmad@gmail.com";
$password = 54321;

// value/parameter input diubah menjadi ? (semacam placeholder)
$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";

// kode sql akan di prepare dan disimpan dalam sebuah variabel
$statement = $connection->prepare($sql);

// lalu statement akan di eksekusi dengan parameter yang diisi dengan variabel input
$statement->execute([$username, $password]);

$success = false;
$find_user = null;
foreach($statement as $row){
    $success = true;
    $find_user = $row["username"];
}

if($success) {
    echo "Login succes : $find_user" . PHP_EOL;
} else {
    echo "user tidak ditemukan" . PHP_EOL;
}
$connection = null;