<?php

namespace AhmadSihabillah\Test;

// penamaan class harus diakhiri dengan Test
// penamaan function harus diawali dengan test

// panggil framework PHPUnit
use PHPUnit\Framework\TestCase;

// harus extends TestCase
class CounterTest extends TestCase {

    public function testCounter(): void{
        $counter = new Counter();
        
        // assertEquals = output ekspektasi
        // bisa menggunakan $this atau self
        $counter->increment();
        $this->assertEquals(1, $counter->getCounter());
        
        $counter->increment();
        self::assertEquals(2, $counter->getCounter());
    }

    // jika menggunakan annotation test maka method tidak perlu menggunakan nama test
    /**
     * @test
     */
    public function increment(): void{
        $counter = new Counter();
        
        // assertEquals = output ekspektas
        // assertion lebih lanjut bisa di cek di web : https://docs.phpunit.de/en/9.6/assertions.html
        $counter->increment();
        $this->assertEquals(1, $counter->getCounter());
        
        $counter->increment();
        self::assertEquals(2, $counter->getCounter());
    }
  
    public function testFirst(): Counter{
        $counter = new Counter();
        
        $counter->increment();
        $this->assertEquals(1, $counter->getCounter());        
        return $counter;
    }

    // test dependency = membuat unit test yang bergantung pada hasil method sebelumnya
    // format syntax : @depends nama method
    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter): void{
        $counter->increment();
        $this->assertEquals(2, $counter->getCounter());        
    }

}

// cara running semua method unit test : vendor/bin/phpunit folderName/fileName.php
// vendor/bin/phpunit tests/counterTest.php

// cara running method tertentu unit test : vendor/bin/phpunit --filter "className::functionName" folderName/fileName.php
// vendor/bin/phpunit --filter "counterTest::testOther" tests/counterTest.php

?>