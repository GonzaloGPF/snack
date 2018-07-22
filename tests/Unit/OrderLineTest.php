<?php

namespace Tests\Feature;

use App\Order;
use App\OrderLine;
use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class OrderLineTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var OrderLine
     */
    private $orderLine;

    protected function setUp()
    {
        parent::setUp();
        $this->orderLine = create(OrderLine::class);
    }

    /** @test */
    function it_belongs_to_an_user()
    {
        $this->assertInstanceOf(User::class, $this->orderLine->user);
    }

    /** @test */
    function it_belongs_to_an_order()
    {
        $this->assertInstanceOf(Order::class, $this->orderLine->order);
    }

    /** @test */
    function it_belongs_to_many_products()
    {
        $this->assertInstanceOf(Collection::class, $this->orderLine->products);
    }

    /** @test */
    function it_can_update_its_total()
    {
        $this->orderLine->products()->save(create(Product::class, ['price' => 10]));
        $this->orderLine->products()->save(create(Product::class, ['price' => 20]));

        $this->orderLine->refreshTotal();

        $this->assertEquals(30, $this->orderLine->total);
    }
}