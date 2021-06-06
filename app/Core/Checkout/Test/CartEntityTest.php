<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Domain\CartEntity;
use App\Core\Checkout\Domain\CartItemEntity;
use App\Core\Checkout\Domain\CartItemFactory;
use App\Core\Checkout\Domain\ProductEntity;
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
        $itemA = (new CartItemFactory)
            ->withCreateProduct(1, 'A')
            ->create(1, 1, 100);

        $itemB = (new CartItemFactory)
            ->withCreateProduct(2, 'B')
            ->create(2, 2, 200);

        $cart = (new CartEntity)
            ->addItem($itemA)
            ->addItem($itemB);

        $total = $cart->totalPrice();
        $this->assertEquals(500, $total);
    }
}
