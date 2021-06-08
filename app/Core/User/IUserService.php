<?php

namespace App\Core\User;

use App\Core\User\Entity\UserEntity;

interface IUserService
{
    /**
     * @throws UserAlreadyExistsException
     */
    public function signup(string $name): void;

    public function login(string $name): ?UserEntity;
}
