<?php

namespace App\Repositories\Cms\System;

use App\Repositories\Cms\Interfaces\RolePermissionRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleRepository implements RolePermissionRepositoryInterface {
    protected $model;

    /**
     *  RoleRepository Construct
     */

    public function __construct(Role $role){
        $this->model = $role;
    }

    public function all()
    {
        return $this->model->orderBy('updated_at', 'DESC')->paginate(5);
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

    public function find($id)
    {
        if (null == $role = $this->model->find($id)) {
            throw new ModelNotFoundException("role not found");
        }

        return $role;
    }
}