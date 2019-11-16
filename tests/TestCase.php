<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function authorUser($user = null)
    {
        $user = $this->createAdmin();
        return $this->be($user);

    }

    protected function createRol($rol)
    {
        return Role::create(['name' => $rol]);
    }
    protected function createUser()
    {
        return factory(User::class)->create();
    }

    protected function createAdmin()
    {
        $rol = Role::get('name','Super Admin');
        if(!$rol->all()){
            $this->createRol('Super Admin');
        }
        $user = $this->createUser()->assignRole('Super Admin');
        return $user;
    }
}
