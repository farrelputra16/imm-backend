<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdgsTable extends Migration
{
    public function up()
    {
        Schema::create('sdgs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->integer('order')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sdgs');
    }
}
