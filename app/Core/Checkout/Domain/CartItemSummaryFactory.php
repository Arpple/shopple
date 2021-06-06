<?php

namespace App\Core\Checkout\Domain;

class CartItemSummaryFactory
{
    private CartItemEntity $item;
    private ProductEntity $product;
    private int $price;

    public function withCreateItem(int $itemId, int $quantity): self
    {
        $this->item = new CartItemEntity($itemId, $quantity);
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
        return new CartItemSummary($this->item, $this->product, $this->price);
    }
}
