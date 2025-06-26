<?php
require_once "Class.php";

use Data\TraitInherit\{Person};

$person = new Person();
$person->Hello("Joko");
$person->Goodbye("Adit");
$person->name = "Yuda";
$person->run();

var_dump($person);
