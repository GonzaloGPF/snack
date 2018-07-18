<?php

namespace Tests\Feature\Admin;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ViewUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function only_administrators_can_view_users()
    {
        $this->signIn(create(User::class));

        $this->getJson(route('admin.users.index'))
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    function administrator_user_can_fetch_all_users()
    {
        $this->signIn();

        create(User::class, [], 3);

        $response = $this->getJson(route('admin.users.index'))
            ->json();

        $this->assertCount(User::count(), $response['data']);
    }

    /** @test */
    function administrator_user_can_fetch_an_user()
    {
        $this->signIn();

        $user = create(User::class);

        $this->getJson(route('admin.users.show', $user))
            ->assertSuccessful();
    }
}