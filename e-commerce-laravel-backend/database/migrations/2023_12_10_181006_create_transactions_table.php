<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('id_order')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->float('amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->enum('status', ['ok', 'error'])->nullable();
            $table->string('transaction_time')->nullable();
            $table->date('transaction_date')->nullable();

            $table->foreign('id_order')->references('order_id')->on('orders')->onDelete('set null');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
?>