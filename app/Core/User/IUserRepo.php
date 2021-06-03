<?php

namespace App\Core\User;

interface IUserRepo
{
    public function create(string $name): UserEntity;
    public function findByName(string $name): ?UserEntity;
}
