<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_orders', function (Blueprint $table) {
            $table->increments('bookOrderId');
            $table->integer('quantity');
            $table->integer('orderId')->unsigned();
            $table->foreign('orderId')->references('orderId')->on('orders');
            $table->integer('bookId')->unsigned();
            $table->foreign('bookId')->references('bookId')->on('books');

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
        Schema::dropIfExists('books_orders');
    }
}
