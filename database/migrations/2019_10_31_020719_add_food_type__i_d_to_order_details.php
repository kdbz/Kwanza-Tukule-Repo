<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFoodTypeIDToOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('order_details', function (Blueprint $table) {
            $table->bigInteger('type_id')->unsigned()->nullable()->after('id');
        });
        Schema::table('order_details',function($table){
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
        Schema::table('order_details', function (Blueprint $table) {
             $table->dropColumn('type_id');
        });
    }
}

