<?php

// stringable -> interface baru
// jika kita mengoverride magic function __toString, maka secara otomatis class kita akan implement interface stringable
function sayHello(Stringable $stringable): void
{
    echo "Hello {$stringable->__toString()}" . PHP_EOL;
}

class Person
{

    public function __toString(): string
    {
        return "Person";
    }

}

sayHello(new Person());