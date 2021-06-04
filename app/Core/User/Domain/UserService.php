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

    public function signup(string $name): UserEntity
    {
        return $this->userRepo->create($name);
    }

    public function login(string $name): UserEntity
    {
        return $this->userRepo->findByName($name);
    }
}
