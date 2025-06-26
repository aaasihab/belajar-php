<?php

// prepare() -> cara lain mengatasi sql injection 
// cara kedua :

require "Koneksi.php";

$connection = getConnection2();

$username = "sihab@gmail.com'; #";
$password = 12345;

// value/parameter input diubah menjadi ? (semacam placeholder)
$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";

// kode sql akan di prepare dan disimpan dalam sebuah variabel
$statement = $connection->prepare($sql);

// ? akan di bindparam(diikat) dengan variable input
$statement->bindParam(1, $username);
$statement->bindParam(2, $password);

// lalu statement akan di eksekusi
$statement->execute();

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