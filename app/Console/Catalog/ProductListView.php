<?php

namespace App\Console\Catalog;

use App\Core\Catalog\Entity\ProductEntity;

class ProductListView
{
    private ProductEntity $product;

    public function __construct(ProductEntity $product)
    {
        $this->product = $product;
    }

    public function toString(): string
    {
        $p = $this->product;
        return "{$p->id} : {$p->name} \${$p->price}";
    }
}
