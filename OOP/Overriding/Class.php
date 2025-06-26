<?php

// function overriding-->mendeklarasikan ulang function di child class yang sudah ada di parent class
// function yang ada di parent class otomatis tidak bisa diakses lagi
class Manager 
{
    var string $name;
    function say_hello(string $name)
    {
        echo "Hi $name, my name is manager $this->name" . PHP_EOL;
    }
}

class VicePresident extends Manager 
{
    function say_hello(string $name)
    {
        echo "Hello $name, my name is VP $this->name" . PHP_EOL;
    }
}