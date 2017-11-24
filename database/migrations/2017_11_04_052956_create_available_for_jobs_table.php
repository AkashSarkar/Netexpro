<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailableForJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        
        Schema::create('available_for_jobs', function (Blueprint $table) {
            //$table->increments('id');
            $table->string('position');
            $table->string('profession');
            $table->string('CV');
            $table->string('highlight');
            $table->string('location');
            $table->string('useravailablepost_id');
            $table->primary('useravailablepost_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->dropForeign(['user_id']);
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
        Schema::dropIfExists('available_for_jobs');
    }
}
