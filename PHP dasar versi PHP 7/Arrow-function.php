<?php
// alternatif anonymous function yang lebih sederhana
$first_name = "Ahmad";
$last_name = "Rizal";

$say_hello = fn () => "hello $first_name $last_name";
echo($say_hello());

