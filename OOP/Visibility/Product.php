<?php
// visibility atau acces modifier
// acces class : public, protect, private,
// public --> bisa diakses di dalam class, subclass, dan di luar class
// protected --> bisa diakses di dalam class dan subclass
// private --> hanya bisa diakses di dalam class
class Product
{
    protected string $name;
    private int $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

class ProductDummy extends Product
{
    public function info()
    {
        echo "Product : ".$this->name;
        // echo $this->price; //akan error
    }
}