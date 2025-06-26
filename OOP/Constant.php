<?php
class Person {
    const AUTHOR = 'Sihab';
    var string $name;
    var ? string $address = null;
    var string $country = 'Indonesia';
}
$person = new Person();
// cara mengakses constant (nama class::nama constant)
echo("AUTHOR : ".$person::AUTHOR);