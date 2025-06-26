<?php
require_once "Class.php";

$category = new Category();
$category->setName("");
$category->setExpensive(true);

echo "Nama : {$category->getName()}" . PHP_EOL;
echo "Expensive : {$category->isExpensive()}" . PHP_EOL;