<?php

namespace AhmadSihabillah\Test;

use PHPUnit\Framework\TestCase;

class CounterStaticTest extends TestCase {


    // sharing fixture = membuat objek statik yang bisa menyimpan hasi dari function sebelumnya
    public static Counter $counter;

    public static function setUpBeforeClass(): void{
        self::$counter = new Counter();
    }

    public function testFirst(): Counter{
        self::$counter->increment();
        self::assertEquals(1, self::$counter->getCounter());        
        return self::$counter;
    }

    public function testSecond(): void{
        self::$counter->increment();
        // hasilnya = 2 karena objek sudah di increment satu kali pada function sebelumnya
        self::assertEquals(2, self::$counter->getCounter());        
    }

    // skip test = function tidak akan dieksekusi, melainkan akan di lompati
    public function testThird(): void{
        self::markTestSkipped("Masih ada error yang bingung");
        self::$counter->increment();
        self::assertEquals(3, self::$counter->getCounter());        
    }

    public function testIncrement(): Counter{
        self::$counter->increment();
        self::assertEquals(3, self::$counter->getCounter());        
        // incomplete test = menandai function yang testnya belum selesai, tetapi code yang dibawahnya tidak akan dieksekusi
        self::markTestIncomplete("Test belum selesai");
    }

    // skip test berdasarkan kondisi -> ada beberapa kondisi bisa di cek di google
    /**
     * @requires OSFAMILY Darwin
     */
    public function testOnlyMac(){
        self::assertTrue(true, "Test hanya bisa di Linux");
    }
}


?>