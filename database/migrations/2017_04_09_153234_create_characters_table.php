<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('team_id')->unsigned()->nullable();
            $table->string('role');
            $table->string('name')->unique();
            $table->string('fighter');
            $table->string('image');
            $table->integer('level');
            $table->integer('experience');
            $table->float('fame');
            $table->integer('health');
            $table->integer('damage');
            $table->string('primary');
            $table->string('secondary');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
