<?php

namespace App\Core\Checkout\Domain;

class CartItemEntity
{
    public int $productId;
    public string $productName;
    public int $quantity;
    public int $price;

    public function __construct(int $productId, string $productName, int $quantity, int $price)
    {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function totalPrice(): int
    {
        return $this->quantity * $this->price;
    }
}
