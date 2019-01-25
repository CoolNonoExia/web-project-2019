<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuggestionBoxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestion_box', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->dateTime('post_date');
            $table->bigInteger('votes_number')->unsigned();
            $table->bigInteger('id_images_events')->unsigned();
            $table->foreign('id_images_events')
                ->references('id')
                ->on('images_events')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suggestion_box', function(Blueprint $table) {
            $table->dropForeign('suggestion_box_id_images_events_foreign');
        });
        Schema::dropIfExists('suggestion_box');
    }
}
