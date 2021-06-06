<?php

namespace App\Core\Checkout\Domain;

class CartItemEntity
{
    public int $id;
    public ProductEntity $product;
    public int $quantity;

    public function __construct(int $id, ProductEntity $product, int $quantity)
    {
        $this->id = $id;
        $this->product = $product;
        $this->quantity = $quantity;
    }
}
