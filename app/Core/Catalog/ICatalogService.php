<?php

namespace App\Core\Catalog;

use App\Core\Catalog\Entity\ProductEntity;
use Illuminate\Support\Collection;

interface ICatalogService
{
    public function listProducts(): Collection;
    public function findProduct(int $id): ?ProductEntity;
}
