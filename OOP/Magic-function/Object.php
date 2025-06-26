<?php
require_once "Class.php";

use MagicFunction\Student;


$student = new Student();
$student->id = "5";
$student->name = "Putra";
$student->value = 100;
$student->setSample("xx");

// jika magic function dihapus akan error
echo $student .PHP_EOL;
// atau
$string = (string) $student;
echo $string .PHP_EOL;

$student("1", "Fadil", true, "Rudi", "kosong");
var_dump($student);