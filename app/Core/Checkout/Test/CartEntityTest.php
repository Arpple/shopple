<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Domain\CartEntity;
use PHPUnit\Framework\TestCase;

class CartEntityTest extends TestCase
{
    public function test_empty_cart_total_price_zero()
    {
        $cart = new CartEntity();
        $total = $cart->totalPrice();
        $this->assertEquals(0, $total);
    }

    public function test_calcualte_cart_total_price()
    {
        $cart = (new CartEntity)
            ->addItem(Example::itemSummaryA())
            ->addItem(Example::itemSummaryB());

        $total = $cart->totalPrice();
        $this->assertEquals(500, $total);
    }
}
