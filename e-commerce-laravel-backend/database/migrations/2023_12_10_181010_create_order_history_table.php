<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('order_history', function (Blueprint $table) {
            $table->id('order_id');
            $table->date('order_date');
            $table->integer('total_amount');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->string('order_products')->nullable();

            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('transaction_id')->references('transaction_id')->on('transactions')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_history');
    }
}
?>