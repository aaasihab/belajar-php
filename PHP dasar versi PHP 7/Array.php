<?php

// array
$nama = array("ahmad","rizal","ubed","angga");
// $nama = ["ahmad","rizal","ubed","angga"];
print_r($nama);

// mencari data pada array
$input_name = 'rizal';
$indeks = array_search($input_name, $nama);
echo $indeks . PHP_EOL;

if ($indeks !== false){
    echo("nama $input_name ada pada indeks ke $indeks");
} else {
    echo("nama $input_name tidak ada pada array");
}
echo("\n");



// menampilkan nilai sesuai indek
print($nama[2]."\n");

// mengubah nilai 
$nama[1] = "dian";
print_r($nama);

for ($i=0; $i < count($nama); $i++) {
    echo("Nilai indek ke-$i dari array = $nama[$i]\n");
}

print("\n=========================================");
// array asosiatif
echo("\nARRAY ASOSIATIF\n");
$nama = array("indek1" => "ahmad","indek2" => "rizal","indek3" => "ubed","indek4" => "angga");
echo($nama["indek1"]."\n");

print("\n=========================================");
// foreach
echo("\nFOREACH\n");
echo("hanya menampilkan value\n");
$numbers = [1, 2, 3, 1];
foreach ($numbers as $number) {
    echo("nilai \$numbers saat ini adalah $number\n");
}

echo("\nhanya menampilkan value dengan key");
$a = array(1, 2, 3, 17);
$i = 0;
foreach ($a as $v) {
    echo("nilai \$a[$i] = $v\n");
    $i++;
}

print("\n=========================================");
echo("\nFOREACH PADA ARRAY ASOSIATIF\n");
$data = array("one" => 1, "two" => 2, "three" => 3, "four" => 4,);
foreach ($data as $key => $value) {
    echo("nilai \$a[$key] = $value\n");
}

print("\n=========================================");
// array multidimensi
echo("\nARRAY MULTIDIMENSI\n");
// $makanan = array(
//     'sayuran'=>array('bayam'=>8000, 'tomat'=>5000),
//     'buah'=>array('apel'=>17000, 'jeruk'=>8000)
// );
$makanan = [
    'sayuran' => ['bayam' => 8000, 'tomat'=>5000],
    'buah' => ['apel'=>17000, 'jeruk'=>8000]
];
foreach ($makanan as $jenisTanaman => $contoh) {
    echo("\n$jenisTanaman ");
    foreach ($contoh as $nama => $harga){
        $Harga = number_format(($harga));
        echo("$nama = Rp$Harga\n");
    }
};

echo("\nHarga buah 1 apel = {$makanan['buah']['apel']}\n");

// $kendaraan['roda dua']['motor'] = 'honda';
// $kendaraan['roda dua']['motor'] = 'yamaha';
// $kendaraan['roda dua']['sepeda'] = 'polygon';
// $kendaraan['roda empat']['mobil'] = 'avanza';
// foreach ($kendaraan as $jenisRoda => $rodaData) {
//     echo("\n$jenisRoda :\n");
//     foreach ($rodaData as $jenisKendaraan => $merk) {
//         echo(" - $jenisKendaraan : $merk\n");
//     }
// }


$kendaraan = [
    "roda dua" => ["motor" => ["honda", "yamaha"], "sepeda" => "polygon"],
    "roda empat" => ["mobil" => "avanza"]
];

foreach ($kendaraan as $jenisRoda => $rodaData) {
    echo("\n$jenisRoda :\n");

    foreach ($rodaData as $jenisKendaraan => $merk) {
        if (is_array($merk)){
            echo(" - $jenisKendaraan : ".implode(",", $merk)."\n");
        }else {
            echo(" - $jenisKendaraan : $merk\n");
        }
    }
}