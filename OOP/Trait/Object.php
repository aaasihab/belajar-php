<?php
require_once "Class.php";

use Data\Traits\{Person};

$person = new Person();
$person->Hello("Joko");
$person->Goodbye("Adit");
$person->name = "Yuda";
var_dump($person);
$person->run();