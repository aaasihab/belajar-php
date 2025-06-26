<?php
// object iterator yang lebih sederhana
// tipe datanya adalah generator

// iterator manual
function getGanjil(int $max): iterator{
    $array = [];

    for ($i=1; $i<=$max; $i++){
        if ($i % 2 == 1) {
            $array[] = $i;
        }
    }
    return new ArrayIterator($array);
}

foreach (getGanjil(100) as $value){
    echo "Bilangan ganjil : $value" .PHP_EOL;
}

// iterator otomatis menggunakan kata kunci yield
function getGenap(int $max): iterator{
    for ($i=1; $i<=$max; $i++){
        if ($i % 2 == 0) {
            yield $i;
        }
    }
}
$genap = getGenap(100);
foreach ($genap as $value){
    echo "Bilangan genap : $value" .PHP_EOL;
}