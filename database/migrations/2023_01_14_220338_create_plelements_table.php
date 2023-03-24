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
        Schema::create('plelements', function (Blueprint $table) {
            $table->id();
            // $table->timestamps();
            $table->integer('playlistid')->unsigned();
            $table->foreign('playlistid')->references('id')->on('playlists');
            $table->integer('songid')->unsigned();
            $table->foreign('songid')->references('id')->on('songs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plelements');
    }
};
