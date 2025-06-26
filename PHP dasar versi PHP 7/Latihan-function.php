<?php

// nomer 1
function convert(int $detik): array {
    $jam = floor($detik / 3600);
    $sisa = floor($detik % 3600);
    $menit = floor($sisa / 60);
    $detik = floor($sisa % 60);
    return [$jam, $menit, $detik];
}

function finish(int $start,int $detik): int {
    $hasil = $start + $detik;
    return $hasil;
}

function tiba(string $nama,array $waktu): void {
    $h = $waktu[0];
    $m = $waktu[1];
    $s = $waktu[2];
    echo "MR $nama sampai pada kota N pada pukul $h:$m:$s\n";
}

# data input dari pengguna
$start = 6 * 3600;
$detikA = 15436;
$detikB = $detikA - 4203;

# mencari waktu tiba dengan format detik menggunakan function finish
$finishDetikA = finish($start, $detikA);
$finishDetikB = finish($start, $detikB);

# mengonversi waktu sampai dari detik menjadi jam, menit, detik dan disimpan dalam array menggunakan function convert
$dataA = convert($finishDetikA);
$dataB = convert($finishDetikB);

# menampilkan informasi
tiba("A", $dataA);
tiba("B", $dataB);

print("\n");
// nomer 2
$krat = 127;
$totalTelur = $krat * 30;
$totalKemasan = floor($totalTelur / 4);
$sisaTelor = $totalTelur % 4;

echo "Jumlah krat : $krat krat telur\n";
echo "Jumlah kemasan per 1/4 kg : $totalKemasan kemasan telur\n";
echo "Sisa telur : $sisaTelor";
