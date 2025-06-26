<?php
// abstract class-> hanya bisa membuat object pada turunannya
abstract class Location 
{
    public string $name;
}
class City extends Location
{
}
class Province extends Location
{
}
class Country extends Location
{
}