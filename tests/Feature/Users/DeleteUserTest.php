<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class DeleteUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function unauthorized_user_cannot_delete_user()
    {
        $this->signIn(create(User::class));

        $user = create(User::class);

        $this->deleteJson(route('users.destroy', $user->id))
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    function authorized_user_can_delete_its_user()
    {
        $this->signIn(create(User::class));

        $this->deleteJson(route('users.destroy', auth()->id()))
            ->assertSuccessful();
    }
}