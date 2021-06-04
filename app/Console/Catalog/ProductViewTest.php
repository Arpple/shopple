<?php

namespace App\Console\Catalog;

use App\Core\Catalog\Domain\ProductEntity;
use PHPUnit\Framework\TestCase;

class ProductViewTest extends TestCase
{
    public function test_print_product()
    {
        $product = new ProductEntity(1, 'iphone', 'smart phone', 100);
        $str = (new ProductView($product))->toString();
        $this->assertEquals('1 : iphone $100', $str);
    }
}
