<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Boundary\IPriceRepo;

class HundredTimesPriceRepo implements IPriceRepo
{
    public function getProductPrice(int $productId): int
    {
        return $productId * 100;
    }
}
