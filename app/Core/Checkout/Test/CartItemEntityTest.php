<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Domain\CartItemEntity;
use App\Core\Checkout\Domain\ProductEntity;
use PHPUnit\Framework\TestCase;

class CartItemEntityTest extends TestCase
{
    public function test_calculate_item_total_price()
    {
        $product = new ProductEntity(1, 'iphone');
        $item = new CartItemEntity(1, $product, 2, 100);
        $total = $item->totalPrice();
        $this->assertEquals(200, $total);
    }
}
