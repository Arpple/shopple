<?php

namespace App\Core\Catalog;

use Illuminate\Support\Collection;

class CatalogService
{
    private ICatalogRepo $catalogRepo;

    public function __construct(ICatalogRepo $catalogRepo)
    {
        $this->catalogRepo = $catalogRepo;
    }

    public function create(
    ): ProductEntity
    {

    }

    public function listAll(): Collection
    {

    }
}
