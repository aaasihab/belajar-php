<?php
// comparing object -> membandingkan dua buah object
// menggunakan operator equals(==) dan identity(===)
// equals -> membandingkan semua properties pada kedua object
// identity -> membandingkan apakah object identik/ merupakan object yang sama

require_once "Cloning-object.php";

use StudentObject\Student;


$student1 = new Student();
$student1->id = "5";
$student1->name = "Putra";
$student1->value = 100;
$student1->setSample("xx");

$student2 = clone $student1;
var_dump($student1 == $student2);
var_dump($student1 === $student2);
var_dump($student1 === $student1);