<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Domain\CartItemSummary;
use App\Core\Checkout\Domain\CartItemSummaryFactory;

class ExampleCartItem
{
    public static function itemA(): CartItemSummary
    {
        return (new CartItemSummaryFactory)
            ->withCreateItem(1, 1)
            ->withCreateProduct(1, 'A')
            ->withPrice(100)
            ->create();
    }

    public static function itemB(): CartItemSummary
    {
        return (new CartItemSummaryFactory)
            ->withCreateItem(2, 2)
            ->withCreateProduct(2, 'B')
            ->withPrice(200)
            ->create();
    }
}
