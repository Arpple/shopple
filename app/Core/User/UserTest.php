<?php

namespace Tests\Unit;

use App\Core\User\UserService;
use Tests\Helper\SingleUserRepo;
use Tests\TestCase as TestsTestCase;

class UserTest extends TestsTestCase
{
    public function test_signup_new_user_can_login_by_name()
    {
        $userRepo = new SingleUserRepo(1);
        (new UserService($userRepo))->create('arpple');
        $user = (new UserService($userRepo))->find('arpple');

        $this->assertEquals('arpple', $user->name());
        $this->assertEquals(1, $user->id());
    }
}
