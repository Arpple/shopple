<?php

namespace App\Core\Checkout\Domain;

class CartEntity
{
    public array $items = [];

    public function addItem(CartItemSummary $item): self
    {
        $this->items[] = $item;
        return $this;
    }

    public function totalPrice(): int
    {
        return array_reduce($this->items,
            fn (int $total, CartItemSummary $item) => $total + $item->totalPrice(),
            0
        );
    }
}
