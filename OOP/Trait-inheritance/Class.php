<?php
// trait inheritance --> menggunkaan trait lain pada trait
namespace Data\TraitInherit;
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
Trait all
{
    use SayHello, SayGoodBye, HasName, canRun;
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
    use all;
    public function run(): void 
    {
        echo "Person $this->name is running" . PHP_EOL;
    }
}