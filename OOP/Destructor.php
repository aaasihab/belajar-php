<?php
class Orang {
    var string $name;
    var ? string $address = null;
    var string $country = 'Indonesia';
    
    function __construct(string $name, ?string $address){
        $this->name = $name;
        $this->address = $address;
    }
    // destructor --> function yang akan dipanggil saat object dihapus dari memory
    function __destruct(){
        echo("Object orang $this->name is destroyed".PHP_EOL);    
    }
}
$ubed = new Orang('Ubed','Kraksaan');
$Iqbal = new Orang('Iqbal','Pajarakan');
var_dump($ubed);