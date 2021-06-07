<?php

namespace App\Repo\Catalog;

use App\Core\Catalog\Boundary\IProductRepo;
use App\Core\Catalog\Domain\ProductEntity;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductRepo implements IProductRepo
{
    public function all(): Collection
    {
        return Product::all()
            ->map(fn ($p) => $this->modelToEntity($p));
    }

    public function find(int $id): ?ProductEntity
    {
        $product = Product::where(['id' => $id])
            ->first();

        return is_null($product)
            ? null
            : $this->modelToEntity($product);
    }

    private function modelToEntity(Product $model): ProductEntity
    {
        return new ProductEntity($model->id, $model->name, $model->description, $model->price);
    }
}
