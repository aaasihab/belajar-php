<?php
// anonymous class->class tanpa nama
// bisa membuat class dan object sekaligus

#class biasa
// interface HelloWord
// {
//     function sayHello(): void;
// }

// class Hello implements HelloWord
// {
//     public string $name;
//     public function __construct(string $name){
//         $this->name = $name;
//     }
//     public function sayHello(): void{
//         echo "Hello $this->name" . PHP_EOL;
//     }
// }
// $helloWord = new Hello("Budi");
// $helloWord->sayHello();

#anonymous class
interface HelloWord
{
    function sayHello(): void;
}
$helloWord = new class("Budi") implements HelloWord
    {
        public string $name;
        public function __construct(string $name){
            $this->name = $name;
        }
        public function sayHello(): void{
        echo "Hello $this->name" . PHP_EOL;
        }
    };
$helloWord->sayHello();