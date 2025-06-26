<?php

namespace AhmadSihabillah\Test;

use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase {
    private ProductRepository $repository;
    private ProductService $service;

    public function setUp(): void {
        // stubbing = membuat object dummy untuk class yang dibutuhkan class lain
        $this->repository = $this->createStub(ProductRepository::class);
        $this->service = new ProductService($this->repository);
    }

    public function testStub(){
        $product = new Product();
        $product->setId("1");

        // untuk menkonfigurasi return value yang diinginkan, karena secara default return value stub = null
        $this->repository->method("findById")->willReturn($product);

        $result = $this->repository->findById("1");
        // untuk mengecek apakah return value sama dengan yang ada di class
        self::assertSame($product, $result);
        
    }

    public function testStubMap()
    {
        $product1 = new Product();
        $product1->setId("1");

        $product2 = new Product();
        $product2->setId("2");

        // stubMap = mengecek return value dari beberapa object
        $map = [
            ["1", $product1],
            ["2", $product2],
        ];

        $this->repository->method("findById")->willReturnMap($map);

        self::assertSame($product1, $this->repository->findById("1"));
        self::assertSame($product2, $this->repository->findById("2"));
    }

    // konsepnya sama seperti stubmap tetapi dengan kode yang lebih efisien
    public function testStubCallback()
    {
        $this->repository->method("findById")
            ->willReturnCallback(function (string $id) {
                $product = new Product();
                $product->setId($id);
                return $product;
            });

        self::assertEquals("1", $this->repository->findById("1")->getId());
        self::assertEquals("2", $this->repository->findById("2")->getId());
        self::assertEquals("3", $this->repository->findById("3")->getId());
    }

    // skenario tes sukses
    public function testRegisterSuccess()
    {
        // konfigurasi return value dari stub 
        // return valuenya null karena jika sukses, function aslinya akan mereturn null 
        $this->repository->method("findById")->willReturn(null);

        // menggunakan willReturnArgument karena return valuenya sama dengan parameter di function aslinya, 
        $this->repository->method("save")->willReturnArgument(0); // (0) ->sesuaikan dengan index 

        // data product di bawah merupakan data / output ekspektasi
        $product = new Product();
        $product->setId("1");
        $product->setName("Contoh");
        
        // pengujian function yang ada di class service
        $result = $this->service->register($product);
        //  unit testnya :
        self::assertEquals($product->getId(), $result->getId());
        self::assertEquals($product->getName(), $result->getName());
    }

    // skenario tes gagal
    public function testRegisterException()
    {
        // unit tes untuk exception / gagal
        $this->expectException(\Exception::class);

        $productInDB = new Product();
        $productInDB->setId("1");

        // konfigurasi return value untuk stub pada kondisi gagal
        $this->repository->method("findById")->willReturn($productInDB);

        $product = new Product();
        $product->setId("1");

        // pengujian function
        $this->service->register($product);
    }

    public function testDeleteSuccess(){
        $product = new Product();
        $product->setId("1");

        $this->repository->method("findById")->willReturn($product);

        $this->service->delete('1');
        self::assertTrue(true, "Success delete");
    }
    
    public function testDeleteFailed(){
        // untuk expecException bebas diletakkan di mana saja
        $this->expectException(\Exception::class);
        $this->repository->method("findById")->willReturn(null);
        
        $this->service->delete('1');
    }

}


?>