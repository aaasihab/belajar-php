<?php

namespace AhmadSihabillah\Test;

Interface ProductRepository {
    function save(Product $product): Product;
    function delete(?Product $product): void;
    function findById(string $id): ?Product;
    function findAll(): Array;
}
?>