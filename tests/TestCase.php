<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function createUser()
    {
        return factory(User::class)->create();
    }

    protected function createAdmin()
    {
        Role::create(['name' => 'Super Admin']);
        $user = $this->createUser();
        return $user->assignRole('Super Admin');
    }
}
