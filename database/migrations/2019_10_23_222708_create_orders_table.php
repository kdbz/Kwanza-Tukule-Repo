<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->bigInteger('orderDetails_id')->unsigned()->nullable();
            $table->double('quantity');
            $table->string('delivery_location');
            $table->timestamps();
        });
         Schema::table('orders',function($table){
          $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropForeign(['customer_id']);
        Schema::dropForeign(['orderDetails_id']);
        Schema::dropIfExists('orders');
    }
}
