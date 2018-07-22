<?php

namespace Tests\Feature\Admin;

use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class UpdateOrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function only_administrator_can_update_orders()
    {
        $this->signIn(create(User::class));

        $this->putJson(route('orders.update', create(Order::class)), [])
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    function administrator_can_update_orders()
    {
        $this->signIn();

        $order = create(Order::class, ['order_date' => Carbon::today()]);

        $this->putJson(route('orders.update', $order), [
            'order_date' => Carbon::tomorrow()->toDateTimeString()
        ])->assertStatus(Response::HTTP_ACCEPTED);

        $this->assertEquals(Carbon::tomorrow()->toDateTimeString(), $order->fresh()->order_date->toDateTimeString());
    }
}