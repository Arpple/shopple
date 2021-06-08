<?php

namespace App\Repo\Checkout;

use App\Core\Checkout\Boundary\ICartItemRepo;
use App\Core\Checkout\Entity\CartItemEntity;
use App\Models\CartItem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CartItemRepo implements ICartItemRepo
{
    public function getUserItems(int $userId): Collection
    {
        $items = DB::table('cart_items')
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->where('cart_items.user_id', $userId)
            ->get()
            ->map(fn ($row) => $this->joinedModelToEntity($row));

        return $items;
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
        ])->delete();
    }

    private function joinedModelToEntity($joinedModel): CartItemEntity
    {
        $m = $joinedModel;

        return new CartItemEntity(
            $m->id,
            $m->name,
            $m->quantity,
            $m->price
        );
    }
}
