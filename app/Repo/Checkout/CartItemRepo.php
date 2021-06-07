<?php

namespace App\Repo\Checkout;

use App\Core\Checkout\Boundary\ICartItemRepo;
use App\Models\CartItem;
use Illuminate\Support\Collection;

class CartItemRepo implements ICartItemRepo
{
    public function getUserItems(int $userId): Collection
    {
        return CartItem::where(['user_id' => $userId])
            ->get();
    }

    public function save(int $userId, int $productId, int $quantity): void
    {
        CartItem::updateOrCreate(
            ['quantity' => $quantity],
            ['user_id' => $userId, 'product_id' => $productId]
        );
    }

    public function destroy(int $userId, int $productid): void
    {
        CartItem::where([
            'user_id' => $userId,
            'product_id' => $productid,
        ])->destroy();
    }
}
