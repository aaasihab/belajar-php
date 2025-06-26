<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

// faker -> library untuk data dummy 
$faker = Faker\Factory::create();
// generate data by calling methods
echo $faker->name();
echo "\n";
// 'Vince Sporer'
// echo $faker->email();
echo "\n";
// 'walter.sophia@hotmail.com'
// 'Numquam ut mollitia at consequuntur inventore dolorem.'
?>