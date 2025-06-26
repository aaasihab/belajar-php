<?php

// sekarang throw merupakan expression
// statement -> tidak memiliki value;
// expression -> memiliki value;
function sayHello(?string $name)
{

    if ($name == null) {
        throw new Exception("Tidak boleh null");
    }

    echo "Hello $name" . PHP_EOL;

}

function sayHelloExpression(?string $name)
{
    $result = $name != null ? "Hello $name" : throw new Exception;
    echo $result . PHP_EOL;
}

sayHelloExpression("Eko");

try {
    sayHelloExpression(null);
} catch (Exception){
    echo 'Tidak boleh null';
}