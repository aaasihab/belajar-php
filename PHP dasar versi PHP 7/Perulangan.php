<?php

// perulangan for
echo("\nPERULANGAN FOR\n");
$bil = 7;
$count = 0;
for($i=1; $i <= $bil; $i++) {
    if ($bil % $i == 0) {
        $count ++;
    }
}
if ($count == 2) {
    echo("Bilangan prima\n");
} else {
    echo("Bukan bilangan prima\n");
}

// perulangan while
echo("\nPERULANGAN WHILE\n");
$bil = 8;
$i = 1;
while ($i <= $bil){
    echo("Perulangan ke-$i\n");
    $i++;
}

// perulangan do while
echo("\nPERULANGAN DO WHILE\n");
$bil = 8;
$i = 1;
do {
    echo("Perulangan ke-$i\n");
    $i ++;
}
while ($i <= $bil);

