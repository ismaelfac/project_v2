<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolesPermissionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    function users_admin_can_view_roles_unit()
    {
        //Arrange
        $this->authorUser('super-admin');
        //Act
        $response = $this->get('api/roles');
        //assert
        $response->assertStatus(Response::HTTP_OK);
    }
    /**
     * @test
     */
    function users_admin_can_create_roles_unit()
    {
        //Arrange
            $this->authorUser('super-admin');
        //Act
            $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->json('POST', '/api/roles', ['name' => 'Supervisor']);
        //assert
            $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    function users_admin_can_update_roles_unit()
    {
        $this->withoutExceptionHandling();
        //Arrange
        $this->authorUser('super-admin');
        //Act
            $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->json('PUT', '/api/roles/4', ['id' => 4,'name' => 'Cordinador']);
        //assert
            $response->assertStatus(Response::HTTP_OK);
    }

        /**
     * @test
     */
    function users_admin_can_destroy_roles_unit()
    {
        $this->withoutExceptionHandling();
        //Arrange
        $this->authorUser('super-admin');
        //Act
            $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->json('DELETE', '/api/roles/5',['id' => 5]);
        //assert
            $this->assertDatabaseMissing('roles',[
                'id' => 5
            ]);
            $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * Permisos 
     */

    function users_admin_can_view_permission_unit()
    {
        //Arrange
        $this->authorUser('super-admin');
        //Act
        $response = $this->get('api/permissions');
        //assert
        $response->assertStatus(Response::HTTP_OK);
    }
    /**
     * @test
     */
    function users_admin_can_create_permission_unit()
    {
        //Arrange
            $this->authorUser('super-admin');
        //Act
            $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->json('POST', '/api/permissions', ['name' => 'create-roles', 'guard_name' => 'web']);
        //assert
            $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    function users_admin_can_update_permission_unit()
    {
        $this->withoutExceptionHandling();
        //Arrange
        $this->authorUser('super-admin');
        //Act
            $this->withHeaders([
                'X-Header' => 'Value',
            ])->json('POST', '/api/permissions', ['name' => 'create-roles', 'guard_name' => 'web']);
            //dd($this->get('api/permissions'));
            $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->json('PUT', '/api/permissions/2', ['id' => 2,'name' => 'edit-roles', 'guard_name' => 'web']);
        //assert
            $response->assertStatus(Response::HTTP_OK);
    }

        /**
     * @test
     */
    function users_admin_can_destroy_permission_unit()
    {
        $this->withoutExceptionHandling();
        //Arrange
        $this->authorUser('super-admin');
        //Act
            $this->withHeaders([
                'X-Header' => 'Value',
            ])->json('POST', '/api/permissions', ['name' => 'create-roles', 'guard_name' => 'web']);
            $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->json('DELETE', '/api/permissions/3',['id' => 3]);
        //assert
            $this->assertDatabaseMissing('permissions',[
                'id' => 1
            ]);
            $response->assertStatus(Response::HTTP_OK);
    }
}
