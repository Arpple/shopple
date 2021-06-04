<?php

namespace App\Console\Catalog;

use App\Core\Catalog\Domain\ProductEntity;
use PHPUnit\Framework\TestCase;

class ProductViewTest extends TestCase
{
    public function test_format_product_to_string()
    {
        $product = new ProductEntity(1, 'iphone', 'smart phone', 100);
        $view = new ProductView($product);
        $str = $view->toString();

        $expected = implode(PHP_EOL, [
            'iphone',
            '  smart phone',
            '$100',
        ]);

        $this->assertEquals($expected, $str);
    }
}
