<?php

namespace AhmadSihabillah\Test;

class Product {
    private string $id, $name, $description;
    private int $price, $quantity;

    public function setId(string $id): void {
        $this->id = $id;
    }

    public function getId(): string {
        return $this->id;
    }
    
    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setPrice(int $price): void {
        $this->price = $price;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }


}
?>