<?php


function getConnection()
{
    $host = "localhost";
    $port = "3306";
    $database = "mahasiswa";
    $username = "root";
    $password = "";

    return new PDO("mysql:host=$host;port=$port;dbname=$database",$username, $password);
    
}

?>