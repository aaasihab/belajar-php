<?php
require_once "Class.php";
require_once "Function.php";

// alias --> mengubah nama class untuk memudahkan penggunaan
// group use declaration --> menggabungkan beberapa class dalam satu use
use DataAlias\one\{Conflict as Conflict1, Dummy, Sample};
use DataAlias\two\Conflict as Conflict2;
use function helperAlias\helpMe as Help;
use const helperAlias\APPLICATION as Title;

$conflict1 = new Conflict1();
var_dump($conflict1);

$conflict2 = new Conflict2();
var_dump($conflict2);

$dummy = new Dummy();
var_dump($dummy);

$sample = new Sample();
var_dump($sample);

Help();
echo Title . PHP_EOL;
