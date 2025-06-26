<?php

$a = 10;
$b = 5;
$c = 3;

echo("Penjumlahan \n");
$d = $a + $b + (-$c);
echo("$a + $b + (-$c) : $d\n");

echo("Pengurangan \n");
$d = $a - (-$b) - $c;
echo("$a - (-$b) - $c : $d\n");

echo("Perkalian \n");
$d = $a * $b - $c;
echo("$a * $b - $c : $d\n");

echo("Pembagian \n");
$d = ($a + $b) / $c;
echo("$a + $b / $c : $d\n");

echo("Modulo \n");
$d = $a % $c;
echo("$a % $c : {$d}\n");
