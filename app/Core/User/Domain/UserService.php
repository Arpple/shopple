<?php

namespace App\Core\User\Domain;

use App\Core\User\Boundary\IUserRepo;

class UserService
{
    private IUserRepo $userRepo;

    public function __construct()
    {
        $this->userRepo = app()->make(IUserRepo::class);
    }

    /**
     * @throws UserAlreadyExistsException
     */
    public function signup(string $name): void
    {
        $this->userRepo->create($name);
    }

    public function login(string $name): ?UserEntity
    {
        return $this->userRepo->findByName($name);
    }
}
