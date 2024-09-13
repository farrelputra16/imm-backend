<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicatorsTable extends Migration
{
    public function up()
    {
        Schema::create('indicators', function (Blueprint $table) {
            $table->id();
            $table->string('name', 550)->nullable();
            $table->string('order', 50)->nullable();
            $table->integer('level')->nullable();
            
            $table->unsignedBigInteger('parent_indicator_id')->nullable();
            $table->unsignedBigInteger('sdg_id')->nullable();

            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('parent_indicator_id')->references('id')->on('indicators')->onDelete('set null'); // Self-referencing FK
            $table->foreign('sdg_id')->references('id')->on('sdgs');
        });
    }

    public function down()
    {
        Schema::dropIfExists('indicators');
    }
}
