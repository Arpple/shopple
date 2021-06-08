<?php

namespace App\Core\User\Boundary;

use App\Core\User\Exception\UserAlreadyExistsException;
use App\Core\User\Entity\UserEntity;

interface IUserRepo
{
    /**
     * @throws UserAlreadyExistsException
     */
    public function create(string $name): void;

    public function findByName(string $name): ?UserEntity;
}
