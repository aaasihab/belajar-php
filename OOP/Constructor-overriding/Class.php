<?php

// Constructor overriding-->mendeklarasikan ulang dengan mengubah argumen pada class child
class Manager 
{
    var string $name;
    var string $title;
    public function __construct(string $name = "", string $title = "Manager")
    {
        $this->name = $name;
        $this->title = $title;
    }
    public function say_hello(string $name): void
    {
        echo "Hi $name, my name is {$this->title} {$this->name}" . PHP_EOL;
    }
}

class VicePresident extends Manager 
{
    // tidak wajib, tapi direkomendasikan menulis ulang constructor parent
    public function __construct(string $name = "")
    {
        parent::__construct($name, "VP");
    }
    public function say_hello(string $name): void
    {
        echo "Hello $name, my name is {$this->title} {$this->name}" . PHP_EOL;
    }
}