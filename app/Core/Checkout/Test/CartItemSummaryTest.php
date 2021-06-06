<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Domain\CartItemEntity;
use App\Core\Checkout\Domain\CartItemSummary;
use App\Core\Checkout\Domain\ProductEntity;
use PHPUnit\Framework\TestCase;

class CartItemSummaryTest extends TestCase
{
    public function test_calculate_item_total_price()
    {
        $product = new ProductEntity(1, 'iphone');
        $item = new CartItemEntity(1, 2);
        $price = 100;
        $summary = new CartItemSummary($item, $product, $price);

        $total = $summary->totalPrice();
        $this->assertEquals(200, $total);
    }
}
