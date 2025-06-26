<?php

namespace AhmadSihabillah\Test;

use PHPUnit\Framework\TestCase;

class ProductServiceMockTest extends TestCase {
    private ProductRepository $repository;
    private ProductService $service;

    public function setUp(): void {
        // mock = improvement dari stub dengan fitur tambahan untuk membatasi jumlah function yang boleh dipanggil dari stub
        $this->repository = $this->createMock(ProductRepository::class);
        $this->service = new ProductService($this->repository);
    }

    public function testMock(){
        $product = new Product();
        $product->setId("1");

        // syntax : sama seperti stub tetapi ditambah expec(invocation rule) -> jumlah kemunculan funct yang ingin dibatasi
        // bisa di cek di video
        // boleh menggunakan self atau $this
        $this->repository->expects(self::once())
            ->method("findById")->willReturn($product);

        $result = $this->repository->findById("1");
        // akan gagal jika terdapat lebih dari 1 function stub
        // $result = $this->repository->findById("1");

        self::assertSame($product, $result);
    }

    public function testDeleteSuccess(){
        $product = new Product();
        $product->setId("1");

        // membatasi function stub dengan minimal satu kali pemanggilan
        // tes akan gagal jika tidak ataupun terdapat lebih dari satu function yang akan dipanggil
        // $this->repository->expects(self::once())
        //     ->method("delete");
        // $this->repository->method("findById")->willReturn($product);
        
        // penggunaan mock dan stub akan tetap berhasil meskipun data pada parameternya tidak sesuai
        // untuk mengatasi hal tersebut, mock juga bisa menkonfigurasi tipe data parameter sesuai dengan parameter class aslinya 
        // syntax : hanya menambahkan ->with(self::equalTo(data));
        // ada beberapa cara untuk konfigurasi parameter selain dengan equalTo, bisa di cek di google
        $this->repository->expects(self::once())
            ->method("delete")
            ->with(self::equalTo($product));

        $this->repository->expects(self::once())
            ->method("findById")
            ->with(self::equalTo($product->getId()))
            ->willReturn($product);

        $this->service->delete('1');
        self::assertTrue(true, "Success delete");
    }
    
    public function testDeleteFailed(){
        $this->expectException(\Exception::class);

        // function delete tidak pernah dipanggil
        $this->repository->expects(self::never())
            ->method('delete');

        $this->repository->method("findById")
            ->with(self::equalTo("1"))
            ->willReturn(null);
        
        $this->service->delete('1');
    }

}


?>