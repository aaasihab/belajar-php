<?php
require_once "Class.php";

use AbstractFunction\{Cat, Dog};

$cat = new Cat();
$cat->name = "Cat";
$cat->run();

$dog = new Dog();
$dog->name = "Doggy";
$dog->run();
