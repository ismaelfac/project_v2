<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = ['Super Admin', 'Admin'];
        foreach ($role as $value) {
            Role::create([
            'name' => $value
            ]);
        }
    }
}
