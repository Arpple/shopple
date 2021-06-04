<?php

namespace App\Core\User\Boundary;

use App\Core\User\Domain\UserEntity;

interface IUserRepo
{
    public function create(string $name): UserEntity;
    public function findByName(string $name): ?UserEntity;
}
