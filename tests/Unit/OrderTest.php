<?php

namespace Tests\Unit;

use App\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
    function it_has_many_requests()
    {
        $this->assertTrue(true);
    }
}
