<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Boundary\ICartItemRepo;
use App\Core\Checkout\Domain\CartItemEntity;
use App\Core\Checkout\Domain\ProductEntity;
use Exception;
use Illuminate\Support\Collection;

class SingleUserCartItemRepo implements ICartItemRepo
{
    private int $userId;
    private array $items = [];

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function getUserItems(int $userId): Collection
    {
        $this->assertUser($userId);
        return collect($this->items);
    }

    public function save(int $userId, int $productId, int $quantity): void
    {
        $this->assertUser($userId);
        $product = new ProductEntity($productId, "Product {$productId}");
        $this->items[$productId] = new CartItemEntity($userId, $product, $quantity);
    }

    public function destroy(int $userId, int $productId): void
    {
        $this->assertUser($userId);
        unset($this->items[$productId]);
    }

    public function addItem(CartItemEntity $item): self
    {
        $this->items[] = $item;
        return $this;
    }

    private function assertUser(int $userId)
    {
        if ($this->userId != $userId) {
            throw new Exception('user id not match');
        }
    }
}
