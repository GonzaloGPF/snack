<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class DeleteProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function only_administrator_can_delete_product()
    {
        $this->signIn(create(User::class));

        $this->deleteJson(route('products.destroy', create(Product::class)))
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    function administrator_can_delete_product()
    {
        $this->signIn();

        $product = create(Product::class);

        $this->assertNull($product->deleted_at);

        $this->deleteJson(route('products.destroy', $product))
            ->assertStatus(Response::HTTP_ACCEPTED);

        $this->assertNotNull($product->fresh()->deleted_at);
    }
}