<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->bigInteger('isbn10')->nullable();
            $table->bigInteger('isbn13')->nullable();
            $table->string('title');
            $table->string('author');
            $table->string('image');
            $table->text('description');
            $table->float('mrp');
            $table->string('publish_at');
            $table->boolean('verified')->default(false);
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