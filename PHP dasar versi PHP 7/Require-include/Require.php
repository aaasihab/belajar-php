<?php
// jika file tidak ditemukan
// program akan berhenti dan menghasilkan error pada require/pemanggilan filenya
require "function.php";

// jika ingin mengimpor file berkali kali
require_once "function.php";
$first_nama = 'Ahmad';
$last_name = 'Sihabillah';
say_hello($first_nama, $last_name);