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
            $table->string('profession');
            $table->string('industry');

            $table->char('phone_no',11)->nullable();
            $table->string('gender')->nullable();
            $table->string('nid')->nullable();
            $table->string('bank_ac')->nullable();
            $table->string('location')->nullable();
            $table->date('dob')->nullable();
            $table->integer('user_type')->unsigned()->default(3);
            $table->string('interest')->nullable();
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
