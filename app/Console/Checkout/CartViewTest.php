<?php

namespace App\Console\Checkout;

use App\Core\Checkout\Domain\CartEntity;
use App\Core\Checkout\Test\Example;
use App\Core\User\Domain\UserEntity;
use PHPUnit\Framework\TestCase;

class CartViewTest extends TestCase
{
    public function test_print_empty_cart()
    {
        $user = new UserEntity(1, 'arpple');
        $cart = new CartEntity();

        $str = (new CartView($user, $cart))
            ->toString();

        $expect = implode(PHP_EOL, [
            'arpple\'s cart',
            '$0',
        ]);

        $this->assertEquals($expect, $str);
    }

    public function test_print_cart_with_items()
    {
        $user = new UserEntity(1, 'arpple');
        $cart = (new CartEntity)
            ->addItem(Example::itemA())
            ->addItem(Example::itemB());

        $str = (new CartView($user, $cart))
            ->toString();

        $expect = implode(PHP_EOL, [
            'arpple\'s cart',
            '  - A 100x1 = $100',
            '  - B 200x2 = $400',
            '$500',
        ]);

        $this->assertEquals($expect, $str);
    }
}
