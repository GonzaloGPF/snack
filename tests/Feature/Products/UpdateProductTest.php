<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class UpdateProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function only_administrator_can_delete_product()
    {
        $this->signIn(create(User::class));

        $this->putJson(route('products.destroy', create(Product::class)))
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    function administrator_can_update_a_product()
    {
        $this->signIn();

        $product = create(Product::class);

        $this->putJson(route('products.update', $product), ['name' => 'edited'])
            ->assertStatus(Response::HTTP_ACCEPTED);

        $this->assertEquals('edited', $product->fresh()->name);
    }
}