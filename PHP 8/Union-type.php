<?php

// union type -> bisa menggunakan lebih dari satu tipe data

// property union type
class Example
{
    public string|int|bool|array $data;
}
$example = new Example();
$example->data = "sihab";
// $example->$data = 20;
// $example->$data = true;
// $example->$data = [];

// argument union type dan return value union type
function sampleFunction(string|array $data1): string|array
{
    if (is_array($data1)){
        return ["array"];
    } else if (is_string($data1)){
        return "string";
    } else {
        "tipe data salah";
        return false;
    } 

}

var_dump(sampleFunction("sihab"));
var_dump(sampleFunction(["ahmad"]));