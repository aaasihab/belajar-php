<?php
// interface->mirip seperti abstract tetapi semua method otomatis abstrack
// class child bisa implements lebih dari satu interface
// tidak boleh memiliki properties kecuali constant
namespace dataInterface;
interface Car
{
    function drive(): void;
    function getTire(): int;
}
class Avanza implements car
{
    public function drive(): void
    {
        echo "drive avanza" . PHP_EOL;
    }
    public function getTire(): int
    {
        return 4;
    }
}