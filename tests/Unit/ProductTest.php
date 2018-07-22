<?php

namespace Tests\Unit;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Product
     */
    private $product;

    protected function setUp()
    {
        parent::setUp();
        $this->product = create(Product::class);
    }

    /** @test */
    function it_has_many_many_order_lines()
    {
        $this->assertInstanceOf(OrderLine::class, $this->product->orderLines);
    }
}
