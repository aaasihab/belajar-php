<?php
// overloading -> kemampuan secara dinamis membuat proprties dan yang belum ada pada class
// magic function yang digunakan pada properties overloading : __get(properties, argument), __set(), __isset(), __unset()
// magic function yang digunakan pada function overloading __call(function, argument) dan __callStatic()untuk function static

class Zero 
{
    private array $properties = [];

    public function __get(string $name)
    {
        return $this->properties[$name];
    }
    public function __set(string $name, $value)
    {
        return $this->properties[$name] = $value;
    }
    public function __isset($name): bool
    {
        return isset($this->properties[$name]);
    }
    public function __unset($name)
    {
        unset($this->properties[$name]);
    }
    public function __call($name, $arguments)
    {
        $join = join(",", $arguments);
        echo "call function $name with argument $join" . PHP_EOL;
    }
    static public function __callStatic($name, $arguments)
    {
        $join = join(",", $arguments);
        echo "call static function $name with argument $join" . PHP_EOL;
    }
}

