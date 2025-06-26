<?php
// inheritance(class parent akan mewarisi semua properties dan function terhadap class child)
// class child hanya bisa punya satu class parent 
// class parent bisa punya banyak class child
// menggukana key --> extends

# class parents
class Manager {
    var string $name;
    public function __construct(protected int $nim) 
    {
    }

    // void -> digunakan untuk memberitahu jika function tidak mengembalikan value 
    function say_hello(string $name):void {
        echo("Hai $name, my name is $this->name($this->nim)".PHP_EOL);
    }
}

# class child
class ViceManager extends Manager {

}
$budi = new Manager(11111);
$budi->name = 'Budi';
$budi->say_hello('Eko');

$eko = new ViceManager(22222);
$eko->name = 'Eko';
$eko->say_hello('Budi');