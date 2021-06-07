<?php

namespace App\Core\Checkout\Domain;

class CartEntity
{
    private array $items = [];

    public function items(): array
    {
        return $this->items;
    }

    public function addItem(CartItemEntity $item): self
    {
        $this->items[] = $item;
        return $this;
    }

    public function totalPrice(): int
    {
        return array_reduce($this->items,
            fn (int $total, CartItemEntity $item) => $total + $item->totalPrice(),
            0
        );
    }
}
