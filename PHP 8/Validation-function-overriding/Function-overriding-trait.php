<?php

// validation function overriding trait
// akan error jika mencoba mengubah signature dari function yang kita override, seperti mengubah argument atau return value
trait SampleTrait
{
    public abstract function sample(string $name): string;
}

class SampleClass {
    use SampleTrait;

    public function sample(int $name): int
    {
        return $name;
    }
}

$sample = new SampleClass();
$sample->sample(33);

var_dump($sample->sample(33));