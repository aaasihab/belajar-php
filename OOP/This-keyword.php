<?php
class Person {
    var string $name;
    var ? string $address = null;
    var string $country = 'Indonesia';
    function say_hello(?string $name){
        // (This->argumen) --> untuk mengakses properties pada objek class
        if (is_null($name)){
            echo("Hai, my name is $this->name\n");
        } else {
            echo("Hello $name, my name is $this->name\n");
        }
            
    }
}
$angga = new Person();
$angga->name = 'Angga';
$angga->say_hello(null);


$budi = new Person();
$budi->name = 'Budi';
$budi->say_hello('Sihab');



