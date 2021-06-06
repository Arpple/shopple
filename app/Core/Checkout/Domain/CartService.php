<?php

namespace App\Core\Checkout\Domain;

class CartService
{
    public function __construct()
    {

    }

    public function get(int $userId): CartEntity
    {
        $cart = new CartEntity();
        return $cart;
    }
}
