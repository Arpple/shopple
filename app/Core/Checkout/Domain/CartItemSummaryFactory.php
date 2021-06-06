<?php

namespace App\Core\Checkout\Domain;

class CartItemSummaryFactory
{
    private CartItemEntity $item;
    private int $price;

    public function withCreateItem(int $itemId, ProductEntity $product, int $quantity): self
    {
        $this->item = new CartItemEntity($itemId, $product, $quantity);
        return $this;
    }

    public function withCreateProduct(int $productId, string $productName): self
    {
        $this->product = new ProductEntity($productId, $productName);
        return $this;
    }

    public function withPrice(int $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function create(): CartItemSummary
    {
        return new CartItemSummary($this->item, $this->price);
    }
}
