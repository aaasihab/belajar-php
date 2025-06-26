<?php

// setDate() -> memanipulasi data tanggal
// setTime() -> memanipulasi data waktu
// setTimezone( -> memanipulasi lokasi datetime
// DateInterval -> memanipulasi data tanggal dan waktu sebagian, misalkan hanya menambah satu tahun

$date = new DateTime();
$date->setDate(2022, 5, 10);
$date->setTime(10, 30, 0);
$date->setTimezone(new DateTimeZone("Europe/Berlin"));

// menambah 1 tahun
$date->add(new DateInterval("P1Y")); // P = period

// mengurangi 1 bulan
$dateInterval = new DateInterval("P1M");
$dateInterval->invert = 1;
$date->add($dateInterval);

var_dump($date);

// format datetime -> memanipulasi cara untuk menampilkan string format waktu
// date -> (Y-m-d) = year, month, date
// time -> (h:i:s) = hour, minute, second
echo "Tanggal saat ini : " . $date->format('Y-m-d') . PHP_EOL;
echo "Waktu saat ini : " . $date->format('H:i:s') . PHP_EOL;

// pharse datetime -> memparsing string menjadi datetime
// kebalikan dari format datetime
// jika ada typo akan menampilkan bool(false)
$date = DateTime::createFromFormat("Y-m-d h:i:s", "2022-5-10 10:30:00", new DateTimeZone("Asia/Jakarta"));
var_dump($date);