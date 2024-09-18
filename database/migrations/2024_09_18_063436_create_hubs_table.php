<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Nama hub
            $table->string('location');  // Lokasi hub
            $table->integer('number_of_organizations');  // Jumlah organisasi di hub
            $table->integer('number_of_people');  // Jumlah orang di hub
            $table->integer('number_of_events');  // Jumlah event di hub
            $table->integer('rank');  // Ranking hub
            $table->string('top_investor_types')->nullable();  // Tipe investor teratas
            $table->string('top_funding_types')->nullable();  // Tipe pendanaan teratas
            $table->text('description')->nullable();  // Deskripsi hub
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hubs');
    }
}
