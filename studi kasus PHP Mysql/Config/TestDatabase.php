<?php

use Config\Database;

require_once "Database.php";

$connection = Database::getConnection();
if ($connection){
    echo "SUKSES TERHUBUNG KE DATABASE" . PHP_EOL;
}