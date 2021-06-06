<?php

namespace App\Core\Checkout\Boundary;

use Illuminate\Support\Collection;

interface ICartItemRepo
{
    public function getUserItems(int $userId): Collection;
    public function save(int $userId, int $productId, int $quantity): void;
}
