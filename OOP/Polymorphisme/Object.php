<?php
require_once "Class.php";

$company = new Company();
$company->programmer = new Programmer("Abu");
var_dump($company);
$company->programmer = new FrontEndProgrammer("Abu"); 
var_dump($company);
$company->programmer = new BackEndProgrammer("Abu");
$company->programmer->setName('ahmad');
var_dump($company);

sayHelloProgrammer(new Programmer("Abu"));
sayHelloProgrammer(new FrontEndProgrammer("Galih"));
sayHelloProgrammer(new BackEndProgrammer("Jarwo"));