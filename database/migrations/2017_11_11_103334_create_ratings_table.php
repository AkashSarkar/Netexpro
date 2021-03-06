<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('rating')->unsigned();
          
            $table->integer('user_id')->unsigned();
            $table->string('post_id');
           
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade');
            $table->dropForeign(['post_id']);
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');

    }
}
