<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('education');
            
            $table->char('phone_no',11)->nullable();
            $table->string('gender')->nullable();
            $table->string('nid')->nullable();
            $table->string('bank_ac')->nullable();
            $table->string('location')->nullable();
            $table->date('dob')->nullable();
            $table->string('available_for_job')->nullable();
            $table->integer('hiring')->unsigned()->default(0)->nullable();
            $table->integer('post_viewed')->unsigned()->nullable();
            $table->integer('post_rated')->unsigned()->nullable();
            $table->integer('total_tagged_in')->unsigned()->nullable();
            //image
            $table->string('cover_pic')->default('user.jpg');
            $table->string('p_pic')->default('user.jpg');
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
