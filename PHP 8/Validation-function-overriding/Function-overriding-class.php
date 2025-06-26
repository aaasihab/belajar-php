<?php

// validation function overriding class
// akan error jika mencoba mengubah signature dari function yang kita override, seperti mengubah argument atau return value
class ParentClass
{
    public function method(string $name)
    {

    }
}

class ChildClass extends ParentClass {

    public function method(int $name)
    {

    }

}