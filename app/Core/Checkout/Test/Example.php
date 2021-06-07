<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Domain\CartItemEntity;
use App\Core\Checkout\Domain\ProductEntity;

class Example
{
    public static function productA(int $id = 1): ProductEntity
    {
        return new ProductEntity($id, 'A');
    }

    public static function productB(int $id = 2): ProductEntity
    {
        return new ProductEntity($id, 'B');
    }

    public static function itemA(): CartItemEntity
    {
        return new CartItemEntity(1, 1, 100);
    }

    public static function itemB(): CartItemEntity
    {
        return new CartItemEntity(2, 2, 200);
    }
}
