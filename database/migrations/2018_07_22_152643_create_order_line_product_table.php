<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderLineProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_line_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_line_id');
            $table->unsignedInteger('product_id');
            $table->timestamps();

            $table->unique(['order_line_id', 'product_id']);

            $table->foreign('order_line_id')->references('id')->on('order_lines')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_line_product');
    }
}
