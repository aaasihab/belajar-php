<?php

// LastInsertId -> jika ingin mengambil data terakhir dari primary key yang auto increment

require "Koneksi.php";

$connection = getConnection2();

$connection->exec("INSERT INTO comments(email, comment) VALUES('doni@gmail.com', 'hai')");
$id = $connection->LastInsertId();

var_dump($id);

