<?php

namespace App\Core\User\Domain;

class UserEntity
{
    public string $id;
    public string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
