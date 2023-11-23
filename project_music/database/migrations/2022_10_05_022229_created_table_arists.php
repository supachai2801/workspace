<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedTableArists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_arists', function (Blueprint $table) {
            $table->id();
            $table->string('aname', 50);
            $table->text('details');
            $table->text('image_a');
            $table->integer('member_id')->unsigned();
            $table->integer('flag')->default(1);
            $table->timestamps();

            // $table->foreign('member_id')->references('id')->on('tbl_member');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_arists');
    }
}
