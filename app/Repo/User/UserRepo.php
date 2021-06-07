<?php

namespace App\Repo\User;

use App\Core\User\Boundary\IUserRepo;
use App\Core\User\Domain\UserAlreadyExistsException;
use App\Core\User\Domain\UserEntity;
use App\Models\SimpleUser;
use Exception;

class UserRepo implements IUserRepo
{
    public function create(string $name): void
    {
        try {
            SimpleUser::insert(['name' => $name]);
        } catch (Exception $e) {
            throw new UserAlreadyExistsException($name);
        }
    }

    public function findByName(string $name): ?UserEntity
    {
        $user = SimpleUser::where(['name' => $name])
            ->first();

        return is_null($user)
            ? null
            : new UserEntity($user->id, $user->name);
    }
}
