<?php

// untuk menyingkat percabangan
// dua kondisi : (kondisi) ? a : b
$gender = 'pria';
$sapa = $gender == 'pria' ? 'Hai bro' : 'Hai nona';
echo($sapa."\n");

//tiga kondisi : (kondisi) ? a : ((kondisi) ? b : c)
$nilai = 75;
$hasil = ($nilai >= 80) ? "Lulus" : (($nilai >= 60) ? "Remedial" : "Tidak Lulus");
echo "Hasil: $hasil\n";

//empat kondisi : (kondisi) ? a : ((kondisi) ? b : ((kondisi) ? c : d))
$nilai = 110;
$hasil = ($nilai >= 100) ? 'Kesalahan input' : (($nilai >= 80) ? "Lulus" : (($nilai >= 60) ? "Remedial" : "Tidak Lulus"));
echo "Hasil: $hasil";

//lima kondisi : (kondisi) ? a : ((kondisi) ? b : ((kondisi) ? c : ((kondisi) ? d : e)))