<?php

namespace App\Core\User\Test;

use App\Core\User\Boundary\IUserRepo;
use App\Core\User\Domain\UserAlreadyExistsException;
use App\Core\User\Domain\UserService;
use Tests\TestCase as TestsTestCase;

class UserServiceTest extends TestsTestCase
{
    public function test_signup_new_user_can_login_by_name()
    {
        $userRepo = new SingleUserRepo(1);
        app()->bind(IUserRepo::class, fn () => $userRepo);

        (new UserService)->signup('arpple');
        $user = (new UserService)->login('arpple');

        $this->assertEquals('arpple', $user->name);
        $this->assertEquals(1, $user->id);
    }

    public function test_signup_with_existing_user_error_already_exists()
    {
        $userRepo = new AllExistsUserRepo();
        app()->bind(IUserRepo::class, fn () => $userRepo);

        $this->expectException(UserAlreadyExistsException::class);
        (new UserService($userRepo))->signup('arpple');
    }
}
