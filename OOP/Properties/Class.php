<?php
// membuat properties --> dengan kode (var))
// class Person {
//     var $name;
//     var $address;
//     var $country;
// }

# membuat properties dengan type declaration
class Person {
    var string $name;
    var ?string $address = null; //nullable properties(?) --> boleh null boleh tidak
    var string $country = 'Indonesia'; //Properties default values

    // function pada
    function say_hello(string $name){
        echo("hello $name\n");
    }
}