<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_suggestion_box')->unsigned();
            $table->foreign('id_suggestion_box')
                ->references('id')
                ->on('suggestion_box')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->boolean('vote');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votes', function(Blueprint $table) {
            $table->dropForeign('votes_id_suggestion_box_foreign');
        });
        Schema::dropIfExists('votes');
    }
}
