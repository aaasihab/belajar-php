<?php
require_once "Class.php";

use dataInterfaceInherit\{Avanza};

$car = new Avanza();
$car->drive();

echo $car->getTire() . PHP_EOL;
echo $car->getBrand();

var_dump($car->isMantenance());