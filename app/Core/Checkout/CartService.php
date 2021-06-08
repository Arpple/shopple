<?php

namespace App\Core\Checkout;

use App\Core\Checkout\Boundary\ICartItemRepo;
use App\Core\Checkout\Entity\CartEntity;

class CartService implements ICartService
{
    private int $userId;
    private ICartItemRepo $itemRepo;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
        $this->itemRepo = app()->make(ICartItemRepo::class);
    }

    public function get(): CartEntity
    {
        $cart = new CartEntity();

        $items = $this->itemRepo->getUserItems($this->userId);

        foreach ($items as $item) {
            $cart->addItem($item);
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
