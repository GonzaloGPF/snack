<?php

namespace Tests\Unit;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
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
    function it_belongs_to_many_order_lines()
    {
        $this->assertInstanceOf(Collection::class, $this->product->orderLines);
    }
}
