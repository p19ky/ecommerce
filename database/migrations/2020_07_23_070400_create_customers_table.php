<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customerId');
            $table->tinyInteger('customerState')->default('0');
            $table->string('email');
            $table->string('username');
            $table->string('passworld');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('street');
            $table->string('number');
            $table->string('building')->nullable();
            $table->string('apartment')->nullable();
            $table->string('city');
            $table->string('county');
            $table->integer('cartId')->unsigned();
            $table->foreign('cartId')->references('cartId')->on('cart');
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
        Schema::dropIfExists('customers');
    }
}
