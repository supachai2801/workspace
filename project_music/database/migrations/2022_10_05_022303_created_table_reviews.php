<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedTableReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_reviews', function (Blueprint $table) {
            $table->id();
            $table->text('details_r');
            $table->integer('type');
            $table->integer('arists_id')->unsigned();
            $table->integer('member_id')->unsigned();
            

            // $table->foreign('arists_id')->references('id')->on('tbl_arists');
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
        Schema::dropIfExists('tbl_reviews');
    }
}
