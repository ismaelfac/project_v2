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

    protected function createRol($rol, $cycles = null)
    {
        return is_null($rol) ? factory(Role::class, $cycles)->create(): Role::create(['name' => $rol]);
    }

    protected function createPermission($permission, $cycles = null)
    {
        return is_null($permission) ? factory(Permission::class, $cycles)->create(): Permission::create(['name' => $permission]);
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
