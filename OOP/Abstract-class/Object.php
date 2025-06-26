<?php
require_once "Class.php";

// $location = new Location(); error karena merupakan parent class
$city = new City();
$city->name = 'Probolinggo';
var_dump($city);

$province = new Province();
$province->name = 'Jawa Timur';
var_dump($province);

$country = new Country();
$country->name = 'Indonesia';
var_dump($country);