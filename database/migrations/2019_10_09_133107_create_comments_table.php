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
             $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->boolean('approved');
            $table->bigInteger('post_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('comments',function($table){
          $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['post_id']);
        Schema::dropIfExists('comments');
    }
}
