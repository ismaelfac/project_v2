<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function authorUser($nameRol)
    {
        $user = $this->createUserRol($nameRol);
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

    protected function createUserRol($nameRol)
    {
        $rol = Role::get('name',$nameRol);
        if(!$rol->all()){
            $this->createRol($nameRol);
        }
        $user = $this->createUser()->assignRole($nameRol);
        return $user;
    }
}
