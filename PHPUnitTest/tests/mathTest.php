<?php

namespace AhmadSihabillah\Test;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase {

    public function testManual(){
        // jika menggunakan manual, semua test akan terbaca 1 test saja
        self::assertEquals(6, Math::sum([1,2,1,2]));
        self::assertEquals(4, Math::sum([2,1,1]));
        self::assertEquals(10, Math::sum([4,4,2]));
        self::assertEquals(7, Math::sum([1,3,3]));
    }
    
    // data provider = mengkombinasiakan beberapa input data dalam satu unit test
    // format syntax : @dataProvider nama method yang mereturn data array
    /**
     * @dataProvider mathSumData
     */
    public function testDataProvider(array $values, int $expected){
        self::assertEquals($expected, Math::sum($values));
    }
    
    public function mathSumData(){
        // tipe datanya sesuaikan dengan parameter tesDataProvider
        return [
            [[2,1,1], 4],
            [[2,1,1], 4],
            [[4,4,2], 10],
            [[1,3,3], 7]
        ];
    }
    
    // testWith = alternatif dari data provider yang lebih simpel karena tidak harus membuat function baru
    // format syntax :
    /**
     * @testWith [[2,1,1], 4]
     *          [[2,1,1], 4]
     *          [[], 0]
     *          [[1,3,3], 7]
     */
    public function testWith(array $values, int $expected){
        self::assertEquals($expected, Math::sum($values));
    }
}