<?php

// fetch() -> jika ingin mengambil 1 data dari hasil query tanpa foreach

require "Koneksi.php";

$connection = getConnection2();

$username = "sihab@gmail.com";
$password = 12345;

$sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
$statement = $connection->prepare($sql);
$statement->bindParam("username", $username);
$statement->bindParam("password", $password);

$statement->execute();

// jika $row = tidak null maka $row akan menyimpan data hasil query
if($row = $statement->fetch()) {
    echo "Login succes : {$row['username']}" . PHP_EOL;
// jika $row = null maka $row akan mengembalikan nilai false
} else {
    echo "user tidak ditemukan" . PHP_EOL;
}

var_dump($row);
$connection = null;