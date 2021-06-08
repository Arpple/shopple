<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Entity\CartItemEntity;
use PHPUnit\Framework\TestCase;

class CartItemEntityTest extends TestCase
{
    public function test_calculate_item_total_price()
    {
        $item = new CartItemEntity(1, 'item', 2, 100);
        $total = $item->totalPrice();
        $this->assertEquals(200, $total);
    }
}
