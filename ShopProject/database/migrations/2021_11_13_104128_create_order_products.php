<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('order_products');
        Schema::create('order_products', function (Blueprint $table) {
            //$table->integer('order_id');
            //$table->integer('product_id');
            $table->id();
            $table->integer('quantity');
            $table->string('product_name');
            $table->decimal('product_price', 15,2);
        });
        Schema::table('order_products', function (Blueprint $table) {
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained()->references('id')->on('products');
            // $table->primary(['product_name', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
}
