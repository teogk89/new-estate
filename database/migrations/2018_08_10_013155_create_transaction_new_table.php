<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->nullable();
            $table->string('condition')->nullable();
            $table->date('condition_expire')->nullable();
            $table->date('accept_date')->nullable();
            $table->date('completion_date')->nullable();
            $table->string('mls_number')->nullable();
            $table->integer('price')->nullable();
            $table->integer('deposit')->nullable();
            $table->integer("commission")->nullable();
            $table->integer('further_deposit')->nullable();
            $table->date("deposit_date")->nullable();
            $table->date('trade_record')->nullable();
            $table->date('close_date')->nullable();

         
            $table->integer('address_id')->unsigned()->nullable();
            $table->string("admin_status")->nullable();
            $table->integer('referral_id')->unsigned()->nullable();
            $table->integer('client_id')->unsigned()->nullable();
            $table->integer('lawyer_id')->unsigned()->nullable();
            $table->integer('sale_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->text("reason_status")->nullable();
            $table->foreign('referral_id')
                  ->references('id')->on('client')
                  ->onDelete('set null');



            $table->foreign('address_id')
                  ->references('id')->on('address')
                  ->onDelete('set null');

          
                        
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('set null');

            $table->foreign('client_id')
                  ->references('id')->on('client')
                  ->onDelete('set null');

            $table->foreign('lawyer_id')
                  ->references('id')->on('client')
                  ->onDelete('set null');      
            $table->foreign('sale_id')
                  ->references('id')->on('client')
                  ->onDelete('set null');      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
