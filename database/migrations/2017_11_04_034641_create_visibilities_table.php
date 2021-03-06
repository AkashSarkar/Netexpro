<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visibilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('visibilities_type');
            $table->string('post_id');
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
        Schema::dropIfExists('visibilities');
       
    }
}
