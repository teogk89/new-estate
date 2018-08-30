<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions_type', function (Blueprint $table) {

            $table->increments('id');
            $table->string('step1');
            $table->string('step2');
            $table->string('step3');
            $table->string('step4')->nullable();
            $table->integer('current_step')->default(0);
            $table->integer('user_id')->unsigned()->nullable();

            $table->integer("transaction_id")->unsigned();


            $table->rememberToken();
            $table->timestamps();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('set null');

            $table->foreign('transaction_id')
                  ->references('id')->on('transaction')
                  ->onDelete('cascade');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('transactions_type');
    }
}
