<?php
require_once "Class.php";

use Data\TraitOverride\{Person};

$person = new Person();
$person->Hello("Joko");
$person->Goodbye("Adit");
$person->name = "Yuda";
var_dump($person);
$person->run();

// akan error