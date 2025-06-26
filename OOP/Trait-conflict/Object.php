<?php
// trait conflict--> jika menggunakan beberapa trait yang terdapat function yang sama dalam trait tersebut
// menggunakan kata kunci insteadof
Trait A
{
    public function doA()
    {
        echo "Do A pada trait A" . PHP_EOL;
    }
    public function doB()
    {
        echo "Do B pada trait A" . PHP_EOL;
    }
}
Trait B
{
    public function doA()
    {
        echo "Do a pada trait B" . PHP_EOL;
    }
    public function doB()
    {
        echo "Do b pada trait B" . PHP_EOL;
    }
}

class Sample
{
    use A, B {
        // pilih function doA pada trait A daripada trait B
        A::doA insteadof B;
        // pilih function doB pada trait B daripada trait A
        B::doB insteadof A;
    }
}

$sample = new Sample();
$sample->doA();
$sample->doB();