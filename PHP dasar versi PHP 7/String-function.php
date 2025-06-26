<?php

// 1 (Menghitung panjang data)
$len = strlen('Tanjung Pinang');
echo("Contoh strlen() dari kata Tanjung Pinang : $len atau\n");
echo("Contoh strlen() dari kata Tanjung Pinang : $len\n");

// 2 (mengubah huruf menjadi huruf kecil semua)
$lower = strtolower('SuRaBaYa');
echo("Contoh strtolower() dari kata SuRaBaYa : $lower\n");

// 3 (mengubah huruf menjadi kapital semua)
$upper = strtoupper('SuRaBaYa');
echo("Contoh strtoupper() dari kata SuRaBaYa : $upper\n");

// 4 (membalik kata)
$rev = strrev('Pintar');
echo("Contoh strrev() dari kata Pintar : $rev\n");

// 5 (format angka)
$angka = number_format(10000000,2);
echo("Contoh number_format() : Rp$angka\n");

// 6 (ord --> Mengambil nilai ASCII dari karakter)
$ord = ord('R');
echo("Contoh ORD() : $ord\n");

// 6 (chr --> Mengambil karakter dari nilai ASCII)
$chr = chr('82');
echo("Contoh chr() : $chr\n");
