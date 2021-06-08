<?php

namespace App\Core\Catalog;

use App\Core\Catalog\Boundary\IProductRepo;
use App\Core\Catalog\Entity\ProductEntity;
use Illuminate\Support\Collection;

class CatalogService
{
    private IProductRepo $productRepo;

    public function __construct()
    {
        $this->productRepo = app()->make(IProductRepo::class);
    }

    public function listProducts(): Collection
    {
        return $this->productRepo->all();
    }

    public function findProduct(int $id): ?ProductEntity
    {
        return $this->productRepo->find($id);
    }
}
