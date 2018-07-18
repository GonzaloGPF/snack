<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ViewUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function unauthenticated_user_cannot_view_users()
    {
        $this->getJson(route('users.index'))
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    function authenticated_users_can_view_users()
    {
        $this->signIn(create(User::class));

        $this->getJson(route('users.index'))
            ->assertSuccessful();
    }

    /** @test */
    function authenticated_user_can_view_specific_user()
    {
        $this->signIn(create(User::class));

        $user = create(User::class);

        $this->getJson(route('users.show', $user))
            ->assertSuccessful();
    }
}