<?php

namespace App\Core\Catalog\Request;

use App\Core\BadInputException;
use PHPUnit\Framework\TestCase;

class CreateProductRequestTest extends TestCase
{
    public function test_cannot_request_create_product_with_minus_price()
    {
        $this->expectException(BadInputException::class);
        new CreateProductRequest('iphone', 'a smart phone', -100);
    }

    public function test_request_create_product()
    {
        $request = new CreateProductRequest('iphone', 'a smart phone', 100);
        $this->assertEquals('iphone', $request->name);
        $this->assertEquals('a smart phone', $request->description);
        $this->assertEquals(100, $request->price);
    }
}
