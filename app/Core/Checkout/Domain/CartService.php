<?php

namespace App\Core\Checkout\Domain;

use App\Core\Checkout\Boundary\ICartItemRepo;
use App\Core\Checkout\Boundary\IPriceRepo;

class CartService
{
    private int $userId;
    private ICartItemRepo $itemRepo;
    private IPriceRepo $priceRepo;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
        $this->itemRepo = app()->make(ICartItemRepo::class);
        $this->priceRepo = app()->make(IPriceRepo::class);
    }

    public function get(): CartEntity
    {
        $cart = new CartEntity();

        $items = $this->itemRepo->getUserItems($this->userId);

        foreach ($items as $item) {
            $price = $this->priceRepo->getProductPrice($item->product->id);
            $itemSummary = new CartItemSummary($item, $price);
            $cart->addItem($itemSummary);
        }

        return $cart;
    }

    public function setProductItem(int $productId, int $quantity): self
    {
        if ($quantity <= 0) {
            $this->itemRepo->destroy($this->userId, $productId);
            return $this;
        }

        $this->itemRepo->save($this->userId, $productId, $quantity);
        return $this;
    }
}
