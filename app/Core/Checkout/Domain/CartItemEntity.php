<?php

namespace App\Core\Checkout\Domain;

class CartItemEntity
{
    public int $id;
    public ProductEntity $product;
    public int $quantity;
    public int $price;

    public function __construct(int $id, ProductEntity $product, int $quantity, int $price)
    {
        $this->id = $id;
        $this->product = $product;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function totalPrice(): int
    {
        return $this->price * $this->quantity;
    }
}
