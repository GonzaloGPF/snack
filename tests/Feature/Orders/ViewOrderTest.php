<?php

namespace Tests\Feature\Admin;

use App\Order;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ViewOrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function unauthenticated_user_cannot_fetch_orders()
    {
        $this->getJson(route('orders.index'))
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    function authenticated_user_can_fetch_orders()
    {
        $this->signIn(create(User::class));

        create(Order::class, [], 3);

        $response = $this->getJson(route('orders.index'))
            ->assertSuccessful()
            ->json();

        $this->assertCount(3, $response['data']);
    }
}