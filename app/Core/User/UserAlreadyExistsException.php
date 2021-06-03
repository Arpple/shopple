<?php

namespace App\Core\User;

use Exception;

class UserAlreadyExistsException extends Exception
{
    public function __construct(string $name)
    {
    }
}
