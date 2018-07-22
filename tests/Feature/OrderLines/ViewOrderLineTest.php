<?php

namespace Tests\Feature;

use App\OrderLine;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ViewOrderLineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function unauthenticated_user_cannot_fetch_order_lines()
    {
        $this->getJson(route('order_lines.index'))
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    function authenticated_user_can_fetch_order_lines()
    {
        $this->signIn();

        create(OrderLine::class, [], 3);

        $response = $this->getJson(route('order_lines.index'))
            ->assertStatus(Response::HTTP_OK)
            ->json();

        $this->assertCount(3, $response['data']);
    }

    /** @test */
    function authenticated_user_can_fetch_specific_order_line()
    {
        $this->signIn();

        $orderLine = create(OrderLine::class, [], 3)->random();

        $response = $this->getJson(route('order_lines.show', $orderLine))
            ->assertStatus(Response::HTTP_OK)
            ->json();

        $this->assertEquals($orderLine->id, $response['data']['id']);
    }
}