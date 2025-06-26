<?php

namespace AhmadSihabillah\Test;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase {

    // tes untuk skenario sukses
    public function testSucces(){
        $person = new Person('Budi');
        self::assertEquals('Hello Angga, my name is Budi', $person->sayHello('Angga'));
    }
    
    // tes untuk skenario gagal / error 
    // format syntax : expectException(nama class exception)
    public function testException(){
        $person = new Person('Budi');
        self::expectException(\Exception::class);
        $person->sayHello(null);
    }
    
    // tes output untuk function yang tidak mereturn value (void)
    // format syntax : expectOutputString(output ekspektasi)
    public function testGoodbyeSucces(){
        $person = new Person('Angga');
        self::expectOutputString('Good bye Budi' . PHP_EOL);
        $person->sayGoodBye('Budi');
    }
    
}