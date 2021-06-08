<?php

namespace App\Core\User\Test;

use App\Core\User\Boundary\IUserRepo;
use App\Core\User\Exception\UserAlreadyExistsException;
use App\Core\User\Entity\UserEntity;

class AllExistsUserRepo implements IUserRepo
{
    public function create(string $name): void
    {
        throw new UserAlreadyExistsException($name);
    }

    public function findByName(string $name): ?UserEntity
    {
        return null;
    }
}
