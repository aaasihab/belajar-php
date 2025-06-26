<?php

// transaction -> fitur yang sama dengan di database mysql
// commit() ->jika salah satu query gagal maka semua query yang berhasil akan dibatalkan

require "Koneksi.php";

$connection = getConnection2();

// transaction di mulai dengan beginTransaction() 
$connection->beginTransaction();

$connection->exec("INSERT INTO comments(email, comment) VALUES('test@gmail.com', 'hi!')");
$connection->exec("INSERT INTO comments(email, comment) VALUES('test@gmail.com', 'hi!')");
$connection->exec("INSERT INTO comments(email, comment) VALUES('test@gmail.com', 'hi!')");

$connection->commit();

$connection = null;