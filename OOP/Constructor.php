<?php
class Orang {
    var string $name;
    var ?string $address = null;
    var string $country = 'Indonesia';
    
    // contructor->function yang pasti akan dipanggil saat object dibuat
    function __construct(string $name, ?string $address){
        $this->name = $name;
        $this->address = $address;
    }
}
$ubed = new Orang('Ubed',null);
var_dump($ubed);