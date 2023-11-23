<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedTableMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_members', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50);
            $table->string('password', 255);
            $table->string('fname', 50);
            $table->string('lname', 50);
            $table->string('phone', 10);
            $table->string('email', 50);
            $table->integer('sex');
            $table->string('address', 50);
            $table->string('county', 50);
            $table->string('image_p', 255);
            $table->integer('flag')->default(1);
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
        Schema::dropIfExists('tbl_members');
    }
}
