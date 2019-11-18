<?php

namespace Tests\Unit;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    function users_admin_can_view_users_unit()
    {
        //Arrange
        $this->authorUser('super-admin');
        //Act
        $this->createUser();
        $response = $this->get('api/users');
        //assert
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    function users_admin_can_create_users_unit()
    {
        //Arrange
            $this->authorUser('super-admin');
        //Act
            $user = $this->createUser();
            $response = $this->withHeaders([
                'X-Header' => 'Value',
            ])->json('POST', '/api/users', [$user]);
            $this->assertDatabaseHas('users',[
                'id' => $user->id
            ]);
        //assert
            $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    function users_admin_can_update_users_unit()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
          );
    }

        /**
     * @test
     */
    function users_admin_can_destroy_users_unit()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
          );
    }
}
