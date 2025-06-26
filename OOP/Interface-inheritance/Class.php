<?php
// interface-inheritance->sebuah interface implements ke interface lainnya
// boleh implements lebih dari satu interface
// menggunakan kata kunci extend bukan implements
namespace dataInterfaceInherit;

interface hasBrand
{
    function getBrand(): string;
}
interface isMantenance 
{
    function isMantenance(): bool;
}
interface Car extends hasBrand
{
    function drive(): void;
    function getTire(): int;
}
class Avanza implements car, isMantenance
{
    public function drive(): void
    {
        echo "drive avanza" . PHP_EOL;
    }
    public function getTire(): int
    {
        return 4;
    }
    public function  getBrand(): string 
    {
        return "toyota" . PHP_EOL;
    }
    function isMantenance(): bool
    {
        return false;
    }
}