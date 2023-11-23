<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedTableVideoArits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_video_arists', function (Blueprint $table) {
            $table->id();
            $table->integer('arists_id')->unsigned();
            $table->string('url_youtube', 255);


            // $table->foreign('arists_id')->references('id')->on('tbl_arists');
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
        Schema::dropIfExists('tbl_video_arists');
    }
}
