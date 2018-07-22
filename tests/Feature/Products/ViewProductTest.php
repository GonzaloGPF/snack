<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ViewProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function unauthenticated_user_cannot_fetch_products()
    {
        $this->getJson(route('products.index'))
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /** @test */
    function authenticated_user_can_fetch_products()
    {
        $this->signIn();

        create(Product::class, [], 3);

        $response = $this->getJson(route('products.index'))
            ->assertStatus(Response::HTTP_OK)
            ->json();

        $this->assertCount(3, $response['data']);
    }
}