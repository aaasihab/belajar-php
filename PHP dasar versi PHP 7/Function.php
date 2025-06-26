<?php
// function
function tambah($bil1, $bil2){
    return $bil1 + $bil2;
};
function kurang($bil1, $bil2){
    $hasil = $bil1 + $bil2;
    return $hasil;
};

$hasil = tambah(10, 5);
echo("Hasil penjumlahan = ".$hasil.PHP_EOL);

$hasil = kurang(10, 5);
echo("Hasil pengurangan = ".$hasil.PHP_EOL);

// function dengan deafult value
function say_hello($name = 'anonymous') {
    echo("\nHello $name");
};
say_hello();
say_hello("Ahmad");
echo("\n");
echo("\n");

// variabel local
function ganti_buah() {
    $buah = 'apel';
    print("Buah $buah (ini dalam fungsi ganti_buah())\n");
};
$buah = 'jeruk';
print("Buah = $buah\n");

ganti_buah();
print("Buah = $buah\n");

// variable global --> mempengaruhi variabel setelah fungsi dipanggil
function ganti_buah_2() {
    global $buah;
    $buah = 'apel';
    print("Buah $buah (ini dalam fungsi ganti_buah())\n");
};
$buah = 'jeruk';
print("Buah = $buah\n");

ganti_buah_2();
print("Buah = $buah\n");
