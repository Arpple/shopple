<?php

namespace App\Core\Catalog\Test;

use App\Core\Catalog\Boundary\IProductRepo;
use App\Core\Catalog\Domain\CatalogService;
use PHPUnit\Framework\TestCase;

class CatalogServiceTest extends TestCase
{
    private CatalogService $service;

    public function setUp(): void
    {
        parent::setUp();
        app()->bind(IProductRepo::class, fn () => new ExampleProductsRepo);
        $this->service = new CatalogService();
    }

    public function test_list_all_product_from_repo()
    {
        $products = $this->service->listProducts();
        $this->assertCount(3, $products);
        $this->assertEquals('iphone', $products[0]->name);
        $this->assertEquals('M4A', $products[2]->name);
    }

    public function test_find_product_not_found()
    {
        $product = $this->service->findProduct(12);
        $this->assertNull($product);
    }

    public function test_find_product()
    {
        $product = $this->service->findProduct(1);
        $this->assertEquals('iphone', $product->name);
    }
}
