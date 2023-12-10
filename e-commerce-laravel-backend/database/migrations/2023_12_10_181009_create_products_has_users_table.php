<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsHasUsersTable extends Migration
{
    public function up()
    {
        Schema::create('products_has_users', function (Blueprint $table) {
            $table->unsignedBigInteger('products_product_id');
            $table->unsignedBigInteger('users_user_id');

            $table->primary(['products_product_id', 'users_user_id']);
            $table->foreign('products_product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('users_user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products_has_users');
    }
}
?>