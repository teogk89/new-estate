<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_file', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->string('file_name')->nullable();
            $table->integer('transaction_id')->unsigned()->nullable();
            $table->foreign('transaction_id')
                  ->references('id')->on('transactions_type')
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
        Schema::dropIfExists('transaction_file_type');
    }
}
