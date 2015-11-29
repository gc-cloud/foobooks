<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('book_tag', function (Blueprint $table) {
         $table->increments('id'); //Pivot table,  not a must have
         $table->timestamps();
         $table->integer('book_id')->unsigned();
         $table->integer('tag_id')->unsigned();
         $table->foreign('book_id')->references('id')->on('books');
         $table->foreign('tag_id')->references('id')->on('tags');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('book_tag');
    }
}
