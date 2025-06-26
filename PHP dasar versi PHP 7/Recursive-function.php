<?php
// function biasa
function factorial(int $value): int {
    $total = 1;
    for ($i=1; $i<=$value; $i++){
        $total *= $i; 
    }
    return $total;
};
echo("Hasil faktorial = ".factorial(5)."\n");
// recursive function (memanggil function diri sendiri)
function recursive_factorial(int $value): int {
    if ($value == 1) {
        return 1;
    } else {
        return $value * recursive_factorial($value - 1);
    }
};
echo("Hasil recursive faktorial = ".factorial(5)."\n");