<?php
require_once "Product.php";

$product1 = new Product("Apple", 15000);
echo "Product : ".$product1->getName() . PHP_EOL;
echo "Price : ".$product1->getPrice() . PHP_EOL;

// $product1->name = 'Orange'; //akan error
// $product1->price = 13000; //akan error
echo PHP_EOL;

$product_dummy = new ProductDummy("Banana", 10000);
$product_dummy->info();