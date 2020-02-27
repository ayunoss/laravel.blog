<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('post_id');
            $table->integer('user_id');
            $table->string('body');
            $table->timestamps();
        });

//        Schema::create('reply_comment', function (Blueprint $table) {
//            $table->integer('comment_id');
//            $table->integer('reply_id');
//            $table->primary(['comment_id','reply_id']);
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
//        Schema::dropIfExists('reply_comment');
    }
}
