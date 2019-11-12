<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\{ User, Post };
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostPolicyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function admins_can_update_post_unit()
    {
        //Arrange
        $admin = $this->createAdmin();
        dd($admin);
        $this->be($admin);

        $post = factory(Post::class)->create();
        
        // Act
        $result = $admin->can('update', $post);

        // Assert
        $this->assertTrue($result);
    }

    /** @test */
    function authors_can_update_posts_unit()
    {
        //Arrange
        $user = $this->createUser();
        $this->be($user);
        $post = factory(Post::class)->create(['user_id' => $user->id]);

        // Act
        $result = $user->can('update', $post);
        //dd($result);

        // Assert
        $this->assertTrue($result);
    }

    /** @test */
    function authors_can_delete_posts()
    {
        //Arrange
        $user = $this->createUser();
        $this->be($user);
        $post = factory(Post::class)->states('unpublished')->create(['user_id' => $user->id]);

        // Act
        $result = $user->can('delete', $post);
        //dd($result);

        // Assert
        $this->assertTrue($result);
    }

    /** @test */
    function authors_can_update_unpublished_posts()
    {
        //Arrange
        $user = $this->createUser();
        $this->be($user);
        $post = factory(Post::class)->states('unpublished')->create(['user_id' => $user->id]);

        // Act
        $result = $user->can('update', $post);
        //dd($result);

        // Assert
        $this->assertTrue($result);
    }
    
    /** @test */
    function unathorized_users_cannot_update_posts()
    {
        //Arrange
        $user = $this->createUser();

        $this->be($user);

        $post = factory(Post::class)->create();
        // Act
        $result = $user->cannot('update', $post);
        //dd($result);

        // Assert
        $this->assertTrue($result);
    } 
    /** @test */
    function guests_cannot_update_post()
    {
        //Arrange
        $post = factory(Post::class)->create();

        // Act
        $result = Gate::allows('update', $post);

        // Assert
        $this->assertFalse($result);
    }
}

