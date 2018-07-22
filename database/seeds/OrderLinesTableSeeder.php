<?php

use Illuminate\Database\Seeder;

class OrderLinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\OrderLine::class, 30)
            ->create()
            ->each(function(\App\OrderLine $orderLine){
                $products = \App\Product::all()->random(rand(1, 3));
                $orderLine->products()->saveMany($products);

                $orderLine->refreshTotal();
            });
    }
}
