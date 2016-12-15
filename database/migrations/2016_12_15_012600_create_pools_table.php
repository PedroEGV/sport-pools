<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pools', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->unsigned();
            $table->integer('winner_id')->unsigned();
            $table->decimal('amount');
            $table->timestamps();

            $table->foreign('match_id')->references('id')->on('matches');
            $table->foreign('winner_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pools');
    }
}
