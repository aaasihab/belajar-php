<?php

// exec -> untuk menjalankan perintah sql yang tidak mengembalikan atau mengambil data dari database
// contoh : create table, insert, update, delete

require_once "Koneksi.php";

$connection = getConnection2();

$sql = <<<SQL
    RENAME TABLE comment TO comments
SQL;

$connection->exec($sql);

$connection = null;