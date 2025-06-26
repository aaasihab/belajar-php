<?php
// constructor property promotion -> bisa membuat conctructor dengan properties sekaligus 
class PersonName
{
    public function __construct(public string $firstName,
                                public  string $middleName,
                                public string $lastName){
    }
}

$person = new PersonName("Abu", "Rizal", "Bakrie");


