<?php

namespace Tests\Feature;

use App\OrderLine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class DeleteOrderLineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function only_authenticated_user_can_delete_order_line()
    {
        $this->deleteJson(route('order_lines.update', create(OrderLine::class)))
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    function authenticated_user_can_delete_his_order_line()
    {
        $this->signIn();

        $this->deleteJson(route('order_lines.destroy', create(OrderLine::class)))
            ->assertStatus(Response::HTTP_ACCEPTED);

        $this->assertCount(0, OrderLine::all());
    }
}