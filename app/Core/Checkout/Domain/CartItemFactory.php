<?php

namespace App\Core\Checkout\Domain;

class CartItemFactory
{
    private ProductEntity $product;

    public function withCreateProduct(int $productId, string $productName): self
    {
        $this->product = new ProductEntity($productId, $productName);
        return $this;
    }

    public function create(int $id, int $quantity, int $price): CartItemEntity
    {
        return new CartItemEntity($id, $this->product, $quantity, $price);
    }
}
