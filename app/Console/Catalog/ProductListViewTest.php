<?php

namespace App\Console\Catalog;

use App\Core\Catalog\Entity\ProductEntity;
use PHPUnit\Framework\TestCase;

class ProductListViewTest extends TestCase
{
    public function test_format_product_to_string()
    {
        $product = new ProductEntity(1, 'iphone', 'smart phone', 100);
        $str = (new ProductListView($product))->toString();
        $this->assertEquals('1 : iphone $100', $str);
    }
}
