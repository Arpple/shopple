<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Entity\CartEntity;
use PHPUnit\Framework\TestCase;

class CartEntityTest extends TestCase
{
    public function test_empty_cart_have_no_items()
    {
        $cart = $this->emptyCart();
        $items = $cart->items();
        $this->assertEmpty($items);
    }

    public function test_empty_cart_total_price_zero()
    {
        $cart = $this->emptyCart();
        $total = $cart->totalPrice();
        $this->assertEquals(0, $total);
    }

    public function test_cart_with_multiple_items()
    {
        $cart = $this->cartWithTwoItems();
        $items = $cart->items();
        $this->assertCount(2, $items);
    }

    public function test_cart_with_multiple_items_total_price()
    {
        $cart = $this->cartWithTwoItems();
        $total = $cart->totalPrice();
        $this->assertEquals(500, $total);
    }

    private function emptyCart(): CartEntity
    {
        return new CartEntity();
    }

    private function cartWithTwoItems(): CartEntity
    {
        return (new CartEntity)
            ->addItem(Example::itemA())
            ->addItem(Example::itemB());
    }
}
