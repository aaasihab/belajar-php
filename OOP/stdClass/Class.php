<?php
namespace PersonStd;
class Person
{
    public string $name;
    public function __construct(string $name){
        $this->name = $name;
    }
}