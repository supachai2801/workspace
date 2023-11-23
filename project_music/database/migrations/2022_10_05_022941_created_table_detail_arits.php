<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedTableDetailArits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_detail_arists', function (Blueprint $table) {
            $table->id();
            $table->integer('arists_id')->unsigned();
            $table->integer('review_id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->integer('score_id')->unsigned();
            $table->integer('member_id')->unsigned();
            
            // $table->foreign('arists_id')->references('id')->on('tbl_arists');
            // $table->foreign('review_id')->references('id')->on('tbl_reviews');
            // $table->foreign('event_id')->references('id')->on('tbl_events');
            // $table->foreign('member_id')->references('id')->on('tbl_members');
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
        Schema::dropIfExists('tbl_detail_arists');
    }
}
