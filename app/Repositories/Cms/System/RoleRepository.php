<?php

namespace App\Repositories\Cms\System;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Permission\Models\Role;

class RoleRepository {
    protected $model;

    /**
     *  RoleRepository Construct
     */

    public function __construct(Role $role){
        $this->model = $role;
    }

    public function all($paginate = null)
    {
        is_null($paginate) ? $paginate = 5 : $paginate; 
        return $this->model->orderBy('updated_at', 'DESC')->paginate($paginate);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($data, $role)
    {
        return $this->model->where('id',$role)->update(['name' => $data->name]);
    }

    public function delete($id)
    {
        return $this->model->where('id',$id)->delete($id);
    }

    public function find($id): Role
    {
        if (null == $role = $this->model->find($id)) {
            throw new ModelNotFoundException("role not found");
        }

        return $role;
    }

    public function givePermissionCmsTo($role, $permission)
    {
        return $role->givePermissionTo($permission);
    }
}