<?php

// transaction -> fitur yang sama dengan di database mysql
// rollBack() -> semua query akan dibatalkan tanpa terkecuali
// namun kolom yang bersifat auto increment akan terus berjalan 
// dan valuenya akan dilompati sesuai dengan jumlah query yang dibatalkan

require "Koneksi.php";

$connection = getConnection2();

// transaction di mulai dengan beginTransaction() 
$connection->beginTransaction();

$connection->exec("INSERT INTO comments(email, comment) VALUES('bibin@gmail.com', 'hi!')");
$connection->exec("INSERT INTO comments(email, comment) VALUES('bibin@gmail.com', 'hi!')");
$connection->exec("INSERT INTO comments(email, comment) VALUES('bibin@gmail.com', 'hi!')");

$connection->rollBack();

$connection = null;