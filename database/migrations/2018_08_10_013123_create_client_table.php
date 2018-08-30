<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Fname');
            $table->string('Lname');
            $table->string('email')->nullable();
            $table->string('firm')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('phone')->nullable();
            $table->string("broker")->nullable();
            $table->string('side')->nullable();
            $table->string('role');
            $table->integer('address_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('set null');

            $table->foreign('address_id')
                  ->references('id')->on('address')
                  ->onDelete('set null');

            $table->integer('active')->default(1);      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
