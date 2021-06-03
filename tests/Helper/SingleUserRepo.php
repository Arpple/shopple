<?php

namespace Tests\Helper;

use App\Core\User\IUserRepo;
use App\Core\User\UserEntity;

class SingleUserRepo implements IUserRepo
{
    private ?UserEntity $user = null;
    private int $id;

    public function __construct(int $id = 1)
    {
        $this->id = $id;
    }

    public function create(string $name): UserEntity
    {
        $this->user = new UserEntity($this->id, $name);
        return $this->user;
    }

    public function findByName(string $name): ?UserEntity
    {
        return $name == $this->user->name()
            ? $this->user
            : null;
    }
}
