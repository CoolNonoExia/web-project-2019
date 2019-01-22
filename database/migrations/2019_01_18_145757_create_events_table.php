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
            $table->bigInteger('likes_number');
            $table->bigInteger('comments_number');
            $table->bigInteger('id_images_events');
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
