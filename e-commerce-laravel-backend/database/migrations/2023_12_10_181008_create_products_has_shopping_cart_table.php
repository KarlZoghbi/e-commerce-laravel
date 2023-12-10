<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsHasShoppingCartTable extends Migration
{
    public function up()
    {
        Schema::create('products_has_shopping_cart', function (Blueprint $table) {
            $table->unsignedBigInteger('products_product_id');
            $table->unsignedBigInteger('shopping_cart_cart_id');

            $table->primary(['products_product_id', 'shopping_cart_cart_id']);
            $table->foreign('products_product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('shopping_cart_cart_id')->references('cart_id')->on('shopping_cart')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products_has_shopping_cart');
    }
}
?>