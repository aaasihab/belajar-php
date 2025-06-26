<?php
// magic function -> function function yang kegunaanya sudah ditentukan oleh php
// contohnya :
// - __construct() sebagai constructor
// - __destruct() sebagai destructor
// - __clone() sebagai object cloning
// - dsb, bisa dilihat di website resmi php

namespace MagicFunction;

class Student
{
    public string $id;
    public string $name;
    public int $value;
    private string $sample;

    public function setSample(string $sample){
        $this->sample = $sample;
    }

    // __toString -> digunakan untuk merepresentasikan string sebuah object
    public function __toString(): string
    {
        return "Id : $this->id, Name : $this->name, Value : $this->value";
    }
    // __invoke -> function yang akan dieksekusi ketika object yang kita buat dianggap sebagai function
    public function __invoke(...$arguments): void 
    {
        $join = join(",", $arguments);
        echo "invoke students with argumen $join" . PHP_EOL;
    }
    // __debugInfo() -> function yang mengoverride var_dump dan bisa diubah ubah
    public function __debugInfo(): array
    {
        return [
            "Id" => $this->id,
            "Name" => $this->name,
            "Value" => $this->value,
            "Sample" => $this->sample,
            "Author" => "Sihab",
            "APP" => "1.0.0"
        ];
    }
}