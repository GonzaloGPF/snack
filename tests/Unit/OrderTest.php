<?php

namespace Tests\Unit;

use App\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Order
     */
    private $order;

    protected function setUp()
    {
        parent::setUp();
        $this->order = create(Order::class);
    }

    /** @test */
    function it_has_many_order_lines()
    {
        $this->assertInstanceOf(Collection::class, $this->order->orderLines);
    }
}
