<?php

namespace App\Core\Catalog\Test;

use App\Core\Catalog\Boundary\IProductRepo;
use App\Core\Catalog\Entity\ProductEntity;
use Illuminate\Support\Collection;

class ExampleProductsRepo implements IProductRepo
{
    private Collection $products;

    public function __construct()
    {
        $this->products = collect([
            new ProductEntity(1, 'iphone', 'smart phone', 100),
            new ProductEntity(2, 'book', 'very useful book', 200),
            new ProductEntity(3, 'M4A', 'machine gun', 4000),
        ]);
    }

    public function all(): Collection
    {
        return $this->products;
    }

    public function find(int $id): ?ProductEntity
    {
        return $this->products
            ->first(fn ($p) => $p->id == $id);
    }
}
