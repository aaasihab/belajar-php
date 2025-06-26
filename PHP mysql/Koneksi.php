<?php
// menghubungkan php dengan mysql menggunakan class PDO(PHP Data Object)

function getConnection(){
    $host = "localhost";
    $port = "3306";
    $database = "sihab_peminjaman_buku";
    $username = "root";
    $password = "";

    return new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
}

function getConnection2(){
    $host = "localhost";
    $port = "3306";
    $database = "login";
    $username = "root";
    $password = "";

    // try {
    //     return new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
    // } catch(PDOException) {
    //     echo "error : database belum terhubung";
    // }

    return new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
}
