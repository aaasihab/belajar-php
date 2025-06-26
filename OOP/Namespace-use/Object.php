<?php
require_once "Class.php";
require_once "Function.php";

use Data\one\Conflict;
use function Data\two\say_goodbye;
Use function helper\helpMe;
use const helper\APPLICATION;

echo("FUNCTION PERTAMA : ".PHP_EOL);
$conflict1 = new Conflict();
$conflict1->name = 'sihab';
echo("Hello $conflict1->name".PHP_EOL);

echo(PHP_EOL."FUNCTION KEDUA : ".PHP_EOL);
$conflict2 = new Data\two\Conflict(); //atau menggunakan (use)
$conflict2->name = 'sihab';
$conflict2->address = 'probolinggo';
echo("Nama : $conflict2->name".PHP_EOL);
echo("Alamat : $conflict2->address".PHP_EOL);

say_goodbye();

helpMe();
echo APPLICATION.PHP_EOL;
