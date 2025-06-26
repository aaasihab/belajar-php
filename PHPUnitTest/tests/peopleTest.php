<?php

namespace AhmadSihabillah\Test;

use PHPUnit\Framework\TestCase;

class PeopleTest extends TestCase {

    private People $people;
    // fixture = menyingkat kode yang dibuat berulang ulang dengan sebuah function
    // cara kerja : setiap function yang dijalankan, akan memanggil setUp() terlebih dahulu
    // synyax = setUp(): void {membuat objek dari class}
    public function setUp(): void {
        // $this->people = new People('Budi');
    }

    // @before = alternatif lain dari fixture (boleh digunakan bersama fixture)
    /**
     * @before
     */
    public function createPeople(): void{
        $this->people = new People('Budi');
    }

    public function testSucces(){
        self::assertEquals('Hello Angga, my name is Budi', $this->people->sayHello('Angga'));
    }
    
    public function testException(){
        self::expectException(\Exception::class);
        $this->people->sayHello(null);
    }
    
    public function testGoodbyeSucces(){
        self::expectOutputString('Good bye Angga');
        $this->people->sayGoodBye('Angga');
    }

    // tearDown() = function yang akan dipanggil setelah semua unit test dieksekusi
    public function tearDown(): void{
        // echo "Tear Down\n";
    }

    
}