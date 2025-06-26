<?php
// parent::->digunakan untuk mengakses function pada class parent
namespace dataParentKey;
class Shape
{
    public function get_corner(): int
    {
        return 4;
    }
}

class Rectangle extends Shape
{
    public function get_corner(): int
    {
        return 1;
    }
    public function get_parent_corner(): int
    {
        return parent::get_corner();
    }
}