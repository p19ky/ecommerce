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
            $table->increments('orderId');
            $table->decimal('totalPrice', 10, 2);
            $table->date('date');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('street');
            $table->string('number');
            $table->string('building')->nullable();
            $table->string('apartment')->nullable();
            $table->string('city');
            $table->string('county');
            $table->string('orderStatus')->default('processing');
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('users');
            $table->integer('paymentId')->unsigned();
            $table->foreign('paymentId')->references('paymentId')->on('payment');
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
