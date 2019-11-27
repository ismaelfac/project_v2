<?php

namespace App\Repositories\Cms\System;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\Permission\Models\Permission;

class PermissionRepository {
    protected $model;

    /**
     *  PermissionRepository Construct
     */

    public function __construct(Permission $permission){
        $this->model = $permission;
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

    public function update($data, $permission)
    {
        return $this->model->where('id',$permission)->update(['name' => $data->name]);
    }

    public function delete($id)
    {
        return $this->model->where('id',$id)->delete($id);
    }

    public function find($id): Permission
    {
        if (null == $permission = $this->model->find($id)) {
            throw new ModelNotFoundException("permission not found");
        }

        return $permission;
    }
}