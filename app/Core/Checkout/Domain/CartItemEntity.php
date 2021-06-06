<?php

namespace App\Core\Checkout\Domain;

class CartItemEntity
{
    public int $id;
    public int $quantity;

    public function __construct(int $id, int $quantity)
    {
        $this->id = $id;
        $this->quantity = $quantity;
    }
}
