<?php

// Kondisi
echo("Kondisi\n");
$umur = 25;
$pekerjaan = "mahasiswa";
if ($umur >= 18 && $pekerjaan == "mahasiswa") {
    echo("Anda adalah mahasiswa yang sudah dewasa");
} elseif ($umur >= 18 && $pekerjaan != "mahasiswa") {
    echo("Anda sudah dewasa tetapi bukan mahasiswa");
} else {
    echo("Anda belum cukup dewasa");
}

echo("\n");

$nilai = 85;
if ($nilai >= 80) {
    echo("Anda mendapatkan nilai A");
} elseif ($nilai >= 70 && $nilai < 80) {
    echo("Anda mendapatkan nilai B");
} elseif ($nilai >= 60 && $nilai < 70) {
    echo("Anda mendapatkan nilai C");
} else {
    echo("Anda mendapatkan nilai D");
}

echo("\n\n");

// Switch case
echo("Switch case\n");
$tipe = 'a';
$harga = 20000;
$diskon = null;
switch($tipe) {
    case 1:
        $diskon = $harga * 20/100;
        break;
    case 2:
        $diskon = $harga * 10/100;
        break;
    case 'a':
        $diskon = $harga * 5/100;
        break;
    default:
        echo("Tidak ada tipe yang cocok");
}
$bayar = $harga - $diskon;
if ($diskon != null) {
    echo("Anda masuk kategori $tipe\n");
    echo("Jumlah yang harus dibayar adalah $bayar");
}

echo("\n");

$kode = '4';
switch($kode) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
    echo('hari aktif');break;
    case 6:
    case 7:
    echo('hari libur');
    default:
    echo('Kode tidak cocok');
}

