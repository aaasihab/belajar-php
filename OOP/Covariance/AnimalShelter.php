<?php

// covariance -> memungkinkan kita mengoverride function parent dengan return value lebih spesifik
// parent dijadikan child pada return valuenya
require_once "Animal.php";

use AnimalCovariance\{Animal, Cat, Dog};

interface AnimalShelter
{
    function adopt(string $name): Animal;
}
class CatShelter implements AnimalShelter
{
    public function adopt(string $name): Cat
    {
        $cat = new Cat();
        $cat->name = $name;
        return $cat;
    }
}
class DogShelter implements AnimalShelter
{
    public function adopt(string $name): Dog
    {
        $dog = new Dog();
        $dog->name = $name;
        return $dog;
    }
}