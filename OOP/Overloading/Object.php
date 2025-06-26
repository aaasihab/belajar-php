<?php

require_once "Class.php";

$zero = new Zero();
$first = $zero->firstName = "Ahmad";
$last = $zero->lastName = "Sihab";

echo "Nama depan : $first" . PHP_EOL;
echo "Nama belakang : $last" . PHP_EOL;

$zero->sayHello("Budi", "Yanto");
Zero::sayGoodbye("Budi", "Yanto");