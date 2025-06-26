<?php

$data = array("satu","dua","tiga");
echo("Data asli :\n");
print_r($data);
echo("\n");

// Menambah elemen
// menambah elemen di awal array
array_unshift($data, "nol");
echo("Data setelah array_unshift :\n");
print_r($data);

// menambah elemen di akhir array
array_push($data, "empat", "lima");
echo("Data setelah array_push :\n");
print_r($data);

// Menghapus elemen
// menghapus elemen di awal array
array_shift($data);
echo("Data setelah array_shift :\n");
print_r($data);

// menghapus elemen di akhir array
array_pop($data);
echo("Data setelah array_pop :\n");
print_r($data);

// menyalin elemen
$copy = array_slice($data, 0,4); #array_slice(var, indeks_awal, indeks_akhir)
echo("Data setelah array_slice :\n");
print_r($copy);