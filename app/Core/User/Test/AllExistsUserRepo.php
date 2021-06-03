<?php

namespace App\Core\User\Test;

use App\Core\User\IUserRepo;
use App\Core\User\UserAlreadyExistsException;
use App\Core\User\UserEntity;

class AllExistsUserRepo implements IUserRepo
{
    public function create(string $name): UserEntity
    {
        throw new UserAlreadyExistsException($name);
    }

    public function findByName(string $name): ?UserEntity
    {
        return null;
    }
}
