<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->dateTime('events_date');
            $table->dateTime('post_date');
            $table->boolean('is_recurrent');
            $table->boolean('is_free');
            $table->bigInteger('likes_number')->unsigned();
            $table->bigInteger('comments_number')->unsigned();
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
        Schema::table('events', function(Blueprint $table) {
            $table->dropForeign('events_id_images_events_foreign');
        });
        Schema::dropIfExists('events');
    }
}
