<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesPlayersRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches_players', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->unsigned();
            $table->integer('player_id')->unsigned();
            $table->timestamps();

            $table->foreign('match_id')->references('id')->on('matches');
            $table->foreign('player_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches_players');
    }
}
