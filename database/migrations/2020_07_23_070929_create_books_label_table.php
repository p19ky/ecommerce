<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksLabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_label', function (Blueprint $table) {
            $table->increments('bookLabelId');
            $table->integer('labelId')->unsigned();
            $table->foreign('labelId')->references('labelId')->on('labels');
            $table->integer('bookId')->unsigned();
            $table->foreign('bookId')->references('id')->on('books');

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
        Schema::dropIfExists('books_label');
    }
}
