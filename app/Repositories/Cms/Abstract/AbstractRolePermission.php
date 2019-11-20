<?php

namespace App\Repositories\Cms\Abstract;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

abstract class RolePermission {
    $protected $role;
    $protected $permission;

    public function __construct($role, $permission)
    {
        $this->role = $role;
        $this->permission = $permission
    }

    public function givePermissionTo($role, $permission)
    {
        $role->givePermissionTo($permission);
    }

}



