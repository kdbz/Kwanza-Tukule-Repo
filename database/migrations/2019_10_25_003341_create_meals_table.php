<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('orderDetails_id')->unsigned()->nullable();
            $table->string('meal_name');
            $table->timestamps();
        });
        Schema::table('meals',function($table){
          $table->foreign('orderDetails_id')->references('id')->on('order_details')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['orderDetails_id']);
        Schema::dropIfExists('meals');
    }
}
