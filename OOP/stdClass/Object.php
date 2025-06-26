<?php
// stdClass -> class kosong bawaan php
// digunanakan untuk mengonversi tipe data tertentu menjadi object atau sebaliknya
// misalnya tipe data array ke object

// array ke object
$array = [
    "FirstName" => "Abdul",
    "LastName" => "Jalil"
];

$object = (object) $array;
var_dump($object);

echo "First name  : " . $object->FirstName . PHP_EOL;
echo "Last name : " . $object->LastName . PHP_EOL;

// object ke array
$arrayLagi = (array) $object;
var_dump($arrayLagi);

require_once "Class.php";
use PersonStd\Person;

$person = new Person("Dani");
var_dump($person);

$arrayPerson = (array) $person;
var_dump($arrayPerson);
