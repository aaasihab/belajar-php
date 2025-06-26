<?php
// Trait->mirip seperti abstract tetapi bisa membuat abstract function dan konkrit function
// bisa membuat properties
// bisa digunakan berkali kali
// untuk menggunakan trait di dalam class, menggunakan kata kunci use
// Trait merupakan tempat menyimpan function
namespace Data\Traits;
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
// trait abstract function
// harus di deklarasikan di class
Trait canRun 
{
    abstract public function run(): void;
}
class Person 
{
    use SayHello, SayGoodBye, HasName, canRun;
    public function run(): void 
    {
        echo "Person $this->name is running" . PHP_EOL;
    }
}