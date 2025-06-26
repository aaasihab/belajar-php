<?php
require_once "Class.php";

use dataParentKey\{Shape, Rectangle};

$shape = new Shape();
echo $shape->get_corner() . PHP_EOL;

$rectangle = new Rectangle();
echo $rectangle->get_corner() . PHP_EOL;
echo $rectangle->get_parent_corner() . PHP_EOL;