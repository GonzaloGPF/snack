<?php

namespace Tests\Feature;

use App\OrderLine;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class CreateOrderLineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function unauthenticated_user_cannot_create_an_order_line()
    {
        $this->postJson(route('order_lines.store'), [])
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    function authenticated_user_can_create_an_order_line()
    {
        $this->signIn();

        $this->postJson(route('order_lines.store'), make(OrderLine::class)->toArray())
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertCount(1, OrderLine::all());
    }

    /** @test */
    function when_creating_an_order_line_it_can_add_products()
    {
        $this->signIn();

        $data = array_merge(
            make(OrderLine::class)->toArray(),
            [
                'products' => [
                    create(Product::class)->id,
                    create(Product::class)->id
                ]
            ]
        );
        $this->postJson(route('order_lines.store'), $data)
            ->assertStatus(Response::HTTP_CREATED);

        $orderLine = OrderLine::all()->first();
        $this->assertCount(2, $orderLine->products);
    }

    /** @test */
    function each_time_an_order_line_is_created_it_refresh_its_totals()
    {
        $this->signIn();
        $this->withoutExceptionHandling();
        $data = array_merge(
            make(OrderLine::class)->toArray(),
            [
                'products' => [
                    create(Product::class, ['price' => 10])->id,
                    create(Product::class, ['price' => 20])->id
                ]
            ]
        );
        $this->postJson(route('order_lines.store'), $data)
            ->assertStatus(Response::HTTP_CREATED);

        $orderLine = OrderLine::all()->first();
        $this->assertEquals(30, $orderLine->total);
    }
}