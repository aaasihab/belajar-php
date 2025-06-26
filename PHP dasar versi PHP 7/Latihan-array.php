<?php
echo("Nomer 1.\n");
$data_siswa = [
    'A' => 10,
    'B' => 11,
    'C' => 12,
    'D' => 9,
];
foreach ($data_siswa as $nama => $frek) {
    $bintang = str_repeat('* ', $frek);
    echo("Nama $nama = $bintang($frek)\n");
}

echo("\nNomer 2.\n");
$data = [
    'A' => 80,
    'B' => 90,
    'C' => 70,
    'D' => 60
];
$tertinggi = max($data);
$name = array_search($tertinggi, $data);
echo("Nilai tertinggi : $tertinggi atas Nama : $name");

echo("\nNomer 3.\n");
$data = [2,4,6,4];
$max = max($data);
$min = min($data);
$count = count($data);
$avg = array_sum($data)/$count;
echo("Jumlah : $count, ");
echo("rata-rata : $avg, ");
echo("terbesar : $max, ");
echo("terkecil : $min, ");

echo("\nNomer 4.\n");
$data = [2,4,6,3];
$data_sort = sort($data);
foreach ($data as $data) {
    print_r($data);
    echo(", ");
}