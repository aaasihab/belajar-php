<?php
// trait override
// jika ada function class yang sama dengan function di trait :
// - trait akan mengoverride function-class parent (function-class parent lebih diprioritaskan)
// - function-class child akan mengoverride trait (function di trait lebih diprioritaskan)
namespace Data\TraitOverride;
Trait SayGoodBye 
{
    function GoodBye(?string $name): void
    {
        if (is_null($name)) {
            echo "Good Bye" . PHP_EOL;
        } else {
            echo "Good Bye $name" .PHP_EOL;
        }
    }
}
Trait SayHello 
{
    function Hello(?string $name): void
    {
        if (is_null($name)) {
            echo "Hello" . PHP_EOL;
        } else {
            echo "Hello $name" .PHP_EOL;
        }
    }
}
Trait HasName
{
    public string $name;
}
Trait canRun 
{
    abstract public function run(): void;
}
class ParentPerson
{
    function sayGoodBye(?string $name): void
    {
        echo "Good Bye in person" . PHP_EOL;
    }
    function sayHello(?string $name): void
    {
        echo "Hello in person" . PHP_EOL;
    }
}
class Person extends ParentPerson
{
    use SayHello, SayGoodBye, HasName, canRun {
        // acces level bisa di override
        // Hello as private;
        // GoodBye as private;
    }
    public function run(): void 
    {
        echo "Person $this->name is running" . PHP_EOL;
    }
    // function sayGoodBye(?string $name): void
    // {
    //     echo "Good Bye in person" . PHP_EOL;
    // }
    // function sayHello(?string $name): void
    // {
    //     echo "Hello in person" . PHP_EOL;
    // }
}