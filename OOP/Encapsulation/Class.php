<?php
// getter->untuk memanggil propertis dalam class secara private
// setter->untuk mengubah propertis dalam class
// trim() -> function untuk mengecek apakah data merupakan string kosong
class Category 
{
    private string $name;
    private bool $expensive;

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        if (trim($name) != ""){
            $this->name = $name;
        }
    }
 
    // untuk tipe data boolean
    public function isExpensive(): bool
    {
        return $this->expensive;
    }
    public function setExpensive(bool $expensive): void
    {
        $this->expensive = $expensive;
    }
}