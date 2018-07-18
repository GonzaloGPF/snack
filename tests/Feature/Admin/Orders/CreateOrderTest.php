<?php

namespace Tests\Feature\Admin;

use App\Order;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class CreateOrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function only_administrator_can_create_orders()
    {
        $this->signIn(create(User::class));

        $this->postJson(route('orders.store'), [])
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    function administrator_can_create_an_order()
    {
        $this->signIn();

        $this->postJson(route('orders.store'), make(Order::class)->toArray())
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertEquals(1, Order::count());
    }
}