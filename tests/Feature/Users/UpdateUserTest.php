<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function unauthorized_user_cannot_update_user()
    {
        $this->signIn(create(User::class));

        $user = create(User::class);

        $this->putJson(route('users.update', $user))
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    function authorized_user_can_update_its_user()
    {
        $this->signIn(create(User::class));

        $this->putJson(route('users.update', auth()->id()))
            ->assertSuccessful();
    }
}