<?php
// static keyword -> digunakan untuk membuat properties dan function bisa diakses secara langsung tanpa instanisasi class
class MathHelper
{
    static public $name = "MathHelper";
    static public function sum(int ...$numbers): int{
        $total = 0;
        foreach ($numbers as $number){
            $total += $number;
        }
        return $total;
    }
}
echo MathHelper::$name . PHP_EOL;

// mengubah properties 
MathHelper::$name = "Ahmad Sihabillah";
echo "Nama : " . MathHelper::$name . PHP_EOL;

$result = MathHelper::sum(10,10,10);
echo "Total : " . $result . PHP_EOL;