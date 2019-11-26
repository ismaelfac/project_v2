<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermission implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        dd($attribute.'-'.$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.required');
    }
}
