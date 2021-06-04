<?php

namespace App\Core\Catalog\Test;

use App\Core\Catalog\Domain\CatalogService;
use PHPUnit\Framework\TestCase;

class CatalogServiceTest extends TestCase
{
    private CatalogService $service;

    public function setUp(): void
    {
        parent::setUp();
        $repo = new ExampleProductsRepo();
        $this->service = new CatalogService($repo);
    }

    public function test_list_all_product_from_repo()
    {
        $products = $this->service->listProducts();
        $this->assertCount(3, $products);
        $this->assertEquals('iphone', $products[0]->name);
        $this->assertEquals('M4A', $products[2]->name);
    }
}
