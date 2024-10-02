<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHubPeopleTable extends Migration
{
    public function up()
    {
        Schema::create('hubs_people', function (Blueprint $table) {
            $table->unsignedBigInteger('hub_id');
            $table->unsignedBigInteger('people_id');

            $table->foreign('hub_id')->references('id')->on('hubs')->onDelete('cascade');
            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');

            $table->primary(['hub_id', 'people_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('hub_people');
    }
}
