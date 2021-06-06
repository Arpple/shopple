<?php

namespace App\Console\Checkout;

use App\Core\Checkout\Domain\CartEntity;
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
}
