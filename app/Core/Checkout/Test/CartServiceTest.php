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
        $cart = (new CartService(1))->get();
        $this->assertEmpty($cart->items);
        $this->assertEquals(0, $cart->totalPrice());
    }

    public function test_get_cart_with_new_create_items()
    {
        $cart = (new CartService(1))
            ->addProduct(1, 1)
            ->addProduct(2, 2)
            ->get();

        $this->assertCount(2, $cart->items);
        $this->assertEquals('Product 1', $cart->items[0]->product->name);
        $this->assertEquals('Product 2', $cart->items[1]->product->name);
        $this->assertEquals(500, $cart->totalPrice());
    }
}
