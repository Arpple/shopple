<?php

namespace App\Core\Checkout\Domain;

class CartItemEntity
{
    public int $productId;
    public int $quantity;
    public int $price;

    public function __construct(int $productId, int $quantity, int $price)
    {
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function totalPrice(): int
    {
        return $this->quantity * $this->price;
    }
}
