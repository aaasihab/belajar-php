<?php
require_once "AnimalShelter.php";
require_once "Animal.php";

$catShelter = new CatShelter();
$cat = $catShelter->adopt("luna");
$cat->run();

$dogShelter = new DogShelter();
$dog = $dogShelter->adopt("doggy");
$dog->run();

var_dump($cat);
var_dump($dog);