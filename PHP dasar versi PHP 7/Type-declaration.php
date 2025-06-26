<?php
// type declaration -> ara untuk menginformasikan tipe data yang diharapkan untuk parameter dan nilai pengembalian (return value) dalam function

// 1) type declaration skalar : int, string, float, bool
function add(int $a, int $b): int {
    return $a + $b;
}
echo add(10, 5). PHP_EOL;
$hasil = add(10, 5);
echo $hasil . PHP_EOL;

// 2) type declaration object : className, objet
class User {
    public string $name = "Abu";
}

function getUserInfo(User $user): void {
    echo "hello $user->name" . PHP_EOL;
}
$user = new User();
getUserInfo($user);

// 3) type declaration null
function printNullable(?string $text): void {
    if ($text == null) {
        echo "ini argumen null" . PHP_EOL;
    }
}
printNullable(null);

// 4) type declaration union (Gabungan dua tipe data): int|float, dsb (PHP 8)
function processValue(int|string $value): void {
    echo $value . PHP_EOL;
}
processValue(10);

// 5) type declaration array
function processArray(array $data): void {
    print_r($data);
}
processArray([1,2,3,4]);
