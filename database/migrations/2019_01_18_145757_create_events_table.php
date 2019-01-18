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
            $table->boolean('to_come_up');
            $table->integer('likes_number');
            $table->integer('comments_number');
            $table->integer('id_images_events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
