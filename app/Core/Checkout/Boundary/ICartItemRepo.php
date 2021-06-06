<?php

namespace App\Core\Checkout\Boundary;

use Illuminate\Support\Collection;

interface ICartItemRepo
{
    public function getUserItems(int $userId): Collection;
}
