<?php

// polymorphisme->kemampuan object berubah menjadi bentuk lain
class Programmer 
{
    public string $name;
    public function __construct(string $name) 
    {
        $this->name = $name;
    }
}
class FrontEndProgrammer extends Programmer 
{
}
class BackEndProgrammer extends Programmer 
{
    public function setName(string $newName)
    {
        $this->name = $newName;
    }
}

class Company
{
    public Programmer $programmer;

}
// function argument polymorphisme
// instanceof->untuk mengecek asal object dari variabel tersebut
function sayHelloProgrammer(Programmer $programmer)
{
    if ($programmer instanceof BackEndProgrammer){
        echo "Hello Back End Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof FrontEndProgrammer){
    echo "Hello Front End Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof Programmer){
        echo "Hello Programmer $programmer->name" . PHP_EOL;
    }
}