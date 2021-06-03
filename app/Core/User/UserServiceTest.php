<?php

namespace App\Core\User\Test;

use App\Core\User\UserAlreadyExistsException;
use App\Core\User\UserService;
use Tests\TestCase as TestsTestCase;

class UserServiceTest extends TestsTestCase
{
    public function test_signup_new_user_can_login_by_name()
    {
        $userRepo = new SingleUserRepo(1);
        (new UserService($userRepo))->signup('arpple');
        $user = (new UserService($userRepo))->login('arpple');

        $this->assertEquals('arpple', $user->name);
        $this->assertEquals(1, $user->id);
    }

    public function test_signup_with_existing_user_error_already_exists()
    {
        $userRepo = new AllExistsUserRepo();

        $this->expectException(UserAlreadyExistsException::class);
        (new UserService($userRepo))->signup('arpple');
    }
}
