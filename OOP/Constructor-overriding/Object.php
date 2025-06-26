<?php
require_once "Class.php";

$manager = new Manager();
$manager->name = "Sihab";
$manager->say_hello("Rangga");

$vp = new VicePresident();
$vp->name = "Rangga";
$vp->say_hello("Sihab");