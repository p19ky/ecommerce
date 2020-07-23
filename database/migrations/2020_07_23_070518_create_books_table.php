<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('bookId');
            $table->string('name');
            $table->string('author');
            $table->json('description')->nullable();
            $table->json('details')->nullable();
            $table->string('picture')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->integer('classifId')->unsigned();
            $table->foreign('classifId')->references('classifId')->on('classification');
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
        Schema::dropIfExists('books');
    }
}
