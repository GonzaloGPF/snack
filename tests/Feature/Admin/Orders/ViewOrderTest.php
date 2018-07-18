<?php

namespace Tests\Feature\Admin;

use App\Order;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewOrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function authenticated_user_can_fetch_all_orders()
    {
        $this->signIn(create(User::class));

        create(Order::class, [], 3);

        $response = $this->getJson(route('orders.index'))
            ->assertSuccessful();

        $this->assertCount(3, $response['data']);
    }
}