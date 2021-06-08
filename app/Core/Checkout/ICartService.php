<?php

namespace App\Core\Checkout;

use App\Core\Checkout\Entity\CartEntity;

interface ICartService
{
    public function get(): CartEntity;
    public function setProductItem(int $productId, int $quantity): self;
}
