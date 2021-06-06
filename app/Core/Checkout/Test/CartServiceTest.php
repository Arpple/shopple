<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Boundary\ICartItemRepo;
use App\Core\Checkout\Boundary\IPriceRepo;
use App\Core\Checkout\Domain\CartService;
use PHPUnit\Framework\TestCase;

class CartServiceTest extends TestCase
{
    private SingleUserCartItemRepo $itemRepo;

    public function setUp(): void
    {
        parent::setUp();
        $this->itemRepo = new SingleUserCartItemRepo();
        app()->bind(ICartItemRepo::class, fn () => $this->itemRepo);

        $priceRepo = new HundredTimesPriceRepo();
        app()->bind(IPriceRepo::class, fn () => $priceRepo);
    }

    public function test_get_empty_cart_have_no_item()
    {
        $cart = (new CartService)->get(1);
        $this->assertEmpty($cart->items);
        $this->assertEquals(0, $cart->totalPrice());
    }

    public function test_get_cart_with_items()
    {
        $this->itemRepo
            ->addItem(Example::itemA())
            ->addItem(Example::itemB());

        $cart = (new CartService)->get(1);
        $this->assertCount(2, $cart->items);
        $this->assertEquals('A', $cart->items[0]->product->name);
        $this->assertEquals('B', $cart->items[1]->product->name);
        $this->assertEquals(500, $cart->totalPrice());
    }
}