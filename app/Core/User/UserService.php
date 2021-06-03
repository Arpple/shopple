<?php

namespace App\Core\User;

class UserService
{
    private IUserRepo $userRepo;

    public function __construct(IUserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
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
