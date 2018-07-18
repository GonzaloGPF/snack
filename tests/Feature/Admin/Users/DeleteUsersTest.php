<?php

namespace Tests\Feature\Admin;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class DeleteUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function only_administrators_can_delete_users()
    {
        $this->signIn($user = create(User::class));

        $this->deleteJson(route('admin.users.destroy', $user))
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    function administrator_can_delete_users()
    {
        $this->signIn();
        $user = create(User::class);

        $this->assertNull($user->deleted_at);

        $this->deleteJson(route('admin.users.destroy', $user))
            ->assertSuccessful();

        $this->assertNotNull($user->fresh()->deleted_at);
    }
}