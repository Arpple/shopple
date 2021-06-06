<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Boundary\ICartItemRepo;
use App\Core\Checkout\Domain\CartService;
use PHPUnit\Framework\TestCase;

class CartServiceTest extends TestCase
{
    private SingleUserCartItemRepo $itemRepo;

    public function setUp(): void
    {
        $this->itemRepo = new SingleUserCartItemRepo();
        app()->bind(ICartItemRepo::class, fn () => $this->itemRepo);
    }

    public function test_get_empty_cart_have_no_item()
    {
        $cart = (new CartService)->get(1);
        $this->assertEmpty($cart->items);
    }
}
