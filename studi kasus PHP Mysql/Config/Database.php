<?php

class Database
{
    static function getConnection()
    {
        $host = "localhost";
        $port = "3306";
        $database = "TodoList";
        $username = "root";
        $password = "";
        
        return new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
        
    }
}
