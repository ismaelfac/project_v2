<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
/* Metodos Spatie Permission */
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesPermissionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    function users_admin_can_view_roles_unit()
    {
        //Arrange
            //crear usuario existente como persona.
            //crea Usuario
            //lo asigno como administrador.
        //Act
        $response = $this->get('api/roles');
        //assert
        $response->assertStatus(200);
    }
    /**
     * @test
     */
    function users_admin_can_create_roles_unit()
    {
        //Arrange
            //crear usuario existente como persona.
            $user = $this->createAdmin();
            dd($user);
            $this->be($user);
            //lo asigno como Super administrador.
        //Act

        //assert

    }

    /**
     * @test
     */
    function edit_roles_nit()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
