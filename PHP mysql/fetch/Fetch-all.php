<?php

// fetchAll() -> jika ingin mengambil semua data sekaligus dari hasil query tanpa foreach

require "Koneksi.php";

$connection = getConnection2();

$username = "sihab@gmail.com";
$password = 12345;

$sql = "SELECT * FROM admin";
$statement = $connection->query($sql);

// semua data akan disimpan di dalam variabel
$result = $statement->fetchAll();
var_dump($result);

$connection = null;