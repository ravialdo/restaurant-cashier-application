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
		  $table->bigInteger('menu_id')->unsigned();
		  $table->foreign('menu_id')->references('id')->on('menus');
		  $table->bigInteger('customer_id')->unsigned();
		  $table->foreign('customer_id')->references('id')->on('customers');
		  $table->integer('amount');
		  $table->bigInteger('user_id')->unsigned()->nullable();
		 $table->foreign('user_id')->references('id')->on('users');
		  $table->string('status',20);
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
        Schema::dropIfExists('orders');
    }
}
