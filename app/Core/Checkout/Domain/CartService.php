<?php

namespace App\Core\Checkout\Domain;

use App\Core\Checkout\Boundary\ICartItemRepo;

class CartService
{
    private ICartItemRepo $itemRepo;

    public function __construct()
    {
        $this->itemRepo = app()->make(ICartItemRepo::class);
    }

    public function get(int $userId): CartEntity
    {
        $cart = new CartEntity();

        $this->itemRepo->getUserItems($userId)
            ->each(fn ($item) => $cart->addItem($item));

        return $cart;
    }
}
