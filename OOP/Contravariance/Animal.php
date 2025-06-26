<?php
// contravariance -> memungkinkan kita mengoverride function parent dengan parameter tidak lebih spesifik(umum)
// childnya dijadikan parent pada parameter
require_once "Food.php";

abstract class Animal
{
    public string $name;
    abstract public function run(): void;
    abstract public function eat(AnimalFood $food): void;
}
class Cat extends Animal
{
    public function run(): void
    {
         echo "Cat $this->name is running" . PHP_EOL;
    }
    public function eat(AnimalFood $food): void
    {
        echo "Cat is eating" . PHP_EOL;
    }
}
class Dog extends Animal
{
    public function run(): void
    {
        echo "Dog $this->name is running" . PHP_EOL;
    }
    public function eat(Food $food): void
    {
        echo "Dog is eating" . PHP_EOL;
    }
}
