<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Boundary\ICartItemRepo;
use App\Core\Checkout\Domain\CartItemEntity;
use Illuminate\Support\Collection;

class SingleUserCartItemRepo implements ICartItemRepo
{
    private Collection $items;

    public function getUserItems(int $userId): Collection
    {
        return $this->items;
    }

    public function addItem(CartItemEntity $item): self
    {
        $this->items->add($item);
        return $this;
    }
}
