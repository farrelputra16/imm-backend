<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventHubTable extends Migration
{
    public function up()
    {
        Schema::create('event_hubs', function (Blueprint $table) {
            $table->unsignedBigInteger('hub_id');
            $table->unsignedBigInteger('event_id');

            $table->foreign('hub_id')->references('id')->on('hubs')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->primary(['hub_id', 'event_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_hub');
    }
}
