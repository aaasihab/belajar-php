<?php
// regular expression -> fitur yang digunakan untuk melakukan pencarian string
// beberapa contoh dari regular expression:

// preg_match_all -> digunakan untuk mencari pattern
// i -> in case insensitif artinya penggunaan huruf fleksibel bisa kapital atau bisa huruf kecil

$match = [];
$result = (bool)preg_match_all("/eko|awan|edy/i", "Eko Kurniawan Khennedy", $match);
var_dump($match);
var_dump($result);

// contoh penggunaan preg_match
$pattern = '/hello/';
$text = 'Hello, World!';
if (preg_match($pattern, $text)) {
    echo 'Match found!' . PHP_EOL;
} else {
    echo 'Match not found!' . PHP_EOL;
}


// preg_replace -> digunakan untuk mereplace semua pattern dengan replacement
$text = "Dasar lu anjing dan bangsat";
$result = preg_replace("/anjing|bangsat/i", "***", $text);
var_dump($result);

$result = preg_split("/[\s,-]/", "Karangbong Pajarakan,Probolinggo-JawaTimur");
var_dump($result);