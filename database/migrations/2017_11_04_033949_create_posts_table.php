<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            //$table->increments('id');
            $table->string('post_type');
            $table->longtext('description');
            $table->string('url')->nullable();
            $table->longtext('file_attach')->nullable();
            $table->string('location')->nullable();
            $table->float('ratting')->nullable();
            $table->string('post_tags')->nullable();
            $table->string('post_id');
            $table->primary('post_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');            
            $table->timestamps();
        });

        DB::statement('ALTER Table posts add row_no INTEGER NOT NULL UNIQUE AUTO_INCREMENT;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::disableForeignKeyConstraints();
      // $table->dropForeign('posts_user_id_foreign');
    }
}
