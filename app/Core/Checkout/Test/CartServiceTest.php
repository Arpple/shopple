<?php

namespace App\Core\Checkout\Test;

use App\Core\Checkout\Boundary\ICartItemRepo;
use App\Core\Checkout\CartService;
use PHPUnit\Framework\TestCase;

class CartServiceTest extends TestCase
{
    private int $userId;
    private SingleUserCartItemRepo $itemRepo;

    public function setUp(): void
    {
        parent::setUp();
        $this->userId = 1;
        $this->itemRepo = new SingleUserCartItemRepo($this->userId);
        app()->bind(ICartItemRepo::class, fn () => $this->itemRepo);
    }

    public function test_empty_cart_have_no_item()
    {
        $cart = (new CartService($this->userId))->get();
        $this->assertEmpty($cart->items());
        $this->assertEquals(0, $cart->totalPrice());
    }

    public function test_set_cart_with_new_product_create_new_item()
    {
        $cart = (new CartService($this->userId))
            ->setProductItem(1, 1)
            ->setProductItem(2, 2)
            ->get();

        $this->assertCount(2, $cart->items());
        $this->assertEquals(1, $cart->items()[0]->productId);
        $this->assertEquals(2, $cart->items()[1]->productId);
        $this->assertEquals(500, $cart->totalPrice());
    }

    public function test_set_cart_with_same_product_again_update_old_item()
    {
        $cart = (new CartService($this->userId))
            ->setProductItem(1, 1)
            ->setProductItem(1, 2)
            ->get();

        $this->assertCount(1, $cart->items());
        $this->assertEquals(1, $cart->items()[0]->productId);
        $this->assertEquals(200, $cart->totalPrice());
    }

    public function test_set_cart_with_product_zero_delete_item()
    {
        $cart = (new CartService($this->userId))
            ->setProductItem(1, 1)
            ->setProductItem(1, 0)
            ->get();

        $this->assertCount(0, $cart->items());
        $this->assertEquals(0, $cart->totalPrice());
    }
}
