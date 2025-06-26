<?php

require_once __DIR__ . '/../Src/Config.php';

$connection = getConnection();
if ($connection){
    echo "Sukses terhubung ke database";
}

?>
