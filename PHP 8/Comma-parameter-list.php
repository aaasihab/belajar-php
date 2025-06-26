<?php

// comma parameter list -> boleh menggunakan tanda koma di akhir list
function sayHello(string $first, string $last): void
{
    echo "$first $last" . PHP_EOL;
}

function sum(int... $values): int
{
    $result = 0;
    foreach ($values as $value){
        $result += $value;
    }
    return $result;

}

sayHello(
    "Eko",
    "Kurniawan",
);

echo sum(1,1,1,1,);

$array = [
    "first" => "Eko",
    "middle" => "Eko",
    "last" => "Eko",
    "address" => "Eko",
    "country" => "Eko",
    "bday" => "Eko",
];