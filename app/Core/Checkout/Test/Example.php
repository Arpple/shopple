<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Domain\CartItemEntity;
use App\Core\Checkout\Domain\CartItemSummary;
use App\Core\Checkout\Domain\CartItemSummaryFactory;
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
        return new CartItemEntity(1, self::productA(), 1);
    }

    public static function itemB(): CartItemEntity
    {
        return new CartItemEntity(2, self::productB(), 2);
    }

    public static function itemSummaryA(): CartItemSummary
    {
        return (new CartItemSummaryFactory)
            ->withCreateItem(1, self::productA(), 1)
            ->withPrice(100)
            ->create();
    }

    public static function itemSummaryB(): CartItemSummary
    {
        return (new CartItemSummaryFactory)
            ->withCreateItem(2, self::productB(), 2)
            ->withPrice(200)
            ->create();
    }
}
