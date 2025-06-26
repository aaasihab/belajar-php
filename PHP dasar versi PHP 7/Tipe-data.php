<?php

$nama = 'Sihab';
echo("Tipe data : ".gettype($nama)."\n");
echo("\nstring : $nama \n");

$a = 22;
echo("integer : $a \n");
echo("Tipe data : ".gettype($a)."\n");
echo(settype($a, "double")."\n");
echo("Tipe data : ".gettype($a)."\n");

$b = 2.5;
echo("float : $b \n");

$tgl = date ('10-7-2023');
echo("Date : $tgl \n");
?> <!-- opsional(boleh pakai boleh tidak) -->
