<?php

$name = 'Bayu'; // global scope --> tidak bisa diakses di dalam fungsi tanpa dijadikan argumen
function say_hello($name) {
    echo("Hello $name\n");
}
say_hello($name);

// global keyword --> bisa mengakses global scope di dalam function
$name_2 = 'Putra';
function hello() {
    global $name_2;
    echo("Hello $name_2\n");
}
hello();
//$globals --> variabel yang meyimpan semua global scope secara otomatis
var_dump($GLOBALS['name']);