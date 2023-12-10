<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password');
            $table->integer('age');
            $table->enum('gender', ['M', 'F', '']);
            $table->unsignedBigInteger('user_type_id')->nullable(); // Make the user_type_id nullable

            $table->string('user_name');
            $table->timestamps();

            // Add the foreign key constraint separately
            $table->foreign('user_type_id')->references('user_type_id')->on('user_roles')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['user_type_id']);
        });

        Schema::dropIfExists('users');
    }
}


?>