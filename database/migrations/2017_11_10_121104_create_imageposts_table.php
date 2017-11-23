<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagepostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imageposts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_id');
            $table->string('post_image');

            $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade');
            $table->dropForeign(['post_id']);
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
        Schema::dropIfExists('imageposts');
      
    }
}
