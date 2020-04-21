<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFoodTypeIDToOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('type_id')->unsigned()->nullable()->after('id');
        });
        Schema::table('orders',function($table){
          $table->foreign('type_id')->references('id')->on('food_types')->onDelete('cascade');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
             $table->dropColumn('type_id');
        });
    }
}
