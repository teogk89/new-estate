<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_form', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("category")->unsigned()->nullable();
            $table->integer('active')->default(1);

            $table->string('name');
            $table->string('path');
            $table->string('type')->default('user');
            $table->text('des')->nullable();
            $table->timestamps();    
            $table->integer('user_id')->unsigned()->nullable();
            

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');

            $table->foreign('category')
                  ->references('id')
                  ->on('category_form')
                  ->onDelete('set null');                 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_form');
    }
}
