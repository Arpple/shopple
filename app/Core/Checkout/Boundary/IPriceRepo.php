<?php

namespace App\Core\Checkout\Boundary;

interface IPriceRepo
{
    public function getProductPrice(int $productId): int;
}
