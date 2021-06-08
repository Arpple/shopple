<?php

namespace App\Core\Catalog\Entity;

class ProductEntity
{
    public int $id;
    public string $name;
    public string $description;
    public int $price;

    public function __construct(int $id, string $name, string $description, int $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}
