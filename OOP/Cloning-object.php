<?php

// cloning object -> menduplikat object
// semua properties di object awal disalin ke object baru
namespace StudentObject;
class Student
{
    public string $id;
    public string $name;
    public int $value;
    private string $sample;

    public function setSample(string $sample){
        $this->sample = $sample;
    }
}

$student1 = new Student();
$student1->id = "1";
$student1->name = "Putri";
$student1->value = 100;
$student1->setSample("xxx");
var_dump($student1);

$student2 = clone $student1;
var_dump($student2);

// cara manual clone
// $student3 = new Student();
// $student3->id = $student1->id;
// $student3->name = $student1->name;
// $student3->value = $student1->value;
// var_dump($student3);