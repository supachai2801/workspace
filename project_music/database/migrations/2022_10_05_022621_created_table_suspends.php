<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedTableSuspends extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_suspends', function (Blueprint $table) {
            $table->id();
            $table->string('details_sus', 100);
            $table->boolean('suspended');

            $table->integer('arists_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            
            // $table->foreign('arists_id')->references('id')->on('tbl_arists');
            // $table->foreign('admin_id')->references('id')->on('tbl_admins');

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
        Schema::dropIfExists('tbl_suspends');
    }
}
