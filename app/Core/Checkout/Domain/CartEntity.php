<?php

namespace App\Core\Checkout\Domain;

class CartEntity
{
    public array $items = [];

    public function addItem(CartItemEntity $item): self
    {
        $this->items[] = $item;
        $this->totalPrice = $this->calculateTotalPrice();
    }

    private function calculateTotal
}
