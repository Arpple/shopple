<?php

namespace App\Core\User\Boundary;

use App\Core\User\Domain\UserAlreadyExistsException;
use App\Core\User\Domain\UserEntity;

interface IUserRepo
{
    /**
     * @throws UserAlreadyExistsException
     */
    public function create(string $name): void;

    public function findByName(string $name): ?UserEntity;
}
