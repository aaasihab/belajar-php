<?php

$bil = 5;
$b = 0;
$i = 1;
echo("Bilangan fibbonacci : ");
while($bil > 0){
    $hasil = $b + $i;
    echo "$hasil ";
    $i = $b;
    $b = $hasil;
    $bil--;
}
while ($bil > 0 ) {
    $hasil = $i + $b;
    $i = $b;
    $b = $hasil;
    echo($b." ");
    $bil --; 
}
echo("\n");
echo("\n");
$bil = 4;
$total = 0;
for ($i=1; $i <= $bil; $i++) {
    $hasil = $i**3;
    $total = $total + $hasil;
}
echo("jumlah sederet bilangan pangkat 3 dari 1 sampai $bil : $total\n");

echo("\n");
echo("Bilangan ganjil dari angka 1 sampai 20 :\n");
for ($i=1; $i <= 20; $i++) {
    if ($i % 2 == 0) {
        continue;
    }
    echo("$i, ");
}