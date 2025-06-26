<?php

// memanggil semua library/project menggunakan satu require saja
require_once __DIR__ .  "/vendor/autoload.php";

use AhmadSihabillah\Data\People;

$people = new People('Ahmad');
$people->sayHello('Sihab');