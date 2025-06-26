<?php
// jika file tidak ditemukan
// program menghasilkan warning dan akan terus berjalan tetapi akan error pada function
include "function.php";

// jika ingin mengimpor file berkali kali
include_once "function.php";

$first_nama = 'Ahmad';
$last_name = 'Sihabillah';
say_hello($first_nama, $last_name);