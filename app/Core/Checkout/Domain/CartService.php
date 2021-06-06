<?php

namespace App\Core\Checkout\Domain;

use App\Core\Checkout\Boundary\ICartItemRepo;
use App\Core\Checkout\Boundary\IPriceRepo;

class CartService
{
    private ICartItemRepo $itemRepo;
    private IPriceRepo $priceRepo;

    public function __construct()
    {
        $this->itemRepo = app()->make(ICartItemRepo::class);
        $this->priceRepo = app()->make(IPriceRepo::class);
    }

    public function get(int $userId): CartEntity
    {
        $cart = new CartEntity();

        $items = $this->itemRepo->getUserItems($userId);

        foreach ($items as $item) {
            $price = $this->priceRepo->getProductPrice($item->product->id);
            $itemSummary = new CartItemSummary($item, $price);
            $cart->addItem($itemSummary);
        }

        return $cart;
    }
}
