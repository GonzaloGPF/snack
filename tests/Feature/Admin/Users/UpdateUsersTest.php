<?php

namespace Tests\Feature\Admin;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class UpdateUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function only_administrator_can_edit_users()
    {
        $this->signIn($user = create(User::class));

        $this->putJson(route('admin.users.update', $user), [])
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    function administrator_can_update_users()
    {
        $this->signIn();
        $user = create(User::class);

        $this->putJson(route('admin.users.update', $user), ['name' => 'Changed Name'])
            ->assertStatus(Response::HTTP_ACCEPTED);

        $this->assertEquals('Changed Name', $user->fresh()->name);
    }
}