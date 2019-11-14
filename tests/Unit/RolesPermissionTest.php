<?php

namespace Tests\Unit;

use Tests\TestCase;
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
        $user = $this->createAdmin();
        $this->be($user);
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
            $user = $this->createAdmin();
            $this->be($user);
        //Act
            $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->json('POST', '/api/roles', ['name' => 'Supervisor']);
        //assert
            $response->assertStatus(200);
    }

    /**
     * @test
     */
    function users_admin_can_edit_roles_unit()
    {
        //Arrange
            $user = $this->createAdmin();
            $this->be($user);
        //Act
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('PUT', '/api/roles', ['name' => 'Supervisores']);
        //assert
            $response->assertStatus(201);   
    }

        /**
     * @test
     */
    function users_admin_can_destroy_roles_unit()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
