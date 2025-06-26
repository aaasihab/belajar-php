<?php
class Person {
    const AUTHOR = 'Sihab';
    function info(){
        // digunakan jika ingin mengakses constant di dalam class
        echo("Author : ".self::AUTHOR.PHP_EOL);
    }
}
$person = new Person();
$person->info();