<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function only_administrator_can_create_a_product()
    {
        $this->signIn(create(User::class));

        $this->postJson(route('products.store'), [])
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    function administrator_can_create_a_product()
    {
        $this->signIn();

        $this->postJson(route('products.store'), make(Product::class)->toArray())
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertCount(1, Product::all());
    }
}