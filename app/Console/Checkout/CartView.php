<?php

namespace App\Console\Checkout;

use App\Core\Checkout\Entity\CartEntity;
use App\Core\Checkout\Entity\CartItemEntity;
use App\Core\User\Entity\UserEntity;

class CartView
{
    private UserEntity $user;
    private CartEntity $cart;

    public function __construct(UserEntity $user, CartEntity $cart)
    {
        $this->user = $user;
        $this->cart = $cart;
    }

    public function toString(): string
    {
        $lines = array_merge(
            $this->getHeaderLines(),
            $this->getItemLines(),
            $this->getSummaryLines(),
        );

        return implode(PHP_EOL, $lines);
    }

    private function getHeaderLines(): array
    {
        return [
            "{$this->user->name}'s cart",
        ];
    }

    private function getItemLines(): array
    {
        return array_map(
            fn (CartItemEntity $item) => "  - {$item->productName} {$item->price}x{$item->quantity} = \${$item->totalPrice()}",
            $this->cart->items()
        );
    }

    private function getSummaryLines(): array
    {
        return [
            "\${$this->cart->totalPrice()}",
        ];
    }
}
