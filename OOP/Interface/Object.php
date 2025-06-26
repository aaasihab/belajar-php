<?php
require_once "Class.php";

use dataInterface\{Avanza};

$car = new Avanza();
$car->drive();
echo $car->getTire();