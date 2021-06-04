<?php

namespace App\Core\Catalog\Boundary;

use App\Core\Catalog\Domain\ProductEntity;
use Illuminate\Support\Collection;

interface IProductRepo
{
    public function all(): Collection;
    public function find(int $id): ?ProductEntity;
}
