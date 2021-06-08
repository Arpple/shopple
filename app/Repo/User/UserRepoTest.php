<?php

namespace App\Repo\User;

use App\Core\User\Exception\UserAlreadyExistsException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRepoTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_new_user_and_get()
    {
        (new UserRepo)->create('arpple');
        $user = (new UserRepo)->findByName('arpple');
        $this->assertEquals('arpple', $user->name);
    }

    public function test_create_existed_user()
    {
        (new UserRepo)->create('arpple');
        $this->expectException(UserAlreadyExistsException::class);
        (new UserRepo)->create('arpple');
    }

    public function test_get_non_created_user()
    {
        $user = (new UserRepo)->findByName('arpple');
        $this->assertEquals(null, $user);
    }
}
