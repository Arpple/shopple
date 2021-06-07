<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Domain\CartItemEntity;

class Example
{
    public static function itemA(): CartItemEntity
    {
        return new CartItemEntity(1, 'A', 1, 100);
    }

    public static function itemB(): CartItemEntity
    {
        return new CartItemEntity(2, 'B', 2, 200);
    }
}
