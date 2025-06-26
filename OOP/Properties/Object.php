<?php
include_once "Class.php";

$person = new person();
$person->name = 'Sumanto';
$person->address = 'Probolinggo';
$person->country = 'Indonesia';
// cara mengakses function
$person->say_hello("Budi");

var_dump($person_1);

// tidak boleh ada spasi antara objek dan key ($person_1->name)
echo("Name : $person->name\n");
echo("Address : $person->address\n");
echo("Country : $person->country\n");