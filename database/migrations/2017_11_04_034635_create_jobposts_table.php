<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobposts', function (Blueprint $table) {
           // $table->increments('id');
            $table->string('job_type');
            $table->string('position');
            $table->string('profession');
            $table->string('department')->nullable();
            $table->integer('vacancy_number')->nullable();
            $table->string('job_level')->nullable();
            $table->string('circular')->nullable();
            $table->string('company_details')->nullable();
            $table->string('job_details')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('location');
            $table->string('under_grad')->nullable();;
            $table->string('post_grad')->nullable();;
            $table->string('experience')->nullable();
            $table->string('industry')->nullable();
            $table->string('jobpost_id');
            $table->primary('jobpost_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('jobposts');
    }
}