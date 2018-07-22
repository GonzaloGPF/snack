<?php

namespace Tests\Feature;

use App\OrderLine;
use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class UpdateOrderLineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function only_authenticated_user_can_delete_order_line()
    {
        $this->putJson(route('order_lines.destroy', create(OrderLine::class)))
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    function authenticated_user_can_modify_products_of_his_order_line()
    {
        $this->signIn();

        $orderLine = create(OrderLine::class);
        $orderLine->products()->saveMany(create(Product::class, [], 3));

        $this->assertCount(3, $orderLine->products);

        $this->putJson(route('order_lines.update', $orderLine), [
            'products' => [create(Product::class)->id]
        ])
            ->assertStatus(Response::HTTP_ACCEPTED);

        $this->assertCount(1, $orderLine->fresh()->products);
    }

    /** @test */
    function authenticated_user_cannot_modify_order_lines_of_other_users()
    {
        $this->signIn(create(User::class));

        $user = create(User::class);
        $orderLine = create(OrderLine::class, ['user_id' => $user->id]);

        $this->putJson(route('order_lines.update', $orderLine), [])
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    function when_modifying_products_it_refresh_totals()
    {
        $this->signIn();

        $orderLine = create(OrderLine::class);
        $orderLine->products()->saveMany(create(Product::class, ['price' => 10], 3));
        $orderLine->refreshTotal();

        $this->assertEquals(30, $orderLine->total);

        $this->putJson(route('order_lines.update', $orderLine), [
            'products' => [create(Product::class, ['price' => 10])->id]
        ])
            ->assertStatus(Response::HTTP_ACCEPTED);

        $this->assertEquals(10, $orderLine->fresh()->total);
    }
}