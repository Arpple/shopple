<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Boundary\ICartItemRepo;
use App\Core\Checkout\Domain\CartItemEntity;
use App\Core\Checkout\Domain\ProductEntity;
use Illuminate\Support\Collection;

class SingleUserCartItemRepo implements ICartItemRepo
{
    private array $items = [];

    public function getUserItems(int $userId): Collection
    {
        return collect($this->items);
    }

    public function save(int $userId, int $productId, int $quantity): void
    {
        $product = new ProductEntity($productId, "Product {$productId}");
        $this->items[$productId] = new CartItemEntity($userId, $product, $quantity);
    }

    public function addItem(CartItemEntity $item): self
    {
        $this->items[] = $item;
        return $this;
    }
}
