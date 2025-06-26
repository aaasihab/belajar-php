<?php
require_once "Animal.php";

$cat = new Cat();
$cat->name = "Luna";
$cat->run();
$cat->eat(new AnimalFood);

$dog = new Dog();
$dog->name = "Doggy";
$dog->run();
$dog->eat(new Food);
