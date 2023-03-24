<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            //$table->timestamps();
            $table->string('name');
            $table->string('performer');
            $table->integer('albumid')->unsigned();
            $table->foreign('albumid')->references('id')->on('albums');
            $table->integer('tracknumber');
            $table->string('duration');
            $table->string('description');
            $table->string('genre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
};
