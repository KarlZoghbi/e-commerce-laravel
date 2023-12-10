<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingCartTable extends Migration
{
    public function up()
    {
        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->id('cart_id');
            $table->unsignedBigInteger('users_user_id');

            $table->foreign('users_user_id')->references('user_id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shopping_cart');
    }
}
?>