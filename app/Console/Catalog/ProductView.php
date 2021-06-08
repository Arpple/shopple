<?php

namespace App\Console\Catalog;

use App\Core\Catalog\Entity\ProductEntity;

class ProductView
{
    private ProductEntity $product;

    public function __construct(ProductEntity $product)
    {
        $this->product = $product;
    }

    public function toString(): string
    {
        $p = $this->product;

        return implode(PHP_EOL, [
            $p->name,
            '  ' . $p->description,
            '$' . $p->price,
        ]);
    }
}
