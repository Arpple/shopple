<?php

namespace App\Core\Catalog\Request;

use App\Core\BadInputException;

class CreateProductRequest
{
    public string $name;
    public string $description;
    public int $price;

    public function __construct(string $name, string $description, int $price)
    {
        $this->validatePrice($price);

        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    private function validatePrice(int $price)
    {
        if ($price < 0)
            throw new BadInputException();
    }
}
