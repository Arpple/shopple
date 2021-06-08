<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Boundary\ICartItemRepo;
use App\Core\Checkout\Entity\CartItemEntity;
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
        $this->items[$productId] = new CartItemEntity(
            $productId, "Product {$productId}",
            $quantity, $productId * 100
        );
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
