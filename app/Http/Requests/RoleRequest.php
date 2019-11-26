<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\RolePermission;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        $role = Role::where('id', $this->id)->get();
        dd($role);
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'role.name' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'role.name' => 'required|email|unique:roles,name,'.$role->id,
                ];
            }
            default:break;
        }
    }
}
