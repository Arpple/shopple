<?php

namespace App\Core\Checkout\Domain;

class CartItemSummary
{
    public CartItemEntity $item;
    public ProductEntity $product;
    public int $price;

    public function __construct(CartItemEntity $item, int $price)
    {
        $this->item = $item;
        $this->product = $item->product;
        $this->price = $price;
    }

    public function totalPrice(): int
    {
        return $this->price * $this->item->quantity;
    }
}
