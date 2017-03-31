<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rooms',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('password')->nullable();;
            $table->timestamps();

        });

        Schema::create('room_user',function(Blueprint $table)
        {
            $table->integer('room_id')->unsigned()->index();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');

            $table->integer('user_id')->unsigned()->index();

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
        //
        Schema::drop('rooms');
        Schema::drop('room_user');
    }
}
