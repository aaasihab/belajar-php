<?php

// sort()
echo("\nSORT\n");
$nama = array('dian','putri','abi','zee');
echo('data asli :');
foreach ($nama as $kunci => $isi) {
    echo("\n- indeks : $kunci = $isi,");
}

sort($nama);
print("\nhasil sort :");
foreach ($nama as $kunci => $isi) {
    echo("\n- indeks : $kunci = $isi,");
}
echo("\n");

// rsort
echo("\nRSORT\n");
rsort($nama);
echo("hasil rsort :");
foreach ($nama as $kunci => $isi) {
    echo("\n- indeks : $kunci = $isi,");
}
echo("\n");

// asort
echo("\nASORT\n");
$kamus['kuda'] = 'horse';
$kamus['burung'] = 'bird';
$kamus['unta'] = 'camel';
$kamus['ular'] = 'snake';
$kamus['kura-kura'] = 'turtle';
$kamus['katak'] = 'frog';
echo("data asli : \n");
foreach ($kamus as $key => $values) {
    echo("- $key => $values\n");
}

asort($kamus);
echo("\nhasil asort : \n");
foreach ($kamus as $key => $values) {
    echo("- $key => $values\n");
}