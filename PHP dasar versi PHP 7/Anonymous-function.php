<?php
// fungsinya ada dalam sebuah variabel
$say_hello = function(string $name){
    echo("Hello $name\n");
};

$say_hello("Budi");
$say_hello("Eko");

// anonymous function sebagai argumen
function say_good_bye(string $name, $filter) {
    $final_name = $filter($name);
    echo("Good Bye $final_name\n");
};
say_good_bye("eko", function(string $name) {
    return strtoupper($name);
});
// argumen menggunakan string function
say_good_bye("eko", "strtoupper");

// mengakses variabel luar
$first_name = "Ahmad";
$last_name = "Rizal";

$say_hello = function () use ($first_name, $last_name) {
    echo("Hello $first_name $last_name\n");
};
$say_hello();
