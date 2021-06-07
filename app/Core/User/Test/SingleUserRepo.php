<?php

namespace App\Core\User\Test;

use App\Core\User\Boundary\IUserRepo;
use App\Core\User\Domain\UserEntity;

class SingleUserRepo implements IUserRepo
{
    private ?UserEntity $user = null;
    private int $id;

    public function __construct(int $id = 1)
    {
        $this->id = $id;
    }

    public function create(string $name): void
    {
        $this->user = new UserEntity($this->id, $name);
    }

    public function findByName(string $name): ?UserEntity
    {
        $isExists = !is_null($this->user)
            && ($name == $this->user->name);

        return $isExists
            ? $this->user
            : null;
    }
}
