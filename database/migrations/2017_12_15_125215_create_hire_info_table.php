<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHireInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hire_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->integer('hire_post_id')->unsigned();
            $table->integer('is_invitaion_accepted')->default(0)->unsigned();

            $table->foreign('employer_id')->references('id')->on('users');
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
        Schema::dropIfExists('hire_info');
    }
}
