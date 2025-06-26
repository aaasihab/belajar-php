<?php

// query -> untuk menjalankan perintah sql dengan return value atau mengambil data dari database 
// digunakan ketika tidak ada parameter(atau kondisi) pada kode sql
// contoh : select

require_once "Koneksi.php";

$connection = getConnection2();

$sql = "SELECT * FROM admin";
$statement = $connection->query($sql);

foreach($statement as $row){
    $username = $row["username"];
    $password = $row["password"];

    echo "Username : $username" . PHP_EOL;
    echo "Password : $password" . PHP_EOL;

}

$connection = null;